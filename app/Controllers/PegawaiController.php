<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PegawaiController extends BaseController
{
    public function index()
    {
        $dataPegawai = $this->pegawai->get()->getResult();
        $data=[
            'dataPegawai' => $dataPegawai,
            'title'=>'Pegawai'
        ];
        return view('admin/pegawai',$data);
    }

    public function svBagian(){
        $data = [
            'nama_pegawai'=> $this->request->getVar('nama'),
            'bagian'=> $this->request->getVar('bagian'),
            
        ];
        try{
            $svPegawai = $this->pegawai->save($data);
            $this->sesi->setFlashdata('sukses-simpan','Pegawai berhasil di Simpan');
            return redirect()->to('/admin/pegawai');
        }catch(\Exceptions $e){
            $e->getMessage();
        }

    }

    public function updateBagian($id){
        $data = [
            'kd_pegawai'=> $id,
            'nama_pegawai'=> $this->request->getVar('nama_pegawai'),
            'bagian'=> $this->request->getVar('bagian'),
            
        ];
        // dd($data);
        try{
            $svPegawai = $this->pegawai->save($data);
            $this->sesi->setFlashdata('sukses-edit','Pegawai berhasil di Update');
            return redirect()->to('/admin/pegawai');
        }catch(\Exceptions $e){
            $e->getMessage();
        }

    }
     public function deletePegawai($id)
    {
        
         $this->pegawai->delete($id);
          $this->sesi->setFlashdata('sukses-hapus', 'Data berhasil di Hapus');
         return redirect()->to('/admin/pegawai');
    }
    
}
