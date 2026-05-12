<?php include(APPPATH . "views/customer/common/header.php"); ?>

        <div id="wrapper-container">

                <!-- NEW -->
                <div class="justify-content-center p-0 container-fluid" id="content-container">
                <div id="userProfile">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 card pl-0 pr-0 rounded-0 clearfix">

        <div class="container">

            <div class="row">
                <!-- menu link here -->
                <?php include(APPPATH . "views/customer/common/menu.php"); ?>

                <div class="tab-content col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 p-0" id="v-pills-tabContent" v-cloak>

                    <!-- Profile Area -->
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>Full Name</th>
                                    <td>{{profile.user_name}}</td>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td>{{profile.username}}</td>
                                </tr>
                                <tr>
                                    <th>Mobile No.</th>
                                    <td>{{profile.user_mobile}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{profile.user_email}}</td>
                                </tr>
<!--                                <tr>
                                    <th>Referral Code</th>
                                    <td>{{profile.sponsor_code}}</td>
                                </tr>
                                <tr>
                                    <th>Referral URL</th>
                                    <td>{{profile.sponsor_url}}</td>
                                </tr>-->
                                <tr>
                                    <th>Referred By</th>
                                    <td>

                                        <v-select
                                            v-bind:class="(profileEditErrors.sponsor_id) ? 'is-invalid' : ''"
                                            ref="select"
                                            class="is-invalid"
                                            label="sponsor_title"
                                            v-model="sponsor"
                                            :options="sponsors"
                                            placeholder="Search Referrel"
                                            @search="get_sponsors"
                                            v-bind:disabled="disabledSubmit"
                                            >
                                        </v-select>
                                        <div v-if="profileEditErrors.sponsor_id" class="invalid-feedback">
                                            {{profileEditErrors.sponsor_id}}
                                        </div>

                                        <button @click="save_sponsor_and_club_confirmation_modal('sponsor', 'Do you really want to change sponsor?')" type="button" class="btn btn-dark mx-auto rounded-0 border-0 bg-yellow text-dark font-weight-bold mt-5">Change Sponsor</button>
                                        <!--<button @click="save_sponsor()" type="button" class="btn btn-dark mx-auto rounded-0 border-0 bg-yellow text-dark font-weight-bold mt-5">Change Sponsor</button>-->

                                    </td>
                                </tr>
                                <tr>
                                    <th>Club</th>
                                    <td>
                                        <v-select
                                            v-bind:class="(profileEditErrors.club_id) ? 'is-invalid' : ''"
                                            ref="select"
                                            class="is-invalid"
                                            label="club_title"
                                            v-model="club"
                                            :options="clubs"
                                            placeholder="Search Club"
                                            @search="get_clubs"
                                            v-bind:disabled="disabledSubmit"
                                            >
                                        </v-select>

                                        <div v-if="profileEditErrors.club_id" class="invalid-feedback">
                                            {{profileEditErrors.club_id}}
                                        </div>

                                        <button @click="save_sponsor_and_club_confirmation_modal('club', 'Do you really want to change club?')" type="button" class="btn btn-dark mx-auto rounded-0 border-0 bg-yellow text-dark font-weight-bold mt-5">Change Club</button>
                                        <!--<button @click="save_club()" type="button" class="btn btn-dark mx-auto rounded-0 border-0 bg-yellow text-dark font-weight-bold mt-5">Change Club</button>-->

                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <!-- Profile Area -->

                    <!-- Club History -->
                    <div class="tab-pane fade" id="v-pills-club-history" role="tabpanel" aria-labelledby="v-pills-club-history-tab">

                        <div v-if="clubHistoryErr != ''" class="alert alert-danger" role="alert" v-html="clubHistoryErr"></div>

                        <table v-if="clubHistoryErr == ''" class="table table-bordered  table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center">SN.</th>
                                    <th class="text-center">Date & Time</th>
                                    <th class="text-center">User ID</th>
                                    <th class="text-center">User name</th>
                                    <th class="text-center">Answer</th>
                                    <th class="text-center">Bet Rate</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Commission</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(ch, index) in clubHistory">
                                    <td class="text-center">{{index + 1}}</td>
                                    <td class="text-center no-warp">{{ch.created_at}}</td>
                                    <td class="text-center">{{ch.username}}</td>
                                    <td class="text-center">{{ch.name}}</td>
                                    <td class="text-center">{{ch.answer_title}}</td>
                                    <td class="text-center">{{ch.return_rate | round(2)}}</td>
                                    <td class="text-center">{{ch.bet_amount | round(2)}}</td>
                                    <td class="text-center">{{ch.commission_amount | round(2)}}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="6" class="text-right">Total</th>
                                    <th class="text-center">{{total_club_amounts.total_club_bet | round(2)}}</th>
                                    <th class="text-center">{{total_club_amounts.total_club_commission | round(2)}}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- Club History -->

                    <!-- Transaction History -->
                    <div class="tab-pane fade" id="v-pills-transaction-history" role="tabpanel" aria-labelledby="v-pills-transaction-history-tab">

                        <div v-if="trxnHistoryErr != ''" class="alert alert-danger" role="alert" v-html="trxnHistoryErr"></div>

                        <table v-if="trxnHistoryErr == ''" class="table table-bordered  table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center">SN.</th>
                                    <th class="text-center">Date & Time</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Notes</th>
                                    <th class="text-center">Debit (Out)</th>
                                    <th class="text-center">Credit (In)</th>
                                    <th class="text-center">Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(th, index) in transactionHistory">
                                    <td class="text-center">{{index + 1}}</td>
                                    <td class="text-center no-warp">{{th.created_at}}</td>
                                    <td class="text-center">{{th.description}}</td>
                                    <td class="text-center">{{th.notes}}</td>
                                    <td class="text-center">{{th.amount_out | round(2)}}</td>
                                    <td class="text-center">{{th.amount_in | round(2)}}</td>
                                    <td class="text-center">{{th.row_balance | round(2)}}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>

                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- Transaction History -->

                    <!-- Message History -->
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages">

                        <nav class="navbar navbar-light pl-0">
                            <div class="form-inline msg-btns">
                                <button v-on:click="get_user_inbox_messages(37167)" id="msg_inbox" class="btn btn-sm btn-outline-yellow bg-transparent bg-yellow text-white plr-15" type="button">Inbox</button>
                                <button v-on:click="get_user_sent_messages(37167)" id="msg_sent" class="btn btn-sm btn-outline-yellow bg-transparent ml-10 plr-15" type="button">Sent</button>
                                <button v-on:click="reply_message_modal()" id="msg_new" class="btn btn-sm btn-outline-yellow bg-transparent ml-10 plr-15" type="button">New Message</button>
                            </div>
                        </nav>

                        <div v-if="messagesErr != ''" class="alert alert-danger" role="alert" v-html="messagesErr"></div>

                        <table v-if="messagesErr == ''" class="table table-bordered  table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center">SN.</th>
                                    <th class="text-center">Date & Time</th>
                                    <th class="text-center">Message</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(m, index) in messages">
                                    <td class="text-center">{{index + 1}}</td>
                                    <td class="text-center no-warp">{{m.created_at}}</td>
                                    <td class="text-center">{{m.message}}</td>
                                    <td class="text-center">
                                        <button v-on:click="reply_message_modal(m.message_id)" id="msg_reply" class="btn btn-sm btn-outline-yellow bg-transparent ml-10 plr-15" type="button">Show</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>

                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- Message History -->

                    <!-- Reply Message Modal -->
                    <div class="modal fade" id="reply-message-modal" tabindex="-1" role="dialog" aria-labelledby="replyMessageModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content rounded-0">
                                <div class="modal-header bg-yellow rounded-0">
                                    <h5 class="modal-title text-dark" id="balanceTranferModalLabel">Messages</h5>
                                    <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form class="bg-dark-gray" v-on:submit="reply_message($event, 37167)">

                                    <div class="modal-body">

                                        <div v-if="replyMessageError != ''" class="alert alert-danger" role="alert" v-html="replyMessageError"></div>

                                        <div v-if="threadedMessages.length > 0" id="threaded_messages">
                                            <div class="container">

                                                <div v-for="(tm, index) in threadedMessages" class="row border-bottom"
                                                     v-bind:class="(tm.index > 0) ? 'mt-10' : ''"
                                                     >
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  v-if="(tm.from_id == 37167) || tm.from_id == 0"
                                                         v-bind:class="(tm.from_id == 37167) ? 'text-right' : ''"
                                                         >
                                                        <label v-bind:class="(tm.from_id == 37167) ? 'float_right' : 'float_left'">
                                                            <strong v-text="(tm.from_id == 37167) ? 'Me' : 'Admin'"></strong>
                                                        </label>
                                                        <p class="alert width_50 text-white clear"
                                                           v-bind:class="(tm.from_id == 37167) ? 'bg-green float_right' : 'bg-orange float_left'"
                                                           v-text="tm.message"
                                                           ></p>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <label for="message_frm_message" class="col-form-label">Message:</label>
                                            <textarea type="number" class="form-control" id="message_frm_message" v-model="message_frm.message" placholder="Message" required="required"></textarea>
                                        </div>

                                    </div>

                                    <div class="modal-footer rounded-0">
                                        <button v-bind:disabled="disabledSubmit" type="submit" class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-yellow text-dark font-weight-bold position-relative">
                                            Send
                                            <div class="loading-spinner login-spinner-wrapper display_none"></div>
                                        </button>
                                    </div>


                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- Reply Message Modal -->

                </div>

            </div>

        </div>

    </div>

    <!-- save_sponsor_and_club_confirmation_modal -->
    <div class="modal fade" id="save_sponsor_and_club_confirmation_modal" tabindex="-1" role="dialog" aria-labelledby="save_sponsor_and_club_confirmation_modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content rounded-0">
                <div class="modal-header bg-dark rounded-0">
                    <h5 class="modal-title text-white" id="save_sponsor_and_club_confirmation_modal_label">{{club_or_sponsor_modal_label}}</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form v-on:submit.prevent="save_sponsor_and_club_info(37167)">

                    <div class="modal-body">

                        <div v-if="Object.keys(profileEditErrors).length > 0" class="alert alert-danger" role="alert" v-html="profileEditErrors"></div>
                        <!--<div v-if="responseClubSponsorUpdateMsg != ''" class="alert alert-success" role="alert" v-html="responseClubSponsorUpdateMsg"></div>-->

                        <div class="form-group">
                            <label for="user-profile-password" class="col-form-label">Confirm With Password:</label>
                            <input type="password" class="form-control" id="user-profile-password" v-model="profile.cnf_password" placholder="Confirm With Password" minlength="6" required="required">
                        </div>

                    </div>

                    <div class="modal-footer rounded-0">
                        <button v-bind:disabled="disabledSubmit" type="submit" class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-yellow text-dark font-weight-bold capitalize position-relative">
                            Change {{club_or_sponsor_save_method}}
                            <div class="loading-spinner login-spinner-wrapper display_none"></div>
                        </button>
                    </div>


                </form>

            </div>
        </div>
    </div>
    <!-- save_sponsor_and_club_confirmation_modal -->

</div>
            </div>
        </div>

<!-- footer -->
<?php include(APPPATH . "views/footer.php"); ?>