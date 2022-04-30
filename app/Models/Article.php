<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'cover',
        'full_text',
        'tags',
        'likes_counter',
        'views_counter'
    ];
    
    protected $casts = [
        'tags' => 'array'
    ];

    public function setPropertiesAttribute($value)
	{
	    $tags = [];

	    foreach ($value as $array_item) {
	        if (!is_null($array_item['key'])) {
	            $tags[] = $array_item;
	        }
	    }

	    $this->attributes['tags'] = json_encode($tags);
	}

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function tags() {
        return $this->hasMany(Tag::class);
    }
}
