<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\Hash;
use App\Libraries\ValidationRules;

class Auth extends BaseController
{
    public $rules = [];
    public $data = [];
    public $validation_result = [];
    public $users_model;
    public $logged_user_Id;
    public $user_info;


    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function render_view($view = null)
    {
        echo view('common/header');
        echo view($view, $this->validation_result);
        echo view('common/footer');
    }

    public function validate_entries($entry = null)
    {
        /** entries validation - step 1 */
        $this->rules = ValidationRules::get_rules($entry);
        $validation = $this->validate($this->rules);
        $this->validation_result = ['validation' => $this->validator];

        /** incorrect entries - validation failed */
        if (!$validation) {
            $this->render_view('auth/' . $entry);
        } else {
            /** validate from DB's side - step 2 */

            $this->users_model = new \App\Models\UsersModel();

            switch ($entry) {
                case 'login':
                    $email = $this->request->getPost('login_email');
                    $password = $this->request->getPost('login_password');
                    $this->user_info = $this->users_model->where('email', $email)->first();
                    $check_password = Hash::check($password, $this->user_info['password']);

                    if (!$check_password) {
                        session()->setFlashdata('fail', 'Incorrect password');
                        $this->render_view('auth/' . $entry);
                    } else {
                        $user_id = $this->user_info['user_id'];
                        session()->set('logged_user', $user_id);
                        $this->data = [
                            'title' => 'login',
                            'user_info' => $this->user_info
                        ];
                        return redirect()->to('/home');
                    }
                    break;

                case 'register':
                    break;
            }
        }
    }

    public function login()
    {
        if (session()->has('logged_user')) {
            return redirect()->to('/home');
        } elseif ($this->request->getPost('entry')) {
            $this->validate_entries($this->request->getPost('entry'));
        } else {
            $this->render_view('auth/login');
        }
    }

    public function register()
    {
        if (session()->has('logged_user')) {
            return redirect()->to('/home');
        } else {
            $this->render_view('auth/register');
        }
    }

    function logout()
    {
        echo 'logout';
    }
}//end class
