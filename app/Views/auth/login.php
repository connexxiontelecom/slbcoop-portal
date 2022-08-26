<!DOCTYPE html>
<html lang="zxx" class="js">
<?php include(APPPATH . '/Views/_head.php'); ?>
<body class="nk-body npc-crypto bg-white pg-auth">
<!-- app body @s -->
<div class="nk-app-root">
  <div class="nk-split nk-split-page nk-split-md">
    <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
      <div class="absolute-top-right d-lg-none p-3 p-sm-5">
        <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em
            class="icon ni ni-info"></em></a>
      </div>
      <div class="nk-block nk-block-middle nk-auth-body">
        <div class="brand-logo pb-4 ml-0">
          <a href="/" class="logo-link ml-n5">
            <img class="logo-light logo-img logo-img-lg" src="/assets/images/slb-logo.jpg" alt="logo">
            <img class="logo-dark ml-n4" style="width: 35% !important; max-height: 1000px !important;"
                 src="/assets/images/slb-logo.jpg" alt="logo-dark">
          </a>
        </div>
        <div class="nk-block-head">
          <div class="nk-block-head-content">
            <h5 class="nk-block-title">Login</h5>
            <div class="nk-block-des">
              <p>Access the Member's Portal using your credentials.</p>
            </div>
          </div>
        </div><!-- .nk-block-head -->
        <form class="form-validate" action="<?= site_url('login') ?>" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <label class="form-label" for="default-01">Staff ID</label>
            </div>
            <input autocomplete="off" type="text" class="form-control form-control-lg" id="default-01" name="staff_id"
                   placeholder="Enter your staff id" required>
          </div><!-- .form-group -->
          <div class="form-group">
            <div class="form-label-group">
              <label class="form-label" for="password">Password</label>
              <!--              <a class="link link-primary link-sm" tabindex="-1" href="#">Forgot Code?</a>-->
            </div>
            <div class="form-control-wrap">
              <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
              </a>
              <input autocomplete="off" type="password" class="form-control form-control-lg" id="password"
                     name="password" placeholder="Enter your passcode" required>
            </div>
          </div><!-- .foem-group -->
          <div class="form-group">
            <input type="hidden" class="invalid-login"/>
            <button class="btn btn-lg btn-primary btn-block">Login</button>
          </div>
        </form><!-- form -->
        <div class="form-note-s2 pt-4"> New on our platform? <a href="/">Download the membership form</a>
        </div>
      </div><!-- .nk-block -->
      <div class="nk-block nk-auth-footer">
        <div class="mt-3">
          <p>&copy; <?= date('Y') ?> Connexxion Telecom. All Rights Reserved.</p>
        </div>
      </div><!-- .nk-block -->
    </div><!-- .nk-split-content -->
    <div
      class="nk-split-content nk-split-stretch bg-abstract"
      style="background: url('/assets/images/login-1.jpg') no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;"
    >
    </div><!-- .nk-split-content -->
  </div><!-- .nk-split -->
</div><!-- app body @e -->
<!-- JavaScript -->
<?php include(APPPATH . '/Views/_scripts.php'); ?>
<?php if (session()->getFlashdata('login_failure') !== NULL) : ?>
  <script>
    $('.invalid-login').click()
  </script>
<?php endif; ?>
</body>

</html>