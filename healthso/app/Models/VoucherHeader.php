<?php

namespace Health\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DaignosisList
 */
class VoucherHeader extends Model
{
    protected $table = 'voucher_header';

    public $timestamps = false;

    protected $fillable = [
        "company_id",
        "created_by_user_id",
        "creation_date",
        "date",
        "description",
        "posting_date",
        "reference_number",
        "reference_type_id",
        "source_id",
        "status_id",
        "updated_user_id",
        "update_date",
    ];

    protected $guarded = [];

        
}