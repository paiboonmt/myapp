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
        Nationality::create(['name' => $request->name]);
        return to_route('admin.nationality',session()->flash('add-success'));
    }

    public function destroy(string $id){
        Nationality::where('id',$id)->delete();
        // return to_route('admin.nationality',session()->flash('delete-success'));
        return response()->json(['success' => 'Item deleted successfully']);
    }

    public function update(Request $request,string $id){

        $data = [
            'name' => $request->name 
        ];

        Nationality::where('id',$id)->update($data);
        return to_route('admin.nationality',session()->flash('update-success'));

    }
}
