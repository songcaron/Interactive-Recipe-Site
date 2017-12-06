<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Uploadrecipe;

class PostsController extends Controller
{
   
    public function index()
    {
        return view('posts.index');
    }

    public function create()
    {
        return view('posts.create');
    }

  
    public function store()
    {
        // //create a new recipe using the request data
        $task = new Uploadrecipe;
        $task->title = request('title');
        $task->description = request('description');
        $task->ingriedients = request('ingredients');
        $task->directions = request('directions');
        //save it to the database
        $task->save();
    
        // //and then redirect to home page
       return redirect('/posts/create');
    }

   
    public function show()
    {
        return view('posts.show');
    }
}