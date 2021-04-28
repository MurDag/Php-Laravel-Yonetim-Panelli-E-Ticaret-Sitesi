<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kullanicis;
use Illuminate\Http\Request;

class KullaniciController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kullanici = Kullanicis::all();
        return view('backend.kullanici.index')->with('kullanici', $kullanici);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->flash();

        $request->validate([
            'kullanici_ad' => 'required',
            'kullanici_soyad' => 'required',
            'kullanici_mail' => 'required|email',
            'kullanici_password' => 'required',
            'kullanici_tc' => 'required',
            'kullanici_gsm' => 'required|numeric|digits:11',
            'kullanici_il' => 'required',
            'kullanici_ilce' => 'required',
            'kullanici_adres' => 'required',
            'kullanici_unvan' => 'required',
            'kullanici_yetki' => 'required',
            'kullanici_durum' => 'required',
        ]);


        if (isset($request->kullanici_resim)) {
            $request->validate([
               'kullanici_resim' => 'mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid() . '.' . $request->kullanici_resim->getClientOriginalExtension();
            $request->kullanici_resim->move(public_path('images/backend/users/'), $file_name);
            $request->kullanici_resim = $file_name;


            $insert = Kullanicis::insert(
                [
                    "kullanici_ad" => $request->kullanici_ad,
                    "kullanici_soyad" => $request->kullanici_soyad,
                    "kullanici_mail" => $request->kullanici_mail,
                    "kullanici_password" => $request->kullanici_password,
                    "kullanici_tc" => $request->kullanici_tc,
                    "kullanici_gsm" => $request->kullanici_gsm,
                    "kullanici_il" => $request->kullanici_il,
                    "kullanici_ilce" => $request->kullanici_ilce,
                    "kullanici_adres" => $request->kullanici_adres,
                    "kullanici_unvan" => $request->kullanici_unvan,
                    "kullanici_yetki" => $request->kullanici_yetki,
                    "kullanici_durum" => $request->kullanici_durum,
                    "kullanici_resim" => $request->kullanici_resim,
                    "created_at" => date('Y-m-d H:i:s'),
                ]
            );

            if ($insert) {
                return redirect(route('kullanici.index'))->with('success', 'Kullanıcı Ekleme Başarılı!');
            } else {
                return back()->with('error', 'Kullanıcı Ekleme Başarısız');
            }

        } else {

            $insert = Kullanicis::insert(
                [
                    "kullanici_ad" => $request->kullanici_ad,
                    "kullanici_soyad" => $request->kullanici_soyad,
                    "kullanici_mail" => $request->kullanici_mail,
                    "kullanici_password" => $request->kullanici_password,
                    "kullanici_tc" => $request->kullanici_tc,
                    "kullanici_gsm" => $request->kullanici_gsm,
                    "kullanici_il" => $request->kullanici_il,
                    "kullanici_ilce" => $request->kullanici_ilce,
                    "kullanici_adres" => $request->kullanici_adres,
                    "kullanici_unvan" => $request->kullanici_unvan,
                    "kullanici_yetki" => $request->kullanici_yetki,
                    "kullanici_durum" => $request->kullanici_durum,
                    "created_at" => date('Y-m-d H:i:s'),
                ]
            );

            if ($insert) {
                return redirect(route('kullanici.index'))->with('success', 'Kullanıcı Ekleme Başarılı!');
            } else {
                return back()->with('error', 'Kullanıcı Ekleme Başarısız');
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kullanici = Kullanicis::where('id', $id)->first();

        return view('backend.kullanici.edit')->with('kullanici', $kullanici);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kullanici_ad' => 'required',
            'kullanici_soyad' => 'required',
            'kullanici_mail' => 'required|email',
            'kullanici_password' => 'required',
            'kullanici_tc' => 'required',
            'kullanici_gsm' => 'required|numeric|digits:11',
            'kullanici_il' => 'required',
            'kullanici_ilce' => 'required',
            'kullanici_adres' => 'required',
            'kullanici_unvan' => 'required',
            'kullanici_yetki' => 'required',
            'kullanici_durum' => 'required',
        ]);

        if (isset($request->kullanici_resim)) {



            $request->validate([
                'kullanici_resim' => 'required|mimes:jpeg,jpg,png|max:2048'
            ]);

            $file_name = uniqid() . '.' . $request->kullanici_resim->getClientOriginalExtension();
            $request->kullanici_resim->move(public_path('images/backend/users'), $file_name);
            $request->kullanici_resim = $file_name;

            $update = Kullanicis::where('id', $id)
                ->update(
                    [
                        "kullanici_ad" => $request->kullanici_ad,
                        "kullanici_soyad" => $request->kullanici_soyad,
                        "kullanici_mail" => $request->kullanici_mail,
                        "kullanici_password" => $request->kullanici_password,
                        "kullanici_tc" => $request->kullanici_tc,
                        "kullanici_gsm" => $request->kullanici_gsm,
                        "kullanici_il" => $request->kullanici_il,
                        "kullanici_ilce" => $request->kullanici_ilce,
                        "kullanici_adres" => $request->kullanici_adres,
                        "kullanici_unvan" => $request->kullanici_unvan,
                        "kullanici_yetki" => $request->kullanici_yetki,
                        "kullanici_durum" => $request->kullanici_durum,
                        "kullanici_resim" => $request->kullanici_resim,
                    ]
                );

            if ($update) {
                if (isset($request->eski_resim)) {
                    $path = 'images/backend/users/' . $request->eski_resim;
                    if (file_exists($path)) {
                        @unlink(public_path($path));
                    }
                    return back()->with('success', 'Düzenleme İşlemi Başarılı');
                }
                return back()->with('success', 'Düzenleme İşlemi Başarılı');
            } else {
                return back()->with('error', 'İşlem Başarısız');
            }

        } else {

            $update = Kullanicis::where('id', $id)->update(
                [
                    "kullanici_ad" => $request->kullanici_ad,
                    "kullanici_soyad" => $request->kullanici_soyad,
                    "kullanici_mail" => $request->kullanici_mail,
                    "kullanici_password" => $request->kullanici_password,
                    "kullanici_tc" => $request->kullanici_tc,
                    "kullanici_gsm" => $request->kullanici_gsm,
                    "kullanici_il" => $request->kullanici_il,
                    "kullanici_ilce" => $request->kullanici_ilce,
                    "kullanici_adres" => $request->kullanici_adres,
                    "kullanici_unvan" => $request->kullanici_unvan,
                    "kullanici_yetki" => $request->kullanici_yetki,
                    "kullanici_durum" => $request->kullanici_durum,
                ]
            );
            if ($update) {
                return redirect(route('kullanici.index'))->with('success', 'İşlem Başarılı');
            } else {
                return back()->with('error', 'İşlem Başarısız');
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kullanici = Kullanicis::find(intval($id));
        $eski_resim=$kullanici->kullanici_resim;
        if ($kullanici->delete()) {
            $path = 'images/backend/users/' . $eski_resim;
            if (file_exists($path)) {
                @unlink(public_path($path));
            }
            echo 1;
        } else {
            echo 0;
        }
    }
}
