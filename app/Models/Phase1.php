<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Phase1 extends Model
{
    use HasFactory;
    protected $table = 'phase1';
    protected $guarded = ['id'];

   

    public function getClaimFormMaildDateAttribute($value)
    {
        return ( $value == '' || $value == null ) ? '' : Carbon::parse($value)->format('d-M-Y');
    }

     public function getClaimFormReceiveDateAttribute($value)
    {        
        return ( $value == '' || $value == null ) ? '' : Carbon::parse($value)->format('d-M-Y');
    }

    
   
}
