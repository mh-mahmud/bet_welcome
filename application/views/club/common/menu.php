                <div class="nav flex-column nav-pills col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <a class="nav-link <?php menu_active_route('club_profile'); ?> rounded-0 border-right border-bottom border-left border-top" href="<?php echo base_url('club_profile'); ?>" aria-selected="true">
                        Profile
                    </a>

                    <a class="nav-link <?php menu_active_route('user_bet_history'); ?> rounded-0 border-right border-bottom border-left" href="<?php echo base_url('user_bet_history'); ?>" aria-selected="false">
                        Member Bet History
                    </a>

                    <a class="nav-link <?php menu_active_route('user_withdraw_history'); ?> rounded-0 border-right border-bottom border-left" href="<?php echo base_url('user_withdraw_history'); ?>" aria-selected="false">
                        Member Withdraw
                    </a>

                    <a class="nav-link <?php menu_active_route('balance-transfer-history'); ?> rounded-0 border-right border-bottom border-left" href="<?php echo base_url('balance-transfer-history'); ?>" aria-selected="false">
                        Member Transfer History
                    </a>

                    <a class="nav-link <?php menu_active_route('user_list'); ?> rounded-0 border-right border-bottom border-left" href="<?php echo base_url('user_list'); ?>" aria-selected="false">
                        Member List
                    </a>

                    <a href="javascript:void(0);" class="nav-link rounded-0 border-right border-bottom border-left" data-target="#requestWithdrawModal" data-toggle="modal">
                        Request Withdraw
                    </a>

                    <a class="nav-link <?php menu_active_route('club-withdraw-history'); ?> rounded-0 border-right border-bottom border-left" href="<?php echo base_url('club-withdraw-history'); ?>" aria-selected="false">
                        Club Withdraw
                    </a>

                    <a class="nav-link <?php menu_active_route('users_complain'); ?> rounded-0 border-right border-bottom border-left" href="<?php echo base_url('users_complain'); ?>" aria-selected="false">
                        Member Complain
                    </a>

                    <a class="nav-link <?php menu_active_route('club_statement'); ?> rounded-0 border-right border-bottom border-left" href="<?php echo base_url('club_statement'); ?>" aria-selected="false">
                        Club Statement
                    </a>

                </div>