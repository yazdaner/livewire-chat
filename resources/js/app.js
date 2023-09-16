require('./bootstrap');

import Swal from 'sweetalert2'
window.addEventListener('swal', event => {
    Swal.fire(event.detail)
})
