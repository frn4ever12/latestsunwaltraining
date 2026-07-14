<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Karyabidhi;
use App\Models\Notice;
use App\Models\Samachar;
use App\Models\Scheme;
use Illuminate\Http\Request;

class PrakashanController extends Controller
{
    public function samachar(){
        $datas=Samachar::where('status','1')->select('title_np','miti_bs','document')->paginate(10);
        return view('frontend.prakashan.samachar',compact('datas'));
    }
    public function notice(){
        $datas=Notice::where('status','1')->select('title_np','miti_bs','document')->paginate(10);
        return view('frontend.prakashan.notice',compact('datas'));
    }
    public function karyabidhi(){
        $datas=Karyabidhi::where('status','1')->select('title_np','miti_bs','document')->paginate(10);
        return view('frontend.prakashan.karyabidhi',compact('datas'));
    }
    public function scheme(){
        $datas=Scheme::where('status','1')->select('title_np','miti_bs','document')->paginate(10);
        return view('frontend.prakashan.scheme',compact('datas'));
    }
}
