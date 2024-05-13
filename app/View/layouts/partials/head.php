<!-- General CSS Files -->
<link rel="stylesheet" href="/assets/modules/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/assets/modules/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="/assets/modules/izitoast/css/iziToast.min.css">

<!-- Template CSS -->
<link rel="stylesheet" href="/assets/css/style.css">
<link rel="stylesheet" href="/assets/css/components.css">



<!-- General JS Scripts -->
<script src="/assets/modules/jquery.min.js"></script>
<script src="/assets/modules/popper.js"></script>
<script src="/assets/modules/tooltip.js"></script>
<script src="/assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="/assets/modules/moment.min.js"></script>
<script src="/assets/js/stisla.js"></script>
<script src="/assets/modules/izitoast/js/iziToast.min.js"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="/assets/js/scripts.js"></script>
<script src="/assets/js/custom.js"></script>

<style>
    /* .table-responsive .table tbody  get last tr and width 2000px */
    .table-responsive .table tbody td:last-child {
        width: 220px;
    }
</style>

<script>
    console.log("<?= getSession('success') ?>");
    <?php if (getSession('success')) : ?>
        function showToast() {
            iziToast.success({
                title: 'Success!',
                message: '<?php echo flash('success'); ?>',
                timeout: 3000,
                position: 'topRight',
            });
        }
    
        window.onload = function() {
            showToast();
        };
    <?php endif; ?>
</script>