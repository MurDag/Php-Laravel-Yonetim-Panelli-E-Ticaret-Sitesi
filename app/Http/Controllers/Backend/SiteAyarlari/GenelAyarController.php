<?php

namespace App\Http\Controllers\Backend\SiteAyarlari;

use App\Http\Controllers\Controller;
use App\Models\Ayars;
use App\Models\Hakkimizdas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GenelAyarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ayar = Ayars::first();
        return view('backend.site_ayarlari.genel_ayarlar.index')->with('ayar', $ayar);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "create fonksiyonu";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "store fonksiyonu";
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "show fonksiyonuaaaa";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo "edit fonksiyonu";
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
        if (isset($request->ayar_logo)) {

            $request->validate([
                'ayar_logo' => 'required|image|mimes:jpeg,jpg,png|max:2048'
            ]);

            $file_name = uniqid() . '.' . $request->ayar_logo->getClientOriginalExtension();
            $request->ayar_logo->move(public_path('images/backend/settings'), $file_name);
            $request->ayar_logo = $file_name;

            $update = Ayars::where('id', $id)
                ->update(
                    [
                        "ayar_logo" => $request->ayar_logo
                    ]
                );


            if ($update) {
                if (isset($request->eski_logo)) {
                    $path = 'images/backend/settings/' . $request->eski_logo;
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
            $request->validate([
                'ayar_title' => 'required',
                'ayar_description' => 'required',
                'ayar_keywords' => 'required',
                'ayar_author' => 'required'
            ]);

            if (strlen($request->ayar_keywords) > 3) {
                $slug = Str::slug($request->ayar_keywords);
            } else {
                $slug = Str::slug($request->ayar_title);
            }

            $update = Ayars::where('id', $id)->update(
                [
                    "ayar_title" => $request->ayar_title,
                    "ayar_description" => $request->ayar_description,
                    "ayar_keywords" => $slug,
                    "ayar_author" => $request->ayar_author
                ]
            );
            if ($update) {
                return redirect(route('genelAyarlar.index'))->with('success', 'İşlem Başarılı');
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
        echo "destroy fonksiyonu";
    }
}
