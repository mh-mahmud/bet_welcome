<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clubuser extends CI_Controller {

	private $club_id;
	private $club_name;
	private $username;
	private $club_email;
	private $club_mobile;
	private $coin;
	private $show_ratio;
	private $created_at;
	private $status;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('betscore');
		if(empty($this->session->userdata('club_user_data'))) {
			redirect('/');
		}

		$x = $this->session->userdata('club_user_data');
		$this->club_id = $x->id;
		$this->club_name = $x->club_name;
		$this->username = $x->username;
		$this->club_email = $x->club_email;
		$this->club_mobile = $x->club_mobile;
		$this->coin = $x->coin;
		$this->show_ratio = $x->show_ratio;
		$this->created_at = $x->created_at;
		$this->status = $x->status;

	}

	public function club_profile() {
		$data = [];
		$data['club_id'] = $this->club_id;
		$data['club_name'] = $this->club_name;
		$data['username'] = $this->username;
		$data['club_email'] = $this->club_email;
		$data['club_mobile'] = $this->club_mobile;
		$data['coin'] = $this->coin;
		$data['show_ratio'] = $this->show_ratio;
		$data['created_at'] = $this->created_at;
		$data['status'] = $this->status;
		$data['total_member'] = 0;
		$y = $this->db->query("SELECT COUNT(*) AS TOT_COUNT FROM users WHERE club_id='{$this->club_id}'")->row();
		if(!empty($y)) {
			$data['total_member'] = $y->TOT_COUNT;
		}

		// dd($data);

		$this->load->view('club/club_profile', $data);
	}

	public function user_bet_history() {

		$data = [];
		$query_string = "SELECT mbc.*, mopd.option_title, mopd.match_id, mopd.match_option_id, mp.match_option_title, m.league_title, m.title, s.name FROM matchbit_coin AS mbc INNER JOIN match_option_details AS mopd ON mbc.match_bit_id=mopd.id INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id INNER JOIN sportscategory AS s ON m.sportscategory_id=s.id WHERE mbc.club_id='{$this->club_id}' ORDER BY mbc.id DESC";
		$data['get_data'] = $this->db->query($query_string)->result();
		$this->load->view('club/user_bet_history', $data);

	}

	public function user_withdraw_history() {
		$data = [];
		$data['get_data'] = $this->db->query("SELECT w.*, u.name FROM `withdraw_req` AS w INNER JOIN users AS u ON w.user_id=u.id WHERE club_user_id='{$this->club_id}'")->result();
		$this->load->view('club/user_withdraw_history', $data);
	}

	public function balance_transfer_history() {
		$data = [];
		$data['get_data'] = $this->db->query("SELECT m.*, u.name FROM `my_coin` AS m INNER JOIN users AS u ON m.user_id=u.id WHERE m.coin_type IN('TRANSFER_GET', 'TRANSFER_POST') AND m.club_id='{$this->club_id}'")->result();
		$this->load->view('club/balance_transfer_history', $data);
	}

	public function user_list() {
		$data = [];
		$data['get_data'] = $this->db->query("SELECT * FROM `users` WHERE club_id='{$this->club_id}'")->result();
		$this->load->view('club/user_list', $data);
	}

	public function club_withdraw_history() {
		$data = [];
		$data['get_data'] = $this->db->query("SELECT * FROM club_withdraw_req WHERE club_user_id='{$this->club_id}'")->result();
		$this->load->view('club/club_withdraw_history', $data);
	}

	public function users_complain() {
		$data = [];

		$red = 'users_complain';
		if($this->input->post('submit')) {
			$reply = $this->input->post('reply');
			$complain_id = $this->input->post('complain_id');
			if(!empty($reply) && !empty($complain_id)) {

		        $data_arr2 = array(
					'reply'	=> $reply,
					'updated_at'	=> date("Y-m-d H:i:s")
		        );
				$this->db->where('id', $complain_id);
				$this->db->update('complain', $data_arr2);
				$this->session->set_flashdata('msg', 'Reply message sent to user successfully');
				redirect($red);
				return;

			}
		}

		$data['get_data'] = $this->db->query("SELECT c.*, u.name FROM `complain` AS c INNER JOIN users AS u ON c.user_id=u.id WHERE c.complain_to='CLUB' AND c.club_id='{$this->club_id}'")->result();
		$this->load->view('club/users_complain', $data);
	}

	// -- game 7 end

	public function club_profile_update() {
		$this->load->view('club/club_profile_update');
	}

	public function match_bit_coin() {
		$data = array();
		$query_string = "SELECT mbc.*, mopd.option_title, mopd.match_id, mopd.match_option_id, mp.match_option_title, m.league_title, m.title, s.name FROM matchbit_coin AS mbc INNER JOIN match_option_details AS mopd ON mbc.match_bit_id=mopd.id INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id INNER JOIN sportscategory AS s ON m.sportscategory_id=s.id WHERE mbc.club_id='{$this->club_id}' ORDER BY mbc.id DESC LIMIT 5";
		$data['get_data'] = $this->db->query($query_string)->result();
		$this->load->view('club/match_bit_coin', $data);
	}

	public function match_bit_coin_history() {
		$data = array();
		$query_string = "SELECT mbc.*, mopd.option_title, mopd.match_id, mopd.match_option_id, mp.match_option_title, m.league_title, m.title, s.name FROM matchbit_coin AS mbc INNER JOIN match_option_details AS mopd ON mbc.match_bit_id=mopd.id INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id INNER JOIN sportscategory AS s ON m.sportscategory_id=s.id WHERE mbc.club_id='{$this->club_id}' ORDER BY mbc.id DESC LIMIT 100";
		$data['get_data'] = $this->db->query($query_string)->result();
		$this->load->view('club/match_bit_coin_history', $data);
	}

	public function customer_withdraw() {
		$data = [];
		$data['get_data'] = $this->db->query("SELECT w.*, u.name FROM `withdraw_req` AS w INNER JOIN users AS u ON w.user_id=u.id WHERE club_user_id='{$this->club_id}'")->result();
		$this->load->view('club/customer_withdraw', $data);
	}

	public function user_balance_transfer() {
		$data = [];
		$data['get_data'] = $this->db->query("SELECT m.*, u.name FROM `my_coin` AS m INNER JOIN users AS u ON m.user_id=u.id WHERE m.coin_type IN('TRANSFER_GET', 'TRANSFER_POST') AND m.club_id='{$this->club_id}'")->result();
		$this->load->view('club/user_balance_transfer', $data);
	}

	public function user_history() {
		$data = [];
		$data['get_data'] = $this->db->query("SELECT * FROM `users` WHERE club_id='{$this->club_id}'")->result();
		$this->load->view('club/user_history', $data);
	}

	public function club_withdraw() {

		$data = [];

		if( $this->input->post('submit') ) {

			$payment_method = $this->input->post('payment_method');
			$account_no = $this->input->post('account_no');
			$withdraw_amount = $this->input->post('withdraw_amount');
			$account_type = $this->input->post('account_type');

			$password = $this->input->post('password');
			if(!empty($payment_method) && !empty($account_no) && !empty($withdraw_amount) && !empty($account_type)) {
				$password = md5($this->input->post('password'));
				$get_data = $this->db->query("SELECT * FROM club_users WHERE password='{$password}' AND id='{$this->club_id}'")->row();

				if(empty($get_data)) {
					$this->session->set_flashdata('error', 'Invalid password');
					redirect('club_withdraw');
					return;
				}

		        $data_arr = array(
					'club_user_id'	=> $this->club_id,
					'payment_method' => $payment_method,
					'account_number' => $account_no,
					'payment_type' => $account_type,
					'amount' => $withdraw_amount,
					'created_at'	=> date("Y-m-d H:i:s")
		        );
				$this->db->insert('club_withdraw_req', $data_arr);
				$this->session->set_flashdata('msg', 'Withdraw request successfully done. Please wait for admin confirmation');
				redirect('club_withdraw');
			}
		}

		$this->load->view('club/club_withdraw');
	}

	public function customer_statement() {
		$data = [];
		$data['club_users'] = $this->db->query("SELECT id, name FROM users WHERE club_id='{$this->club_id}'")->result();
		$data['get_data'] = [];
		if($this->input->post('submit')) {
			$user_id = $this->input->post('club_user');
			$data['get_data'] = $this->db->query("SELECT * FROM my_coin WHERE user_id='{$user_id}'")->result();
		}
		$this->load->view('club/customer_statement', $data);
	}

	public function customer_complain() {
		$data = [];
		$data['get_data'] = $this->db->query("SELECT c.*, u.name FROM `complain` AS c INNER JOIN users AS u ON c.user_id=u.id WHERE c.complain_to='CLUB' AND c.club_id='{$this->club_id}'")->result();
		$this->load->view('club/customer_complain', $data);
	}

	public function check_club_password() {

        if ( isset($_POST['password']) && $_POST['password'] != '' ) {
            $password = trim($_POST['password']);
            $password = md5($password);
            $password_error = "";

            $user_data = $this->db->query("SELECT * FROM club_users WHERE id='{$this->club_id}' AND password='{$password}'")->row();
            // dd($user_data);

            if (!empty($user_data)) {
                echo '0';
            } else {
                echo '1';
            }
        }

	}

	public function change_club_password() {

		$data = [];
		$data['error'] = 0;
		$data['error_msg'] = "";

        if ( isset($_POST['password']) && $_POST['password'] != '' ) {
            $password = trim($_POST['password']);
            $password = md5($password);
            $password_error = "";

            $user_data = $this->db->query("UPDATE club_users SET password='{$password}' WHERE id='{$this->club_id}' LIMIT 1");
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

	public function submit_club_withdraw() {

		$data = [];
		$data['error'] = 0;
		$data['error_msg'] = "";

		if( !empty($_POST) ) {
			$amount = $this->input->post('amount');
			$payment_method = $this->input->post('payment_method');
			$account_number = $this->input->post('account_number');
			$payment_type = $this->input->post('payment_type');
			$club_id = $this->club_id;

			// -- check club balance
			$club_balance = get_club_balance($club_id);
			if($club_balance < $amount) {
				$data['error'] = 1;
				$data['error_msg'] = "Insufficiant balance. Withdraw request failed.";
				echo json_encode($data);
				exit();
			}


	        $data_arr = array(
				'club_user_id'		=> $club_id,
				'payment_method'	=> $payment_method,
				'account_number'	=> $account_number,
				'payment_type'		=> $payment_type,
				'amount'			=> $amount,
				'created_at'		=> date("Y-m-d H:i:s")
	        );
	        $this->db->insert('club_withdraw_req', $data_arr);
	        if($this->db->insert_id()) {

		        $get_cur_balance = $club_balance - $amount;
		        $data_arr_post = array(
		        	'club_id'			=> $this->club_id,
					'coin'				=> $amount,
					'current_balance'	=> $get_cur_balance,
					'source'			=> 'WITHDRAW',
					'method'			=> 'POST',
					'created_at'		=> date("Y-m-d H:i:s")
		        );
				$this->db->insert('club_coin', $data_arr_post);

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

	public function club_statement() {
		$data = [];
		$data['get_data'] = $this->db->query("SELECT * FROM club_coin WHERE club_id='{$this->club_id}' ORDER BY created_at DESC")->result();
		// dd($data);
		$this->load->view('club/club_statement', $data);
	}

}
