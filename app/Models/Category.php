<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use HasFactory,LogsActivity;

     protected $log_name =  "Category";
    // const name = "Category";
    protected $fillable = ['name', 'created_by','created_at','updated_at'];
    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;
    protected static $submitEmptyLogs = false;

    public function getDescriptionForEvent(string $eventName): string
    {
        return  $this->log_name." {$this->name} has been {$eventName} ";
    }

}
