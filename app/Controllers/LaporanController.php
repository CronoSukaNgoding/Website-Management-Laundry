<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LaporanController extends BaseController
{
    public function index()
    {
        $dataLaporan = $this->transaksi->select('*, pemesanan.created_at as tgl_jemput')->join('pemesanan','pemesanan.id = transaksi.id_pemesanan')->join('jenispakaian','jenispakaian.idjenispakaian = pemesanan.jenis')->join('pelanggan','pelanggan.iduser = pemesanan.kd_pelanggan')->join('group_harga','transaksi.id_bayar = group_harga.id')->get()->getResult();
        // dd($dataLaporan);
        $data=[
            'dataLaporan' => $dataLaporan,
            'title'=>'Laporan'
        ];
        return view('admin/laporan',$data);
    }
}
