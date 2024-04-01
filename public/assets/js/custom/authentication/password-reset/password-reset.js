"use strict";
var KTPasswordResetGeneral = function() {
    var t, e, i;
    return {
        init: function() {
            t = document.querySelector("#kt_password_reset_form");
            e = document.querySelector("#kt_password_reset_submit");
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
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            });

            e.addEventListener("click", function(event) {
                event.preventDefault();

                i.validate().then(function(status) {
                    if (status === "Valid") {
                        // Disable submit button
                        e.setAttribute("data-kt-indicator", "on");
                        e.disabled = true;

                        // Extract form data
                        var formData = new FormData(t);

                        // Send POST request to server
                        fetch('/api/forget-password', {
                            method: 'POST',
                            body: formData
                        })
                        .then(function(response) {
                            return response.json();
                        })
                        .then(function(data) {
                            // Handle response
                            if (data.success) {
                                // Display success message
                                Swal.fire({
                                    text: "Password reset email sent successfully!",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                }).then(function(result) {
                                    if (result.isConfirmed) {
                                        // Clear form fields
                                        t.querySelector('[name="email"]').value = "";
                                    }
                                });
                            } else {
                                // Display error message
                                Swal.fire({
                                    text: data.message || "Sorry, there was an error. Please try again.",
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
                            // Re-enable submit button
                            e.removeAttribute("data-kt-indicator");
                            e.disabled = false;
                        });
                    }
                });
            });
        }
    };
}();
KTUtil.onDOMContentLoaded(function() {
    KTPasswordResetGeneral.init();
});
