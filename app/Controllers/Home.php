<?php
    
    namespace App\Controllers;
    use App\Models\userModel;
    class home extends BaseController{
        public function index(){
            $data=[];
            echo view('user_temp/header', $data);
            echo view('user_temp/home', $data);
            echo view('user_temp/footer', $data);
        }
    }