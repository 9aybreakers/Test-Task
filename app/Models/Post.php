<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Sluggable;
use function PHPUnit\TextUI\Configuration\defaultTestSuite;

class Post extends Model
{
    use HasFactory,Sluggable;

    protected $fillable = [
       'title',
        'description',
        'content',
        'category_id',
        'thumbnail',

    ];
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public static function uploadImage(Request $request, $image = null)
    {
        if ($request->hasFile('thumbnail')) {
            if ($image) {
                Storage::delete("public/posts/{$image}");
            }

            $filename = $request->file('thumbnail')->getClientOriginalName();

            $path = $request->file('thumbnail')->storeAs('public/posts', $filename);

            return basename($path);
        }

        return null;
    }


    public function getImage()
    {
        if (!$this->thumbnail) {
            return asset("no-image.png");
        }
        $image = Image::make(storage_path("app/public/posts/{$this->thumbnail}"));
        $image->resize(500, 400);
        $image->save(storage_path("app/public/posts/{$this->thumbnail}"));

        return asset("storage/posts/{$this->thumbnail}");

    }



    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
