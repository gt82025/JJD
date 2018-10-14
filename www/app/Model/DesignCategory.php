<?php

namespace App\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DesignCategory extends Model
{
    //
    protected $table = 'design_categories';
    protected $guarded = ['id'];
    //protected $hidden = ['password'];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    
    ];
    public function design()
    {
    	return $this->hasMany('App\Model\Design','category_id');
       
    }

    /**
    * [created_at]的mutator
    *
    * @param $value
    * @return string
    */
    public function getCreatedAtAttribute($value)
    {
        if(!$value)return null;
        $timestamp = $this->asDateTime($value);
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $value, 'UTC');
        //$timezone = Carbon::now()->timezoneName;//時區
        //$date = $date->setTimezone($timezone);
        return $date->toDateTimeString();

    }
    
    public function getUpdatedAtAttribute($value)
    {
        if(!$value)return null;
        $timestamp = $this->asDateTime($value);
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $value, 'UTC');
        //$timezone = Carbon::now()->timezoneName;//時區
        //$date = $date->setTimezone($timezone);
        return $date->toDateTimeString();
        
    }
    
}
