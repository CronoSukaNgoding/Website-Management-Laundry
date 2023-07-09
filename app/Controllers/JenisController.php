<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class JenisController extends BaseController
{
    public function index()
    {
        //
        $cekjenis=$this->jenis->get()->getResult();
        $data=[
            'dataJenis'=> $cekjenis,
            'title'=>'Jenis'
        ];
        // dd($data);
        return view('admin/jenis',$data);
    }
    public function svJenis(){
        $data = [
            'jenis'=> $this->request->getVar('jenis'),
            'harga'=> 0,
            'statusbiaya'=> 0,
            
        ];
        // dd($data);
        try{
            $svJenis = $this->jenis->save($data);
            $this->sesi->setFlashdata('sukses-simpan','Jenis Laundry Berhasil di Simpan');
            return redirect()->to('/admin/jenis');
        }catch(\Exceptions $e){
            $e->getMessage();
        }
    }
    public function updateJenis($id){
        $data = [
            'idjenispakaian' => $id,
            'jenis'=> $this->request->getVar('jenis'),
            'harga'=> 0,
            'statusbiaya'=> 0,
            
        ];
        // dd($data);
        try{
            $svJenis = $this->jenis->save($data);
            $this->sesi->setFlashdata('sukses-simpan','Jenis Laundry Berhasil di Update');
            return redirect()->to('/admin/jenis');
        }catch(\Exceptions $e){
            $e->getMessage();
        }
    }
    public function delJenis($id){
            $data =[
                'idjenispakaian' => $id
            ];
            $delJenis = $this->jenis->delete($data);
            $this->sesi->setFlashdata('sukses-hapus','Jenis Laundry Berhasil di Hapus');
            return redirect()->to('/admin/jenis');

    }
}
