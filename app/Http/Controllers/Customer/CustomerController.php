<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
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
                    'label' => 'Create customer',
                    'link' => '/customer/new',
                    'css_class' => 'btn btn-primary'
                ]
            ],
            'dataTableHeading' => [
                'sl'=>'Sl',
                'name'=>'Name',
                'address' => 'Address',
                'reference' => 'Reference',
                'phone'=>'Phone number',
                'lastPurchase' => 'Last purchase',
                'due' => 'Due',                
                'action' => 'Action',
            ],
            'dataTableItems' => []
        ];

        $params = [
            'url' => '/api/customer',
            'method' => 'GET'
        ];

        $curlResponse = $this->makeCurlCall($params);
        if(!empty($curlResponse)){
            $apiResponse = json_decode($curlResponse);
            if(!empty($apiResponse->customers) && $apiResponse->apiStatus == '2002'){
                $cnt = 1;                
                foreach($apiResponse->customers AS $k => $customer){                    
                    $viewData['dataTableItems'][] = [
                        'sl' => $cnt,
                        'name' => $customer->name,
                        'address' => $customer->address,
                        'reference' => $customer->reference,
                        'phone' => $customer->phone,
                        'lastPurchase' => '',
                        'due' => '',
                        'action' => '<a href="/customer/view/'.$customer->cid.'"><span class="fa fa-eye"></span></a>&nbsp;
                            <a href="/customer/edit/'.$customer->cid.'"><span class="fa fa-edit"></span></a>&nbsp;
                            <a href="/customer/delete/'.$customer->cid.'"><span class="fa fa-trash-alt"></span></a>'
                    ];
                    $cnt++;
                }
            }
        }
        return View('customers.customers', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $viewData = [
            'contentHeading' => 'Create new customer',
            'actionButtons' => [                
                'label' => 'Add customer',
                'link' => '/customer/new',
                'css_class' => 'btn btn-primary'                
            ],
            'itemData' => [
                
            ]
        ];
        return View('customers.customer-new', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $apiResponse = [];
        $postFields = $request->all();        
        if(!empty($postFields)){
            unset($postFields['token']);
            $params = [
                'url' => '/api/customer',
                'method' => 'POST',
                'postFields' => $postFields         
            ];
            $curlCallResp  = json_decode($this->makeCurlCall($params));            
            if(!empty($curlCallResp->statusCode) && $curlCallResp->statusCode == '2002'){   
                Session::flash('info', 'Customer created successfully');
            }
            else{                
                // LOG the error. json_encode($curlCallResp);
                Session::flash('error', 'Something went wrong. Please contact with Administrator');
            }
        }
        else{
            // LOG the error. json_encode($curlCallResp);
            Session::flash('error', 'Something went wrong in form submission');
        }  
        return redirect()->route('customerList'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $viewData = [
            'contentHeading' => 'Customer details',
            'actionButtons' => [],
            'itemData' => ''
        ];

        $params = [
            'url' => '/api/customer/'.$id,
            'method' => 'GET'
        ];
        $curlResponse = $this->makeCurlCall($params);        
        if(!empty($curlResponse)){
            $apiResponse = json_decode($curlResponse);                        
            if(!empty($apiResponse->statusCode) && $apiResponse->statusCode == 2002){
                $viewData['itemData'] = $apiResponse;
            }
        }        
        return View('customers.details', $viewData);
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
}
