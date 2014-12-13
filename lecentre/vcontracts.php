<!<?php
include ('lock.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="static/images/myagrogreennotext3.ico">

    <title>Nouveau Contrat View</title>

    <!-- Bootstrap core CSS -->
    <link href="static/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <script language="javascript" type="text/javascript" src="static/js/jquery-2.1.1.min.js"></script>


  <link rel="stylesheet" type="text/css" href="static/css/style.css">
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
          <a class="navbar-brand" href="#">Le Centre - Nouveau Contrat</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="welcome.php">Home</a></li>
            <li><a href="contractslist.php">Liste de contrats</a></li>
            <li><a href="receiptslist.php">Liste de recus</a></li>
          </ul>
          <form class="navbar-form navbar-right" role="form" action='logout.php' method="post">
            <div class="form-group">
              <input type="text" placeholder="Email" readonly="true" value='<?php echo $_SESSION['login_user'];?>' class="form-control">
            </div>
            <button type="submit" id="signout" class="btn btn-success">Sign out</button>
          </form>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container" style="padding-left:5px; padding-right:5px;">
    <div class="starter-template">
<?php
//include ('lock.php');

$clientID  = $_POST['id'];
//$sql       = "SELECT client_c_2.clientID,client_c_2.Last_Name_c,client_c_2.First_Name_c,client_c_2.Village_c,client_c_2.Sex_c,client_c_2.Phone_c,estimates.jdp,estimates.mdp,estimates.ndpp FROM client_c_2,estimates WHERE client_c_2.clientID = $clientID AND client_c_2.Name = estimates.clientID";
$sql      ="SELECT client_c_2.Name as clientID,client_c_2.Last_Name_c,client_c_2.First_Name_c,client_c_2.Village_c,client_c_2.Sex_c,client_c_2.Phone_c,estimates.jdp,estimates.mdp,estimates.ndpp FROM client_c_2,estimates WHERE client_c_2.Name = $clientID AND client_c_2.Name = estimates.client_id";

$rs_result = mysqli_query($db, $sql);
$row       = $rs_result->fetch_assoc();
$lname = $row["Last_Name_c"];
$fname = $row["First_Name_c"];
$clientID =  $row['clientID']
?>

        <div class="mainContainer">
    <form method="post" action='add.php'>
        <div class="row">
          <div class="col-md-6">
            <div id='myagro_prof'>
          <div>
            <img class='space-image' src="static/images/whiteborderimage.png">
          </div>
            <div class="section1" id="cont1" style="padding-left:5px">
              <div id='myagro_id'>
                <label for='myagro_num' style="color:red; font-weight:600;font-size:large;"><b>Client ID:</b></label>
                <input type="text" width="30" name='myagro_num1' id='myagro_num1' value='<?php echo $clientID;?>' readonly="true" />
              </div>
              <div id='myagro_addr' style="float:right; text-align:right;">
                <img src="static/images/myagrogreen_2.png" style="width:85px; height:85px" alt="MyAgro">
              </div>
              <div style="clear:both;"></div>

            </div>
            <div class="section1" id="cont2" style="padding-left:5px">
              <table width="100%">
                <tr>
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>Numero</th>
                </tr>
                  <tr>
                    <td><input type="text" id="nom" name="nom" value="<?php echo $lname;?>" size="10" readonly="true" /></td>
                    <td><input type="text" id="prenom" name="prenom" value="<?php echo $fname;?>" size="10" readonly="true" /></td>
                    <td>
                      <input type="text" id="numero" name="numero" value="<?php echo $row["Phone_c"];?>">
                    </td>

                  </tr>
                  <tr>
                    <th>Sexe</th>
                    <th colspan="2">Village</th>
                  </tr>
                  <tr>
                    <td>
<?php
$sex = $row["Sex_c"];
if ($sex === 'Female') {
	?>
	<label for='male'>H:</label><input type="radio"  id='male' name="sex" value="Male">&nbsp;
																																				                                                        &nbsp;
																																				      <label for='female'>F:</label> <input type="radio" id='female' name="sex" value="Female" checked>
	<?php
} else {?>
	<label for='male'>H:</label><input type="radio"  id='male' name="sex" value="Male" checked>&nbsp;
																																				                                                        &nbsp;
																																				      <label for='female'>F:</label> <input type="radio" id='female' name="sex" value="Femae">

	<?php
}
?>
                    </td>
                    <td colspan='2'><input type="text" id='village' name="village" value="<?php echo $row["Village_c"];?>" size="15" readonly="true" /></td>
                  </tr>
                  <tr>
                  <th>Jour des palements</th>
                  <th>Montant des palements</th>
                  <th>Nombre des palements prevus</th>
                </tr>
                  <tr>
                    <td>
                          <input type="text" value="<?php echo $row["jdp"];?>" size="10" readonly="true">
                    </td>
                    <td>
                      <input type="text" value="<?php echo $row["mdp"];?>" size="10" readonly="true">
                    </td>
                    <td>
                      <input type="text" id="ndpp" name="ndpp" size="10" value="<?php echo $row["ndpp"];?>" readonly="true">
                    </td>

                  </tr>
              </table>
            </div>
            <div>
              <img class='space-image' src="static/images/whiteborderimage.png" style="height:10px;"/>
            </div>
            <div id='myagro_kiva' style="clear:both;">
              <h6> CONDITIONS GENERALES:</h6>
              <p style="text-align:left; font-size:x-small;">
                    Kiva et nous-memes souhaitons expliquer au public comment nos credits fonctionent afin que nous puissions etendre nos programmes. A ces fins, nous souhaitons utiliser votre photo, votre nom, des enregistrements video et audio (si disponibles) vous concernant, une description de votre entreprise et d'autres informations generales sur vous, votre credit actuel et d'autres credits que nous vous avons consentis dans le passe. En apposant votre signature ci-dessous, vous donnez votre accord pour que kiva et nous-memes, dans le cadre du programme de crdit utilisent ces informations n'importe quand et n'importe ou dans le monde (y compris, mais pas uniquement, sur l'Internet), dans le but d'expliquer nos programmes de credit et de les etendre. Nous nous efforcerons, et nous-memes, d'utiliser lesdites informations d'une facon refletant equitablement vos activites et nos relations, y compris en expliquant tout defaut de paiement ou non-remboursement.
              </p>
            </div>
            <div style="padding-left:5px; text-align:center;">
              <?php $vurl ="update_verify.php?ccid=".$row['clientID'];

              ?>
              <div style="padding-bottom:10px; "><a href='<?php echo $vurl;?>' class="btn btn-primary btn-lg active" role="button" style="background: #35b128;">FERMEZ LA PAGE</a></div>
              <div style="padding-bottom:5px;"></div>
            </div>
        </div>
            <!--end col-md-6-1-->
          </div>
          <div class="col-md-6">

            <div id='myagro_paquets' style="padding-right:5px">
        <div>
            <img class='space-image' src="static/images/whiteborderimage.png">
          </div>
          <h1> Choix des paquets 2015</h1>
          <div id='paquet-selection'>
            <input type="button" name="maisbutton" id="mais_button1" value="Ajouter paquet mais" disabled="true">
            <input type="button" name="maisbutton" id="arachide_button1" value="Ajouter paquet arachide" disabled="true">
          </div>
          <div class="section1" id="cont4" >
            <div class="myagro_prod">
              <div id='paquets_table' style="padding-bottom:2px;">
                <table class="myagro_products" id="POITable">

                    <tr>
                      <td>objectif d'épargne</td>
                      <td>Paquets</td>
                      <td>HA</td>
                      <td>Semence</td>
                      <td>CFA</td>
                      <td>Delete?</td>
                    </tr>
<?php
//$sql                = "SELECT Saving_Goal_Name, product_c, TOTAL_HECTARES, Product_Name_c, TOTAL_PRICE FROM main_client_view WHERE clientID = '$clientID'";
$sql                ="select savings_goal_c.Name as Saving_Goal_Name, savings_goal_c.CreatedDate,savings_goal_c.Id as sgID,goal_items_c.product_c,goal_items_c.Product_Name_c, sum(goal_items_c.Goal_Item_Price_c) as TOTAL_PRICE, sum(goal_items_c.Desired_Units_c) as TOTAL_HECTARES from savings_goal_c, goal_items_c where savings_goal_c.Client_c ='$clientID' AND savings_goal_c.Name=goal_items_c.Savings_Goal_c";
$total_price_amount = 0;
$rs_result          = mysqli_query($db, $sql);

while ($row = mysqli_fetch_array($rs_result, MYSQLI_ASSOC)) {
	$total_price_amount += $row["TOTAL_PRICE"];
	?>
																																				                                                              <tr>
																																				                                                                <td><input size='10' class='mais-opts' type="text" value='<?php echo $row["Saving_Goal_Name"];?>' id="ode" readonly="true" /></td>
																																				                                                                <td><input size='10' class='mais-opts' type="text" value='<?php echo $row["product_c"];?>' id="mais" readonly="true" /></td>
																																				                                                                <td><input size='5' class='mais-opts' type="text" value='<?php echo $row["TOTAL_HECTARES"];?>' id="ha" readonly="true"/></td>
																																				                                                                <td><input size='15' class='mais-opts' type="text" value='<?php echo $row["Product_Name_c"];?>' id="semence" readonly="true"/></td>
																																				                                                                <td><input size='5' class='mais-opts' type="text" value='<?php echo $row["TOTAL_PRICE"];?>' id="cfa_sub_total" readonly="true"/></td>
																																				                                                                <td style="width:2%;"><input type="button" id="delPOIbutton" value="X" onclick=""/></td>
																																				                                                              </tr>
	<?php
}
?>
                </table>
              </div>
              <div id='mais-options' >
              </div>
              </table>
            </div>
            <div class='myagro_prod' id="arachide-options">
            </div>
          </div>
          <div>
            <label for='cfa_total'>BUT CFA Total:</label><input type='text' id='cfa_total' name="cfa_total" value=<?php echo $total_price_amount;?> readonly="true" />
          </div>
        <input type="hidden" name="total_ha" id='total_ha' value="0">
        <input type="hidden" name="sg_name" id='sg_name' value="0">
        <input type="hidden" name="client_exists" id='client_exists' value="0">
    </form>
    <div id='myagro_clear'>
      <div style="padding-top:20px;">
          <div style="padding-bottom:10px; ">
            <input type="button" id='ajoutez_note_button' class='myagro_button' value='Ajoutez une note'>
          </div>
          <div id='errors'>
          <form method="post" action="sendEmail.php" name="notesForm" id="notesForm">
            <input type="hidden" name="clientID_v" value='<?php echo $clientID;?>'>
            <label for="email">Email Address *</label>
            <input  type="text" name="email" maxlength="80" size="30" value='<?php echo $_SESSION['login_user'];?>' readonly="true">
            <input type="hidden" name="task" value="notes">
                <textarea id="comments" name="comments" cols="75" rows="5" readonly="true" >
                  Cliquez sur le bouton ci-dessus pour ajouter un commentaire à ce contrat ici ...
                </textarea><br>
            <input type="submit" id='note_btn' value="soumettre la note" />
          </form>
        </div>
          </div>
        </div>
    </div>
  </div>

            <!-- end col-md-6-2-->
          </div>
        </div>

      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="static/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(function(){
      $('#ajoutez_note_button').click(function(){
    $('#comments').prop('readonly', false);

});
      $('#note_btn').click(function(){
        alert('done');
        document.getElementById("notesForm").submit();
        //$('#notes-form').submit();
      })
    })
    </script>
  </body>
</html>
