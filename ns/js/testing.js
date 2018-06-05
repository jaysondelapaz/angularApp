
        alert("df;lakdsjf");
 
  $("#ProductCode").autocomplete({
          source: function(request, response) {
                    $.ajax({
                        cache: false,
                        async: false,
                        url: "search.php",
                        type: "POST",
                        dataType: "json",
                        data: {term: request.term,searchBy:'ProductCode'},
                        success: function(responseText) {
                            response(responseText);
                            console.log(responseText);
                            }
                    });//end of ajax
           }
      });//end of autocomplete
 
  $("#sad").on('click', function(){
        alert("GO");
  });



