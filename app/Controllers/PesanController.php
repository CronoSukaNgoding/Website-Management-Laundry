<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PesanController extends BaseController
{
    public function index()
    {
        $cekPesanan = $this->pemesanan->select('*, pemesanan.created_at as tglbuat')->join('jenispakaian','pemesanan.jenis = jenispakaian.idjenispakaian')->where('kd_pelanggan', $this->sesi->user_id)->get()->getResult();
        // dd($cekPesanan);
        $cekdatajenis = $this->jenis->get()->getResult();
        $data =[
            'title'=> 'Pesan',
            'userid'=>$this->sesi->user_id,
            'dataJenis' =>$cekdatajenis,
            'dataPesanan' => $cekPesanan,
         
        ];
        return view('member/pesan',$data);
    }
    public function svPesan(){
        $data =[
            'kd_pemesanan' => $this->request->getVar('kd_pemesanan'),
            'kd_pelanggan' => $this->request->getVar('user_id'),
            'status' => 'Pending',
            'jenis' =>$this->request->getVar('jenis'),
        ];
        // dd($data);
        try{
            $svPesan = $this->pemesanan->save($data);
            $this->sesi->setFlashdata('sukses-simpan','Pesanan berhasil di Simpan');
            return redirect()->to('/member/pesan');
        }catch(\Exceptions $e){
            $e->getMessage();
        }
    }
}
