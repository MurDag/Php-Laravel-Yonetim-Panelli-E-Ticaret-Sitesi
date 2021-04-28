<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Yorumlars;
use Illuminate\Http\Request;

class YorumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yorum=Yorumlars::all();
        return view('backend.yorum.index')->with('yorum',$yorum);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Yorumlars::find(intval($id));
        if ($delete->delete()) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function durumguncelle($id, $durum)
    {
        if ($durum == 'onayla') {
            $update = Yorumlars::where('id', $id)
                ->update([
                    'yorum_onay' => '1'
                ]);
            if ($update) {
                echo 1;
            } else {
                echo 0;
            }
        }

        if ($durum == 'kaldir') {
            $update = Yorumlars::where('id', $id)
                ->update([
                    'yorum_onay' => '0'
                ]);
            if ($update) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }
}
