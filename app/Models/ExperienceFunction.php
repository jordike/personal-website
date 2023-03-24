<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceFunction extends Model
{
    use HasFactory;

    protected $fillable = [
        "experience_id",
        "function_title",
        "description",
        "start_date",
        "end_date"
    ];

    public function formatDate($date)
    {
        $dateObject = date_create($date);
        $month = strtolower(__("months." . $dateObject->format("m")));
        $year = $dateObject->format("Y");

        return "$month $year";
    }

    public function calculateElapsedTime()
    {
        $startDate = Carbon::createFromFormat("Y-m-d", $this->start_date);
        $endDate = $this->end_date;

        if ($endDate == null) {
            $endDate = now();
        } else {
            $endDate = Carbon::createFromFormat("Y-m-d", $endDate);
        }

        return $startDate->diff($endDate);
    }

    public function formatElapsedTime()
    {
        $elapsedTime = $this->calculateElapsedTime();

        $text = "";

        if ($elapsedTime->m <= 0 && $elapsedTime->y <= 0) {
            $text .= $elapsedTime->d;

            if ($elapsedTime->d == 1) {
                $text .= " dag";
            } else {
                $text .= " dagen";
            }
        }

        if ($elapsedTime->y > 0) {
            $text .= $elapsedTime->y . " jaar";
        }

        if ($elapsedTime->m > 0 && $elapsedTime->y > 0) {
            $text .= " en ";
        }

        if ($elapsedTime->m > 0) {
            $text .= $elapsedTime->m . " ";

            if ($elapsedTime->m == 1) {
                $text .= "maand";
            } else {
                $text .= "maanden";
            }
        }
        return $text;
    }
}
