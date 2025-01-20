<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'tabel_event';
    protected $primaryKey = 'id_event';

    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';

    protected $fillable = [
        'id_event_category',
        'id_penyelenggara',
        'title',
        'deskripsi',
        'thumbnail',
        'gambar',
        'start_date',
        'end_date',
        'location',
        'slug',
        'created',
        'author',
        'updated',
        'updater',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryEvent::class, 'id_event_category', 'id_event_category');
    }

    public function penyelenggara()
    {
        return $this->belongsTo(Penyelenggara::class, 'id_penyelenggara', 'id_penyelenggara');
    }

    public function tiket()
    {
        return $this->hasMany(Tiket::class, 'id_event', 'id_event');
    }

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_event', 'id_event');
    }
}
