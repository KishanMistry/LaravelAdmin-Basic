$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
if ($("#frm-update-profile").length > 0) {
    $("#frm-update-profile").validate({
        rules: {
            first_name: {
                required: true,
                lettersonly: true,
            },
            last_name: {
                required: true,
                lettersonly: true,
            },
            email: {
                required: true,
                email: true,
                verifyEmail: true,
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
    $.validator.addMethod("verifyEmail", function (value, element) {
        var result = false;
        $.ajax({
            type: "POST",
            async: false,
            url: routes.verify_email,
            data: {"email": value, "_token": $('meta[name="csrf-token"]').attr('content')},
            success: function (response) {
                result = response;
            }
        });
        return result;
    }, "Email is already exists!");

    jQuery.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
    }, "Letters only please");
}

if ($("#frm-update-password").length > 0) {
    $("#frm-update-password").validate({
        rules: {
            current_password: {
                required: true,
            },
            new_password: {
                required: true,
            },
            confirm_password: {
                equalTo: '[name="new_password"]'
            },
        },
        messages: {
            previous_password: {
                required: "Please enter your current password!",
            },
            new_password: {
                required: "Please enter your new password!",
            },
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
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


