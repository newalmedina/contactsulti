<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = "user_profiles";



    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }





    public function getFullNameAttribute()
    {
        return trim($this->attributes['first_name'] . " " . $this->attributes['last_name']);
    }


    public function getBirthdateFormattedAttribute()
    {
        if (!empty($this->birthdate)) {
            return (Carbon::createFromFormat('Y-m-d', $this->birthdate))->format('d/m/Y');
        }

        return '';
    }
}
