<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Student extends Model
{
    protected $fillable = ['nis', 'name', 'total_saldo'];
    
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

}

