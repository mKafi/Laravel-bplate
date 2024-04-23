<?php

namespace App\Http\Controllers\Marchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MarchantController extends Controller
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
                    'label' => 'Create new marchant',
                    'link' => '/marchant/new',
                    'css_class' => 'btn btn-primary'
                ]
            ],
            'dataTableHeading' => [
                'sl'=>'Sl',
                'name'=>'Marchant name',
                'company'=>'Company/Organization',
                'contact' => 'Contact',                
                'salesRecord' => 'Sales record',                
                'status' => 'Status',
                'action' => 'Action'
            ],
            'dataTableItems' => []
        ];

        $params = [
            'url' => '/api/marchant',
            'method' => 'GET'
        ];

        $curlResponse = $this->makeCurlCall($params);        
        if(!empty($curlResponse)){
            $apiResponse = json_decode($curlResponse);
            if(!empty($apiResponse->marchants)){
                $cnt = 1;
                $dbEmtities = [];                                
                foreach($apiResponse->marchants AS $k => $marchant){ 
                    $dbEmtities[] = [
                        'sl' => 4,
                        'name'=> $marchant->marchant,
                        'company'=>$marchant->company,
                        'contact' => $marchant->phone,             
                        'salesRecord' => '<a href="" class="btn btn-small-primary">Sales history</a>',                       
                        'status' => $marchant->status,
                        'action' => '<a href="/marchant/view/'.$marchant->id.'"><span class="fa fa-eye"></span></a>&nbsp;
                            <a href="/marchant/edit/'.$marchant->id.'"><span class="fa fa-edit"></span></a>&nbsp;
                            <a href="/marchant/delete/'.$marchant->id.'"><span class="fa fa-trash-alt"></span></a>'
                    ];
                    $cnt++;
                }                
                $viewData['dataTableItems'] = $dbEmtities;
            }
        }

        return View('marchant.marchants', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dbFields = [
            'owner' => 'marchant', 
            'organization' => 'company',
            'description' => 'details',
            'contact' => 'phone',
            'comment' => 'comment',            
            'status' => 'status'
        ];
        $viewData = [
            'contentHeading' => 'New marchant',
            'actionButtons' => [                
                'label' => 'Add marchant',
                'link' => '/marchant/new',
                'css_class' => 'btn btn-primary'                
            ],
            'itemData' => []
        ];
        return View('marchant.marchant-new', $viewData);
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
                'url' => '/api/marchant',
                'method' => 'POST',
                'postFields' => $postFields         
            ];
            $curlCallResp  = json_decode($this->makeCurlCall($params));            
            if(!empty($curlCallResp->statusCode) && $curlCallResp->statusCode == '2002'){   
                Session::flash('info', 'Marchant created successfully');
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
        return redirect()->route('marchantList');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
