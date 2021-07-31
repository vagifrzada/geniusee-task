<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int movie_id
 * @property string path
 */
class Poster extends Model
{
    public $timestamps = false;
    protected $table = 'posters';
    protected $fillable = ['path'];
}