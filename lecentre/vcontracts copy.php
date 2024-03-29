
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Create new contracts</title>

    <!-- Bootstrap core CSS -->
    <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="_css/starter-template.css" rel="stylesheet">
    <script language="javascript" type="text/javascript" src="_js/jquery-2.1.1.min.js"></script>
  <script language="javascript" type="text/javascript" src="_js/myagro_script.js"></script>

  <link rel="stylesheet" type="text/css" href="_css/style.css">
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
          <a class="navbar-brand" href="#">NgaSene Contracts System</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="welcome.php">Home</a></li>
            <li><a href="#contact">Contacts</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
        <div class="mainContainer">
    <form method="post" action='addClient.php'>
        <div id='myagro_prof'>
          <div>
            <img class='space-image' src="images/whiteborderimage.png">
          </div>
            <div class="section1" id="cont1" style="padding-left:5px">
              <div id='myagro_id'>
              <p>1. Enter the Client ID below</p><br/>
                <label for='myagro_num' style="color:red; font-weight:600;font-size:large;"><b>Client ID:</b></label>
                <input type="text" width="30" name='myagro_num'id='myagro_num' value="" />
              </div>
              <div id='myagro_addr' style="float:right; text-align:right;">
                <img src="images/myagrogreen_2.png" style="width:85px; height:85px" alt="MyAgro">
              </div>
              <div style="clear:both;"></div>
            
            </div>
            <div class="section1" id="cont2" style="padding-left:5px">
              <table width="100%">
                <tr>
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>Numero portable</th>
                </tr>
                  <tr>
                    <td style="padding-left:10px;"><input type="text" id="nom" name="nom" value="" style="width:145px;" /></td>
                    <td><input type="text" id="prenom" name="prenom" value="" /></td>
                    <td>
                      <table>
                        <tr>
                          <td><input type="text" id="numero" name="numero" value="00000000" /></td>
                        </tr>
                      </table>
                    </td>

                  </tr>
                  <tr>
                    <th>Sexe</th>
                    <th>Village</th>
                    <th>Numero portable 2</th>
                  </tr>
                  <tr>
                    <td>
                      <label for='male'>H:</label><input type="radio"  id='male' name="sex" value="male">
                      <label for='female'>F:</label> <input type="radio" id='female' name="sex" value="female">
                    </td>
                    <td><input type="text" id='village' name="village" value="" /></td>
                    <td>
                      <table>
                        <tr>
                          <td><input type="text" id="numero2" name="numero" value="00000000" readonly="true" style="background-color:#ddd" /></td>
                          
                        </tr>
                      </table>
                    </td>

                  </tr>
              </table>
            </div>
            <div class="section1" id = "cont3">
              <div class="myagro_gallery">
                <img src="images/imgi-1.png" class="myagro_pic" alt="Klematis" >
              </div>
              <div class="myagro_gallery">
                 <img src="images/img-2.png" class="myagro_pic" alt="Klematis">
              </div>
              <div class="myagro_gallery">
                <img src="images/imgi-3.png" class="myagro_pic" alt="Klematis">
              </div>
              <div class="myagro_gallery">
                <img src="images/img-4.png" class="myagro_pic" alt="Klematis">
              </div>
              <div class="myagro_gallery">
                <img src="images/imgi-5.png" class="myagro_pic" alt="Klematis">
              </div>
            </div>
            <div>
              <img class='space-image' src="images/whiteborderimage.png" style="height:10px;"/>
            </div>
            <div id='myagro_kiva' style="clear:both;">
              <h6> CONDITIONS GENERALES:</h6>
              <p style="text-align:left; font-size:x-small;">
                    Kiva et nous-memes souhaitons expliquer au public comment nos credits fonctionent afin que nous puissions etendre nos programmes. A ces fins, nous souhaitons utiliser votre photo, votre nom, des enregistrements video et audio (si disponibles) vous concernant, une description de votre entreprise et d'autres informations generales sur vous, votre credit actuel et d'autres credits que nous vous avons consentis dans le passe. En apposant votre signature ci-dessous, vous donnez votre accord pour que kiva et nous-memes, dans le cadre du programme de crdit utilisent ces informations n'importe quand et n'importe ou dans le monde (y compris, mais pas uniquement, sur l'Internet), dans le but d'expliquer nos programmes de credit et de les etendre. Nous nous efforcerons, et nous-memes, d'utiliser lesdites informations d'une facon refletant equitablement vos activites et nos relations, y compris en expliquant tout defaut de paiement ou non-remboursement. 
              </p>
            </div>
            <div style="padding-left:5px; text-align:center;">
              <div style="padding-bottom:5px; "><input type="submit" id='soumettre' class='myagro_button' value='SOUMETTRE'></div>
              <div style="padding-bottom:5px;"><input type="reset" class='myagro_button' value='RE-INITIALISER'></div>
            </div>
        </div>
        <div id='myagro_paquets' style="padding-right:5px">
        <div>
            <img class='space-image' src="images/whiteborderimage.png">
          </div>
          <h1> Choix des paquets 2015</h1>
          <div id='paquet-selection'>
            <input type="button" name="maisbutton" id="mais_button" value="Ajouter paquet mais">
            <input type="button" name="maisbutton" id="arachide_button" value="Ajouter paquet arachide">
          </div>
          <div class="section1" id="cont4" >
            <div class="myagro_prod">
              <div id='paquets_table' style="padding-bottom:2px;">
                <table class="myagro_products" id="POITable">
                    
                    <tr>
                      
                      <td>Paquets</td>
                      <td>HA</td>
                      <td>Semence</td>
                      <td>CFA</td>
                      <td>Delete?</td>
                    </tr>
                    <tr>
                      
                      <td><input size=20 class='mais-opts' type="text" name='prod[mais][]' id="mais" /></td>
                      <td><input size=10 class='mais-opts' type="text" name= 'prod[ha][]' id="ha"/></td>
                      <td><input size=15 class='mais-opts' type="text" name='prod[semence][]' id="semence"/></td>
                      <td><input size=15 class='mais-opts' type="text" name='prod[cfa_sub_total][]' id="cfa_sub_total" value=0 readonly="true"/></td>
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
                      <li><input type="radio" class='mais_size' name="mais_size" value='0.125'>1/8</li>
                      <li><input type="radio" class='mais_size' name="mais_size" value='0.25'>1/4</li>
                      <li><input type="radio" class='mais_size' name="mais_size" value='0.5'>1/2</li>
                      <li><input type="radio" class='mais_size' name="mais_size" value='1.0'>1</li>
                      <li><input type="radio" class='mais_size' name="mais_size" value='1.5'>1.5</li>
                      <li><input type="radio" class='mais_size' name="mais_size" value='2.0'>2</li>
                      <li><input type="radio"><input type="text" name='otherval' /></li>
                      </ul>
                    </td>
                    <td>
                      <ul id='mais-seed1'>
                      <li><input type="radio" id='brigo' class="mais_product" name="mais_product" value='brigo'>Brigo</li>
                      <li><input type="radio" id='dembagnouma' class="mais_product" name="mais_product" value='dembagnouma'>Dembagnouma</li>
                      <li><input type="radio" id='jorobana' class="mais_product" name="mais_product" value="jorobana">Jorobana</li>
                      <li><input type="radio" id='sotubaka' class="mais_product" name="mais_product" value="sotubaka">Sotubaka</li>
                      <li><input type="radio" id='snk' class="mais_product" name="mais_product" value="SNK">SNK - HYB</li>
                      <li><input type="radio" id='pds' class="mais_product" name="mais_product" value="Mais">PDS - Mais</li>
                      </ul>
                    </td>
                  </tr>
                </table>
              </div>
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
                    <li><input type="radio" name="arachide_size" class="arachide_size"  value="0.0625">1/16</li>
                    <li><input type="radio" name="arachide_size" class="arachide_size"  value='0.125'>1/8</li>
                    <li><input type="radio" name="arachide_size" class="arachide_size"  value='0.25'>1/4</li>
                    <li><input type="radio" name="arachide_size" class="arachide_size"  value='0.5'>1/2</li>
                    <li><input type="radio" name="arachide_size" class="arachide_size"  value='1.0'>1</li>
                    </ul>
                  </td>
                  <td>
                    <ul id='arachide-seed1'>
                    <li><input type="radio" name="arachide_product1" class="arachide_product1" id='fleur11' value="Fleur 11">Fleur 11</li>
                    <li><input type="radio" name="arachide_product1" class="arachide_product1" id='pds_arachide' value="Arachide">PDS - Arachide <br/> (min. 1/8 ha)</li>
                    </ul>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div>
            <label for='cfa_total'>BUT CFA Total:</label><input type='text' id='cfa_total' name="cfa_total" value='0000'/>
          </div>
        </div>
        <div id='myagro_clear'></div>
    </form>
  </div>

      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="_bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>