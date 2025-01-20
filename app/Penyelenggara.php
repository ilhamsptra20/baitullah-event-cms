<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class Penyelenggara extends Authenticatable
{
    use HasFactory;

    protected $table = 'tabel_penyelenggara';
    protected $primaryKey = 'id_penyelenggara';

    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';

    protected $fillable = [
        'id_users',
        'email',
        'password',
        'uuid',
        'title',
        'deskripsi',
        'gambar',
        'created',
        'author',
        'updated',
        'updater',
        'status',
    ];

    public function event()
    {
        return $this->hasMany(Event::class, 'id_penyelenggara', 'id_penyelenggara');
    }
}
