import axios from 'https://cdn.skypack.dev/axios';

const form = document.getElementById('form');
const display = document.getElementById('display');
const [fname,lname,age] = ['fname','lname','age'].map(id => document.getElementById(id));
const urlParams = new URLSearchParams(window.location.search);
const idParam = urlParams.get('id');

form.addEventListener('submit', async (e) => {
    e.preventDefault();

    // Collect form data
    const formData = {
        id: idParam,
        fname: fname.value,
        lname: lname.value,
        age: age.value
    };

    try {
        // Send POST request to the API with form data
        const response = await axios.post('../api/update.php', formData);
        alert(response.data.message);
        location.href="../page/display_info.html";
        //display.innerHTML = `Submitted: ${(response.data.message)}`;
    } catch (error) {
        console.error('Error submitting form', error);
        // Handle and display error messages
        if (error.response) {
            display.innerHTML = `Error: ${error.response.data.error || 'Something went wrong'}`;
        } else {
            display.innerHTML = 'Error submitting form. Please try again.';
        }
    }
});

document.addEventListener('DOMContentLoaded', async()=>{

    try {
        const response = await axios.get('../api/getdata.php',{params:{id:idParam}});
        fname.value=response.data.fname
        lname.value=response.data.lname
        age.value=response.data.age
    } catch (error) {
        
    }
})