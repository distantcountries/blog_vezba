<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{   
    protected $fillable = [
            'title', 'body', 'published'
        ];

    protected $guarded = ['id'];
        
    const STORE_RULES = [
        'title' => 'required',
        'body' => 'required | min:15'];
    
    public static function published() {

        
        return self::where('published', true)->get(); //get(ce dovuci sve), 
        // first(ce dovuci prvi koji nadje);
        
        //prikazace postove koji su published zbog true
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
