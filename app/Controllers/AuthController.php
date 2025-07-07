<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\DiskonModel; // ← tambahkan model diskon

class AuthController extends BaseController
{   
    protected $user;
    protected $diskon;

    function __construct()
    {
        helper('form');
        $this->user = new UserModel();
        $this->diskon = new DiskonModel(); // ← inisialisasi model diskon
    }

    public function login()
    {
        if ($this->request->getPost()) {
            $rules = [
                'username' => 'required|min_length[6]',
                'password' => 'required|min_length[7]|numeric',
            ];

            if ($this->validate($rules)) {
                $username = $this->request->getVar('username');
                $password = $this->request->getVar('password');

                $dataUser = $this->user->where(['username' => $username])->first();

                if ($dataUser) {
                    if (password_verify($password, $dataUser['password'])) {

                        // === LANGKAH TAMBAHAN: CEK DISKON HARI INI ===
                        $today = date('Y-m-d');
                        $diskon = $this->diskon->where('tanggal', $today)->first();

                        $sessionData = [
                            'username' => $dataUser['username'],
                            'role' => $dataUser['role'],
                            'isLoggedIn' => true,
                        ];

                        if ($diskon) {
                            $sessionData['diskon_aktif'] = $diskon['nominal']; // ← simpan ke session
                        }

                        session()->set($sessionData);

                        return redirect()->to(base_url('/'));
                    } else {
                        session()->setFlashdata('failed', 'Kombinasi Username & Password Salah');
                        return redirect()->back();
                    }
                } else {
                    session()->setFlashdata('failed', 'Username Tidak Ditemukan');
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('failed', $this->validator->listErrors());
                return redirect()->back();
            }
        }

        return view('v_login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
