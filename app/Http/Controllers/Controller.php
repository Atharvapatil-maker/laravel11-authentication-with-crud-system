<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function index(){

        return redirect()->route('account.login');
    }
    public function index1(){

        return redirect()->route('account.register');
    }
    public function index2(){

        return redirect()->route('admin.login');
    }
}
