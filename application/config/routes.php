<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
// $route['default_controller'] = 'welcome';
$route['default_controller'] = 'frontcontroller';
$route['profile'] = 'frontcontroller/profile';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// $route['match_details/view/:any'] = 'frontcontroller/view_details';

// $route['remove_match/:any'] = 'frontcontroller/remove_match';

$route['register'] = 'frontcontroller/register';
$route['register-email'] = 'frontcontroller/register_by_email';
$route['register-phone'] = 'frontcontroller/register_by_phone';
$route['login'] = 'frontcontroller/login';
$route['logout'] = 'frontcontroller/logout';
$route['forgot-password'] = 'frontcontroller/forgot_password';
$route['reset-password'] = 'frontcontroller/reset_password';
$route['club-login'] = 'frontcontroller/club_login';

$route['statement'] = 'customeruser/statement';
$route['submit_complain'] = 'customeruser/submit_complain';
$route['update_club'] = 'customeruser/update_club';
$route['update_password'] = 'customeruser/update_password';
$route['update_profile'] = 'customeruser/update_profile';
$route['withdraw'] = 'customeruser/withdraw';
$route['withdraw_history'] = 'customeruser/withdraw_history';

$route['bet_history'] = 'customeruser/bet_history';
$route['complain_history'] = 'customeruser/complain_history';
$route['deposit_history'] = 'customeruser/deposit_history';
$route['make_deposit'] = 'customeruser/make_deposit';
$route['my_followers'] = 'customeruser/my_followers';
$route['coin_transfer'] = 'customeruser/coin_transfer';

// -- new routes for game7
$route['my_bets'] = 'customeruser/my_bets';
$route['user_multibets'] = 'customeruser/user_multibets';
$route['user_multibet_details/:any'] = 'customeruser/user_multibet_details';
$route['view_profile'] = 'customeruser/view_profile';
$route['my_deposit'] = 'customeruser/my_deposit';
$route['my_withdrawal'] = 'customeruser/my_withdrawal';
$route['cancel_withdraw/:any'] = 'customeruser/cancel_withdraw';
$route['transaction_history'] = 'customeruser/transaction_history';
$route['my_complain'] = 'customeruser/my_complain';
$route['submit_user_login'] = 'frontcontroller/submit_user_login';
$route['submit_user_deposit'] = 'customeruser/submit_user_deposit';
$route['submit_user_withdraw'] = 'customeruser/submit_user_withdraw';
$route['check_unique_username'] = 'frontcontroller/check_unique_username';
$route['check_user_password'] = 'customeruser/check_user_password';
$route['check_club_password'] = 'clubuser/check_club_password';
$route['change_user_password'] = 'customeruser/change_user_password';
$route['change_club_password'] = 'clubuser/change_club_password';
$route['get_sponsor_data'] = 'customeruser/get_sponsor_data';
$route['payment_account_search'] = 'customeruser/payment_account_search';

$route['club'] = 'frontcontroller/club_login';
$route['club_profile'] = 'clubuser/club_profile';
$route['user_bet_history'] = 'clubuser/user_bet_history';
$route['user_withdraw_history'] = 'clubuser/user_withdraw_history';
$route['balance-transfer-history'] = 'clubuser/balance_transfer_history';
$route['user_list'] = 'clubuser/user_list';
$route['club_withdraw_history'] = 'clubuser/club_withdraw_history';
$route['users_complain'] = 'clubuser/users_complain';
$route['submit_club_withdraw'] = 'clubuser/submit_club_withdraw';

// -- end new routes for game7

// -- Route for club users
$route['club_profile'] = 'clubuser/club_profile';
$route['club_profile_update'] = 'clubuser/club_profile_update';
$route['match_bit_coin'] = 'clubuser/match_bit_coin';
$route['match_bit_coin_history'] = 'clubuser/match_bit_coin_history';
$route['customer_withdraw'] = 'clubuser/customer_withdraw';
$route['user_balance_transfer'] = 'clubuser/user_balance_transfer';
$route['user_history'] = 'clubuser/user_history';
$route['club_withdraw'] = 'clubuser/club_withdraw';
$route['club-withdraw-history'] = 'clubuser/club_withdraw_history';
$route['customer_statement'] = 'clubuser/customer_statement';
$route['customer_complain'] = 'clubuser/customer_complain';
$route['club_statement'] = 'clubuser/club_statement';

