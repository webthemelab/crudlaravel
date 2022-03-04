<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stuff;

class StuffController extends Controller
{
    public function addStuff(){


        $stuffs = Stuff::all();
        return view('stuff.add_stuff',compact('stuffs'));
    }//end method

    //store stuff information
    public function storeStuff(Request $request){

        //image upload
        $img= $request->file('photo');
        $imageName = rand().'.'.$img->getClientOriginalName();
        $request->photo->move('stuff_image/',$imageName);
        $image_url ='stuff_image/'.$imageName;

         Stuff::insert([
            'name'=>$request->name,
            'photo'=>$image_url,
         ]);
         return redirect('/add/stuff')->with('sms','stuff insert successfully');
    }//end method


    //edit stuff information
    public function editStuff($id){

        $stuff = stuff::find($id);
        return view('stuff.edit_stuff', compact('stuff'));
    }//end method

    //update stuff information
    public function updateStuff(Request $request){


        $stuff=Stuff::find($request->id);
        $old_img =$stuff->photo;
        //image upload
        if($request->photo){
            unlink($old_img);
            $img=$request->file('photo');
            $imageName=$img->getClientOriginalName();
            $request->photo->move('stuff_image/', $imageName);
            $image_url='stuff_image/'.$imageName;
            $stuff->photo=$image_url;
        }
        // $stuff->name=$request->name;
        // $stuff->save();
        $stuff->update([
            'name'=>$request->name,

        ]);
        return redirect('/add/stuff')->with('sms','update Information successfully');
    }//end method

    //Delete stuff information
    public function deleteStuff($id){

        $stuff=Stuff::find($id);
        $photo=$stuff->photo;
        unlink($photo);
        $stuff->delete();
        return redirect('/add/stuff')->with('sms','delete Information successfully');


    }//end method








}//end class
