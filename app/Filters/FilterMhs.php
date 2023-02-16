<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterMhs implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if (session()->get('user') == '') {
            session()->setFlashdata('pesan', 'Anda Belum Login, Silahkan Login dahulu!');
            return redirect()->to(base_url(''));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        if (session()->get('user') == 'mhs') {

            return redirect()->to(base_url('mhs'));
        }
    }
}
