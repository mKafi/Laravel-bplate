<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    
    /**
     * Getting reports dashboard
     */
    public function index(){
        return 'report dashboard';
    }

    /**
     * Getting sales report
     */
    public function salesReport(Request $request){
        return 'sales report'; 
    }


    /**
     * Getting product inventory report
     */
    public function inventoryReport(Request $request){
        return 'inventory report'; 
    }
}
