function addAuthorField() {
    // Create a new input element
    var newAuthorField = document.createElement("input");
    newAuthorField.type = "text";
    newAuthorField.name = "authors[]";

    // Create a new label element
    var newLabel = document.createElement("label");
    newLabel.textContent = "Name of Another Author";

    // Append the new elements to the form
    document.querySelector(".authors").appendChild(newLabel);
    document.querySelector(".authors").appendChild(newAuthorField);
}