<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;
    protected $table = 'period';

    // Define the inverse relationship with the Transaction model
    public function periodtype()
    {
        return $this->hasMany(Transaction::class);
    }
}
