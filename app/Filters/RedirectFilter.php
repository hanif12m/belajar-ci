<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RedirectFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Tidak digunakan
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if ($request->getMethod() === 'post' && $request->getUri()->getPath() === 'login') {
            if (session()->get('isLoggedIn')) {
                session()->setFlashdata('redirect_success', 'Login berhasil! Anda telah diarahkan ke halaman faq.');

                return redirect()->to('/faq');
            }

            return redirect()->to('login')->with('error', 'Login gagal, silakan coba lagi.');
        }

        return $response;
    }
} 