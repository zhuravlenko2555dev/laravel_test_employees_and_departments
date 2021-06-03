<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    const PAYMENT_TYPE_MONTHLY = 1;
    const PAYMENT_TYPE_HOURLY = 2;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'birthdate',
        'gender',
        'department_id',
        'position',
        'payment_type',
        'payment_value',
        'hour_per_month',
    ];
}
