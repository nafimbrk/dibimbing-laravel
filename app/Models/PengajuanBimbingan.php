<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanBimbingan extends Model
{
    protected $guarded = ['id'];

    public function dosenProfile()
    {
        return $this->belongsTo(DosenProfile::class);
    }
}
