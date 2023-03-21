if (document.getElementById("addInputs")) {

    // Get the addInputs button element
    const addButton = document.getElementById("addInputs");

    // Add event listener to the addButton
    addButton.addEventListener("click", function () {

        // Get the inputContainers element
        const inputContainers = document.getElementById("inputsContainers");

        // Get the number of existing input sets
        const i = inputContainers.querySelectorAll(".remove-inputs").length;

        // Create a new input set container element
        const inputSets = document.createElement("div");
        inputSets.classList.add("remove-inputs");

        // Create the jobtext element
        const jobtext = document.createElement("div");
        jobtext.classList.add("text-success");
        jobtext.classList.add("p-2");
        jobtext.innerText = "Új munkahely hozzáadása:";

        // Create the label1 element
        const label1 = document.createElement("label");
        label1.setAttribute("for", `compname-${i}`);
        label1.classList.add("form-label");
        label1.innerText = "Cégnév";

        // Create the input1 element
        const input1 = document.createElement("input");
        input1.setAttribute("type", "text");
        input1.setAttribute("id", `compname-${i}`);
        input1.setAttribute("name", `compname-${i}`);
        input1.classList.add("form-control");

        // Create the label2 element
        const label2 = document.createElement("label");
        label2.setAttribute("for", `startDate-${i}`);
        label2.classList.add("form-label");
        label2.innerText = "Kezdés Dátuma";

        // Create the input2 element
        const input2 = document.createElement("input");
        input2.setAttribute("type", "date");
        input2.setAttribute("id", `startDate-${i}`);
        input2.setAttribute("name", `startDate-${i}`);
        input2.classList.add("form-control");

        // Create the label3 element
        const label3 = document.createElement("label");
        label3.setAttribute("for", `endDate-${i}`);
        label3.classList.add("form-label");
        label3.innerText = "Befejezés Dátuma";

        // Create the input3 element
        const input3 = document.createElement("input");
        input3.setAttribute("type", "date");
        input3.setAttribute("id", `endDate-${i}`);
        input3.setAttribute("name", `endDate-${i}`);
        input3.classList.add("form-control");

        // Create the label4 element
        const label4 = document.createElement("label");
        label4.setAttribute("for", `position-${i}`);
        label4.classList.add("form-label");
        label4.innerText = "Munkakör";

        // Create the input4 element
        const input4 = document.createElement("input");
        input4.setAttribute("type", "text");
        input4.setAttribute("id", `position-${i}`);
        input4.setAttribute("name", `position-${i}`);
        input4.classList.add("form-control");

        // Append all the elements to the inputSets container
        inputSets.appendChild(jobtext);
        inputSets.appendChild(label1);
        inputSets.appendChild(input1);
        inputSets.appendChild(label2);
        inputSets.appendChild(input2);
        inputSets.appendChild(label3);
        inputSets.appendChild(input3);
        inputSets.appendChild(label4);
        inputSets.appendChild(input4);

        // Append the inputSets container to the inputContainers element
        inputContainers.appendChild(inputSets);
    })

    const removeButton = document.getElementById("removeInputs");

    removeButton.addEventListener("click", function () {

        // Gets the inputGroup element by its ID
        const inputGroup = document.getElementById("inputsContainers");

        // Gets the last child element of the inputGroup
        const theLastElement = inputGroup.lastElementChild;

        // Removes the last element from the inputGroup if it has the 'remove-inputs' class
        if (theLastElement && theLastElement.classList.contains("remove-inputs")) {
            inputGroup.removeChild(theLastElement);

        }
    })

} else {
    "";
}