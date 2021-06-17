<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpdFile extends Model
{
    use HasFactory;
    protected $table = 'opd_file';

    public function get_opd()
    {
        return $this->belongsTo('\App\Models\Opd', 'opd_id', 'id');
    }

    public function get_user()
    {
        return $this->belongsTo('\App\Models\User', 'created_by', 'id');
    }

    public function get_uptd()
    {
        return $this->belongsTo('\App\Models\Uptd', 'file_to_uptd', 'id');
    }

    public function upload_by_opd(){
        return $this->belongsTo('\App\Models\Opd', 'upload_file_by', 'id');
    }

    public function upload_by_uptd(){
        return $this->belongsTo('\App\Models\Uptd', 'upload_file_by', 'id');
    }
}
