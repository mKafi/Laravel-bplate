<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Database\Seeders\ProductSeeder;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{
    /**
     * $curlParams = [
     *  'url' => '',
     *  'method' => '',
     *  'header' => []
     * ]
     */
    public function makeCurlCall($curlParams){
        $apiResponse = [];
        $url = !empty($curlParams['url']) ? $curlParams['url'] : '';
        $callMethod = !empty($curlParams['method']) ? $curlParams['method'] : '';
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
            echo $curl_error;
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
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewData = [
            'actionButtons' => [
                [
                    'label' => 'Add product',
                    'link' => '/product/new',
                    'css_class' => 'btn btn-primary'
                ]
            ],
            'dataTableHeading' => [
                'sl'=>'Sl',
                'title'=>'Title',
                'wholesalePrice'=>'Base price',
                'retailPrice' => 'Retail price',
                'specialPrice' => 'Special price',
                'qty' => 'Stock',
                'lotId' => 'Lot Id',
                'tags' => 'Tags',
                'action' => 'Action',
            ],
            'dataTableItems' => []
        ];

        $params = [
            'url' => '/api/products',
            'method' => 'GET',
            'style' => 'clean'
        ];

        $apiResponse = $this->makeCurlCall($params);
        $cnt = 1;
        $productList = [];
        foreach ($apiResponse as $k => $product) {
            $productList[] = [
                'sl' => $cnt,
                'title' => $product->productTitle,
                'wholesalePrice' => $product->wholesellPrice,
                'retailPrice' => $product->retailPrice,
                'specialPrice' => $product->specialPrice,
                'qty' => $product->initialUnit, 
                'lotId' => $product->lotNumber,
                'tags' => $product->tags,
                'action' => '<a href="/product/view/'.$product->id.'"><i class="far fa-eye"></i></a>&nbsp;<a href="/product/edit/'.$product->id.'"><i class="far fa-edit"></i></a>&nbsp;<a href="/product/delete/'.$product->id.'"><i class="far fa-trash-alt"></i></a>',
            ];
            $cnt++;
        }
        $viewData['dataTableItems'] = $productList;

        return View('products.products', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodCats = $prdTags = [];
        $categories = $this->makeCurlCall([
            'url' => '/api/category',
            'method' => 'GET',
            'style' => 'clean'
        ]);
        if (!empty($categories)) {
            foreach ($categories as $category) {
                $prodCats[$category->id] = $category->title;
            }
        }

        $viewData = [
            'contentHeading' => 'Create new product',
            'actionButtons' => [
                'label' => 'Add product',
                'link' => '/product/new',
                'css_class' => 'btn btn-primary'
            ],
            'itemData' => [
                'categories' => $prodCats,
                'prdTags' => $prdTags
            ]
        ];

        return View('products.product-new', $viewData);
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
                'url' => '/api/products',
                'method' => 'POST',
                'postFields' => $postFields
            ];
            $curlCallResp  = json_decode($this->makeCurlCall($params));
            if(!empty($curlCallResp->statusCode) && $curlCallResp->statusCode == '2002'){
                Session::flash('info', 'Product created successfully');
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
        return redirect()->route('productList');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {        
        $viewData = [
            'contentHeading' => 'Item details',
            'actionButtons' => [
                [
                    'label' => 'Add product',
                    'link' => '/product/new',
                    'css_class' => 'btn btn-primary'
                ]
            ]
        ];

        $params = [
            'url' => '/api/products/'.$id,
            'method' => 'GET'
        ];

        if(!empty($curlResponse)){
            $apiResponse = json_decode($curlResponse);
            if(!empty($apiResponse->statusCode) && $apiResponse->statusCode == 2002){
                $viewData['itemData'] = $apiResponse;
            }
        }
        return View('products.details', $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {        
        $params = [
            'url' => '/api/products/'.$id,
            'method' => 'GET',
            'header' => 'trader:2'
        ];
        $prdCurlResp  = $this->makeCurlCall($params);

        $itemTags = $productTags = [];
        if(!empty($prdCurlResp->product->tags)){
            $itemTags = explode(',', $prdCurlResp->product->tags);
        }
        if(!empty($prdCurlResp->productTags->tags)){
            $productTags = explode(',',$prdCurlResp->productTags->tags);
        }

        $viewData = [
            'contentHeading' => 'Update product',
            'actionButtons' => [],
            'itemData' => [
                'product' => $prdCurlResp->product,
                'itemTags' => $itemTags,
                'productTags' => $productTags,
                'productMeta' => $prdCurlResp->productMeta,
            ]
        ];
        return View('products.product-edit', $viewData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {        
        $apiResponse = [];
        $postFields = $request->all();        
        if(!empty($postFields['productId'])){
            unset($postFields['token']);
            $params = [
                'url' => '/api/products/'.$postFields['productId'],
                'method' => 'PUT',
                'postFields' => $postFields         
            ];
            $curlCallResp  = json_decode($this->makeCurlCall($params));
            if(!empty($curlCallResp->statusCode) && $curlCallResp->statusCode == '2002'){   
                Session::flash('info', 'Product updated successfully'); 
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
        return redirect()->route('productList');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        echo 'TF: '.$id;
    }
}
