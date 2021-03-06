<?php

namespace App\Models\Usuarios;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Empleado extends Model
{
  use softDeletes;
    protected $table = 'empleados';
    protected $primaryKey = 'id_empleado';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id_usuario', 'id_empresa', 'id_contrato', 'estado', 'cargo', 'area'
    ];

    public function user(){
    	return $this->belongsTo('App\Models\Usuarios\User');
    }

    public function empresa(){
    	return $this->belongsTo('App\Models\Usuarios\Empresa');
    }

    public function contrato(){
    	return $this->belongsTo('App\Models\Usuarios\Contrato');
    }
}
