
// alert("Hi");
let checkPswd=()=>{
const password = document.getElementById("password");
const confirm = document.getElementById("confirm");
const message = document.getElementById("message");

    if (password.value != confirm.value) {
     message.textContent = "Passwords do not match";
    message.style.color = "red"; 
  } 
}
