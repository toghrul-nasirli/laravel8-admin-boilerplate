import './bootstrap';
import Swal from 'sweetalert2';

try {
    window.Swal = Swal;
} catch (err) {
    console.log(err);
}
