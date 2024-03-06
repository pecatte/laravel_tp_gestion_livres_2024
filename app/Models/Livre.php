<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;
    public function user() {
        return $this->belongsTo(User::class); //, 'id','user_id');
    }
    public function categorie() {
        return $this->belongsTo(Categorie::class); 
    }

}
