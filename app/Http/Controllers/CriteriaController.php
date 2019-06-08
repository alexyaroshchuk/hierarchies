<?php

namespace App\Http\Controllers;

use App\Alternative;
use App\Criteria;
use App\Hierarchy;
use App\Priority;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

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

        return redirect()->route('priority', $hier_id)->with('hier_id');
    }

    public function priority($hier_id)
    {
        $user = Auth::user();

        $criteria = Criteria::where('id_hierarchies',  $hier_id)->get()->toArray();


        return view('criteries.priority', compact(['criteria', 'hier_id']));
    }


    public function calculate(Request $request, $hier_id)
    {

        $input = Input::except('_token');

        $value = array_values($input);
        $arr = array_keys($input);

        foreach ($arr as $i){
            $result[] = explode('|', $i);
        }

        $result = array_merge($result, $value);
        for ($i=0; $i<count($result)/2; $i++) {
            Priority::create([
                'id_criteria_1' => $result[$i][0],
                'id_criteria_2' => $result[$i][1],
                'priority' => $result[$i+count($result)/2],
                'id_hierarchies' => $hier_id
            ]);
        }

        return redirect()->route('criteria-count', $hier_id)->with('hier_id');
    }


    public function count($hier_id)
    {
        $criteria = Criteria::where('id_hierarchies', $hier_id)->get()->toArray();

        $priority = Priority::where('id_hierarchies', $hier_id)->get()->toArray();
        foreach ($priority as $p){
            $prioritos[] = $p['priority'];
        }

        $criterios = array_chunk($prioritos, count($criteria));

        foreach ($criterios as $crit){
            $result[] = array_product($crit);
        }
        dd($result);
        dd($priority, $criteria, $criterios);
        dd($hier_id);
    }
}
