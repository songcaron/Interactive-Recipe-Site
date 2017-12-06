<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Recipe;
use App\User;
use App\Comment;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/recipe/new', 'HomeController@create');

Route::get('/recipe/{id}','HomeController@show');

Route::get('/comment/{id}', function ($id) {
	$comment = Comment::find($id);
	
	return view('editComment', compact('comment'));
});

Route::get('/comment/new/{id}', function ($id) {
	$recipe = Recipe::find($id);
	
	return view('addComment', compact('recipe'));
});

Route::get('/recipe/edit/{id}', function ($id) {
	$recipe = Recipe::find($id);
	
	return view('editRecipe', compact('recipe'));
});

Route::delete('/recipe/{id}',function ($id) {
	
	Recipe::findOrFail($id)->comments()->delete();
	Recipe::findOrFail($id)->delete();
	
	return redirect('/home');
});

Route::delete('/comment/{id}',function ($id) {
	
	Comment::findOrFail($id)->delete();
	
	return redirect('/home');
});

Route::patch('/comment/{id}', function ($id) {
	
	$newComment = Request::input('newComment','Test');
	
	$comment = Comment::find($id);
	
	$comment->content = $newComment;
	
	$comment->save();
	
	return redirect('/home');
});

Route::put('/comment/new/{id}', function ($id) {
	
	$newComment = Request::input('newComment','Test');
	
	$comment = new Comment;
	
	$comment->content = $newComment;
	
	$comment->recipe_id = $id; 
	
	$comment->user_id = Auth::user()->id; 
	
	$comment->save();
	
	return redirect('/home');
});


Route::put('/new', function () {
	
	$name = Request::input('title','Test');
	$description = Request::input('description','Test');
	$ingredients = Request::input('ingredients','Test');
	$directions = Request::input('directions','Test');
	$filepath = request()->file('picture')->store('img');
	
		
	$recipe = new Recipe;
	
	$recipe->name = $name;
		
	$recipe->user_id = Auth::user()->id; 
	
	$recipe->description = $description; 
		
	$recipe->ingredients = $ingredients; 
	
	$recipe->directions = $directions; 
	
	//$filename = $image->store('img');

	$recipe->picture = $filepath;
		
	$recipe->save();

	return redirect('/home');
});

Route::patch('/recipe/{id}', function ($id) {
	
	$newTitle = Request::input('newTitle','Test');
	
	$recipe = Recipe::find($id);
	
	$recipe->name = $newTitle;
	
	$recipe->save();
	
	return redirect('/home');
});

Route::patch('/upvote/{id}', function ($id) {
	
	$recipe = Recipe::find($id);
	
	$currentNumber = $recipe->upvotes; 
	
	$recipe->upvotes = $currentNumber + 1; 
	
	$recipe->save();
	
	return redirect('/home');
});