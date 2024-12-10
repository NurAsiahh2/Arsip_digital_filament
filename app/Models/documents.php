<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documents extends Model
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

    public function categories(){
        return $this->belongsTo(Categories::class, 'categories_id');
    }

    public function tags(){
        return $this->belongsToMany(Tags::class, 'document_tag');
    }
}
