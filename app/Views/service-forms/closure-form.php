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
                  <h2 class="nk-block-title fw-normal">Closure Form</h2>
                  <div class="nk-block-des">
                    <p>Submit a request to commence account closure here.</p>
                  </div>
                </div>
              </div><!-- .nk-block-head -->
              <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                  <div class="nk-blood-head-content">
                    <h4 class="nk-block-title">New Closure Request Form</h4>
                  </div>
                </div>
                <div class="row gy-4">
                  <div class="col-lg-7">
                    <div class="card card-preview">
                      <div class="card-inner">
                        <form class="form-validate" id="closure-form">
                          <div class="preview-block">
                            <span class="preview-title-lg overline-title">Account Closure Details</span>
                          </div>
                          <div class="row gy-3">
                            <div class="col-12">
                              <div class="form-group mt-3">
                                <label for="staff-id" class="form-label font-weight-bold">
                                  Staff ID <span class="text-danger"> *</span>
                                </label>
                                <div class="form-control-wrap">
                                  <input type="text" class="form-control" id="staff-id" name="ac_staff_id" required
                                         value="<?= $cooperator['cooperator_staff_id'] ?>" readonly>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <div class="form-label-group">
                                  <label class="form-label font-weight-bold" for="effective-date">
                                    Effective Date <span class="text-danger">*</span>
                                  </label>
                                </div>
                                <div class="form-control-group">
                                  <input type="text" class="form-control date-picker-alt" name="ac_effective_date"
                                         id="effective-date">
                                </div>
                              </div>
                            </div><!-- .col -->
                            <div class="col-12">
                              <div class="form-group">
                                <div class="form-label-group">
                                  <label class="form-label font-weight-bold" for="email">
                                    Email <span class="text-danger">*</span>
                                  </label>
                                </div>
                                <div class="form-control-group">
                                  <input type="email" class="form-control" id="email" name="ac_email" required
                                         value="<?= $cooperator['cooperator_email'] ?>">
                                </div>
                              </div>
                            </div><!-- .col -->
                            <div class="col-12">
                              <div class="form-group">
                                <div class="form-label-group">
                                  <label class="form-label font-weight-bold" for="phone">
                                    Phone <span class="text-danger">*</span>
                                  </label>
                                </div>
                                <div class="form-control-group">
                                  <input type="text" class="form-control" id="phone" name="ac_phone" required
                                         value="<?= $cooperator['cooperator_telephone'] ?>">
                                </div>
                              </div>
                            </div><!-- .col -->
                            <div class="col-12">
                              <div class="form-group">
                                <div class="form-label-group">
                                  <label class="form-label font-weight-bold" for="address">
                                    Permanent Mailing Address <span class="text-danger">*</span>
                                  </label>
                                </div>
                                <div class="form-control-group">
                                  <textarea id="address" name="ac_mailing" cols="30" rows="1" style="resize: none"
                                            class="form-control no-resize" required></textarea>
                                </div>
                              </div>
                            </div><!-- .col -->
                            <div class="col-12">
                              <div class="form-group mt-3">
                                <?php if (!empty($outstanding_loans) || !empty($pending_closures)): ?>
                                  <button class="btn btn-primary" disabled>
                                    Submit Closure Request
                                  </button>
                                <?php else: ?>
                                  <button class="btn btn-primary">
                                    Submit Closure Request
                                  </button>
                                <?php endif ?>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-5">
                    <div class="card card-preview">
                      <div class="card-inner">
                        <div class="preview-block">
                          <span class="preview-title-lg overline-title">Account Closure Notices</span>
                        </div>
                        <?php if (!empty($outstanding_loans)): ?>
                          <div class="alert alert-icon alert-warning mt-1 mb-1" role="alert" id="get-started">
                            <em class="icon ni ni-alert-circle"></em> You can only request account closure when you do
                            not have <a href="/outstanding-loans" class="text-secondary">Outstanding Loans</a>.
                          </div>
                        <?php elseif (!empty($pending_closures)): ?>
                          <div class="alert alert-icon alert-warning mt-1 mb-1" role="alert" id="get-started">
                            <em class="icon ni ni-alert-circle"></em> You can only request account closure when you do
                            not have pending account closure requests.
                          </div>
                        <?php else: ?>
                          <div class="alert alert-icon alert-success mt-1 mb-1" role="alert" id="get-started">
                            <em class="icon ni ni-check-circle"></em> No new notices.
                          </div>
                        <?php endif ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include(APPPATH . '/Views/_footer.php'); ?>
    </div>
  </div>
</div>
<?php include(APPPATH . '/Views/_scripts.php'); ?>
<?php include(APPPATH . '/Views/_closure-form-script.php'); ?>
</body>
</html>
