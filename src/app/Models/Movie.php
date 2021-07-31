<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int id
 * @property string title
 * @property string slug
 * @property string year
 * @property string imdb_id
 * @property string type
 *
 * @property Poster poster
 */
class Movie extends Model
{
    protected $table = 'movies';
    protected $fillable = [
        'title',
        'slug',
        'year',
        'imdb_id',
        'type',
    ];

    public static function from(array $data): Movie
    {
        $movie = new self();
        $movie->slug = $data['slug'];
        $movie->title = $data['title'];
        $movie->year  = $data['year'];
        $movie->imdb_id = $data['imdbId'];
        $movie->type = $data['type'];
        return $movie;
    }

    public function poster(): HasOne
    {
        return $this->hasOne(Poster::class);
    }
}