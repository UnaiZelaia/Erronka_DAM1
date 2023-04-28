<?php
include("../model/User.class.php");
include("../model/MySQLPDO.class.php");
include("../modules/updateSessionUser.php");
session_start();
if (isset($_SESSION["user"]) && $_SESSION["loged"] == "ok") {

    ?>
    <!doctype html>
    <html lang="en">
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../img/lg.png" type="image/x-icon">
        <title>TEMPLATE</title>
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
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script type="text/javascript">
            $(function () {
                // Make the first column draggable
                $(".tblLocations td").draggable({
                    helper: "clone",
                    cursor: "pointer"
                });

                // Make all columns except the first droppable
                $(".tblLocations td").droppable({
                    drop: function (event, ui) {
                        var draggable = ui.draggable;
                        var droppable = $(this);
                        var dragVal = draggable.html();
                        var dropVal = droppable.html();
                        draggable.html(dropVal);
                        droppable.html(dragVal);
                    }
                });


            });
        </script>
        <script>
            $(document).ready(function () {
                // Dar a las imágenes la capacidad de mover las imágenes
                $(<?php
                $result = MySQLPDO::menuItems();
                $i = 1;
                foreach ($result as $items) {
                    extract($items);
                } ?>)

            });

            items = []
            function addMealToArray() {
                var contentRows = document.getElementsByClassName("contentColumn");
                Array.from(contentRows).forEach((item) => {
                    if (item.textContent != "") {
                        items.push(item.textContent.trim());
                    }

                })

                items.forEach(function (item) {

                    console.log(item);

                });


            }
        </script>
    </head>

    <body>
        <!--Start of the navbar-->
        <nav class="navbar navbar-expand-sm navbar-dark container-fluid bg-uni">
            <div class="container-fluid">
                <a class="navbar-brand" href="../img/lg.png">
                    Uni Eibar-Ermua Canteen
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">HOME</a>
                        </li>
                        <?php
                        if ($_SESSION["user"]->getRole() == 4 || $_SESSION["user"]->getRole() == 3) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="publishMenu.php">PUBLISH MENU</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="createMenu.php">CREATE NEW MENU</a>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="reservation_form.php">MAKE RESERVATION</a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                    <div class="collapse navbar-collapse d-flex flex-row-reverse">
                        <ul class="nav navbar-nav" id="userLink">
                            <div class="btn-group mr-5">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <?php echo $_SESSION["user"]->getName() ?>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="myUser.php">My user</a></li>
                                    <li><a class="dropdown-item" href="userBalance.php">My balance</a></li>
                                    <li><a class="dropdown-item" href="reservesList.php">My reserves</a></li>
                                    <li><a class="dropdown-item" href="../modules/logout.php">Log out</a></li>
                                </ul>
                            </div>
                            <li>
                                <img class="img-fluid nav-item m-auto pl-5" id="userLogo" src="../img/user_logo.png"
                                    alt="User default logo">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!--End of the navbar-->
        <!--Start of the content-->
        <div class="container-fluid mb-5 bg-white m-auto text-center justify-content-center ">
            <h1 class="mb-5 m-auto justify-content-center"> New Menu </h1>
            <div class="col-8 rounded-3 container-fluid text-light mt-5 m-auto p-4" id="divDestino">
                <form action="../modules/createMenu.php" method="post">
                    Menu:
                    <input type="text" class="form-control" name="name" id="name">

                    Type:
                    <select class="form-control" name="type" id="type">
                        <option value="breakfast">breakfast</option>
                        <option value="lunch">lunch</option>
                        <option value="dinner">dinner</option>
                    </select>
                    <input type="submit" value="submit">
                </form>
                <table class="tblLocations table-responsive mt-5 m-auto p-4 table-bordered" cellpadding="0" cellspacing="0"
                    border="1">
                    <thead>
                        <tr>
                            <th>ITEMS</th>
                            <th>MENU</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = MySQLPDO::menuItems();
                        $i = 0;
                        foreach ($result as $item) {
                            extract($item);
                            ?>
                            <tr>
                                <td>

                                    <?php
                                    echo $item_description;
                                    $i++; ?>
                                </td>
                                <td class="contentColumn"></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        <!--End of the content-->
        <!--Start of the footer-->
        <footer class="container-fluid mb-0">
            <div class="mt-5 p-4 text-light text-center container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <h5>Direction</h5>
                            <ul class="list-unstyled">
                                <li>Otaola Hiribidea, 29</li>
                                <li>20600 Eibar, Gipuzkoa</li>
                                <li>canteen@uni.eus</li>
                                <li>943 89 92 11</li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <img width="200" height="200" src="../img/lg.png">
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
} else {
    header("Location: ../public/error.html");
}
?>