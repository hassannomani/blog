<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Post extends Model
{
	use softDeletes;
	protected $fillable = [
        'title', 'content', 'featured','category_id'
    ];
    protected $dates = ['deleted_at'];
    public function category(){
    	return $this->belongsTo('App\Category');
    }
}
