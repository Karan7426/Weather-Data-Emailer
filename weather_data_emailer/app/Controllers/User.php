<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    public function login()
    {
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]',
            ];
    
            $errors = [
                'password' => [
                    'validateUser' => "Email or Password don't match",
                ],
            ];
    
            if (!$this->validate($rules, $errors)) {
                $response = [
                    'success' => false,
                    'message' => $this->validator->listErrors(),
                ];
                return $this->response->setStatusCode(400)->setJSON($response);
            } else {
                $model = new UserModel();
                $user = $model->where('email', $this->request->getVar('email'))->first();
    
                if ($user) {
                    if ($this->request->getVar('password') === $user['password']) {
                        $this->setUserSession($user);
    
                        $response = [
                            'success' => true,
                            'message' => 'Login successful',
                        ];
                        return $this->response->setJSON($response);
                    } else {
                        $response = [
                            'success' => false,
                            'message' => 'Invalid email or password.',
                        ];
                        return $this->response->setStatusCode(400)->setJSON($response);
                    }
                } else {
                    $response = [
                        'success' => false,
                        'message' => 'Invalid email or password.',
                    ];
                    return $this->response->setStatusCode(400)->setJSON($response);
                }
            }
        }
        return view('login');
    }
    
    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'full_name' => $user['full_name'],
            'email' => $user['email'],
            'isLoggedIn' => true,
        ];
    
        session()->set($data);
        return true;
    }

    public function register()
    {
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'full_name' => 'required|min_length[3]|max_length[20]',
                'mobile_number' => 'required|min_length[9]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]|max_length[255]',
            ];

            if (!$this->validate($rules)) {
                return view('signup', [
                    "validation" => $this->validator,
                ]);
            } else {
                $model = new UserModel();

                $newData = [
                    'full_name' => $this->request->getVar('full_name'),
                    'mobile_number' => $this->request->getVar('mobile_number'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                    'created_on' => date("Y-m-d H:i:s"),  
                ];

                $model->save($newData);
                session()->setFlashdata('success', 'Successful Registration');

                return redirect()->to(base_url('login'));
            }
        }
        return view('register');
    }

    public function profile()
    {
        $model = new UserModel();
        $data['user'] = $model->where('id', session()->get('id'))->first();
        return view('profile', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}

