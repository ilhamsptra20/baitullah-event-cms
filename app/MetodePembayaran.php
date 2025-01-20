<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetodePembayaran extends Model
{
    protected $table = 'mst_metode_pembayaran';
    protected $primaryKey = 'id_metode_pembayaran';

    // const CREATED_AT = 'created';
    // const UPDATED_AT = 'updated';

    protected $fillable = [
        'title',
        'tutorial',
        'key_value',
        'order_by',
        'author',
        'created_at',
        'updater',
        'updated_at',
        'status',
    ];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_metode_pembayaran', 'id_metode_pembayaran');
    }
}
