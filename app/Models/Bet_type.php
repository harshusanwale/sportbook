<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bet_type extends Model
{
    use HasFactory;
    protected $table = 'bet_type';
    // Define the inverse relationship with the Transaction model
    public function bettype()
    {
        return $this->hasMany(Transaction::class);
    }
}
