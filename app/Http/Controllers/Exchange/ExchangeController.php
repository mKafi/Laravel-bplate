<?php

namespace App\Http\Controllers\Exchange;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewData = [            
            'actionButtons' => [
                [
                    'label' => 'New exchange',
                    'link' => '/exchange/new',
                    'css_class' => 'btn btn-primary'
                ]
            ],
            'dataTableHeading' => [
                'sl'=>'Sl',
                'name'=>'Date',
                'contact' => 'Contact',
                'invoiceId' => 'Invoice ID',                
                'status' => 'Status',
                'action' => 'Action'
            ],
            'dataTableItems' => [
                [
                    'sl'=>1,
                    'name'=>'Harun mollah',
                    'contact' => '026598555',
                    'invoiceId' => 'AKM23070001006',                
                    'status' => 'Completed',
                    'action' => '<a href=""><span class="fa fa-eye"></span></a>&nbsp;
                        <a href=""><span class="fa fa-edit"></span></a>&nbsp;
                        <a href=""><span class="fa fa-trash-alt"></span></a>'
                ],
                [
                    'sl'=>2,
                    'name'=>'Gunpla meli',
                    'contact' => '02336525',
                    'invoiceId' => 'AKM23070001004',                
                    'status' => 'Completed',
                    'action' => '<a href=""><span class="fa fa-eye"></span></a>&nbsp;
                        <a href=""><span class="fa fa-edit"></span></a>&nbsp;
                        <a href=""><span class="fa fa-trash-alt"></span></a>'
                ]
            ]
        ];

        $params = [
            'url' => '/api/echanges',
            'method' => 'GET'
        ];

        return View('exchange.exchange', $viewData);
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
