<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ShoesFormRequest;
use App\Models\Shoes;
use App\Models\Orders;

class ShoeController extends Controller
{
    public function index()
    {
        $shoes = Shoes::all();
        return view('shoes.index',compact('shoes'));
    }

    public function create()
    {
        return view('shoes.create');
    }

    public function store(ShoesFormRequest $request)
    {
        $data = $request->validated();

        $shoe = Shoes::create([
            'model_name' => $data['model_name'],
            'manufacturer_brand' => $data['manufacturer_brand'],
            'size' => $data['size'],
            'price' => $data['price'],
            'gender' => $data['gender']
        ]);
        return redirect('/shoes/addshoe')->with('message','Shoe Added Successfully!');
    }

    public function edit($id)
    {
        $id = Shoes::find($id);
        return view('shoes.edit', compact('id'));
    }

    public function update(ShoesFormRequest $request,$id)
    {
        $data = $request->validated();
        $shoe = Shoes::where('id',$id)->update([
            'model_name' => $data['model_name'],
            'manufacturer_brand' => $data['manufacturer_brand'],
            'size' => $data['size'],
            'price' => $data['price'],
            'gender' => $data['gender']
        ]);

        return redirect('/shoes/index')->with('message','Shoe updated Successfully!');
    }

    public function delete($id)
    {
        $shoe = Shoes::find($id)->delete();
        return redirect('/shoes/index')->with('message','Shoe deleted Successfully!');
    }

    
}
