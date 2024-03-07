<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaSite extends Model
{
    use HasFactory;

    protected $table = "meta_site";
    public $timestamps = false;
}
