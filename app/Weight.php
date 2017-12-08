<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Weight extends Model
{
	use Sortable;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
 
    protected $fillable = [ 'date', 'max', 'min' ];

    public $sortable = [ 'date', 'max', 'min' ];


}
