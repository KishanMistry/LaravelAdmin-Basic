<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResetPasswordModel extends Model {

    protected $table = 'password_resets';
    public $timestamps = false;
    protected $fillable = [
        'email', 'token', 'created_at'
    ];

}
