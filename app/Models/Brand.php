<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Brand extends Model
{
    use HasFactory,LogsActivity;
    protected $appends=['text'];
    protected $log_name ="Brand";

    protected $fillable = [
    'name',
    'created_by',
    'created_at',
    'updated_at'
    ];
    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;
    protected static $submitEmptyLogs = false;

    protected $casts=[
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];
    public function getTextAttribute(){
        return $this->name;
    }
   public function getDescriptionForEvent(string $eventName): string
    {
        return  $this->log_name." {$this->name} has been {$eventName} ";
    }

}
