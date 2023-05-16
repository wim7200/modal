<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'qrTool',
        'duetime',
        'isActive',
        'kind_id',
        'condition_id',
        'company_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'name'=>'string',
        'duetime' => 'timestamp',
        'isActive'=>'boolean',
        'kind_id' => 'integer',
        'condition_id' => 'integer',
        'company_id'=>'integer',

    ];

    public function kind()
    {
        return $this->belongsTo(Kind::class);
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class)
            //->using(ClientTool::class)
            ->withPivot('state')
            ->orderByPivot('created_at',direction: 'desc')
            ->withTimestamps();
    }

   public function lastupdated_clients()
    {
        return $this->belongsToMany(Client::class)
            ->wherePivot('state',true)
            ->withPivot('state','id','created_at')
            ->orderBy('client_tool.id','desc')
            ;
    }

    public function latestRent()
    {
        return $this->hasOne(ClientTool::class)
            ->latestOfMany('created_at');
    }
}
