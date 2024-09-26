<?php

namespace App\Http\Controllers;

use App\Models\Monster;
use Illuminate\Http\Request;

class MonsterController extends Controller
{
    public function index() {
        $ideas = Monster::all();
        if (request()->has('search')) {
            $ideas = $ideas->where('name', request()->get('search'));
        }
        return view('index', [
            'monsters' => $ideas
        ]);
    }
    public function show(Monster $monster) {
        return view('show', [
            'monster' => $monster
        ]);
    }
    public function create() {
        return view('add');
    }
    public function store() {
        $attributes = request()->validate([
            'name' => 'required',
            'image' => 'nullable|image',
            'faction' => 'required',
            'rarity' => 'required',
            'cost' => 'required',
            'attack' => 'required',
            'hp' => 'required',
            'bio' => 'required'
        ]);
        if(request()->has('image')) {
            $imagePath = request()->file('image')->store('images', 'public');
            $attributes['image'] = "/storage/$imagePath";
        }
        Monster::create($attributes);
        return redirect("/monsters");
    }
}
