<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 9/22/2020
 * Time: 11:00 AM
 */

namespace App\Billing;


use Illuminate\Database\Eloquent\Model;

class StripePlan extends Model
{

    protected $table='stripe_plans';
    protected $guarded = [] ;
}