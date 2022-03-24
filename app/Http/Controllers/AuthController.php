<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('authors.author');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'address'=>'required',
         ]);
         $originalDate=$request->DOB;
         $newDate = date("Y-m-d", strtotime($originalDate));
        // var_dump('$request->DOB');die;
         $author = new Author();
         $author->first_name=$request->first_name;
         $author->last_name=$request->last_name;
         $author->address =$request->address;
         $author->DOB=  $originalDate ;
         $author->save();
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $author=Aurhor::find($id);
        $author->first_name = $request->first_name;
        $author->last_name = $request->last_name;
        $author->address=$request->address;
        $author->DOB=$request->DOB;
        $result=$author->save();
        if($result)
        return ["result"=>"data saved succeffully"];
        else
        return ["result"=>"data note saved"];
    }
    public function search( $name)
  {
     // return ['data'=>'first api','fer'=>'dfg'];
 //$author = new Author();
// $author=Aurhor::where('first_name',$name)->get();
$author=Aurhor::where('first_name',"like","%".$name."%")->get();
if($author)
 {
   return ['author'=>"author deleted secceffuly"];
 }
 else
 {
  return ['author'=>"author not deleted "];
 }
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
       // Aurhor::find($id)->delete();
       $author->delete();
    }
}
