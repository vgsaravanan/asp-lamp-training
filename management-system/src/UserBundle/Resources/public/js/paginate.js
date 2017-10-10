/**
* Function to create pagination
* 
* @param string page_no
*
* @param string link 
*
* return {null}
*/
function changePagination(page_no, link){
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