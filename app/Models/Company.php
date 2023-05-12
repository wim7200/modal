<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable=[
        'name','number'
    ];

    protected $casts=[
        'id'=>'integer',
    ];

    public function tools():HasMany
    {
        return $this->hasMany(Tool::class);
    }

    public function users():HasMany
    {
        return $this->hasMany(User::class);
    }

}
