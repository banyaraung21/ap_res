<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Dish;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * 
     */
    public function __construct() {
        return $this->middleware('auth');
    }
    
    public function index()
    {
        $dishes = Dish::all();
        $rawstatus = config('res.order_status');
        $status = array_flip($rawstatus);
        $order = Order::where('status',5)->orderBy("id","desc")->get();
        return view('order_form',compact('dishes','order','status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = array_filter($request->except('_token'));
        $tableId = 1;
        $orderId = rand();
        foreach ($data as $key => $value){
             if($value > 1){
                for($i = 1; $i < $value;$i++){
                    $order = new Order();
                    $order->order_id = $orderId;
                    $order->dish_id = $key;
                    $order->table_id = $tableId;
                    $order->status = config('res.order_status.new');

                    $order->save();
                    
                }
             }else {
                    $order = new Order();
                    $order->order_id = $orderId;
                    $order->dish_id = $key;
                    $order->table_id = $tableId;
                    $order->status = config('res.order_status.new');
                    $order->save();
             }
        }
        return redirect("order")->with("message","order upload is successfully");
           
    }

}
