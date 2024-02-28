
if (document.getElementById("addInputField")) {

   const addButton = document.getElementById("addInputField");

   addButton.addEventListener("click", function () {

      // get the container element and count the number of input sets already present
      const Inputscontainer = document.getElementById("inputsContainer");
      const i = Inputscontainer.querySelectorAll(".add-input").length + 1;

      // create a new input set element
      const inputSet = document.createElement("div");
      inputSet.classList.add("add-input");

      // add a text element
      const text = document.createElement("div");
      text.classList.add("text-success");
      text.classList.add("p-2");
      text.innerText = "Add new school:";

      // create input elements and labels
      const label1 = document.createElement("label");
      label1.setAttribute("for", `institution-${i}`);
      label1.classList.add("form-label");
      label1.innerText = "Institution name";

      const input1 = document.createElement("input");
      input1.setAttribute("type", "text");
      input1.setAttribute("id", `institution-${i}`);
      input1.setAttribute("name", `institution-${i}`);
      input1.classList.add("form-control");

      const label2 = document.createElement("label");
      label2.setAttribute("for", `start-${i}`);
      label2.classList.add("form-label");
      label2.innerText = "Start date";

      const input2 = document.createElement("input");
      input2.setAttribute("type", "date");
      input2.setAttribute("id", `start-${i}`);
      input2.setAttribute("name", `start-${i}`);
      input2.classList.add("form-control");

      const label3 = document.createElement("label");
      label3.setAttribute("for", `end-${i}`);
      label3.classList.add("form-label");
      label3.innerText = "End date";

      const input3 = document.createElement("input");
      input3.setAttribute("type", "date");
      input3.setAttribute("id", `end-${i}`);
      input3.setAttribute("name", `end-${i}`);
      input3.classList.add("form-control");

      const label4 = document.createElement("label");
      label4.setAttribute("for", `major-${i}`);
      label4.classList.add("form-label");
      label4.innerText = "Major";

      const input4 = document.createElement("input");
      input4.setAttribute("type", "text");
      input4.setAttribute("id", `major-${i}`);
      input4.setAttribute("name", `major-${i}`);
      input4.classList.add("form-control");

      // append the elements to the input set
      inputSet.appendChild(text);
      inputSet.appendChild(label1);
      inputSet.appendChild(input1);
      inputSet.appendChild(label2);
      inputSet.appendChild(input2);
      inputSet.appendChild(label3);
      inputSet.appendChild(input3);
      inputSet.appendChild(label4);
      inputSet.appendChild(input4);

      // append the input set to the container
      Inputscontainer.appendChild(inputSet);
   });

   const removeButton = document.getElementById("removeInput");

   removeButton.addEventListener("click", function () {

      // Get the container for the input fields
      const inputContainer = document.getElementById("inputsContainer");

      // Get the last input set in the container
      const lastInputSet = inputContainer.lastElementChild;

      // If the last input set exists and is of the class "add-input"
      if (lastInputSet && lastInputSet.classList.contains("add-input")) {

         // Remove the last input set from the container
         inputContainer.removeChild(lastInputSet);
      }
   });

}
else {
   "";
}





