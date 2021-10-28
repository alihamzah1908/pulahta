<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $table = 'notifikasi';

    public function get_opd()
    {
        return $this->belongsTo('\App\Models\Opd', 'opd_id', 'id');
    }

    public function get_user()
    {
        return $this->belongsTo('\App\Models\User', 'created_by', 'id');
    }
}
