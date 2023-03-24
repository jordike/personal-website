<?php

namespace App\Http\Livewire;

use App\Models\Experience;
use App\Models\ExperienceFunction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class ExperienceForm extends Component
{
    public $companyName;
    public $companyWebsite;
    public $functions = [];
    public $experienceId;

    public $disabled;
    public $activeAccordion;
    public $method;
    public $title;

    protected $rules = [
        "companyName" => "required",
        "companyWebsite" => [ "nullable", "url" ],
        "functions.*.function_title" => "required",
        "functions.*.description" => [ "nullable", "max:400" ],
        "functions.*.start_date" => [ "required", "date" ],
        "functions.*.end_date" => [ "nullable", "date" ]
    ];

    protected $messages = [
        "functions.*.function_title.required" => "function.required",
        "functions.*.description.max" => "function.max",
        "functions.*.start_date.required" => "function.required",
        "functions.*.start_date.required" => "function.required",
        "functions.*.start_date.date" => "function.date",
        "functions.*.end_date.date" => "function.date"
    ];

    public function addFunction()
    {
        $this->functions[] = [
            "id" => null,
            "experience_id" => $this->experienceId,
            "function_title" => "Nieuwe functie",
            "description" => null,
            "start_date" => null,
            "end_date" => null
        ];
    }

    public function removeFunction($id)
    {
        if (!$this->disabled) {
            array_splice($this->functions, $id, $id == 0 ? 1 : $id);
        }

        if (count($this->functions) == 0) {
            $this->addFunction();
        }

        if ($this->activeAccordion == $id) {
            $this->activeAccordion = -1;
        }
    }

    public function setActiveAccordion($index)
    {
        $this->activeAccordion = $index == $this->activeAccordion ? -1 : $index;
    }

    public function submitForm()
    {
        $this->validate();

        Gate::authorize("perform-admin-task", auth()->user());

        $experience = Experience::updateOrCreate([ "id" => $this->experienceId ], [
            "company_name" => $this->companyName,
            "company_website" => $this->companyWebsite
        ]);

        $functionList = [];

        foreach ($this->functions as $requestData) {
            $function = ExperienceFunction::updateOrCreate([ "id" => $requestData["id"] ], [
                "experience_id" => $experience->id,
                "function_title" => $requestData["function_title"],
                "description" => $requestData["description"],
                "start_date" => $requestData["start_date"],
                "end_date" => $requestData["end_date"]
            ]);

            $functionList[] = $function->id;
        }

        DB::table("experience_functions")
            ->whereNotIn("id", $functionList)
            ->where("experience_id", $experience->id)
            ->delete();

        return redirect()->route("experience.index");
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function mount($title, $id = null, $disabled = false, $method = "POST")
    {
        $this->experienceId = $id;
        $this->method = $method;
        $this->disabled = $disabled;
        $this->activeAccordion = 0;
        $this->title = $title;

        $this->functions = ExperienceFunction::where("experience_id", "=", $this->experienceId)
            ->get()
            ->toArray();

        $company = Experience::find($this->experienceId);
        $this->companyName = $company->company_name;
        $this->companyWebsite = $company->company_website;

        if (count($this->functions) == 0) {
            $this->addFunction();
        }
    }

    public function render()
    {
        return view("livewire.experience-form", [
            "functions" => $this->functions,
            "disabled" => $this->disabled
        ]);
    }
}
