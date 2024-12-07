<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Document;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description',
    ]; 
    
    public function documents(){
        return $this->hasMany(Document::class);
    }

}
