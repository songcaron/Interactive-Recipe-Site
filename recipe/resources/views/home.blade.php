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
			<form action="/recipe/new" method="POST">
					{{ csrf_field() }}
					{{ method_field('GET') }}
					<input type="submit" value="Create New Recipe">
			</form>
			<table class="table">
				<tr style="color: white; text-aligin:center;">
					<th>Recipe Name</th>
					<th>Creater</th>
					<th>Upvotes</th>
				</tr>
			 @foreach ($recipes as $recipe)
				<tr>
					<td><a href="/recipe/{{$recipe->id}}">{{$recipe->name}}</a></td>
					<td>{{$recipe->user_id}}</td>
					<th>{{$recipe->upvotes}}</td>
				</tr>
			@endforeach				
			</table>
        </div>
    </div>
</div>
@endsection
