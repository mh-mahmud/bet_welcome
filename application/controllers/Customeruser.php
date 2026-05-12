<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customeruser extends CI_Controller {

	private $user_id;
	private $name;
	private $email_add;
	private $phone;
	private $country;
	private $club_id;
	private $verified_by;
	private $user_status;
	private $created_at;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('betscore');
		if(empty($this->session->userdata('cus_data'))) {
			redirect('/');
		}

		$x = $this->session->userdata('cus_data');
		$this->user_id = $x->id;
		$this->name = $x->name;
		$this->username = $x->username;
		$this->sponsor_name = $x->sponsor_name;
		$this->email_add = $x->email;
		$this->phone = $x->phone;
		$this->country = $x->country;
		$this->club_id = $x->club_id;
		$this->verified_by = $x->verified_by;
		$this->created_at = $x->created_at;
		$this->user_status = $x->status;
	}

	public function my_bets() {
		$data = [];
		$data = array();
		$query_string = "SELECT mbc.*, mopd.option_title, mopd.match_id, mopd.match_option_id, mp.match_option_title, m.league_title, m.title, m.starting_time, m.ending_time, s.name FROM matchbit_coin AS mbc INNER JOIN match_option_details AS mopd ON mbc.match_bit_id=mopd.id INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id INNER JOIN sportscategory AS s ON m.sportscategory_id=s.id WHERE mbc.user_id='{$this->user_id}' ORDER BY mbc.id DESC LIMIT 100";
		$data['get_data'] = $this->db->query($query_string)->result();
		$this->load->view('customer/my_bets', $data);
	}

	public function user_multibets() {
		$data = [];
		$data = array();
		$query_string = "SELECT * FROM multibet WHERE user_id='{$this->user_id}'";
		$data['get_data'] = $this->db->query($query_string)->result();
		$this->load->view('customer/user_multibets', $data);
	}

	public function user_multibet_details() {
		$id = $this->uri->segment(2);
		$red = $_SERVER['HTTP_REFERER'];
		$data = [];
		$data['get_bet'] = $this->db->query("SELECT * FROM multibet WHERE id='{$id}' AND user_id='{$this->user_id}'")->row();
		if(empty($data['get_bet'])) {
			redirect($red);
			return;
		}
		$option_ids = $data['get_bet']->option_detail_ids;
		$query_string = "SELECT mbc.*, mopd.option_title, mopd.match_id, mopd.match_option_id, mp.match_option_title, m.league_title, m.title, m.starting_time, m.ending_time, s.name FROM matchbit_coin AS mbc INNER JOIN match_option_details AS mopd ON mbc.match_bit_id=mopd.id INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id INNER JOIN sportscategory AS s ON m.sportscategory_id=s.id WHERE mbc.match_bit_id IN({$option_ids}) ORDER BY mbc.id DESC";
		$data['get_data'] = $this->db->query($query_string)->result();
		// $data['get_data'] = $this->db->query("SELECT * FROM matchbit_coin WHERE match_bit_id IN({$option_ids})")->result();
		// dd($this->db->last_query());

		$this->load->view('customer/user_multibet_details', $data);
	}

	public function ajax_multibet_details() {
		$id = $_POST['option_detail_ids'];
		$red = $_SERVER['HTTP_REFERER'];
		$data = [];
		$get_bet = $this->db->query("SELECT * FROM multibet WHERE id='{$id}' AND user_id='{$this->user_id}'")->row();
		if(empty($get_bet)) {
			redirect($red);
			return;
		}
		$option_ids = $get_bet->option_detail_ids;
		$query_string = "SELECT mbc.*, mopd.option_title, mopd.match_id, mopd.match_option_id, mp.match_option_title, m.league_title, m.title, m.starting_time, m.ending_time, s.name FROM matchbit_coin AS mbc INNER JOIN match_option_details AS mopd ON mbc.match_bit_id=mopd.id INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id INNER JOIN sportscategory AS s ON m.sportscategory_id=s.id WHERE mbc.match_bit_id IN({$option_ids}) AND mbc.user_id='{$this->user_id}' ORDER BY mbc.id DESC";
		$get_data = $this->db->query($query_string)->result();
		$data['get_data'] = $get_data;

		$view_data = $this->load->view('customer/ajax_multibet_details', $data, true);
		$new_data = [];
		$new_data['error'] = 0;
		$new_data['get_data'] = $view_data;
		$new_data['error_msg'] = "";
		echo json_encode($new_data);

	}

	public function view_profile() {
		$data = [];
		$data['user_id'] = $this->user_id;
		$data['club_id'] = $this->club_id;
		$data['name'] = $this->name;
		$data['sponsor_name'] = $this->sponsor_name;
		$data['username'] = $this->username;
		$data['email_add'] = $this->email_add;
		$data['phone'] = $this->phone;
		$data['country'] = $this->country;
		$data['club_names'] = $this->db->query("SELECT * FROM club_users WHERE status=1")->result();
		$data['verified_by'] = $this->verified_by;
		$data['created_at'] = $this->created_at;
		$data['user_status'] = $this->user_status;
		$this->load->view('customer/view_profile', $data);
	}

	public function my_deposit() {
		$data = [];
		$data['name'] = $this->name;
		$data['coin_rate'] = 1.5;
		$data['get_data'] = $this->db->query("SELECT d.*, c.club_name FROM `deposit` AS d INNER JOIN club_users AS c ON d.club_user_id=c.id WHERE user_id='{$this->user_id}'")->result();
		// dd($data);
		$this->load->view('customer/my_deposit', $data);
	}

	public function my_withdrawal() {
		$data = [];
		$data['get_data'] = $this->db->query("SELECT * FROM `withdraw_req` WHERE user_id='{$this->user_id}'")->result();
		$this->load->view('customer/my_withdrawal', $data);
	}

	public function cancel_withdraw() {
		$id = $this->uri->segment(2);
		$get_data = $this->db->query("SELECT * FROM withdraw_req WHERE id='{$id}' AND user_id='{$this->user_id}' AND status='PENDING'")->row();
		if( empty($get_data) ) {
			$this->session->set_flashdata('error', 'You are trying with wrong data. You will be blocked!');
			redirect('my_withdrawal');
		}
		$this->db->query("DELETE FROM withdraw_req WHERE id='{$id}' AND user_id='{$this->user_id}' AND status='PENDING' LIMIT 1");
		if ( $this->db->affected_rows() > 0 )  {

	        $get_cur_balance = get_user_current_balance($this->user_id) + $get_data->amount;
	        $data_arr_post = array(
	        	'user_id' => $this->user_id,
	        	'club_id' => $this->club_id,
				'coin'	=> $get_data->amount,
				'current_balance'	=> $get_cur_balance,
				'coin_type' => 'WITHDRAW_CANCEL',
				'method' => 'GET',
				'created_at'	=> date("Y-m-d H:i:s")
	        );
			$this->db->insert('my_coin', $data_arr_post);

			$this->session->set_flashdata('msg', 'Withdraw cancel successfully');
			redirect('my_withdrawal');
		}
		else  {
			$this->session->set_flashdata('error', 'You are trying with wrong data. You will be blocked!');
			redirect('my_withdrawal');
		}
	}

	public function transaction_history() {
		$data = [];
		$data['get_data'] = $this->db->query("SELECT * FROM my_coin WHERE user_id='{$this->user_id}'")->result();
		$this->load->view('customer/transaction_history', $data);
	}

	public function my_complain() {
		$data = [];
		$this->db->query("UPDATE complain SET user_view=1 WHERE user_id='{$this->user_id}'");

		if( $this->input->post('submit') ) {
			// $subject = $this->input->post('subject');
			$description = $this->input->post('description');
			$complain_to = $this->input->post('complain_to');

			if( !empty($complain_to) && !empty($description) ) {

		        $data_arr = array(
		        	'user_id' => $this->user_id,
		        	'club_id' => $this->club_id,
					'complain_to' => $complain_to,
					// 'subject' => $subject,
					'message' => $description,
					'created_at'	=> date("Y-m-d H:i:s")
		        );
				$this->db->insert('complain', $data_arr);
				$this->session->set_flashdata('msg', 'Complain submitted successfully');
				redirect('my_complain');
			}
		}

		$data['get_data'] = $this->db->query("SELECT * FROM `complain` WHERE user_id='{$this->user_id}'")->result();
		$this->load->view('customer/my_complain', $data);
	}

	// -- end new functions

	public function bet_history() {
		$data = array();
		$query_string = "SELECT mbc.*, mopd.option_title, mopd.match_id, mopd.match_option_id, mp.match_option_title, m.league_title, m.title, s.name FROM matchbit_coin AS mbc INNER JOIN match_option_details AS mopd ON mbc.match_bit_id=mopd.id INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id INNER JOIN sportscategory AS s ON m.sportscategory_id=s.id WHERE mbc.user_id='{$this->user_id}' ORDER BY mbc.id DESC LIMIT 100";
		$data['get_data'] = $this->db->query($query_string)->result();
		// dd($data);
		$this->load->view('customer/bet_history', $data);
	}

	public function complain_history() {
		$data = [];
		$data['get_data'] = $this->db->query("SELECT * FROM `complain` WHERE user_id='{$this->user_id}'")->result();
		$this->load->view('customer/complain_history', $data);
	}

	public function deposit_history() {
		$data = [];
		$data['name'] = $this->name;
		$data['coin_rate'] = 1.5;
		$data['get_data'] = $this->db->query("SELECT d.*, c.club_name FROM `deposit` AS d INNER JOIN club_users AS c ON d.club_user_id=c.id WHERE user_id='{$this->user_id}'")->result();
		$this->load->view('customer/deposit_history', $data);
	}

	public function make_deposit() {
		$data = [];
		$data['settings'] = $this->db->query("SELECT deposit_bonus_ratio FROM settings")->row()->deposit_bonus_ratio;
		$data['acc_data'] = $this->db->query("SELECT * FROM deposit_account WHERE status=1")->result();

		if( $this->input->post('submit') ) {

			$payment_method = $this->input->post('payment_method');
			$admin_account = $this->input->post('admin_account');
			$amount = $this->input->post('amount');
			$transaction_id = $this->input->post('transaction_id');
			$user_phone = $this->input->post('user_phone');
			$coin_rate = $data['settings'];
			$deposit_coin = (($coin_rate*$amount)/100)+$amount;

			if(!empty($payment_method) && !empty($amount) && !empty($admin_account) && !empty($user_phone)) {
				/*$password = md5($this->input->post('password'));
				$get_data = $this->db->query("SELECT * FROM users WHERE password='{$password}' AND id='{$this->user_id}'")->row();
				if(empty($get_data)) {
					$this->session->set_flashdata('error', 'Invalid password');
					redirect('make_deposit');
					return;
				}*/
				
		        $data_arr = array(
		        	'user_id' => $this->user_id,
					'club_user_id'	=> $this->club_id,
					'payment_method' => $payment_method,
					'transaction_id' => $transaction_id,
					'user_phone' => $user_phone,
					'amount' => $amount,
					'coin_rate' => $coin_rate,
					'coin' => $deposit_coin,
					'admin_account' => $admin_account,
					'created_at'	=> date("Y-m-d H:i:s")
				);

				//dd($data_arr);

				$this->db->insert('deposit', $data_arr);
				$this->session->set_flashdata('msg', 'Deposit successfully done. Please wait for admin confirmation');
				redirect('make_deposit');
			}
		}

		$this->load->view('customer/make_deposit', $data);
	}

	public function my_followers() {
		$this->load->view('customer/my_followers');
	}

	public function statement() {
		$data = [];
		$data['get_data'] = $this->db->query("SELECT * FROM my_coin WHERE user_id='{$this->user_id}'")->result();
		$this->load->view('customer/statement', $data);
	}

	public function submit_complain() {
		$data = [];

		if( $this->input->post('submit') ) {

			$subject = $this->input->post('subject');
			$description = $this->input->post('description');
			$complain_to = $this->input->post('complain_to');

			if( !empty($subject) && !empty($description) ) {

		        $data_arr = array(
		        	'user_id' => $this->user_id,
		        	'club_id' => $this->club_id,
					'complain_to' => $complain_to,
					'subject' => $subject,
					'message' => $description,
					'created_at'	=> date("Y-m-d H:i:s")
		        );
				$this->db->insert('complain', $data_arr);
				$this->session->set_flashdata('msg', 'Complain added successfully to admin');
				redirect('submit_complain');
			}
		}

		$this->load->view('customer/submit_complain');
	}

	public function update_club() {
		$data = [];
		$data['club_id'] = $this->db->query("SELECT club_id FROM users WHERE id='{$this->user_id}'")->row()->club_id;
		$data['club_names'] = $this->db->query("SELECT id, club_name FROM club_users WHERE status=1")->result();

		if( $this->input->post('submit') ) {
			if(!empty($_POST['club_id']) && !empty($_POST['password'])) {

				$club_id = $this->input->post('club_id');
				$password = md5($this->input->post('password'));
				$get_data = $this->db->query("SELECT * FROM users WHERE password='{$password}' AND id='{$this->user_id}'")->row();
				if(empty($get_data)) {
					$this->session->set_flashdata('error', 'Invalid password');
					redirect('update_club');
					return;
				}

		        $data_arr = array(
					'club_id'	=> $club_id,
					'updated_at'	=> date("Y-m-d H:i:s")
		        );
				$this->db->where('id', $this->user_id);
				$this->db->update('users', $data_arr);
				$this->session->set_flashdata('msg', 'Club updated successfully');
				redirect('update_club');
			}
		}

		$this->load->view('customer/update_club', $data);
	}

	public function update_password() {
		$data = [];

		if( $this->input->post('submit') ) {
			$current_password = $this->input->post('current_password');
			$password = $this->input->post('password');
			$confirm_password = $this->input->post('confirm_password');

			if($password != $confirm_password) {
				$this->session->set_flashdata('error', 'Password and confirm password did not match');
				redirect('update_password');
				return;
			}

			if(!empty($current_password) && !empty($password) && !empty($confirm_password)) {


				$current_password = md5($this->input->post('current_password'));
				$get_data = $this->db->query("SELECT * FROM users WHERE password='{$current_password}' AND id='{$this->user_id}'")->row();
				if(empty($get_data)) {
					$this->session->set_flashdata('error', 'Invalid password');
					redirect('update_password');
					return;
				}

		        $data_arr = array(
					'password'	=> md5($password),
					'updated_at'	=> date("Y-m-d H:i:s")
		        );
				$this->db->where('id', $this->user_id);
				$this->db->update('users', $data_arr);
				$this->session->set_flashdata('msg', 'Password updated successfully');
				redirect('update_password');



			}
		}

		$this->load->view('customer/update_password');
	}

	public function update_profile() {
		$data = [];
		$data['name'] = $this->name;
		$data['email_add'] = $this->email_add;
		$data['phone'] = $this->phone;
		$data['country'] = $this->country;

		if($this->input->post('submit')) {
			$name = $this->input->post('name');
			$country = $this->input->post('country');

	        $data_arr = array(
				'name'			=> $name,
				'country'		=> $country,
				'updated_at'	=> date("Y-m-d H:i:s")
	        );
			$this->db->where('id', $this->user_id);
			$this->db->update('users', $data_arr);
			$this->session->set_flashdata('msg', 'Profile updated successfully');
			redirect('update_profile');
		}

		$this->load->view('customer/update_profile', $data);
	}

	public function withdraw() {
		$data = [];

		if( $this->input->post('submit') ) {

			$payment_method = $this->input->post('payment_method');
			$account_no = $this->input->post('account_no');
			$withdraw_amount = $this->input->post('withdraw_amount');
			$account_type = $this->input->post('account_type');

			$password = $this->input->post('password');
			if(!empty($payment_method) && !empty($account_no) && !empty($withdraw_amount) && !empty($account_type)) {
				$password = md5($this->input->post('password'));
				$get_data = $this->db->query("SELECT * FROM users WHERE password='{$password}' AND id='{$this->user_id}'")->row();

				if(empty($get_data)) {
					$this->session->set_flashdata('error', 'Invalid password');
					redirect('withdraw');
					return;
				}

		        $data_arr = array(
		        	'user_id' => $this->user_id,
					'club_user_id'	=> $this->club_id,
					'payment_method' => $payment_method,
					'account_number' => $account_no,
					'payment_type' => $account_type,
					'amount' => $withdraw_amount,
					'created_at'	=> date("Y-m-d H:i:s")
		        );
				$this->db->insert('withdraw_req', $data_arr);

		        $get_cur_balance = get_user_current_balance($this->user_id) - $withdraw_amount;
		        $data_arr_post = array(
		        	'user_id' => $this->user_id,
		        	'club_id' => $this->club_id,
					'coin'	=> $withdraw_amount,
					'current_balance'	=> $get_cur_balance,
					'coin_type' => 'WITHDRAW',
					'method' => 'POST',
					'created_at'	=> date("Y-m-d H:i:s")
		        );
				$this->db->insert('my_coin', $data_arr_post);

				$this->session->set_flashdata('msg', 'Withdraw request successfully done. Please wait for admin confirmation');
				redirect('withdraw');
			}
		}

		$this->load->view('customer/withdraw');
	}

	public function withdraw_history() {
		$data = [];
		$data['get_data'] = $this->db->query("SELECT * FROM `withdraw_req` WHERE user_id='{$this->user_id}'")->result();
		$this->load->view('customer/withdraw_history', $data);
	}

	/*public function submit_user_bet() {

		$data = [];
		$option_details_id = $_POST['option_details_id'];
		$user_bet = $_POST['user_bet'];
		$min_bet = 20;

		$data['error'] = 0;
		$data['error_msg'] = "";

		if(!$this->session->userdata('cus_data')) {
			$data['error'] = 1;
			$data['error_msg'] = "You are not logged in. Please login to continue";
			echo json_encode($data);
			exit();
		}

		$row_data = $this->db->query("SELECT mopd.*, mp.match_option_title, m.league_title, m.title, m.sportscategory_id FROM match_option_details AS mopd INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id WHERE mopd.id='{$option_details_id}'")->row();

		if(empty($row_data)) {
			$data['error'] = 3;
			$data['error_msg'] = "Invalid data source";
			echo json_encode($data);
			exit();
		}

		// -- check user balance data
		$min_bet_amount = $row_data->option_coin*$min_bet;
		$user_id = $this->session->userdata('cus_data')->id;
		$user_balance = get_user_current_balance($user_id);
		$total_coin = $row_data->option_coin*$user_bet;
		$cur_balance = $user_balance - $user_bet;

		if($user_balance < $min_bet_amount) {
			$data['error'] = 2;
			$data['error_msg'] = "Insufficient balance. Please deposit first";
			echo json_encode($data);
			exit();
		}

		// insert match bit coin data
        $data_arr = array(
			'user_id'				=> $this->user_id,
			'club_id'				=> $this->club_id,
			'username'				=> $this->name,
			'match_bet_option_id'	=> $row_data->match_option_id,
			'match_bit_id'			=> $option_details_id,
			'option_coin'			=> $row_data->option_coin,
			'bet_coin'				=> $user_bet,
			'total_coin'			=> $total_coin,
			'prev_balance'			=> $user_balance,
			'cur_balance'			=> $cur_balance,
			'created_at'			=> date("Y-m-d H:i:s")
        );
        $this->db->insert('matchbit_coin', $data_arr);

        // -- deduct user balance from my_coin
        $data_arr2 = array(
        	'user_id'			=> $this->user_id,
        	'club_id'			=> $this->club_id,
			'coin'				=> $user_bet,
			'current_balance'	=> $cur_balance,
			'coin_type'			=> 'RUNNING_BET',
			'method'			=> 'POST',
			'created_at'		=> date("Y-m-d H:i:s")
        );
        $this->db->insert('my_coin', $data_arr2);

        // -- give club share
        $get_club_ratio = get_user_club_ratio($this->club_id);
        $club_coin = ($get_club_ratio*$user_bet)/100;
        $data_arr3 = array(
        	'club_id' 		=> $this->user_id,
        	'club_user_id'	=> $this->club_id,
        	'match_bet_id'	=> $option_details_id,
			'coin'			=> $club_coin,
			'source'		=> 'BET',
			'method'		=> 'GET',
			'created_at'	=> date("Y-m-d H:i:s"),
			'status'		=> 1
        );
        $this->db->insert('club_coin', $data_arr3);

        // give sponsor share
        $sp_username = $this->session->userdata('cus_data')->sponsor_name;
        $get_sponsor = $this->db->query("SELECT * FROM users WHERE username='{$sp_username}'")->row();
        if( !empty($get_sponsor) ) {
	        $sp_coin = (1*$user_bet)/100;
	        $sp_balance = get_user_current_balance($get_sponsor->id) + $sp_coin;

	        $data_arr4 = array(
	        	'user_id'			=> $get_sponsor->id,
	        	'club_id'			=> $get_sponsor->club_id,
				'coin'				=> $sp_coin,
				'current_balance'	=> $sp_balance,
				'coin_type'			=> 'SPONSOR_COMMISSION',
				'method'			=> 'GET',
				'sponsor_username'	=> $this->username,
				'created_at'		=> date("Y-m-d H:i:s")
	        );
	        $this->db->insert('my_coin', $data_arr4);
        }

		$data['success_msg'] = "Your bet submitted successfully";
		echo json_encode($data);

	}*/

	public function submit_user_bet() {

		$data = [];
		$option_details_id = $_POST['option_details_id'];
		$user_bet = $_POST['user_bet'];
		$min_bet = 20;

		$data['error'] = 0;
		$data['error_msg'] = "";

		if(!$this->session->userdata('cus_data')) {
			$data['error'] = 1;
			$data['error_msg'] = "You are not logged in. Please login to continue";
			echo json_encode($data);
			exit();
		}

		$row_data = $this->db->query("SELECT mopd.*, mp.id AS bet_id, mp.capital, mp.match_option_title, mp.status, m.league_title, m.active_status, m.title, m.id AS match_id, m.sportscategory_id FROM match_option_details AS mopd INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id WHERE mopd.id='{$option_details_id}'")->row();

		if(empty($row_data)) {
			$data['error'] = 3;
			$data['error_msg'] = "Invalid data source";
			echo json_encode($data);
			exit();
		}

		if( $row_data->active_status==4 || $row_data->active_status==5 || $row_data->active_status==6 || $row_data->active_status==7 || $row_data->active_status==8 ) {
			$data['error'] = 2;
			$data['error_msg'] = "Match status changed. You can not bet now!";
			echo json_encode($data);
			exit();
		}

		// -- calculate capital
		if($row_data->capital != 0) {
			$calc_capital = $this->db->query("SELECT SUM(`bet_coin`) AS total_capital FROM matchbit_coin WHERE `match_bet_option_id`='{$row_data->bet_id}'")->row();

			if( !empty($calc_capital) ) {
				$calc_capital = $calc_capital->total_capital + $_POST['user_bet'];
			}
			else {
				$calc_capital = $_POST['user_bet'];
			}
				
			if( $calc_capital > $row_data->capital ) {
				$data['error'] = 2;
				$data['error_msg'] = "Bet limit is over. You can not bet now";
				echo json_encode($data);
				exit();
			}

		}

		// -- check user balance data
		$min_bet_amount = $row_data->option_coin*$min_bet;
		$user_id = $this->session->userdata('cus_data')->id;
		$user_balance = get_user_current_balance($user_id);
		$total_coin = $row_data->option_coin*$user_bet;
		$cur_balance = $user_balance - $user_bet;

		if($user_balance < $user_bet) {
			$data['error'] = 2;
			$data['error_msg'] = "Insufficient balance. Please deposit first";
			echo json_encode($data);
			exit();
		}

		// -- status related change with be hit from there
		if($_POST['bet_rate'] != $row_data->option_coin) {
			$data['error'] = 2;
			$data['error_msg'] = "This bet ratio already changed. You can not bet now!";
			echo json_encode($data);
			exit();
		}

		if( $row_data->status != 1 ) {
			$data['error'] = 2;
			$data['error_msg'] = "Bet status changed. You can not bet now!";
			echo json_encode($data);
			exit();
		}

		// insert match bit coin data
        $data_arr = array(
			'user_id'				=> $this->user_id,
			'club_id'				=> $this->club_id,
			'username'				=> $this->name,
			'match_id'				=> $row_data->match_id,
			'match_bet_option_id'	=> $row_data->match_option_id,
			'match_bit_id'			=> $option_details_id,
			'option_coin'			=> $row_data->option_coin,
			'bet_coin'				=> $user_bet,
			'total_coin'			=> $total_coin,
			'prev_balance'			=> $user_balance,
			'cur_balance'			=> $cur_balance,
			'created_at'			=> date("Y-m-d H:i:s")
        );
        $this->db->insert('matchbit_coin', $data_arr);

        // -- deduct user balance from my_coin
        $data_arr2 = array(
        	'user_id'			=> $this->user_id,
        	'club_id'			=> $this->club_id,
			'coin'				=> $user_bet,
			'current_balance'	=> $cur_balance,
			'coin_type'			=> 'RUNNING_BET',
			'method'			=> 'POST',
			'created_at'		=> date("Y-m-d H:i:s")
        );
        $this->db->insert('my_coin', $data_arr2);

        // -- give club share
        $get_club_ratio = get_user_club_ratio($this->club_id);
        $club_coin = ($get_club_ratio*$user_bet)/100;
        $club_cur_bal = $club_coin + get_club_balance($this->club_id);
        $data_arr3 = array(
        	'club_id' 		=> $this->club_id,
        	'club_user_id'	=> $this->user_id,
        	'match_bet_id'	=> $option_details_id,
			'coin'			=> $club_coin,
			'current_balance'=> $club_cur_bal,
			'source'		=> 'BET',
			'method'		=> 'GET',
			'created_at'	=> date("Y-m-d H:i:s"),
			'status'		=> 1
        );
        $this->db->insert('club_coin', $data_arr3);

        // give sponsor share
        $sp_username = $this->session->userdata('cus_data')->sponsor_name;
        $get_sponsor = $this->db->query("SELECT * FROM users WHERE username='{$sp_username}'")->row();
        if( !empty($get_sponsor) ) {
        	// -- we will use this variable if user dynamic this section
        	// $sp_rate = $this->settings->sponsor_commission;
        	$sp_rate = 1;
	        $sp_coin = ($sp_rate*$user_bet)/100;
	        $sp_balance = get_user_current_balance($get_sponsor->id) + $sp_coin;

	        $data_arr4 = array(
	        	'user_id'			=> $get_sponsor->id,
	        	'club_id'			=> $get_sponsor->club_id,
				'coin'				=> $sp_coin,
				'current_balance'	=> $sp_balance,
				'coin_type'			=> 'SPONSOR_COMMISSION',
				'method'			=> 'GET',
				'sponsor_username'	=> $this->username,
				'created_at'		=> date("Y-m-d H:i:s")
	        );
	        $this->db->insert('my_coin', $data_arr4);
        }

		$data['success_msg'] = "Your bet submitted successfully";
		echo json_encode($data);

	}

	// -- added new routes
	public function submit_user_deposit() {

		$data = [];
		$data['error'] = 0;
		$data['error_msg'] = "";

		if( !empty($_POST) ) {
			$amount = $this->input->post('amount');
			$payment_method = $this->input->post('payment_method');
			$user_phone = $this->input->post('user_phone');
			$admin_account = $this->input->post('admin_account');
			$transaction_id = $this->input->post('transaction_id');
			$user_id = $this->user_id;
			$club_id = $this->club_id;

	        $data_arr = array(
				'user_id'			=> $user_id,
				'club_user_id'		=> $club_id,
				'payment_method'	=> $payment_method,
				'transaction_id'	=> $transaction_id,
				'user_phone'		=> $user_phone,
				'amount'			=> $amount,
				'admin_account'		=> $admin_account,
				'created_at'		=> date("Y-m-d H:i:s")
	        );
	        $this->db->insert('deposit', $data_arr);
	        if($this->db->insert_id()) {
				$data['success_msg'] = "Deposit successfully done!";
				echo json_encode($data);
				exit();
	        }
	        else {
				$data['error'] = 1;
				$data['error_msg'] = "Deposit failed";
				echo json_encode($data);
				exit();
	        }

		}
	}

	public function submit_user_withdraw() {

		$data = [];
		$data['error'] = 0;
		$data['error_msg'] = "";

		if( !empty($_POST) ) {
			$amount = $this->input->post('amount');
			$payment_method = $this->input->post('payment_method');
			$account_number = $this->input->post('account_number');
			$payment_type = $this->input->post('payment_type');
			$user_id = $this->user_id;
			$club_id = $this->club_id;

			// -- check club balance
			$user_balance = get_user_current_balance($this->user_id);
			if($user_balance < $amount) {
				$data['error'] = 1;
				$data['error_msg'] = "Insufficiant balance. Withdraw request failed.";
				echo json_encode($data);
				exit();
			}

	        $data_arr = array(
				'user_id'			=> $user_id,
				'club_user_id'		=> $club_id,
				'payment_method'	=> $payment_method,
				'account_number'	=> $account_number,
				'payment_type'		=> $payment_type,
				'amount'			=> $amount,
				'created_at'		=> date("Y-m-d H:i:s")
	        );
	        $this->db->insert('withdraw_req', $data_arr);
	        if($this->db->insert_id()) {

		        $get_cur_balance = $user_balance - $amount;
		        $data_arr_post = array(
		        	'user_id' => $this->user_id,
		        	'club_id' => $this->club_id,
					'coin'	=> $amount,
					'current_balance'	=> $get_cur_balance,
					'coin_type' => 'WITHDRAW',
					'method' => 'POST',
					'created_at'	=> date("Y-m-d H:i:s")
		        );
				$this->db->insert('my_coin', $data_arr_post);

				$data['error'] = 0;
				$data['success_msg'] = "Withdraw request successfully done!";
				echo json_encode($data);
				exit();
	        }
	        else {
				$data['error'] = 1;
				$data['error_msg'] = "Withdraw failed";
				echo json_encode($data);
				exit();
	        }

		}
	}

	public function check_user_password() {

        if ( isset($_POST['password']) && $_POST['password'] != '' ) {
            $password = trim($_POST['password']);
            $password = md5($password);
            $password_error = "";

            $user_data = $this->db->query("SELECT * FROM users WHERE id='{$this->user_id}' AND password='{$password}'")->row();
            // dd($user_data);

            if (!empty($user_data)) {
                echo '0';
            } else {
                echo '1';
            }
        }

	}

	public function change_user_password() {

		$data = [];
		$data['error'] = 0;
		$data['error_msg'] = "";

        if ( isset($_POST['password']) && $_POST['password'] != '' ) {
            $password = trim($_POST['password']);
            $password = md5($password);
            $password_error = "";

            $user_data = $this->db->query("UPDATE users SET password='{$password}' WHERE id='{$this->user_id}' LIMIT 1");
            // dd($user_data);

            if ($this->db->affected_rows() > 0) {
				$data['success_msg'] = "Password changed successfully!";
				echo json_encode($data);
				exit();
            } else {
				$data['error'] = 1;
				$data['error_msg'] = "Change password failed";
				echo json_encode($data);
				exit();
            }
        }

	}

	public function coin_transfer_old() {
		$data = [];

		if( $this->input->post('submit') ) {

			$username = $this->input->post('username');
			$number_of_coin = $this->input->post('number_of_coin');
			$password = $this->input->post('password');

			if( !empty($username) && !empty($number_of_coin) && !empty($password) ) {
				$password = md5($this->input->post('password'));
				$get_data = $this->db->query("SELECT * FROM users WHERE password='{$password}' AND id='{$this->user_id}'")->row();
				if(empty($get_data)) {
					$this->session->set_flashdata('error', 'Invalid password');
					redirect('coin_transfer');
					return;
				}

				// -- get coin receive user id
				$transfer_user_id = null;
				$transfer_user_name = null;
				$transfer_club_id = null;
				if(is_numeric($username) && strlen($username)==11) {

					$this->db->select('id, club_id, name');
					$this->db->from('users');
					$this->db->where('phone', $username);
					$this->db->where('status', 1);
					$query = $this->db->get();
					$result = $query->row();
					if( !empty($result) ) {
						$transfer_user_id = $result->id;
						$transfer_user_name = $result->name;
						$transfer_club_id = $result->club_id;
					}
				}
				else if( filter_var($username, FILTER_VALIDATE_EMAIL) ) {
					$this->db->select('id, club_id, name');
					$this->db->from('users');
					$this->db->where('email', $username);
					$this->db->where('status', 1);
					$query = $this->db->get();
					$result = $query->row();
					if( !empty($result) ) {
						$transfer_user_id = $result->id;
						$transfer_user_name = $result->name;
						$transfer_club_id = $result->club_id;
					}
				}
				else {
					$this->session->set_flashdata('error', 'Invalid user found');
					redirect('coin_transfer');
					return false;
				}

				if(empty($transfer_user_id)) {
					$this->session->set_flashdata('error', 'Inactive user found');
					redirect('coin_transfer');
					return false;
				}

				// data insert to balance table
				$data_arr = array(
		        	'transfer_to' => $transfer_user_id,
		        	'transfer_to_name' => $transfer_user_name,
		        	'transfer_by' => $this->user_id,
		        	'transfer_by_name' => $this->name,
					'amount'	=> $number_of_coin,
					'created_at'	=> date("Y-m-d H:i:s")
		        );
		        $this->db->insert('balance_transfer', $data_arr);

				// -- make transfer coin calculation
				$get_cur_balance = get_user_current_balance($transfer_user_id) + $number_of_coin;
		        $data_arr2 = array(
		        	'user_id' => $transfer_user_id,
		        	'club_id' => $transfer_club_id,
					'coin'	=> $number_of_coin,
					'current_balance'	=> $get_cur_balance,
					'coin_type' => 'TRANSFER_GET',
					'method' => 'GET',
					'transfer_user_id' => $this->user_id,
					'created_at'	=> date("Y-m-d H:i:s")
		        );
		        $this->db->insert('my_coin', $data_arr2);
		        
		        $get_cur_balance = get_user_current_balance($this->user_id) - $number_of_coin;
		        $data_arr_post = array(
		        	'user_id' => $this->user_id,
		        	'club_id' => $this->club_id,
					'coin'	=> $number_of_coin,
					'current_balance'	=> $get_cur_balance,
					'coin_type' => 'TRANSFER_POST',
					'method' => 'POST',
					'transfer_user_id' => $transfer_user_id,
					'created_at'	=> date("Y-m-d H:i:s")
		        );
				$this->db->insert('my_coin', $data_arr_post);
				$this->session->set_flashdata('msg', 'Coin transfer successfully done');
				redirect('coin_transfer');
			}
		}

		$this->load->view('customer/coin_transfer');
	}

	public function coin_transfer() {

		$data = [];
		$data['error'] = 0;
		$data['error_msg'] = "";

		if( !empty($_POST) ) {
			$amount = $this->input->post('amount');
			$username = $this->input->post('username');
			$notes = $this->input->post('notes');
			$password = md5($this->input->post('password'));
			$user_id = $this->user_id;
			$club_id = $this->club_id;

			// -- check club balance
			$user_balance = get_user_current_balance($this->user_id);
			if($user_balance < $amount) {
				$data['error'] = 1;
				$data['error_msg'] = "Insufficiant balance. Transfer request failed.";
				echo json_encode($data);
				exit();
			}

			// -- check username exists
			$user_data = $this->db->query("SELECT * FROM users WHERE username='{$username}'")->row();
			if(empty($user_data)) {
				$data['error'] = 1;
				$data['error_msg'] = "Username not found!";
				echo json_encode($data);
				exit();
			}
			// dd($user_data);
			
			// -- check user password
			$chk_data = $this->db->query("SELECT * FROM users WHERE id='{$this->user_id}' AND password='{$password}'")->row();
			if(empty($chk_data)) {
				$data['error'] = 1;
				$data['error_msg'] = "Incorrect password";
				echo json_encode($data);
				exit();
			}

			// data insert to balance table
			$data_arr = array(
	        	'transfer_to' => $user_data->id,
	        	'transfer_to_name' => $user_data->username,
	        	'transfer_by' => $this->user_id,
	        	'transfer_by_name' => $this->username,
				'amount'	=> $amount,
				'note'	=> $notes,
				'created_at'	=> date("Y-m-d H:i:s")
	        );
	        $this->db->insert('balance_transfer', $data_arr);


	        if($this->db->insert_id()) {

				// -- make transfer coin calculation
				$get_cur_balance = get_user_current_balance($user_data->id) + $amount;
		        $data_arr2 = array(
		        	'user_id' => $user_data->id,
		        	'club_id' => $user_data->club_id,
					'coin'	=> $amount,
					'current_balance'	=> $get_cur_balance,
					'coin_type' => 'TRANSFER_GET',
					'method' => 'GET',
					'transfer_user_id' => $this->user_id,
					'created_at'	=> date("Y-m-d H:i:s")
		        );
		        $this->db->insert('my_coin', $data_arr2);
		        
		        $get_cur_balance = $user_balance - $amount;
		        $data_arr_post = array(
		        	'user_id' => $this->user_id,
		        	'club_id' => $this->club_id,
					'coin'	=> $amount,
					'current_balance'	=> $get_cur_balance,
					'coin_type' => 'TRANSFER_POST',
					'method' => 'POST',
					'transfer_user_id' => $user_data->id,
					'created_at'	=> date("Y-m-d H:i:s")
		        );
				$this->db->insert('my_coin', $data_arr_post);

				$data['error'] = 0;
				$data['success_msg'] = "Transfer request successfully done!";
				echo json_encode($data);
				exit();
	        }
	        else {
				$data['error'] = 1;
				$data['error_msg'] = "Transfer failed";
				echo json_encode($data);
				exit();
	        }

		}
	}

	public function get_sponsor_data() {
		$username = $_POST['user_id'];
		$data = [];
		$data['error'] = 0;
		$data['error_msg'] = "";

		if(empty($username)) {
			$data['error'] = 1;
			$data['error_msg'] = "Invalid user!";
			echo json_encode($data);
			exit();
		}

		$get_data = $this->db->query("SELECT * FROM users WHERE sponsor_name='{$username}'")->result();
		if(empty($get_data)) {
			$data['error'] = 1;
			$data['error_msg'] = "No sponsor found! Please refer your friend to join here";
			echo json_encode($data);
			exit();
		}

		$data_str = "";
		$i = 1;
		foreach($get_data as $val) {

			$comission_earn = get_commission_earned($this->user_id, $val->username);
			$data_str .= "<tr>";
				$data_str .= "<td>" . $i . "</td>";
				$data_str .= "<td class='text-center'>" . $val->name . "</td>";
				$data_str .= "<td class='text-center'>" . $val->username . "</td>";
				$data_str .= "<td class='text-center'>" . date("Y-m-d", strtotime($val->created_at)) . "</td>";
				$data_str .= "<td class='text-center'>" . $comission_earn . "</td>";
			$data_str .= "</tr>";
			
			$i++;
		}

		$data['error'] = 0;
		$data['success_msg'] = $data_str;
		echo json_encode($data);
		exit();
	}

	public function payment_account_search() {
		$payment_method = $_POST['payment_method'];
		$data = [];
		$msg = "";

		$get_data = $this->db->query("SELECT account_no FROM deposit_account WHERE account_name='{$payment_method}'")->result();
		foreach($get_data as $val) {
			$msg .= '<option value="'.$val->account_no.'">' . $val->account_no . '</option>';
		}
		$data['error'] = 0;
		$data['success_msg'] = $msg;
		echo json_encode($data);
		exit();

	}

	public function submit_user_multibet() {

		$data = [];
		$option_details_id = $_POST['option_details_id'];
		$option_string = implode(",", $option_details_id);

		$user_bet = $_POST['user_bet'];
		$min_bet = 100;


		$data['error'] = 0;
		$data['error_msg'] = "";

		if(!$this->session->userdata('cus_data')) {
			$data['error'] = 1;
			$data['error_msg'] = "You are not logged in. Please login to continue";
			echo json_encode($data);
			exit();
		}

		$res_data = $this->db->query("SELECT mopd.*, mp.id AS bet_id, mp.capital, mp.match_option_title, mp.status, m.league_title, m.active_status, m.title, m.id AS match_id, m.sportscategory_id FROM match_option_details AS mopd INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id WHERE mopd.id IN({$option_string})")->result();

		if(empty($res_data)) {
			$data['error'] = 3;
			$data['error_msg'] = "Invalid data source";
			echo json_encode($data);
			exit();
		}

		// -- initially hold this functionality
		/*if( $row_data->active_status==4 || $row_data->active_status==5 || $row_data->active_status==6 || $row_data->active_status==7 || $row_data->active_status==8 ) {
			$data['error'] = 2;
			$data['error_msg'] = "Match status changed. You can not bet now!";
			echo json_encode($data);
			exit();
		}*/

		// -- calculate capital
		/*if($row_data->capital != 0) {
			$calc_capital = $this->db->query("SELECT SUM(`bet_coin`) AS total_capital FROM matchbit_coin WHERE `match_bet_option_id`='{$row_data->bet_id}'")->row();

			if( !empty($calc_capital) ) {
				$calc_capital = $calc_capital->total_capital + $_POST['user_bet'];
			}
			else {
				$calc_capital = $_POST['user_bet'];
			}
				
			if( $calc_capital > $row_data->capital ) {
				$data['error'] = 2;
				$data['error_msg'] = "Bet limit is over. You can not bet now";
				echo json_encode($data);
				exit();
			}

		}*/

		// -- check user balance data
		$min_bet_amount = 100;
		$user_id = $this->session->userdata('cus_data')->id;
		$user_balance = get_user_current_balance($user_id);
		$possible_win = $user_bet*$_POST['bet_rate'];
		$cur_balance = $user_balance - $user_bet;

		if($user_balance < $user_bet) {
			$data['error'] = 2;
			$data['error_msg'] = "Insufficient balance. Please deposit first";
			echo json_encode($data);
			exit();
		}

		// -- status related change with be hit from there
		/*if($_POST['bet_rate'] != $row_data->option_coin) {
			$data['error'] = 2;
			$data['error_msg'] = "This bet ratio already changed. You can not bet now!";
			echo json_encode($data);
			exit();
		}*/

		/*if( $row_data->status != 1 ) {
			$data['error'] = 2;
			$data['error_msg'] = "Bet status changed. You can not bet now!";
			echo json_encode($data);
			exit();
		}*/

		// insert match bit coin data
		foreach($res_data as $row_data) {
	        $data_arr = array(
				'user_id'				=> $this->user_id,
				'club_id'				=> $this->club_id,
				'username'				=> $this->name,
				'match_id'				=> $row_data->match_id,
				'match_bet_option_id'	=> $row_data->match_option_id,
				'match_bit_id'			=> $row_data->id,
				'option_coin'			=> $row_data->option_coin,
				'bet_coin'				=> 0,
				'total_coin'			=> 0,
				'prev_balance'			=> $user_balance,
				'cur_balance'			=> $cur_balance,
				'bet_type'				=> 'MULTI_BET',
				'created_at'			=> date("Y-m-d H:i:s")
	        );
	        $this->db->insert('matchbit_coin', $data_arr);
		}

		// -- insert data to the multibet table
        $multi_data_arr = array(
			'option_detail_ids'		=> $option_string,
			'user_id'				=> $this->user_id,
			'club_id'				=> $this->club_id,
			'username'				=> $this->name,
			'total_stake'			=> $_POST['bet_rate'],
			'total_coin'			=> $user_bet,
			'possible_win'			=> $possible_win
        );
        $this->db->insert('multibet', $multi_data_arr);


        // -- deduct user balance from my_coin
        $data_arr2 = array(
        	'user_id'			=> $this->user_id,
        	'club_id'			=> $this->club_id,
			'coin'				=> $user_bet,
			'current_balance'	=> $cur_balance,
			'coin_type'			=> 'RUNNING_BET',
			'method'			=> 'POST',
			'created_at'		=> date("Y-m-d H:i:s")
        );
        $this->db->insert('my_coin', $data_arr2);

        // -- give club share
        $get_club_ratio = get_user_club_ratio($this->club_id);
        $club_coin = ($get_club_ratio*$user_bet)/100;
        $club_cur_bal = $club_coin + get_club_balance($this->club_id);
        $data_arr3 = array(
        	'club_id' 		=> $this->club_id,
        	'club_user_id'	=> $this->user_id,
        	// 'match_bet_id'	=> $option_details_id,
			'coin'			=> $club_coin,
			'current_balance'=> $club_cur_bal,
			'source'		=> 'BET',
			'method'		=> 'GET',
			'created_at'	=> date("Y-m-d H:i:s"),
			'status'		=> 1
        );
        $this->db->insert('club_coin', $data_arr3);

        // give sponsor share
        $sp_username = $this->session->userdata('cus_data')->sponsor_name;
        $get_sponsor = $this->db->query("SELECT * FROM users WHERE username='{$sp_username}'")->row();
        if( !empty($get_sponsor) ) {
        	// -- we will use this variable if user dynamic this section
        	// $sp_rate = $this->settings->sponsor_commission;
        	$sp_rate = 1;
	        $sp_coin = ($sp_rate*$user_bet)/100;
	        $sp_balance = get_user_current_balance($get_sponsor->id) + $sp_coin;

	        $data_arr4 = array(
	        	'user_id'			=> $get_sponsor->id,
	        	'club_id'			=> $get_sponsor->club_id,
				'coin'				=> $sp_coin,
				'current_balance'	=> $sp_balance,
				'coin_type'			=> 'SPONSOR_COMMISSION',
				'method'			=> 'GET',
				'sponsor_username'	=> $this->username,
				'created_at'		=> date("Y-m-d H:i:s")
	        );
	        $this->db->insert('my_coin', $data_arr4);
        }

		$data['success_msg'] = "Multi bet submitted successfully";
		echo json_encode($data);

	}

}