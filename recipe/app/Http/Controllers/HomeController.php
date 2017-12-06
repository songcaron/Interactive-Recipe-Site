<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\User;
use App\Comment;
use Auth;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$recipes = Recipe::get(); 
		
        return view('home', [
			'recipes' => $recipes
		]);
    }
	
	//shows a specific recipe
	public function show($id) 
	{
		$recipe = Recipe::find($id);
		$user = User::find($recipe->user_id);
		$currentUser = User::find(Auth::user()->id);
		$comments = DB::table('comments')->where('recipe_id', '=', $recipe->id)->get();
		
		return view('recipe', compact('user','recipe','currentUser','comments'));
	}
	
	    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		
        return view('addRecipe');
    }
}
