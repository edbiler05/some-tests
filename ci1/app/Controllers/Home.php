<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\Hash;
use App\Libraries\ValidationRules;

class Home extends BaseController
{
    public $rules = [];
    public $data = [];
    public $user_info = [];
    public $validation_data = [];
    public $users_model;
    public $logged_users_Id;
    public $uri;

    public function __construct()
    {
        helper('form', 'url');

        $this->uri = new \CodeIgniter\HTTP\URI();
    }

    public function index()
    {

        echo $this->uri->getSegment(1);
        /*
        $this->users_model = new \App\Models\UsersModel();
        if (session()->get('logged_user')) {
            $logged_user_id = session()->get('logged_user');
            $user_info = $users_model->find($logged_user_id);
            $this->data = [
                'title' => 'Dashboard',
                'user_info' => $user_info
            ];
        }
    */
        echo view('common/header', $this->data);
        echo view('pages/home');
        echo view('common/footer');
    }
}
