<?php
$session = session();
//print_r($cooperator)
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
                <li class="nav-item">
                  <a class="nav-link" href="/security">Security</a>
                </li>
              </ul><!-- .nk-menu -->
              <div class="nk-block">
                <div class="nk-block-head">
                  <div class="nk-block-head-content">
                    <h5 class="nk-block-title">Personal Information</h5>
                    <div class="nk-block-des">
                      <p>Basic and official information that you use on Schlumberger Staff Coop.</p>
                    </div>
                  </div>
                </div><!-- .nk-block-head -->
                <div class="card card-bordered">
                  <div class="card-inner-group">
                    <div class="card-inner">
                      <div class="between-center flex-wrap flex-md-nowrap g-3">
                        <?php if (!$cooperator['cooperator_passport']): ?>
                          <div class="nk-block-text">
                            <div class="user-avatar rounded md">
                            <span>
                              <?= mb_substr($session->get('firstname'), 0, 1) . '' . mb_substr($session->get('lastname'), 0, 1) ?>
                            </span>
                            </div>
                          </div>
                        <?php else: ?>
                          <div class="nk-block-text">
                            <img src="/uploads/passports/<?= $cooperator['cooperator_passport'] ?>" style="width: 4.5em"
                                 alt="display picture" class="img-fluid rounded">
                          </div>
                        <?php endif; ?>
                        <div class="nk-block-actions flex-shrink-sm-0">
                          <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                            <li class="order-md-last">
                              <a href="javascript:void(0)" data-toggle="modal" data-target="#profile-edit"
                                 class="btn btn-primary">Upload
                                Display Picture</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div><!-- .card-inner -->
                  </div><!-- .card-inner-group -->
                </div><!-- .card -->
                <div class="nk-data data-list">
                  <div class="data-head">
                    <h6 class="overline-title">Basics</h6>
                  </div>
                  <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                    <div class="data-col">
                      <span class="data-label">First Name</span>
                      <span class="data-value"><?= $cooperator['cooperator_first_name'] ?></span>
                    </div>
                    <div></div>
                  </div><!-- .data-item -->
                  <div class="data-item">
                    <div class="data-col">
                      <span class="data-label">Other Name</span>
                      <span class="data-value"><?= $cooperator['cooperator_other_name'] ?></span>
                    </div>
                    <div></div>
                  </div><!-- .data-item -->
                  <div class="data-item">
                    <div class="data-col">
                      <span class="data-label">Last Name</span>
                      <span class="data-value"><?= $cooperator['cooperator_last_name'] ?></span>
                    </div>
                    <div></div>
                  </div><!-- .data-item -->
                  <div class="data-item">
                    <div class="data-col">
                      <span class="data-label">Date of Birth</span>
                      <span
                        class="data-value"><?= date_format(date_create($cooperator['cooperator_dob']), "d F, Y") ?></span>
                    </div>
                    <div></div>
                  </div><!-- .data-item -->
                  <div class="data-item">
                    <div class="data-col">
                      <span class="data-label">Email</span>
                      <span class="data-value"><?= $cooperator['cooperator_email'] ?></span>
                    </div>
                    <div></div>
                  </div><!-- .data-item -->
                  <div class="data-item">
                    <div class="data-col">
                      <span class="data-label">Address</span>
                      <span class="data-value"><?= $cooperator['cooperator_address'] ?></span>
                    </div>
                    <div></div>
                  </div><!-- .data-item -->
                  <div class="data-item">
                    <div class="data-col">
                      <span class="data-label">City</span>
                      <span class="data-value"><?= $cooperator['cooperator_city'] ?></span>
                    </div>
                    <div></div>
                  </div><!-- .data-item -->
                  <div class="data-item">
                    <div class="data-col">
                      <span class="data-label">State</span>
                      <span class="data-value"><?= $cooperator['state']['state_name'] ?></span>
                    </div>
                    <div></div>
                  </div><!-- .data-item -->
                </div><!-- .nk-data -->
                <div class="nk-data data-list">
                  <div class="data-head">
                    <h6 class="overline-title">Official</h6>
                  </div>
                  <div class="data-item">
                    <div class="data-col">
                      <span class="data-label">Department</span>
                      <span class="data-value"><?= $cooperator['department']['department_name'] ?></span>
                    </div>
                    <div></div>
                  </div><!-- .data-item -->
                  <div class="data-item">
                    <div class="data-col">
                      <span class="data-label">Location</span>
                      <span class="data-value"><?= $cooperator['location']['location_name'] ?></span>
                    </div>
                    <div></div>
                  </div><!-- .data-item -->
                  <div class="data-item">
                    <div class="data-col">
                      <span class="data-label">Payroll Group</span>
                      <span class="data-value"><?= $cooperator['payroll_group']['pg_name'] ?></span>
                    </div>
                    <div></div>
                  </div><!-- .data-item -->
                  <div class="data-item">
                    <div class="data-col">
                      <span class="data-label">Contribution Amount</span>
                      <span class="data-value"><?= number_format($cooperator['cooperator_savings'], 2) ?></span>
                    </div>
                    <div></div>
                  </div><!-- .data-item -->
                </div><!-- .nk-data -->
                <div class="nk-data data-list">
                  <div class="data-head">
                    <h6 class="overline-title">Bank</h6>
                  </div>
                  <div class="data-item">
                    <div class="data-col">
                      <span class="data-label">Bank</span>
                      <span class="data-value"><?= $cooperator['bank']['bank_name'] ?></span>
                    </div>
                    <div></div>
                  </div><!-- .data-item -->
                  <div class="data-item">
                    <div class="data-col">
                      <span class="data-label">Account Number</span>
                      <span class="data-value"><?= $cooperator['cooperator_account_number'] ?></span>
                    </div>
                    <div></div>
                  </div><!-- .data-item -->
                  <div class="data-item">
                    <div class="data-col">
                      <span class="data-label">Bank Branch</span>
                      <span class="data-value"><?= $cooperator['cooperator_bank_branch'] ?></span>
                    </div>
                    <div></div>
                  </div><!-- .data-item -->
                  <div class="data-item">
                    <div class="data-col">
                      <span class="data-label">Sort Code</span>
                      <span class="data-value"><?= $cooperator['cooperator_sort_code'] ?></span>
                    </div>
                    <div></div>
                  </div><!-- .data-item -->
                </div>

                <div class="nk-data data-list">
                  <div class="data-head">
                    <h6 class="overline-title">Next of Kin</h6>
                  </div>
                  <div class="data-item">
                    <div class="data-col">
                      <span class="data-label">Full Name</span>
                      <span class="data-value"><?= $cooperator['cooperator_kin_fullname'] ?></span>
                    </div>
                    <div></div>
                  </div><!-- .data-item -->
                  <div class="data-item">
                    <div class="data-col">
                      <span class="data-label">Address</span>
                      <span class="data-value"><?= $cooperator['cooperator_kin_address'] ?></span>
                    </div>
                    <div></div>
                  </div><!-- .data-item -->
                  <div class="data-item">
                    <div class="data-col">
                      <span class="data-label">Email</span>
                      <span class="data-value"><?= $cooperator['cooperator_kin_email'] ?></span>
                    </div>
                    <div></div>
                  </div><!-- .data-item -->
                  <div class="data-item">
                    <div class="data-col">
                      <span class="data-label">Phone</span>
                      <span class="data-value"><?= $cooperator['cooperator_kin_phone'] ?></span>
                    </div>
                    <div></div>
                  </div><!-- .data-item -->
                  <div class="data-item">
                    <div class="data-col">
                      <span class="data-label">Relationship</span>
                      <span class="data-value"><?= $cooperator['cooperator_kin_relationship'] ?></span>
                    </div>
                    <div></div>
                  </div><!-- .data-item -->
                </div>
              </div>
            </div><!-- .components-preview -->
          </div>
        </div>
      </div>
      <?php include(APPPATH . '/Views/_footer.php'); ?>
    </div>
  </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="profile-edit">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
      <div class="modal-body modal-body-lg">
        <h5 class="title">Upload Display Picture</h5>
        <form enctype="multipart/form-data" class="form-validate" id="display-picture">
          <div class="row gy-4 pt-5">
            <div class="col-12">
              <div class="form-group">
                <label class="form-label font-weight-bolder">Display Picture <span class="text-danger"> *</span></label>
                <div class="form-control-wrap">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="dp" name="dp" accept="image/*" required>
                    <label class="custom-file-label" for="dp">Choose file</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group mt-3">
                <button class="btn btn-primary">Upload Picture</button>
              </div>
            </div>
          </div>
        </form><!-- .tab-pane -->

      </div><!-- .modal-body -->
    </div><!-- .modal-content -->
  </div><!-- .modal-dialog -->
</div><!-- .modal -->
<?php include(APPPATH . '/Views/_scripts.php'); ?>
<?php include(APPPATH . '/Views/_account-settings-script.php') ?>
</body>
</html>
