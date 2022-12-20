<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhpQuestion extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded =[];

    public function RelationWithCategory(){
        return $this->hasOne(Category::class, 'id' , 'subject_category_id');
    }
    public function RelationWithUser(){
        return $this->hasOne(User::class, 'id' , 'user_id');
    }
}
