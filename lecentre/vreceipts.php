<!DOCTYPE html>
<!<?php
include ('lock.php');
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/myagrogreennotext3.ico">

    <title>Le Centre Receipts</title>

    <!-- Bootstrap core CSS -->
    <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="_css/style.css">
    <link rel="stylesheet" href="_css/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="_css/jquery.timepicker.css" />

    <!-- Custom styles for this template -->
    <link href="_css/starter-template.css" rel="stylesheet">
    <style type="text/css">
     .round
    {
    display: inline-block;
    height: 30px;
    width: 30px;
    line-height: 30px;

    -moz-border-radius: 15px;
    border-radius: 15px;

    background-color: black;
    color: white;
    text-align: center;
    font-size: 1em;
    }
    </style>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="welcome.php">Le Centre</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="welcome.php">Home</a></li>
             <li><a href="contractslist.php">Liste de contrats</a></li>
            <li><a href="receiptslist.php">Liste de recus</a></li>
          </ul>
          <form class="navbar-form navbar-right" role="form" action='logout.php' method="post">
            <div class="form-group">
              <input type="text" placeholder="Email" readonly="true" value='<?php echo $login_session;?>' class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign out</button>
          </form>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
<?php
//include ('lock.php');

$receiptID = $_POST['id'];
$sql       = "SELECT * FROM receipt_view WHERE id = '$receiptID' AND isDeleted=0";
$rs_result = mysqli_query($db, $sql);
$row       = $rs_result->fetch_assoc();
//var_dump($row);
?>
        <form id="receipt_Form" method="post" action='addReceipts.php'>
        <input type="hidden" name="task" value="receipts">
        <input type="hidden" name="sub_task" id="sub_task" value="update">
        <input type="hidden" name="receipt_updateID" value='<?php echo $receiptID;?>'>
        <input type="hidden" name="isEdited" id="isEdited" value="false">
          <div class="row">
            <div class="col-sm-12">
                <div class="row">
                  <div class="col-md-6">
                    <img src="images/myagrogreennotext.png" style="width:115px; height:115px" alt="MyAgro">
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" style="padding-top:20px;">
                        <label for="receipt_id" class="col-sm-3 control-label" style="font-weight:bold; color:red;">Receipt No#</label>
                        <div class="col-sm-9 input-group">
                          <input type="number" class="form-control receiptNotEdit" id="receipt_id" name="receipt_id"  autofocus="autofocus"  value=<?php echo $row['Receipt_Number'];?>>
                        </div>
                        <p class="coll_aux_boutiquiers">COLLECTE AUX BOUTIQUIERS</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <p class="r_subheaders"><span class="round">1</span> Collect d'Argent</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="cda_date" class="col-sm-2 control-label">Date</label>
                        <div class="col-sm-8 input-group">
                          <input type="text" class="form-control receiptNotEdit" id="cda_date" name="cda_date" value='<?php echo $row['coll_date'];?>'>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="cda_heure" class="col-sm-3 control-label">Heure</label>
                      <div class="col-sm-9 input-group">
                        <input type="text" class="form-control receiptNotEdit" id="cda_heure" name="cda_heure" value=<?php echo $row['coll_time'];?>>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="agent_ID" class="col-sm-3 control-label">AgentID</label>
                        <div class="col-sm-9 input-group">
                          <input type="text" class="form-control receiptNotEdit" id="agentID" name="agentID" placeholder="AgentID" value='<?php echo $row['BA_id'];?>'>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                        <label for="agent_Zone" class="col-sm-2 control-label">Agent Zone</label>
                        <div class="col-sm-10 input-group">
                          <input type="text" class="form-control" id="agentZone" name="agentZone" placeholder="Agent Zone" value='<?php echo $row['zone'];?>'>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="agent_Nom" class="col-sm-2 control-label">Agent Nom</label>
                        <div class="col-sm-10 input-group">
                          <input type="text" class="form-control" id="agent_Nom" name="agent_Nom" value='<?php echo $row['BA_name'];?>'>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="boutiquier_id" class="col-sm-4 control-label">Boutiquier ID</label>
                        <div class="col-sm-8 input-group">
                          <input type="text" class="form-control receiptNotEdit" id="boutiquier_id" name="boutiquier_id" value='<?php echo $row['Vendor_id'];?>'>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                        <label for="boutiquier_village" class="col-sm-4 control-label">Boutiquier Village</label>
                        <div class="col-sm-8 input-group">
                          <input type="text" class="form-control" id="boutiquier_village" name="boutiquier_village" value='<?php echo $row['village'];?>'>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="boutiquier_Nom" class="col-sm-2 control-label">Boutiquier Nom</label>
                        <div class="col-sm-10 input-group">
                          <input type="text" class="form-control" id="boutiquier_Nom" name="boutiquier_Nom" value='<?php echo $row['vendor_name'];?>'>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="montant_paye" class="col-sm-2 control-label">Montant paye en chiffres</label>
                      <div class="col-sm-10 input-group">
                        <input type="number" class="form-control receiptNotEdit" id="montant_paye" name="montant_paye" value='<?php echo $row['Collected_Amount'];?>'>
                        <span class="input-group-addon">CFA</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="montant_ecrit" class="col-sm-2 control-label">Montant ecrit en mots</label>
                      <div class="col-sm-10 input-group">
                        <input type="number" class="form-control receiptNotEdit" id="montant_ecrit" name="montant_ecrit" value="Montant ecrit en mots">
                      </div>
                    </div>
                </div>
            </div>
          </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-12">
                        <p class="r_subheaders"><span class="round">2</span> Compte des Cartes</p>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-2"><span class="t_letters"> A </span>
                      </div>
                      <div class="col-md-2"><span class="t_letters">B</span>
                      </div>
                      <div class="col-md-3"><span class="t_letters">C</span>
                      </div>
                      <div class="col-md-2"><span class="t_letters">D</span>
                      </div>
                      <div class="col-md-3"><span class="t_letters">E</span>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-2"><span class="t_letters"> Valeur de carte </span>
                      </div>
                      <div class="col-md-2"><span class="t_letters">Nombre total des cartes distribuées</span>
                      </div>
                      <div class="col-md-3"><span class="t_letters">Compte restant </span>
                      </div>
                      <div class="col-md-2"><span class="t_letters">Cartes vendues <br> [B – C]</span>
                      </div>
                      <div class="col-md-3"><span class="t_letters">Valeurs des cartes vendues <br> [A x D]</span>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-2"><span class="t_cartes"> 500 </span>
                      </div>
                      <div class="col-md-2 t_letters1">
                      </div>
                      <div class="col-md-3">
                        <div class="col-sm-12 input-group">
                          <input type="text" class="form-control populateInput receiptEdit" id="cr_500" name="cr_500"  value='<?php echo $row['count_500'];?>'>
                        </div>
                      </div>
                      <div class="col-md-2 t_letters1">
                      </div>
                      <div class="col-md-3"><p class="t_letters1"></p>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-2"><span class="t_letters"> 1000 </span>
                      </div>
                      <div class="col-md-2 t_letters1">
                      </div>
                      <div class="col-md-3">
                        <div class="col-sm-12 input-group">
                          <input type="text" class="form-control populateInput receiptEdit" id="cr_1000" name="cr_1000"  value='<?php echo $row['count_1000'];?>'>
                        </div>
                      </div>
                      <div class="col-md-2 t_letters1">
                      </div>
                      <div class="col-md-3"><p class="t_letters1"></p>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-2"><span class="t_num"> 2000 </span>
                      </div>
                      <div class="col-md-2 t_letters1">
                      </div>
                      <div class="col-md-3">
                        <div class="col-sm-12 input-group">
                          <input type="text" class="form-control populateInput receiptEdit" id="cr_2000" name="cr_2000"  value='<?php echo $row['count_2000'];?>'>
                        </div>
                      </div>
                      <div class="col-md-2 t_letters1">
                      </div>
                      <div class="col-md-3"><p class="t_letters1"></p>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-2"><span class="t_num"> 5000 </span>
                      </div>
                      <div class="col-md-2 t_letters1">
                      </div>
                      <div class="col-md-3">
                        <div class="col-sm-12 input-group">
                          <input type="text" class="form-control populateInput receiptEdit" id="cr_5000" name="cr_5000"  value='<?php echo $row['count_5000'];?>'>
                        </div>
                      </div>
                      <div class="col-md-2 t_letters1">
                      </div>
                      <div class="col-md-3"><p class="t_letters1"></p>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-2"><span class="t_num"> 8000 </span>
                      </div>
                      <div class="col-md-2 t_letters1">
                      </div>
                      <div class="col-md-3">
                        <div class="col-sm-12 input-group">
                          <input type="text" class="form-control populateInput receiptEdit" id="cr_8000" name="cr_8000"  value='<?php echo $row['count_8000'];?>'>
                        </div>
                      </div>
                      <div class="col-md-2 t_letters1">
                      </div>
                      <div class="col-md-3 "><p class="t_letters1"></p>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-2"><span class="t_num"> 10000 </span>
                      </div>
                      <div class="col-md-2 t_letters1"><span class="t_letters1"></span>
                      </div>
                      <div class="col-md-3">
                        <div class="col-sm-12 input-group">
                          <input type="text" class="form-control populateInput receiptEdit" id="cr_10000" name="cr_10000"  value=<?php echo $row['count_10000'];?>>
                        </div>
                      </div>
                      <div class="col-md-2 t_letters1">
                      </div>
                      <div class="col-md-3 "><p class="t_letters1"></p>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-2">
                        <span class="t_num"> 25000 </span>
                      </div>
                      <div class="col-md-2 t_letters1">
                      </div>
                      <div class="col-md-3">
                        <div class="col-sm-12 input-group">
                          <input type="text" class="form-control populateInput receiptEdit" id="cr_25000" name="cr_25000" value=<?php echo $row['count_25000'];?>>
                        </div>
                      </div>
                      <div class="col-md-2 t_letters1">
                      </div>
                      <div class="col-md-3 "><p class="t_letters1"></p>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-10" style="text-align:right;"><span class="t_letters"> Valeur total des cartes vendues cumul à ce jour </span>
                      </div>
                      <div class="col-md-2">
                        <span class="t_num">
                          <input type="text" class="form-control populateInput receiptEdit" id="vtc" name="vtc"  value=<?php echo $row['SumOfCards'];?>>
                        </span>
                      </div>
                      </div>
                  </div>
            </div>

          <div class="row">
            <div class="col-md-12">
                <div class="row">
                  <div class="col-md-12">
                    <p class="r_subheaders"><span class="round">3</span> Dépôt à Orange Money</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="dom_date" class="col-sm-2 control-label">Date</label>
                        <div class="col-sm-8 input-group">
                          <input type="text" class="form-control  receiptNotEdit" id="dom_date" name="dom_date" value=<?php echo $row['deposit_date'];?>>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                          <label for="no_tel" class="col-sm-3 control-label">No de Tél.</label>
                          <div class="col-sm-9 input-group">
                            <input type="number" class="form-control  receiptNotEdit" id="no_tel" name="no_tel" value=<?php echo $row['deposit_phone'];?>>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="dom_heure" class="col-sm-3 control-label">Heure</label>
                        <div class="col-sm-9 input-group">
                          <input type="text" class="form-control receiptNotEdit" id="dom_heure" name="dom_heure" value=<?php echo $row['deposit_time'];?>>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                        <label for="ref_num" class="col-sm-2 control-label">Ref No</label>
                        <div class="col-sm-10 input-group">
                          <input type="text" class="form-control receiptNotEdit" id="ref_num" name="ref_num" value=<?php echo $row['deposit_reference'];?>>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12" style="text-align:center; padding-top:20px;">
              <div class="col-md-4">
                <div class="form-group">
                  <input type="submit" id='verifier' name='taskbutton' class='myagro_button' value='verifier'>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input type="button" id='edit' name='edit' class='myagro_button' value='edit'>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input type="button" id='delete' name='taskbutton' class='myagro_button' value='delete'>
                </div>
              </div>
            </div>

          </div>
        </form>
      </div>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="_js/jquery-2.1.1.min.js"></script>
    <script src="_bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="_js/ie10-viewport-bug-workaround.js"></script>
    <script src="_js/jquery-ui.js"></script>
     <script type="text/javascript" src="_js/jquery.timepicker.min.js"></script>
     <script src="_js/gen_validatorv4.js" type="text/javascript"></script>
     <script type="text/javascript" src="_js/myagro_scripts_receipt.js"></script>
    <script type="text/javascript">

    </script>
  </body>
</html>