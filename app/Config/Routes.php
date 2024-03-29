<?php

namespace Config;

// Create a new instance of our RouteCollection class.

$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
  require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('dashboard', 'Home::index');

$routes->get('account-statement', 'AccountStatement::index');
$routes->post('account-statement/view-account-statement', 'AccountStatement::view_account_statement');

$routes->get('outstanding-loans', 'OutstandingLoans::index');
$routes->get('outstanding-loans/view-outstanding-loan/(:num)', 'OutstandingLoans::view_outstanding_loan/$1');

$routes->get('finished-loans', 'FinishedLoans::index');
$routes->get('finished-loans/view-finished-loan/(:num)', 'FinishedLoans::view_finished_loan/$1');

$routes->get('loan-application', 'LoanApplication::index');
$routes->get('loan-application/get-loan-setup-details/(:any)', 'LoanApplication::get_loan_setup_details/$1');
$routes->post('loan-application/check-guarantor', 'LoanApplication::check_guarantor');
$routes->post('loan-application/submit-application', 'LoanApplication::submit_loan_application');
$routes->post('loan-application/confirm-guarantor', 'LoanApplication::confirm_guarantor');
$routes->post('loan-application/reject-guarantor', 'LoanApplication::reject_guarantor');

$routes->get('withdrawal-application', 'WithdrawalApplication::index');
$routes->get('withdrawal-application/compute-balance/(:any)', 'WithdrawalApplication::compute_balance/$1');
$routes->post('withdrawal-application/submit-application', 'WithdrawalApplication::submit_withdrawal_application');

$routes->get('savings-variation', 'SavingsVariation::index');
$routes->post('savings-variation/submit-variation', 'SavingsVariation::submit_savings_variation');

$routes->get('closure-form', 'ClosureForm::index');
$routes->post('closure-form/submit-closure-form', 'ClosureForm::submit_closure_form');

$routes->get('deposit-lodgement', 'DepositLodgement::index');
$routes->get('deposit-lodgement/get-active-loans', 'DepositLodgement::get_active_loans');
$routes->get('deposit-lodgement/get-savings-types', 'DepositLodgement::get_savings_types');
$routes->post('deposit-lodgement/submit-deposit', 'DepositLodgement::submit_deposit');

$routes->get('notifications', 'Notifications::index');
$routes->get('unread-notifications', 'Notifications::unread_notifications');
$routes->get('get-user-notifications', 'Notifications::get_user_notifications');
$routes->get('notifications/view-notification/(:num)', 'Notifications::view_notification/$1');

$routes->get('account', 'Account::index');
$routes->post('account/upload-display-picture', 'Account::upload_display_picture');
$routes->post('account/change-password', 'Account::change_password');
$routes->post('account/update-bank', 'Account::update_bank');
$routes->post('account/update-nok', 'Account::update_nok');
$routes->get('security', 'Account::security');

$routes->get('auth/login', 'Auth::login');
$routes->get('auth/membership', 'Auth::membership');
$routes->get('auth/forgot-password', 'Auth::forgot_password');
$routes->post('login', 'Auth::auth_login');
$routes->post('membership', 'Auth::auth_membership');
$routes->post('forgot-password', 'Auth::auth_forgot_password');
$routes->get('auth/reset-password/(:any)', 'Auth::reset_password/$1');
$routes->post('reset-password', 'Auth::auth_reset_password');
$routes->get('logout', 'Auth::logout');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
  require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
