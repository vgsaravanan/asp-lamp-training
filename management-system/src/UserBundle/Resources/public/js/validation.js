$(document).ready(function() {

        $('.js-datepicker').datepicker({
                dateFormat: "yy/mm/dd",
            changeMonth: true,
            changeYear: true,
            yearRange: "-50:+10"

        });

        $("#form_new_user").validate({

            rules: {
                'new_user[firstName]': {
                required: true,
                maxlength: 20,
                regex: /^[a-z A-Z]+$/ 
                },
                'new_user[lastName]': {
                    required: true,
                    maxlength: 20,
                    regex: /^[a-z A-Z]+$/ 
                },
                'new_user[gender]': {
                    required: true,
                },
                'new_user[dateOfBirth]': {
                    required: true,
                },
                'new_user[bloodGroup]': {
                    required: true,
                    maxlength: 12,
                }
            },
            messages: {

                '{{ form.firstName.vars.full_name }}': {
                    required: " FirstName should not be empty",
                    maxlength: " Name must not exceed 20 charachters"
                },
                '{{ form.lastName.vars.full_name }}': {
                    required: " LastName should not be empty",
                    maxlength: " Name must not exceed 20 charachters"
                },
                '{{ form.gender.vars.full_name}}': {
                    required: " Please select gender",
                },
                '{{ form.dateOfBirth.vars.full_name}}': {
                    required: " Please provide date of birth",
                },
                '{{ form.bloodGroup.vars.full_name}}': {
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
            },
            "graduation-type": {
                required: true,
            },
        });
});