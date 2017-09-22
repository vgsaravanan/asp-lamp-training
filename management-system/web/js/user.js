var emailCount = '{{ form.email_id|length }}';
var mobileCount = '{{ form.mobile_no|length  }}';
var interestCount = '{{ form.area_of_interest|length  }}';


$(document).ready(function() {
$('#add-another-email').click(function(e) {
    e.preventDefault();
    var emailList = $('#email-fields-list');
    console.log(emailList);

    var newWidget = emailList.attr('data-prototype');
    console.log(newWidget);
   
    newWidget = newWidget.replace(/__name__/g, emailCount);
    emailCount++;
    console.log(newWidget);

    var new_id = $("ul:last-child")
    console.log(new_id);

    var newLi = $('<li style= "list-style-type:none"></li>').html(newWidget);
    newLi.appendTo(emailList);
});

$('#add-another-mobile-no').click(function(e) {
e.preventDefault();

var mobileList = $('#mobile-fields-list');
console.log(mobileList);

var newWidget = mobileList.attr('data-prototype');

newWidget = newWidget.replace(/__name__/g, mobileCount);
mobileCount++;

var newLi = $('<li style= "list-style-type:none"></li>').html(newWidget);
newLi.appendTo(mobileList);
});

$('#remove-another-mobile-no').click(function(e) {
e.preventDefault();

var mobileList = $('#mobile-fields-list');
alert(mobileList.val());
var newWidget = mobileList.attr('data-prototype');
console.log(newWidget);

newWidget = newWidget.replace(/__name__/g, mobileCount);
console.log(newWidget);

mobileCount++;
console.log(mobileCount);

});

})