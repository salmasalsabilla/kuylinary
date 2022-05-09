<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarMenu;
use App\Models\Admin;


class DaftarRestoranController extends Controller
{
    public function index(){
        $data=DaftarRestoran::all();
        return view('DaftarRestoran.indexlist',['data'=>$data]);
    }

    public function create(){
        $LokasiRestoran=DaftarRestoran::all();
        return view('DaftarRestoran.createlist',['LokasiRestoran'=>$LokasiRestoran]);
    }

    public function store(Request $request){
        $data=new DaftarRestoran;
        $data->drestoran=$request->drestoran;
        $data->dmakanan=$request->dmakanan;
        $data->lokasi=$request->lokasi;
        $data->save();

        return redirect('admin/DaftarRestoran/createlist')->with('success', 'Sucessfully added.');
    }

    public function show($id){
        $data=DaftarRestoran::find($id);
        return view('DaftarRestoran.showlist',['data'=>$data]);
    }

    public function edit($id){
        $LokasiRestoran=DaftarRestoran::all();
        $data=DaftarRestoran::find($id);
        return view('DaftarRestoran.editlist',['data'=>$data,'LokasiRestoran'=>$LokasiRestoran]);
    }

    public function update(Request $request, $id){
        $data=new DaftarRestoran;
        $data->drestoran=$request->drestoran;
        $data->dmakanan=$request->dmakanan;
        $data->lokasi=$request->lokasi;
        $data->save();

        return redirect('admin/DaftarRestoran/')->with('success', 'Sucessfully updated');
    }

    public function destroy($id){
        DaftarRestoran::where('id',$id)->delete();
        return redirect('admin/DaftarRestoran')->with('success', 'Sucessfully Deleted');
    }
}
