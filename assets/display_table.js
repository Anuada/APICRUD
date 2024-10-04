import axios from 'https://cdn.skypack.dev/axios';

// DOM element for displaying the table body
const tableBody = document.querySelector('#tableBody');

// Function to fetch data from the API
async function fetchData() {
  try {
    // Make GET request to fetch data
    const response = await axios.get(`../api/display_info.php`);
    const data = response.data;

    if (data.error) {
      console.error(data.error); // Log error if API returns one
      return;
    }

    // Clear previous data in the table
    tableBody.innerHTML = '';

    // Insert the new data into the table
    data.forEach(record => {
      const row = document.createElement('tr');
      row.innerHTML = `
        <td>${record.id}</td>
        <td>${record.fname}</td>
        <td>${record.lname}</td>
        <td>${record.age}</td>
        <td class="text-center">
          <a href="edit_form.html?id=${record.id}" class="edit-btn">Edit</a>
          <button class="delete-btn" data-id="${record.id}">Delete</button>
        </td>
        <td class="text-center">
        ${record.status !=='Pending' ? 
          record.status
         : `
          <select class="form-control status-select" data-id="${record.id}">
            <option disabled selected>${record.status}</option>
            <option data-status="Accept">Accept</option>
            <option data-status="Cancel">Cancel</option>
          </select>
        `}
        </td>
      `;
      tableBody.appendChild(row);
    });

  } catch (error) {
    console.error('Error fetching data:', error);
  }
}

fetchData();

// Event listener for status selection
document.addEventListener('change', async (e) => {
  
  if (e.target.classList.contains('status-select')) {
    const id = e.target.getAttribute('data-id');
    const selectedOption = e.target.options[e.target.selectedIndex].dataset.status;

    const confirmAction = confirm(`Are you sure you want to ${selectedOption}?`);
    if (confirmAction) {
      try {
        const response = await axios.post(`../api/status.php`, { id: id,status:selectedOption});
        alert(response.data); 
        fetchData(); // Refresh the data
      } catch (error) {
        alert(error.response?.data?.error || 'An error occurred while updating status.');
      }
    }
  }
});

// Event listener for delete buttons
document.addEventListener('click', async (e) => {
  if (e.target.classList.contains('delete-btn')) {
    const id = e.target.getAttribute('data-id');
    const confirmDelete = confirm('Are you sure you want to delete this person?');
    if (confirmDelete) {
      try {
        const response = await axios.post(`../api/delete.php`, { id: id });
        alert(response.data.message);
        fetchData(); // Refresh the data
      } catch (error) {
        alert(error.response?.data?.error || 'An error occurred while deleting.');
      }
    }
  }
});
