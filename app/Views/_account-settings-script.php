<script>
  $(document).ready(function () {
    $('form#display-picture').submit(function (e) {
      e.preventDefault()
      let dp = $('#dp').val()
      if (!dp) {
        Swal.fire("Invalid Submission", 'Please fill in all required fields!', "error")
      } else {
        const fd = new FormData(this)
        Swal.fire({
          title: 'Are you sure?',
          text: 'Upload new display picture',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm Upload'
        }).then(function (result) {
          if (result.value) {
            $.ajax({
              url: '<?= site_url('account/upload-display-picture')?>',
              type: 'post',
              data: fd,
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

    $('form#change-password-form').submit(function (e) {
      e.preventDefault()
      let currentPassword = $('#current-password').val()
      let password = $('#new-password').val()
      let confirmPassword = $('#confirm-password').val()
      if (!currentPassword || !password || !confirmPassword) {
        Swal.fire("Invalid Submission", 'Please fill in all required fields!', "error")
      } else if (password !== confirmPassword) {
        Swal.fire("Invalid Submission", 'Please confirm your new password!', "error")
      } else {
        const fd = new FormData(this)
        Swal.fire({
          title: 'Are you sure?',
          text: 'Change Password',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm Change'
        }).then(function (result) {
          if (result.value) {
            $.ajax({
              url: '<?= site_url('account/change-password')?>',
              type: 'post',
              data: fd,
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