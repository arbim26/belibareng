<?php
 
namespace App\Http\Controllers;
 
use Session;
Use Storage;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ArtikelController;
 
class ArtikelController extends Controller
{
    public function show()
    {
        $articles = DB::table('artikel')->orderby('id', 'desc')->get();
        return view('dashboards.admins.show', ['articles'=>$articles]);
    }

    public function detail($id)
    {
        $article = DB::table('artikel')->where('id', $id)->first();
        return view('dashboards.admins.detail', ['article'=>$article]);
    }

    public function show_by_admin()
    {
        $artikel = Artikel::latest()->paginate(10);
        return view('dashboards.admins.adminshow', compact('artikel'));
    }


        /**
    * create
    *
    * @return void
    */
    public function addartikel()
    {
        return view('dashboards.admins.addartikel');
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'image'     => 'required|image|mimes:png,jpg,jpeg',
        //     'title'     => 'required',
        //     'content'   => 'required'
        // ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/artikels', $image->hashName());

        $blog = Artikel::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        if($blog){
            //redirect dengan pesan sukses
            return redirect()->route('admin')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit($id)
    {
        $data = Artikel::find($id);
        return view('dashboards.admins.edit', compact('data'));
    }


    /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $blog
    * @return void
    */
    public function update(Request $request, Artikel $artikel, $id)
        {
        // dd($artikel);
        // $this->validate($request, [
        //     'title'     => 'required',
        //     'content'   => 'required'
        // ]);

        //get data Blog by ID


        // if($request->hasFile('dokumentasi')){
        //     $request->file('dokumentasi')->move('fotobukti/', $request->file('dokumentasi')->getClientOriginalName());
        //     $artikel->dokumentasi = $request->file('dokumentasi')->getClientOriginalName();
        //     $artikel->save(); 
        // }
        $artikel = Artikel::findOrFail($id);

        if($request->file('image') == "") {
            $artikel = Artikel::find($id);
            $artikel->update($request->all());
        } else {

            //hapus old image
            Storage::disk('local')->delete('public/artikel/'.$artikel->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/artikels', $image->hashName());

            $artikel->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content
            ]);

        }

        if($artikel){
            //redirect dengan pesan sukses
            return redirect()->route('admin')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin')->with(['error' => 'Data Gagal Diupdate!']);
        }

    }

    public function destroy($id)
    {
      $artikel = Artikel::findOrFail($id);
      Storage::disk('local')->delete('public/artikels/'.$artikel->image);
      $artikel->delete();
    
      if($artikel){
         //redirect dengan pesan sukses
         return redirect()->route('admin')->with(['success' => 'Data Berhasil Dihapus!']);
      }else{
        //redirect dengan pesan error
        return redirect()->route('admin')->with(['error' => 'Data Gagal Dihapus!']);
      }
    }
}