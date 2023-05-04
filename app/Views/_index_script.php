<script>
    $(document).ready(function () {
        const showDisclaimer = sessionStorage.getItem('showDisclaimer')
        if (!showDisclaimer) {
            sessionStorage.setItem('showDisclaimer', 'true')
            $('#show-disclaimer').click()
        }
    })
</script>