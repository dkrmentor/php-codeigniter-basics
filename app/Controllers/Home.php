<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Home extends BaseController
{
    public function index()
    {

        $data = [];
        helper('form');
        if ($this->request->getMethod() == 'post') {

            $rules = [
                'email' => 'required|min_length[8]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[50]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                // create an instance of AdminModel to interact with the admin table
                $model = new AdminModel();
                $admin = $model->where('email', $this->request->getVar('email'))->first();
                // print_r($admin);
                // exit;
                if ($admin && $this->verifyPassword($this->request->getVar('password'), $admin['password'])) {

                    // if($this->verifyPassword($this->request->getVar('password'),$admin['password'])){
                    $this->setadminSession($admin);
                    return redirect()->to('dashboard');
                } else {
                    $data['flash_message'] = true;
                }
            }
        }
        return view('login', $data);
    }
    ///for signin we need verify password function
    private function verifyPassword($enterPassword, $databasePassword)
    {
        return password_verify($enterPassword, $databasePassword);
    }
    ///for signin we need session set function
    private function setadminSession($admin)
    {
        $data = [
            'id' => $admin['id'],
            'fname' => $admin['fname'],
            'lname' => $admin['lname'],
            'email' => $admin['email'],
            'isLoggedIn' => true,
        ];
        session()->set($data);
        return true;
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
    public function forgotPassword()
    {
        $data = [];
        helper('form');
    
        if ($this->request->getMethod() == 'post') {
    
            // validate email input
            $rules = [
                'email' => 'required|min_length[8]|max_length[50]|valid_email',
            ];
    
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                // check if email exists in database
                $model = new AdminModel();
                $admin = $model->where('email', $this->request->getVar('email'))->first();
    
                if ($admin) {
                    // generate a unique token and store it in the database
                    $token = bin2hex(random_bytes(32));
                    $model->update($admin['id'], ['reset_token' => $token]);
    
                    // send an email with a link to reset password page
                    $reset_url = base_url('reset_password/' . $token);
                    $email = \Config\Services::email();
                    $email->setTo($admin['email']);
                    $email->setSubject('Reset your password');
                    $email->setMessage("Please click on the following link to reset your password: $reset_url");
                    $email->send();
    
                    $data['success_message'] = 'An email with instructions to reset your password has been sent to your email address.';
                } else {
                    $data['error_message'] = 'The email address you entered does not exist in our database.';
                }
            }
        }
    
        return view('forgetpassword', $data);
    }
    
    public function resetPassword($token)
    {
        $data = [];
        helper('form');
    
        // check if token is valid and not expired
        $model = new AdminModel();
        $admin = $model->where('reset_token', $token)->first();
    
        if (!$admin || strtotime($admin['reset_expires_at']) < time()) {
            $data['error_message'] = 'Invalid or expired reset token.';
        } else {
            if ($this->request->getMethod() == 'post') {
                // validate new password input
                $rules = [
                    'password' => 'required|min_length[8]|max_length[40]',
                    'password_confirm' => 'matches[password]',
                ];
    
                if (!$this->validate($rules)) {
                    $data['validation'] = $this->validator;
                } else {
                    // update database with new password and clear reset token
                    $model->update($admin['id'], [
                        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                        'reset_token' => null,
                        'reset_expires_at' => null,
                    ]);
    
                    $data['success_message'] = 'Your password has been reset successfully.';
                }
            }
        }
    
        return view('reset_password', $data);
    }
    
    
    public function signup()
    {

        $data = [];
        helper('form');
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'fname' => 'required|min_length[3]|max_length[20]',
                'lname' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[8]|max_length[50]|valid_email|is_unique[admin.email]',
                'password' => 'required|min_length[8]|max_length[40]',
                'confirmpassword' => 'matches[password]',
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new AdminModel();
                $newData = array(
                    'fname' => $this->request->getVar('fname'),
                    'lname' => $this->request->getVar('lname'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),

                );
                if ($model->save($newData)) {
                    $data["flash_message"] = True;
                };
            }
        }
        return view('signup', $data);
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function basicconcepts()
    {
        return view('basicconcepts');
    }
}
