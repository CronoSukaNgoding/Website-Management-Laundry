<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TransaksiController extends BaseController
{
    public function index()
    {
        //
        $dataTransaksi = $this->transaksi->join('pemesanan','pemesanan.id = transaksi.id_pemesanan')->join('jenispakaian','jenispakaian.idjenispakaian = pemesanan.jenis')->join('pelanggan','pelanggan.iduser = pemesanan.kd_pelanggan')->join('group_harga','transaksi.id_bayar = group_harga.id')->get()->getResult();
        // dd($dataTransaksi);
        $biaya = $this->biaya->first();
        // dd($biaya);
        $jenis=$this->jenis->get()->getResult();
        $cekPemesanan = $this->pemesanan->join('jenispakaian','pemesanan.jenis = jenispakaian.idjenispakaian')->where('status', 'Proses')->get()->getResult();
        // dd($cekPemesanan);
        $data=[
            'harga'=> $biaya,
            'dataTransaksi' => $dataTransaksi,
            'dataPemesanan' => $cekPemesanan,
            'dataJenis' => $jenis,
            'title'=>'Transaksi'
        ];
        // dd($data);
        return view('admin/transaksi',$data);
    }
    public function svTransaksi(){
        $total = $this->request->getVar('total');
        $total_harga = $this->request->getVar('total_harga');
        $total = str_replace('Rp', '', $total); // Menghapus karakter "Rp"
        $total = str_replace('.', '', $total); // Menghapus tanda titik ribuan
        $total = (int)$total;
        $total_harga = (int)$total_harga;
        $data = [
            'id_pemesanan'=> $this->request->getVar('kd_pemesanan'),
            'berat'=> $this->request->getVar('berat'),
            'tgl_ambil'=> $this->request->getVar('tgl_ambil'),
            'total'=> $total,
            'total_bayar' => $total_harga,
            'id_bayar' => 1,
        ];
        // dd($data);
        try{
            $svTransaksi = $this->transaksi->save($data);
            $dataHarga = [
                'id' => 1,
                'biaya_ambil' =>$this->request->getVar('biaya_ambil'),
                'biaya_jemput' => $this->request->getVar('biaya_jemput'),
            ];
            // dd($dataHarga);
            if($data != null){
                $svharga = $this->biaya->save($dataHarga);
                $this->sesi->setFlashdata('sukses-simpan','Transaksi berhasil di Simpan');
                return redirect()->to('/admin/transaksi');
            }
        }catch(\Exceptions $e){
            $e->getMessage();
        }
    }
}
