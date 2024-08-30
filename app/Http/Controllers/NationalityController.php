<?php

namespace App\Http\Controllers;

use App\Models\Nationality;
use Illuminate\Http\Request;

class NationalityController extends Controller
{
    public function index(){
        $title = "Nationality";
        $data = Nationality::all();
        return view('admin.nationality',compact('title','data'));
    }

    public function create( Request $request){
        Nationality::create([
            'name' => $request->name
        ]);
        return to_route('admin.nationality');
    }

    public function destroy(string $id){

        dd($id);

        Nationality::where('id',$id)->delete();
        return to_route('admin.nationality');
    }
}
