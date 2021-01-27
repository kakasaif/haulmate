<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DashboardLink extends Model
{
    protected $table = 'dashboard_links';

    protected $fillable = [
        'title', 'url', 'target', 'is_active'
    ];
}
