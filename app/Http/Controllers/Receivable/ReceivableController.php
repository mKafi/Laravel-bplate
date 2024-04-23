<?php
          
namespace App\Http\Controllers\Receivable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReceivableController extends Controller
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
        $url = env('WEB_SERVICE_URL') . $curlParams['url'];
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
            CURLOPT_URL =>  $url,
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
                    'label' => 'New receivable',
                    'link' => '/receivable/new',
                    'css_class' => 'btn btn-primary'
                ]
            ],
            'dataTableHeading' => [
                'sl'=>'Sl',
                'name'=>'Client/Customer',                
                'address' => 'Address',
                'reference' => 'Reference',
                'contact' => 'Contact',          
                'receivableAmount' => 'Amount',
                'dueDate' => 'Due date',
                'type' => 'Type',
                'history' => 'History',                
                'status' => 'Status',
                'action' => 'Action'
            ],
            'dataTableItems' => []
        ];

        $params = [
            'url' => '/api/receivable',
            'method' => 'GET'
        ];

        $curlResponse = $this->makeCurlCall($params);
        if(!empty($curlResponse)){
            $apiResponse = json_decode($curlResponse);
            if(!empty($apiResponse->receivables)){
                $cnt = 1;
                $receivables = [];
                foreach($apiResponse->receivables AS $k => $receivable){                    
                    $receivables[] = [
                        'sl' => $receivable->rid,                    
                        'client'=>$receivable->client,   
                        'address' => $receivable->address,   
                        'reference' => $receivable->reference,   
                        'contact'=>$receivable->contact,   
                        'amount' => $receivable->amount,   
                        'dueDate' => $receivable->dueDate,   
                        'type' => $receivable->type,   
                        'history' => '<a href="" class="btn btn-small-primary">History</a>',                    
                        'status' => $receivable->status,   
                        'action' => '<a href="/receivable/view/'.$receivable->rid.'"><span class="fa fa-eye"></span></a>&nbsp;
                            <a href="/receivable/edit/'.$receivable->rid.'"><span class="fa fa-edit"></span></a>&nbsp;
                            <a href="/receivable/delete/'.$receivable->rid.'"><span class="fa fa-trash-alt"></span></a>'
                    ];
                    $cnt++;
                }                
                $viewData['dataTableItems'] = $receivables;
            }
        }
        return View('receivables.receivable', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $viewData = [
            'contentHeading' => 'Create new product',
            'actionButtons' => [                
                'label' => 'Add product',
                'link' => '/product/new',
                'css_class' => 'btn btn-primary'                
            ],
            'itemData' => []
        ];
        return View('receivables.receivable-new', $viewData);
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
                'url' => '/api/receivable',
                'method' => 'POST',
                'postFields' => $postFields         
            ];
            $curlCallResp  = json_decode($this->makeCurlCall($params));            
            if(!empty($curlCallResp->statusCode) && $curlCallResp->statusCode == '2002'){   
                Session::flash('info', 'Receivable created successfully');
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
        return redirect()->route('receivableList');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $viewData = [
            'contentHeading' => 'Receivable details',
            'actionButtons' => []
        ];

        $params = [
            'url' => '/api/receivable/'.$id,
            'method' => 'GET'
        ];
        $curlResponse = $this->makeCurlCall($params);        
        if(!empty($curlResponse)){
            $apiResponse = json_decode($curlResponse);                        
            if(!empty($apiResponse->statusCode) && $apiResponse->statusCode == 2002){                
                $viewData['itemData'] = $apiResponse;
            }
        }            
        return View('receivables.details', $viewData);
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
