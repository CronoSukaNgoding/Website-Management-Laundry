<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PemesananController extends BaseController
{
    public function index()
    {
        $cekPesananPending = $this->pemesanan->select('*,pemesanan.created_at as tglBuat')->join('jenispakaian','pemesanan.jenis = jenispakaian.idjenispakaian')->join('pelanggan','pemesanan.kd_pelanggan = pelanggan.iduser')->where('status','Pending')->get()->getResult();
        $cekPesananProses = $this->pemesanan->select('*,pemesanan.created_at as tglBuat')->join('jenispakaian','pemesanan.jenis = jenispakaian.idjenispakaian')->join('pelanggan','pemesanan.kd_pelanggan = pelanggan.iduser')->where('status','Proses')->get()->getResult();
        $cekPesananSelesai = $this->pemesanan->select('*,pemesanan.created_at as tglBuat')->join('jenispakaian','pemesanan.jenis = jenispakaian.idjenispakaian')->join('pelanggan','pemesanan.kd_pelanggan = pelanggan.iduser')->where('status','Selesai')->get()->getResult();
        $cekPesananGagal = $this->pemesanan->select('*,pemesanan.created_at as tglBuat')->join('jenispakaian','pemesanan.jenis = jenispakaian.idjenispakaian')->join('pelanggan','pemesanan.kd_pelanggan = pelanggan.iduser')->where('status','Gagal')->get()->getResult();
        $data=[
            'dataPesananPending'=> $cekPesananPending,
            'dataPesananProses'=> $cekPesananProses,
            'dataPesananSelesai' => $cekPesananSelesai,
            'dataPesananGagal' => $cekPesananGagal,
            'title'=>'Pemesanan'
        ];
        return view('admin/pemesanan',$data);
    }
    public function updateStatusPending($id){
        $data =[
            'id'=> $id,
            'status' => $this->request->getVar('status'),
        ];
        try{
            $saveStatus = $this->pemesanan->save($data);
            $this->sesi->setFlashdata('sukses-simpan','Status berhasil di Ubah');
            return redirect()->to('/admin/pemesanan');
        }catch(\Exceptions $e){
            $e->getMessage();
        }
    }
    public function updateStatusProses($id){
        $data =[
            'id'=> $id,
            'status' => $this->request->getVar('status'),
        ];
        // dd($data);
        try{
            $saveStatus = $this->pemesanan->save($data);
            $this->sesi->setFlashdata('sukses-simpan','Status berhasil di Ubah');
            return redirect()->to('/admin/pemesanan');
        }catch(\Exceptions $e){
            $e->getMessage();
        }
    }
}
