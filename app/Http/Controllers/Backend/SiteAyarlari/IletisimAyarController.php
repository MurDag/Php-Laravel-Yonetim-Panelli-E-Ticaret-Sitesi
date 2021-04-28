<?php

namespace App\Http\Controllers\Backend\SiteAyarlari;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ayars;
use Illuminate\Support\Str;

class IletisimAyarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ayar = Ayars::first();
        return view('backend.site_ayarlari.iletisim_ayarlari.index')->with('ayar',$ayar);
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
            'ayar_tel' => 'required',
            'ayar_gsm' => 'required',
            'ayar_faks' => 'required',
            'ayar_mail' => 'required|email',
            'ayar_ilce' => 'required',
            'ayar_il' => 'required',
            'ayar_adres' => 'required',
            'ayar_mesai' => 'required'
        ]);

        $update = Ayars::where('id', $id)->update(
            [
                "ayar_tel" => $request->ayar_tel,
                "ayar_gsm" => $request->ayar_gsm,
                "ayar_faks" => $request->ayar_faks,
                "ayar_mail" => $request->ayar_mail,
                "ayar_ilce" => $request->ayar_ilce,
                "ayar_il" => $request->ayar_il,
                "ayar_adres" => $request->ayar_adres,
                "ayar_mesai" => $request->ayar_mesai
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
