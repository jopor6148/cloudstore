<?php

namespace cloudstore\Models\office;

use Illuminate\Database\Eloquent\Model;

class sucursale extends Model
{
    /**
    * The connection name for the model.
    *
    * @var string
    */
    protected $connection = 'mysql';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sucursales';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'SucursalID',
        'Nombre',
    ];
}
