<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $table = 'tabel_tiket';
    protected $primaryKey = 'id_tiket';

    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';

    protected $fillable = [
        'id_event',
        'title',
        'deskripsi',
        'harga',
        'stok',
        'end_date',
        'created',
        'author',
        'updated',
        'updater',
        'status',
    ];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_tiket', 'id_tiket');
    }
}
