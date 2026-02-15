<?php

namespace Modules\Category\App\Models;

use Modules\Course\App\Models\Course;
use Modules\Listing\App\Models\Listing;

use Illuminate\Database\Eloquent\Model;
use Modules\Category\App\Models\CategoryTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;


    protected $appends = ['name', 'total_course'];

    protected $hidden = ['front_translate'];

    public function translate()
    {
        return $this->belongsTo(CategoryTranslation::class , 'id', 'category_id')->where('lang_code', admin_lang());
    }

    public function front_translate()
    {
        return $this->belongsTo(CategoryTranslation::class , 'id', 'category_id')->where('lang_code', front_lang());
    }

    public function getNameAttribute()
    {
        return $this->front_translate->name;
    }

    public function courses()
    {
        return $this->hasMany(Course::class , 'category_id')->where(['status' => 'enable', 'approved_by_admin' => 'approved']);
    }

    public function getTotalCourseAttribute()
    {
        return $this->courses->count();
    }

}