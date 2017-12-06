@extends('layouts.app')

<style>
	body {
		background-image: url("img/recipe_second_background.jpg");
	}
</style>

@section('content')
<center>
	<form action="/recipe/{{$recipe->id}}" method="POST">
		{{ csrf_field() }}
		{{ method_field('PATCH') }}
		New Title: <input name="newTitle" type="text"> 
		<input type="submit" value="Save">
	</form>
</center>
@endsection