 $(function () 
  {

    //-----------------------------------------------------------------------
    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
    //-----------------------------------------------------------------------
    $('#myagro_num').focusout(function(){
      //alert("getting to ajax");
          var idfield = $('#myagro_num').val();
          if (idfield == null || idfield == "") {
            $(this).focus();
        }
        $('#mais_button').prop('disabled',false);
        $('#arachide_button').prop('disabled',false);

      $.ajax({                                      
        url: 'client.php',                  //the script to call to get data  
        type: 'GET' ,        
        data: 'command=1&id='+idfield,                        //you can insert url argumnets here to pass to api.php
                                        //for example "id=5&parent=6"
        dataType: 'json',                //data format      
        success: function(data)          //on recieve of reply
        {
          //var a_size = data.length;
          //alert(a_size);
          if(data.First_Name_c != null || data.First_Name_c != ""){
            //alert("Finished ajax");
            var fname = data.First_Name_c;              //get id
            var lname = data.Last_Name_c; 
            var village = data.Village_c;
           // var sex = data[3].toUpperCase();
           var sex = data.Sex_c;
           var numero = data.Phone_c;          //get name
           //var a_size = data.length;

            if(fname == null || fname==""){$('#client_exists').val(1);}
            //--------------------------------------------------------------------
            // 3) Update html content
            //--------------------------------------------------------------------
            $('#output').html("<b>id: </b>"+fname+"<b> name: </b>"+lname); //Set output element html
            //recommend reading up on jquery selectors they are awesome 
            // http://api.jquery.com/category/selectors/
            $('#nom').val(lname);
            $('#prenom').val(fname);
            $('#village').val(village);
            $('#numero').val(numero);
            if(sex == 'FEMAL'){
              $('#female').prop('checked',true);
            }
            else {$('#male').prop('checked',true);}
          }
        } 
      });
    });
    
    $('#village').focus(function(){
  $(this).autocomplete({
    source: function( request, response ) {
        $.ajax({
          type: 'GET',
          url: "dblookup.php?task=VILLAGE",
          contentType: "application/json; charset=utf-8",
          dataType: "json",
          data: {
            'q': request.term
          },
          success: function(data) {
            //console.log('Success' + data);
            response(data.suggestions.slice(0,10));
          },
          error: function(message){
                                alert('Error' + message);
                                console.log(message);
                            }
        });
      },
     minLength:2,
     select: function( event, ui ) {
        var elemString = ui.item.label;
        //var elems = elemString.split(",");
        //$('#boutiquier_village').val(elems[1]);
        //$('#boutiquier_Nom').val(elems[2]);
      },
      change: function( event, ui ) {
                if ( !ui.item ) {
                  var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex($(this).val()) + "$", "i" ), valid = false;

                    if ($(this).text().match(matcher)) {
                      this.selected = valid = true;
                      return false;
                    }

                  if (!valid) {
                    // remove invalid value, as it didn't match anything
                    $(this).val("");
                    //select.val("");
                    //input.data("autocomplete").term = "";
                    return false;
                  }
                }
        }
      //close autocomplete
    });

  //close focus
});
    
    $('#mais_button').click(function(){
      $('#mais-options').show();
      $('#arachide-options').hide();
      $('#mais-section').css('opacity','1');
      //var sg_name = $('#myagro_num').val() +"-"+ new Date().getFullYear()
      var sg_name = $('#myagro_num').val() +"-2015";
      alert(sg_name);
      $('#sg_name').val(sg_name);

    });
    var hectare_size=0;
    var m_product='';
    $('.mais_size').click(function(){
        if($(this).is(':checked')){
          //alert($(this).val());

          hectare_size = $(this).val();
          if(hectare_size < 0.125){
            document.getElementById("brigo").disabled = false;
            document.getElementById("dembagnouma").disabled = false;
            document.getElementById("jorobana").disabled = false;
            document.getElementById("sotubaka").disabled = false;
            document.getElementById("snk").disabled = false;
            document.getElementById("tieba").disabled = false;
            document.getElementById("pds").disabled = true;

          }
          else{
            document.getElementById("brigo").disabled = false;
            document.getElementById("dembagnouma").disabled = false;
            document.getElementById("jorobana").disabled = false;
            document.getElementById("sotubaka").disabled = false;
            document.getElementById("snk").disabled = false;
            document.getElementById("pds").disabled = false;
            document.getElementById("snk").disabled = false;
            document.getElementById("tieba").disabled = false;

          }
        }
    });

    //$('#otherval').on("select", function() {hectare_size = this.value;});
  $('#otherval').change(function(){hectare_size = parseFloat($( "#otherval option:selected" ).text());
    if (hectare_size === 0.0625) {
            document.getElementById("brigo").disabled = true;
            document.getElementById("dembagnouma").disabled = true;
            document.getElementById("jorobana").disabled = true;
            document.getElementById("sotubaka").disabled = true;
            document.getElementById("snk").disabled = false;
            document.getElementById("tieba").disabled = false;
            document.getElementById("pds").disabled = true;

    };
});

    $('.mais_product').click(function(){
        if($(this).is(':checked')){
          //alert($(this).val());

          m_product = $(this).val();

          $.ajax({                                      
                      url: 'client.php',                  //the script to call to get data  
                      type: 'GET' ,        
                      data: 'command=2&product='+m_product+'&ha='+hectare_size,                        //you can insert url argumnets here to pass to api.php
                                                      //for example "id=5&parent=6"
                      dataType: 'json',  
                      async: false,               //data format      
                      success: function(data)          //on recieve of reply
                      {
                        //alert("Finished ajax");
                        var packet_type = data.product_name;              //get id
                        var price = data.min_pa; 
                        var low_size=data.min_ha;          //get name
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
                        var paq_price = parseFloat(hectare_size/low_size) * parseFloat(price)
                        insRow(packet_type,hectare_size,m_product,paq_price,"POITable");
                        $('input[name="mais_size"]').prop('checked', false);
                        $('input[name="mais_product"]').prop('checked', false);
                        //$('#mais-options').hide();

                      },
                      error: function(xhr, textStatus, errorThrown){alert("an error occurred in mais product ajax call:"+ xhr +":"+ textStatus+":"+errorThrown);} 
                });
        }
    });

//Arachide Functions

$('#arachide_button').click(function(){
      $('#arachide-options').show();
      $('#mais-options').hide();
      $('#arachide-section').css('opacity','1');
      //var sg_name = $('#myagro_num').val() +"-"+ new Date().getFullYear()
      var sg_name = $('#myagro_num').val() +"-2015";

    });
  var a_hectare_size=0;
    var a_product='';
$('.arachide_size').click(function(){
        if($(this).is(':checked')){
          //alert($(this).val());

          a_hectare_size = $(this).val();
          if(a_hectare_size < 0.125)
          {document.getElementById("pds_arachide").disabled = true;}
        else{
          document.getElementById("fleur11").disabled = false;
          document.getElementById("pds_arachide").disabled = false;}
        }
    });


    $('.arachide_product1').click(function(){
        if($(this).is(':checked')){
          //alert($(this).val());

          a_product = $(this).val();
          $.ajax({                                      
                      url: 'client.php',                  //the script to call to get data  
                      type: 'GET',        
                      data: 'command=2&product='+a_product+'&ha='+a_hectare_size,                        //you can insert url argumnets here to pass to api.php
                                                      //for example "id=5&parent=6"
                      dataType: 'json',                //data format
                      async: false,      
                      success: function(data)          //on recieve of reply
                      {
                        //alert("Finished ajax");
                        var packet_type = data.product_name;              //get id
                        var price = data.min_pa; 
                        var low_size=data.min_ha;          //get name
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
                        var a_paq_price = parseFloat(a_hectare_size/low_size) * parseFloat(price)
                        insRow(packet_type,a_hectare_size,a_product,a_paq_price,"POITable2");
                        $('input[name="arachide_size"]').prop('checked', false);
                        $('input[name="arachide_product1"]').prop('checked', false);
                        //$('#arachide-options').hide();

                      },
                      error: function(xhr, textStatus, errorThrown){alert("an error occurred in arachide product ajax call:"+ xhr +":"+ textStatus+":"+errorThrown);} 

                });
        }
    });

  $('#kiva').change(function(){
      if( $(this).is(':checked') ) {
        $(this).val(1);
      }
      else{$(this).val(0);}

    });

//Final jquery close
  }); 
