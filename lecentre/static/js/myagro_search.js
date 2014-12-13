$(function () 
  {
  	   $('#go_chercher').on("click", function(){
          var searchfield = $('#searchVal').val();
          if (searchfield == null || searchfield == "") {
            $(this).focus();
            return;
        }
        var tablehtml ="";
      $.ajax({                                      
        url: 'client.php',                  //the script to call to get data  
        type: 'GET' ,        
        data: 'command=1&id='+searchfield,                        //you can insert url argumnets here to pass to api.php
                                        //for example "id=5&parent=6"
        dataType: 'json',                //data format      
        success: function(data)          //on recieve of reply
        {
          //var a_size = data.length;
          //alert(a_size);
          if(data.First_Name_c != null || data.First_Name_c != ""){
            //alert("Finished ajax");
            tablehtml = "<table class='table table-hover'><thead><tr><th>Client ID</th><th>Nom</th><th>Prenom</th><th>Numero</th><th>Sexe</th><th>Village</th><th>Verifier?</th></tr></thead><tbody>";
            var fname = data.First_Name_c;              //get id
            var lname = data.Last_Name_c; 
            var village = data.Village_c;
           // var sex = data[3].toUpperCase();
           var sex = data.Sex_c;
           var numero = data.Phone_c;          //get name
           //var a_size = data.length;	                                        
			tablehtml = tablehtml + "<tr><td>"+searchfield+"</td><td>"+lname+"</td><td>"+fname+"</td><td>"+numero+"</td><td>"+sex+"</td><td>"+village+"</td><td><form method='post' action='resultview.php'><input type='hidden' name='id' value="+searchfield+"><input type='submit' class='btn btn-success' value='view'></form></td></tr></tbody></table>";
          }
          else { var tablehtml = "<p> No results found </p>";_}
          $('#searchresults').html(tablehtml);
        } 
      });
    });

  	//end of main function
  })