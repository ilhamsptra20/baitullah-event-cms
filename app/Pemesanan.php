<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';

    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';

    protected $fillable = [
        'kategori',
        'id_users',
        'id_tiket',
        'id_event',
        'id_metode_pembayaran',
        'no_pemesanan',
        'qty',
        'diskon',
        'total_payment',
        'sumber',
        'created',
        'updated',
        'status',
    ];

    public function tiket()
    {
        return $this->belongsTo(Tiket::class, 'id_tiket', 'id_tiket');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event', 'id_event');
    }

    public function metodePembayaran()
    {
        return $this->belongsTo(MetodePembayaran::class, 'id_metode_pembayaran', 'id_metode_pembayaran');
    }
}
