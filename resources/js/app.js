
// alert("Hi");
let checkPswd=()=>{
const password = document.getElementById("pswd");
const confirm = document.getElementById("confirm");
const message = document.getElementById("message");

    if (password.value != confirm.value) {
     message.textContent = "Passwords do not match";
    message.style.color = "red"; 
  } 
  else{
     message.textContent="";
  }
}
let changeRoleOld=()=>{
 
    const value = document.getElementById("role_id").value;

    // PHP ဆီသွားမယ့် data
    const formData = new FormData();
    formData.append("selected_value", value);

    fetch("../views/permissions/ajax_handler.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.text())                       
    .then(data => {
        // PHP က ပြန်လာတာ ပြမယ်
        document.getElementById("role").value = data;
    })
    .catch(err => console.error(err));
    //  alert("Hi");

}
// $("#role_id").change(function() {
 let changeRole=()=>{
    const roleId = document.getElementById("role_id").value;
    
    if(!roleId) {
        document.getElementById('permissionContainer').innerHTML = '';
        return;
    }
    alert(roleId);
    fetch('../views/permissions/ajax_handler.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ roleId: roleId })
    })
    .then(res => res.json())
    .then(data => {
        const container = document.getElementById('permissionContainer');
        container.innerHTML = ''; // clear old checkboxes

        data.permissions.forEach(per => {
            const div = document.createElement('div');
            div.classList.add('col-md-3', 'p-2');

            const label = document.createElement('label');
            label.classList.add('form-control');

            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.value = per.id;
            checkbox.checked = per.checked; // true/false from PHP

            label.appendChild(checkbox);
            label.insertAdjacentText('beforeend', ` ${per.name}`);
            div.appendChild(label);

            container.appendChild(div);
        });
    });
} 
