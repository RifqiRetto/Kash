<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Student;

class Transaction extends Model
{
    protected $fillable = ['student_id', 'type', 'category', 'amount', 'description'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
