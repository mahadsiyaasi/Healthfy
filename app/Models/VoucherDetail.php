<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DaignosisList
 */
class VoucherDetail extends Model
{
    protected $table = 'voucher_detail';

    public $timestamps = false;

    protected $fillable = [
        "account_id",
        "amount",
        "status_id",
        "type_id",
        "voucher_id",
        "customer_id"
    ];

    protected $guarded = [];

        
}