@push("componentStyles")
    @livewireStyles()
@endpush

@push("componentScripts")
    @livewireScripts()
    <script>
        function updateFunctionTitle(index) {
            const titleElement = document.getElementById(`function-title-${index}`);
            const titleInput = document.getElementById(`function-title-input-${index}`);

            if (titleElement === null || titleInput === null) {
                return;
            }

            titleElement.textContent = titleInput.value;
        }
    </script>
    <script>
        window.addEventListener("livewire:load", () => {
            @this.on("log", message => console.log(message));
        });
    </script>
@endpush

<form wire:submit.prevent="submitForm">
    @csrf
    @method($method)
    <h1>{{ __("Ervaring") . " " . strtolower($title) }}</h1>
    <div class="form-group">
        <label class="form-label requiraed-input">{{ __("Bedrijfsnaam") }}:</label>
        <input class="form-control" type="text" wire:model.lazy="companyName" />
        @error("companyName")
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-label">{{ __("Bedrijfswebsite") }}:</label>
        <input class="form-control" type="url" wire:model.lazy="companyWebsite" />
        @error("companyWebsite")
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="functions">
        <h2>
            @if (count($functions) > 1)
                {{ __("Functies") }}
            @else
                {{ __("Functie") }}
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
                                        <label class="form-label required-input">Functie:</label>
                                        <input id="function-title-input-{{ $index }}" class="form-control" type="text" wire:model.lazy="functions.{{ $index }}.function_title" @if ($this->disabled) disabled @endif />
                                        @error("functions." . $index . ".function_title")
                                            <span class="text-danger">{{ __($message) }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Omschrijving:</label>
                                        <textarea class="form-control" type="text" wire:model.lazy="functions.{{ $index }}.description" @if ($this->disabled) disabled @endif></textarea>
                                        @error("functions." . $index . ".description")
                                            <span class="text-danger">{{ __($message) }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label required-input">Startdatum:</label>
                                        <input class="form-control" type="date" wire:model.lazy="functions.{{ $index }}.start_date" @if ($this->disabled) disabled @endif />
                                        @error("functions." . $index . ".start_date.0")
                                            <span class="text-danger">{{ __($message) }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Einddatum:</label>
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
