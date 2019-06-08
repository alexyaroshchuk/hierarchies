<?php

namespace App\Http\Controllers;

use App\Alternative;
use Illuminate\Http\Request;
use App\Criteria;
use App\Hierarchy;
use Illuminate\Support\Facades\Auth;

class AlternativesController extends Controller
{
    public function new($hier_id)
    {
        return view('alternatives.new', compact('hier_id'));
    }

    public function create(Request $request, $hier_id)
    {
        $user = Auth::user();

        $hierarchy = Hierarchy::where('id_user', $user->id)->latest();

        $input = $request->input();

        for ($i = 1; $i < count($input); $i++) {
            Alternative::create([
                'name_alternatives' => $input[$i],
                'id_hierarchies' => $hier_id,
                'vector_priority' => '',
            ]);
        }

        return redirect()->route('hierarchy-count', $hier_id)->with('hier_id');
    }
}
