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

if (!function_exists('menu_top_route')) {

    function menu_top_route($route_arr)
    {
        $ci =& get_instance();
        $ci->load->helper('url');
        if( in_array($ci->uri->segment(1), $route_arr) ) {
            echo "active";
        }
    }
}

if (!function_exists('admin_access_route')) {

    function admin_access_route($route_arr)
    {
        $ci =& get_instance();
        $ci->load->helper('url');
        if( !in_array($ci->uri->segment(1), $route_arr) ) {
            return redirect('/admin');
        }
    }
}

if (!function_exists('admin_access_menu')) {

    function admin_access_menu($route_string, $route_name)
    {
        if($route_string=='super_admin') {
            return true;
        }
        $route_str = explode(",", $route_string);

        $ci =& get_instance();
        $ci->load->helper('url');
        if( in_array($route_name, $route_str) ) {
            return true;
        }
    }
}

if (!function_exists('get_club_name')) {

    function get_club_name($id)
    {
        $CI =& get_instance();
        $CI->db->select('club_name');
        $CI->db->from('club_users');
        $CI->db->where('id', $id);
        $query = $CI->db->get();
        if(!empty($query->row())) {
        	return $query->row()->club_name;
        }
        return '';
    }
}

if (!function_exists('get_user_name')) {

    function get_user_name($id)
    {
        $CI =& get_instance();
        $CI->db->select('name');
        $CI->db->from('users');
        $CI->db->where('id', $id);
        $query = $CI->db->get();
        if(!empty($query->row())) {
            return $query->row()->name;
        }
        return '';
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