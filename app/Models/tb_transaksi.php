<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_transaksi extends Model
{
    use HasFactory;
    protected $table = 'tb_transaksis';
    protected $fillable = [
        'id_transaksi',
        'invoice',
        'id',
        'asal',
        'tujuan',
        'kurir',
        'ongkir',
        'total_bayar',
        'status_code',
        'status_message',
        'transaction_id',
        'order_id',
        'gross_amount',
        'transaction_time',
        'transaction_status',
        'fraud_status',
        'bill_key',
        'biller_code',
        'pdf_url',
        'finish_redirect_url',
    ];
}
