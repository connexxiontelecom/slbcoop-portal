<script>
  $(document).ready(function () {
    $('form#closure-form').submit(function (e) {
      e.preventDefault()
      let staffId = $('#staff-id').val()
      let date = $('#effective-date').val()
      let email = $('#email').val()
      let phone = $('#phone').val()
      let address = $('#address').val()
      if (!staffId || !date || !email || !phone || !address) {
        Swal.fire("Invalid Submission", "Please fill in all required fields!", "error");
      } else {
        const formData = new FormData(this)
        Swal.fire({
          title: 'Are you sure?',
          text: 'Request for Account Closure',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm Closure'
        }).then(function (confirm) {
          if (confirm.value) {
            $.ajax({
              url: '<?=site_url('closure-form/submit-closure-form')?>',
              type: 'post',
              data: formData,
              success: function (data) {
                if (data.success) {
                  Swal.fire('Confirmed!', data.msg, 'success').then(() => location.reload())
                } else {
                  Swal.fire('Sorry!', data.msg, 'error')
                }
              },
              cache: false,
              contentType: false,
              processData: false
            })
          }
        })
      }
    })
  })
</script>