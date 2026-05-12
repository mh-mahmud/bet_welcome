<script>

    // validate change password form
    $.validator.addMethod("checkPassword", function (value, element) {
        var isSuccess = 0;
        var url_prefix = "<?php echo base_url(); ?>";
        url = url_prefix + 'check_club_password';
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
                url: url_prefix + 'change_club_password',
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
                        }, 3000);
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
        url = url_prefix + 'submit_club_withdraw';

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

</script>