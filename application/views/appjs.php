<script>

    // validate change password form
    $.validator.addMethod("checkPassword", function (value, element) {
        var isSuccess = 0;
        var url_prefix = "<?php echo base_url(); ?>";
        url = url_prefix + 'check_user_password';
        $.ajax({
            url: url,
            data: {
                password: value
            },
            dataType: 'text',
            type: 'POST',
            async: false,
            success: function (msg) {
                // alert(msg)
                if (msg == 0) {
                    isSuccess = true;
                } else {
                    isSuccess = false;
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
            }
        });
        return isSuccess;
    }, "Sorry, your password did not matched");

    $("#changePassForm").validate({

        rules: {
            current_password: {
                required: true,
                checkPassword: true
            },
            new_password: {
                required: true,
                minlength: 6
            },
            confirm_password: {
                required: true,
                minlength: 6,
                equalTo: "#new_password"
            },
        },
        messages: {
            /*full_name: "please enter your full name",
            reg_club: "please select a club",
            email: "email is required",*/
            // mobile: "phone number is required",
            new_password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long"
            },
            confirm_password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long",
                equalTo: "Please enter the same password as above"
            },
        },
        /*submitHandler: function(e) {
            e.preventDefault();


        }*/
    });

    $("form#changePassForm").on("submit", function(e) {
        e.preventDefault();

            var new_password = $("#new_password").val();
            var url_prefix = "<?php echo base_url(); ?>";

            // ajax request
            $.ajax({
                type: "POST",
                url: url_prefix + 'change_user_password',
                data: {
                    password: new_password,
                },
                beforeSend: function() {
                    /*$("#cngPassBtn").attr('disabled', true);
                    $("#cngPassBtn").text("Please wait.....");*/
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if(data.error == 0) {
                        $("#changePassSucc").show();
                        $("#changePassSucc").text(data.success_msg);
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                        return;
                    }
                    else if(data.error == 1) {
                        $("#cngPassBtn").attr('disabled', false);
                        $("#cngPassBtn").text("SAVE");
                        $("#changePassError").show();
                        $("#changePassError").text(data.error_msg);
                    }
                },
                error:function(exception){
                    console.log(exception);
                }
            });

    });

    $("form#user-deposit").on("submit", function(e) {
        e.preventDefault();

        var amount = $("#deposit-amount").val();
        amount = parseInt(amount);
        var payment_method = $("#payment_method").val();
        var user_phone = $("#user_phone").val();
        var admin_account = $("#admin_account").val();
        var transaction_id = $("#transaction_id").val();
        var exObj = $("#btn-deposit");

        var url_prefix = "<?php echo base_url(); ?>";
        url = url_prefix + 'submit_user_deposit';
        //red = window.location.reload();

        // alert(amount);
        if(amount<50 || isNaN(amount)) {
            return;
        }



        // ajax request
        $.ajax({
            type: "POST",
            url: url,
            data: {
                amount: amount,
                payment_method: payment_method,
                user_phone: user_phone,
                admin_account: admin_account,
                transaction_id: transaction_id,
            },
            beforeSend: function() {
                exObj.attr('disabled', true);
                exObj.text("Please wait.....");
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if(data.error == 0) {
                    $("#deposit-msg").show();
                    $("#deposit-msg").text(data.success_msg);
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                    return;
                }
                else if(data.error == 1) {
                    exObj.attr('disabled', false);
                    exObj.text("SUBMIT");
                    $("#deposit-msg").show();
                    $("#deposit-msg").text(data.error_msg);
                }
            },
            error:function(exception){
                console.log(exception);
            }
        });
    });
    // -- deposit end

    $("form#withdrawForm").on("submit", function(e) {
        e.preventDefault();

        var amount = $("#withdraw-amount").val();
        amount = parseInt(amount);
        var payment_method = $("#withdraw-method").val();
        var account_number = $("#withdraw-to").val();
        var payment_type = $("#withdraw-type").val();

        if(amount < 100) {
            $("#withdrawError").show();
            $("#withdrawError").text("Amount must be greater than 100");
            return;
        }

        var exObj = $("#btn-withdraw");

        var url_prefix = "<?php echo base_url(); ?>";
        url = url_prefix + 'submit_user_withdraw';

        // ajax request
        $.ajax({
            type: "POST",
            url: url,
            data: {
                amount: amount,
                payment_method: payment_method,
                account_number: account_number,
                payment_type: payment_type
            },
            beforeSend: function() {
                exObj.attr('disabled', true);
                exObj.text("Please wait.....");
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if(data.error == 0) {
                    $("#withdrawError").hide();
                    $("#withdrawSuccess").show();
                    $("#withdrawSuccess").text(data.success_msg);
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                    return;
                }
                else if(data.error == 1) {
                    exObj.attr('disabled', false);
                    exObj.text("SUBMIT");
                    $("#withdrawError").show();
                    $("#withdrawError").text(data.error_msg);
                }
            },
            error:function(exception){
                console.log(exception);
            }
        });
    });
    // -- withdraw end

    // -- balance transfer
    $("form#balanceTransForm").on("submit", function(e) {
        e.preventDefault();

        var amount = $("#balance-transfer-amount").val();
        amount = parseInt(amount);
        var username = $("#balance-transfer-username").val();
        var notes = $("#balance-transfer-notes").val();
        var password = $("#trans_password").val();

        if(amount < 100) {
            $("#transError").show();
            $("#transError").text("Transfer amount must be greater than 100");
            return;
        }

        var exObj = $("#btn-transfer");

        var url_prefix = "<?php echo base_url(); ?>";
        url = url_prefix + 'coin_transfer';

        // ajax request
        $.ajax({
            type: "POST",
            url: url,
            data: {
                amount: amount,
                username: username,
                notes: notes,
                password: password
            },
            beforeSend: function() {
                exObj.attr('disabled', true);
                exObj.text("Please wait.....");
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if(data.error == 0) {
                    $("#transError").hide();
                    $("#transSuccess").show();
                    $("#transSuccess").text(data.success_msg);
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                    return;
                }
                else if(data.error == 1) {
                    exObj.attr('disabled', false);
                    exObj.text("Transfer Amount");
                    $("#transError").show();
                    $("#transError").text(data.error_msg);
                }
            },
            error:function(exception){
                console.log(exception);
            }
        });
    });

    // -- sponsor show
    $("#sponsorModal").on("click", function(e) {
        e.preventDefault();
        $("#sponsorAlert").hide();
        $("#sponsorTable").hide();

        var user_id = "<?php echo $x->username; ?>";
        var url_prefix = "<?php echo base_url(); ?>";
        url = url_prefix + 'get_sponsor_data';

        // ajax request
        $.ajax({
            type: "POST",
            url: url,
            data: {
                user_id: user_id,
            },
            beforeSend: function() {
                
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if(data.error == 0) {
                    $("#sponsorTable").show();
                    $("#tableBody").html(data.success_msg);
                }
                else if(data.error == 1) {
                    $("#sponsorAlert").show();
                    $("#sponsorAlert").text(data.error_msg);
                }
            },
            error:function(exception){
                console.log(exception);
            }
        });
    });

    function paymentAccSearch(val) {
        var payment_method = val;
        var url_prefix = "<?php echo base_url(); ?>";
        url = url_prefix + 'payment_account_search';

        // ajax request
        $.ajax({
            type: "POST",
            url: url,
            data: {
                payment_method: payment_method,
            },
            beforeSend: function() {
                
            },
            dataType: 'json',
            success: function(data) {
                // console.log(data);
                if(data.error == 0) {
                    $("#admin_account").html(data.success_msg);
                }
                else if(data.error == 1) {
                    $("#admin_account").html("");
                }
            },
            error:function(exception){
                console.log(exception);
            }
        });

    }


</script>