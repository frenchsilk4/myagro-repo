$(function () 
  {

    document.getElementById("brigo").disabled = true;
    document.getElementById("dembagnouma").disabled = true;
    document.getElementById("jorobana").disabled = true;
    document.getElementById("sotubaka").disabled = true;
    document.getElementById("snk").disabled = true;
    document.getElementById("pds").disabled = true;

    document.getElementsByClassName("arachide_product1").disabled = true;
    //-----------------------------------------------------------------------
    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
    //-----------------------------------------------------------------------
    $('#myagro_num').focusout(function(){
      //alert("getting to ajax");
      var idfield = $('#myagro_num').val();
      if (idfield == null || idfield == "") {
        alert("Client ID must be filled out");
        return false;
    }
      $.ajax({                                      
        url: 'client.php',                  //the script to call to get data  
        type: 'post' ,        
        data: "command=1&id="+idfield,                        //you can insert url argumnets here to pass to api.php
                                        //for example "id=5&parent=6"
        dataType: 'json',                //data format      
        success: function(data)          //on recieve of reply
        {
          //alert("Finished ajax");
          var fname = data[0];              //get id
          var lname = data[1]; 
          var village = data[2];
          var sex = data[3].toUpperCase();
          var numero = data[4];          //get name
          //--------------------------------------------------------------------
          // 3) Update html content
          //--------------------------------------------------------------------
          $('#output').html("<b>id: </b>"+fname+"<b> name: </b>"+lname); //Set output element html
          //recommend reading up on jquery selectors they are awesome 
          // http://api.jquery.com/category/selectors/
          $('#nom').val(fname);
          $('#prenom').val(lname);
          $('#village').val(village);
          $('#numero').val(numero);
          if(sex == 'FEMAL'){
            $('#female').prop('checked',true);
          }
          else {$('#male').prop('checked',true);}
        } 
      });
    });
    
    $('#mais_button').click(function(){
      $('#mais-options').show();
      $('#arachide-options').hide();
      $('#cont4').css('opacity','1');

    });
    var hectare_size=0;
    var m_product='';
    $('.mais_size').click(function(){
        if($(this).is(':checked')){
          //alert($(this).val());

          hectare_size = $(this).val();
          if(hectare_size < 0.5){
            document.getElementById("brigo").disabled = false;
            document.getElementById("dembagnouma").disabled = false;
            document.getElementById("jorobana").disabled = false;
            document.getElementById("sotubaka").disabled = false;
            document.getElementById("snk").disabled = true;
            document.getElementById("pds").disabled = true;

          }
          else{
            document.getElementById("brigo").disabled = false;
            document.getElementById("dembagnouma").disabled = false;
            document.getElementById("jorobana").disabled = false;
            document.getElementById("sotubaka").disabled = false;
            document.getElementById("snk").disabled = false;
            document.getElementById("pds").disabled = false;

          }
        }
    });

    $('.mais_product').click(function(){
        if($(this).is(':checked')){
          //alert($(this).val());

          m_product = $(this).val();
          alert(m_product);
          $.ajax({                                      
                      url: 'client.php',                  //the script to call to get data  
                      type: 'post' ,        
                      data: "command=2&product="+m_product+"&ha="+hectare_size,                        //you can insert url argumnets here to pass to api.php
                                                      //for example "id=5&parent=6"
                      dataType: 'json',                //data format      
                      success: function(data)          //on recieve of reply
                      {
                        //alert("Finished ajax");
                        var packet_type = data[0];              //get id
                        var price = data[1];           //get name
                        //--------------------------------------------------------------------
                        // 3) Update html content
                        //--------------------------------------------------------------------
                        //$('#output').html("<b>id: </b>"+packet_type+"<b> name: </b>"+price); //Set output element html
                        //recommend reading up on jquery selectors they are awesome 
                        // http://api.jquery.com/category/selectors/
                        //$('#cfa_total').val(price);
                        
                        //Add the product to the table
                        //var r=$("#POITable").length; /* To get the total rows in the table */
                        //$("#POITable").eq(r-1).after('<tr><td>'+packet_type+'</td><td>'+hectare_size+'</td><td>'+m_product+'</td></tr>');
                        //$('#mais-options').hide();

                        insRow("Mais-"+packet_type,hectare_size,m_product,price);
                        $('input[name="mais_size"]').prop('checked', false);
                        $('input[name="mais_product"]').prop('checked', false);
                        $('#mais-options').hide();

                      } 
                });
        }
    });

//Arachide Functions

$('#arachide_button').click(function(){
      $('#arachide-options').show();
      $('#mais-options').hide();
      $('#cont4').css('opacity','1');

    });
  var a_hectare_size=0;
    var a_product='';
$('.arachide_size').click(function(){
        if($(this).is(':checked')){
          //alert($(this).val());

          a_hectare_size = $(this).val();
          document.getElementById("fleur11").disabled = false;
          document.getElementById("pds_arachide").disabled = false;
        }
    });


    $('.arachide_product1').click(function(){
        if($(this).is(':checked')){
          //alert($(this).val());

          a_product = $(this).val();
          alert(m_product);
          $.ajax({                                      
                      url: 'client.php',                  //the script to call to get data  
                      type: 'post' ,        
                      data: "command=2&product="+a_product+"&ha="+a_hectare_size,                        //you can insert url argumnets here to pass to api.php
                                                      //for example "id=5&parent=6"
                      dataType: 'json',                //data format      
                      success: function(data)          //on recieve of reply
                      {
                        //alert("Finished ajax");
                        var packet_type = data[0];              //get id
                        var price = data[1];           //get name
                        //--------------------------------------------------------------------
                        // 3) Update html content
                        //--------------------------------------------------------------------
                        //$('#output').html("<b>id: </b>"+packet_type+"<b> name: </b>"+price); //Set output element html
                        //recommend reading up on jquery selectors they are awesome 
                        // http://api.jquery.com/category/selectors/
                        //$('#cfa_total').val(price);
                        
                        //Add the product to the table
                        //var r=$("#POITable").length; /* To get the total rows in the table */
                        //$("#POITable").eq(r-1).after('<tr><td>'+packet_type+'</td><td>'+hectare_size+'</td><td>'+m_product+'</td></tr>');
                        //$('#mais-options').hide();

                        insRow("Arachide-"+packet_type,a_hectare_size,a_product,price);
                        $('input[name="arachide_size"]').prop('checked', false);
                        $('input[name="arachide_product1"]').prop('checked', false);
                        $('#arachide-options').hide();

                      } 
                });
        }
    });

  $('#mais_arachide_button').click(function(){
      $('#arachide-options').show();
      $('#mais-options').show();
      $('#cont4').css('opacity','1');

    });






//Final jquery close
  }); 
