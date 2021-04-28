<?php

namespace App\Http\Controllers\Backend\SiteAyarlari;

use App\Http\Controllers\Controller;
use App\Models\Ayars;
use Illuminate\Http\Request;

class SosyalAyarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ayar = Ayars::first();
        return view('backend.site_ayarlari.sosyal_ayarlar.index')->with('ayar', $ayar);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
            'ayar_facebook' => 'required',
            'ayar_twitter' => 'required',
            'ayar_youtube' => 'required',
            'ayar_google' => 'required',

        ]);


        $update = Ayars::where('id', $id)->update(
            [
                "ayar_facebook" => $request->ayar_facebook,
                "ayar_twitter" => $request->ayar_twitter,
                "ayar_youtube" => $request->ayar_youtube,
                "ayar_google" => $request->ayar_google,
            ]
        );
        if ($update) {
            return back()->with('success', 'Düzenleme İşlemi Başarılı');
        } else {
            return back()->with('error', 'İşlem Başarısız');
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
