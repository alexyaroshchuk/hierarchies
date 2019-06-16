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
       $hierarchy = Hierarchy::create([
            'hierarchies_name' => $request->name_hierarchy,
            'id_user' => Auth::user()->id,
        ]);
        $hierarchy->save();
        $hier_id = $hierarchy->id;
        return redirect()->route('alternative', $hier_id)->with('hier_id');
    }

    public function count($hier_id)
    {
        return view('hierarchies.count', compact('hier_id'));
    }

    public function saveCount(Request $request, $hier_id)
    {
        $count = $request->count;
        $count_first = $request->count_first;
        $count_second = $request->count_second;
        $count_third = $request->count_third;
        $count_fourth = $request->count_fourth;

        return view('criteries.new',
            compact('hier_id', 'count', 'count_first', 'count_second', 'count_third', 'count_fourth'));
    }
}
