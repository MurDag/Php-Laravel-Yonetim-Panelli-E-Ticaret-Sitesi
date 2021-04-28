<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kullanicis;
use App\Models\Uruns;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function index()
    {
        $data['kullanici_sayisi']=Kullanicis::count();
        $data['urun_sayisi']=Uruns::count();
        $data['yorum_sayisi']=Uruns::count();
        return view('backend.default.index')->with('data',$data);
    }
}
