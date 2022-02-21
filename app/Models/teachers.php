<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teachers extends Model
{
    use HasFactory;
    protected $table = 'Teacher';
    protected $fillable = [
        "first_name",
        "last_name",
        "phoneNumber",
        "subject_name",

    ];
    public function card() {
        return $this->hasOne(card::class , 'name' , 'first_name' );
    }

}
