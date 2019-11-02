<?php

namespace App\Http\Controllers;

use App\Data;
use Illuminate\Http\Request;
class DataController extends Controller
{
    public function index(){
        $data = Data::all();
        return response($data);
    }
    public function show($id){
        $data = Data::where('id',$id)->get();
        return response ($data);
    }
    public function store (Request $request){
        $data = new Data();
        $data->pH = $request->input('pH');
        $data->temperature = $request->input('temperature');
        $data->temperature = $request->input('status');
        $data->save();

        return response('Berhasil Tambah Data');
    }
    public function update(Request $request, $id){
        Data::where('id',$request->id)->update([
            'pH'=>$request->pH,
            'temperature'=>$request->temperature,
            'status'=>$request->status
        ]);

        return redirect('/todo');
    }

}
