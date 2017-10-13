$(document).ready(function() {

        $('.js-datepicker').datepicker({
                dateFormat: "yy/mm/dd",
            changeMonth: true,
            changeYear: true,
            yearRange: "-50:+10"

        });

        $("#form_new_user").validate({

            rules: {
                'user[firstName]': {
                required: true,
                maxlength: 20,
                regex: /^[a-z A-Z]+$/ 
                },
                'user[lastName]': {
                    required: true,
                    maxlength: 20,
                    regex: /^[a-z A-Z]+$/ 
                },
                'user[dateOfBirth]': {
                    required: true,
                },
                'user[gender]': {
                    required: true,
                },
                'user[bloodGroup]': {
                    required: true,
                    maxlength: 12,
                }
            },
            messages: {

                'user[firstName]': {
                    required: " FirstName should not be empty",
                    maxlength: " Name must not exceed 20 charachters"
                },
                'user[lastName]': {
                    required: " LastName should not be empty",
                    maxlength: " Name must not exceed 20 charachters"
                },
                'user[gender]': {
                    required: " Please select gender",
                },
                'user[dateOfBirth]': {
                    required: " Please provide date of birth",
                },
                'user[bloodGroup]': {
                    required : " Please select bloodgroup"
                }
            },  

        });

        $.validator.addMethod("unique", function(value, element, params) {
            var prefix = params;
            var selector = $.validator.format("[name!='{0}'][class^='{1}']", element.name, prefix);
            console.log(selector);
            var matches = new Array();
            $(selector).each(function(index, item) {
                if (value == $(item).val()) {
                    matches.push(item);
                }
            });
            console.log(matches);
            return matches.length == 0;
        }, " Value is not unique.");

        $.validator.addMethod("regex",function(value, element, regexpr){
            return regexpr.test(value);
        }, " Provide valid details ");


        $.validator.addClassRules({
            "mobile-no-box": {
                required: true,
                unique: "mobile-no-box",
                pattern: /^[0-9]+$/,
            },
            "email-box": {
                required: true,
                email: true,
                unique: "email-box",
                regex: /^[a-z]+[a-z0-9._]+@[a-z]+\.[a-z.]{2,5}$/,
            },
            "interest-type": {
                required: true,
                unique: "interest-type"
            },
            "graduation-type": {
                required: true,
                unique: "graduation-type"
            },
        });
});