<?php

namespace App;

use Jambik\Imageable\ImageableTrait;
use App\Traits\ResourceableTrait;
use Illuminate\Database\Eloquent\Model;
use Rutorika\Sortable\SortableTrait;

class Slide extends Model
{
    use ImageableTrait, SortableTrait, ResourceableTrait;

    protected $table = 'slides';

    protected $fillable = [
        'title',
        'text',
        'url',
        'image'
    ];
}
