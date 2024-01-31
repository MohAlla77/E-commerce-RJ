<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::where('user_id', '=', auth()->id())->get();

        return view('manage', [
            'StoreItems' => $items,
        ]);
    }

    public function show(Item $id)
    {
        return view('manage.show_item', [
            'item' => $id,
        ]);
    }

    public function store()
    {
        // dump($_POST);
        // dump(request());

        $item = Item::create([
            'user_id' => auth()->id(),
            'title' => request()->get('title', ''),
            'Descrption' => 'This is a new descrption for a card to test it work',
        ]);

        return redirect()
            ->route('manage')
            ->with('success', 'The new item was add successfuly ! ');
    }

    public function destroy(Item $id)
    {
        if (auth()->id() !== $id->user_id) {
            abort(404, 'Rock Abort');
        }

        //  $item = Item::where('id',$id->id)->firstOrfail()->delete(); Optmize!!

        $id->delete();

        return redirect()
            ->route('manage')
            ->with('success', 'The item was deleting !');
    }
    public function edit(Item $item)
    {
        $editing = true;

        return view('manage.show_item', compact('item', 'editing'));
    }
    public function update(Item $item)
    {
        request()->validate([
            'content' => 'required|min:3|max:30',
        ]);

        $item->title = request()->get('content', '');
        $item->save();

        return redirect()
            ->route('manage.show', $item->id)
            ->with('success', 'The item was updating successfuly ! ');
    }
}
