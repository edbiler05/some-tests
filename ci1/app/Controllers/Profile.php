<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\Hash;
use App\Libraries\ValidationRules;

class Profile extends BaseController
{

    public $rules = [];
    public $data = [];
    public $user_info = [];
    public $validation_data = [];
    public $users_model;
    public $logged_users_Id;

    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index()
    {
        $this->renderView('pages/profile');

        /*  $this->users_model = new \App\Models\usersModel();
        if(session()->has('logged_user')){
            $this->logged_users_Id = session()->get('logged_user');
            $this->user_info = $this->users_model->find($this->logged_users_Id);

            $this->data = [
                'titte' => 'Dashboard',
                'user_info' => $this->user_info
            ];
        }
*/
    }

    public function renderView($view_to_load = null)
    {
        if (session()->has('logged_user')) {
            $this->users_model = new \App\Models\usersModel();
            $this->logged_users_Id = session()->get('logged_user');
            $this->user_info = $this->users_model->find($this->logged_users_Id);
            $this->data = [
                'title' => 'Dashboard',
                'userInfo' => $this->user_info
            ];
            $view_to_load = 'pages/profile';
        }

        echo view('common/header', $this->data);
        echo view($view_to_load);
        echo view('common/footer');
    }

    /** save profile data */
    public function save()
    {
        $this->rules = ValidationRules::getRules($this->request->getPost('entry'));
        $validation = $this->validate($this->rules);
        $this->data = ['validation' => $this->validator];

        if (!$validation) {
            $this->renderView('profile');
        }

        /*
        $userInfo = $this->usersmodel->find($this->loggedUserId);
        $data = [
            'firstname' => $this->request->getPost('fname'),
            'lastname' => $this->request->getPost('lname'),
            'address' => $this->request->getPost('address'),
            'city' => $this->request->getPost('city'),
            'phone' => $this->request->getPost('phone')
        ];
        $query = $this->usersmodel->update($this->loggedUserId, $data);

        if (!$query) {
            return redirect()->back()->with('fail', 'Something went wrong');
            //return redirect()->to('/profile')->with('fail', 'Something went wrong');
        } else {
            return redirect()->to('/profile')->with('sucess', 'Update-sucessful');
        }
*/
    }
}
