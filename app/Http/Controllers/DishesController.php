<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\DishCreateRequest;

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
        $data = $request->validated();
    
        $dish = new Dish;
        $dish->name = $request->name;
        $dish->category_id = $request->category;
    
        if ($request->hasFile('dish_image')) {
            $file = $request->file('dish_image');
            $imageName = date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'),$imageName);
            $dish->dish_image = $imageName;
        }
        // dd("$dish");
    
        $dish->save();
    
        return redirect('dish')->with('success', 'Dish created successfully!');

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
    public function update(Request $request,Dish $dish)
    {
        request()->validate([
            'name' => 'required',
            'category' => 'required',
            
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
}
