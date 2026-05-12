<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Betoption extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('date');
    }

    // -- new function
    public function show_all_bet() {
        $data = [];
        $get_data = $this->db->query("SELECT * FROM matchname WHERE active_status IN(2, 3) ORDER BY starting_time")->result();
        foreach($get_data as $val) {
            if($val->active_status==2) {
                $this->match_time_live($val->starting_time, $val->ending_time, $val->id);
                $data['live'][] = $val;
            }
            else if($val->active_status==3) {
                $this->match_time_upcoming($val->starting_time, $val->id);
                $data['upcoming'][] = $val;
            }
        }
        $this->load->view('show_all_bet', $data);
    }

    public function show_cricket_match_bet() {
        $data = [];
        $get_data = $this->db->query("SELECT * FROM matchname WHERE active_status IN(2, 3) AND sportscategory_id='2' ORDER BY starting_time")->result();
        foreach($get_data as $val) {
            if($val->active_status==2) {
                $this->match_time_live($val->starting_time, $val->ending_time, $val->id);
                $data['live'][] = $val;
            }
            else if($val->active_status==3) {
                $this->match_time_upcoming($val->starting_time, $val->id);
                $data['upcoming'][] = $val;
            }
        }
        $this->load->view('show_cricket_match_bet', $data);
    }

    public function show_football_match_bet() {
        $data = [];
        $get_data = $this->db->query("SELECT * FROM matchname WHERE active_status IN(2, 3) AND sportscategory_id='6' ORDER BY starting_time")->result();
        foreach($get_data as $val) {
            if($val->active_status==2) {

                $this->match_time_live($val->starting_time, $val->ending_time, $val->id);

                $data['live'][] = $val;
            }
            else if($val->active_status==3) {
                $this->match_time_upcoming($val->starting_time, $val->id);
                
                $data['upcoming'][] = $val;
            }
        }
        $this->load->view('show_football_match_bet', $data);
    }
    
    private function match_time_live($starting_time, $ending_time, $id) {
        $current_time = time();
        $game_time = strtotime($starting_time);
        $diff = ($game_time - $current_time) / 60;
        /*if($diff<=1 && $diff > -1) {
            $this->db->query("UPDATE matchname SET active_status=6 WHERE id='{$id}' LIMIT 1");
        }*/

        // -- code for ending time
        $end_time = strtotime($ending_time);
        if($current_time > $end_time) {
            $this->db->query("UPDATE matchname SET active_status=6 WHERE id='{$id}' LIMIT 1");
        }
    }
    
    private function match_time_upcoming($starting_time, $id) {
        $current_time = time();
        $game_time = strtotime($starting_time);
        $diff = ($game_time - $current_time) / 60;
        if($diff<60) {
            $this->db->query("UPDATE matchname SET active_status=2 WHERE id='{$id}' LIMIT 1");
        }
    }

    public function show_tennis_match_bet() {
        $data = [];
        $get_data = $this->db->query("SELECT * FROM matchname WHERE active_status IN(2, 3) AND sportscategory_id='13' ORDER BY starting_time")->result();
        foreach($get_data as $val) {
            if($val->active_status==2) {
                $this->match_time_live($val->starting_time, $val->ending_time, $val->id);
                $data['live'][] = $val;
            }
            else if($val->active_status==3) {
                $this->match_time_upcoming($val->starting_time, $val->id);
                $data['upcoming'][] = $val;
            }
        }
        $this->load->view('show_tennis_match_bet', $data);
    }

}