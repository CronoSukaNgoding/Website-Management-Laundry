<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function index()
    {
        //
        if ($this->sesi->get("logged_in") == true){
            return redirect()->to('/panel-admin');
         
        }else {
            $data =[
                'title'=>'Login'
            ];
            return view("login",$data);
        }
    }
    public function CekLogin()
    {
        $data=[
            'username' => $this->request->getVar("username"),
            'password' => $this->request->getVar("password"),
        ];
        $user=$this->user->where('username',$this->request->getVar('username'))->first();
        #dd($user);
        if (!$user) {
            $this->sesi->setFlashdata('sukses-hapus', 'Username tidak ditemukan');
            return redirect()->to('/masuk');
        }else{
            $password = $this->request->getVar("password");
            // dd($password);
            $hash = $user->password;
            // dd($hash);
            $cekPw = password_verify($password, $hash);
            // dd($cekPw);
            if(!$cekPw){
                $this->sesi->setFlashdata('sukses-hapus', 'Password salah');
                return redirect()->to('/masuk');
            }else {
                $ses_data = [
                    'user_id' => $user->iduser,
                    'username' => $user->username,
                    'logged_in' => true,
                    'role' => $user->role_id,
                ];
                // dd($ses_data);
                $this->sesi->set($ses_data);
                
                if($user->role_id == 1){
                    $this->sesi->setFlashdata('sukses', 'Selamat Datang');
                    return redirect()->to('/panel-admin');
                }else{
                    $this->sesi->setFlashdata('sukses', 'Selamat Datang');
                    return redirect()->to('member/pesan');
                }
            }
        }
    }
    public function Logout(){
        $this->sesi->destroy();
        return redirect()->to('/masuk');
    }
}

