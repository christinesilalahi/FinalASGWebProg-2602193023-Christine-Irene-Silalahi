<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlist'; 

    protected $fillable = ['user_id', 'wished_user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wishedUser()
    {
        return $this->belongsTo(User::class, 'wished_user_id');
    }
}
