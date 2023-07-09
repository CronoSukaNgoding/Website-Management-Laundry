<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProfileController extends BaseController
{
    public function index()
    {
        $cekProfil = $this->profil->first();
        if($cekProfil != null){
            $data=[
                'title'=>'Profile',
                'kd_profile' => $cekProfil->kd_profile,
                'nama_laundry'=>$cekProfil->nama_laundry,
                'no_tlp'=>$cekProfil->no_tlp,
                'alamat_laundry'=>$cekProfil->alamat_laundry
            ];
        }else{
            $data=[
                'title'=>'Profile',
            ];
        }
        
        return view('admin/profile',$data);
    }

    public function svProfil(){
        $data = [
            'nama_laundry'=> $this->request->getVar('nama_laundry'),
            'no_tlp'=> $this->request->getVar('no_tlp'),
            'alamat_laundry'=> $this->request->getVar('alamat_laundry'),
        ];
        $cekProfil = $this->profil->first();
        try{
            if($cekProfil != null){
                $update = [
                    'kd_profile' => $cekProfil->kd_profile,
                    'nama_laundry'=> $this->request->getVar('nama_laundry'),
                    'no_tlp'=> $this->request->getVar('no_tlp'),
                    'alamat_laundry'=> $this->request->getVar('alamat_laundry'),
                ];
                $saveProfile = $this->profil->save($update);
                $this->sesi->setFlashdata('sukses-edit','Profile berhasil di Update');
                return redirect()->to('/admin/profile');
            }else{
                $saveProfile = $this->profil->save($data);
                $this->sesi->setFlashdata('sukses-simpan','Profile berhasil di Simpan');
                return redirect()->to('/admin/profile');
            }
        }catch(\Exceptions $e){
            $e->getMessage();
        }
    }
}
