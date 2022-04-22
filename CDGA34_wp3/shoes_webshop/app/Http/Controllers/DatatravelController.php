<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class DatatravelController extends Controller
{
    public function index()
    {
        return view('datatravel.upload');
    }

    public function store(Request $request)
    {
        $data = new file();

        $file=$request->file;

        $filename=time().'.'.$file->getClientOriginalExtension();

        $request->file->move('assets',$filename);

        $data->file=$filename;

        $data->name=$request->name;
        $data->description=$request->description;

        $data->save();
        return redirect()->back();
    }

    public function show()
    {
        $data=file::all();
        return view('datatravel.show',compact('data'));
    }

    public function download()
    {
        return response()->download(public_path('assets/.$file'));
    }

    public function view($id)
    {
        $data=file::find($id);

        return view('datatravel.view',compact('data'));
    }
}
