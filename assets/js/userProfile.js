(function ($) {

    $(document).ready(function () {

        $('#balance-transfer-modal').on('hide.bs.modal', function () {
            $('#v-pills-balance-transfer-tab').removeClass('active show');
            $('#v-pills-profile-tab').addClass('active show');
        });

        $('#change-password-modal').on('hide.bs.modal', function () {
            $('#v-pills-change-password').removeClass('active show');
            $('#v-pills-profile-tab').addClass('active show');
        });

        $('#reply-message-modal').on('shown.bs.modal', function () {
            if ($("#threaded_messages").length > 0) {
                $("#threaded_messages").animate({scrollTop: $('#threaded_messages')[0].scrollHeight}, 1000);
            }
        });

        $(document).on('click', '.msg-btns .btn', function () {
            $('.msg-btns .btn').removeClass('bg-yellow text-white text-gray');
            $(this).addClass('bg-yellow text-white');
        });

    });

})(jQuery);