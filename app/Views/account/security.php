<?php
$session = session();
?>
<!DOCTYPE html>
<html lang="en" class="js">
<?php include(APPPATH . '/Views/_head.php'); ?>
<body class="nk-body npc-crypto bg-white has-sidebar">
<div class="nk-app-root">
  <div class="nk-main">
    <?php include(APPPATH . '/Views/_sidebar.php'); ?>
    <div class="nk-wrap">
      <?php include(APPPATH . '/Views/_header.php'); ?>
      <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
          <div class="nk-content-body">
            <div class="components-preview">
              <div class="nk-block-head nk-block-head-lg wide-sm">
                <div class="nk-block-head-content">
                  <h2 class="nk-block-title fw-normal">Account Settings</h2>
                  <div class="nk-block-des">
                    <p>Manage your membership account.</p>
                  </div>
                </div>
              </div><!-- .nk-block-head -->
              <ul class="nk-nav nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link" href="/account">Personal</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link " href="/security">Security</a>
                </li>
              </ul><!-- .nk-menu -->
              <div class="nk-block">
                <div class="nk-block-head">
                  <div class="nk-block-head-content">
                    <h5 class="nk-block-title">Security Settings</h5>
                    <div class="nk-block-des">
                      <p>These settings will help you keep your account secure.</p>
                    </div>
                  </div>
                </div><!-- .nk-block-head -->
                <div class="card card-bordered">
                  <div class="card-inner-group">
                    <div class="card-inner">
                      <div class="between-center flex-wrap flex-md-nowrap g-3">
                        <div class="nk-block-text">
                          <h6>Change Password</h6>
                          <p>Set a unique password to protect your account.</p>
                        </div>
                        <div class="nk-block-actions flex-shrink-sm-0">
                          <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                            <li class="order-md-last">
                              <a href="#" class="btn btn-primary">Change Password</a>
                            </li>
                            <!--                            <li>-->
                            <!--                              <em class="text-soft text-date fs-12px">Last changed: <span>Oct 2, 2019</span></em>-->
                            <!--                            </li>-->
                          </ul>
                        </div>
                      </div>
                    </div><!-- .card-inner -->
                  </div><!-- .card-inner-group -->
                </div><!-- .card -->

              </div>
            </div><!-- .components-preview -->
          </div>
        </div>
      </div>
      <?php include(APPPATH . '/Views/_footer.php'); ?>
    </div>
  </div>
</div>
<?php include(APPPATH . '/Views/_scripts.php'); ?>
</body>
</html>
