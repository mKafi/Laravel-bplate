<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewData = [            
            'actionButtons' => [
                [
                    'label' => 'Create new supplier',
                    'link' => '/supplier/new',
                    'css_class' => 'btn btn-primary'
                ]
            ],
            'dataTableHeading' => [
                'sl'=>'Sl',
                'name'=>'Supplier name',
                'company'=>'Company',
                'contact' => 'Contact',                
                'activities' => 'Activities',
                'comment' => 'Comment',
                'action' => 'Action'
            ],
            'dataTableItems' => [
                [
                    'sl' => 1,                    
                    'name' => 'Faisal mahmud',
                    'company' => 'Uttara motors',
                    'contact' => '0142544122, 025414778514',
                    'activities' => '<a href="btn btn-block btn-primary btn-xs">Latest supply</a>',
                    'comment' => 'Lorium ipsome dolor sit amet',
                    'action' => '<a href=""><span class="fa fa-eye"></span></a>&nbsp;
                        <a href=""><span class="fa fa-edit"></span></a>&nbsp;
                        <a href=""><span class="fa fa-trash-alt"></span></a>'
                ],
                [
                    'sl' => 2,
                    'name' => 'Hasan mollah',
                    'company' => 'KCP Motors',
                    'contact' => '0142545487, 0254147254',
                    'activities' => '<a href="btn btn-block btn-primary btn-xs">Latest supply</a>',
                    'comment' => 'Lorium ipsome dolor sit amet',
                    'action' => '<a href=""><span class="fa fa-eye"></span></a>&nbsp;
                        <a href=""><span class="fa fa-edit"></span></a>&nbsp;
                        <a href=""><span class="fa fa-trash-alt"></span></a>'
                ],
                [
                    'sl' => 3,
                    'name' => 'Kabir habib',
                    'company' => 'Solo supplier',
                    'contact' => '01425856, 0254147254',
                    'activities' => '<a href="btn btn-block btn-primary btn-xs">Latest supply</a>',
                    'comment' => 'Lorium ipsome dolor sit amet',
                    'action' => '<a href=""><span class="fa fa-eye"></span></a>&nbsp;
                        <a href=""><span class="fa fa-edit"></span></a>&nbsp;
                        <a href=""><span class="fa fa-trash-alt"></span></a>'
                ],
                [
                    'sl' => 4,
                    'name' => 'AK Trading',
                    'company' => 'Solo supplier',
                    'contact' => '01454821, 026598521',
                    'activities' => '<a href="btn btn-block btn-primary btn-xs">Latest supply</a>',
                    'comment' => 'Lorium ipsome dolor sit amet',
                    'action' => '<a href=""><span class="fa fa-eye"></span></a>&nbsp;
                        <a href=""><span class="fa fa-edit"></span></a>&nbsp;
                        <a href=""><span class="fa fa-trash-alt"></span></a>'
                ],
                [
                    'sl' => 5,
                    'name' => 'MoonSoon Corp',
                    'company' => 'GeneralElectronics',
                    'contact' => '014526585, 02632659874',
                    'activities' => '<a href="btn btn-block btn-primary btn-xs">Latest supply</a>',
                    'comment' => 'Lorium ipsome dolor sit amet',
                    'action' => '<a href=""><span class="fa fa-eye"></span></a>&nbsp;
                        <a href=""><span class="fa fa-edit"></span></a>&nbsp;
                        <a href=""><span class="fa fa-trash-alt"></span></a>'
                ],
                [
                    'sl' => 6,
                    'name' => 'Hasibul sheikh',
                    'company' => 'Solo supplier',
                    'contact' => '032659852, 026254154',
                    'activities' => '<a href="btn btn-block btn-primary btn-xs">Latest supply</a>',
                    'comment' => 'Lorium ipsome dolor sit amet',
                    'action' => '<a href=""><span class="fa fa-eye"></span></a>&nbsp;
                        <a href=""><span class="fa fa-edit"></span></a>&nbsp;
                        <a href=""><span class="fa fa-trash-alt"></span></a>'
                ]
            ]
        ];

        $params = [
            'url' => '/api/suppliers',
            'method' => 'GET'
        ];

        return View('supplier.suppliers', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
