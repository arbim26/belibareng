<?php

namespace App\Http\Controllers;

use Session;
Use Storage;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Article::latest()->paginate(5);
        return view('dashboards.admins.articles.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboards.admins.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'title'     => 'required',
            'content'   => 'required',
            'date'      => 'required'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/artikels', $image->hashName());

        $blog = Article::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content,
            'date'      => $request->date
        ]);

        if($blog){
            //redirect dengan pesan sukses
            return redirect()->route('articles.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('articles.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $data = Article::find($id);
        return view('dashboards.admins.articles.edit', compact('data'));
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
        $request->validate([
            'title'     => 'required',
            'content'   => 'required',
            'date'      => 'required'
        ]);
        $artikel = Article::findOrFail($id);

        if($request->file('image') == "") {
            $artikel = Article::find($id);
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
                'content'   => $request->content,
                'date'      => $request->date
            ]);

        }

        if($artikel){
            //redirect dengan pesan sukses
            return redirect()->route('article.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('article.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Article::findOrFail($id);
        Storage::disk('local')->delete('public/artikels/'.$artikel->image);
        $artikel->delete();
      
        if($artikel){
           //redirect dengan pesan sukses
           return redirect()->route('article.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
          //redirect dengan pesan error
          return redirect()->route('article.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

    public function search(Request $request)
    {
        $artikel = Article::where([
            ['title', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->s)) {
                    $query->orWhere('title', 'LIKE', '%' . $s . '%')
                        ->orWhere('content', 'LIKE', '%' . $s . '%')
                        ->get();
                }
            }]
        ])->paginate(5);

        return view('dashboards.admins.articles.index', compact('artikel'));
    }
}
