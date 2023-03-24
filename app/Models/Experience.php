<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        "company_name",
        "company_website"
    ];

    public function functions() {
        return $this->hasMany(ExperienceFunction::class)
            ->orderByRaw("end_date IS NULL DESC")
            ->orderBy("start_date", "desc");
    }
}
