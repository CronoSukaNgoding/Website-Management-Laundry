<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RegistrasiController extends BaseController
{
    public function index()
    {
        //
        $data=[
            'title'=>'Registrasi'
        ];
        return view("registrasi",$data);
    }
    public function Registrasi()
    {
        $username = $this->request->getVar('username');
        $data = [
            'username' => $username,
            'password' => \password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'role_id' => 2,
            ];
        // dd($data);
        try {
             $daftar = $this->user->save($data);
            $cekiduser = $this->user->where('username',$username )->first();
            // dd($cekiduser);
             if($daftar == true){
                $datapelanggan = [
                'iduser' => $cekiduser->iduser,
                'nama' => $this->request->getVar('nama'),
                'no_hp' => $this->request->getVar('no_hp'),
                'jk' => $this->request->getVar('jk'),
                'alamat' => $this->request->getVar('alamat'),
                ];
                // dd($datapelanggan);
                $svpelanggan = $this->pelanggan->save($datapelanggan);
             }else{
                $this->sesi->setFlashdata('sukses-hapus', 'Anda Gagal Mendaftar');
                return redirect()->to('/registrasi');
             }
             $this->sesi->setFlashdata('sukses-simpan', 'Selamat Anda Berhasil Mendaftar');
             return redirect()->to('/masuk');
        } catch (\Exception $e) {
         $e->getMessage();
        }
    }
}
