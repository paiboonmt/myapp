<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function capture() {
        $title = 'Capture';
        return view('admin.capture',compact('title'));
    }

    public function index(){
        $title = 'Member';
        $data = Member::all();
        return view('admin.member', compact('title','data'));
    }

    public function create(){
        $title = 'Create Member';
        return view('admin.member_create', compact('title'));   
    }

    public function save( Request $request ){

        $request->validate([
            'card_id' => 'required|unique:members,card_id',
            'visa_id' => 'required|unique:members,visa_id',
            'fname' => 'required',
            'image' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/customer/'), $imageName);

            Member::create([
                    "card_id" => $request->card_id,
                    "visa_id" => $request->visa_id,
                    "gender" => $request->gender,
                    "fname" => $request->fname,
                    "birthday" => $request->birthday,
                    "nationality" => $request->nationality,
                    "phone" => $request->phone,
                    "email" => $request->email,
                    "sta_date" => $request->sta_date,
                    "exp_date" => $request->exp_date,
                    "address" => $request->address,
                    "comment" => $request->comment,
                    "image" => $imageName,
            ]);

        }

        

        return to_route('admin.member');

    }
}
