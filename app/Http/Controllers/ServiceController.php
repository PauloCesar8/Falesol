<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index(){

        $services = Service::all();
        return view('seções\pesquisa',['services'=>$services]);

    }

    public function index2(){

        $services = Service::all();
        return view('dashboard',['services'=>$services]);

    }

    public function create(){
        return view('service.create');
    }
}
