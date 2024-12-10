<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'action',
        'document_id',
    ]; 

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function documents(){
        return $this->belongsTo(Documents::class, 'document_id');
    }
}
