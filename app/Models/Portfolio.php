<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{
    use HasFactory, SoftDeletes, Sluggable;


    protected $fillable = [
        'category_id', 'media_id', 'title', 'slug', 'description', 'services', 'web', 'status'
    ];
    protected $with = ['category'];

    protected $appends = ['banner_src','thumb_src','created_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'portfolio_technologies');
    }

    public function galleries()
    {
        return $this->hasMany(PortfolioGallery::class);
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }

    public function getBannerSrcAttribute()
    {
        if (!is_null($this->media)) return $this->media->original();

        return "";
    }

    public function getThumbSrcAttribute()
    {
        if (!is_null($this->media)) return $this->media->thumb();

        return "";
    }


    public function getCreatedAtAttribute()
    {
      return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
