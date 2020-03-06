<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Node extends Model
{
    //
    public static function getDistributorId()
    {
        $ret= DB::select(DB::raw("select concat('FG' , DATE_FORMAT(now(), '%Y%m%d'),
              LPAD(
                      if(
                              Max(
                                      convert(
                                              mid(distributor_id, 11, length(distributor_id))
                                          , UNSIGNED
                                          )
                                  ) is null, 1, Max(convert(mid(distributor_id, 11, length(distributor_id)), UNSIGNED)) + 1
                          ),
                      6, 0))
           as Code
from node


"));
        $rets=$ret[0];
        return $rets->Code;
    }


    public static function AsignSponser($sponserid,$node_id,$node_code,$tree_possition)
    {

        if($tree_possition=='right')
        {
            $tree_data=[
                'r'=>$node_id,
                'r_id'=>$node_code

            ];
        }
        if($tree_possition=='left')
        {
            $tree_data=[
                'l'=>$node_id,
                'l_id'=>$node_code

            ];
        }
        if($tree_possition=='middle')
        {
            $tree_data=[
                'm'=>$node_id,
                'm_id'=>$node_code

            ];
        }

        $data = [
            'status' => 'alloted'
        ];
        $res = DB::table('node')->where('distributor_id',$sponserid )->update($tree_data);
        if ($res == 1) {
            return 1;

        } else {
            return 0;
        }
    }
}
