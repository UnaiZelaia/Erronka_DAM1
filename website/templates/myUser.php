<?php
include("../model/User.class.php");
include("../model/MySQLPDO.class.php");
include("../modules/updateUser.php");
session_start();
if(isset($_SESSION["user"]) && $_SESSION["loged"] == "ok"){
    updateUser();
?>


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
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu.php">MENU</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reservation_form.php">RESERVAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="calendario.php">CALENDARIO</a>
                    </li>
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
    <div class="container text-center mb-5">
        <div class="col-10 rounded-4 mt-5 m-auto" id="centro">
            <h3>My user</h3>
            <form action="" id="userInfoForm" class="rounded-3">
                <div class="form-group mt-3 col-6 m-auto text-light">
                    <label for="name">Name: </label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="<?php echo $_SESSION["user"]->getName() ?>" />
                </div>
                <div class="form-group mt-3 col-6 m-auto text-light">
                    <label for="surname">Surname</label>
                    <input type="text" class="form-control" id="surname" name="surname"
                        value="<?php echo $_SESSION["user"]->getSurname() ?>" />
                </div>
                <div class="form-group mt-3 col-6 m-auto text-light">
                    <label for="email">Email: </label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="<?php echo $_SESSION["user"]->getEmail() ?>" />
                </div>
                <div class="form-group mt-3 col-6 m-auto text-light">
                    <label for="birthdate">Birthdate: </label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate"
                        value="<?php echo $_SESSION["user"]->getBirthdate() ?>" readonly />
                </div>
                <div class="form-group mt-3 col-6 m-auto text-light">
                    <label for="balance">Balance</label>
                    <input type="text" class="form-control" id="balance" name="balance"
                        value="<?php echo $_SESSION["user"]->getBalance() ?>" readonly />
                </div>
                <button type="submit" class=" mt-3 btn btn-primary col-2 m-auto text-light mb-3">Update my data</button>
                <div role="button" class="btn btn-primary mt-3 col-2 m-auto text-light mb-3">
                    <a href="passwordChange.php">Change password</a>
                </div>

            </form>






        </div>
    </div>
    <!--End of the content-->
    <!--Start of the footer-->
    <footer>
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
}else{
    header("Location: ../public/error.html");
  }
?>