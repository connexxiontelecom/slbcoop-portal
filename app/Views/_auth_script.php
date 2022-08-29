<script>
  $(document).ready(function () {
    $('form#membership-form').submit(function (e) {
      e.preventDefault()
      let staffId = $('#application_staff_id').val()
      let firstname = $('#application_first_name').val()
      let lastname = $('#application_last_name').val()
      let email = $('#application_email').val()
      let dob = $('#application_dob').val()
      let city = $('#application_city').val()
      let phone = $('#application_telephone').val()
      let address = $('#application_address').val()
      let branch = $('#application_bank_branch').val()
      let savings = $('#application_savings').val()
      let accNo = $('#application_account_number').val()
      let sort = $('#application_sort_code').val()

      if (!staffId || !firstname || !lastname || !email || !dob || !city || !phone || !address || !branch || !savings || !accNo || !sort) {
        Swal.fire("Invalid Submission", 'Please fill in all required fields!', "error")
      } else {
        const formData = new FormData(this)
        formData.set('application_savings', formData.get('application_savings').replace(/,/g, ''))
        Swal.fire({
          title: 'Are you sure?',
          text: 'Submission of membership application',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm Application'
        }).then(function (result) {
          if (result.value) {
            $.ajax({
              url: '<?=site_url('membership')?>',
              type: 'post',
              data: formData,
              success: function (data) {
                if (data.success) {
                  Swal.fire('Confirmed!', data.msg, 'success').then(() => location.href = '<?=site_url('auth/login')?>')
                } else {
                  console.error(data.msg)
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