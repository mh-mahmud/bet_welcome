            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->

                <div class="page-sidebar navbar-collapse collapse">
                    <?php $x_data = $this->session->userdata('admin_access_data'); ?>

                    <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

                        <li class="nav-item" style="background-color:#4c5766;margin-bottom:10px;">
                            <a style="color:#FFF;" href="<?php echo base_url('/'); ?>" class="nav-link nav-toggle">
                                <span class="title" style="font-size:13px"><b>Go To Site</b></span>
                            </a>
                        </li>

                        <li class="nav-item <?php echo menu_active_route('admin'); ?>">
                            <a href="<?php echo base_url('admin'); ?>" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>

                        <!--  -->

                        <li class="nav-item <?php echo menu_top_route(['customer_user', 'club_user', 'club_withdraw', 'club_withdraw_history']); ?>">
                            <a href="?p=" class="nav-link nav-toggle">
                                <i class="icon-user"></i>
                                <span class="title">Users</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">

                                <?php if( admin_access_menu($x_data->role_data, 'customer_user') ) : ?>
                                    <li class="nav-item <?php echo menu_active_route('customer_user'); ?>">
                                        <a href="<?php echo base_url('customer_user'); ?>" class="nav-link nav-toggle">
                                            <!-- <i class="icon-user"></i> -->
                                            <span class="title">User</span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if( admin_access_menu($x_data->role_data, 'club_user') ) : ?>
                                    <li class="nav-item <?php echo menu_active_route('club_user'); ?>">
                                        <a href="<?php echo base_url('club_user'); ?>" class="nav-link ">
                                            <span class="title">Clubs</span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if( admin_access_menu($x_data->role_data, 'club_withdraw') ) : ?>
                                    <li class="nav-item <?php echo menu_active_route('club_withdraw'); ?>">
                                        <a href="<?php echo base_url('club_withdraw'); ?>" class="nav-link ">
                                            <span class="title">Club Withdraw</span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if( admin_access_menu($x_data->role_data, 'club_withdraw_history') ) : ?>
                                    <li class="nav-item <?php echo menu_active_route('club_withdraw_history'); ?>">
                                        <a href="<?php echo base_url('club_withdraw_history'); ?>" class="nav-link ">
                                            <span class="title">Club Withdraw History</span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                            </ul>
                        </li>

                        <li class="nav-item <?php echo menu_top_route(['match_details', 'manage_bet_ratio', 'winner_selection', 'multibets_data']); ?>">
                            <a href="?p=" class="nav-link nav-toggle">
                                <i class="icon-social-dribbble"></i>
                                <span class="title">Sports</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">

                                <?php if( admin_access_menu($x_data->role_data, 'match_details') ) : ?>
                                    <li class="nav-item <?php echo menu_active_route('match_details'); ?>">
                                        <a href="<?php echo base_url('match_details'); ?>" class="nav-link nav-toggle">
                                            <i class="icon-social-dribbble"></i>
                                            <span class="title">Matches</span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if( admin_access_menu($x_data->role_data, 'manage_bet_ratio') ) : ?>
                                    <li class="nav-item <?php echo menu_active_route('manage_bet_ratio'); ?>">
                                        <a href="<?php echo base_url('manage_bet_ratio'); ?>" class="nav-link nav-toggle">
                                            <i class="icon-tag"></i>
                                            <span class="title">Manage Bet Ratio</span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if( admin_access_menu($x_data->role_data, 'winner_selection') ) : ?>
                                    <li class="nav-item <?php echo menu_active_route('winner_selection'); ?>">
                                        <a href="<?php echo base_url('winner_selection'); ?>" class="nav-link nav-toggle">
                                            <i class="icon-diamond"></i>
                                            <span class="title">Winner Selection</span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if( admin_access_menu($x_data->role_data, 'multibets_data') ) : ?>
                                    <li class="nav-item <?php echo menu_active_route('multibets_data'); ?>">
                                        <a href="<?php echo base_url('multibets_data'); ?>" class="nav-link nav-toggle">
                                            <i class="icon-folder"></i>
                                            <span class="title">Multi Bet List</span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                            </ul>
                        </li>

                        <li class="nav-item <?php echo menu_top_route(['customer_complain']); ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">Message</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <?php if( admin_access_menu($x_data->role_data, 'customer_complain') ) : ?>
                                    <li class="nav-item <?php echo menu_active_route('customer_complain'); ?>">
                                        <a href="<?php echo base_url('customer_complain'); ?>" class="nav-link nav-toggle">
                                            <i class="icon-bulb"></i>
                                            <span class="title">Complain</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>

                        <li class="nav-item <?php echo menu_top_route(['customer_deposit_history', 'match_bit_coin_history', 'customer_withdraw_history', 'balance_transfer_history', 'complain_history', 'match_history']); ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">Statistics</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">

                                <?php if( admin_access_menu($x_data->role_data, 'customer_deposit') ) : ?>
                                    <li class="nav-item <?php echo menu_active_route('customer_deposit'); ?>">
                                        <a href="<?php echo base_url('customer_deposit'); ?>" class="nav-link nav-toggle">
                                            <i class="icon-wallet"></i>
                                            <span class="title">Deposit</span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if( admin_access_menu($x_data->role_data, 'matchbit_coin') ) : ?>
                                    <li class="nav-item <?php echo menu_active_route('matchbit_coin'); ?>">
                                        <a href="<?php echo base_url('matchbit_coin'); ?>" class="nav-link nav-toggle">
                                            <i class="icon-basket"></i>
                                            <span class="title">Betting Statistics</span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                            </ul>
                        </li>

                        <li class="nav-item <?php echo menu_top_route(['notice-panel']); ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">Manage Site</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php echo menu_active_route('notice-panel'); ?>">
                                    <a href="<?php echo base_url('notice-panel'); ?>" class="nav-link ">
                                        <span class="title">News</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!--  -->



                        <?php if($this->session->userdata('admin_access_data')->role_data=='super_admin') : ?>
                            <li class="nav-item <?php echo menu_top_route(['settings', 'notice-panel', 'bet_question', 'manage_league', 'admin_user', 'manage_role', 'customer_withdraw', 'deposit_account', 'datewise_report', 'customer_balance_transfer']); ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-settings"></i>
                                    <span class="title">Admin Activities</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <!-- <li class="nav-item <?php //echo menu_active_route('settings'); ?>">
                                        <a href="<?php //echo base_url('settings'); ?>" class="nav-link ">
                                            <span class="title">Settings</span>
                                        </a>
                                    </li> -->

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

                                    <?php if( admin_access_menu($x_data->role_data, 'customer_withdraw') ) : ?>
                                        <li class="nav-item <?php echo menu_active_route('customer_withdraw'); ?>">
                                            <a href="<?php echo base_url('customer_withdraw'); ?>" class="nav-link nav-toggle">
                                                <i class="icon-puzzle"></i>
                                                <span class="title">Withdraw</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>



                                    <?php if( admin_access_menu($x_data->role_data, 'deposit_account') ) : ?>
                                        <li class="nav-item <?php echo menu_active_route('deposit_account'); ?>">
                                            <a href="<?php echo base_url('deposit_account'); ?>" class="nav-link nav-toggle">
                                                <i class="icon-briefcase"></i>
                                                <span class="title">Deposit Number</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if( admin_access_menu($x_data->role_data, 'datewise_report') ) : ?>
                                        <li class="nav-item <?php echo menu_active_route('datewise_report'); ?>">
                                            <a href="<?php echo base_url('datewise_report'); ?>" class="nav-link nav-toggle">
                                                <i class="icon-bar-chart"></i>
                                                <span class="title">Datewise Report</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if( admin_access_menu($x_data->role_data, 'customer_balance_transfer') ) : ?>
                                        <li class="nav-item <?php echo menu_active_route('customer_balance_transfer'); ?>">
                                            <a href="<?php echo base_url('customer_balance_transfer'); ?>" class="nav-link nav-toggle">
                                                <i class="icon-feed"></i>
                                                <span class="title">Balance Transfer</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                </ul>
                            </li>
                        <?php endif; ?>

                        <!-- <li class="nav-item <?php //echo menu_active_route('financial_report'); ?>">
                            <a href="<?php //echo base_url('financial_report'); ?>" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Financial Report</span>
                            </a>
                        </li> -->

                        
                        <?php if($this->session->userdata('admin_access_data')->role_data=='super_admin') : ?>
                            
                            <li class="nav-item <?php echo menu_top_route(['customer_deposit_history', 'match_bit_coin_history', 'customer_withdraw_history', 'balance_transfer_history', 'complain_history', 'match_history']); ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-layers"></i>
                                    <span class="title">History</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item <?php echo menu_active_route('match_history'); ?>">
                                        <a href="<?php echo base_url('match_history'); ?>" class="nav-link ">
                                            <span class="title">Match History</span>
                                        </a>
                                    </li>
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
                        <?php endif; ?>
                        
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->