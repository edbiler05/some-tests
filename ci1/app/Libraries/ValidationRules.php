<?php

namespace App\Libraries;

class ValidationRules
{

    public static function get_rules($entry)
    {

        switch ($entry) {

            case 'login':
                $rules_arr = [
                    'login_email' => [
                        'rules' => 'required|valid_email|is_not_unique[users.email]',
                        'errors' => [
                            'required' => 'Email is required',
                            'valid_email' => 'Please enter a valid email address',
                            'is_not_unique' => 'This email is not registered in our system'
                        ]
                    ],
                    'login_password' => [
                        'rules' => 'required|min_length[8]|max_length[20]',
                        'errors' => [
                            'required' => 'Password is required',
                            'min_length' => 'Password must be atleast 8 characters in length',
                            'max_length' => 'Password must not exceed 20 characters in length'
                        ]
                    ]
                ];
                break;

            case 'register':
                $rules_arr = [
                    'fname' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Firstname is required'
                        ]
                    ],
                    'lname' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Lastname is required'
                        ]
                    ],
                    'email' => [
                        'rules' => 'required|valid_email|is_unique[users.email]',
                        'errors' => [
                            'required' => 'Email is required',
                            'valid_email' => 'Please enter a valid email address',
                            'is_unique' => 'Looks like this email has already been taken'
                        ]
                    ],
                    'password' => [
                        'rules' => 'required|min_length[8]|max_length[20]',
                        'errors' => [
                            'required' => 'Password is required',
                            'min_length' => 'Password must be atleast 8 characters in length',
                            'max_length' => 'Password must not exceed 20 characters in length'
                        ]
                    ],
                    'cpassword' => [
                        'rules' => 'required|min_length[8]|max_length[20]|matches[password]',
                        'errors' => [
                            'required' => 'Confirm password is required',
                            'min_length' => 'Confirm password must be atleast 8 characters in length',
                            'max_length' => 'Confirm password must not exceed 20 characters in length',
                            'matches' => 'Confirm password should match password'
                        ]
                    ],
                    'address' => [
                        'rules' => 'required|min_length[10]|max_length[100]',
                        'errors' => [
                            'required' => 'Address is required',
                            'min_length' => 'Please enter a valid address',
                            'max_length' => 'Please enter a valid address'
                        ]
                    ],
                    'phone' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Phone number is required'
                        ]
                    ],
                ];
                break;

            case 'update_profile':
                $rules_arr = [
                    'fname' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Firstname is required'
                        ]
                    ],
                    'lname' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Lastname is required'
                        ]
                    ],
                    'address' => [
                        'rules' => 'required|min_length[10]|max_length[100]',
                        'errors' => [
                            'required' => 'Address is required',
                            'min_length' => 'Please enter a valid address',
                            'max_length' => 'Please enter a valid address'
                        ]
                    ],
                    'phone' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Phone number is required'
                        ]
                    ],
                ];
                break;
        }

        return $rules_arr;
    }
}
