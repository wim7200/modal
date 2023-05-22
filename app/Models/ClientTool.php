<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ClientTool extends pivot
{
    protected $table = 'client_tool';
    use HasFactory;
}
