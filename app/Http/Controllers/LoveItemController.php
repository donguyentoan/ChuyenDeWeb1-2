<?php

namespace App\Http\Controllers;
use App\Models\LoveItem;
use Illuminate\Http\Request;

class LoveItemController extends Controller
{
    public function index()
    {
        $loveItems = LoveItem::latest()->get();

        return view('love-items.index', compact('loveItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        LoveItem::create($request->all());

        return redirect()->route('love-items.index');
    }

    public function show(LoveItem $loveItem)
    {
        return view('love-items.show', compact('loveItem'));
    }

    public function update(Request $request, LoveItem $loveItem)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $loveItem->update($request->all());

        return redirect()->route('love-items.index');
    }

    public function destroy(LoveItem $loveItem)
    {
        $loveItem->delete();

        return redirect()->route('love-items.index');
    }
}
