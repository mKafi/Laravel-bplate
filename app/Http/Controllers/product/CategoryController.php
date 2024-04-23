<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
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
        $url = $curlParams['url'] ?? '';
        $callMethod = $curlParams['method'] ?? '';
        $curlHeader = [
            'Authorization: Bearer '. env('BEARER_TOKEN'),
            'trader:'.env('TRADER'),
            'Content-Type: application/json'
        ];
        if (!empty($curlParams['header']) && is_string($curlParams['header'])) {
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

        if (!empty($curl_error)) {
            // log error and response
            if (!empty($curlParams['style']) && $curlParams['style'] == 'clean'){
                $apiResponse = [];
            } else {
                $apiResponse['error'] = $curl_error;
            }

        } else {
            $decodedResponse = json_decode($curlResponse);
            if (!empty($curlParams['style']) && $curlParams['style'] == 'clean') {
                $apiResponse = $decodedResponse->payload ?? [];
            } else {
                $apiResponse = $decodedResponse;
            }
        }

        return $apiResponse;
    }

    /**
     * Fetching categories
     * 
     * @param array $fields 
     * return array
     */
    private function getProductCategories($fields = array()){
        $params = [
            'url' => '/api/category',
            'method' => 'GET',
            'style' => 'clean'
        ];

        return $this->makeCurlCall($params);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewData = [
            'actionButtons' => [
                [
                    'label' => 'Create new category',
                    'link' => '/product/category/new',
                    'css_class' => 'btn btn-primary'
                ]
            ],
            'dataTableHeading' => [
                'sl'=>'Sl',
                'title'=>'Name',
                'parentId' => 'Parent category',
                'status' => 'Status',
                'action' => 'Action'
            ],
            'dataTableItems' => []
        ];

        $params = [
            'url' => '/api/category',
            'method' => 'GET',
            'style' => 'clean'
        ];

        $apiResponse = $this->makeCurlCall($params);
        if(!empty($apiResponse)){
            $cnt = 1;
            foreach($apiResponse AS $k => $category){
                $viewData['dataTableItems'][] = [
                    'sl' => $cnt,
                    'title' => $category->title,
                    'parentId' => $category->parentId,
                    'status' => $category->status,
                    'action' => '<a href="/product/category/edit/'.$category->id.'"><i class="far fa-edit"></i></a><a href="/product/category/delete/'.$category->id.'"><i class="far fa-delete"></i></a>',
                ];
                $cnt++;
            }
        }

        return View('products.categories', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /* 
        Fetching categories 
        */
        $categories = [];
        $catRes = $this->getProductCategories();
        if (!empty($catRes)) {
            foreach($catRes AS $cat)
            $categories[$cat->id] = $cat->title;
        }
        $viewData = [
            'contentHeading' => 'Create new category',
            'actionButtons' => [
                'label' => 'Add category',
                'link' => '/product/category/new',
                'css_class' => 'btn btn-primary'
            ],
            'itemData' => [
                'parent' => $categories
            ]
        ];

        return View('products.category-new', $viewData);
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
            'url' => '/api/category',
            'method' => 'POST',
            'postFields' => [
                'traderCode' => env('TRADER'),
                'parentId' => $params['parentCategory'] ?? '0',
                'name' => strtolower($params['categoryTitle']) ?? '',
                'title' => $params['categoryTitle'] ?? '',
                'status' => $params['categoryStatus'] ?? ''
            ]
        ];
        $curlCallResp = $this->makeCurlCall($params);
        if(!empty($curlCallResp->statusCode) && $curlCallResp->statusCode == '2002'){
            Session::flash('info', 'Category saved successfully');
        }
        else{
            // LOG the error. json_encode($curlCallResp);
            Session::flash('error', 'Something went wrong. Please contact with Administrator');
        }
        return redirect()->route('getCategories');
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
