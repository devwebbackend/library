<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Author;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { $book['books'] =Book::orderBy('id','desc');
        return view('books.index', $book);
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
     /*  $request->validate([
        'title'=>'required',
        'edition'=>'required',
        'description'=>'required',
        'publication'=>'required',
       ]);
        $book = new Book();
        $book->title =  $request->title;
        $book->edition =  $request->edition;
        $book->description =  $request->description;
        $book->publication =  $request->publication;
        $book->section_id =  $request->section_id;
        $book->save();
       $section['section'] =Section::findOrFail($request->section_id);
    return redirect()->route('sections.show',$section)->with('succes','your book added successeffuly');
    */
    $author_id =1;
    $request->validate([
        'title'=>'required',
        'edition'=>'required',
        'description'=>'required',
        'publication'=>'required',
       ]);
      $author2 =$request->other_auther; 
      if(!empty($author2))
     { $auther2_id=Author::where('first_name',$author2)->first();
    // dd($auther2_id) ; 
}
      $book = new Book();
        $book->title =  $request->title;
        $book->edition =  $request->edition;
        $book->description =  $request->description;
        $book->publication =  $request->publication;
        $book->section_id =  $request->section_id;
         $book->save();
     //var_dump($auther2_id);die;
     if(!empty($author2_id))
         { DB::table('book_author')->insert([
    ['author_id' => $author_id, 'book_id'=>$book->id],
    ['author_id' => $auther2_id->id, 'book_id'=>$book->id],
]);

         }
         else
            { 
                DB::table('book_author')->insert([
                ['author_id' => $author_id, 'book_id'=>$book->id],
            ]);
         }
    
       $section['section'] =Section::findOrFail($request->section_id);
    return redirect()->route('sections.show',$section)->with('succes','your book added successeffuly');

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(  $id)
    {
       
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
    public function update(Request $request,Book $book)
    {
       $request->validate([
            'title'=>'required',
            'edition'=>'required',
            'description'=>'required',
            'publication'=>'required',
           ]);
        
            $book->title =  $request->title;
            $book->edition =  $request->edition;
            $book->description =  $request->description;
            $book->publication =  $request->publication;
            $book->section_id =  $request->section_id;
            $book->save();
          // $section['section'] =Section::findOrFail($request->section_id);
        return redirect()->route('sections.show',$book->section_id)->with('succes','your book added successefully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Book $book)
    { 
        
       $section['section'] = Section::findOrFail($book->section_id);
       //dd($section);
       DB::table('book_author')->where('book_id',$book->id)->delete();
       $book->delete();
      
       
        return redirect()->route('sections.show',$section)->with('succes','your book deleted successfuly');
    }
}
