<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    public $primaryKey = 'id';

    protected $table = 'golongan';

    protected $fillable = [
        'golongan'
    ];
}
