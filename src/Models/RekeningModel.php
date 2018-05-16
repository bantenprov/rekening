<?php namespace Bantenprov\Rekening\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * The RekeningModel class.
 *
 * @package Bantenprov\Rekening
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RekeningModel extends Model
{
    protected $table = 'rekenings';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'uuid',
        'kode',
        'nama',
        'level',
        'user_id',
        'user_update',
    ];

    public function getUser()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function getUserCreated()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function getUserUpdated()
    {
        return $this->belongsTo('App\User','user_update');
    }

    // public function getitem()
    // {
    //     return $this->hasMany('Item', 'id');
    // }
}
