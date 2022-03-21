<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
  
<div class="container">

    <div class="row" class="p-4">
        @if(session('succes'))
       <div class="alert alert-success" role="alert">
       {{session('succes')}}
</div>
        @endif
    </div>
  <h1>{{$section->section_name}}</h1>  
  <br>
  <br>
    <form action="{{route('books.store')}}" method="post">
        @csrf 
        <input type="hidden" name="section_id" value="{{$section->id}}">
<table class="table">
<tr>
    <td> <label for="">Title</label></td>
<td><input type="text" name='title'></td>
</tr>
<tr>
    <td> <label for="">Edition</label></td>
<td><input type="text" name="edition"></td>
</tr>
<tr>
    <td> <label for="">Publication</label></td>
<td><input type="text" name="publication"></td>
</tr>
<tr>
    <td> <label for="">Description</label></td>
<td><input type="text" name="description"></td>

</tr>
<tr>
    <td> <label for="">Other Author</label></td>
<td><select name="author"class="form-select" aria-label="Default select example">
    <option selected>Open this select menu</option>
   @foreach ($author as $auth)
       
  
    <option value="{{$auth->id}}">{{$auth->first_name.''.$auth->last_name}}</option>
    @endforeach

  </select>
</td>
</tr>
<tr><td><button class="btn btn-primary" > <a  href="{{route('authors.create')}}"   > </a>Add Author</button></td>
</tr>

<tr><td> <button type= "submit" class="btn btn-primary">Add</button></td></tr>
</table>
</form>
@php
  $i= 0;  
@endphp
<table  class="table">
    <th>Title</th>
    <th>Editon</th>
    <th>Description</th>
    <th>Publication</th>
    <th>Author</th>
    <th>Edit</th>
    <th>Delete</th>
@foreach( $all_book as $book)


    <tr>
        <form action="{{ route('books.update', $book->id )}}" method="post">
            @csrf 
            @method('PUT')
            <input type="hidden" value="{{$book->section_id}}">
        <td><input type="text" name="title" value="{{$book->title}}"></td>
        <td><input type="text" name="edition" value="{{$book->edition}}"></td>
        <td><input type="text" name="description" value="{{$book->description}}"></td>
        <td><input type="text" name="publication" value="{{$book->publication}}"></td>
        <td>
        @foreach ($array_of_author[$i] as $author)
           <p> {{$author->last_name}} </p>
           
        @endforeach
        @php
        $i++;
    @endphp
</td>
 <td><button type="submit" class="btn btn-primary" >Edit</button> </td>   
 </form>
 <td><form action="{{ route('books.destroy', $book->id )}}" method="post">
    @csrf 
    @method('DELETE')

 <button type="submit" class="btn btn-primary" >Delete</button>    
 </form>
</td>
</td>
</tr>
</table>

@endforeach
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
