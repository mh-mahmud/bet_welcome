<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Bet Welcome</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/daterangepicker.css" />

    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/style.css">
     <link href="<?= base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
    <!--    Theme Specific CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/betwin69.css">

    <link rel="shortcut icon" type="image/png" href="https://betwin69.com/images/betwin69favicon.png" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="none, noindex, noarchive, nofollow, nosnippet, notranslate, noimageindex" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

    <body class="bg-black">

    <!-- NEW -->
    <div id="loginRegister" class="row mr-auto justify-content-center">
        <nav class="navbar navbar-expand-md navbar-light col-xl-10 pr-0">

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#topNavbar" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand hm-HeaderModule_Logo" href="<?= base_url(); ?>"><img src="<?= base_url(); ?>assets/images/new-logo.png" alt="Logo" class="responsive"></a>

            <div class="navbar-collapse collapse bg-black" id="topNavbar">

                <ul class="navbar-nav mr-auto"></ul>
                <!-- Guest Menu -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#registrationModal">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
                    </li>
                </ul>
                <!-- Guest Menu -->
                                    

                <!-- User Menu -->
                <!-- User Menu -->
            </div>
            
            
            
            <!-- <a id="multi_bet_stack_count" href="javascript:void(0);" class="nav-link" style="display:inline !important; background: yellow;">
                <span data-badge="6" class="badge-notification mt-5">Bet Slip</span>
            </a> -->
        </nav>

        <div class="header-buttons">
            <a data-toggle="modal" data-target="#registrationModal" class="btn register bonus-waiting" href="#">
                <span class=""><strong>Register now!</strong></span>
            </a>

            <a data-toggle="modal" data-target="#loginModal" class="btn login" href="#">
                <strong>Log In</strong>
            </a>
        </div>

        <!-- Registration Modal -->
        <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content rounded-0">
                    <div class="modal-header bg-dark rounded-0">
                        <h5 class="modal-title text-white" id="registrationModalLabel">Register</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="signupForm" method="POST" action="register">

                        <div class="modal-body">
                            <div class="form-row">
                                <div class="col-md-6 mb-5">
                                    <label for="user-reg-name" class="col-form-label">Full Name <span class="text-danger">* </span>:</label>
                                    <input type="text" class="form-control" name="full_name" id="full_name">
                                </div>

                                <div class="col-md-6 mb-5">
                                    <label for="user-reg-username" class="col-form-label">Username <span class="text-danger">* </span>:</label>
                                    <input type="text" name="username" id="username" class="form-control" id="">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-5">
                                    <label for="user-reg-email" class="col-form-label">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                    <small id="emailHelp" class="form-text text-muted">
                                        Email Format: username@example.com
                                    </small>
                                </div>

                                <div class="col-md-6 mb-5">
                                    <label for="user-reg-mobile" class="col-form-label">Mobile Number<span class="text-danger">* </span>:</label>
                                    <input type="text" class="form-control" name="mobile" id="mobile">
                                    <small id="mobileNumberHelp" class="form-text text-muted">
                                        Mobile Number Format: 01(3,5-9)-xxxxxx
                                    </small>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-5">
                                    <label for="user-reg-password" class="col-form-label">Password <span class="text-danger">* </span>:</label>
                                    <input type="password" class="form-control" id="reg_password" name="reg_password" minlength="6">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        Password 6-30 characters.
                                    </small>
                                </div>

                                <div class="col-md-6 mb-5">
                                    <label for="user-reg-cnf_password" class="col-form-label">Confirm Password<span class="text-danger">* </span>:</label>
                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" minlength="6">
                                    <small id="cnfPasswordHelpBlock" class="form-text text-muted">
                                        Must match password.
                                    </small>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-5">
                                    <label for="user-reg-sponsor_id" class="col-form-label">Sponsor's Username:</label>
                                    <input type="text" class="form-control" id="reg_sponsor_id" name="reg_sponsor_id"/>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <label for="user-reg-club_id" class="col-form-label">Select Club:<span class="text-danger">* </span></label>
                                    <select name="reg_club" id="reg_club" class=" form-control">
                                        <option value="">-- select --</option>
                                        <?php foreach($clubs as $val) : ?>
                                            <option value="<?php echo $val->id; ?>"><?php echo $val->club_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="col-md-6 mb-5">
                                    <label for="user-reg-club_id" class="col-form-label">Select Country:<span class="text-danger">* </span></label>
                                    <select name="country" name="country" class="form-control" required>
            							<option class="option" value="">Select your country</option>
            							<option class="option" selected="" value="Bangladesh +880">Bangladesh +880 </option>
            							<option class="option" value="Afghanistan +93">Afghanistan +93 </option>
            							<option class="option" value="Aland Islands +358">Aland Islands +358 </option>
            							<option class="option" value="Albania +355">Albania +355 </option>
            							<option class="option" value="Algeria +213">Algeria +213 </option>
            							<option class="option" value="AmericanSamoa +1684">AmericanSamoa +1684 </option>
            							<option class="option" value="Andorra +376">Andorra +376 </option>
            							<option class="option" value="Angola +244">Angola +244 </option>
            							<option class="option" value="Anguilla +1264">Anguilla +1264 </option>
            							<option class="option" value="Antarctica +672">Antarctica +672 </option>
            							<option class="option" value="Antigua and Barbuda +1268">Antigua and Barbuda +1268 </option>
            							<option class="option" value="Argentina +54">Argentina +54 </option>
            							<option class="option" value="Armenia +374">Armenia +374 </option>
            							<option class="option" value="Aruba +297">Aruba +297 </option>
            							<option class="option" value="Australia +61">Australia +61 </option>
            							<option class="option" value="Austria +43">Austria +43 </option>
            							<option class="option" value="Azerbaijan +994">Azerbaijan +994 </option>
            							<option class="option" value="Bahamas +1242">Bahamas +1242 </option>
            							<option class="option" value="Bahrain +973">Bahrain +973 </option>
            							<option class="option" value="Barbados +1246">Barbados +1246 </option>
            							<option class="option" value="Belarus +375">Belarus +375 </option>
            							<option class="option" value="Belgium +32">Belgium +32 </option>
            							<option class="option" value="Belize +501">Belize +501 </option>
            							<option class="option" value="Benin +229">Benin +229 </option>
            							<option class="option" value="Bermuda +1441">Bermuda +1441 </option>
            							<option class="option" value="Bhutan +975">Bhutan +975 </option>
            							<option class="option" value="Bolivia, Plurinational State of +591">Bolivia, Plurinational State of +591 </option>
            							<option class="option" value="Bosnia and Herzegovina +387">Bosnia and Herzegovina +387 </option>
            							<option class="option" value="Botswana +267">Botswana +267 </option>
            							<option class="option" value="Brazil +55">Brazil +55 </option>
            							<option class="option" value="British Indian Ocean Territory +246">British Indian Ocean Territory +246 </option>
            							<option class="option" value="Brunei Darussalam +673">Brunei Darussalam +673 </option>
            							<option class="option" value="Bulgaria +359">Bulgaria +359 </option>
            							<option class="option" value="Burkina Faso +226">Burkina Faso +226 </option>
            							<option class="option" value="Burundi +257">Burundi +257 </option>
            							<option class="option" value="Cambodia +855">Cambodia +855 </option>
            							<option class="option" value="Cameroon +237">Cameroon +237 </option>
            							<option class="option" value="Canada +1">Canada +1 </option>
            							<option class="option" value="Cape Verde +238">Cape Verde +238 </option>
            							<option class="option" value="Cayman Islands + 345">Cayman Islands + 345 </option>
            							<option class="option" value="Central African Republic +236">Central African Republic +236 </option>
            							<option class="option" value="Chad +235">Chad +235 </option>
            							<option class="option" value="Chile +56">Chile +56 </option>
            							<option class="option" value="China +86">China +86 </option>
            							<option class="option" value="Christmas Island +61">Christmas Island +61 </option>
            							<option class="option" value="Cocos (Keeling) Islands +61">Cocos (Keeling) Islands +61 </option>
            							<option class="option" value="Colombia +57">Colombia +57 </option>
            							<option class="option" value="Comoros +269">Comoros +269 </option>
            							<option class="option" value="Congo +242">Congo +242 </option>
            							<option class="option" value="Congo, The Democratic Republic of the Congo +243">Congo, The Democratic Republic of the Congo +243 </option>
            							<option class="option" value="Cook Islands +682">Cook Islands +682 </option>
            							<option class="option" value="Costa Rica +506">Costa Rica +506 </option>
            							<option class="option" value="Cote d'Ivoire +225">Cote d'Ivoire +225 </option>
            							<option class="option" value="Croatia +385">Croatia +385 </option>
            							<option class="option" value="Cuba +53">Cuba +53 </option>
            							<option class="option" value="Cyprus +357">Cyprus +357 </option>
            							<option class="option" value="Czech Republic +420">Czech Republic +420 </option>
            							<option class="option" value="Denmark +45">Denmark +45 </option>
            							<option class="option" value="Djibouti +253">Djibouti +253 </option>
            							<option class="option" value="Dominica +1767">Dominica +1767 </option>
            							<option class="option" value="Dominican Republic +1849">Dominican Republic +1849 </option>
            							<option class="option" value="Ecuador +593">Ecuador +593 </option>
            							<option class="option" value="Egypt +20">Egypt +20 </option>
            							<option class="option" value="El Salvador +503">El Salvador +503 </option>
            							<option class="option" value="Equatorial Guinea +240">Equatorial Guinea +240 </option>
            							<option class="option" value="Eritrea +291">Eritrea +291 </option>
            							<option class="option" value="Estonia +372">Estonia +372 </option>
            							<option class="option" value="Ethiopia +251">Ethiopia +251 </option>
            							<option class="option" value="Falkland Islands (Malvinas) +500">Falkland Islands (Malvinas) +500 </option>
            							<option class="option" value="Faroe Islands +298">Faroe Islands +298 </option>
            							<option class="option" value="Fiji +679">Fiji +679 </option>
            							<option class="option" value="Finland +358">Finland +358 </option>
            							<option class="option" value="France +33">France +33 </option>
            							<option class="option" value="French Guiana +594">French Guiana +594 </option>
            							<option class="option" value="French Polynesia +689">French Polynesia +689 </option>
            							<option class="option" value="Gabon +241">Gabon +241 </option>
            							<option class="option" value="Gambia +220">Gambia +220 </option>
            							<option class="option" value="Georgia +995">Georgia +995 </option>
            							<option class="option" value="Germany +49">Germany +49 </option>
            							<option class="option" value="Ghana +233">Ghana +233 </option>
            							<option class="option" value="Gibraltar +350">Gibraltar +350 </option>
            							<option class="option" value="Greece +30">Greece +30 </option>
            							<option class="option" value="Greenland +299">Greenland +299 </option>
            							<option class="option" value="Grenada +1473">Grenada +1473 </option>
            							<option class="option" value="Guadeloupe +590">Guadeloupe +590 </option>
            							<option class="option" value="Guam +1671">Guam +1671 </option>
            							<option class="option" value="Guatemala +502">Guatemala +502 </option>
            							<option class="option" value="Guernsey +44">Guernsey +44 </option>
            							<option class="option" value="Guinea +224">Guinea +224 </option>
            							<option class="option" value="Guinea-Bissau +245">Guinea-Bissau +245 </option>
            							<option class="option" value="Guyana +595">Guyana +595 </option>
            							<option class="option" value="Haiti +509">Haiti +509 </option>
            							<option class="option" value="Holy See (Vatican City State) +379">Holy See (Vatican City State) +379 </option>
            							<option class="option" value="Honduras +504">Honduras +504 </option>
            							<option class="option" value="Hong Kong +852">Hong Kong +852 </option>
            							<option class="option" value="Hungary +36">Hungary +36 </option>
            							<option class="option" value="Iceland +354">Iceland +354 </option>
            							<option class="option" value="India +91">India +91 </option>
            							<option class="option" value="Indonesia +62">Indonesia +62 </option>
            							<option class="option" value="Iran, Islamic Republic of Persian Gulf +98">Iran, Islamic Republic of Persian Gulf +98 </option>
            							<option class="option" value="Iraq +964">Iraq +964 </option>
            							<option class="option" value="Ireland +353">Ireland +353 </option>
            							<option class="option" value="Isle of Man +44">Isle of Man +44 </option>
            							<option class="option" value="Israel +972">Israel +972 </option>
            							<option class="option" value="Italy +39">Italy +39 </option>
            							<option class="option" value="Jamaica +1876">Jamaica +1876 </option>
            							<option class="option" value="Japan +81">Japan +81 </option>
            							<option class="option" value="Jersey +44">Jersey +44 </option>
            							<option class="option" value="Jordan +962">Jordan +962 </option>
            							<option class="option" value="Kazakhstan +77">Kazakhstan +77 </option>
            							<option class="option" value="Kenya +254">Kenya +254 </option>
            							<option class="option" value="Kiribati +686">Kiribati +686 </option>
            							<option class="option" value="Korea, Democratic People's Republic of Korea +850">Korea, Democratic People's Republic of Korea +850 </option>
            							<option class="option" value="Korea, Republic of South Korea +82">Korea, Republic of South Korea +82 </option>
            							<option class="option" value="Kuwait +965">Kuwait +965 </option>
            							<option class="option" value="Kyrgyzstan +996">Kyrgyzstan +996 </option>
            							<option class="option" value="Laos +856">Laos +856 </option>
            							<option class="option" value="Latvia +371">Latvia +371 </option>
            							<option class="option" value="Lebanon +961">Lebanon +961 </option>
            							<option class="option" value="Lesotho +266">Lesotho +266 </option>
            							<option class="option" value="Liberia +231">Liberia +231 </option>
            							<option class="option" value="Libyan Arab Jamahiriya +218">Libyan Arab Jamahiriya +218 </option>
            							<option class="option" value="Liechtenstein +423">Liechtenstein +423 </option>
            							<option class="option" value="Lithuania +370">Lithuania +370 </option>
            							<option class="option" value="Luxembourg +352">Luxembourg +352 </option>
            							<option class="option" value="Macao +853">Macao +853 </option>
            							<option class="option" value="Macedonia +389">Macedonia +389 </option>
            							<option class="option" value="Madagascar +261">Madagascar +261 </option>
            							<option class="option" value="Malawi +265">Malawi +265 </option>
            							<option class="option" value="Malaysia +60">Malaysia +60 </option>
            							<option class="option" value="Maldives +960">Maldives +960 </option>
            							<option class="option" value="Mali +223">Mali +223 </option>
            							<option class="option" value="Malta +356">Malta +356 </option>
            							<option class="option" value="Marshall Islands +692">Marshall Islands +692 </option>
            							<option class="option" value="Martinique +596">Martinique +596 </option>
            							<option class="option" value="Mauritania +222">Mauritania +222 </option>
            							<option class="option" value="Mauritius +230">Mauritius +230 </option>
            							<option class="option" value="Mayotte +262">Mayotte +262 </option>
            							<option class="option" value="Mexico +52">Mexico +52 </option>
            							<option class="option" value="Micronesia, Federated States of Micronesia +691">Micronesia, Federated States of Micronesia +691 </option>
            							<option class="option" value="Moldova +373">Moldova +373 </option>
            							<option class="option" value="Monaco +377">Monaco +377 </option>
            							<option class="option" value="Mongolia +976">Mongolia +976 </option>
            							<option class="option" value="Montenegro +382">Montenegro +382 </option>
            							<option class="option" value="Montserrat +1664">Montserrat +1664 </option>
            							<option class="option" value="Morocco +212">Morocco +212 </option>
            							<option class="option" value="Mozambique +258">Mozambique +258 </option>
            							<option class="option" value="Myanmar +95">Myanmar +95 </option>
            							<option class="option" value="Namibia +264">Namibia +264 </option>
            							<option class="option" value="Nauru +674">Nauru +674 </option>
            							<option class="option" value="Nepal +977">Nepal +977 </option>
            							<option class="option" value="Netherlands +31">Netherlands +31 </option>
            							<option class="option" value="Netherlands Antilles +599">Netherlands Antilles +599 </option>
            							<option class="option" value="New Caledonia +687">New Caledonia +687 </option>
            							<option class="option" value="New Zealand +64">New Zealand +64 </option>
            							<option class="option" value="Nicaragua +505">Nicaragua +505 </option>
            							<option class="option" value="Niger +227">Niger +227 </option>
            							<option class="option" value="Nigeria +234">Nigeria +234 </option>
            							<option class="option" value="Niue +683">Niue +683 </option>
            							<option class="option" value="Norfolk Island +672">Norfolk Island +672 </option>
            							<option class="option" value="Northern Mariana Islands +1670">Northern Mariana Islands +1670 </option>
            							<option class="option" value="Norway +47">Norway +47 </option>
            							<option class="option" value="Oman +968">Oman +968 </option>
            							<option class="option" value="Pakistan +92">Pakistan +92 </option>
            							<option class="option" value="Palau +680">Palau +680 </option>
            							<option class="option" value="Palestinian Territory, Occupied +970">Palestinian Territory, Occupied +970 </option>
            							<option class="option" value="Panama +507">Panama +507 </option>
            							<option class="option" value="Papua New Guinea +675">Papua New Guinea +675 </option>
            							<option class="option" value="Paraguay +595">Paraguay +595 </option>
            							<option class="option" value="Peru +51">Peru +51 </option>
            							<option class="option" value="Philippines +63">Philippines +63 </option>
            							<option class="option" value="Pitcairn +872">Pitcairn +872 </option>
            							<option class="option" value="Poland +48">Poland +48 </option>
            							<option class="option" value="Portugal +351">Portugal +351 </option>
            							<option class="option" value="Puerto Rico +1939">Puerto Rico +1939 </option>
            							<option class="option" value="Qatar +974">Qatar +974 </option>
            							<option class="option" value="Romania +40">Romania +40 </option>
            							<option class="option" value="Russia +7">Russia +7 </option>
            							<option class="option" value="Rwanda +250">Rwanda +250 </option>
            							<option class="option" value="Reunion +262">Reunion +262 </option>
            							<option class="option" value="Saint Barthelemy +590">Saint Barthelemy +590 </option>
            							<option class="option" value="Saint Helena, Ascension and Tristan Da Cunha +290">Saint Helena, Ascension and Tristan Da Cunha +290 </option>
            							<option class="option" value="Saint Kitts and Nevis +1869">Saint Kitts and Nevis +1869 </option>
            							<option class="option" value="Saint Lucia +1758">Saint Lucia +1758 </option>
            							<option class="option" value="Saint Martin +590">Saint Martin +590 </option>
            							<option class="option" value="Saint Pierre and Miquelon +508">Saint Pierre and Miquelon +508 </option>
            							<option class="option" value="Saint Vincent and the Grenadines +1784">Saint Vincent and the Grenadines +1784 </option>
            							<option class="option" value="Samoa +685">Samoa +685 </option>
            							<option class="option" value="San Marino +378">San Marino +378 </option>
            							<option class="option" value="Sao Tome and Principe +239">Sao Tome and Principe +239 </option>
            							<option class="option" value="Saudi Arabia +966">Saudi Arabia +966 </option>
            							<option class="option" value="Senegal +221">Senegal +221 </option>
            							<option class="option" value="Serbia +381">Serbia +381 </option>
            							<option class="option" value="Seychelles +248">Seychelles +248 </option>
            							<option class="option" value="Sierra Leone +232">Sierra Leone +232 </option>
            							<option class="option" value="Singapore +65">Singapore +65 </option>
            							<option class="option" value="Slovakia +421">Slovakia +421 </option>
            							<option class="option" value="Slovenia +386">Slovenia +386 </option>
            							<option class="option" value="Solomon Islands +677">Solomon Islands +677 </option>
            							<option class="option" value="Somalia +252">Somalia +252 </option>
            							<option class="option" value="South Africa +27">South Africa +27 </option>
            							<option class="option" value="South Sudan +211">South Sudan +211 </option>
            							<option class="option" value="South Georgia and the South Sandwich Islands +500">South Georgia and the South Sandwich Islands +500 </option>
            							<option class="option" value="Spain +34">Spain +34 </option>
            							<option class="option" value="Sri Lanka +94">Sri Lanka +94 </option>
            							<option class="option" value="Sudan +249">Sudan +249 </option>
            							<option class="option" value="Suriname +597">Suriname +597 </option>
            							<option class="option" value="Svalbard and Jan Mayen +47">Svalbard and Jan Mayen +47 </option>
            							<option class="option" value="Swaziland +268">Swaziland +268 </option>
            							<option class="option" value="Sweden +46">Sweden +46 </option>
            							<option class="option" value="Switzerland +41">Switzerland +41 </option>
            							<option class="option" value="Syrian Arab Republic +963">Syrian Arab Republic +963 </option>
            							<option class="option" value="Taiwan +886">Taiwan +886 </option>
            							<option class="option" value="Tajikistan +992">Tajikistan +992 </option>
            							<option class="option" value="Tanzania, United Republic of Tanzania +255">Tanzania, United Republic of Tanzania +255 </option>
            							<option class="option" value="Thailand +66">Thailand +66 </option>
            							<option class="option" value="Timor-Leste +670">Timor-Leste +670 </option>
            							<option class="option" value="Togo +228">Togo +228 </option>
            							<option class="option" value="Tokelau +690">Tokelau +690 </option>
            							<option class="option" value="Tonga +676">Tonga +676 </option>
            							<option class="option" value="Trinidad and Tobago +1868">Trinidad and Tobago +1868 </option>
            							<option class="option" value="Tunisia +216">Tunisia +216 </option>
            							<option class="option" value="Turkey +90">Turkey +90 </option>
            							<option class="option" value="Turkmenistan +993">Turkmenistan +993 </option>
            							<option class="option" value="Turks and Caicos Islands +1649">Turks and Caicos Islands +1649 </option>
            							<option class="option" value="Tuvalu +688">Tuvalu +688 </option>
            							<option class="option" value="Uganda +256">Uganda +256 </option>
            							<option class="option" value="Ukraine +380">Ukraine +380 </option>
            							<option class="option" value="United Arab Emirates +971">United Arab Emirates +971 </option>
            							<option class="option" value="United Kingdom +44">United Kingdom +44 </option>
            							<option class="option" value="United States +1">United States +1 </option>
            							<option class="option" value="Uruguay +598">Uruguay +598 </option>
            							<option class="option" value="Uzbekistan +998">Uzbekistan +998 </option>
            							<option class="option" value="Vanuatu +678">Vanuatu +678 </option>
            							<option class="option" value="Venezuela, Bolivarian Republic of Venezuela +58">Venezuela, Bolivarian Republic of Venezuela +58 </option>
            							<option class="option" value="Vietnam +84">Vietnam +84 </option>
            							<option class="option" value="Virgin Islands, British +1284">Virgin Islands, British +1284 </option>
            							<option class="option" value="Virgin Islands, U.S. +1340">Virgin Islands, U.S. +1340 </option>
            							<option class="option" value="Wallis and Futuna +681">Wallis and Futuna +681 </option>
            							<option class="option" value="Yemen +967">Yemen +967 </option>
            							<option class="option" value="Zambia +260">Zambia +260 </option>
            							<option class="option" value="Zimbabwe +263">Zimbabwe +263 </option>
            					    </select>
                                </div>
                            </div>
                            
                        </div>
                        
                        <!---->
                        

                        
                        <!---->

                        <div class="modal-footer rounded-0">
                            <button id="btn-register" type="submit"
                                    class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-yellow text-dark font-weight-bold position-relative">Register
                                <div class="loading-spinner login-spinner-wrapper display_none"></div>
                            </button>
                            <!-- <input type="submit" name="submit" value="Register" class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-yellow text-dark font-weight-bold position-relative"> -->
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <!-- Registration Modal -->

        <!-- Login Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content rounded-0">
                    <div class="modal-header bg-dark rounded-0">
                        <h5 class="modal-title text-white" id="loginModalLabel">Login</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="login">

                        <div class="modal-body">

                            <div id="login-msg" class="alert alert-success" role="alert" style="display:none;"></div>
                            <div id="login-msg-error" class="alert alert-danger" role="alert" style="display:none;"></div>

                            <div class="form-group">
                                <label for="user-email" class="col-form-label">Username:</label>
                                <input type="text" name="username" class="form-control" id="user-username" placholder="Username" required>
                            </div>

                            <div class="form-group">
                                <label for="user-password" class="col-form-label">Password:</label>
                                <input type="password" class="form-control" id="user-password" minlength="6" name="password" required>
                            </div>

                        </div>

                        <div class="modal-footer rounded-0">
                            <button id="login-btn" type="submit" class="btn btn-dark mx-auto rounded-0 border-0 btn-block bg-yellow text-dark font-weight-bold position-relative">Sign In
                                <div class="loading-spinner login-spinner-wrapper display_none"></div>
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <!-- Login Modal -->
    </div>



    <!-- Notice panel -->
    <?php include(APPPATH . "views/notice_panel.php"); ?>