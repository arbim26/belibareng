<?php

namespace App\Http\Controllers;

use App\Models\Misi;
use App\Models\Visi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class VisimisiController extends Controller
{
    // visi
    public function showvisi()
    {
        $visi = Visi::latest()->get();
        return view('visi.index', compact('visi'));
    }

    public function addvisi()
    {
        return view('visi.add');
    }

    public function storevisi(Request $request)
    {
        $request->validate([
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'title'     => 'required',
            'content'   => 'required'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/visi', $image->hashName());

        $visi = Visi::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        if($visi){
            //redirect dengan pesan sukses
            return redirect()->route('visi')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('visi')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function editvisi($id)
    {
        $data = Visi::find($id);
        return view('visi.edit', compact('data'));
    }

    public function updatevisi(Request $request, Visi $visi, $id)
    {
    $request->validate([
        'title'     => 'required',
        'content'   => 'required'
    ]);
    $visi = Visi::findOrFail($id);

    if($request->file('image') == "") {
        $visi = Visi::find($id);
        $visi->update($request->all());
    } else {

        //hapus old image
        Storage::disk('local')->delete('public/visi/'.$visi->image);

        //upload new image
        $image = $request->file('image');
        $image->storeAs('public/visi', $image->hashName());

        $visi->update([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content
        ]);

    }

    if($visi){
        //redirect dengan pesan sukses
        return redirect()->route('visi')->with(['success' => 'Data Berhasil Diupdate!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('visi')->with(['error' => 'Data Gagal Diupdate!']);
    }
}
    // visi

    // misi
    public function showmisi()
    {
        $misi = Misi::latest()->get();
        return view('misi.index', compact('misi'));
    }

    public function addmisi()
    {
        return view('misi.add');
    }

    public function storemisi(Request $request)
    {
        $request->validate([
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'title'     => 'required',
            'content'   => 'required'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/misi', $image->hashName());

        $misi = Misi::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        if($misi){
            //redirect dengan pesan sukses
            return redirect()->route('misi')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('misi')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function editmisi($id)
    {
        $data = Misi::find($id);
        return view('visi.edit', compact('data'));
    }

    public function updatemisi(Request $request, Misi $misi, $id)
    {
    $request->validate([
        'title'     => 'required',
        'content'   => 'required'
    ]);
    $misi = Misi::findOrFail($id);

    if($request->file('image') == "") {
        $misi = Misi::find($id);
        $misi->update($request->all());
    } else {

        //hapus old image
        Storage::disk('local')->delete('public/misi/'.$visi->image);

        //upload new image
        $image = $request->file('image');
        $image->storeAs('public/misi', $image->hashName());

        $misi->update([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content
        ]);

    }

    if($misi){
        //redirect dengan pesan sukses
        return redirect()->route('misi')->with(['success' => 'Data Berhasil Diupdate!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('misi')->with(['error' => 'Data Gagal Diupdate!']);
    }
    // misi

}
}
