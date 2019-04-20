<?php

namespace App\Http\Controllers;

use App\Hierarchy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HierarchiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function new()
    {
        $hierarchy = Hierarchy::where('id_user', Auth::user()->id)->orderBy('created_at', 'desc')->first();
        return view('hierarchies.new', compact('hierarchy'));
    }

    public function create(Request $request)
    {
        Hierarchy::insert([
            'hierarchies_name' => $request->name_hierarchy,
            'id_user' => Auth::user()->id,
        ]);
        $hier_id = Hierarchy::where('id_user', Auth::user()->id)->orderBy('created_at', 'desc')->first()->id;
//        dd($hier_id);
//        return redirect('/criteria')->with('hier_id');
        return redirect()->route('criteria', $hier_id)->with('hier_id');
    }
}
