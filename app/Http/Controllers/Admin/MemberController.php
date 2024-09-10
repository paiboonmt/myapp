<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Nationality;
use App\Models\Product;
use App\Models\Purchase_history;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $card_id = (int) (microtime(true) * 10000);
        return view('admin.member_create', compact('title','na','pro','card_id'));
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
                    "product_id" => $request->product,
                    "product_name" => $request->product,
                    "emp" => Auth::user()->name,
                    "date_of_buy" => date('Y-m-d'),
            ]);
        }
        return to_route('admin.member',session()->flash('add-member'));

    }

    // admin.member_profile
    public function show(string $id){

        $data = Member::where('id',$id)->first();

        // join table member and product
        $product = DB::table('members')
            ->join('products','members.product','=','products.id')
            ->where('members.id',$id)
            ->select('products.*')
            ->get();

        $nation = DB::table('members')
            ->join('nationalities','members.nationality','=','nationalities.id')
            ->where('members.id',$id)
            ->select('nationalities.name')
            ->first();

            // dd($nation);

        // Join table purchase_histories and products
        $ph = DB::table('purchase_histories')
            ->join('products','purchase_histories.product_id','=','products.id')
            ->where('card_id',$data->card_id)
            ->select('products.name','purchase_histories.*')
            ->get();

        $title = "Profile " . $data->fname;

        $date = date('Y-m-d');
        $exp_date = $data->exp_date;

        $startDate = Carbon::create($date);
        $endDate = Carbon::create($exp_date);

        $diffInDays = (int) $startDate->diffInDays($endDate);

        // dd($diffInDays);

        return view('admin.member_profile',compact('title','data','ph','product','nation','diffInDays'));
    }

    // admin.member_edit
    public function edit(string $id){
        $title = 'Edit Profile';
        $data = Member::where('id',$id)->first();
        $products = Product::all();
        $nationalities = Nationality::all();

        // join table member and product
        $product = DB::table('members')
            ->join('products','members.product','=','products.id')
            ->where('members.id',$id)
            ->select('members.*', 'products.id AS product_id','products.name')
            ->first();

        $nation = DB::table('members')
            ->join('nationalities','members.nationality','=','nationalities.id')
            ->where('members.id',$id)
            ->select('nationalities.*')
            ->first();

        // dd($nation);

        return view('admin.member_edite',compact('title','data','products','product','nationalities','nation'));
    }

    public function update( Request $request , $id ){

        $member = Member::find($id);
    
        // ตรวจสอบว่ามีไฟล์ภาพใหม่ถูกอัปโหลดหรือไม่
        if ($request->hasFile('image')) {
            if ($member->image) {
                $oldImagePath = public_path('images/customer/' . $member->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // อัปโหลดไฟล์ใหม่
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/customer'), $imageName);

            // เก็บชื่อไฟล์ในฐานข้อมูล
            $data = [
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
            ];

            DB::table('members')->update($data);

        }

        $data = [
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
            "image" => $request->old_image,
        ];

        DB::table('members')->update($data);

        Purchase_history::create([
            "card_id" => $request->card_id,
                "product_id" => $request->product,
                "product_name" => $request->product,
                "emp" => Auth::user()->name,
                "date_of_buy" => date('Y-m-d'),
        ]);

        return to_route('admin.member_profile',['id'=> $id, session()->flash('update')]);

    }

    public function destroy(string $id){

        $member = Member::findOrFail($id);

        if ($member->image) {
            $oldImagePath = public_path('images/customer/' . $member->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        DB::table('members')->where('id',$id)->delete();

        DB::table('purchase_histories')->where('card_id',$member->card_id)->delete();

        // return to_route('admin.member');
    }

    public function pur_destroy(Request $request , string $id){

        // dd($request);

        $member_id = $request->member_id;

        DB::table('purchase_histories')->where('id',$id)->delete();
        return to_route('admin.member_profile', $member_id );
    }
}
