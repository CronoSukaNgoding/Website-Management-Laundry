<?php namespace App\Filters;
 
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\User_Model;
use App\Models\GroupRoleModel;
 
class RoleManage implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/masuk');
        } else {
            $isUser = new User_model();
            $gpRole = new GroupRoleModel();
            $cekUsername = session()->get('username');
            $getData = $isUser->where('username', $cekUsername)->join('grouprole', 'grouprole.id = user.role_id')->first();
            if(in_array($getData->role, $arguments)){
                return;
            }else{
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }    
        }
    }
 
    //--------------------------------------------------------------------
 
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}