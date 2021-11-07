@if (session('success'))
<script>
    Swal.fire({
        toast: true,
        icon: "success",
        title: "{{ session('success') }}",
        position: "top-right",
        showConfirmButton: false,
        timerProgressBar: true,
        timer: 2000,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer)
            toast.addEventListener("mouseleave", Swal.resumeTimer)
        }
    });
</script>
@endif