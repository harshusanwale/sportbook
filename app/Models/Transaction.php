<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    
    // Define the relationship with the Agent model
    public function agent()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Agent model
    // Define the relationship with the Period model
    public function player()
    {
        return $this->belongsTo(Player::class);
    }
    

    // Define the relationship with the Period model
    public function period()
    {
        return $this->belongsTo(Period::class);
    }


    // Define the relationship with the Bed_type model
    public function bet_type()
    {
        return $this->belongsTo(Bet_type::class);
    }
}
