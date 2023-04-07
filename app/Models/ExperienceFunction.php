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
        $month = strtolower(__("time.months." . $dateObject->format("m")));
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

    // TODO: Refactor this code
    public function formatElapsedTime()
    {
        $elapsedTime = $this->calculateElapsedTime();

        $text = "";

        if ($elapsedTime->m <= 0 && $elapsedTime->y <= 0) {
            $text .= $elapsedTime->d;

            if ($elapsedTime->d == 1) {
                $text .= " " . __("time.units.days.singular");
            } else {
                $text .= " " . __("time.units.days.plural");
            }
        }

        if ($elapsedTime->y > 0) {
            $text .= $elapsedTime->y . " ";

            if ($elapsedTime->y == 1) {
                $text .= __("time.units.years.singular");
            } else {
                $text .= __("time.units.years.plural");
            }
        }

        if ($elapsedTime->m > 0 && $elapsedTime->y > 0) {
            $text .= " " . __("time.and") . " ";
        }

        if ($elapsedTime->m > 0) {
            $text .= $elapsedTime->m . " ";

            if ($elapsedTime->m == 1) {
                $text .= __("time.units.months.singular");
            } else {
                $text .= __("time.units.months.plural");
            }
        }

        return $text;
    }
}
