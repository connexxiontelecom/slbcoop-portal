<?php

namespace App\Controllers;

use App\Models\AccountClosureModel;

class ClosureForm extends BaseController
{

  private $AccountClosureModel;

  public function __construct()
  {
    $this->AccountClosureModel = new AccountClosureModel();
  }

  function index()
  {
    if ($this->session->active) {
      $staff_id = $this->session->get('staff_id');
      $page_data['page_title'] = 'Closure Form';
      $page_data['savings_types'] = $this->_get_savings_types($staff_id);
      $page_data['encumbered_amount'] = $this->_get_encumbered_amount();
      $page_data['regular_savings'] = $this->_get_regular_savings_amount($staff_id);
      $page_data['savings_types_amounts_list'] = $this->_get_savings_types_amounts($staff_id);
      $page_data['cooperator'] = $this->cooperatorModel->where('cooperator_staff_id', $staff_id)->first();
      $page_data['outstanding_loans'] = $this->_get_user_loans(0);
      $page_data['pending_closures'] = $this->_get_pending_closures();

      return view('service-forms/closure-form', $page_data);
    }
    return redirect('auth/login');
  }

  function submit_closure_form()
  {
    if ($this->session->active) {
      $staff_id = $this->session->get('staff_id');
      $outstanding_loans = $this->_get_user_loans(0);
      $pending_closures = $this->_get_pending_closures();
      $response_data = array();
      if (!empty($outstanding_loans)) {
        $response_data['success'] = false;
        $response_data['msg'] = 'You cannot submit an account closure request with outstanding loans';
        return $this->response->setJSON($response_data);
      }

      if (!empty($pending_closures)) {
        $response_data['success'] = false;
        $response_data['msg'] = 'You cannot submit an account closure request with pending account closure requests';
        return $this->response->setJSON($response_data);
      }
      $post_data = $this->request->getPost();
      if ($post_data) {
        $post_data['ac_a_date'] = date('Y-m-d');
        $post_data['ac_by'] = $this->session->firstname . ' ' . $this->session->lastname;
        $post_data['ac_effective_date'] = date('Y-m-d', strtotime($post_data['ac_effective_date']));
        $saved = $this->AccountClosureModel->save($post_data);
        if (!$saved) {
          $response_data['success'] = false;
          $response_data['msg'] = 'Oops, Something went wrong! Please try again later.';
          return $this->response->setJSON($response_data);
        }
        $response_data['success'] = true;
        $response_data['msg'] = 'Account closure request submitted successfully';
        return $this->response->setJSON($response_data);
      }
    }
    return redirect('auth/login');
  }

  private function _get_pending_closures()
  {
    return $this->AccountClosureModel
      ->where('ac_staff_id', $this->session->get('staff_id'))
      ->where('ac_status', 0)
      ->findAll();
  }
}