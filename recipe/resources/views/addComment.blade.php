@extends('layouts.app')

<style>
	body {
		background-image: url("img/recipe_second_background.jpg");
	}
</style>

@section('content')
<center>
	<form action="/comment/new/{{$recipe->id}}" method="POST">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		New Comment: <input name="newComment" type="text"> 
		<input type="submit" value="Save">
	</form>
</center>
@endsection