<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{

    protected $fillable = ['portfolio_name', 'slug', 'description'];
    public function images()
    {
        return $this->hasMany(PortfolioProjectImages::class);
    }

    public function properties()
    {
        return $this->hasMany(PortfolioProjectProperties::class);
    }

    public function fileTypes()
    {
        return $this->hasMany(PortfolioProjectFileTypes::class);
    }
}
