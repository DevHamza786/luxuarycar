"use strict";

var KTAccountSettingsSigninMethods = {
    init: function () {
        var t, e;

        // Function to toggle between email and password change forms
        var toggleEmailForm = function () {
            var passwordForm = document.getElementById("kt_signin_change_password");
            passwordForm.classList.toggle("d-none");
        };

        // Function to handle form submission with AJAX for changing password
        var submitPasswordForm = function () {
            var form = document.getElementById("kt_signin_change_password");
            var validator = FormValidation.formValidation(form, {
                fields: {
                    currentpassword: {
                        validators: {
                            notEmpty: {
                                message: "Current Password is required"
                            }
                        }
                    },
                    newpassword: {
                        validators: {
                            notEmpty: {
                                message: "New Password is required"
                            }
                        }
                    },
                    confirmpassword: {
                        validators: {
                            notEmpty: {
                                message: "Confirm Password is required"
                            },
                            identical: {
                                compare: function () {
                                    return form.querySelector('[name="newpassword"]').value;
                                },
                                message: "The password and its confirm are not the same"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row"
                    })
                }
            });

            form.querySelector("#kt_password_submit").addEventListener("click", function (event) {
                event.preventDefault();
                validator.validate().then(function (status) {
                    if (status === "Valid") {
                        // Form is valid, proceed with AJAX request
                        var formData = new FormData(form);
                        fetch(passwordUpdateRoute, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                             },
                            body: formData
                        })
                        .then(function(response) {
                            // console.log(response);
                            return response.json();
                        })
                        .then(function(data) {
                            // console.log(data);
                            if (data.success) {
                                // Password updated successfully
                                swal.fire({
                                    text: data.message,
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }).then(function() {
                                    // Clear input fields
                                    document.getElementById("currentpassword").value = "";
                                    document.getElementById("newpassword").value = "";
                                    document.getElementById("confirmpassword").value = "";
                                });
                            } else {
                                // Error updating password
                                swal.fire({
                                    text: data.message,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                });
                            }
                        })
                        .catch(function(error) {
                            console.log('Error:', error);
                        });
                    }
                });
            });
        };
        document.getElementById("kt_signin_password_button").addEventListener("click", function () {
            toggleEmailForm();
        });

        submitPasswordForm();
    }
};

// Initialize the methods when the DOM content is loaded
KTUtil.onDOMContentLoaded((function () {
    KTAccountSettingsSigninMethods.init();
}));
