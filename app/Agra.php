<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agra extends Model
{
    $fillable = [
    	'CABANG','CIF','NO_REK','NASABAH','GROUP_NASABAH','CUSTOMER_RATING','PRODUK','OWNERSHIP','PRIME','SEKTOR','BUC',
    	'NIP_RM','NAMA_RM','KOLEKTABILITAS','RESTRU','LIMIT','BADE','VALUTA','KURS','TANGGAL_PEMBUKAAN','TANGGAL_JATUH_TEMPO','NILAI_RY',
    	'RATE','WRITE_OFF','STATUS_DOWNGRADE','FAR','JAMINAN'
    ];
}
