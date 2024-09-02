<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Nationality;
use App\Models\Product;
use App\Models\Purchase_history;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{

    public function capture() {
        $title = 'Capture';
        return view('admin.capture',compact('title'));
    }

    public function index(){
        $title = 'Member';
        // $data = Member::all();

        $data = DB::table('members')
            ->join('products','members.product','=','products.id')
            ->join('nationalities','members.nationality','=','nationalities.id')
            ->select('members.*', 'products.name AS pname', 'nationalities.name AS nname')
            ->get();
        return view('admin.member', compact('title','data'));
    }

    public function create(){
        $title = 'Create Member';
        $na = Nationality::all();
        $pro = Product::all();
        return view('admin.member_create', compact('title','na','pro'));   
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
                    "product" => $request->product,
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

            Purchase_history::create([
                    "card_id" => $request->card_id,
                    "product_id" => $request->visa_id,
                    "date_of_buy" => date('Y-m-d'),
            ]);

        }

        

        return to_route('admin.member');

    }
}
