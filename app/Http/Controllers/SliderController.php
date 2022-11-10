<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $sliders = Slider::latest()->paginate(10);
        return view('dashboards.admins.sliders.index', compact('sliders'));
    }

    /**
    * create
    *
    * @return void
    */
    public function create()
    {
        return view('dashboards.admins.sliders.create');
    }


    /**
    * store
    *
    * @param  mixed $request
    * @return void
    */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/sliders', $image->hashName());

        $slider = Slider::create([
            'image'     => $image->hashName(),
        ]);

        if($slider){
            //redirect dengan pesan sukses
            return redirect()->route('slider.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('slider.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
    /**
    * edit
    *
    * @param  mixed $blog
    * @return void
    */
    public function edit(Slider $slider)
    {
        return view('dashboards.admins.sliders.edit', compact('slider'));
    }


    /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $blog
    * @return void
    */
    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, [
            'image'    => 'required',
        ]);

        //get data Blog by ID
        $slider = Slider::findOrFail($slider->id);

        if($request->file('image') == "") {

            $slider->update([
                'image'     => $image->hashName(),
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/products/'.$slider->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/sliders', $image->hashName());

            $slider->update([
                'image'     => $image->hashName(),
            ]);

        }

        if($slider){
            //redirect dengan pesan sukses
            return redirect()->route('slider.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('slider.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $slider = Slider::findOrFail($id);
        Storage::disk('local')->delete('public/sliders/'.$slider->image);
        $slider->delete();
        
        if($slider){
            //redirect dengan pesan sukses
            return redirect()->route('slider.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('slider.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
