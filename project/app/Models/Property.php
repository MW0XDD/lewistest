<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory, UuidTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'property';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'line_1',
        'line_2',
        'postcode'
    ];

}
