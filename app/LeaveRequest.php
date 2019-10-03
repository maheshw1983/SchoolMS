<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    protected $table = 'leaverequests';

    protected $primaryKey = 'leaveid';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'staffid', 'fullname', 'profession', 'department', 'from', 'to', 'type', 'reason', 'status'

    ];
}
