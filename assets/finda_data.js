import axios from 'https://cdn.skypack.dev/axios';

const form = document.getElementById('form');
const display = document.getElementById('display');
const id = document.getElementById('id');
const tableBody = document.querySelector('#display tbody');
 // Ensure this references the correct table body

form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const id_value = id.value;

    try {
        const { data } = await axios.get('../api/found_data.php', { params: { id: id_value } });

        // Clear existing rows in the table
        tableBody.innerHTML = '';

        // Handle both single object or array of records
        const records = Array.isArray(data) ? data : [data];

        // Insert the new data into the table
        records.forEach(record => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${record.id}</td>
                <td>${record.fname}</td>
                <td>${record.lname}</td>
                <td>${record.age}</td>
                <td class="text-center">
                    ${record.status !== 'Pending' ? 
                        record.status
                    : `
                        <select class="form-control status-select" data-id="${record.id}">
                            <option disabled selected>${record.status}</option>
                            <option data-status="Accept">Accept</option>
                            <option data-status="Cancel">Cancel</option>
                        </select>
                    `}
                </td>
                <td class="text-center">
                    <a href="edit_form.html?id=${record.id}" class="edit-btn">Edit</a>
                    <button class="delete-btn" data-id="${record.id}">Delete</button>
                </td>
                
            `;
            tableBody.appendChild(row);
        });
    } catch (error) {
        // If there's an error in the API request, show the error message
        display.textContent = `Error: ${error.response?.data || 'Something went wrong'}`;
    }
});

document.addEventListener('DOMContentLoaded', async () => {
    // This could be used to prepopulate the table if needed
});

document.addEventListener('click', async (e) => {
    if (e.target.classList.contains('delete-btn')) {
      const id = e.target.getAttribute('data-id');
      const confirmDelete = confirm('Are you sure you want to delete this person?');
      if (confirmDelete) {
        try {
          const response = await axios.post(`../api/delete.php`, { id: id });
          alert(response.data.message);
          location.reload();
        } catch (error) {
          alert(error.response?.data?.error || 'An error occurred while deleting.');
        }
      }
    }
  });