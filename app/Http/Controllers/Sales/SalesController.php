<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SalesController extends Controller
{
    /**
     * $curlParams = [
     *  'url' => '',
     *  'method' => '',
     *  'header' => []
     * ]
     */
    public function makeCurlCall($curlParams){
        $curlResponse = [];
        $url = !empty($curlParams['url']) ? $curlParams['url'] : '';
        $callMethod = !empty($curlParams['method']) ? $curlParams['method'] : '';        
        $curlHeader = [
            'Authorization: Bearer '. env('BEARER_TOKEN'),
            'trader:'.env('TRADER'),
            'Content-Type: application/json'
        ];        
        if(!empty($curlParams['header']) && is_string($curlParams['header'])){            
            array_push($curlHeader,$curlParams['header']); 
        }

        $curlArray = array(
            CURLOPT_URL =>  env('WEB_SERVICE_URL').$url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $callMethod,
            CURLOPT_HTTPHEADER => $curlHeader,
        );
        if(!empty($curlParams['postFields'])){
            $curlArray[CURLOPT_POSTFIELDS] = json_encode($curlParams['postFields']);
        }
        if(!empty($curlParams['curlOpt'])){
            $curlArray += $curlParams['curlOpt'];
        }
        
        $curl = curl_init();            
        curl_setopt_array($curl, $curlArray);
        $curlResponse = curl_exec($curl);        
        $curl_error = curl_error($curl);
        curl_close($curl);  

        if (isset($error_msg)) {
            $curlResponse = $curl_error;
        }
        return $curlResponse;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewData = [            
            'actionButtons' => [
                [
                    'label' => 'Create new sale',
                    'link' => '/sale/new',
                    'css_class' => 'btn btn-primary'
                ]
            ],
            'dataTableHeading' => [
                'sl'=>'Sl',
                'date'=>'Date',
                'customerName'=>'Name',
                'address' => 'Address',
                'customerPhone' => 'Phone',
                'invoiceId' => 'Invoice ID',
                'invoiceTotal' => 'Invoice total',
                'paid' => 'paid',
                'due' => 'due',                
                'action' => 'Action'
            ],
            'dataTableItems' => []
        ];

        $params = [
            'url' => '/api/sales',
            'method' => 'GET'
        ];

        $curlResponse = $this->makeCurlCall($params);        
        if(!empty($curlResponse)){
            $apiResponse = json_decode($curlResponse);
            if(!empty($apiResponse->sales)){
                $cnt = 1;
                $salesList = [];
                foreach($apiResponse->sales AS $k => $sales){                    
                    $salesList[] = [
                        'sl' => $cnt,
                        'date' => $sales->date,
                        'name' => $sales->name,
                        'address' => '<span title="'.$sales->reference.'">'.$sales->address.'</span>',
                        'phone' => $sales->phone,
                        'invoiceCode' => '<span title="'.$sales->salesAgent.'">'.$sales->invoiceCode.'</span>',
                        'invoiceTotal' => $sales->invoiceTotal,
                        'paid' => $sales->paid,
                        'due' => $sales->due,
                        'action' => '<a href="/sale/view/'.$sales->sid.'"><i class="far fa-eye"></i></a>',
                    ];
                    $cnt++;
                }                
                $viewData['dataTableItems'] = $salesList;
            }
        }
        return View('sales.sales', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $viewData = [
            'actionButtons' => [
                [
                    'label' => 'Create new sale',
                    'link' => '/sale/new',
                    'css_class' => 'btn btn-primary'
                ]
            ]
        ];

        $params = [
            'url' => '/api/products',
            'method' => 'GET'
        ];

        $curlResponse = $this->makeCurlCall($params);
        if(!empty($curlResponse)){
            $apiResponse = json_decode($curlResponse);
            if(!empty($apiResponse->products)){                
                $productList = [];
                foreach($apiResponse->products AS $k => $product){                                        
                    $productList[] = [
                        'pid' => $product->id,
                        'title' => $product->productTitle,
                        'retailPrice' => $product->retailPrice,
                        'qty' => $product->initialUnit
                    ];                    
                }                
                $viewData['productList'] = $productList;                
            }
        }        
        return View('sales.sales-new', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $user = Auth::user(); 
        $params = $request->all();
        $params['salesAgent'] = $user->email;

        unset($params['_token']);
        $params = [
            'url' => '/api/sales',
            'method' => 'POST',
            'postFields' => $params
        ];
        $curlCallResp = json_decode($this->makeCurlCall($params));
        if(!empty($curlCallResp->statusCode) && $curlCallResp->statusCode == '2002'){   
            Session::flash('info', 'Order saved successfully');
        }
        else{
            // LOG the error. json_encode($curlCallResp);
            Session::flash('error', 'Something went wrong. Please contact with Administrator');
        }

        return redirect()->route('salesList'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $viewData = [
            'contentHeading' => 'Item details',
            'actionButtons' => []
        ];

        $params = [
            'url' => '/api/sales/'.$id,
            'method' => 'GET'
        ];
        $curlResponse = $this->makeCurlCall($params);        
        if(!empty($curlResponse)){
            $apiResponse = json_decode($curlResponse);                        
            if(!empty($apiResponse->statusCode) && $apiResponse->statusCode == 2002){                
                $apiResponse->sales->invoiceCode = '<a href="/sale/invoice/'.$apiResponse->sales->invoicePkId.'">'.$apiResponse->sales->invoiceCode.'</a>';
                $viewData['itemData'] = $apiResponse;
            }
        }        
        return View('sales.details', $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
    public function invoice(Request $request, $id){
        $traderId = env('TRADER');
        $viewData = [];
        $params = [
            'url' => '/api/invoice/'.$id,
            'method' => 'GET'
        ];
        $curlResponse = $this->makeCurlCall($params);   
        if(!empty($curlResponse)){
            $apiResponse = json_decode($curlResponse);                        
            if(!empty($apiResponse->statusCode) && $apiResponse->statusCode == 2002){
                $viewData['itemData'] = $apiResponse;
            }
        }        
        return View('invoice.details', $viewData);


        
    }
}
