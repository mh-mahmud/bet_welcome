                <div class="nav flex-column nav-pills col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <a class="nav-link <?php menu_active_route('view_profile'); ?> rounded-0 border-right border-bottom border-left border-top" href="<?php echo base_url('view_profile'); ?>">
                        Profile
                    </a>

                    <a class="nav-link <?php menu_active_route('my_bets'); ?> rounded-0 border-right border-bottom border-left" href="<?php echo base_url('my_bets'); ?>">
                        My Bets
                    </a>

                    <a style="color:red" class="nav-link <?php menu_active_route('user_multibets'); ?> rounded-0 border-right border-bottom border-left" href="<?php echo base_url('user_multibets'); ?>">
                        Multibets
                    </a>

                    <a href="javascript:void(0);" class="nav-link rounded-0 border-right border-bottom border-left" data-target="#requestDepositModal" data-toggle="modal">
                        Request Deposit
                    </a>

                    <a class="nav-link <?php menu_active_route('my_deposit'); ?> rounded-0 border-right border-bottom border-left" href="<?php echo base_url('my_deposit'); ?>">
                        My Deposit
                    </a>

                    <a href="javascript:void(0);" class="nav-link rounded-0 border-right border-bottom border-left" data-target="#requestWithdrawModal" data-toggle="modal">
                        Request Withdraw
                    </a>

                    <a class="nav-link <?php menu_active_route('my_withdrawal'); ?> rounded-0 border-right border-bottom border-left" href="<?php echo base_url('my_withdrawal'); ?>">
                        My Withdrawal
                    </a>

                    <a class="nav-link <?php menu_active_route('transaction_history'); ?> rounded-0 border-right border-bottom border-left" href="<?php echo base_url('transaction_history'); ?>">
                        Transactions
                    </a>

                    <a class="nav-link rounded-0 border-right border-bottom border-left" href="javascript:void(0);" aria-selected="false" data-toggle="modal" data-target="#change-password-modal">
                        Change Password
                    </a>

                    <a class="nav-link rounded-0 border-right border-bottom border-left" href="javascript:void(0);" aria-selected="false" data-toggle="modal" data-target="#balance-transfer-modal">
                        Balance Transfer
                    </a>
                    
                    <a class="nav-link <?php menu_active_route('my_complain'); ?> rounded-0 border-right border-bottom border-left" href="<?php echo base_url('my_complain'); ?>">
                        Complain <span style="color:red;font-weight:bold">(<?php echo $notifications; ?>)</span>
                    </a>

                </div>