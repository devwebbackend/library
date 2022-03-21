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
    <div class="row" class="p-4"></div>
<h1>Section</h1>
    <table class="table table-striped table-hover">
        <th>Section Name</th>
        <th>Total books</th>
        <th>Update</th>
        <th>Delete</th>
        <th>Show</th>
        @foreach($sections as $section)

   <tr><td><input type="text" name="section_name" value="{{$section->section_name}}"></td>
<td><label for="" name="total_books"value="{{$section->book_total}}"><span class="badge bg-secondary">{{$section->book_total}}</span></label></td>
<td> <button type="submit" class="btn btn-primary" >Update</button></td>
<td> <button type="submit" class="btn btn-danger">Delete</button></td>
<td><a href="{{route('sections.show', compact('section'))}}"> <button type="submit" class="btn btn-secondary">Show</button></a></td>
</tr>
@endforeach
    </table>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>