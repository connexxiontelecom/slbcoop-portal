<?php

namespace App\Controllers;

class OutstandingLoans extends BaseController
{

  function index()
  {
    if ($this->session->active) {
      $staff_id = $this->session->get('staff_id');
      $page_data['page_title'] = 'Outstanding Loans';
      $page_data['outstanding_loans'] = $this->_get_user_loans(0);
      $page_data['encumbered_amount'] = $this->_get_encumbered_amount();
      $page_data['regular_savings'] = $this->_get_regular_savings_amount($staff_id);
      $page_data['savings_types_amounts_list'] = $this->_get_savings_types_amounts($staff_id);
      return view('outstanding-loans/index', $page_data);
    }
    return redirect('auth/login');
  }

  function view_outstanding_loan($loan_id)
  {
    if ($this->session->active) {
      $staff_id = $this->session->get('staff_id');
      $loan_exists = $this->loanModel->where('loan_id', $loan_id)->first();
      if ($loan_id && $loan_exists) {
        $page_data['page_title'] = 'View Outstanding Loan';
        $page_data['outstanding_loan_details'] = $this->_get_user_loan_details($loan_id);
        $page_data['encumbered_amount'] = $this->_get_encumbered_amount();
        $page_data['regular_savings'] = $this->_get_regular_savings_amount($staff_id);
        $page_data['savings_types_amounts_list'] = $this->_get_savings_types_amounts($staff_id);
        return view('outstanding-loans/outstanding-loans-ledger', $page_data);
      }
      return redirect('outstanding-loans');
    }
    return redirect('auth/login');
  }
}