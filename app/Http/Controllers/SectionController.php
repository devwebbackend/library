<?php

namespace App\Http\Controllers;
use App\Models\Section;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $section['sections'] =  Section::orderBy('id','desc')->paginate(5);
     
        //dd(gettype($section));
          return view('sections.index',$section);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    { 
    /* $all_book= DB::table('sections')->join('books','sections.id','=','books.section_id')
     ->where('sections.id',$section->id)->get();*/
     $all_book = $section->books;
    $i=0;
    $array_of_author=[];
     foreach($all_book as $book)
     {
         $array_of_author= Arr::add( $array_of_author,$i,$book->authors()->select('first_name','last_name','author_id')->get());
       $i++;
     }
     //return $array_of_author;
     $author=Author::all();
        return view('books.index',compact('section',$section,'all_book',$all_book,'array_of_author',$array_of_author,'author',$author));//the name of value($array_of_author) must be the same like the key 'array_of_author' value
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
