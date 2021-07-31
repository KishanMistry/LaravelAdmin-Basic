$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
if ($("#frm-login").length > 0) {
    $("#frm-login").validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
            },
        },
        errorPlacement: function (error, element) {
            element.parent('.input-field').next(".ErrorMessage").append(error);
        },
        submitHandler: function (form) {
            $.ajax({
                url: $(form).attr('action'),
                method: "POST",
                async: false,
                data: $(form).serialize(),
                success: function (response) {
                    if (response.status == true) {
                        toastr["success"](response.message);
                        $('#btn-submit').attr('disabled', 'disabled');
                        setTimeout(function () {
                            window.location.href = response.url;
                        }, 3000);
                    } else {
                        toastr["error"](response.message);
                    }
                }, error: function (err) {
                    toastr["error"]("Something Went Wrong Here!");
                }
            });
            return false;
        }
    });
}

if ($("#frm-forgot-password").length > 0) {
    $("#frm-forgot-password").validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
        },
        errorElement: 'div',
        errorPlacement: function (error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function (form) {
            $.ajax({
                url: $(form).attr('action'),
                method: "POST",
                async: false,
                data: $(form).serialize(),
                success: function (response) {
                    if (response.status == true) {
                        toastr["success"](response.message);
                        $(form).trigger("reset");
                    } else {
                        toastr["error"](response.message);
                    }
                }, error: function (err) {
                    toastr["error"]("Something Went Wrong Here!");
                }
            });
            return false;
        }
    });
}

if ($("#frm-reset-password").length > 0) {
    $("#frm-reset-password").validate({
        rules: {
            password: {
                required: true,
            },
            confirm_password: {
                equalTo: '[name="password"]'
            },
        },
        messages: {
            confirm_password: {
                required: "Please re-enter your new password!",
                equalTo: "Your confirm password is not matched with the new password!",
            },
        },
        errorElement: 'div',
        errorPlacement: function (error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function (form) {
            $.ajax({
                url: $(form).attr('action'),
                method: "POST",
                async: false,
                data: $(form).serialize(),
                success: function (response) {
                    if (response.status == true) {
                        toastr["success"](response.message);
                        $(form).trigger("reset");
                        setTimeout(function () {
                            window.location.href = response.url;
                        }, 3000);
                    } else {
                        toastr["error"](response.message);
                    }
                }, error: function (err) {
                    toastr["error"]("Something Went Wrong Here!");
                }
            });
            return false;
        }
    });
}