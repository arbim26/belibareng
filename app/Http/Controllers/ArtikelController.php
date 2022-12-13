<?php
 
namespace App\Http\Controllers;
 
use Session;
Use Storage;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ArtikelController;
 
class ArtikelController extends Controller
{
    // admin
    public function index()
    {
        $artikel = Artikel::latest()->paginate(5);
        return view('dashboards.admins.artikels.index', compact('artikel'));
    }

        /**
    * create
    *
    * @return void
    */
    public function create()
    {
        return view('dashboards.admins.artikels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'title'     => 'required',
            'content'   => 'required'
        ]);

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
            return redirect()->route('artikel.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('artikel.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit($id)
    {
        $data = Artikel::find($id);
        return view('dashboards.admins.artikels.edit', compact('data'));
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
        $request->validate([
            'title'     => 'required',
            'content'   => 'required'
        ]);
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
            return redirect()->route('artikel.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('artikel.index')->with(['error' => 'Data Gagal Diupdate!']);
        }

    }

    public function destroy(Artikel $artikel, $id)
    {
      $artikel = Artikel::findOrFail($id);
      Storage::disk('local')->delete('public/artikels/'.$artikel->image);
      $artikel->delete();
    
      if($artikel){
         //redirect dengan pesan sukses
         return redirect()->route('artikel.index')->with(['success' => 'Data Berhasil Dihapus!']);
      }else{
        //redirect dengan pesan error
        return redirect()->route('artikel.index')->with(['error' => 'Data Gagal Dihapus!']);
      }
    }

    public function filter(Request $request, Admin $admin)
    {
    //    $filter_text = $_GET['query'];
    //    $artikels = Artikel::where('title','LIKE','%' .$filter_text.'%')->with('blog')->get();
    
    //    return view('artikel.filter',compact('artikels'));
    // Search for a user based on their name.
    if ($request->has('title')) {
        return $admin->where('title', $request->input('title'))->get();
    }

    // Search for a user based on their company.
    if ($request->has('content')) {
        return $admin->where('content', $request->input('content'))
            ->get();
    }

    // Search for a user based on their city.
    if ($request->has('image')) {
        return $admin->where('image', $request->input('image'))->get();
    }

    // Continue for all of the filters.

    // No filters have been provided, so
    // let's return all users. This is
    // bad - we should paginate in
    // reality.
    return Admin::all();
    }
    // admin

}