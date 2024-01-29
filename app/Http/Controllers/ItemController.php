<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function show(){


        return view('manage' , [

            'StoreItems' => Item::take(10)->get()
        ]);
    }

    public function destroy( Item $id){

        if(auth()->id() !== $id->user_id ) {
            abort(404,"Rock Abort");
        }

        $item = Item::where('id',$id)->first()->delete();

        return redirect()->route('manage')->with('success' , 'The item was deleting !');
    }
}
