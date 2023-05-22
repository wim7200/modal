<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    use Searchable;

    //protected $connection = "mysql_sec";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'qrClient',
        'company',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'qrClient' => 'string',
        'company' => 'string'
    ];

    public function tools()
    {
        return $this->belongsToMany(Tool::class)
            ->withPivot('state')
            ->withTimestamps();
    }

    /*public function toolsOut()
    {
        return $this->belongsToMany(Tool::class)
            ->withPivot('state')
            ->wherePivot('state','1')
            ->withTimestamps();
    }*/
}
