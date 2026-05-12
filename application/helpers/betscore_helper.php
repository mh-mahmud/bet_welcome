<?php
/**
 * @author   Mh Tusher
 */
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('menu_active_route')) {

    function menu_active_route($route_name)
    {
        $ci =& get_instance();
        $ci->load->helper('url');
        if($route_name == $ci->uri->segment(1)) {
            echo "active";
        }
    }
}

if (!function_exists('get_user_current_balance')) {

    function get_user_current_balance($user_id)
    {
        $CI =& get_instance();
        $CI->db->select('current_balance');
        $CI->db->from('my_coin');
        $CI->db->where('user_id', $user_id);
        $CI->db->order_by("id", "desc");
        $query = $CI->db->get();
        if(!empty($query->row())) {
            return $query->row()->current_balance;
        }
        return 0;
    }
}

if (!function_exists('get_user_club_ratio')) {

    function get_user_club_ratio($club_id)
    {
        $CI =& get_instance();
        $CI->db->select('club_ratio');
        $CI->db->from('club_users');
        $CI->db->where('id', $club_id);
        $query = $CI->db->get();
        if(!empty($query->row())) {
            return $query->row()->club_ratio;
        }
        return 0;
    }
}

if (!function_exists('get_club_balance')) {

    function get_club_balance($club_id)
    {
        $CI =& get_instance();
        $get_coin = 0;
        $post_coin = 0;
        $get_data = $CI->db->query("SELECT SUM(coin) AS get_coin FROM `club_coin` WHERE club_id='{$club_id}' AND method='GET'")->row();
        if( !empty($get_data->get_coin) ) {
            $get_coin = $get_data->get_coin;
        }

        $post_data = $CI->db->query("SELECT SUM(coin) AS post_coin FROM `club_coin` WHERE club_id='$club_id' AND method='POST'")->row();
        if( !empty($post_data->post_coin) ) {
            $post_coin = $post_data->post_coin;
        }

        $total_coin = $get_coin - $post_coin;
        if($total_coin < 0) {
            $total_coin = 0;
        }
        return $total_coin;
    }
}

if (!function_exists('get_user_fullname')) {

    function get_user_fullname($user_id)
    {
        $CI =& get_instance();
        $CI->db->select('name');
        $CI->db->from('users');
        $CI->db->where('id', $user_id);
        $query = $CI->db->get();
        if(!empty($query->row())) {
            return $query->row()->name;
        }
        return '';
    }
}

if (!function_exists('get_commission_earned')) {

    function get_commission_earned($user_id, $sponsor_username)
    {
        $CI =& get_instance();
        $get_coin = 0;
        $get_data = $CI->db->query("SELECT SUM(`coin`) AS tot_coin FROM my_coin WHERE coin_type='SPONSOR_COMMISSION' AND user_id='{$user_id}' AND sponsor_username='{$sponsor_username}'")->row();
        if( !empty($get_data->tot_coin) ) {
            $get_coin = $get_data->tot_coin;
        }
        return $get_coin;
    }
}