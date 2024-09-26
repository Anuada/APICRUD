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
      `;
      tableBody.appendChild(row);
    });

  } catch (error) {
    console.error('Error fetching data:', error);
  }
}

fetchData(); 




// Optional: Add event listeners for edit and delete buttons

document.addEventListener('click', async(e) => {
   if (e.target.classList.contains('delete-btn')) {
    const id = e.target.getAttribute('data-id');
    const confirmdelete = confirm('Are you sure you want to Delete this person?');
    if (confirmdelete) {
        try {
            const response = await axios.post(`../api/delete.php`,{id:id});
            alert(response.data.message);
            fetchData();
        } catch (error) {
            alert(error.response.data.error);
        }
    }
  }
});
