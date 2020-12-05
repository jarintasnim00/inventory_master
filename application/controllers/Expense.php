<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 *	@author : Imran Shah
 *  @support: shahmian@gmail.com
 *	date	: 18 April, 2018
 *	Kandi Inventory Management System
 * website: kelextech.com
 *  version: 1.0
 */
class Expense extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id')) {
        } else {


            redirect(base_url() . 'index.php/Users/login');

        }

    }


    // Add Customer Form
    public function add_expense()
    {
        $Page = $this->General->check_url_permission_single();
        $this->header($title = 'Add Customer');

        $this->load->view('expense/add_expense');

        $this->footer();

    }
    // List Customers
    public function list_expenses()
    {
        $group_id = $this->session->userdata("group_id");
        if($group_id !=1){
            $Page = $this->General->check_url_permission_single();
        }
        $data['expense'] = $this->General->fetch_records("expense");
        $this->header($title = 'Expense List');
        $this->load->view('expense/list_expense', $data);
        $this->footer();


    }
    // Customer Details
   /* public function expense_detail()
    {
        $Page = $this->General->check_url_permission_single();
        $this->header($title = 'Customer Detail');

        $this->load->view('expense/expense_details');

        $this->footer();
    }*/
    // Insert new Customer to Databse
    public function insert_expense()
    {

    $data = array(
            'expense_name' => $this->input->post("expense_name"),
            'party_name' => $this->input->post("party_name"),
            'total_amount' => $this->input->post("total_amount"),
            'paidamount' => $this->input->post("paidamount"),
            'dueamount' => $this->input->post("dueamount"),
             'expense_date' => $this->input->post("expense_date"),

        );
  
        $this->load->model('Main_model');
        $response = $this->Main_model->add_record('expense', $data);
        if ($response) {
            $this->session->flashdata('success', 'Record added Successfully..!');
            redirect(base_url() . 'index.php/expense/list_expenses');
        }
        else{
            echo "error";
        }

    }
    // Update Customer Details
    
    
     public function update_expense()
    {
        $expense_id = $this->input->post('cid');

        $expenses = array(
            'expense_name' => $this->input->post('expense_name'),
             'party_name' => $this->input->post('party_name'),
              'total_amount' => $this->input->post('total_amount'),
               'paidamount' => $this->input->post('paidamount'),
                'dueamount' => $this->input->post('dueamount'),
                 'expense_date' => $this->input->post('expense_date'),
        );
        $where = array('expense_id' => $expense_id);
        $this->load->model('Main_model');
        $response = $this->Main_model->update_record('expense', $expenses, $where);
        if ($response) {
            $this->session->set_flashdata('info', 'Record Updated Successfully..!');
            redirect(base_url() . 'index.php/expense/list_expenses');
        }
        else {
            $this->session->set_flashdata('warning', 'Expense didnt updated..!');
            redirect(base_url() . 'index.php/expense/list_expenses');


        }
    }


        public function delete_expense($id)
    {
        $this->db->where('expense_id', $id);
        $this->db->delete('expense');

        $this->session->set_userdata('msg', 'User has been deleted successfully');
         redirect(base_url() . 'index.php/expense/list_expenses');

    }

}
