<?php

namespace App\Http\Controllers;

use App\Models\Pack;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pack::latest()->paginate(10);
        return view('dashboards.admins.pack.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboards.admins.pack.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'pack'    => 'required',
        ]);
        $pack = Pack::create([
            'pack'    => $request->pack,
        ]);
        if($pack){
            //redirect dengan pesan sukses
            return redirect()->route('pack.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('pack.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pack::find($id);
        return view('dashboards.admins.pack.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'pack'=> 'required',
        ]);
        Pack::where('id', $id)->update([
            'pack' =>$request->pack,
        ]);        
        return redirect()->route('pack.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pack::find($id);
        $data->delete();
        return redirect()->route('satuan.index');
    }
}
