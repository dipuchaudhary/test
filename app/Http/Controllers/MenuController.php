<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index(){
        $lists = Menu::where('parent_id',NULL)->get();
        $parentlists = DB::table('menus')
            ->select('title','parent_id')
            ->where('parent_id','<>',NULL)
            ->join('menus')
            ->select('title')
            ->where('menus.id','=','menus.parent_id')
            ->get();
        dd($parentlists);
        $allmenus = Menu::pluck('id','title')->all();

        return view('menu',compact('lists', 'allmenus','parentlists'));
    }

    public function store(Request $request){
        Menu::create($request->all());
        ;
        return redirect()->back()->with('success','menu added successfully');
    }
}
