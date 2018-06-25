<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model

{
    protected $fillable = ['name', 'slug', 'parent_id', 'published', 'created_by', 'images', 'user_id'];

    //Mutators
    public function setSlugAttribute($value) {
        $this->attributes['slug'] = Str::slug( mb_substr($this->name, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'),
            '-');
    }

    //Отримання підкатегорій
    public function children(){
        return $this->hasMany(self::class, 'parent_id');
    }
}
