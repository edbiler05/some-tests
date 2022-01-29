<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\Hash;
use App\Libraries\ValidationRules;

use function PHPSTORM_META\elementType;

class Auth2 extends BaseController
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

        //$this->uri = new \CodeIgniter\HTTP\URI();
    }

    /** used index to validate form entries
     * particularly - login, registration, profile
     * 
     */
    public function index()
    {
        if (!$_POST) {

            switch ($this->request->uri->getSegment(2)) {
                case 'login':
                    $this->renderView('login');
                    break;

                case 'register':
                    $this->renderView('register');
                    break;
            }
        } else {
            /** validating form entries */
            $entry = $this->request->getPost('entry');
            $this->rules = ValidationRules::get_rules($entry);
            $validation = $this->validate($this->rules);
            $this->validation_data = ['validation' => $this->validator];

            if (!$validation) {
                /* validation- Failed : render which page to return to show validation rules */
                $this->renderView($entry);
            } else {
                // creating instance for Model: UsersModel
                $this->users_model = new \App\Models\UsersModel();
                //collect details from login POST
                $email = $this->request->getPost('login_email');
                $password = $this->request->getPost('login_password');

                /** query- email from db referenced from login email entry */
                $this->user_info = $this->users_model->where('email', $email)->first();
                /** checking password-match using library Hash::check */
                $check_password = Hash::check($password, $this->user_info['password']);

                if (!$check_password) {
                    session()->setFlashdata('fail', 'Incorrect password');
                    return redirect()->to('auth2')->withInput()->with('fail', 'mali password mo boy');
                } else {
                    $user_id = $this->user_info['user_id'];
                    session()->set('logged_user', $user_id);

                    $this->data = [
                        'title' => 'Dashboard',
                        'user_info' =>  $this->user_info
                    ];

                    return redirect()->to('/dashboard');
                }

                /** step 1 - validation - Success */
                /** step 2 - check validity of entries */
                //$this->checkValidity($entry);
            }
        }
    }

    /** render which view/page to load */
    public function renderView($entry = null)
    {
        switch ($entry) {
            case 'login':
                $view = 'auth/login';
                break;

            case 'register':
                $view = 'auth/register';
                break;
        }

        echo view('common/header', $this->data);
        echo view($view, $this->validation_data);
        echo view('common/footer');
    }

    /**  */
    function logout()
    {
        if (session()->has('logged_user')) {
            session()->remove('logged_user');
            return redirect()->to('/auth2/?access=out')->with('fail', 'You ve been logged-out');
        }
    }
}//endclass
