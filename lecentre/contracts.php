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
    <link rel="icon" href="images/myagrogreennotext3.ico">

    <title>Nouveau Contrat</title>

    <link rel="stylesheet" type="text/css" href="_bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="_css/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="_css/style.css" />
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
             <li><a href="searchpage.php">Chercher contrats</a></li>
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
      <form method="post" action='add.php'>
        <input type="hidden" name="task" value="contrats">
          <div class="row">
            <div class="col-md-6">
            <!--open col-md-6-->
                  <div id='myagro_prof'>
          <div class="row">
            <div class="col-md-12">
                      <p class="r_subheaders" style="background-color:#fff; text-align:center;"><span class="round">1</span></p>
            </div>
          </div>
          <div>
            <img class='space-image' src="images/whiteborderimage.png">
          </div>
          <div class="section1" id="cont1" style="padding-left:5px">
              <div id='myagro_id' style="width:50%;">
                <label for='myagro_num' style="color:red; font-weight:600;font-size:large;"><b>Client ID:</b></label>
                <span title="Entrez le numéro de client">
                  <input type="text" width="30" class='populateInput' name='myagro_num' autofocus="autofocus" id='myagro_num' value="" /></span>
                <p style="text-align:left;">
                  <span class="glyphicon glyphicon-star"></span><b>Première saisir un identifiant client puis sur l'onglet pour continuer.</b>
                </p>
              </div>
              <div id='myagro_addr' style="float:right; text-align:right;">
                <img src="images/myagrogreen_2.png" style="width:85px; height:85px" alt="MyAgro">
              </div>
              <div style="clear:both;"></div>
          </div>
          <div class="section1" id="cont2" style="padding-left:5px;">
              <table width="100%">
                <tr>
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>Numero</th>
                </tr>
                <tr>
                    <td><input type="text" class='populateInput' id="nom" name="nom" value="" size="15" /></td>
                    <td><input type="text" class='populateInput' id="prenom" name="prenom" value="" size="15" /></td>
                    <td>
                      <input type="number"  class='populateInput' id="numero" name="numero" value="" onkeydown="if(this.value.length==9) this.value=this.value.slice(0,-1);"/>
                    </td>

                </tr>
                  <tr>
                    <th>Sexe</th>
                    <th colspan="2">Village</th>
                  </tr>
                  <tr>
                    <td>
                      <label for='male'>H:</label><input type="radio"  id='male' name="sex" value="Male">&nbsp;
