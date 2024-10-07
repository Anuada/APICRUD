document.addEventListener("DOMContentLoaded", () => {
    let storedUsername = sessionStorage.getItem('storedUsername')

    if (storedUsername) {
        document.getElementById('username').value = storedUsername
    }

    document.getElementById('loginform').addEventListener('input', (event) => {
        let inputField = event.target;
        sessionStorage.setItem('stored' + inputField.name.charAt(0).toUpperCase() + inputField.name.slice(1), inputField.value)
    })
})