<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SponsorController extends Controller
{
    public function index(){
        $title = 'Dashboard';
        $data = DB::table('member')
            ->where('group','fighter')
            ->groupBy('type_training')
            ->get();
        return view('user.dashboard',compact('title','data'));
    }

    // /user/sponsoractive
    public function active(){
        $title = 'Sponsor Active';
        $date = date('Y-m-d');
        $data = DB::table('member')
            ->where('group','fighter')
            ->where('exp_date', '>=' , $date)
            ->get();
        return view('user.sponsoractive',compact('title','data'));
    }

    // /user/sponsorexpired
    public function exprired(){
        $title = 'Sponsor Active';
        $date = date('Y-m-d');
        $data = DB::table('member')
            ->where('group','fighter')
            ->where('exp_date', '<' , $date)
            ->get();
        return view('user.sponsorexpired',compact('title','data'));
    }

    // /user/profile
    public function profile(string $id){
        $title = 'Sponsor Profile';
        $data = DB::table('member')
            ->where('id',$id)
            ->get();
        return view('user.profile',compact('title','data'));
    }

    public function profile_print(string $id){
        $title = 'Sponsor Profile';
        $data = DB::table('member')
            ->where('id',$id)
            ->get();
        return view('user.profile_print',compact('title','data'));
    }

}
