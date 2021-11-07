import './bootstrap';
import Swal from 'sweetalert2';

try {
    window.Swal = Swal;
} catch (error) {
    console.log(error);
}