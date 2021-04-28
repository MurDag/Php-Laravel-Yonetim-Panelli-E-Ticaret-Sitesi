<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menulers;
use App\Models\Menus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuler = Menulers::all();
        return view('backend.menuler.index')->with('menuler', $menuler);
    }

    public function change_durum($id,$durum)
    {
        if ($durum == "aktif")
        {
            $change=Menulers::where('id',$id)
                ->update([
                   "menu_durum" => '0'
                ]);
            if ($change)
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
        }

        if ($durum == "pasif")
        {
            $change=Menulers::where('id',$id)
                ->update([
                    "menu_durum" => '1'
                ]);
            if ($change)
            {
                echo 1;
            }
            else
            {
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
        return view('backend.menuler.create');
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
            'menu_ad' => 'required',
            'menu_detay' => 'required',
            'menu_url' => 'required',
            'menu_sira' => 'required',
            'menu_durum' => 'required',
        ]);

        $update=Menulers::insert([
                "menu_ad" => $request->menu_ad,
                "menu_detay" => $request->menu_detay,
                "menu_url" => $request->menu_url,
                "menu_sira" => $request->menu_sira,
                "menu_durum" => $request->menu_durum,
                "menu_seourl" => Str::slug($request->menu_ad),
            ]);

        if ($update) {
            return redirect(route('menuler.index'))->with('success', 'Düzenleme İşlemi Başarılı');
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

    public function delete_menu($id)
    {
        $delete=Menulers::where('id',$id)->delete();
        if ($delete)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menulers::where('id',$id)->first();
        $menu->menu_seo_ad=Str::slug($menu->menu_ad);
        return view('backend.menuler.edit')->with('menu', $menu);
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
            'menu_ad' => 'required',
            'menu_detay' => 'required',
            'menu_url' => 'required',
            'menu_sira' => 'required',
            'menu_durum' => 'required',
        ]);

        $update=Menulers::where('id',$id)
            ->update([
               "menu_ad" => $request->menu_ad,
               "menu_detay" => $request->menu_detay,
               "menu_url" => $request->menu_url,
               "menu_sira" => $request->menu_sira,
               "menu_durum" => $request->menu_durum,
                "menu_seourl" => Str::slug($request->menu_ad),
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
       //
    }
}
