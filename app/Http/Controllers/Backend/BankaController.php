<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bankas;
use Illuminate\Http\Request;

class BankaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banka=Bankas::all();
        return view('backend.banka.index')->with('banka',$banka);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banka.create');
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
            'banka_ad' => 'required',
            'banka_iban' => 'required',
            'kullanici_id' => 'required',
            'banka_durum' => 'required',
        ]);

        $update=Bankas::insert([
            "banka_ad" => $request->banka_ad,
            "banka_iban" => $request->banka_iban,
            "kullanici_id" => $request->kullanici_id,
            "banka_durum" => $request->banka_durum,
        ]);

        if ($update) {
            return redirect(route('banka.index'))->with('success', 'Düzenleme İşlemi Başarılı');
        } else {
            return back()->with('error', 'İşlem Başarısız');
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
        $banka=Bankas::where('id',$id)->first();
        return view('backend.banka.edit')->with('banka',$banka);
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
            'banka_ad' => 'required',
            'banka_iban' => 'required',
            'kullanici_id' => 'required',
            'banka_durum' => 'required',
        ]);

        $update=Bankas::where('id',$id)
        ->update([
            "banka_ad" => $request->banka_ad,
            "banka_iban" => $request->banka_iban,
            "kullanici_id" => $request->kullanici_id,
            "banka_durum" => $request->banka_durum,
        ]);

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
        $delete = Bankas::where('id', $id)->delete();
        if ($delete) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function change_durum($id, $durum)
    {
        if ($durum == "aktif") {
            $update = Bankas::where('id', $id)
                ->update([
                    "banka_durum" => '0'
                ]);
            if ($update) {
                return back()->with('success', 'İşlem Başarılı');
            } else {
                return back()->with('success', 'İşlem Başarısız');
            }
        }

        if ($durum == "pasif") {
            $update = Bankas::where('id', $id)
                ->update([
                    "banka_durum" => '1'
                ]);
            if ($update) {
                return back()->with('success', 'İşlem Başarılı');
            } else {
                return back()->with('success', 'İşlem Başarısız');
            }
        }
    }
}
