<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subjects extends Model
{
    use HasFactory;
    protected $table = "Subjects";
    protected $fillable= [
        "subject_name",
        "hours",
    ];
    public function teacher () {
        return $this->hasOne(teachers::class , 'subject_name' , 'subject_name');
    }

}
