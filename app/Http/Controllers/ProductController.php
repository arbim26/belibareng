<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Satuan;
use App\Models\Pack;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $satuan = Satuan::all();
        $pack = Pack::all();
        return view('dashboards.admins.products.index', ['products' => $products, 'satuan' => $satuan, "pack" => $pack]);
    }

    /**
    * create
    *
    * @return void
    */
    public function create()
    {
        $satuan = Satuan::all();
        $pack = Pack::all();
        return view('dashboards.admins.products.create', ['satuan' => $satuan, "pack" => $pack]);
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
            // $this->validate($request, [
            //     'image'     => 'required|image|mimes:png,jpg,jpeg',
            //     'barang'    => 'required',
            //     'harga'     => 'required',
            //     'stock'     => 'required',
            //     'satuan_id' => 'required',
            //     'jumlah_id' => 'required',
            //     'pack_id'   => 'required',
            //     'content'   => 'required',
            // ]);

        $image = $request->file('image');
        $image->storeAs('public/products', $image->hashName());

        $product = Product::create([
            'image'         => $image->hashName(),
            'barang'        => $request->barang,
            'harga'         => $request->harga,
            'stock'         => $request->stock,
            'satuan_id'     => $request->satuan_id,
            'jumlah_pack'   => $request->jumlah_pack,
            'pack_id'       => $request->pack_id,
            'content'       => $request->content
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
    public function edit($id)
    {
        $product = Product::find($id);
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
        // dd($product);
        $request->validate([
            'barang'    => 'required',
            'harga'     => 'required',
            'stock'     => 'required',
            'content'   => 'required'
        ]);

        //get data Blog by ID
        $product = Product::findOrFail($product->id);

        if($request->file('image') == "") {
            $product = Product::find($product->id);
            $product->update($request->all());
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
            return redirect()->route('product.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('product.index')->with(['error' => 'Data Gagal Disimpan!']);
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
