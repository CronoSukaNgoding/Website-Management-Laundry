<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(){
        $data=[
            'title'=>'Beranda | Raja Laundry'
        ];
        return view('index',$data);
    }
    public function indexAdmin()
    {
        $data=[
            'title'=>'Home',
            'Alamat'=>'Jl.Margonda Raya, Gg.Kedondong, Kp.Stangkle, RT.05/RW.016, No.49',
            'Tlp'=>'082114955228'
        ];
        return view('admin/home',$data);
    }
}
