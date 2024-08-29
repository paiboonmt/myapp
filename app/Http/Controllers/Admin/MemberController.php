<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function capture() {
        $title = 'Capture';
        return view('admin.capture',compact('title'));
    }

    public function index(){
        $title = 'Member';
        return view('admin.member', compact('title'));
    }

    public function create(){
        $title = 'Create Member';
        return view('admin.member_create', compact('title'));   
    }

    public function save( Request $request ){

       $request->validate([
            'card_id' => 'required|'
       ]);

        $request->validate([

        ]);
    }
}
