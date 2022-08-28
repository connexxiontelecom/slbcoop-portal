<?php namespace App\Controllers;

class Account extends BaseController
{
  function index()
  {
    if ($this->session->active) {
      $staff_id = $this->session->get('staff_id');
      $page_data['page_title'] = 'My Account';
      $cooperator = $this->cooperatorModel->where('cooperator_staff_id', $staff_id)->first();
      $cooperator['state'] = $this->stateModel->where('state_id', $cooperator['cooperator_state_id'])->first();
      $cooperator['department'] = $this->departmentModel->where('department_id', $cooperator['cooperator_department_id'])->first();
      $cooperator['location'] = $this->locationModel->where('location_id', $cooperator['cooperator_location_id'])->first();
      $cooperator['payroll_group'] = $this->payrollGroupModel->where('pg_id', $cooperator['cooperator_payroll_group_id'])->first();
      $cooperator['bank'] = $this->bankModel->where('bank_id', $cooperator['cooperator_bank_id'])->first();
      $page_data['encumbered_amount'] = $this->_get_encumbered_amount();
      $page_data['regular_savings'] = $this->_get_regular_savings_amount($staff_id);
      $page_data['savings_types_amounts_list'] = $this->_get_savings_types_amounts($staff_id);
      $page_data['cooperator'] = $cooperator;
      return view('account/index', $page_data);
    }
    return redirect('auth/login');
  }

  function security()
  {
    if ($this->session->active) {
      $staff_id = $this->session->get('staff_id');
      $cooperator = $this->cooperatorModel->where('cooperator_staff_id', $staff_id)->first();
      $page_data['cooperator'] = $cooperator;
      $page_data['page_title'] = 'My Account';
      $page_data['encumbered_amount'] = $this->_get_encumbered_amount();
      $page_data['regular_savings'] = $this->_get_regular_savings_amount($staff_id);
      $page_data['savings_types_amounts_list'] = $this->_get_savings_types_amounts($staff_id);
      return view('account/security', $page_data);
    }
    return redirect('auth/login');
  }

  function upload_display_picture()
  {
    if (!$this->session->active) {
      return redirect('auth/login');
    }
    $staff_id = $this->session->get('staff_id');
    $cooperator = $this->cooperatorModel->where('cooperator_staff_id', $staff_id)->first();
    if ($cooperator['cooperator_passport']) {
      unlink('uploads/passports/' . $cooperator['cooperator_passport']);
    }
    $response_data = array();
    $file = $this->request->getFile('dp');
    if ($file->isValid() && !$file->hasMoved()) {
      $filename = $file->getRandomName();
      $file->move('uploads/passports', $filename);
      $cooperator_data = ['cooperator_id' => $cooperator['cooperator_id'], 'cooperator_passport' => $filename];
      $this->cooperatorModel->save($cooperator_data);
      $response_data['success'] = true;
      $response_data['msg'] = 'The display picture was uploaded!';
    } else {
      $response_data['success'] = false;
      $response_data['msg'] = 'The display picture is required';
      return $this->response->setJSON($response_data);
    }
    return $this->response->setJSON($response_data);
  }

}