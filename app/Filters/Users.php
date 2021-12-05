<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Users implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->email)
        {
            return redirect()->to(site_url('login'));
        }

        if (session('header') !== "Admin") {
            return redirect()->to(site_url('dashboard'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}