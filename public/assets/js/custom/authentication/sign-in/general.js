"use strict";

var KTSigninGeneral = function() {
    var t, e, i;

    return {
        init: function() {
            t = document.querySelector("#kt_sign_in_form");
            e = document.querySelector("#kt_sign_in_submit");
            i = FormValidation.formValidation(t, {
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: "Email address is required"
                            },
                            emailAddress: {
                                message: "The value is not a valid email address"
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "The password is required"
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

            e.addEventListener("click", function(event) {
                event.preventDefault();

                i.validate().then(function(status) {
                    if (status === "Valid") {
                        e.setAttribute("data-kt-indicator", "on");
                        e.disabled = true;

                        // Extract form data
                        var formData = new FormData(t);

                        // Send POST request to server
                        fetch('/auto/api/login', {
                            method: 'POST',
                            body: formData
                        })
                        .then(function(response) {
                            return response.json();
                        })
                        .then(function(data) {
                         console.log(data);
                            // Handle response
                            if (data.success) {
                                Swal.fire({
                                    text: "You have successfully logged in!",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                }).then(function(result) {
                                    if (result.isConfirmed) {
                                        t.querySelector('[name="email"]').value = "";
                                        t.querySelector('[name="password"]').value = "";
                                        window.location.href = "/dashboard";
                                    }
                                });
                            } else {
                                Swal.fire({
                                    text: data.message || "Sorry, looks like there are some errors detected, please try again.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                            }
                        })
                        .catch(function(error) {
                            console.error('Error:', error);
                        })
                        .finally(function() {
                            // Reset button state
                            e.removeAttribute("data-kt-indicator");
                            e.disabled = false;
                        });
                    } else {
                        Swal.fire({
                            text: data.message || "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                });
            });
        }
    };
}();

KTUtil.onDOMContentLoaded(function() {
    KTSigninGeneral.init();
});
