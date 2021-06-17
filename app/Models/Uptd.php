<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uptd extends Model
{
    use HasFactory;
    protected $table = 'uptd_opd';

    public function get_file()
    {
        return $this->hasMany('\App\Models\OpdFile', 'opd_id', 'id');
    }

    public function get_opd()
    {
        return $this->belongsTo('\App\Models\Opd', 'opd_id', 'id');
    }
}