//functions below 
function insRow(rpacket_type,rhectare_size,rm_product,rprice,table)
{
    var x=document.getElementById(table);
    var new_row = x.rows[1].cloneNode(true);
    var len = x.rows.length;
    //new_row.cells[0].innerHTML = len;

    var inp0 = new_row.cells[0].getElementsByClassName('mais-opts')[0];
    inp0.id += len;
    inp0.value = $('#myagro_num').val() +"-2015"+"-"+(len-1);
   // inp0.value = $('#myagro_num').val() +"-"+ new Date().getFullYear()+"-"+(len-1);

    var inp1 = new_row.cells[1].getElementsByClassName('mais-opts')[0];
    inp1.id += len;
    inp1.value = rpacket_type;
    var inp2 = new_row.cells[2].getElementsByClassName('mais-opts')[0];
    inp2.id += len;
    inp2.value = rhectare_size;
    var inp3 = new_row.cells[3].getElementsByClassName('mais-opts')[0];
    inp3.id += len;
    inp3.value = rm_product;
    var inp4 = new_row.cells[4].getElementsByClassName('mais-opts')[0];
    inp4.id += len;
    inp4.value = rprice;
    
    x.appendChild( new_row );
    total_price = parseInt($('#cfa_total').val()) + parseInt(rprice);
    total_ha = parseFloat($('#total_ha').val()) + parseFloat(rhectare_size);

    $('#cfa_total').val(total_price);
    $('#total_ha').val(total_ha);

}

function deleteRow(row)
{
    var $cols = ($(row).closest('tr').find('td'))[4];
    var $ha_cols = ($(row).closest('tr').find('td'))[2];
    //console.log($cols.children[0].value);
    rmv_price = $cols.children[0].value;
    cur_price = $('#cfa_total').val();
    $('#cfa_total').val(0);
    cur_price2 = parseInt(cur_price) - parseInt(rmv_price);
    $('#cfa_total').val(cur_price2); 
    //var i=row.parentNode.parentNode.rowIndex;
    //document.getElementById('POITable').deleteRow(i);
    rmv_ha = $ha_cols.children[0].value;
    cur_ha = $('#total_ha').val();
    cur_ha2 = parseFloat(cur_ha) - parseFloat(rmv_ha);
    $('#total_ha').val(cur_ha2);

    $(row).closest('tr').remove();

}