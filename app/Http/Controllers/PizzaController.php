<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePizzaRequest;
use App\Http\Requests\UpdatePizzaRequest;
use App\Models\Pizza;
class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $allPizza = Pizza::Paginate(6);
        return view('pizza.index', compact('allPizza'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pizza.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePizzaRequest $request)
    {
        //
        $path = $request->image->store('public/pizza');
        Pizza::create([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'small_pizza_price' => $request->small_pizza_price,
            'medium_pizza_price' => $request->medium_pizza_price,
            'large_pizza_price' => $request->large_pizza_price,
            'image' => $path,
        ]);
        // dd($path);
        return redirect()->route('pizza.index')->with('message', 'Pizza created successfully');
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
        // dd($id);
        $pizza = Pizza::find($id);
        return view('pizza.edit', compact('pizza'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePizzaRequest $request, $id)
    {
        //
        $pizza = Pizza::find($id);
        $pizza = new Pizza;

        $pizza->name = $request->name;
        $pizza->description = $request->description;
        $pizza->category = $request->category;
        $pizza->small_pizza_price = $request->small_pizza_price;
        $pizza->medium_pizza_price = $request->medium_pizza_price;
        $pizza->large_pizza_price = $request->large_pizza_price;
        if ($request->has('image')) {
            $path = $request->image->store('public/pizza');
        }else{
            $path = $request->image;
        }
        $pizza->image = $path;
        $pizza->save();
        return redirect()->route('pizza.index')->with('message', 'Pizza Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Pizza::find($id)->delete();
        return redirect()->route('pizza.index')->with('message', 'Pizza Deleted Successfuly');
    }
}
