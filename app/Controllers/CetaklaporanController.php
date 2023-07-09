<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CetaklaporanController extends BaseController
{
    public function index()
    {
        //
        $data=[
            'title'=>'CetakLaporan'
        ];
        return view('admin/cetaklaporan', $data);
    }
}
