<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Wishlist extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Wishlist',
            'items' => ['Item 1', 'Item 2', 'Item 3'],
            'title2' => 'Payment',
            'items2' => ['Payment 1', 'Payment 2', 'Payment 3']
        ];
        
        return view('wishlist', $data);
    }
}
