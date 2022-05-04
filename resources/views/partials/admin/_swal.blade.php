<script>
    window.addEventListener('Swal:confirm', event => {
        Swal.fire({
            icon: 'warning',
            title: event.detail.title,
            text: event.detail.text,
            showCancelButton: true,
            confirmButtonText: '@lang('admin.yes-delete-it')',
            confirmButtonColor: '#3085d6',
            cancelButtonText: '@lang('admin.cancel')',
            cancelButtonColor: '#d33',
        }).then((result) => {
            if (result.isConfirmed) {
                window.livewire.emit('delete', event.detail.id);
                Swal.fire({
                    toast: true,
                    icon: 'success',
                    title: '@lang('admin.deleted')',
                    position: 'top-right',
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 2000,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
            }
        });
    });
</script>