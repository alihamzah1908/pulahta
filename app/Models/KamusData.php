<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KamusData extends Model
{
    use HasFactory;

    protected $table = 'metadata_file';

    public function get_opd_file(){
        return $this->belongsTo('\App\Models\OpdFile','opd_file_id','id');
    }
}
