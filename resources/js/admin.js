import './bootstrap';
import Swal from 'sweetalert2';
import TinyMce from 'tinymce';

try {
    window.Swal = Swal;
    window.tinymce = TinyMce;
} catch (err) {
    console.log(err);
}