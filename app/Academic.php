<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    protected $primaryKey = 'staffid';
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'staffid', 'roleid', 'fullname', 'dob', 'gender',  'nic', 'paddress', 'caddress', 'contact', 'email', 'profession', 'qualifications', 'experience', 'department', 'leavebalance', 'username', 'passsword', 'confirmpassword', 'regdate'

    ];
}
