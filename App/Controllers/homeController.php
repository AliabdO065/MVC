<?php 

namespace App\Controllers;

use Sectheater\view\view;

class homeController
{
    public function index(){
       return view::make('home');
    }
}