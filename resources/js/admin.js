import './bootstrap';
import Swal from 'sweetalert2';
import Cleave from 'cleave.js';

try {
    window.Swal = Swal;
    window.Cleave = Cleave;
} catch (error) {
    console.log(error);
}