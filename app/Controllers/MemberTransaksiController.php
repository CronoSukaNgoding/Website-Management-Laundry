<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MemberTransaksiController extends BaseController
{
    public function index()
    {
        $id= $this->sesi->user_id;
        $dataTransaksi = $this->transaksi->select('*, pemesanan.created_at as tgl_jemput')->join('pemesanan','pemesanan.id = transaksi.id_pemesanan')->join('jenispakaian','jenispakaian.idjenispakaian = pemesanan.jenis')->join('pelanggan','pelanggan.iduser = pemesanan.kd_pelanggan')->join('group_harga','transaksi.id_bayar = group_harga.id')->where('iduser', $id)->get()->getResult();
        $data=[
            'dataTransaksi' => $dataTransaksi,
            'title'=>'Transaksi'
        ];
        return view('member/transaksi',$data);
    }
}
