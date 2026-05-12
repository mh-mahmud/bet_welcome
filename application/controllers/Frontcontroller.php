<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontcontroller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('betscore');
	}

	public function register() {
		$data = [];

		if( !empty($_POST) ) {

			$club_id = $this->input->post('reg_club');
			$full_name = $this->input->post('full_name');
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$mobile = $this->input->post('mobile');
			$country = $this->input->post('country');
			$password = $this->input->post('reg_password');
			$reg_sponsor_id = $this->input->post('reg_sponsor_id');

	        $data_arr = array(
				'name'			=> $full_name,
				'username'	=> $username,
				'email'			=> $email,
				'phone'			=> $mobile,
				'country'		=> $country,
				'sponsor_name'	=> $reg_sponsor_id,
				'club_id'		=> $club_id,
				'password'		=> md5($password),
				'created_at'	=> date("Y-m-d H:i:s")
	        );
	        $this->db->insert('users', $data_arr);
	        $insert_id = $this->db->insert_id();

			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('id', $insert_id);
			$query = $this->db->get();
			$result = $query->row();

			$this->session->set_userdata('cus_data', $result);

			$this->session->set_flashdata('msg', 'Registration successfully done');
			redirect('/');

		}
		else {
			$this->session->set_flashdata('error', 'Registration not done yet');
			redirect('/');
		}
	}

	public function get_registration_var_code() {
		$verified_by = $_POST['verified_by'];
		$user_data = $_POST['user_data'];
		$data = [];

		$token = mt_rand(100000, 999999);
		if($verified_by == 'phone') {
			// -- check dublicacy
			$chk_data = $this->db->query("SELECT * FROM users WHERE phone='{$user_data}'")->row();
			if(!empty($chk_data)) {
				$data['success'] = 0;
				$data['message'] = "This phone number already in used";
				echo json_encode($data);
				return false;
			}
			// -- send sms
		}
		else if($verified_by == 'email') {
			// -- send email
			$chk_data = $this->db->query("SELECT * FROM users WHERE email='{$user_data}'")->row();
			if(!empty($chk_data)) {
				$data['success'] = 0;
				$data['message'] = "This email address already in used";
				echo json_encode($data);
				return false;
			}
		}
		else {
			$data['success'] = 0;
			$data['message'] = "Invalid data provided";
			echo json_encode($data);
			return false;
		}
		$this->session->set_userdata('verification_data', $token);
		$data['success'] = 1;
		$data['token'] = $token;
		$data['message'] = "Verification code send to your " . $verified_by;
		echo json_encode($data);
	}

	public function register_by_email() {
		$this->load->view('register_email');
	}

	public function register_by_phone() {
		$this->load->view('register_phone');
	}

	public function submit_user_login() {
		$data = [];

		if( $this->input->post('username') && $this->input->post('password') ) {

			$data = [];
			$data['error'] = 0;
			$data['error_msg'] = "";
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('username', $username);
			$this->db->where('password', md5($password));
			$this->db->where('status', 1);
			$query = $this->db->get();
			$result = $query->row();

			if(!empty($result) && isset($result)) {

				$this->session->set_userdata('cus_data', $result);
				$data['success_msg'] = "Login success!";
				echo json_encode($data);
				exit();

			}
			else {
				$data['error'] = 1;
				$data['error_msg'] = "Incorrect username and password";
				echo json_encode($data);
				exit();
			}

		}
	}

	public function check_unique_username() {

        if ( isset($_POST['username']) && $_POST['username'] != '' ) {
            $username = trim($_POST['username']);
            $username_error = "";

            $user_data = $this->db->query("SELECT * FROM users WHERE username='{$username}'")->row();

            if (empty($user_data)) {
                echo '0';
            } else {
                echo '1';
            }
        }

	}

	public function forgot_password() {
		$this->load->view('forgot_password');
	}

	public function reset_password() {
		$this->load->view('reset_password');
	}

	public function club_login() {

		if( !empty($this->session->userdata('club_user_data')) || !empty($this->session->userdata('cus_data')) ) {
			redirect('/');
		}

		$data = [];

		if( $this->input->post('submit') ) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->db->select('*');
			$this->db->from('club_users');
			$this->db->where('username', $username);
			$this->db->where('password', md5($password));
			$this->db->where('status', 1);
			$query = $this->db->get();
			$result = $query->row();

			if(!empty($result) && isset($result)) {

				if(!empty($result)) {
				     $this->session->set_userdata('club_user_data', $result);
				     redirect('/club_profile');
				     return false;
				}
				else {
				     $this->session->set_flashdata('error', 'Incorrect Crediantials');
				     redirect('club');
				}

			}
			else {
			     $this->session->set_flashdata('error', 'Invalid login data');
			     redirect('club');
			}

		}

		$this->load->view('club_login');
	}

	public function index() {
		$data = [];
		$data['get_data'] = $this->db->query("SELECT * FROM matchname WHERE active_status=1 AND status=1 ORDER BY id DESC")->result();
		$data['get_data2'] = $this->db->query("SELECT * FROM matchname WHERE active_status=2 AND status=1 ORDER BY id DESC")->result();
		$data['get_data3'] = $this->db->query("SELECT * FROM matchname WHERE active_status=3 AND status=1 ORDER BY id DESC")->result();
		$data['clubs'] = $this->db->query("SELECT * FROM club_users WHERE status=1")->result();

		// dd($data);
		$this->load->view('index', $data);
	}

	public function profile() {
		$this->load->view('profile');
	}

	public function upcoming() {
		$data = [];
		$get_count = $this->db->query("SELECT advanced_bet FROM sportscategory WHERE id IN(2,3,5,6,7,8,11,12)")->result();
		$data['football_count'] = $get_count[0]->advanced_bet;
		$data['cricket_count'] = $get_count[1]->advanced_bet;
		$data['backetball_count'] = $get_count[2]->advanced_bet;
		$data['volleyball_count'] = $get_count[3]->advanced_bet;
		$data['badminton_count'] = $get_count[4]->advanced_bet;
		$data['tennis_count'] = $get_count[5]->advanced_bet;
		$data['rugby_count'] = $get_count[6]->advanced_bet;
		$data['amfootball_count'] = $get_count[7]->advanced_bet;
		$data['all_count'] = array_sum($data);
		// -- other data var define must below

		$this->load->view('upcoming', $data);
	}

	public function upcoming_match_details() {
		$id = $this->uri->segment(2);
		$data = [];
		$data['get_data'] = $this->db->query("SELECT * FROM matchname WHERE id='{$id}'")->row();
		$this->load->view('upcoming_match_details', $data);
	}

	public function live_match_details() {
		$id = $this->uri->segment(2);
		$data = [];
		$data['get_data'] = $this->db->query("SELECT * FROM matchname WHERE id='{$id}'")->row();
		$this->load->view('live_match_details', $data);
	}

	public function logout() {
		$this->session->sess_destroy();
		$this->session->set_flashdata('msg', 'Logged Out Successfully');
		redirect( '/' );
	}

	// -- bet submission code data
	public function check_init_bet() {
		$data = [];
		$option_details_id = $_POST['option_details_id'];
		$coin_rate = $_POST['coin_rate'];
		$min_bet = 20;
		$min_bet_amount = $coin_rate*$min_bet;

		$data['error'] = 0;
		$data['error_msg'] = "";

		if(!$this->session->userdata('cus_data')) {
			$data['error'] = 1;
			$data['error_msg'] = "You are not logged in. Please login to continue";
			echo json_encode($data);
			exit();
		}

		// -- check user balance data
		/*$user_id = $this->session->userdata('cus_data')->id;
		$user_balance = get_user_current_balance($user_id);
		if($user_balance < $min_bet_amount) {
			$data['error'] = 2;
			$data['error_msg'] = "Insufficient balance. Please deposit first";
			echo json_encode($data);
			exit();
		}*/

		$row_data = $this->db->query("SELECT mopd.*, mp.match_option_title, m.league_title, m.title, m.sportscategory_id, m.active_status FROM match_option_details AS mopd INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id WHERE mopd.id='{$option_details_id}'")->row();

		if(empty($row_data)) {
			$data['error'] = 3;
			$data['error_msg'] = "Invalid data source";
			echo json_encode($data);
			exit();
		}
		$data['get_data'] = $row_data;

		$view_data = $this->load->view('modal_data', $data, true);
		$new_data = [];
		$new_data['error'] = 0;
		$new_data['get_data'] = $view_data;
		$new_data['error_msg'] = "";
		echo json_encode($new_data);
	}

	public function check_init_multibet() {
		$data = [];
		$option_details_id = $_POST['option_details_id'];
		$option_string = implode(",", $option_details_id);
		$data['option_string'] = $option_string;
		$min_bet = 20;
		$min_bet_amount = 100;

		$data['error'] = 0;
		$data['error_msg'] = "";

		if(!$this->session->userdata('cus_data')) {
			$data['error'] = 1;
			$data['error_msg'] = "You are not logged in. Please login to continue";
			echo json_encode($data);
			exit();
		}

		$row_data = $this->db->query("SELECT mopd.*, mp.match_option_title, m.league_title, m.title, m.sportscategory_id, m.active_status FROM match_option_details AS mopd INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id WHERE mopd.id IN({$option_string})")->result();

		if(empty($row_data)) {
			$data['error'] = 3;
			$data['error_msg'] = "Invalid data source";
			echo json_encode($data);
			exit();
		}
		$data['get_data'] = $row_data;

		$view_data = $this->load->view('multibet_data', $data, true);
		$new_data = [];
		$new_data['error'] = 0;
		$new_data['get_data'] = $view_data;
		$new_data['error_msg'] = "";
		echo json_encode($new_data);
	}

	public function check_dublicate_match() {
		$matches = [];
		$all_ids = [];
		$option_detail_ids = $this->input->post('option_detail_ids');
		// $last_id = $this->input->post('last_id');
		// dd($option_details_id);

		$option_string = implode(",", $option_detail_ids);
		if(count($option_detail_ids)==1) {
			return;
		}
		$all_data = $this->db->query("SELECT match_id FROM match_option_details WHERE id IN({$option_string})")->result();
		foreach($all_data as $val) {
			$matches[] = $val->match_id;
		}

		if(count(array_unique($matches))<count($matches)) {
			$new_data = [];
			$new_data['error'] = 2;
			$new_data['get_data'] = "";
			$new_data['error_msg'] = "Duplicate found";
			echo json_encode($new_data);
		}
		else {
			$new_data = [];
			$new_data['error'] = 0;
			$new_data['get_data'] = "All unique";
			$new_data['error_msg'] = "";
			echo json_encode($new_data);
		}

	}

}