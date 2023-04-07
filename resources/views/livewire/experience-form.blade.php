@push("componentStyles")
    @livewireStyles()
@endpush

@push("componentScripts")
    @livewireScripts()
@endpush

<form wire:submit.prevent="submitForm">
    @csrf
    @method($method)
    <h1>{{ __("livewire/experience-form.experience") . " " . strtolower($title) }}</h1>
    <div class="form-group">
        <label class="form-label required-input">{{ __("livewire/experience-form.form.company-name") }}</label>
        <input class="form-control" type="text" wire:model.lazy="companyName" />
        @error("companyName")
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-label">{{ __("livewire/experience-form.form.company-website") }}</label>
        <input class="form-control" type="url" wire:model.lazy="companyWebsite" />
        @error("companyWebsite")
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="functions">
        <h2>
            @if (count($functions) > 1)
                {{ __("livewire/experience-form.form.functions.plural") }}
            @else
                {{ __("livewire/experience-form.form.functions.singular") }}
            @endif
            <button class="btn btn-primary rounded-pill" type="button" wire:click="addFunction">
                <i class="fa-solid fa-plus"></i>
            </button>
        </h2>
        <div id="functions" class="accordion">
            @for ($index = 0; $index < count($functions); $index++)
                @if (isset($functions[$index]))
                    @php($function = $functions[$index])
                    <div>
                        <div class="accordion-item mt-3 mb-3">
                            <h3 class="accordion-header">
                                <div class="accordion-button @if ($activeAccordion != $index) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#function-{{ $index }}-target" wire:click="setActiveAccordion({{ $index }})">
                                    <div id="function-title-{{ $index }}">
                                        {{ $function["function_title"] }}
                                    </div>
                                </div>
                            </h3>
                            <div id="function-{{ $index }}-target" class="accordion-collapse collapse m-3 @if ($activeAccordion == $index) show @endif" data-bs-parent="#functions">
                                <div class="accordion-body p-2">
                                    <button class="delete-button float-end" type="button" wire:click="removeFunction({{ $index }})">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                    <input type="hidden" name="functions[{{ $index }}][id]" value="{{ $function["id"] }}" />
                                    <div class="form-group">
                                        <label class="form-label required-input">{{ __("livewire/experience-form.form.functions.function-title") }}</label>
                                        <input id="function-title-input-{{ $index }}" class="form-control" type="text" wire:model.lazy="functions.{{ $index }}.function_title" @if ($this->disabled) disabled @endif />
                                        @error("functions." . $index . ".function_title")
                                            <span class="text-danger">{{ __($message) }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">{{ __("livewire/experience-form.form.functions.description") }}</label>
                                        <textarea class="form-control" type="text" wire:model.lazy="functions.{{ $index }}.description" @if ($this->disabled) disabled @endif></textarea>
                                        @error("functions." . $index . ".description")
                                            <span class="text-danger">{{ __($message) }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label required-input">{{ __("livewire/experience-form.form.functions.start_date") }}</label>
                                        <input class="form-control" type="date" wire:model.lazy="functions.{{ $index }}.start_date" @if ($this->disabled) disabled @endif />
                                        @error("functions." . $index . ".start_date")
                                            <span class="text-danger">{{ __($message) }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">{{ __("livewire/experience-form.form.functions.end_date") }}</label>
                                        <input class="form-control" type="date" wire:model.lazy="functions.{{ $index }}.end_date" @if ($this->disabled) disabled @endif />
                                        @error("functions." . $index . ".end_date")
                                            <span class="text-danger">{{ __($message) }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endfor
        </div>
    </div>
    <button class="btn btn-primary" type="submit" wire:submit.prevent="submitForm">
        <i class="fa-solid fa-plus"></i>
        {{ $title }}
    </button>
</form>
