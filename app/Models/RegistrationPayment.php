<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationPayment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'amount_paid', 'amount_due'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
