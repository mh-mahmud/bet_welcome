            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->

                <div class="page-sidebar navbar-collapse collapse">

                    <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item <?php echo menu_active_route('admin'); ?>">
                            <a href="<?php echo base_url('admin'); ?>" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                            </a>
                            <!-- <ul class="sub-menu">
                                <li class="nav-item start active">
                                    <a href="<?php //echo base_url('admin'); ?>" class="nav-link ">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">Dashboard</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                            </ul> -->
                        </li>
                        <!-- <li class="heading">
                            <h3 class="uppercase">Features</h3>
                        </li> -->
                        <li class="nav-item <?php echo menu_top_route(['manage_sports', 'match_details', 'manage_bet_ratio', 'matchbit_coin', 'match_history', 'manage_questions']); ?> ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Match Options</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php echo menu_active_route('manage_sports'); ?>">
                                    <a href="<?php echo base_url('manage_sports'); ?>" class="nav-link ">
                                        <span class="title">Sports</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo menu_active_route('match_details'); ?>">
                                    <a href="<?php echo base_url('match_details'); ?>" class="nav-link ">
                                        <span class="title">Matches</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo menu_active_route('manage_bet_ratio'); ?>">
                                    <a href="<?php echo base_url('manage_bet_ratio'); ?>" class="nav-link ">
                                        <span class="title">Manage Bet Ratio</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo menu_active_route('matchbit_coin'); ?>">
                                    <a href="<?php echo base_url('matchbit_coin'); ?>" class="nav-link ">
                                        <span class="title">Match Bet</span>
                                    </a>
                                </li>
                                <!-- <li class="nav-item <?php //echo menu_active_route('match_history'); ?>">
                                    <a href="<?php //echo base_url('match_history'); ?>" class="nav-link ">
                                        <span class="title">Match History</span>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="nav-item <?php echo menu_top_route(['customer_deposit', 'customer_withdraw', 'customer_balance_transfer', 'customer_complain']); ?> ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Customer</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php echo menu_active_route('customer_deposit'); ?>">
                                    <a href="<?php echo base_url('customer_deposit'); ?>" class="nav-link ">
                                        <span class="title">Deposit</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo menu_active_route('customer_withdraw'); ?>">
                                    <a href="<?php echo base_url('customer_withdraw'); ?>" class="nav-link ">
                                        <span class="title">Withdraw</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo menu_active_route('customer_balance_transfer'); ?>">
                                    <a href="<?php echo base_url('customer_balance_transfer'); ?>" class="nav-link ">
                                        <span class="title">Balance Transfer</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo menu_active_route('customer_complain'); ?>">
                                    <a href="<?php echo base_url('customer_complain'); ?>" class="nav-link ">
                                        <span class="title">Complain</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?php echo menu_top_route(['settings', 'deposit_account', 'notice-panel', 'bet_question', 'manage_league']); ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">Admin Activities</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php echo menu_active_route('settings'); ?>">
                                    <a href="<?php echo base_url('settings'); ?>" class="nav-link ">
                                        <span class="title">Settings</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo menu_active_route('deposit_account'); ?>">
                                    <a href="<?php echo base_url('deposit_account'); ?>" class="nav-link ">
                                        <span class="title">Deposit Account</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo menu_active_route('notice-panel'); ?>">
                                    <a href="<?php echo base_url('notice-panel'); ?>" class="nav-link ">
                                        <span class="title">Notice Panel</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo menu_active_route('bet_question'); ?>">
                                    <a href="<?php echo base_url('bet_question'); ?>" class="nav-link ">
                                        <span class="title">Bet Question</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo menu_active_route('manage_league'); ?>">
                                    <a href="<?php echo base_url('manage_league'); ?>" class="nav-link ">
                                        <span class="title">Manage League</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?php echo menu_top_route(['club_user', 'club_withdraw', 'club_withdraw_history']); ?>">
                            <a href="?p=" class="nav-link nav-toggle">
                                <i class="icon-wallet"></i>
                                <span class="title">Club</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php echo menu_active_route('club_user'); ?>">
                                    <a href="<?php echo base_url('club_user'); ?>" class="nav-link ">
                                        <span class="title">Club User</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo menu_active_route('club_withdraw'); ?>">
                                    <a href="<?php echo base_url('club_withdraw'); ?>" class="nav-link ">
                                        <span class="title">Club Withdraw</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo menu_active_route('club_withdraw_history'); ?>">
                                    <a href="<?php echo base_url('club_withdraw_history'); ?>" class="nav-link ">
                                        <span class="title">Club Withdraw History</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?php echo menu_top_route(['customer_user', 'admin_user', 'manage_role']); ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-user"></i>
                                <span class="title">Users</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php echo menu_active_route('customer_user'); ?>">
                                    <a href="<?php echo base_url('customer_user'); ?>" class="nav-link ">
                                        <span class="title">Customers</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo menu_active_route('admin_user'); ?>">
                                    <a href="<?php echo base_url('admin_user'); ?>" class="nav-link ">
                                        <span class="title">Admin</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo menu_active_route('manage_role'); ?>">
                                    <a href="<?php echo base_url('manage_role'); ?>" class="nav-link ">
                                        <span class="title">Roles</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?php echo menu_top_route(['customer_deposit_history', 'match_bit_coin_history', 'customer_withdraw_history', 'balance_transfer_history', 'complain_history']); ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">Customer History</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php echo menu_active_route('customer_deposit_history'); ?>">
                                    <a href="<?php echo base_url('customer_deposit_history'); ?>" class="nav-link ">
                                        <span class="title">Deposit History</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo menu_active_route('match_bit_coin_history'); ?>">
                                    <a href="<?php echo base_url('match_bit_coin_history'); ?>" class="nav-link ">
                                        <span class="title">Match Bet History</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo menu_active_route('customer_withdraw_history'); ?>">
                                    <a href="<?php echo base_url('customer_withdraw_history'); ?>" class="nav-link ">
                                        <span class="title">Withdraw History</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo menu_active_route('balance_transfer_history'); ?>">
                                    <a href="<?php echo base_url('balance_transfer_history'); ?>" class="nav-link ">
                                        <span class="title">Transfer History</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo menu_active_route('complain_history'); ?>">
                                    <a href="<?php echo base_url('complain_history'); ?>" class="nav-link ">
                                        <span class="title">Complain History</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item <?php //echo menu_top_route(['report_1', 'report_2']); ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-bar-chart"></i>
                                <span class="title">Reports</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php //echo menu_active_route('report_1'); ?>">
                                    <a href="<?php //echo base_url('report_1'); ?>" class="nav-link ">
                                        <span class="title">Report 1</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php //echo menu_active_route('report_2'); ?>">
                                    <a href="<?php //echo base_url('report_2'); ?>" class="nav-link ">
                                        <span class="title">Report 2</span>
                                    </a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->