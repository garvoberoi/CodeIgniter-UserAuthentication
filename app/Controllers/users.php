<?php

namespace App\Controllers;
use App\Models\userModel;
class users extends BaseController
{
    public function index()
    {
        $data = [];
        helper(['form']);
        
        if($this->request->getMethod() == 'post'){
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email|',
                'password' => 'required|min_length[4]|max_length[20]|validateUser[email, password]',
            ];
            $errors = [
               'password' => [
                 'validateUser' => 'Email or Password don\'t match' 
                ]
            ];
            if(!$this->validate($rules, $errors)){
                $data['validation'] = $this->validator;
            }
            else{
                $model = new userModel();
                $user = $model->where('email', $this->request->getVar('email'))
                              ->first();
                $this->setUserSession($user);

                return redirect()->to('home');
            }
        }
        echo view('user_temp/header', $data);
        echo view('user_temp/login', $data);
        echo view('user_temp/footer', $data);
    }
    private function setUserSession($user){
        $data = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'isloggedin' => true
        ];
        session()->set($data);
        return true;
    }
    public function register()
    {
        $data = [];
        helper(['form']);
        
        if($this->request->getMethod() == 'post'){
            $rules = [
                'name' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[4]|max_length[20]',
                'confirm_password' => 'matches[password]',
            ];
            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
            }
            else{
                $model = new userModel();
                $newData = [
                    'name' => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success','Successful Registration !!');

                return redirect()->to('/');
            }
        }
        
        echo view('user_temp/header', $data);
        echo view('user_temp/register', $data);
        echo view('user_temp/footer', $data);
    }
    public function logout(){
        session()->destroy();
        return redirect()->to('/');
    }
}