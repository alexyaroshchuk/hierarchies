<?php

namespace App\Http\Controllers;

use App\Alternative;
use App\Criteria;
use App\Hierarchy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CriteriaController extends Controller
{
    public function new($hier_id)
    {
        return view('criteries.new', compact('hier_id'));
    }

    public function create(Request $request, $hier_id)
    {
        $user = Auth::user();

        $input = $request->input();
        $criteria = Criteria::where('id_hierarchies',  $hier_id)->first();
        for ($i = 1; $i < (count($input)+1)/2; $i++) {
            Criteria::create([
                'criteria_name' => $input[$i],
                'id_hierarchies' => $hier_id,
                'priority' => $input['priority' . $i],
            ]);
        }
//        return redirect('/alternative');
        return redirect()->route('alternative', $hier_id)->with('hier_id');
    }

    public function priority($hier_id)
    {
        $user = Auth::user();

        $hierarchy = Hierarchy::where('id_user', $user->id)->get()->toArray();
        $hierarchy = array_pop($hierarchy);
        $criteria = Criteria::where('id_hierarchies',  $hier_id)->get()->toArray();
        $alternative = Alternative::where('id_hierarchies', $hier_id)->get()->toArray();

//        dd($criteria);

        return view('criteries.priority', compact(['criteria', 'hierarchy', 'alternative', 'hier_id']));
    }


    public function calculate($hier_id)
    {
        $criteries = Criteria::where('id_hierarchies', $hier_id)->get();
        foreach($criteries as $criteria){
            //first
            $arr[] = $criteria->priority;
            $mult = array_product($arr);
        }
        dd($mult);
    }

}
