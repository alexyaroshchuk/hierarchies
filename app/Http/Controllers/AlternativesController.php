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


    public function result($hier_id)
    {
        $vector = Alternative::where('id_hierarchies', $hier_id)->get();
        return view('alternatives.result', compact('hier_id', 'vector'));
    }

    public function history()
    {
        $hierarchies = Hierarchy::where('id_user', Auth::id())->get();
        return view('alternatives.history', compact('hierarchies'));
    }

    public function historyOne($hier_id)
    {
        $hierarchies = Hierarchy::where('id',$hier_id)->get();
        $criteria1 = Criteria::where('id_hierarchies', $hier_id)
            ->whereNull('id_parent')->get();
        $alternative = Alternative::where('id_hierarchies', $hier_id)
            ->select('vector_priority', 'name_alternatives')->get()->toArray();
        $name_alternative = Alternative::where('id_hierarchies', $hier_id)
            ->select('name_alternatives')->get()->toArray();

        $criteria2 = Criteria::where('id_hierarchies', $hier_id)
            ->where('id_parent', $hier_id)->get();
        return view('alternatives.historyOne',
            compact('alternative', 'hierarchies', 'criteria1', 'criteria2', 'name_alternative'));
    }
}
