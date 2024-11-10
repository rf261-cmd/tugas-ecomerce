<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestFace;
use CodeIgniter\HTTP\ResponseFace;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Auth_Login implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session_lg = session();
        if (!$session_lg->get('loged_in')){
            return redirect()->to('/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}

