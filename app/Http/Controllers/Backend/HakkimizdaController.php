<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Ayars;
use App\Models\Hakkimizdas;
use Illuminate\Http\Request;

class HakkimizdaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hakkimizda = Hakkimizdas::first();
        return view('backend.hakkimizda.index')->with('hakkimizda', $hakkimizda);
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
            'hakkimizda_baslik' => 'required',
            'hakkimizda_icerik' => 'required',
            'hakkimizda_video' => 'required',
            'hakkimizda_vizyon' => 'required',
            'hakkimizda_misyon' => 'required'
        ]);

        $update = Hakkimizdas::where('id', $id)->update(
            [
                "hakkimizda_baslik" => $request->hakkimizda_baslik,
                "hakkimizda_icerik" => $request->hakkimizda_icerik,
                "hakkimizda_video" => $request->hakkimizda_video,
                "hakkimizda_vizyon" => $request->hakkimizda_vizyon,
                "hakkimizda_misyon" => $request->hakkimizda_misyon
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
