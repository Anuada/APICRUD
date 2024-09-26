import axios from 'https://cdn.skypack.dev/axios';

const form = document.getElementById('form');
const display = document.getElementById('display');
const id = document.getElementById('id');

form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const id_value = id.value;

    try {
        const { data } = await axios.get('./api.php', { params: { id: id_value } });
        display.textContent = `${data.fname} ${data.lname}`;
    } catch (error) {
        display.textContent = error.response.data;
    }
});

// id.addEventListener('change', async (e) => {
//     const id_value = e.target.value;

//     try {
//         const { data } = await axios.get('./api.php', { params: { id: id_value } });
//         display.textContent = `${data.fname} ${data.lname}`;
//     } catch (error) {
//         display.textContent = error.response.data;
//     }
// })

document.addEventListener('DOMContentLoaded', async () => {

    // axios.get('./api.php')
    //     .then(({ data }) => {
    //         data.map((d) => {
    //             display.innerHTML += `
    //             <tr>
    //                 <td>${d.id}<td>
    //                 <td>${d.fname}<td>
    //                 <td>${d.lname}<td>
    //             </tr>
    //             `
    //         });
    //     })
    //     .catch((error) => {
    //         console.error(error);
    //     });

    // try {
    //     const { data } = await axios.get('./api.php');
    //     data.map((d) => {
    //         display.innerHTML += `
    //             <tr>
    //                 <td>${d.id}<td>
    //                 <td>${d.fname}<td>
    //                 <td>${d.lname}<td>
    //             </tr>
    //         `;
    //     });
    // } catch (error) {
    //     console.error(error);
    // }
});