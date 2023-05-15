<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    public $primaryKey = 'id';

    protected $table = 'jabatan';

    protected $fillable = [
        'jabatan'
    ];
}
