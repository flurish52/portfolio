<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioProjectImages extends Model
{

    protected $fillable = ['portfolio_id', 'default_image', 'hovered_image', 'file_type_default_image', 'file_type_hovered_image', 'default_file_path', 'hovered_file_path'];
    // An image belongs to a Portfolios
    public function project()
    {
        return $this->belongsTo(Portfolio::class);
    }



}
