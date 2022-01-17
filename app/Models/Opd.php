<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

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

    public function get_file_rkpd(){
        return $this->hasMany('\App\Models\OpdFile', 'opd_id', 'id')->where('jenis_file','rkpd');
    }

    public function get_file_rkpd_dikirim(){
        return $this->hasMany('\App\Models\OpdFile', 'opd_id', 'id')->where('jenis_file','rkpd')
        ->where('created_by', Auth::user()->id);
    }

    public function get_file_rkpd_diterima(){
        return $this->hasMany('\App\Models\OpdFile', 'opd_id', 'id')->where('jenis_file','rkpd')
        ->where('created_by','!=', Auth::user()->id);
    }

    public function get_file_lkpj(){
        return $this->hasMany('\App\Models\OpdFile', 'opd_id', 'id')->where('jenis_file','lkpj');
    }

    public function get_file_lkpj_dikirim(){
        return $this->hasMany('\App\Models\OpdFile', 'opd_id', 'id')->where('jenis_file','lkpj')
        ->where('created_by', Auth::user()->id);
    }

    public function get_file_lkpj_diterima(){
        return $this->hasMany('\App\Models\OpdFile', 'opd_id', 'id')->where('jenis_file','lkpj')
        ->where('created_by','!=', Auth::user()->id);
    }

    public function get_file_sektoral(){
        return $this->hasMany('\App\Models\OpdFile', 'opd_id', 'id')->where('jenis_file','sektoral');
    }

    public function get_file_sektoral_dikirim(){
        return $this->hasMany('\App\Models\OpdFile', 'opd_id', 'id')->where('jenis_file','sektoral')
        ->where('created_by', Auth::user()->id);
    }

    public function get_file_sektoral_diterima(){
        return $this->hasMany('\App\Models\OpdFile', 'opd_id', 'id')->where('jenis_file','sektoral')
        ->where('created_by','!=', Auth::user()->id);
    }
}
