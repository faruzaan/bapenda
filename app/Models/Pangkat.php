<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pangkat extends Model
{
    public $primaryKey = 'id';

    protected $table = 'pangkat';

    protected $fillable = [
        'pangkat'
    ];
}