&nbsp;
                      <label for='female'>F:</label> <input type="radio" id='female' name="sex" value="Female">
                    </td>
                    <td colspan='2'><input type="text" class='populateInput' id='village' name="village" value="" size="35" /></td>
                  </tr>
                  <tr>
                  <th>Jour des palements</th>
                  <th>Montant des palements</th>
                  <th>Nombre des palements prevus</th>
                </tr>
                  <tr>
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
                    <td>
                      <select name="mdp">
                            <option value="500" selected>500</option>
                            <option value="1000">1000</option>
                            <option value="5000">5000</option>
                            <option value="10000">10000</option>
                          </select>
                    </td>
                    <td>
                      <input type="text" class='populateInput' id="ndpp" name="ndpp" value="0" />
                    </td>

                  </tr>
              </table>
            </div>
            <div>
              <img class='space-image' src="images/whiteborderimage.png" style="height:10px;"/>
            </div>
            <div id='myagro_kiva' style="clear:both;">
              <h6> CONDITIONS GENERALES:</h6>
              <p>
                    <blockquote style="text-align:left; font-size:x-small;">Kiva et nous-memes souhaitons expliquer au public comment nos credits fonctionent afin que nous puissions etendre nos programmes. A ces fins, nous souhaitons utiliser votre photo, votre nom, des enregistrements video et audio (si disponibles) vous concernant, une description de votre entreprise et d'autres informations generales sur vous, votre credit actuel et d'autres credits que nous vous avons consentis dans le passe. En apposant votre signature ci-dessous, vous donnez votre accord pour que kiva et nous-memes, dans le cadre du programme de crdit utilisent ces informations n'importe quand et n'importe ou dans le monde (y compris, mais pas uniquement, sur l'Internet), dans le but d'expliquer nos programmes de credit et de les etendre. Nous nous efforcerons, et nous-memes, d'utiliser lesdites informations d'une facon refletant equitablement vos activites et nos relations, y compris en expliquant tout defaut de paiement ou non-remboursement.</blockquote>
                    <input type="checkbox" name="kiva" id="kiva" value="0"> Kiva? Oue<br>
              </p>
            </div>
            <div class="row">
              <div class="col-md-12">
                    <p class="r_subheaders" style="background-color:#fff; text-align:center;"><span class="round">3</span></p>
              </div>
            </div>
            <div style="padding-left:5px; text-align:center;">
              <div style="padding-bottom:10px; "><input type="submit" id='soumettre' class='myagro_button' value='SOUMETTRE'></div>
              <div style="padding-bottom:5px;"><input type="reset" class='myagro_button' value='RE-INITIALISER'></div>
            </div>
        </div>

            <!--close col-md-6-->
            </div>
            <div class="col-md-6">
              <!--open col-md-6-->
                <div id='myagro_paquets' style="padding-right:5px">
        <div class="row">
          <div class="col-md-12">
                    <p class="r_subheaders" style="background-color:#fff; text-align:center;"><span class="round">2</span></p>
                  </div>
        </div>
        <div>
            <img class='space-image' src="images/whiteborderimage.png">
          </div>
          <h1> Choix des paquets 2015</h1>
          <p><b>Cliquez sur le bouton ci-dessous pour sélectionner un paquet et entrez les détails de l'emballage</b></p>
          <div id='paquet-selection' class="paquet-selection">
            <input type="button" name="maisbutton" id="mais_button" value="Ajouter paquet mais" disabled="true">
             <p style="color:red"><b>Ne supprimez pas la premiere ligne du table</b></p>
            <!--<input type="button" name="maisbutton" id="arachide_button" value="Ajouter paquet arachide" disabled="true">-->
          </div>
          <div class="section1" id="cont4" >
            <div class="myagro_prod">
            <div id="mais-section">
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
                      <tr>
                        <td><input size='10' class='mais-opts' type="text" name='prod[ode][]' id="ode" readonly="true" /></td>
                        <td><input size='10' class='mais-opts' type="text" name='prod[paks][]' id="mais" readonly="true" /></td>
                        <td><input size='5' class='mais-opts' type="text" name= 'prod[ha][]' id="ha" readonly="true"/></td>
                        <td><input size='15' class='mais-opts' type="text" name='prod[semence][]' id="semence" readonly="true"/></td>
                        <td><input size='5' class='mais-opts' type="text" name='prod[cfa_sub_total][]' id="cfa_sub_total" value=0 readonly="true"/></td>
                        <td style="width:2%;"><input type="button" id="delPOIbutton" value="X" onclick="deleteRow(this)"/></td>
                      </tr>
                  </table>
                </div>
                <div id='mais-options' >
                  <table class="myagro_products" style="margin: 0 auto;">
                    <tr>
                      <th>Mais</th>
                      <th>HA</th>
                      <th>Semence</th>
                    </tr>
                    <tr>
                      <td> Paquet de mais </td>
                      <td>
                        <ul>
                        <li><input type="radio" class='mais_size' name="mais_size" value='0.125'>&nbsp;1/8</li>
                        <li><input type="radio" class='mais_size' name="mais_size" value='0.25'>&nbsp;1/4</li>
                        <li><input type="radio" class='mais_size' name="mais_size" value='0.5'>&nbsp;1/2</li>
                        <li><input type="radio" class='mais_size' name="mais_size" value='1.0'>&nbsp;1.0</li>
                        <li><input type="radio" class='mais_size' name="mais_size" value='1.5'>&nbsp;1.5</li>
                        <li><input type="radio" class='mais_size' name="mais_size" value='2.0'>&nbsp;2.0</li>
                        <li><input type="radio" class='mais_size' id='other_opt' value="X" name="mais_size">
                          <select name='otherval' id='otherval'>
                            <option value="0.0625">0.0625</option>
                            <option value="2.25">2.25</option>
                            <option value="2.50">2.50</option>
                            <option value="3.00" selected="selected">3.00</option>
                            <option value="3.25">3.25</option>
                            <option value="3.50">3.50</option>
                            <option value="4.00">4.00</option>
                            <option value="4.25">4.25</option>
                            <option value="4.50">4.50</option>
                            <option value="5.00">5.00</option>
                            <option value="5.25">5.25</option>
                            <option value="5.50">5.50</option>
                            <option value="6.00">6.00</option>
                            <option value="6.25">6.25</option>
                            <option value="6.50">6.50</option>
                            <option value="7.00">7.00</option>
                            <option value="8.00">8.00</option>
                            <option value="9.00">9.00</option>
                            <option value="10.00">10.00</option>
                          </select>
                        </li>
                        </ul>
                      </td>
                      <td>
                        <ul id='mais-seed1'>
                        <li><input type="radio" id='brigo' class="mais_product" name="mais_product" value='BRIGO'>&nbsp;Brigo</li>
                        <li><input type="radio" id='dembagnouma' class="mais_product" name="mais_product" value='DEMBAGNOUMA'>&nbsp;Dembagnouma</li>
                        <li><input type="radio" id='jorobana' class="mais_product" name="mais_product" value="JOROBANA">&nbsp;Jorobana</li>
                        <li><input type="radio" id='sotubaka' class="mais_product" name="mais_product" value="SOTUBAKA">&nbsp;Sotubaka</li>
                        <li><input type="radio" id='snk' class="mais_product" name="mais_product" value="SNK">&nbsp;HYB- SNK</li>
                        <li><input type="radio" id='tieba' class="mais_product" name="mais_product" value="TIEBA">&nbsp;HYB - Tieba</li>
                        <li><input type="radio" id='pds' class="mais_product" name="mais_product" value="Mais">&nbsp;PDS - Mais</li>

                        </ul>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <!--</table>-->
              <hr id="pline">
              <div id='paquet-selection' class="paquet-selection">
                <input type="button" name="maisbutton" id="arachide_button" value="Ajouter paquet arachide" disabled="true">
                <p style="color:red"><b>Ne supprimez pas la premiere ligne du table</b></p>
              </div>
              <div id="arachide-section">
                <div id='paquets_arachide_table' style="padding-bottom:2px;">
                  <table class="myagro_arachide_products" id="POITable2">

                      <tr>
                        <td>objectif d'épargne</td>
                        <td>Paquets</td>
                        <td>HA</td>
                        <td>Semence</td>
                        <td>CFA</td>
                        <td>Delete?</td>
                      </tr>
                      <tr>
                        <td><input size='10' class='mais-opts' type="text" name='prod[ode][]' id="ode_ara" readonly="true" /></td>
                        <td><input size='10' class='mais-opts' type="text" name='prod[paks][]' id="ara" readonly="true" /></td>
                        <td><input size='5' class='mais-opts' type="text" name= 'prod[ha][]' id="ha_ara" readonly="true"/></td>
                        <td><input size='15' class='mais-opts' type="text" name='prod[semence][]' id="semence_ara" readonly="true"/></td>
                        <td><input size='5' class='mais-opts' type="text" name='prod[cfa_sub_total][]' id="cfa_sub_total_ara" value=0 readonly="true"/></td>
                        <td style="width:2%;"><input type="button" id="delPOIbutton_ara" value="X" onclick="deleteRow(this)"/></td>
                      </tr>
                  </table>
                </div>
                <div class='myagro_prod' id="arachide-options">
                  <table class="myagro_products" style="margin: 0 auto;">
                    <tr>
                      <th>Arachide</th>
                      <th>HA</th>
                      <th>Semence</th>
                    </tr>
                    <tr>
                      <td> Paquet d'arachide <br /> <span>A1</span></td>
                      <td>
                        <ul>
                        <li><input type="radio" name="arachide_size" class="arachide_size"  value="0.0625">&nbsp;
&nbsp;
1/16</li>
                        <li><input type="radio" name="arachide_size" class="arachide_size"  value='0.125'>&nbsp;1/8</li>
                        <li><input type="radio" name="arachide_size" class="arachide_size"  value='0.25'>&nbsp;1/4</li>
                        <li><input type="radio" name="arachide_size" class="arachide_size"  value='0.5'>&nbsp;1/2</li>
                        <li><input type="radio" name="arachide_size" class="arachide_size"  value='1.0'>&nbsp;1</li>
                        </ul>
                      </td>
                      <td>
                        <ul id='arachide-seed1'>
                        <li><input type="radio" name="arachide_product1" class="arachide_product1" id='fleur11' value="Fleur">&nbsp;Fleur 11</li>
                        <li><input type="radio" name="arachide_product1" class="arachide_product1" id='pds_arachide' value="Arachide">&nbsp;PDS - Arachide <br/> (min. 1/8 ha)</li>
                        </ul>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
          </div>
        </div>
        <div>
                  <label for='cfa_total'>BUT CFA Total:</label><input type='text' id='cfa_total' name="cfa_total" value='0.000'/>
                </div>
        </div>
        <div id='myagro_clear'></div>
        <input type="hidden" name="total_ha" id='total_ha' value="0">
        <input type="hidden" name="sg_name" id='sg_name' value="0">
        <input type="hidden" name="client_exists" id='client_exists' value="0">
    </form>
  </div>

              <!--close col-md-6-->
            </div>
          </div>
        </form>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
        <script language="javascript" type="text/javascript" src="_js/jquery-2.1.1.min.js"></script>
  <script language="javascript" type="text/javascript" src="_js/contratScript.js"></script>
  <script language="javascript" type="text/javascript" src="_js/myagro_script.js"></script>
    <script src="_bootstrap/js/bootstrap.min.js"></script>
    <script src="_js/jquery-ui.js"></script>
  </body>
</html>
