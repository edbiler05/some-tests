<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Authcheckfilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        /*
        //edx
        if (!session()->has('logged_user')) {
            echo 'auth check';
            exit;
            return redirect()->to('/auth2')->with('fail', 'You must be logged in!');
        }
        */
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
