document.addEventListener("DOMContentLoaded", () => {
    const AddForm = document.querySelector("#AddUni");

    document.querySelector("#linkAddUni").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.add("form--hidden");
        createAccountForm.classList.remove("form--hidden");
    });
    
});
function setFormMessage(formElement, type, message) {
    const messageElement = formElement.querySelector(".form__message");

    messageElement.textContent = message;
    messageElement.classList.remove("form__message--success", "form__message--error");
    messageElement.classList.add(`form__message--${type}`);
}

function setInputError(inputElement, message) {
    inputElement.classList.add("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = message;
}

function clearInputError(inputElement) {
    inputElement.classList.remove("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = "";
}

function validateForm() {
    var x = document.forms["myForm"]["UniName"].value;
    if (x == "") {
      alert("Please fill out all the fields");
      return false;
    }
}

function validate(userId) {
    var userId = document.getElementById("user-id").value;
    var pattern = /^[0-9]+$/;
    
    if (pattern.test(userId)) {
      // user ID is only numbers
      // do something here
    } else {
      // user ID contains non-numeric characters
      document.getElementById("error-msg").innerHTML = "Error: User ID must only contain numbers.";
    }
  }

