<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Sliders;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Sliders::orderBy('slider_sira','ASC')->get();
        return view('backend.slider.index')->with('slider', $slider);
    }

    public function change_durum($id, $durum)
    {
        if ($durum == "aktif") {
            $update = Sliders::where('id', $id)
                ->update([
                    "slider_durum" => '0'
                ]);
            if ($update) {
                return back()->with('success', 'İşlem Başarılı');
            } else {
                return back()->with('success', 'İşlem Başarısız');
            }
        }

        if ($durum == "pasif") {
            $update = Sliders::where('id', $id)
                ->update([
                    "slider_durum" => '1'
                ]);
            if ($update) {
                return back()->with('success', 'İşlem Başarılı');
            } else {
                return back()->with('success', 'İşlem Başarısız');
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
        return view('backend.slider.create');
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
            "slider_ad" => "required",
            "slider_sira" => "required|numeric",
            "slider_link" => "required",
            "slider_durum" => "required",
        ]);

        if (isset($request->slider_resim)) {
            $request->validate([
                'slider_resim' => 'mimes:jpg,jpeg,png'
            ]);

            $file_name = uniqid() . '.' . $request->slider_resim->getClientOriginalExtension();
            $request->slider_resim->move(public_path('images/backend/sliders/'), $file_name);
            $request->slider_resim = $file_name;

            $insert = Sliders::insert([
                "slider_ad" => $request->slider_ad,
                "slider_sira" => $request->slider_sira,
                "slider_link" => $request->slider_link,
                "slider_durum" => $request->slider_durum,
                "slider_resim" => $request->slider_resim,
            ]);

            if ($insert)
            {
                return redirect(route('slider.index'))->with('success','İşlem Başarılı');
            }
            else
            {
                return back()->with('error','İşlem Başarısız');
            }
        }
        else
        {
            $insert = Sliders::insert([
                "slider_ad" => $request->slider_ad,
                "slider_sira" => $request->slider_sira,
                "slider_link" => $request->slider_link,
                "slider_durum" => $request->slider_durum,
            ]);

            if ($insert)
            {
                return redirect(route('slider.index'))->with('success','İşlem Başarılı');
            }
            else
            {
                return back()->with('error','İşlem Başarısız');
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
        $slider=Sliders::where('id',$id)->first();
        return view('backend.slider.edit')->with('slider',$slider);
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
            "slider_ad" => "required",
            "slider_sira" => "required|numeric",
            "slider_link" => "required",
            "slider_durum" => "required",
        ]);

        if (isset($request->slider_resim)) {
            $request->validate([
                'slider_resim' => 'mimes:jpg,jpeg,png'
            ]);

            $file_name = uniqid() . '.' . $request->slider_resim->getClientOriginalExtension();
            $request->slider_resim->move(public_path('images/backend/sliders/'), $file_name);
            $request->slider_resim = $file_name;

            $insert = Sliders::where('id',$id)
            ->update([
                "slider_ad" => $request->slider_ad,
                "slider_sira" => $request->slider_sira,
                "slider_link" => $request->slider_link,
                "slider_durum" => $request->slider_durum,
                "slider_resim" => $request->slider_resim,
            ]);

            if ($insert)
            {
                $path = 'images/backend/sliders/' . $request->eski_resim;
                if (file_exists($path)) {
                    @unlink(public_path($path));
                }
                return back()->with('success','İşlem Başarılı');
            }
            else
            {
                return back()->with('error','İşlem Başarısız');
            }
        }
        else
        {
            $insert = Sliders::where('id',$id)
                ->update([
                "slider_ad" => $request->slider_ad,
                "slider_sira" => $request->slider_sira,
                "slider_link" => $request->slider_link,
                "slider_durum" => $request->slider_durum,
            ]);

            if ($insert)
            {
                return back()->with('success','İşlem Başarılı');
            }
            else
            {
                return back()->with('error','İşlem Başarısız');
            }
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function delete_slider($id)
    {
        $slider = Sliders::where('id', $id)->first();
        $slider_resim = $slider->slider_resim;
        $delete = Sliders::where('id', $id)->delete();

        if ($delete) {
            $path = 'images/backend/slider/' . $slider_resim;
            if (file_exists($path)) {
                @unlink(public_path($path));
            }
            echo 1;
        } else {
            echo 0;
        }
    }

    public function destroy($id)
    {

    }

    public function sortable()
    {
        foreach ($_POST['item'] as $key => $value) {
            $Sliders = Sliders::find(intval($value));
            $Sliders->slider_sira = intval($key);
            $Sliders->save();
        }
        echo true;
    }
}
