<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Product extends Model
{
    use HasFactory,LogsActivity;

    protected $appends=['text'];
     protected $log_name =  "Product";
    protected $fillable = ['name', 'created_by','created_at','updated_at'];
    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;
    protected static $submitEmptyLogs = false;

    // const
    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;

    // casting
    protected $casts=[
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];


}
