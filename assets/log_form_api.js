import axios from 'https://cdn.skypack.dev/axios';
import {form_fields, data_from_computer} from '../assets/js/misc/log_form_api.js';

const [formData_from_api, select_button, logbook_form] = ['formData_from_api', 'select_button', 'logbook_form'].map(e => document.getElementById(e));
const [data_from_api, input_data_from_computer] = ['data_from_api','input_data_from_computer'].map(e => document.getElementById(e));
let data_type_input = '';

data_from_api.addEventListener('click', () => {
    data_type_input = 'data_from_api';
    select_button.style.display = 'none';  
    logbook_form.innerHTML = form_fields;  // Assuming form_fields is initialized as an HTML string
});

input_data_from_computer.addEventListener('click', () => {
    data_type_input = 'form_fields';
    select_button.style.display = 'none';  // Correctly hiding the button
    logbook_form.innerHTML = data_from_computer;  // Assuming data_from_computer is initialized as an HTML string
});

const displayFrom_Api_info = (form_fields, data) => {
    const employeeInfoContainer = document.getElementById('employeeInfoContainer');  // Ensure this element exists in your HTML
    employeeInfoContainer.innerHTML = `
    <div class="form-group">
        <div style="display: flex; flex-wrap: wrap;">
            <div style="flex: 1; margin-right: 10px;">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" 
                    placeholder="First Name" value="${ucWords(data.fname)}" readonly>
                <div class="form-text text-danger" id="errorFName"></div>
            </div>
            <div style="flex: 1;">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" 
                    placeholder="Last Name" value="${ucWords(data.lname)}" readonly>
                <div class="form-text text-danger" id="errorLName"></div>
            </div>
        </div>
    </div>
    `;
};

// Ensure you define the ucWords function elsewhere if not yet implemented
