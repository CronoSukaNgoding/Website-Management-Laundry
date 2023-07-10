<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PelangganController extends BaseController
{
    public function index()
    {
        $cekPelanggan = $this->pelanggan->join('user','pelanggan.iduser = user.iduser')->where('role_id',2)->get()->getResult();
        // dd($cekPelanggan);
        $data=[
            'dataPelanggan' => $cekPelanggan,
            'title'=>'Pelanggan'
        ];
        return view('admin/pelanggan',$data);
    }
    public function simpanPelanggan(){
        $data = [
            'nama'=> $this->request->getVar('nama'),
            'alamat'=> $this->request->getVar('alamat'),
            'no_hp'=> $this->request->getVar('no_hp'),
            'jk'=> $this->request->getVar('jk'),
            'iduser'=> $this->request->getVar('iduser'),
        ];
        // dd($data);
        try{
            $svPelanggan = $this->pelanggan->save($data);
            $this->sesi->setFlashdata('sukses-simpan','Pelanggan berhasil di Simpan');
            return redirect()->to('/admin/pelanggan');
        }catch(\Exceptions $e){
            $e->getMessage();
        }
    }
    public function updatePelanggan($id){
        $data = [
            'kd_pelanggan' => $id,
            'nama'=> $this->request->getVar('nama'),
            'alamat'=> $this->request->getVar('alamat'),
            'no_hp'=> $this->request->getVar('no_hp'),
            'jk'=> $this->request->getVar('jk'),
            'iduser'=> $this->request->getVar('iduser'),
        ];
        // dd($data);
        try{
            $svPelanggan = $this->pelanggan->save($data);
            $this->sesi->setFlashdata('sukses-simpan','Pelanggan berhasil di Update');
            return redirect()->to('/admin/pelanggan');
        }catch(\Exceptions $e){
            $e->getMessage();
        }
    }
     public function delPelanggan($id)
    {
        
        $delPelanggan = $this->pelanggan->delete($id);
        $this->sesi->setFlashdata('sukses-hapus', 'Data berhasil di Hapus');
        return redirect()->to('/admin/pelanggan');
       
    }
}



