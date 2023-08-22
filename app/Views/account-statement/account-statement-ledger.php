<?php
$session = session();
isset($brought_forward) ? $balance = $brought_forward : $balance = 0;
$total_dr = 0;
$total_cr = 0;
foreach ($payment_details as $payment_detail) {
  if ($payment_detail->pd_drcrtype == 2) {
    $balance -= $payment_detail->pd_amount;
    $total_dr += $payment_detail->pd_amount;
  }
  if ($payment_detail->pd_drcrtype == 1) {
    $balance += $payment_detail->pd_amount;
    $total_cr += $payment_detail->pd_amount;
  }
}
$sn = 1;
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
                  <div class="nk-block-head-sub"><a class="back-to" href="<?= site_url('account-statement') ?>"><em
                        class="icon ni ni-arrow-left"></em><span>Account Statement</span></a></div>
                  <h2 class="nk-block-title fw-normal">View Account Statement</h2>
                  <div class="nk-block-des">
                    <button class="btn btn-secondary btn-sm"
                            onclick="exportPdf('account_statement_<?php
                            $date = date_create();
                            echo date_format($date, 'd_M_Y');
                            ?>.pdf')">
                      Export Report
                    </button>
                  </div>
                </div>
              </div><!-- .nk-block-head -->
              <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                  <div class="nk-block-head-content">
                    <h4 class="nk-block-title"><?= $savings_type_ledger['contribution_type_name'] ?> Ledger</h4>
                    <div class="nk-block-des">
                      <p>
                        This is the periodic summary of your account activity starting from
                        <span class="font-weight-bolder">
                          <?php
                          if (isset($start_date)) {
                            $start_date = DateTime::createFromFormat('Y-m-d', $start_date);
                            $start_date = $start_date->format('d M Y');
                            echo $start_date;
                          } else {
                            echo "beginning of time";
                          }
                          ?>
                        </span>
                        and ending at
                        <span class="font-weight-bolder">
                          <?php
                          if (isset($end_date)) {
                            $end_date = DateTime::createFromFormat('Y-m-d', $end_date);
                            $end_date = $end_date->format('d M Y');
                            echo $end_date;
                          } else {
                            echo "today";
                          }
                          ?>
                        </span>
                        .
                      </p>
                    </div>
                  </div>
                </div>
                <div class="row mb-3 gy-3">
                  <?php if (isset($brought_forward)): ?>
                    <div class="col-md-3">
                      <div class="card card-bordered card-full">
                        <div class="card-inner">
                          <div class="card-title-group align-start mb-0">
                            <div class="card-title">
                              <h6 class="subtitle">BF</h6>
                            </div>
                            <div class="card-tools">
                              <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left"
                                  title="Brought Forward"></em>
                            </div>
                          </div>
                          <div class="card-amount">
                            <span class="amount">
                              <?= number_format($brought_forward, 2, '.', ','); ?>
                            </span>
                          </div>
                        </div>
                      </div><!-- .card -->
                    </div><!-- .col -->
                  <?php endif; ?>
                  <div class="col-md-3">
                    <div class="card card-bordered card-full">
                      <div class="card-inner">
                        <div class="card-title-group align-start mb-0">
                          <div class="card-title">
                            <h6 class="subtitle">Total Debit</h6>
                          </div>
                          <div class="card-tools">
                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left"
                                title="Total Debited"></em>
                          </div>
                        </div>
                        <div class="card-amount">
                          <span class="amount">
                            <?= number_format($total_dr, 2, '.', ','); ?>
                          </span>
                        </div>
                      </div>
                    </div><!-- .card -->
                  </div><!-- .col -->
                  <div class="col-md-3">
                    <div class="card card-bordered card-full">
                      <div class="card-inner">
                        <div class="card-title-group align-start mb-0">
                          <div class="card-title">
                            <h6 class="subtitle">Total Credit</h6>
                          </div>
                          <div class="card-tools">
                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left"
                                title="Total Credited"></em>
                          </div>
                        </div>
                        <div class="card-amount">
                          <span class="amount">
                            <?= number_format($total_cr, 2, '.', ','); ?>
                          </span>
                        </div>
                      </div>
                    </div><!-- .card -->
                  </div><!-- .col -->
                  <div class="col-md-3">
                    <div class="card card-bordered card-full">
                      <div class="card-inner">
                        <div class="card-title-group align-start mb-0">
                          <div class="card-title">
                            <h6 class="subtitle">Ledger Balance</h6>
                          </div>
                          <div class="card-tools">
                            <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left"
                                title="Ledger Balance"></em>
                          </div>
                        </div>
                        <div class="card-amount">
                          <span class="amount">
                            <?= number_format($balance, 2, '.', ','); ?>
                          </span>
                        </div>
                      </div>
                    </div><!-- .card -->
                  </div><!-- .col -->
                </div>
                <div class="card card-preview mt-3">
                  <div class="card-inner">
                    <table class="datatable-init table">
                      <thead>
                      <tr>
                        <th>S/n</th>
                        <th>Date</th>
                        <th>Narration</th>
                        <th class="text-right">DR</th>
                        <th class="text-right">CR</th>
                        <th class="text-right">Balance</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php if (isset($brought_forward)): ?>
                        <tr class="font-weight-bolder">
                          <td><?= $sn++ ?></td>
                          <td>-</td>
                          <td>BF</td>
                          <td class="text-right text-danger"><?= number_format(0, 2) ?></td>
                          <td class="text-right text-success"><?= number_format($brought_forward, 2) ?></td>
                          <td class="text-right"><?= number_format($brought_forward, 2) ?></td>
                        </tr>
                      <?php endif; ?>
                      <?php if (!empty($payment_details)): isset($brought_forward) ? $balance = $brought_forward : $balance = 0;
                        $total_dr = 0;
                        $total_cr = 0;
                        foreach ($payment_details as $payment_detail): ?>
                          <tr>
                            <td><?= $sn ?></td>
                            <td>
                              <?php
                              $transaction_date = DateTime::createFromFormat('Y-m-d', $payment_detail->pd_transaction_date);
                              $transaction_date = $transaction_date->format('d M Y');
                              echo $transaction_date;
                              ?>
                            </td>
                            <td>
                              <?= ucfirst($payment_detail->pd_narration) ?>
                            </td>
                            <td class="text-right text-danger">
                              <?php
                              if ($payment_detail->pd_drcrtype == 2) {
                                echo number_format($payment_detail->pd_amount, 2, '.', ',');
                                $balance -= $payment_detail->pd_amount;
                                $total_dr += $payment_detail->pd_amount;
                              } else {
                                echo number_format(0, 2);
                              }
                              ?>
                            </td>
                            <td class="text-right text-success">
                              <?php
                              if ($payment_detail->pd_drcrtype == 1) {
                                echo number_format($payment_detail->pd_amount, 2, '.', ',');
                                $balance += $payment_detail->pd_amount;
                                $total_cr += $payment_detail->pd_amount;
                              } else {
                                echo number_format(0, 2);
                              }
                              ?>
                            </td>
                            <td class="text-right">
                              <?= number_format($balance, 2, '.', ','); ?>
                            </td>
                          </tr>
                          <?php $sn++; endforeach; endif; ?>
                      <tr class="border-primary">
                        <td class="font-weight-bolder">-</td>
                        <td class="font-weight-bolder"></td>
                        <td class="font-weight-bolder">
                          Total
                        </td>
                        <td class="text-right text-danger font-weight-bolder">
                          <?= number_format($total_dr, 2, '.', ','); ?>
                        </td>
                        <td class="text-right text-success font-weight-bolder">
                          <?= number_format($total_cr, 2, '.', ','); ?>
                        </td>
                        <td class="text-right font-weight-bolder">
                          <?= number_format($balance, 2, '.', ','); ?>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div><!-- .card-preview -->
                <!--                pdf -->
                <div class="d-none w-100">
                  <div id="print" class="w-100 pl-4 pr-4 pt-3">
                    <img class="logo-dark logo-img mb-1" src="/assets/images/logo.png" alt="logo-dark">
                    <p class="text-muted">SLB Staff Credit & Investment Cooperative Society Limited</p>
                    <h4 class="nk-block-title">Savings Account Statement</h4>
                    <div class="nk-block-des">
                      <p>
                        This is the periodic summary of your account activity starting from
                        <span class="font-weight-bolder">
                          <?php
                          if (isset($start_date)) {
                            echo $start_date;
                          } else {
                            echo "beginning of time";
                          }
                          ?>
                        </span>
                        and ending at
                        <span class="font-weight-bolder">
                          <?php
                          if (isset($end_date)) {
                            echo $end_date;
                          } else {
                            echo "today";
                          }
                          ?>
                        </span>
                      </p>
                    </div>
                    <div class="mt-3 text">
                      <div class="nk-block mt-2">
                        <div class="profile-ud-list">
                          <div class="profile-ud-item">
                            <div class="profile-ud wider">
                              <span class="profile-ud-label">Account Type</span>
                              <span class="profile-ud-value">
                                <?= $savings_type_ledger['contribution_type_name'] ?> Ledger
                              </span>
                            </div>
                          </div>
                          <div class="profile-ud-item">
                            <div class="profile-ud wider">
                              <span class="profile-ud-label">Name</span>
                              <span
                                class="profile-ud-value"><?= $session->get('firstname') . ' ' . $session->get('lastname') ?></span>
                            </div>
                          </div>
                          <div class="profile-ud-item mt-n2">
                            <div class="profile-ud wider">
                              <span class="profile-ud-label">Opening Balance</span>
                              <span class="profile-ud-value">
                                <?= number_format($brought_forward ?? 0, 2); ?>
                              </span>
                            </div>
                          </div>
                          <div class="profile-ud-item mt-n2">
                            <div class="profile-ud wider">
                              <span class="profile-ud-label">Staff ID</span>
                              <span class="profile-ud-value">
                                <?= $session->get('staff_id') ?>
                              </span>
                            </div>
                          </div>
                          <div class="profile-ud-item mt-n2">
                            <div class="profile-ud wider">
                              <span class="profile-ud-label">Total Debit</span>
                              <span class="profile-ud-value">
                                <?= number_format($total_dr ?? 0, 2); ?>
                              </span>
                            </div>
                          </div>
                          <div class="profile-ud-item mt-n2">
                            <div class="profile-ud wider">
                              <span class="profile-ud-label">Email</span>
                              <span class="profile-ud-value text-lowercase">
                                <?= $session->get('email') ?>
                              </span>
                            </div>
                          </div>
                          <div class="profile-ud-item mt-n2">
                            <div class="profile-ud wider">
                              <span class="profile-ud-label">Total Credit</span>
                              <span class="profile-ud-value">
                                <?= number_format($total_cr ?? 0, 2); ?>
                              </span>
                            </div>
                          </div>
                          <div class="profile-ud-item mt-n2">
                            <div class="profile-ud wider">
                              <span class="profile-ud-label">Phone</span>
                              <span class="profile-ud-value">
                                -
                              </span>
                            </div>
                          </div>
                          <div class="profile-ud-item mt-n2">
                            <div class="profile-ud wider">
                              <span class="profile-ud-label">Closing Balance</span>
                              <span class="profile-ud-value">
                                <?= number_format($balance ?? 0, 2); ?>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <table class="mt-3 w-100 table-bordered">
                      <thead>
                      <tr>
                        <th style="width: 1%">#</th>
                        <th>Date</th>
                        <th>Narration</th>
                        <th class="text-right">DR</th>
                        <th class="text-right">CR</th>
                        <th class="text-right">Balance</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $sn = 1;
                      if (isset($brought_forward)): ?>
                        <tr class="font-weight-bolder">
                          <td style="width: 1%"><?= $sn++ ?></td>
                          <td>-</td>
                          <td>BF</td>
                          <td class="text-right text-danger"><?= number_format(0, 2) ?></td>
                          <td class="text-right text-success"><?= number_format($brought_forward, 2) ?></td>
                          <td class="text-right"><?= number_format($brought_forward, 2) ?></td>
                        </tr>
                      <?php endif; ?>
                      <?php if (!empty($payment_details)): isset($brought_forward) ? $balance = $brought_forward : $balance = 0;
                        $total_dr = 0;
                        $total_cr = 0;
                        foreach ($payment_details as $payment_detail): ?>
                          <tr>
                            <td style="width: 1%"><?= $sn ?></td>
                            <td>
                              <?php
                              $transaction_date = DateTime::createFromFormat('Y-m-d', $payment_detail->pd_transaction_date);
                              $transaction_date = $transaction_date->format('d/m/Y');
                              echo $transaction_date;
                              ?>
                            </td>
                            <td>
                              <?= ucfirst($payment_detail->pd_narration) ?>
                            </td>
                            <td class="text-right text-danger">
                              <?php
                              if ($payment_detail->pd_drcrtype == 2) {
                                echo number_format($payment_detail->pd_amount, 2, '.', ',');
                                $balance -= $payment_detail->pd_amount;
                                $total_dr += $payment_detail->pd_amount;
                              } else {
                                echo number_format(0, 2);
                              }
                              ?>
                            </td>
                            <td class="text-right text-success">
                              <?php
                              if ($payment_detail->pd_drcrtype == 1) {
                                echo number_format($payment_detail->pd_amount, 2, '.', ',');
                                $balance += $payment_detail->pd_amount;
                                $total_cr += $payment_detail->pd_amount;
                              } else {
                                echo number_format(0, 2);
                              }
                              ?>
                            </td>
                            <td class="text-right">
                              <?= number_format($balance, 2, '.', ','); ?>
                            </td>
                          </tr>
                          <?php $sn++; endforeach; endif; ?>
                      <tr class="border-primary">
                        <td class="font-weight-bolder">-</td>
                        <td class="font-weight-bolder"></td>
                        <td class="font-weight-bolder">
                          Total
                        </td>
                        <td class="text-right text-danger font-weight-bolder">
                          <?= number_format($total_dr, 2, '.', ','); ?>
                        </td>
                        <td class="text-right text-success font-weight-bolder">
                          <?= number_format($total_cr, 2, '.', ','); ?>
                        </td>
                        <td class="text-right font-weight-bolder">
                          <?= number_format($balance, 2, '.', ','); ?>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                    <div class="mt-3">
                      End of report
                    </div>
                  </div>
                </div>
                <!--                pdf end-->

              </div> <!-- nk-block -->
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
