<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseIop extends Model
{
    protected $table = "cases";

    protected $fillable = [
        'iop_code',
        'description',
        'switchboard_categories_id',
    ];
}
