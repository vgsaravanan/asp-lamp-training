function changePagination(page_no, link){
    console.log(link);
    var url = link + '/'+ page_no;  
    console.log(url);
    $.ajax({
        type: "POST",
        url:url,
        data: { page : page_no },
        success: function(response){

            var elem =  document.getElementById('page_content');

           document.getElementById('page_content').innerHTML = "";
           document.getElementById('page_content').innerHTML = response;
        }
    });
}