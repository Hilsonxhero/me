<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes, Sluggable;


    protected $fillable = [
        'category_id', 'media_id', 'title', 'slug', 'description', 'is_published'
    ];

    protected $with = ['category'];

    protected $appends = ['banner_src'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tags');
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
