$(function(){
	// body...
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
});

$('#addmember').on('click',function(){
	var membercode = $('#memberCode').val();
	var nom = $('#nom').val();
	var butCFA = $('#butCFA').val();

	if(membercode == null || membercode ==""){
		alert("Incomplete Information. Make sure all fields are completed");
		$('#memberCode').focus();
	}
	if(nom == null || nom==""){
		alert("Incomplete Information. Enter client Name");
		$('#nom').focus();
	}
	else{
		var r = insRow(membercode, nom, butCFA);
		if(r === 1)
		{
			$('#memberCode').val('');
			$('#nom').val('');
			$('#butCFA').val('');

		}
		else{
			alert("This group is full. Maximum number in a group is 12");
		}
	}

});


//Final jquery close
});

var teamCount =0;
//function classes
function insRow(membercode,nom,butCFA)
{
	if(teamCount <=8)
	{
    var x=document.getElementById('POITable');
    var new_row = x.rows[1].cloneNode(true);
    var len = x.rows.length;
    //new_row.cells[0].innerHTML = len;

    var inp0 = new_row.cells[0].getElementsByClassName('groupe-opts')[0];
    inp0.id += len;
    inp0.value = len-1;

    var inp1 = new_row.cells[1].getElementsByClassName('groupe-opts')[0];
    inp1.id += len;
    inp1.value = membercode;
    var inp2 = new_row.cells[2].getElementsByClassName('groupe-opts')[0];
    inp2.id += len;
    inp2.value = nom;
    var inp3 = new_row.cells[3].getElementsByClassName('groupe-opts')[0];
    inp3.id += len;
    inp3.value = butCFA;
    
    x.appendChild( new_row );
    total_price = parseInt($('#cfa_total').val()) + parseInt(butCFA);

    $('#cfa_total').val(total_price);

    return 1;
}
else{
	return 0;
}
}

function deleteRow(row)
{
    var $cols = ($(row).closest('tr').find('td'))[3];
    var $ha_cols = ($(row).closest('tr').find('td'))[2];
    //console.log($cols.children[0].value);
    rmv_price = $cols.children[0].value;
    cur_price = $('#cfa_total').val();
    $('#cfa_total').val(0);
    cur_price2 = parseInt(cur_price) - parseInt(rmv_price);
    $('#cfa_total').val(cur_price2);
    $(row).closest('tr').remove();

}
