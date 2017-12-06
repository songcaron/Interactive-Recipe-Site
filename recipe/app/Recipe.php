<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //
	
	 /**
     * Get the comments for the recipe
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
	
	public function getIngredients()
	{
		return explode('-',$this->ingredients);
	}
}
