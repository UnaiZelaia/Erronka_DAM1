<?php
include("../model/User.class.php");
include("../model/MySQLPDO.class.php");
session_start();
if(isset($_SESSION["user"]) && $_SESSION["loged"] == "ok"){

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create menu</title>
    <link rel="stylesheet" href="../css/bootstrap-bundle.css">
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../style/style.css">
    <script src="../js/calendar.js"></script>

    <link rel="stylesheet" href="../jquery-ui-1.13.2.custom/jquery-ui.min.js">
    <!-- JQUERY UI MIN -->

    <link rel="stylesheet" href="../jquery-ui-1.13.2.custom/jquery-ui.css">
    <!-- JQUERY UI CSS -->
    <script src="../jquery_js/jquery.min.js"></script>
    <!-- JQUERY MIN-->
    <script src="../jquery-ui-1.13.2.custom/jquery-ui.js"></script>
    <!-- JQUERY UI -->
    <script>
        $("#arrastrame").draggable({
            cursor: 'move'
        });
    </script>
</head>

<body>

    <!--Start of the navbar-->
    <nav class="navbar navbar-expand-sm navbar-dark container-fluid">
        <div class="container-fluid">
            <a class="navbar-brand" href="../img/lg.png">
                Uni Eibar-Ermua Canteen
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu.html">MENU</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login_form.html">RESERVAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="calendario.html">CALENDARIO</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--End of the navbar-->

    <!--Start of the content-->
    <div>
        <h1> New Menu </h1>
        <div class="col-4">
            <div>
                Menu:
                <input type="text" class="form-control" placeholder="" >
            </div> 
            <div>
                Type:
                <select class="form-control">
                    <option value="breakfast"></option>
                    <option value="lunch"></option>
                    <option value="dinner"></option>
                </select>
            </div> 
            <div>
                
            </div>
        </div>
        <div class="col-4">
            <div>
                items:
            </div>  
            <?php 
                
                $result = MySQLPDO::menuItems($_SESSION["items"]);
                    if (sizeof($result) != 0) {
                        foreach($result as $item){
                            extract($item);
                            echo $item_description;
                        }
                    }
            ?>
                
                
                ?>
                
        </div>
    </div>




    <!--End of the content-->

    <!--Start of the footer-->
    <footer>
        <div class="mt-5 p-4 text-light text-center container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <p>Otaola Hiribidea, 29</p>
                        <p>20600 Eibar, Gipuzkoa</p>
                        <p>canteen@uni.eus</p>
                        <p>943 89 92 11</p>
                    </div>
                    <div class="col-sm-4">
                        <img class="img-flex m-auto" src="../img/lg.png">
                    </div>
                    <div class="col-sm-4">
                        <h5>Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="index.html">HOME</a></li>
                            <li><a href="menu.html">MENU</a></li>
                            <li><a href="reservas.html">RESERVAS</a></li>
                            <li><a href="calendario.html">CALENDARIO</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <p>Uni Ermua-Eibar Canteen ©2023</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--End of the footer-->
</body>


</html>
<?php
}else{
    header("Location: ../public/error.html");
}
?>