<?php

namespace App\Controllers;

use App\Models\SavingsVariationModel;

class SavingsVariation extends BaseController
{

  private $SavingsVariationModel;

  public function __construct()
  {
    $this->SavingsVariationModel = new SavingsVariationModel();
  }

  function index()
  {
    if ($this->session->active) {
      $staff_id = $this->session->get('staff_id');
      $page_data['page_title'] = 'Savings Variation';
      $page_data['savings_types'] = $this->_get_savings_types($staff_id);
      $page_data['encumbered_amount'] = $this->_get_encumbered_amount();
      $page_data['regular_savings'] = $this->_get_regular_savings_amount($staff_id);
      $page_data['savings_types_amounts_list'] = $this->_get_savings_types_amounts($staff_id);
      $page_data['cooperator'] = $this->cooperatorModel->where('cooperator_staff_id', $staff_id)->first();;
      return view('service-forms/savings-variation', $page_data);
    }
    return redirect('auth/login');
  }

  function submit_savings_variation()
  {
    if (!$this->session->active) {
      return redirect('auth/login');
    }
    $staff_id = $this->session->get('staff_id');
    $response_data = array();
    $post_data = $this->request->getPost();
    if ($post_data) {
      $post_data['sv_staff_id'] = $staff_id;
      $post_data['sv_status'] = 0;
      $post_data['sv_applied_by'] = $this->session->firstname . ' ' . $this->session->lastname;
      $saved = $this->SavingsVariationModel->save($post_data);
      if (!$saved) {
        $response_data['success'] = false;
        $response_data['msg'] = 'Oops, Something went wrong! Please try again later.';
        return $this->response->setJSON($response_data);
      }
      $response_data['success'] = true;
      $response_data['msg'] = 'Savings variation submitted successfully';
      return $this->response->setJSON($response_data);
    }
  }
}