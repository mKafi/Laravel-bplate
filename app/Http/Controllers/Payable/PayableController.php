<?php

namespace App\Http\Controllers\Payable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewData = [            
            'actionButtons' => [
                [
                    'label' => 'New payable',
                    'link' => '/receivable/new',
                    'css_class' => 'btn btn-primary'
                ]
            ],
            'dataTableHeading' => [
                'sl'=>'Sl',
                'name'=>'To',
                'contact' => 'Contact',      
                'address' => 'Address',
                'reference' => 'Reference',
                'payableAmount' => 'Amount',
                'lastDate' => 'Last date',                
                'status' => 'Status',
                'action' => 'Action'
            ],
            'dataTableItems' => [
                [
                    'sl' => 1,                    
                    'name'=>'Hasan mollah',
                    'contact'=>'01485121251',
                    'address' => 'Lane 25, Klsadfls',
                    'reference' => 'Mofizer baba',
                    'payableAmount' => '1200',
                    'lastDate' => '22-08-2023',                             
                    'status' => 'Pending',
                    'action' => '<a href=""><span class="fa fa-eye"></span></a>&nbsp;
                        <a href=""><span class="fa fa-edit"></span></a>&nbsp;
                        <a href=""><span class="fa fa-trash-alt"></span></a>'
                ],
                [
                    'sl' => 2,                    
                    'name'=>'Khogen sheikh',
                    'contact'=>'01485121251',
                    'address' => 'Lane 25, Klsadfls',
                    'reference' => 'Bokel Enterprise',
                    'payableAmount' => '520',
                    'lastDate' => '22-10-2023',                             
                    'status' => 'Pending',
                    'action' => '<a href=""><span class="fa fa-eye"></span></a>&nbsp;
                        <a href=""><span class="fa fa-edit"></span></a>&nbsp;
                        <a href=""><span class="fa fa-trash-alt"></span></a>'
                ],
                [
                    'sl' => 3,                    
                    'name'=>'Master sobi',
                    'contact'=>'01485121251',
                    'address' => 'Lane 25, Klsadfls',
                    'reference' => 'Singra traders',
                    'payableAmount' => '1200',
                    'lastDate' => '11-07-2023',                             
                    'status' => 'Pending',
                    'action' => '<a href=""><span class="fa fa-eye"></span></a>&nbsp;
                        <a href=""><span class="fa fa-edit"></span></a>&nbsp;
                        <a href=""><span class="fa fa-trash-alt"></span></a>'
                ]
            ]
        ];

        $params = [
            'url' => '/api/payables',
            'method' => 'GET'
        ];

        return View('payable.payable', $viewData);
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
