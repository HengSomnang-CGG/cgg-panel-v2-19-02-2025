<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Search extends Model
{
    use HasFactory, Searchable;

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'keyword' => $this->keyword,
        ];
    }

    protected $fillable = [
        'domain',
        'date',
        'keyword',
        'title',
        'website_name',
        'description',
        'image_icon',
        'image_main',
    ];
}
