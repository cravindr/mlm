<?php

namespace App\Http\Controllers;

use App\Node;
use Illuminate\Http\Request;

class TreeController extends Controller
{
    //
    public function index(){
        $id=\request()->id;
     $data=   Node::getTreeStructure($id);

/*     echo "<pre>";
     print_r($data);*/
        return view('dashboard.tree.index')->with($data);
    }
}
