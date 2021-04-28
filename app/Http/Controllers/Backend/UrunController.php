<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kategoris;
use App\Models\Kullanicis;
use App\Models\UrunFotos;
use App\Models\Uruns;
use Illuminate\Http\Request;

class UrunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urun = Uruns::all();
        return view('backend.urun.index')->with('urun', $urun);
    }

    public function add_img(Request $request)
    {
        $image = $request->file('file');

        $file_name = uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('/images/backend/products/'), $file_name);

        Urunfotos::insert([
            "urun_id" => session('urun_id'),
            "urunfoto_resim" => $file_name
        ]);

        return response()->json(['success' => $file_name]);
    }

    public function delete_img(Request $request)
    {
        $delete = true;
        foreach ($request->urunfotosec as $item) {
            if (Urunfotos::where('urunfoto_resim', $item)->delete()) {
                $path = 'images/backend/products/' . $item;
                if (file_exists($path)) {
                    @unlink(public_path($path));
                }
            } else {
                $delete = false;
            }
        }

        if ($delete) {
            return back()->with('success', 'Silme işlemi başarılı !');
        } else {
            return back()->with('error', 'Silme işlemi başarısız !');
        }
    }

    public function create_img($id)
    {
        session(['urun_id' => $id]);
        $urunfoto = Urunfotos::where('urun_id', $id)->get();
        return view('backend.urun.images_edit')->with('urunfoto', $urunfoto);
    }

    public function onecikar($id, $durum)
    {
        if ($durum == 'onecikar') {
            $update = Uruns::where('id', $id)
                ->update([
                    'urun_onecikar' => '1'
                ]);
            if ($update) {
                echo 1;
            } else {
                echo 0;
            }
        }

        if ($durum == 'kaldır') {
            $update = Uruns::where('id', $id)
                ->update([
                    'urun_onecikar' => '0'
                ]);
            if ($update) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    public function durumguncelle($id, $durum)
    {
        if ($durum == 'aktif') {
            $update = Uruns::where('id', $id)
                ->update([
                    'urun_durum' => '1'
                ]);
            if ($update) {
                echo 1;
            } else {
                echo 0;
            }
        }

        if ($durum == 'pasif') {
            $update = Uruns::where('id', $id)
                ->update([
                    'urun_durum' => '0'
                ]);
            if ($update) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategoris::all();
        return view('backend.urun.create')->with('kategori', $kategori);
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
            'urun_ad' => 'required',
            'urun_detay' => 'required',
            'urun_fiyat' => 'required',
            'urun_keyword' => 'required',
            'urun_stok' => 'required|numeric',
        ]);


        if (isset($request->urun_video)) {
//            $request->validate([
//                'urun_video' => 'required|size:512000'
//            ]);

            echo "Uploading...";
            $file_name = uniqid() . '.' . $request->urun_video->getClientOriginalExtension();
            $request->urun_video->move(public_path('videos/backend/urun/'), $file_name);
            $request->urun_video = $file_name;


            $insert = Uruns::insert(
                [
                    "urun_ad" => $request->urun_ad,
                    "urun_detay" => $request->urun_detay,
                    "urun_fiyat" => $request->urun_fiyat,
                    "urun_keyword" => $request->urun_keyword,
                    "urun_stok" => $request->urun_stok,
                    "urun_onecikar" => $request->urun_onecikar,
                    "urun_video" => $request->urun_video,
                    "kategori_id" => $request->kategori_id,
                    "created_at" => date('Y-m-d H:i:s'),
                ]
            );

            if ($insert) {
                return redirect(route('urun.index'))->with('success', 'Ürün Ekleme Başarılı!');
            } else {
                return back()->with('error', 'Ürün Ekleme Başarısız');
            }

        } else {

            $insert = Uruns::insert(
                [
                    "urun_ad" => $request->urun_ad,
                    "urun_detay" => $request->urun_detay,
                    "urun_fiyat" => $request->urun_fiyat,
                    "urun_keyword" => $request->urun_keyword,
                    "urun_stok" => $request->urun_stok,
                    "kategori_id" => $request->kategori_id,
                    "created_at" => date('Y-m-d H:i:s'),
                ]
            );

            if ($insert) {
                return redirect(route('urun.index'))->with('success', 'Ürün Ekleme Başarılı!');
            } else {
                return back()->with('error', 'Ürün Ekleme Başarısız');
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
        $data['kategori'] = Kategoris::all();
        $data['urun'] = Uruns::where('id', $id)->first();
        return view('backend.urun.edit')->with('data', $data);
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
        $request->flash();

        $request->validate([
            'kategori_id' => 'required',
            'urun_ad' => 'required',
            'urun_detay' => 'required',
            'urun_fiyat' => 'required',
            'urun_keyword' => 'required',
            'urun_stok' => 'required',
            'urun_durum' => 'required',
            'urun_onecikar' => 'required',

        ]);

        if ($request->urun_video !== null) {

            echo "Uploading...";
            $file_name = uniqid() . '.' . $request->urun_video->getClientOriginalExtension();
            $request->urun_video->move(public_path('videos/backend/urun/'), $file_name);
            $request->urun_video = $file_name;

            $update = Uruns::where('id', $id)
                ->update(
                    [
                        "urun_ad" => $request->urun_ad,
                        "urun_detay" => $request->urun_detay,
                        "urun_fiyat" => $request->urun_fiyat,
                        "urun_keyword" => $request->urun_keyword,
                        "urun_stok" => $request->urun_stok,
                        "urun_onecikar" => $request->urun_onecikar,
                        "urun_video" => $request->urun_video,
                        "kategori_id" => $request->kategori_id,
                    ]
                );

            if ($update) {

                $path = 'videos/backend/urun/' . $request->urun_eskivideo;
                if (file_exists($path)) {
                    @unlink(public_path($path));
                }

                return redirect(route('urun.index'))->with('success', 'Güncelleme Başarılı!');
            } else {
                return back()->with('error', 'Güncelleme Başarısız');
            }

        } else {
            $update = Uruns::where('id', $id)
                ->update(
                    [
                        "urun_ad" => $request->urun_ad,
                        "urun_detay" => $request->urun_detay,
                        "urun_fiyat" => $request->urun_fiyat,
                        "urun_keyword" => $request->urun_keyword,
                        "urun_stok" => $request->urun_stok,
                        "urun_onecikar" => $request->urun_onecikar,
                        "kategori_id" => $request->kategori_id,
                    ]
                );

            if ($update) {
                return redirect(route('urun.index'))->with('success', 'Güncelleme Başarılı!');
            } else {
                return back()->with('error', 'Güncelleme Başarısız');
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
        $kullanici = Uruns::find(intval($id));
//        $eski_resim=$kullanici->kullanici_resim;
        if ($kullanici->delete()) {
//            $path = 'images/backend/users/' . $eski_resim;
//            if (file_exists($path)) {
//                @unlink(public_path($path));
//            }
            echo 1;
        } else {
            echo 0;
        }
    }
}
