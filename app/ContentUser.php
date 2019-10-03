<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentUser extends Model
{
    //
    protected $table='content_users';
    protected $fillable = [
        'content_user_id','NamaFile', 'DeskripsiFile','file' 
    ];
    public function user(){
       return $this->belongsTo('App\User','content_user_id');
    }
}
