<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'media_id', 'portfolio_id', 'title', 'status'
    ];

    protected $appends = ['banner_src','thumb_src'];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }

    public function getBannerSrcAttribute()
    {
        if (!is_null($this->media)) return $this->media->thumb();

        return "";
    }

    public function getThumbSrcAttribute()
    {
        if (!is_null($this->media)) return $this->media->thumb();

        return "";
    }
}
