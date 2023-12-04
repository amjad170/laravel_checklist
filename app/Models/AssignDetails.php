<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'departmentID',
        'assignMasterID',
        'chcelistID',
    ];
}
