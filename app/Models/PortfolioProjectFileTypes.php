<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioProjectFileTypes extends Model
{
    protected $fillable = ['portfolio_id', 'file_type'];
    // A file type belongs to a project
    public function project()
    {
        return $this->belongsTo(Portfolio::class);
    }
}
