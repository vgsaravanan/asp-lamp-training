
$("#showPaginatedArea").click(function() {

    var url = "http://localhost/projects/Symfony2.4/web/app_dev.php/";

    $.ajax({
        type: "POST",
        url: url,
        data: { "pageId" : 1 },
        success: function(data)
        {
            var elem =  document.getElementById('displayResults');
            elem.innerHTML = "";
            elem.innerHTML = data;
        }
    });
});

function changePagination(pageId){
    $.ajax({
        type: "POST",
        url: Routing.generate('acme_pagination_test_homepage'),
        data: { "pageId" : pageId },
        cache: false,
        success: function(result){
            var elem =  document.getElementById('displayResults');
            elem.innerHTML = "";
            elem.innerHTML = result;
        }
    });
}