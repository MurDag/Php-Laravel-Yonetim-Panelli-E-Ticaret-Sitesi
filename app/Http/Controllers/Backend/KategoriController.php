<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kategoris;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategoris::all();
        return view('backend.kategori.index')->with('kategori', $kategori);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.kategori.create');
    }

    public function delete_kategori ($id)
    {
        $delete=Kategoris::where('id',$id)->delete();
        if ($delete)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    public function change_durum($id,$durum)
    {
        if ($durum=="aktif")
        {
            $changeDurum=Kategoris::where('id',$id)
                ->update([
                   "kategori_durum" => '0'
                ]);
            if ($changeDurum){ echo 1; }
            else { echo 0; }
        }

        if ($durum=="pasif")
        {
            $changeDurum=Kategoris::where('id',$id)
                ->update([
                    "kategori_durum" => '1'
                ]);
            if ($changeDurum){ echo 1; }
            else { echo 0; }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->flash();

        $request->validate([
            "kategori_ad" => "required",
            "kategori_sira" => "required",
            "kategori_durum" => "required",
        ]);

        $insert=Kategoris::insert([
           "kategori_ad" => $request->kategori_ad,
           "kategori_sira" => $request->kategori_sira,
           "kategori_durum" => $request->kategori_durum,
           "kategori_seourl" => Str::slug($request->kategori_ad),
        ]);

        if ($insert)
        {
            return redirect(route('kategori.index'))->with('success','İşlem Başarılı');
        }
        else
        {
            return back()->with('error','İşlem Başarısız');
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
        $kategori = Kategoris::where('id',$id)->first();
        return view('backend.kategori.edit')->with('kategori', $kategori);
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
        $request->flash();

        $request->validate([
            "kategori_ad" => "required",
            "kategori_sira" => "required",
            "kategori_durum" => "required",
        ]);

        $update=Kategoris::where('id',$id)
        ->update([
            "kategori_ad" => $request->kategori_ad,
            "kategori_sira" => $request->kategori_sira,
            "kategori_durum" => $request->kategori_durum,
            "kategori_seourl" => Str::slug($request->kategori_ad),
        ]);

        if ($update)
        {
            return redirect(route('kategori.index'))->with('success','Güncelleme Başarılı');
        }
        else
        {
            return back()->with('error','Güncelleme Başarısız');
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
        //
    }
}
