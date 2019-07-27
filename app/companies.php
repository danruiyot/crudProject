<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class companies extends Model
{
	protected $table = 'companies';
    
    /**
     * Indicates primary key of the table
     *
     * @var bool
     */
    public $primaryKey = 'id';
    
    /**
     * Indicates if the model should be timestamped
     * 
     * default value is 'true'
     * 
     * If set 'true' then created_at and updated_at columns 
     * will be automatically managed by Eloquent
     * 
     * If created_at and updated_at columns are not in your table
     * then set the value to 'false'
     *
     * @var bool
     */
    public $timestamps = true;
    
    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = array('name', 'email',  'website','image');
    
    /**
     * The attributes that aren't mass assignable
     *
     * @var array
     */
    protected $guarded = array();
}

