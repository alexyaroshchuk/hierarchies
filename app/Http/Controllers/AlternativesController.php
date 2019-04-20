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

        $hierarchy = Hierarchy::where('id_user', $user->id)->get()->toArray();
        $hierarchy = array_pop($hierarchy);
        $input = $request->input();

        $criteria = Criteria::where('id_hierarchies',  $hier_id)->first();

        for ($i = 1; $i < count($input); $i++) {
            Alternative::create([
                'name_alternatives' => $input[$i],
                'id_hierarchies' => $hier_id,
                'vector_priority' => '',
            ]);
        }

        $alternative = Alternative::where('id_hierarchies', $hier_id)->get()->toArray();

        return redirect()->route('priority', $hier_id)->with('hier_id');
    }
}
