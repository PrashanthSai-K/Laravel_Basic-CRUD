<?php

namespace App\Http\Controllers;

use App\Exports\CloudExports;
use App\Models\Cloud;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class CloudCRUDController extends Controller
{
   public function show(){

    $cloud = Cloud::all();
    return view('index', compact('cloud'));

   }

   public function store(Request $request){

    $request->validate([
        'name'=>'required',
        'department'=>'required',
        'rollnumber'=>'required'
    ]);

    $cloud = new Cloud();
    $cloud->name = $request->name;
    $cloud->department = $request->department;
    $cloud->rollnumber = $request->rollnumber;
    $res2 = $cloud->save();

    return redirect('/data')->with('success', 'Added member sucessfully');
   }

   public function edit($id){

    $cloud = Cloud::find($id);
    return view('Cloud.edit', compact('cloud'));
   }

   public function update(Request $request, $id){

    $cloud = Cloud::find($id);

    $cloud->name = $request->name;
    $cloud->department = $request->department;
    $cloud->rollnumber = $request->rollnumber;
    $res3 = $cloud->update();

    return redirect('/data')->with('message', 'Memeber Data Updated Successfully');
   }

   public function delete($id){

    $cloud = Cloud::find($id);
    $cloud->delete();

    return redirect('/data')->with('success','Member Data Deleted Successfully');
   }

   public function export(){

    return Excel::download(new CloudExports, 'users.xlsx');

   }
}
