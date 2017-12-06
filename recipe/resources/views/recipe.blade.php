@extends('layouts.app')
<style>
	body {
		background-image: url("img/recipe_second_background.jpg");
		color: #000000;
	}
</style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
			<center><h1>{{$recipe->name}}</h1> by {{$user->name}}<br><i>{{$recipe->description}}<br><br>
			
			<img src='/storage/app/{{$recipe->picture}}' alt='Recipe Picture'></img><br><br>
			@if($currentUser->id == $user->id)
				<form action="/recipe/edit/{{$recipe->id}}" method="POST"> 
					{{ csrf_field() }}
					{{ method_field('GET') }}
					<input type="submit" value="Edit">
				</form>
				<form action="/recipe/{{$recipe->id}}" method="POST"> 
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<input type="submit" value="Delete">
				</form>
			@else
				<form action="/upvote/{{$recipe->id}}" method="POST">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					<input type="submit" value="Upvote">
				</form>
			@endif
			<h2>Ingredients</h2>
			@foreach ($recipe->getIngredients() as $ingredient )
				<a href="https://www.walmart.com/search/?query={{$ingredient}}">{{$ingredient}}</a><br>
			@endforeach
			<h2>Directions</h2>
			{{$recipe->directions}}
			<h3>Comments</h3>				
			<form action="/comment/new/{{$recipe->id}}" method="POST"> 
				{{ csrf_field() }}
				{{ method_field('GET') }}
				<input type="submit" value="Add Comment">
			</form>
			@foreach ($comments as $comment)
				@if($currentUser->id == $comment->user_id)
					{{$comment->content}}&nbsp;&nbsp;&nbsp;
					<form action="/comment/{{$comment->id}}" method="POST"> 
						{{ csrf_field() }}
						{{ method_field('GET') }}
						<input type="submit" value="Edit">
					</form>
					<form action="/comment/{{$comment->id}}" method="POST"> 
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<input type="submit" value="Delete">
					</form>
				@else 
					{{$comment->content}}<br>
				@endif 
			@endforeach
			</center>
        </div>
</div>
@endsection