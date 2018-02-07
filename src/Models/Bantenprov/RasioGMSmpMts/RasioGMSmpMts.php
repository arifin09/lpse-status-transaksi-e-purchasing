<?php

namespace Bantenprov\StatusTransaksiEpurchasing\Models\Bantenprov\StatusTransaksiEpurchasing;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusTransaksiEpurchasing extends Model
{

    protected $table = 'status-transaksi-e-purchasings';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('negara', 'province_id', 'kab_kota', 'regency_id', 'tahun', 'data');

    public function getProvince()
    {
        return $this->hasOne('Bantenprov\StatusTransaksiEpurchasing\Models\Bantenprov\StatusTransaksiEpurchasing\Province','id','province_id');
    }

    public function getRegency()
    {
        return $this->hasOne('Bantenprov\StatusTransaksiEpurchasing\Models\Bantenprov\StatusTransaksiEpurchasing\Regency','id','regency_id');
    }

}

