<?php

$session = session();
$max_otl_days = 80;
?>
<!DOCTYPE html>
<html lang="en" class="js">
<?php
include('_head.php') ?>
<body class="nk-body npc-crypto bg-white has-sidebar">
<div class="nk-app-root">
    <div class="nk-main">
        <?php
        include('_sidebar.php') ?>
        <div class="nk-wrap">
            <?php
            include('_header.php') ?>
            <div class="nk-content nk-content-fluid">
                <div class="container-xl wide-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-sub mb-3">
                            <img class="logo-dark logo-img mr-1" src="/assets/images/logo.png" alt="logo-dark">
                            <span>SLB Staff Credit & Investment Cooperative Society Limited</span>
                        </div>
                        <div class="nk-block-between-md g-4">
                            <div class="nk-block-head-content">
                                <h2 class="nk-block-title fw-normal">
                                    <span
                                        class="font-weight-lighter">Welcome,</span> <?= ucfirst($session->get('firstname')) . ' ' . $session->get('othername') . ' ' . ucfirst($session->get('lastname')) ?>
                                </h2>
                                <div class="nk-block-des">
                                    <p>At a glance summary of your account.</p>
                                </div>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <ul class="nk-block-tools gx-3">
                                    <li><a href="/withdrawal-application"
                                           class="btn btn-primary"><span>New Withdrawal</span> <em
                                                class="icon ni ni-arrow-long-right"></em></a></li>
                                    <li><a href="/loan-application"
                                           class="btn btn-white btn-light"><span>New Loan</span> <em
                                                class="icon ni ni-arrow-long-right d-none d-sm-inline-block"></em></a>
                                    </li>
                                </ul>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="row gy-gs">
                            <div class="col-lg-6 col-xl-5">
                                <div class="nk-block">
                                    <div class="nk-block-head-xs">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title title">Overview</h5>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <div class="card card-bordered text-light is-dark h-100">
                                            <div class="card-inner">
                                                <div class="nk-wg7">
                                                    <div class="nk-wg7-stats">
                                                        <div class="nk-wg7-title">Regular Savings</div>
                                                        <div class="number-lg amount"><em
                                                                class="icon ni ni-sign-kobo"></em> <?= number_format($regular_savings, 2) ?>
                                                        </div>
                                                    </div>
                                                    <div class="nk-wg7-stats-group">
                                                        <div class="nk-wg7-stats w-100">
                                                            <div class="nk-wg7-title">Encumbered Savings</div>
                                                            <div class="number"><em
                                                                    class="icon ni ni-sign-kobo"></em> <?= number_format($encumbered_amount, 2) ?>
                                                            </div>
                                                        </div>
                                                        <div class="nk-wg7-stats w-100">
                                                            <div class="nk-wg7-title">Free Savings</div>
                                                            <div class="number">
                                                                <em class="icon ni ni-sign-kobo"></em>
                                                                <?= number_format($free_savings, 2) ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-wg7-stats mt-3">
                                                        <div class="nk-wg7-title">Loan Amount Accessible</div>
                                                        <div class="number">
                                                            <em class="icon ni ni-sign-kobo"></em>
                                                            <?= number_format($accessible_loan_amount, 2) ?>
                                                        </div>
                                                    </div>
                                                    <div class="nk-wg7-foot mt-4">
                                                        <span class="nk-wg7-note">Last activity at
                                                              <span>
                                                                <?php
                                                                $timeZone = 'Africa/Lagos';
                                                                date_default_timezone_set($timeZone);
                                                                $date = date_create();
                                                                echo date_format($date, 'd M Y h:i a');
                                                                ?>
                                                              </span>
                                                        </span>
                                                    </div>
                                                </div><!-- .nk-wg7 -->
                                            </div><!-- .card-inner -->
                                        </div><!-- .card -->
                                    </div><!-- .nk-block -->
                                </div><!-- .nk-block -->
                            </div><!-- .col -->
                            <div class="col-lg-6 col-xl-7">
                                <div class="nk-block">
                                    <div class="nk-block-head-xs">
                                        <div class="nk-block-between-md g-2">
                                            <div class="nk-block-head-content">
                                                <h5 class="nk-block-title title">Withdrawals Tracking</h5>
                                            </div>
                                            <div class="nk-block-head-content">
                                                <a href="/account-statement" class="link link-primary">Account
                                                    Statement</a>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="row g-2">
                                        <div class="col-sm-4">
                                            <div class="card bg-light">
                                                <div class="nk-wgw sm">
                                                    <a class="nk-wgw-inner" href="javascript:void(0)"
                                                       data-toggle="modal" data-target="#pending-withdrawals">
                                                        <div class="nk-wgw-name">
                                                            <div class="nk-wgw-icon">
                                                                <em class="icon ni ni-more-h"></em>
                                                            </div>
                                                            <h5 class="nk-wgw-title title">Pending Withdrawals</h5>
                                                        </div>
                                                        <div class="nk-wgw-balance">
                                                            <div class="amount"><?= $pending_withdrawal_count ?><span
                                                                    class="currency currency-nio"> pending</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div><!-- .col -->
                                        <div class="col-sm-4">
                                            <div class="card bg-light">
                                                <div class="nk-wgw sm">
                                                    <a class="nk-wgw-inner" href="#">
                                                        <div class="nk-wgw-name">
                                                            <div class="nk-wgw-icon">
                                                                <em class="icon ni ni-check-thick"></em>
                                                            </div>
                                                            <h5 class="nk-wgw-title title">Approved Withdrawals</h5>
                                                        </div>
                                                        <div class="nk-wgw-balance">
                                                            <div class="amount"><?= $approved_withdrawals ?><span
                                                                    class="currency currency-btc"> approved</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div><!-- .col -->
                                        <div class="col-sm-4">
                                            <div class="card bg-light">
                                                <div class="nk-wgw sm">
                                                    <a class="nk-wgw-inner" href="#">
                                                        <div class="nk-wgw-name">
                                                            <div class="nk-wgw-icon">
                                                                <em class="icon ni ni-wallet-out"></em>
                                                            </div>
                                                            <h5 class="nk-wgw-title title">Disbursed Withdrawals</h5>
                                                        </div>
                                                        <div class="nk-wgw-balance">
                                                            <div class="amount"><?= $disbursed_withdrawals ?><span
                                                                    class="currency currency-eth"> disbursed</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div><!-- .col -->
                                    </div><!-- .row -->
                                </div><!-- .nk-block -->
                                <div class="nk-block nk-block-md">
                                    <div class="nk-block-head-xs">
                                        <div class="nk-block-between-md g-2">
                                            <div class="nk-block-head-content">
                                                <h6 class="nk-block-title title">Loan Tracking</h6>
                                            </div>
                                            <div class="nk-block-head-content">
                                                <a href="/finished-loans" class="link link-primary">Finished Loans</a>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="row g-2">
                                        <div class="col-sm-4">
                                            <div class="card bg-light">
                                                <div class="nk-wgw sm">
                                                    <a class="nk-wgw-inner" href="javascript:void(0)"
                                                       data-toggle="modal" data-target="#pending-loans">
                                                        <div class="nk-wgw-name">
                                                            <div class="nk-wgw-icon">
                                                                <em class="icon ni ni-more-h"></em>
                                                            </div>
                                                            <h5 class="nk-wgw-title title">Pending Loans</h5>
                                                        </div>
                                                        <div class="nk-wgw-balance">
                                                            <div class="amount"><?= $pending_loan_count ?><span
                                                                    class="currency currency-nio"> pending</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div><!-- .col -->
                                        <div class="col-sm-4">
                                            <div class="card bg-light">
                                                <div class="nk-wgw sm">
                                                    <a class="nk-wgw-inner" href="#">
                                                        <div class="nk-wgw-name">
                                                            <div class="nk-wgw-icon">
                                                                <em class="icon ni ni-check-thick"></em>
                                                            </div>
                                                            <h5 class="nk-wgw-title title">Approved Loans</h5>
                                                        </div>
                                                        <div class="nk-wgw-balance">
                                                            <div class="amount"><?= $approved_loans ?><span
                                                                    class="currency currency-btc"> approved</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div><!-- .col -->
                                        <div class="col-sm-4">
                                            <div class="card bg-light">
                                                <div class="nk-wgw sm">
                                                    <a class="nk-wgw-inner" href="#">
                                                        <div class="nk-wgw-name">
                                                            <div class="nk-wgw-icon">
                                                                <em class="icon ni ni-wallet-out"></em>
                                                            </div>
                                                            <h5 class="nk-wgw-title title">Disbursed Loans</h5>
                                                        </div>
                                                        <div class="nk-wgw-balance">
                                                            <div class="amount"><?= $disbursed_loans ?><span
                                                                    class="currency currency-eth"> disbursed</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div><!-- .col -->
                                    </div><!-- .row -->
                                </div> <!-- .nk-block -->
                            </div><!-- .col -->
                        </div>
                    </div>
                    <div class="nk-block nk-block-lg">
                        <div class="row gy-gs mb-5">
                            <div class="col-md-6">
                                <div class="card-head">
                                    <div class="card-title mb-0 d-flex justify-content-between w-100">
                                        <h5 class="title mb-0">Outstanding Loans</h5>
                                        <?php
                                        $total_outstanding = 0;
                                        foreach ($outstanding_loans as $outstanding_loan): $total_outstanding += $outstanding_loan['loan_balance']; endforeach; ?>
                                        <span class="number-sm currency currency-usd">
                                            &#8358; <?= number_format($total_outstanding, 2) ?> Total
                                        </span>
                                    </div>
                                </div><!-- .card-head -->
                                <div class="tranx-list card card-bordered">
                                    <?php
                                    if (empty($outstanding_loans)): ?>
                                        <div class="tranx-item">
                                            <div class="tranx-col">
                                                <div class="tranx-info">
                                                    <div class="tranx-data">
                                                        <div class="tranx-label"> No Outstanding Loans</div>
                                                        <div class="tranx-date">-</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .tranx-item -->
                                    <?php
                                    else: foreach ($outstanding_loans as $outstanding_loan): ?>
                                        <div class="tranx-item">
                                            <div class="tranx-col">
                                                <div class="tranx-info">
                                                    <div class="tranx-data">
                                                        <div class="tranx-label">
                                                            <?= $outstanding_loan['loan_type'] ?>
                                                        </div>
                                                        <?php if (isset($outstanding_loan['otl_days'])): ?>
                                                            <?php if ($outstanding_loan['otl_days'] >= $max_otl_days): ?>
                                                                <div class="tranx-date text-danger">
                                                                    <em class="ni ni-alert-circle"></em>
                                                                    This loan is
                                                                    <b><?= $outstanding_loan['otl_days'] ?></b>
                                                                    days old and is due for rollover.
                                                                </div>
                                                            <?php else: ?>
                                                                <div class="tranx-date">
                                                                    <em class="ni ni-alert-circle"></em>
                                                                    This loan is
                                                                    <b><?= $outstanding_loan['otl_days'] ?></b>
                                                                    days old.
                                                                </div>
                                                            <?php endif ?>
                                                        <?php endif; ?>
                                                        <div class="tranx-date">
                                                            <a
                                                                href="<?= site_url('outstanding-loans/view-outstanding-loan/' . $outstanding_loan['loan_id']) ?>"
                                                            >
                                                                View Loan Details
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tranx-col">
                                                <div class="tranx-amount">
                                                    <div class="number">
                                                        &#8358; <?= number_format($outstanding_loan['total_cr'], 2) ?>
                                                        <span
                                                            class="currency currency-btc">Paid</span></div>
                                                    <div class="number-sm">
                                                        &#8358; <?= number_format($outstanding_loan['loan_balance'], 2) ?>
                                                        <span
                                                            class="currency currency-usd">Outstanding</span></div>
                                                </div>
                                            </div>
                                        </div><!-- .tranx-item -->
                                    <?php endforeach; endif ?>
                                </div><!-- .tranx-list -->
                            </div><!-- .col -->
                            <div class="col-md-6">
                                <div class="card-head">
                                    <div class="card-title mb-0">
                                        <h5 class="title">Savings Types</h5>
                                    </div>
                                    <div class="card-tools">
                                        <ul class="card-tools-nav">
                                        </ul>
                                    </div>
                                </div><!-- .card-title -->
                                <div class="card card-bordered">
                                    <div class="card-inner-group">
                                        <?php
                                        foreach ($savings_types_amounts_list as $savings_type => $amount): ?>
                                            <div class="card-inner">
                                                <div class="nk-wg-action">
                                                    <div class="nk-wg-action-content">
                                                        <em class="icon ni ni-cc-alt-fill"></em>
                                                        <div class="title"><?= $savings_type ?></div>
                                                        <p>
                                                            &#8358;
                                                            <?= number_format($amount, 2) ?>
                                                        </p>
                                                    </div>
                                                    <a href="/account-statement" class="btn btn-icon btn-trigger mr-n2"><em
                                                            class="icon ni ni-forward-ios"></em></a>
                                                </div>
                                            </div><!-- .card-inner -->
                                        <?php
                                        endforeach; ?>
                                    </div><!-- .card-inner-group -->
                                </div><!-- .card -->

                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .nk-block -->
                    <div class="nk-block nk-block-lg">
                        <div class="row gy-gs mt-5">
                            <div class="col-md-6">
                                <div class="card-head">
                                    <div class="card-title mb-0">
                                        <h5 class="title">Coop Banks</h5>
                                    </div>
                                    <div class="card-tools">
                                        <ul class="card-tools-nav">
                                        </ul>
                                    </div>
                                </div><!-- .card-title -->
                                <div class="card card-bordered">
                                    <div class="card-inner-group">
                                        <div class="card-inner">
                                            <div class="nk-wg-action">
                                                <div class="nk-wg-action-content">
                                                    <em class="icon ni ni-building"></em>
                                                    <div class="title">GT Bank</div>
                                                    <p>0217890770 - SLB PH STAFF CR & INVEST CO-OP</p>
                                                </div>
                                            </div>
                                        </div><!-- .card-inner -->
                                        <div class="card-inner">
                                            <div class="nk-wg-action">
                                                <div class="nk-wg-action-content">
                                                    <em class="icon ni ni-building"></em>
                                                    <div class="title">UBA</div>
                                                    <p>1001027650 - Schlumberger Staff Credit Investment</p>
                                                </div>
                                            </div>
                                        </div><!-- .card-inner -->
                                    </div><!-- .card-inner-group -->
                                </div><!-- .card -->

                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div>
                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="align-center flex-wrap flex-md-nowrap g-4">
                                    <div class="nk-block-image w-120px flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 118">
                                            <path
                                                d="M8.916,94.745C-.318,79.153-2.164,58.569,2.382,40.578,7.155,21.69,19.045,9.451,35.162,4.32,46.609.676,58.716.331,70.456,1.845,84.683,3.68,99.57,8.694,108.892,21.408c10.03,13.679,12.071,34.71,10.747,52.054-1.173,15.359-7.441,27.489-19.231,34.494-10.689,6.351-22.92,8.733-34.715,10.331-16.181,2.192-34.195-.336-47.6-12.281A47.243,47.243,0,0,1,8.916,94.745Z"
                                                transform="translate(0 -1)" fill="#f6faff"/>
                                            <rect x="18" y="32" width="84" height="50" rx="4" ry="4" fill="#fff"/>
                                            <rect x="26" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe"/>
                                            <rect x="50" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe"/>
                                            <rect x="74" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe"/>
                                            <rect x="38" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe"/>
                                            <rect x="62" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe"/>
                                            <path
                                                d="M98,32H22a5.006,5.006,0,0,0-5,5V79a5.006,5.006,0,0,0,5,5H52v8H45a2,2,0,0,0-2,2v4a2,2,0,0,0,2,2H73a2,2,0,0,0,2-2V94a2,2,0,0,0-2-2H66V84H98a5.006,5.006,0,0,0,5-5V37A5.006,5.006,0,0,0,98,32ZM73,94v4H45V94Zm-9-2H54V84H64Zm37-13a3,3,0,0,1-3,3H22a3,3,0,0,1-3-3V37a3,3,0,0,1,3-3H98a3,3,0,0,1,3,3Z"
                                                transform="translate(0 -1)" fill="#798bff"/>
                                            <path
                                                d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z"
                                                transform="translate(0 -1)" fill="#6576ff"/>
                                            <path
                                                d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z"
                                                transform="translate(0 -1)" fill="none" stroke="#6576ff"
                                                stroke-miterlimit="10"
                                                stroke-width="2"/>
                                            <line x1="40" y1="22" x2="57" y2="22" fill="none" stroke="#fffffe"
                                                  stroke-linecap="round"
                                                  stroke-linejoin="round" stroke-width="2"/>
                                            <line x1="40" y1="27" x2="57" y2="27" fill="none" stroke="#fffffe"
                                                  stroke-linecap="round"
                                                  stroke-linejoin="round" stroke-width="2"/>
                                            <line x1="40" y1="32" x2="50" y2="32" fill="none" stroke="#fffffe"
                                                  stroke-linecap="round"
                                                  stroke-linejoin="round" stroke-width="2"/>
                                            <line x1="30.5" y1="87.5" x2="30.5" y2="91.5" fill="none" stroke="#9cabff"
                                                  stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <line x1="28.5" y1="89.5" x2="32.5" y2="89.5" fill="none" stroke="#9cabff"
                                                  stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <line x1="79.5" y1="22.5" x2="79.5" y2="26.5" fill="none" stroke="#9cabff"
                                                  stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <line x1="77.5" y1="24.5" x2="81.5" y2="24.5" fill="none" stroke="#9cabff"
                                                  stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <circle cx="90.5" cy="97.5" r="3" fill="none" stroke="#9cabff"
                                                    stroke-miterlimit="10"/>
                                            <circle cx="24" cy="23" r="2.5" fill="none" stroke="#9cabff"
                                                    stroke-miterlimit="10"/>
                                        </svg>
                                    </div>
                                    <div class="nk-block-content">
                                        <div class="nk-block-content-head px-lg-4">
                                            <h5>We’re here to help you!</h5>
                                            <p class="text-soft">Ask a question or file a support ticket, manage
                                                request, report an issues.
                                                Our support team will get back to you by email.</p>
                                        </div>
                                    </div>
                                    <div class="nk-block-content flex-shrink-0">
                                        <a href="#" class="btn btn-lg btn-outline-primary">Get Support Now</a>
                                    </div>
                                </div>
                            </div><!-- .card-inner -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div>
                <input type="hidden" class="success-login"/>
            </div>
            <!-- content @e -->
            <?php
            include('_footer.php') ?>
        </div>
    </div>
    <a id="show-disclaimer" href="javascript:void(0)" type="hidden" data-toggle="modal" data-target="#disclaimer"></a>
    <div class="modal fade" tabindex="-1" role="dialog" id="disclaimer">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body">
                    <h5 class="title mb-3">DISCLAIMER!</h5>
                    <p class="">
                        Data Migration and Reconciliation is ongoing on this App.
                    </p>
                    <p class="">
                        Users may observe figures that are different from source of data.
                    </p>
                    <p class="">
                        Do not hesitate to contact the office should you have any of such observations, concerns or
                        questions.
                    </p>
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="pending-withdrawals">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body">
                    <h5 class="title">Pending Withdrawals</h5>
                    <div class="py-3">
                        <div class="tranx-list card card-bordered">
                            <?php
                            if (empty($pending_withdrawals)): ?>
                                <div class="tranx-item">
                                    <div class="tranx-col">
                                        <div class="tranx-info">
                                            <div class="tranx-data">
                                                <div class="tranx-label"> No Pending Withdrawals</div>
                                                <div class="tranx-date">-</div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .tranx-item -->
                            <?php
                            else: foreach ($pending_withdrawals as $pending_withdrawal): ?>
                                <div class="tranx-item">
                                    <div class="tranx-col">
                                        <div class="tranx-info">
                                            <div class="tranx-data">
                                                <div class="tranx-label">
                                                    &#8358; <?= number_format($pending_withdrawal['withdraw_amount'], 2) ?>
                                                </div>
                                                <div class="tranx-date">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tranx-col">
                                        <div class="tranx-amount">
                                            <div class="number-sm mb-1">
                                                <?= date('d M, Y', strtotime($pending_withdrawal['withdraw_date'])) ?>
                                            </div>
                                            <div class="number-sm">
                                                <?php if ($pending_withdrawal['withdraw_status'] == 0): ?>
                                                    <span class="badge badge-pill badge-outline-secondary">
                                                        Pending Verification
                                                    </span>
                                                <?php else: ?>
                                                    <span class="badge badge-pill badge-outline-secondary">
                                                        Verified
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .tranx-item -->
                            <?php
                            endforeach; endif ?>
                        </div><!-- .tranx-list -->
                    </div>
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="pending-loans">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body">
                    <h5 class="title">Pending Loans</h5>
                    <div class="py-3">
                        <div class="tranx-list card card-bordered">
                            <?php
                            if (empty($pending_loans)): ?>
                                <div class="tranx-item">
                                    <div class="tranx-col">
                                        <div class="tranx-info">
                                            <div class="tranx-data">
                                                <div class="tranx-label"> No Pending Loans</div>
                                                <div class="tranx-date">-</div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .tranx-item -->
                            <?php
                            else: foreach ($pending_loans as $pending_loan): ?>
                                <div class="tranx-item">
                                    <div class="tranx-col">
                                        <div class="tranx-info">
                                            <div class="tranx-data">
                                                <div class="tranx-label">
                                                    &#8358; <?= number_format($pending_loan['amount'], 2) ?>
                                                </div>
                                                <div class="tranx-date">
                                                    Encumbrance:
                                                    &#8358; <?= number_format($pending_loan['encumbrance_amount'], 2) ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tranx-col">
                                        <div class="tranx-amount">
                                            <div class="number-sm mb-1">
                                                <?= date('d M, Y', strtotime($pending_loan['applied_date'])) ?>
                                            </div>
                                            <div class="number-sm">
                                                <?php if ($pending_loan['verify'] == 0): ?>
                                                    <span class="badge badge-pill badge-outline-secondary">
                                                        Pending Verification
                                                    </span>
                                                <?php else: ?>
                                                    <span class="badge badge-pill badge-outline-secondary">
                                                        Verified
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .tranx-item -->
                            <?php
                            endforeach; endif ?>
                        </div><!-- .tranx-list -->
                    </div>
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->
</div>
<?php
include('_scripts.php') ?>
<?php
include('_index_script.php') ?>
<?php
if (session()->getFlashdata('login_success') !== null) : ?>
    <script>
        $('.success-login').click()
    </script>
<?php
endif; ?>
</body>
</html>