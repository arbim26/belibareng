<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('dashboards.admins.products.index', compact('products'));
    }

    /**
    * create
    *
    * @return void
    */
    public function create()
    {
        return view('dashboards.admins.products.create');
    }


    /**
    * store
    *
    * @param  mixed $request
    * @return void
    */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'barang'    => 'required',
            'harga'     => 'required',
            'stock'     => 'required',
            'content'   => 'required'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/products', $image->hashName());

        $product = Product::create([
            'image'     => $image->hashName(),
            'barang'    => $request->barang,
            'harga'     => $request->harga,
            'stock'     => $request->stock,
            'content'   => $request->content
        ]);

        if($product){
            //redirect dengan pesan sukses
            return redirect()->route('product.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('product.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
    /**
    * edit
    *
    * @param  mixed $blog
    * @return void
    */
    public function edit(Product $product)
    {
        return view('dashboards.admins.products.edit', compact('product'));
    }


    /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $blog
    * @return void
    */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'barang'    => 'required',
            'harga'     => 'required',
            'stock'     => 'required',
            'content'   => 'required'
        ]);

        //get data Blog by ID
        $product = Product::findOrFail($product->id);

        if($request->file('image') == "") {

            $product->update([
                'image'     => $image->hashName(),
                'barang'    => $request->barang,
                'harga'     => $request->harga,
                'stock'     => $request->stock,
                'content'   => $request->content
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/products/'.$product->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/products', $image->hashName());

            $product->update([
                'image'     => $image->hashName(),
                'barang'    => $request->barang,
                'harga'     => $request->harga,
                'stock'     => $request->stock,
                'content'   => $request->content
            ]);

        }

        if($product){
            //redirect dengan pesan sukses
            return redirect()->route('product.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('product.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }
    /**
    * destroy
    *
    * @param  mixed $id
    * @return void
    */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        Storage::disk('local')->delete('public/products/'.$product->image);
        $product->delete();
        
        if($product){
            //redirect dengan pesan sukses
            return redirect()->route('product.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('product.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
