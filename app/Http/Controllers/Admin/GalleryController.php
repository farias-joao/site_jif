<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function index()
    {
        return view('admin/gallery.index');
    }

    public function store(Request $request)
    {
        $gallery = new Gallery;
        $gallery->title = $request->title;

        if ($request->hasFile('imgUp')) {
            if ($gallery->path) {
                $name = $gallery->path;
            } else {
                $name = $gallery->id . kebab_case($gallery->title);

                $extension = $request->imgUp->extension();
                $nameFile = "{$name}.{$extension}";
                $gallery->path = $nameFile;

                $request->imgUp->storeAs('images/gallery', $nameFile);
            }
        }


        $gallery->save();
        $request->session()->flash('alert-success', 'Imagem adicionada com sucesso!');
        return redirect()->route('admin.users.index');
    }
}
