<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Illuminate\Support\Str;

class Flight extends Model
{
    use HasFactory;
    protected $table = 'flights';
    protected $fillable = [
                            'id',
                            'package_id',
                            'org',
                            'dst',
                            'owner',
                            'weight',
                            'trip'
                          ];
}