// -- Ajax request
$route['get_registration_var_code'] = 'frontcontroller/get_registration_var_code';

// -- ajax form load
$route['upcoming'] = 'frontcontroller/upcoming';
$route['match/:any'] = 'frontcontroller/upcoming_match_details';
$route['live-match/:any'] = 'frontcontroller/live_match_details';

$route['show_all_bet'] = 'Betoption/show_all_bet';
$route['show_cricket_match_bet'] = 'Betoption/show_cricket_match_bet';
$route['show_football_match_bet'] = 'Betoption/show_football_match_bet';
$route['show_tennis_match_bet'] = 'Betoption/show_tennis_match_bet';


/*******************************************************************************

	Admin Routes

********************************************************************************/

$route['admin_logout'] = 'adminlogin/admin_logout';
$route['admin_login'] = 'welcome/admin_login';
$route['user_login_by_admin/:any'] = 'admin/user_login_by_admin';
$route['club_login_by_admin/:any'] = 'admin/club_login_by_admin';

$route['manage_sports'] = 'admin/manage_sports';
$route['match_details'] = 'admin/match_details';
$route['manage_questions/:any'] = 'admin/manage_questions';
$route['manage_answers/:any'] = 'admin/manage_answers';
$route['manage_questions_history/:any'] = 'admin/manage_questions_history';
$route['manage_bet_ratio'] = 'admin/manage_bet_ratio';
$route['winner_selection'] = 'admin/winner_selection';
$route['multibets_data'] = 'admin/multibets_data';
$route['match_details/view/:any'] = 'admin/view_details';
$route['create_match'] = 'admin/create_match';
$route['remove_match/:any'] = 'admin/remove_match';
$route['remove_deposit'] = 'admin/remove_deposit';
$route['reject_withdraw/:any'] = 'admin/reject_withdraw';
$route['matchbit_coin'] = 'admin/matchbit_coin';
$route['show_bet_list/:any'] = 'admin/show_bet_list';
$route['matchbit_coin_prev'] = 'admin/matchbit_coin_prev';
$route['edit_match_data'] = 'admin/edit_match_data';

$route['customer_deposit'] = 'admin/customer_deposit';
$route['show_deposit_data'] = 'admin/show_deposit_data';
$route['show_withdraw_data'] = 'admin/show_withdraw_data';
$route['approve_deposit'] = 'admin/approve_deposit';
$route['confirm_deposit/:any'] = 'admin/confirm_deposit';
$route['approve_withdraw'] = 'admin/approve_withdraw';
$route['approve_club_withdraw'] = 'admin/approve_club_withdraw';
$route['reply_complain'] = 'admin/reply_complain';
$route['remove_complain/:any'] = 'admin/remove_complain';
$route['customer_withdraw'] = 'admin/customer_withdraw';
$route['customer_complain'] = 'admin/customer_complain';
$route['customer_balance_transfer'] = 'admin/customer_balance_transfer';
$route['club_withdraw'] = 'admin/club_withdraw';

// history route
$route['match_history'] = 'admin/match_history';
$route['customer_deposit_history'] = 'admin/customer_deposit_history';
$route['match_bit_coin_history'] = 'admin/match_bit_coin_history';
$route['customer_withdraw_history'] = 'admin/customer_withdraw_history';
$route['club_withdraw_history'] = 'admin/club_withdraw_history';
$route['balance_transfer_history'] = 'admin/balance_transfer_history';
$route['complain_history'] = 'admin/complain_history';

$route['club_user'] = 'admin/club_user';
$route['admin_user'] = 'admin/admin_user';
$route['customer_user'] = 'admin/customer_user';
$route['manage_role'] = 'admin/manage_role';
$route['admin_logs'] = 'admin/admin_logs';
$route['notice-panel'] = 'admin/notice_panel';
$route['deposit_account'] = 'admin/deposit_account';

$route['bet_question'] = 'admin/bet_question';
$route['manage_league'] = 'admin/manage_league';

$route['match_bit_report'] = 'admin/match_bit_report';
$route['match_win_report'] = 'admin/match_win_report';
$route['match_failed_report'] = 'admin/match_failed_report';
$route['balance_report'] = 'admin/balance_report';
$route['withdraw_report'] = 'admin/withdraw_report';
$route['match_report'] = 'admin/match_report';
$route['user_match_report'] = 'admin/user_match_report';
$route['settings'] = 'admin/settings';
$route['datewise_report'] = 'admin/datewise_report';