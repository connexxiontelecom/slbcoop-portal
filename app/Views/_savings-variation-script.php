<script>
  $(document).ready(function () {
    $('form#savings-variation').submit(function (e) {
      e.preventDefault()
      let savingsType = $('#savings-type').val()
      let month = $('#variation-start-month').val()
      let year = $('#variation-start-year').val()
      let amount = $('#variation-amount').val()
      if (!savingsType || savingsType === 'default' || !month || month === 'default' || !year || year === 'default' || !amount) {
        Swal.fire("Invalid Submission", "Please fill in all required fields!", "error");
      } else {
        const formData = new FormData(this)
        formData.set('sv_amount', formData.get('sv_amount').replace(/,/g, ''))
        Swal.fire({
          title: 'Are you sure?',
          text: 'Request for Account Closure',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Confirm Closure'
        }).then(function (confirm) {
          if (confirm.value) {
            $.ajax({
              url: '<?=site_url('savings-variation/submit-variation')?>',
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