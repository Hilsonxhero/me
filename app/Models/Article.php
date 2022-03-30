<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, SoftDeletes, Sluggable;


    protected $fillable = [
        'category_id', 'media_id', 'title', 'slug', 'description', 'content', 'is_published'
    ];

    protected $with = ['category'];

    protected $appends = ['banner_src', 'created_at','description'];

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

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }

    public function getDescriptionAttribute()
    {
        return  Str::of($this->attributes['description'])->words(15, '...');
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
