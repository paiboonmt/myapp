<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopupController extends Controller
{
    public function index(){
        $title = 'Topup Monney';
        return view('admin.topup-monney',compact('title'));
    }
    // หน้าลงทะเบียนบัตร
    public function register_card(){
        $title = 'Topup Monney';
        $data = DB::table('card_type')->get();
        return view('admin.register-card',compact('title','data'));
    }

    // เพื่มข้อมูล การ์ดใหม่
    public function register_card_inset( Request $request){
        $request->validate([
            'card_number'=> 'required|unique:card_type,card_number',
        ]);
        $data = [
            'card_number' => $request->card_number,
            'card_type'   => $request->card_type,
            'card_status' => 1
        ];
        DB::table('card_type')->insert($data);
        return to_route('admin.register-card',
            session()->flash('add-success')
        );
    }

    // ลบข้อมูล การ์ด
    public function card_delete( string $id){
        DB::table('card_type')->where('card_id',$id)->delete();
        return to_route('admin.register-card',
            session()->flash('delete-success'),
        );
    }

    // อัปเดทข้อมูล
    public function card_update( Request $request ,string $id){
        $data = [
            "card_number" => $request->card_number,
            "card_type" => $request->card_type,
            'card_status' => 1
        ];
        DB::table('card_type')
            ->where('card_id',$id)
            ->update($data);
        return to_route('admin.register-card',session()->flash('update-success'));
    }


    public function topup( Request $request ){
        $data = DB::table('card_type')->where('card_number',$request->card_number)->get();
        return to_route('admin.topup-monney',compact('data'));
    }

}
