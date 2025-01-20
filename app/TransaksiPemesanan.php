<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiPemesanan extends Model
{
    protected $table = "trs_pemesanan";
    protected $primaryKey = "id_trs_pemesanan";

    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';

    protected $fillable = [
        'no_pemesanan',
        'kategori',
        'fullname',
        'email',
        'phone',
        'created',
        'updated',
        'status',
    ];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_trs_pemesanan', 'id_trs_pemesanan');
    }
}
