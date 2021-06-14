<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opd extends Model
{
    use HasFactory;
    protected $table = 'opd';

    public function get_file()
    {
        return $this->hasMany('\App\Models\OpdFile', 'opd_id', 'id');
    }
    public function get_uptd()
    {
        return $this->hasMany('\App\Models\Uptd', 'opd_id', 'id');
    }
}
