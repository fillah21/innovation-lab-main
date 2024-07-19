<!-- Vendor JS Files -->
<script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="/assets/vendor/aos/aos.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/assets/vendor/php-email-form/validate.js"></script>

<!-- Bootstrap core JavaScript-->
<script src="/vendor/jquery/jquery.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>

<!-- Bootstrap JS dan Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Font Awesome JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

{{-- hidden comment --}}
<script>
    $(document).ready(function() {
        $(".comment-btn").click(function() {
            var commentFormId = $(this).data('target');
            var commentList = $(commentFormId).next('.card').find('.comment-list');

            $(commentList).toggle('slow');

        });
    });
</script>

<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

{{-- toggle password --}}
<script>
    const togglePassword = document
        .querySelector('#togglePassword');
    const password = document.querySelector('#password');

    try {
        togglePassword.addEventListener('click', () => {
            // Toggle the type attribute using
            // getAttribure() method
            const type = password
                .getAttribute('type') === 'password' ?
                'text' : 'password';
            password.setAttribute('type', type);
            // Toggle the eye and bi-eye icon
            // this.classList.toggle('fas fa-eye');
        });
    } catch (error) {

    }
</script>

<script>
    const togglePasswordConfirm = document
        .querySelector('#togglePasswordConfirm');
    const passwordConfirm = document.querySelector('#password-confirm');
</script>

{{-- dropdown modal --}}
<script>
    $(document).ready(function() {
        $('.dropdown-toggle').dropdown();
    });
</script>

{{-- filter category --}}
<script>
    $('#selectCategoryThread').on({
        "focus": function() {
            console.log('clicked!', this, this.value);
            this.selectedIndex = -1;
        },
        "change": function() {
            choice = $(this).val();
            console.log('changed!', this, choice);
            this.blur();
            setTimeout(function() {
                window.location.href = '{{ route('forum') }}?category_id=' + choice
            }, 0);
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

{{-- fillter title thread --}}
<script>
    $(".js-example-tags").select2({
        tags: true,
        theme: "bootstrap"
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

{{-- summernote text editor --}}
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']]
            ]
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

{{-- delete user confirm --}}
<script>
    function deleteData(url) {
        if (confirm("Yakin?")) {
            window.location.href = url;
        }
    }
</script>

{{-- edit comment modal --}}
<script>
    $(document).ready(function() {
        $('.edit-comment-btn').on('click', function() {
            var commentId = $(this).data('comment-id');
            var commentContent = $(this).data('comment-content');

            $('#editCommentForm').attr('action', '/forum/comment/' + commentId + '/edit');

            $('#editedCommentContent').val(commentContent);

            $('#editCommentModal').modal('show');
        });
    });
</script>