//functions below 
function insRow(rpacket_type,rhectare_size,rm_product,rprice)
{
    var x=document.getElementById('POITable');
    var new_row = x.rows[1].cloneNode(true);
    var len = x.rows.length;
    //new_row.cells[0].innerHTML = len;
 
    var inp1 = new_row.cells[0].getElementsByClassName('mais-opts')[0];
    inp1.id += len;
    inp1.value = rpacket_type;
    var inp2 = new_row.cells[1].getElementsByClassName('mais-opts')[0];
    inp2.id += len;
    inp2.value = rhectare_size;
    var inp3 = new_row.cells[2].getElementsByClassName('mais-opts')[0];
    inp3.id += len;
    inp3.value = rm_product;
    var inp4 = new_row.cells[3].getElementsByClassName('mais-opts')[0];
    inp4.id += len;
    inp4.value = rprice;
    
    x.appendChild( new_row );
    total_price = parseInt($('#cfa_total').val()) + parseInt(rprice);

    $('#cfa_total').val(total_price);

}

function deleteRow(row)
{
    var $cols = ($(row).closest('tr').find('td'))[3];
    //console.log($cols.children[0].value);
    rmv_price = $cols.children[0].value;
    cur_price = $('#cfa_total').val();
    $('#cfa_total').val(0);
    cur_price2 = parseInt(cur_price) - parseInt(rmv_price);
    $('#cfa_total').val(cur_price2);
    //var i=row.parentNode.parentNode.rowIndex;
    //document.getElementById('POITable').deleteRow(i);
    $(row).closest('tr').remove();

}