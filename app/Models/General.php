<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;

    public const ACTIVE = 'active';

    public const DISABLED = 'disabled';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
}
