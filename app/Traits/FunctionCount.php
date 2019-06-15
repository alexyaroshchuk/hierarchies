<?php namespace App\Traits;

use App\Traits;

trait FunctionCount
{
   public function vector_priority($array, $count){

       foreach ($array as $arr){
           $prioritos[] = $arr['priority'];
       }
       $criterios = array_chunk($prioritos, $count);

       foreach ($criterios as $crit){
           $mults[] = array_product($crit);
       }

       foreach ($mults as $mult){
           $vectors[] = pow($mult, 1/$count);
       }

       $sum = array_sum($vectors);

       foreach ($vectors as $vector){
           $weight[] = $vector/$sum;
       }

       dd($weight);

   }
}