                        <div class="nav flex-column nav-pills col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                            <a class="nav-link  <?php menu_active_route('my_bets'); ?> rounded-0 border-right border-bottom border-left border-top" href="<?php echo base_url('my_bets'); ?>" aria-selected="true">My Bets</a>

                            <a class="nav-link <?php menu_active_route('view_profile'); ?> rounded-0 border-right border-bottom border-left border-top" href="<?php echo base_url('view_profile'); ?>" aria-selected="true">
                                Profile
                            </a>

                            <a href="javascript:void(0);" class="nav-link rounded-0 border-right border-bottom border-left" data-target="#requestDepositModal" data-toggle="modal">
                                Request Deposit
                            </a>

                            <a class="nav-link <?php menu_active_route('my_deposit'); ?> rounded-0 border-right border-bottom border-left border-top" href="<?php echo base_url('my_deposit'); ?>" aria-selected="true">My Deposit</a>

                            <a href="javascript:void(0);" class="nav-link rounded-0 border-right border-bottom border-left" data-target="#requestWithdrawModal" data-toggle="modal">
                                Request Withdraw
                            </a>

                            <a class="nav-link <?php menu_active_route('my_withdrawal'); ?> rounded-0 border-right border-bottom border-left border-top" href="<?php echo base_url('my_withdrawal'); ?>" aria-selected="true">My Withdrawal</a>

                            <a class="nav-link <?php menu_active_route('transaction_history'); ?> rounded-0 border-right border-bottom border-left border-top" href="<?php echo base_url('transaction_history'); ?>" aria-selected="true">Transaction History</a>

                            <a v-on:click="open_balance_transfer_modal" class="nav-link rounded-0 border-right border-bottom border-left" id="v-pills-balance-transfer-tab" role="tab" aria-controls="v-pills-balance-transfer" aria-selected="false" href="javascript:void(0);"  data-toggle="modal" data-target="#balance-transfer-modal">
                                Balance Transfer
                            </a>

                            <a class="nav-link <?php menu_active_route('my_complain'); ?> rounded-0 border-right border-bottom border-left" href="<?php echo base_url('my_complain'); ?>" aria-selected="false">
                                Complain
                            </a>

                        </div>