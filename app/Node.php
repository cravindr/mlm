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

    public static function setParentCommision($id, $init = 0,$cupon_code=0)
    {
        $init++;

        if ($id == '') {
            return 1;
        }
        else {

            $res = DB::table('node')->select('id', 'distributor_id', 'sponser_name', 'p', 'p_id', 'name', 'coupon_code')->where('id', $id)->first();
            echo "<br>" . $res->p_id . " : $res->p ,$init";


            $amount = 0;
            if ($init == 1) {
                $amount = 300;
            } elseif ($init == 2) {
                $amount = 200;
            } elseif ($init == 3) {
                $amount = 100;
            } elseif ($init == 4) {
                $amount = 50;
            } elseif ($init == 5) {
                $amount = 20;
            }


            if ($amount >= 20) {
                $data = [
                    'node_id' => $res->p,
                    'node_code' => $res->p_id,
                    'node_name' => $res->sponser_name,
                    'coupon' => $cupon_code,
                    'amount' => $amount,
                    'status' => 'credit'
                ];

                DB::table('transaction')->insert($data);
            }
            //print_r("test value <pre>".$res);
            self::setParentCommision($res->p, $init, $cupon_code);

        }

    }

    public static function getParentList($id, $init = 0)
    {
        $init++;

        if ($id == '') {
            return 1;
        } else {

            $res = DB::table('node')->select('p', 'p_id','name','coupon_code')->where('id', $id)->first();
            echo "<br>" . $res->p_id . " : $res->p ,$init";



            self::getParentList($res->p, $init);

        }
    }

    public static function getTreeStructure($id)
    {
        $res = DB::table('node')->select('name','coupon_code','distributor_id','l','m','r')->where('id', $id)->first();


        $root=new \stdClass();
        $root->id=$id;
        $root->name=$res->name;
        $root->distributor_id=$res->distributor_id;
        $root->coupon_code=$res->coupon_code;

        $resl= DB::table('node')->select('name','coupon_code','distributor_id','l','m','r')->where('id', $res->l)->first();
        if ($resl) {
            $left = new \stdClass();
            $left->id = $res->l;
            $left->name = $resl->name;
            $left->distributor_id = $resl->distributor_id;
            $left->coupon_code = $resl->coupon_code;
        }else
        {
            $left = new \stdClass();
            $left->id = "#";
            $left->name = "Empty";
            $left->distributor_id ="";
            $left->coupon_code = "";
        }

        $resm = DB::table('node')->select('name', 'coupon_code', 'distributor_id', 'l', 'm', 'r')->where('id', $res->m)->first();
        if ($resm) {
            $middle = new \stdClass();
            $middle->id = $res->m;
            $middle->name = $resm->name;
            $middle->distributor_id = $resm->distributor_id;
            $middle->coupon_code = $resm->coupon_code;

        }else
        {
            $middle = new \stdClass();
            $middle->id = "#";
            $middle->name = "Empty";
            $middle->distributor_id ="";
            $middle->coupon_code = "";
        }


        $resr = DB::table('node')->select('name', 'coupon_code', 'distributor_id', 'l', 'm', 'r')->where('id', $res->r)->first();
        if ($resm) {
            $right = new \stdClass();
            $right->id = $res->r;
            $right->name = $resr->name;
            $right->distributor_id = $resr->distributor_id;
            $right->coupon_code = $resr->coupon_code;

        }else
        {
            $right = new \stdClass();
            $right->id = "#";
            $right->name = "Empty";
            $right->distributor_id ="";
            $right->coupon_code = "";
        }

        if ($resl)
        {
            $resll = DB::table('node')->select('name', 'coupon_code', 'distributor_id', 'l', 'm', 'r')->where('id', $resl->l)->first();
            if ($resll) {
                $leftl = new \stdClass();
                $leftl->id = $resl->l;
                $leftl->name = $resll->name;
                $leftl->distributor_id = $resll->distributor_id;
                $leftl->coupon_code = $resll->coupon_code;
            } else {
                $leftl = new \stdClass();
                $leftl->id = "#";
                $leftl->name = "Empty";
                $leftl->distributor_id = "";
                $leftl->coupon_code = "";
            }

            $reslm = DB::table('node')->select('name', 'coupon_code', 'distributor_id', 'l', 'm', 'r')->where('id', $resl->m)->first();
            if ($reslm) {
                $leftm = new \stdClass();
                $leftm->id = $resl->m;
                $leftm->name = $reslm->name;
                $leftm->distributor_id = $reslm->distributor_id;
                $leftm->coupon_code = $reslm->coupon_code;
            } else {
                $leftm = new \stdClass();
                $leftm->id = "#";
                $leftm->name = "Empty";
                $leftm->distributor_id = "";
                $leftm->coupon_code = "";
            }

            $reslr = DB::table('node')->select('name', 'coupon_code', 'distributor_id', 'l', 'm', 'r')->where('id', $resl->r)->first();
            if ($reslr) {
                $leftr = new \stdClass();
                $leftr->id = $resl->r;
                $leftr->name = $reslr->name;
                $leftr->distributor_id = $reslr->distributor_id;
                $leftr->coupon_code = $reslr->coupon_code;
            } else {
                $leftr = new \stdClass();
                $leftr->id = "#";
                $leftr->name = "Empty";
                $leftr->distributor_id = "";
                $leftr->coupon_code = "";
            }

        }else
            {
                $leftl = new \stdClass();
                $leftl->id = "#";
                $leftl->name = "Empty";
                $leftl->distributor_id = "";
                $leftl->coupon_code = "";

                $leftm = new \stdClass();
                $leftm->id = "#";
                $leftm->name = "Empty";
                $leftm->distributor_id = "";
                $leftm->coupon_code = "";

                $leftr = new \stdClass();
                $leftr->id = "#";
                $leftr->name = "Empty";
                $leftr->distributor_id = "";
                $leftr->coupon_code = "";


        }



        if ($resm)
        {
            $resml = DB::table('node')->select('name', 'coupon_code', 'distributor_id', 'l', 'm', 'r')->where('id', $resm->l)->first();
            if ($resml) {
                $middlel = new \stdClass();
                $middlel->id = $resm->l;
                $middlel->name = $resml->name;
                $middlel->distributor_id = $resml->distributor_id;
                $middlel->coupon_code = $resml->coupon_code;
            } else {
                $middlel = new \stdClass();
                $middlel->id = "#";
                $middlel->name = "Empty";
                $middlel->distributor_id = "";
                $middlel->coupon_code = "";
            }

            $resmm = DB::table('node')->select('name', 'coupon_code', 'distributor_id', 'l', 'm', 'r')->where('id', $resm->m)->first();
            if ($resmm) {
                $middlem = new \stdClass();
                $middlem->id = $resm->m;
                $middlem->name = $resmm->name;
                $middlem->distributor_id = $resmm->distributor_id;
                $middlem->coupon_code = $resmm->coupon_code;
            } else {
                $middlem = new \stdClass();
                $middlem->id = "#";
                $middlem->name = "Empty";
                $middlem->distributor_id = "";
                $middlem->coupon_code = "";
            }

            $resmr = DB::table('node')->select('name', 'coupon_code', 'distributor_id', 'l', 'm', 'r')->where('id', $resm->r)->first();
            if ($resmr) {
                $middler = new \stdClass();
                $middler->id = $resm->r;
                $middler->name = $resmr->name;
                $middler->distributor_id = $resmr->distributor_id;
                $middler->coupon_code = $resmr->coupon_code;
            } else {
                $middler = new \stdClass();
                $middler->id = "#";
                $middler->name = "Empty";
                $middler->distributor_id = "";
                $middler->coupon_code = "";
            }

        }else
        {
            $middlel = new \stdClass();
            $middlel->id = "#";
            $middlel->name = "Empty";
            $middlel->distributor_id = "";
            $middlel->coupon_code = "";

            $middlem = new \stdClass();
            $middlem->id = "#";
            $middlem->name = "Empty";
            $middlem->distributor_id = "";
            $middlem->coupon_code = "";

            $middler = new \stdClass();
            $middler->id = "#";
            $middler->name = "Empty";
            $middler->distributor_id = "";
            $middler->coupon_code = "";

        }


        if ($resr)
        {
            $resrl = DB::table('node')->select('name', 'coupon_code', 'distributor_id', 'l', 'm', 'r')->where('id', $resr->l)->first();
            if ($resrl) {
                $rightl = new \stdClass();
                $rightl->id = $resr->l;
                $rightl->name = $resrl->name;
                $rightl->distributor_id = $resrl->distributor_id;
                $rightl->coupon_code = $resrl->coupon_code;
            } else {
                $rightl = new \stdClass();
                $rightl->id = "#";
                $rightl->name = "Empty";
                $rightl->distributor_id = "";
                $rightl->coupon_code = "";
            }

            $resrm = DB::table('node')->select('name', 'coupon_code', 'distributor_id', 'l', 'm', 'r')->where('id', $resr->m)->first();
            if ($resrm) {
                $rightm = new \stdClass();
                $rightm->id = $resr->m;
                $rightm->name = $resrm->name;
                $rightm->distributor_id = $resrm->distributor_id;
                $rightm->coupon_code = $resrm->coupon_code;
            } else {
                $rightm = new \stdClass();
                $rightm->id = "#";
                $rightm->name = "Empty";
                $rightm->distributor_id = "";
                $rightm->coupon_code = "";
            }

            $resrr = DB::table('node')->select('name', 'coupon_code', 'distributor_id', 'l', 'm', 'r')->where('id', $resr->r)->first();
            if ($resrr) {
                $rightr = new \stdClass();
                $rightr->id = $resr->r;
                $rightr->name = $resrr->name;
                $rightr->distributor_id = $resrr->distributor_id;
                $rightr->coupon_code = $resrr->coupon_code;
            } else {
                $rightr = new \stdClass();
                $rightr->id = "#";
                $rightr->name = "Empty";
                $rightr->distributor_id = "";
                $rightr->coupon_code = "";
            }


        }else
        {
            $rightl = new \stdClass();
            $rightl->id = "#";
            $rightl->name = "Empty";
            $rightl->distributor_id = "";
            $rightl->coupon_code = "";

            $rightm = new \stdClass();
            $rightm->id = "#";
            $rightm->name = "Empty";
            $rightm->distributor_id = "";
            $rightm->coupon_code = "";

            $rightr = new \stdClass();
            $rightr->id = "#";
            $rightr->name = "Empty";
            $rightr->distributor_id = "";
            $rightr->coupon_code = "";

        }








        $data=['root'=>$root,
                'left'=>$left,
                'middle'=>$middle,
                'right'=>$right,
                'leftl'=>$leftl,
                'leftm'=>$leftm,
                'leftr'=>$leftr,
                'middlel'=>$middlel,
                'middlem'=>$middlem,
                'middler'=>$middler,
                'rightl'=>$rightl,
                'rightm'=>$rightm,
                'rightr'=>$rightr

            ];
        return $data;
    }






}