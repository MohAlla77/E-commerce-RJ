<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $StoreItems =Item::orderBy('created_at','DESC');

        if(request()->has('search')){

            $StoreItems = $StoreItems->where('title' , 'like' , '%' . request()->get('search','') . '%');
        }


        return view('home', [

            'StoreItems' => $StoreItems->take(10)->get()

        ]);
    }
}
