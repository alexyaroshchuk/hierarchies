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
//        dd($input);
//        $criteria = Criteria::where('id_hierarchies',  $hier_id)->first();

        if(!isset($input['count_second_1'])) {
            for ($i = 1; $i < (count($input)); $i++) {
                Criteria::create([
                    'criteria_name' => $input['count_first_' . $i],
                    'id_hierarchies' => $hier_id,
                ]);
            }
        }
        $criteria = Criteria::where('id_hierarchies',  $hier_id)->first();

//        return redirect('/alternative');
        return redirect()->route('priority', $hier_id)->with('hier_id');
    }

    public function priority($hier_id)
    {
        $user = Auth::user();

        $criteria = Criteria::where('id_hierarchies',  $hier_id)->get()->toArray();

//        dd($criteria);

        return view('criteries.priority', compact(['criteria', 'hier_id']));
    }


    public function calculate(Request $request, $hier_id)
    {
//        $criteries = Criteria::where('id_hierarchies', $hier_id)->get();

        $input = $request->input();
        dd($input);



    }

}
