<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'image_original_name',
        'text',
        'creation_date',
        'type_id'
    ];


    public static function generateSlug($str){

        $slug = Str::slug($str, '-');
        $original_slug = $slug;
        $slug_exixts = Work::where('slug', $slug)->first();
        $c = 1;
        while($slug_exixts){
            $slug = $original_slug . '-' . $c;
            $slug_exixts = Work::where('slug', $slug)->first();
            $c++;
        }

        return $slug;
    }

    public function type(){
		return $this->belongsTo(Type::class);
	}
}
