<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DosenProfile extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pengajuan()
    {
        return $this->hasMany(PengajuanBimbingan::class);
    }
}
