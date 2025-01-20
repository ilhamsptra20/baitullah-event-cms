<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryEvent extends Model
{
    use HasFactory;

    protected $table = 'tabel_event_category';
    protected $primaryKey = 'id_event_category';

    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';

    protected $fillable = [
        'title',
        'created',
        'author',
        'updated',
        'updater',
        'status',
    ];

    public function events()
    {
        return $this->hasMany(Event::class, 'id_event_category', 'id_event_category');
    }
}
