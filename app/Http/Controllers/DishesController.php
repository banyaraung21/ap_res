<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\DishCreateRequest;
;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dish::latest()->get();
        return view('kitchen.dish',compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('kitchen.dishcreate',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DishCreateRequest $request)
        {
            $dish = new Dish();
            $dish->name = $request->name;
            $dish->category_id = $request->category;

            $imageName = date('YmdHis') . "." . request()->dish_image->getClientOriginalExtension();
            request()->dish_image->move(public_path('images'), $imageName);

            $dish->dish_image = $imageName;
            $dish->save();

            return redirect('dish')->with('message','Dish created succesfully');
        }
    

    /**
     * Display the specified resource.
     */
    public function show(string $dish)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($dish)
    {
        $dish = Dish::find($dish);
        $categories = Category::all();
        // dd("$categories->dish->name");
        return view('kitchen.dishedit',compact('categories','dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dish $dish)
    {
        request()->validate([
            'name' => 'required',
            'category' => 'required',
            'dish_image' =>'required',
        ]);
        $dish->name = $request->name;
        $dish->category_id = $request->category;

        if($request->dish_image){
            $imageName = date('YmdHis') . "." . request()->dish_image->getClientOriginalExtension();
            request()->dish_image->move(public_path('images'), $imageName);
            $dish->dish_image = $imageName;
        }

        $dish->save();
        
        return redirect('dish')->with('message','Dish updated succesfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($dish)
    {
        $dish = Dish::findOrFail($dish);
        $dish->delete();

        return redirect('/dish')->with('success', 'Dish deleted successfully.');
    }

    public function order() {
        $rawstatus = config('res.order_status');
        $status = array_flip($rawstatus);
        $order = Order::whereIn('status',[1,2])->orderBy("id","desc")->get();
        return view('kitchen.order',compact('order','status'));
    }

    public function approve(Order $order) {
        $order->status = config('res.order_status.processing');
        $order->save();
        return redirect("order")->with("message","Order Approved");
    }

        public function cancel(Order $order) {
        $order->status = config('res.order_status.cancel');
        $order->save();
        return redirect("order")->with("message","Order Approved");
    }

        public function ready(Order $order) {
        $order->status = config('res.order_status.ready');
        $order->save();
        return redirect("home")->with("message","Order Approved");
    }
}
