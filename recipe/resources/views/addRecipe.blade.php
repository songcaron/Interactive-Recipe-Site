@extends('layouts.app')

@section ('content')
<center>
<div class = "col-sm-8 blog-main">
 <center>
 <h1>Submit Your Recipe Card Here</h1>
 <hr>
 <form method="POST" action="/new" enctype="multipart/form-data">
	{{csrf_field()}}
	{{ method_field('PUT')}}
	   <label for="title">Recipe Title:</label>
	   <input type="title" name="title" class="form-control" id="title" placeholder="Name of recipe">

	   <label for="description">Description:</label>
	   <textarea id = "description" name="description" class = "form-control"></textarea>

	   <label for="ingredients">Ingredients:</label>
	   <textarea id = "ingredients" name="ingredients" class = "form-control" placeholder="List the ingredients"></textarea>

	   <label for="directions">Directions:</label>
	   <textarea id = "directions" name ="directions" class = "form-control" placeholder="List the directions"></textarea>

	   
	   <label for="picture">Upload Picture of Recipe:</label>
	   <input name="picture" type="file">

	   <button type="submit" class="btn btn-primary">Submit</button>
 </form>
 </center>
</div>
@endsection
