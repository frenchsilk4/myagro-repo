<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="static/images/myagrogreennotext3.ico">

    <title>Le Centre Nouveau Groupe</title>

    <!-- Bootstrap core CSS -->
    <link href="static/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="static/css/jquery-ui.css" />

  <link rel="stylesheet" type="text/css" href="static/css/style.css">
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
            <button type="submit" class="btn btn-success">Sign out</button>
          </form>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container" style="padding-left:5px; padding-right:5px;">

      <div class="starter-template">
      <div class="row">
            <div class="col-md-12" style="text-align:center; padding-top:20px;">
                <p><a class="btn btn-default" href="contracts.php" role="button">Nouveau Contrat &raquo;</a>&nbsp;&nbsp;&nbsp;
                   <a class="btn btn-default" href="groupcontracts.php" role="button">Nouveau Groupe &raquo;</a>
                </p>
             </div>
       </div>
     <div class="mainContainer">
      <div class='row'>
       <form method="post" action='add.php'>
          <input type="hidden" name="task" value="groups">
        <div class='col-md-6'>
          <div id='myagro_prof'>
            <div class="row">
              <div class="col-md-12">
                    <p class="r_subheaders" style="background-color:#fff; text-align:center;"><span class="round">1</span></p>
              </div>
            </div>
            <div>
                 <img class='space-image' src="static/images/whiteborderimage.png">
            </div>
            <div class="section1" id="cont1" style="padding-left:5px">
              <div id='myagro_id' style="width:100%;">
                <label for='myagro_num' style="color:red; font-weight:600;font-size:large;"><b>ID du groupe:</b></label>
                <span title="Entrez le numéro de client"><input type="text" width="15" class='populateInput' name='groupeID' autofocus="autofocus" id='myagro_groupeID' value="" /></span>
                <p style="text-align:center;">
                  <span class="glyphicon glyphicon-star"></span><b>Première saisir un identifiant groupe puis sur l'onglet pour continuer.</b>
                </p>
              </div>
            </div>
            <div class="section1" id="cont2" style="padding-left:5px;">
              <table width="100%">
                <tr>
                  <th>Nom du groupe</th>
                  <th>Village</th>
                </tr>
                  <tr>
                    <td><input type="text" class='populateInput' id="nomgroupe" name="nomgroupe" value="" size="15" /></td>
                    <td><input type="text" class='populateInput' id="village" name="village" value="" size="15" /></td>
                  </tr>
                  <tr>
                    <th>Présidente: ClientID</th>
                    <th >Mobilisatrice: ClientID</th>
                  </tr>
                  <tr>
                    <td>
                      <input type="number" class='populateInput' id='presidente' name="presidente" value="" size="10" />
                    </td>
                    <td><input type="number" class='populateInput' id='mobilisatrice' name="mobilisatrice" value="" size="10" /></td>
                  </tr>
                  <tr>
                  <th>Jour de réunion</th>
                  <th>Jour des paiements</th>
                </tr>
                  <tr>
                    <td>
                          <select name="jdr">
                            <option value="1">Lundi</option>
                            <option value="2">Mardi</option>
                            <option value="3" selected>Mercredi</option>
                            <option value="4">Jeudi</option>
                            <option value="5">Vendredi</option>
                            <option value="6">Samedi</option>
                            <option value="7">Dimanche</option>
                          </select>
                    </td>
                    <td>
                      <select name="jdp">
                            <option value="1">Lundi</option>
                            <option value="2">Mardi</option>
                            <option value="3" selected>Mercredi</option>
                            <option value="4">Jeudi</option>
                            <option value="5">Vendredi</option>
                            <option value="6">Samedi</option>
                            <option value="7">Dimanche</option>
                          </select>
                    </td>
                  </tr>
              </table>
            </div>
            <div>
              <img class='space-image' src="static/images/whiteborderimage.png" style="height:5px;"/>
            </div>
            <div class="row">
                  <div class="col-md-12">
                    <p class="r_subheaders" style="background-color:#fff; text-align:center;"><span class="round">2</span></p>
                  </div>
            </div>
            <div class="bonusimages">
            <div class="row">
              <div class="col-md-4">
                <input type="radio" name="bonus" value="BACKPACK" checked />&nbsp;&nbsp;<img src="static/images/bag.png" width="74.5" height="74.5" />
              </div>
              <div class="col-md-4">
                <input type="radio" name="bonus" value="BUCKET" />&nbsp;&nbsp;<img src="static/images/bucket.png" width="74.5" height="74.5"/>
              </div>
              <div class="col-md-4">
                <input type="radio" name="bonus" value="DAP" />&nbsp;&nbsp;<img src="static/images/dap.png" width="74.5" height="74.5"/>
              </div>

            </div>

            </div>
            <div class="row">
                  <div class="col-md-12">
                    <p class="r_subheaders" style="background-color:#fff; text-align:center;"><span class="round">3</span></p>
                  </div>
            </div>
            <div id='group-options' >
                <table class="group_members" style="margin: 0 auto;">
                  <tr>
                    <th>Code du Client</th>
                    <th>Nom</th>
                    <th>But CFA</th>
                  </tr>
                  <tr>
                    <td> <input type="number" class='populateInput' id='memberCode' name="memberCode" value="" size="15" /></td>
                    <td>
                      <input type="text" class='populateInput' id='nom' name="nom" value="" size="15" />
                    </td>
                    <td>
                      <input type="number" class='populateInput' id='butCFA' name="butCFA" value="" size="10" />
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3">
                      <input type="button" name="addmember" id="addmember" value="Add Member">
                    </td>
                  </tr>
                </table>
              </div>
              <div class="row">
                  <div class="col-md-12">
                    <p class="r_subheaders" style="background-color:#fff; text-align:center;"><span class="round">4</span></p>
                  </div>
            </div>
            <div style="padding-left:5px; text-align:center;">
              <div style="padding-bottom:10px; "><input type="submit" id='soumettre' class='myagro_button' value='SOUMETTRE'></div>
              <div style="padding-bottom:5px;"><input type="reset" class='myagro_button' value='RE-INITIALISER'></div>
            </div>
          </div>
        </div>
        <div class='col-md-6'>
          <div id='myagro_groupes' style="padding-right:5px">

            <div>
                <img class='space-image' src="static/images/whiteborderimage.png">
            </div>
            <h3> Membres du groupe 2015</h3>
            <div class="section1" id="cont5" >
              <div class="myagro_clients">
                <div id='clients_table' style="padding-bottom:2px;">
                  <table class="myagro_members" id="POITable">

                      <tr>
                        <td>Position</td>
                        <td>Code du Client</td>
                        <td>Nom</td>
                        <td>But CFA</td>
                        <td>Delete?</td>
                      </tr>
                      <tr>
                        <td><input size='15' class='groupe-opts' type="text" name='groupe[position][]' id="position" readonly="true" /></td>
                        <td><input size='15' class='groupe-opts' type="text" name='groupe[codes][]' id="codes" readonly="true" /></td>
                        <td><input size='10' class='groupe-opts' type="text" name='groupe[nom][]' id="nom" readonly="true" /></td>
                        <td><input size='10' class='groupe-opts' type="text" name= 'groupe[cfa][]' id="cfa" readonly="true"/></td>
                        <td style="width:2%;"><input type="button" id="delPOIbutton" value="X" onclick="deleteRow(this)"/></td>
                      </tr>
                  </table>
                </div>
              </div>
            </div>
            <div>
              <label for='cfa_total'>BUT CFA:</label><input type='text' id='cfa_total' name="cfa_total" value='0.000'/>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

</div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
        <script language="javascript" type="text/javascript" src="static/js/jquery-2.1.1.min.js"></script>
  <script language="javascript" type="text/javascript" src="static/js/myagro_script_groups.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <script src="static/js/jquery-ui.js"></script>
  </body>
</html>
