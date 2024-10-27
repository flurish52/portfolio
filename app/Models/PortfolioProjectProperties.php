<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioProjectProperties extends Model
{
    protected $fillable = ['portfolio_id', 'property'];
    // A property belongs to a project
    public function project()
    {
        return $this->belongsTo(Portfolio::class);
    }
}
