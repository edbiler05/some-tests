<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Libraries\ValidationRules;

class Dashboard extends BaseController
{

    public $rules = [];
    public $data = [];
    public $user_info = [];
    public $validation_data = [];
    public $users_model;
    public $logged_users_Id;

    public function index()
    {
        /*
        if (!session()->get('logged_user')) {
            return redirect()->to('/auth2')->with('fail', 'Please, login.');
        }
*/
        $this->users_model = new \App\Models\Usersmodel();
        $this->logged_users_Id = session()->get('logged_user');
        $this->user_info = $this->users_model->find($this->logged_users_Id);

        $this->data = [
            'title' => 'Dashboard',
            'user_info' => $this->user_info
        ];
        echo view('common/header', $this->data);
        echo view('pages/dashboard');
        echo view('common/footer');
    }
}
