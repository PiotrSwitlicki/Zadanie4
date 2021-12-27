<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Group;

class SalesReportController extends Controller
{
    public function index()
    {
        return view('salesReport');
    } 

    public function getdata(Request $request)
    {	
    	//dd($request->daterange);
    	$date = explode(" - ", $request->daterange);
    	
    	$from = $date[0];
    	$to = $date[1];

    	$from=(date('Y-m-d',strtotime("$date[0]")));
    	$to=(date('Y-m-d',strtotime("$date[1]")));
    	//$from=str_replace("/","-",$from);
    	//$to=str_replace("/","-",$to);
    	//dd($from);

    	$order = Order::whereBetween('data', [$from, $to])->get();
	

        return view('salesReportShow')->with(['order' => $order]);
    }

    public function tally(Request $request)
    {   
        //dd($request->daterange);
   /*     $date = explode(" - ", $request->daterange);
        
        $from = $date[0];
        $to = $date[1];

        $from=(date('Y-m-d',strtotime("$date[0]")));
        $to=(date('Y-m-d',strtotime("$date[1]")));
        //$from=str_replace("/","-",$from);
        //$to=str_replace("/","-",$to);
        //dd($from);

        $order = Order::whereBetween('data', [$from, $to])->get();
    */
        $ordernineteennet = Order::whereBetween('data', ["2019-01-01", "2019-12-31"])->get();
        $ordertwentynet = Order::whereBetween('data', ["2020-01-01", "2020-12-31"])->get();
        $ordertwentyonenet = Order::whereBetween('data', ["2021-01-01", "2021-12-31"])->get();

        //dd($ordernineteennet);

        return view('salesTally')->with([ 'nineteen' => $ordernineteennet, 'twenty' => $ordertwentynet, 'twentyone' => $ordertwentyonenet ]);
    }  


}
