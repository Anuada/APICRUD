document.addEventListener("DOMContentLoaded", () => {
    let storedFname = sessionStorage.getItem('storedFname');
    let storedLname = sessionStorage.getItem('storedLname');
    let storedDob = sessionStorage.getItem('storedDob');
    let storedContact = sessionStorage.getItem('storedContact');
    let storedAddress = sessionStorage.getItem('storedAddress');
    let storedEmail = sessionStorage.getItem('storedEmail');
    let storedUser_type = sessionStorage.getItem('storedUser_type');
    let storedUsername = sessionStorage.getItem('storedUsername');

    if (storedFname) {
        document.getElementById('fname').value = storedFname
        document.getElementById('lname').value = storedLname
        document.getElementById('dob').value = storedDob
        document.getElementById('contact').value = storedContact
        document.getElementById('address').value = storedAddress
        document.getElementById('email').value = storedEmail
        document.getElementById('user_type').value = storedUser_type
        document.getElementById('username').value = storedUsername
    }

    document.getElementById('signupform').addEventListener('input', (event) => {
        let inputField = event.target
        sessionStorage.setItem('stored' + inputField.name.charAt(0).toUpperCase() + inputField.name.slice(1), inputField.value)
    })
})
