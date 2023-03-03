const functionList = document.getElementById("functions");
// TODO: Move the template to a seperate file.
const template = `
    <div class="accordion-item m-3">
        <h3 class="accordion-header">
            <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#function-%functionIndex%-target">
                <div class="row w-100">
                    <div id="function-title-%functionIndex%" class="col-10">
                        %function_title%
                    </div>
                    <div class="col">
                        <button class="text-danger delete-button" type="button" onclick="removeFunction(%functionIndex%) %disabled%">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </h3>
        <div id="function-%functionIndex%-target" class="accordion-collapse collapse m-3" data-bs-parent="#functions">
            <div class="accordion-body p-2">
                <input type="hidden" name="functions[%functionIndex%][id]" value="%id%" />
                <div class="form-group">
                    <label class="form-label required-input">Functie:</label>
                    <input id="function-title-input-%functionIndex%" class="form-control" type="text" name="functions[%functionIndex%][function_title]" value="%function_title%" onchange="updateFunctionTitle(%functionIndex%)" %disabled% />
                </div>
                <div class="form-group">
                    <label class="form-label">Omschrijving:</label>
                    <textarea class="form-control" type="text" name="functions[%functionIndex%][description]" value="%description%" %disabled%></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label required-input">Startdatum:</label>
                    <input class="form-control" type="date" name="functions[%functionIndex%][start_date]" value="%start_date%" %disabled% />
                </div>
                <div class="form-group">
                    <label class="form-label">Einddatum:</label>
                    <input class="form-control" type="date" name="functions[%functionIndex%][end_date]" value="%end_date%" %disabled% />
                </div>
            </div>
        </div>
    </div>
`;

function updateFunctionTitle(functionIndex) {
    const titleElement = document.getElementById(`function-title-${functionIndex}`);
    const titleInput = document.getElementById(`function-title-input-${functionIndex}`);

    if (titleElement === null || titleInput === null) {
        return;
    }

    titleElement.textContent = titleInput.value;
}

// function recalculateNumbers() {
//     for (let index = 0; index < functionList.children.length; index++) {
//         let functionElement = functionList.children.item(index);

//         if (typeof functionElement === "undefined") {
//             continue;
//         }

//         const numberElement = functionElement
//             .getElementsByClassName(`function-num`)
//             .item(0);

//         if (numberElement === null) {
//             continue;
//         }

//         // Replace every occurance of the old index with the new index.
//         const oldIndex = parseInt(numberElement.textContent) - 1;
//         const controls = functionElement.querySelectorAll("input,textarea");

//         for (const control of controls) {
//             control.name = control.name.replace(oldIndex.toString(), index.toString());
//         }

//         // Update function number in the display.
//         numberElement.textContent = index + 1;
//     }
// }

function addNewFunction(data, editable) {
    let index = functionList.children.length;

    if (typeof data !== "undefined") {
        index = data["id"];
    }

    let html = template
        .replace(/%functionIndex%/g, index)
        .replace(/%functionNum%/g, parseInt(index) + 1);

    function replaceMarker(key) {
        let newValue = "";

        if (typeof data !== "undefined" && typeof data[key] !== "undefined") {
            newValue = data[key];
        }

        key = `%${key}%`;

        while (html.search(key) !== -1) {
            html = html.replace(key, newValue);
        }
    }

    if (typeof data === "undefined") {
        html = html.replace(/%id%/g, "-1");
        html = html.replace(/%function_title%/g, "Nieuwe functie");
    } else {
        replaceMarker("id");
        replaceMarker("function_title");
    }

    replaceMarker("start_date");
    replaceMarker("end_date");

    if (editable === false) {
        html = html.replace(/%disabled%/g, 'disabled=""');
    } else {
        html = html.replace(/%disabled%/g, "");
    }

    const element = document.createElement("div");
    element.innerHTML = html;
    element.classList.add("accordion", "function", "function-" + index);

    if (typeof editable === "boolean" && !editable) {
        const deleteButtons = element.getElementsByClassName("delete-button");

        for (const button of deleteButtons) {
            button.remove();
        }
    }

    if (typeof data !== "undefined") {
        const description = element
            .getElementsByTagName("textarea")
            .item(0);

        if (description !== null) {
            description.textContent = data["description"];
        }
    }

    functionList.appendChild(element);
}

function loadFunctions(data, editable) {
    for (const _function of data) {
        addNewFunction(_function, editable);
    }
}

function removeFunction(index) {
    if (functionList.children.length - 1 <= 0) {
        return;
    }

    const functions = document.getElementsByClassName("function-" + index);

    for (const _function of functions) {
        functionList.removeChild(_function);
    }

    // recalculateNumbers();
}
