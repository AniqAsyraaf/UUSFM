<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gymnasium extends Model
{
    use HasFactory;

    // protected $fillable = ['feedTitle'];
    protected $guarded = ['id'];
    protected $fillable = ['sessionDate'];
}
