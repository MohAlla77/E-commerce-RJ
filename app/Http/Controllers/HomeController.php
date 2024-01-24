<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {

        return view('home', [

            'StoreItems' => Item::take(10)->get()

        ]);
    }



}
