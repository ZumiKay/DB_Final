<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class card extends Model
{
    use HasFactory;
    protected $table = "Teacher_Card";
    protected $fillable = [
        'cardId',
        'name',
    ];
    public function teacher () {
        return $this->belongsTo(teachers::class , 'name' , 'first_name');
    }

}
