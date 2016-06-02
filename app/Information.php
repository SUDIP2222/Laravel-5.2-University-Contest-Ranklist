<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Information extends Model
{
    protected $table='informations';

    protected $fillable = ['codeforces_handle'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
