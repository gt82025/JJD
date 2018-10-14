<?php

namespace App\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Design extends Model
{
    //
    protected $table = 'designs';
    protected $guarded = ['id'];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    
    ];
    public function category()
    {
        return $this->belongsTo('App\Model\DesignCategory','category_id','id');
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
