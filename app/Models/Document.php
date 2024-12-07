<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\Tags;
class Document extends Model
{
    use HasFactory; 

    protected $fillable = [
        'title', 
        'description', 
        'file_path', 
        'categories_id', 
        'user_id', 
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'document_tag');
    }
}
