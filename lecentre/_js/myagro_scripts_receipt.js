$(function(){

  $('#agentZone').prop('readonly',true);
  $('#agent_Nom').prop('readonly',true);
  $('#boutiquier_Nom').prop('readonly',true);
  $('#boutiquier_village').prop('readonly',true);
  $('.receiptEdit').prop('readonly',true);
  $('.receiptNotEdit').prop('readonly',true);
 // $( "#dom_date" ).datepicker.setDefaults( $.datepicker.regional[ "fr" ] );

	$( "#dom_date" ).datepicker({
             // changeMonth: true,//this option for allowing user to select month
             // changeYear: true //this option for allowing user to select from year range
            },
            $.datepicker.regional['fr']);

            $( "#cda_date" ).datepicker({
             // changeMonth: true,//this option for allowing user to select month
             // changeYear: true //this option for allowing user to select from year range
            },
            $.datepicker.regional['fr']);

            $('#cda_heure').timepicker({ 'timeFormat': 'H:i:s' , 'step':15});
            $('#dom_heure').timepicker({ 'timeFormat': 'H:i:s', 'step':15 });

          var frmvalidator = new Validator("receipt_Form");
          frmvalidator.addValidation("receipt_id","req","Please enter Recu numero");
          frmvalidator.addValidation("receipt_id","maxlen=5","Max length for Recu is 5");

/*$('#receipt_id').bind('focusout', function(e){
          var idfield = $(this).val();
          if (idfield == null || idfield == "") {
            alert("Provide a receipt number");
            e.preventDefault();
            $(this).focus();
        }
      });*/



$('#agentID').autocomplete({
    source: function( request, response ) {
        $.ajax({
          type: 'GET',
          url: "dblookup.php?task=AGENTS",
          contentType: "application/json; charset=utf-8",
          dataType: "json",
          data: {
            'q': request.term,
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
        var elems = elemString.split(",");
        $('#agent_Nom').val(elems[1]);
        $('#agentZone').val(elems[2]);
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
      //
    });

$('#boutiquier_id').focus(function(){
  var agent_id = $('#agentID').val()
  $(this).autocomplete({
    source: function( request, response ) {
        $.ajax({
          type: 'GET',
          url: "dblookup.php?task=VENDOR",
          contentType: "application/json; charset=utf-8",
          dataType: "json",
          data: {
            'q': request.term,
            'ba': agent_id
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
        var elems = elemString.split(",");
        $('#boutiquier_village').val(elems[1]);
        $('#boutiquier_Nom').val(elems[2]);
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
$('#edit').on('click', function(){
  $('.receiptEdit').prop('readonly',false);
  $('#isEdited').val('true');
  $('#edit').hide();
});

$('#delete').on('click',function(){
  $('#sub_task').val('delete');
  $('form').submit();
})
//Close of jquery main
})