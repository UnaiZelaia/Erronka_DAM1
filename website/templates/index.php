<?php
include("../model/User.class.php");

session_start();

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../img/lg.png" type="image/x-icon">
  <title>TEMPLATE</title>
  <link rel="stylesheet" href="../css/bootstrap-bundle.css">
  <script src="../js/bootstrap.bundle.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../style/style.css">
  <script src="../js/calendar.js"></script>
</head>

<body onload="javascript:setHtmlWeek()">
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
            <a class="nav-link" href="index.html">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="menu.html">MENU</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reservation_form.html">RESERVAS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="calendario.html">CALENDARIO</a>
          </li>
        </ul>
        <div class="collapse navbar-collapse d-flex flex-row-reverse">
        <ul class="nav navbar-nav" id="userLink">
          <li class="nav-item">
            <a class="nav-link" href="myUser.php">
              <?php print($_SESSION["user"]->getName()) ?>
            </a>
            </li>
            <li>
            <img class="img-fluid nav-item m-auto" id="userLogo" src="../img/user_logo.png" alt="User default logo">
          </li>
        </ul>
        </div>
      </div>
    </div>
  </nav>
  <!--End of the navbar-->
  <!--Start of the content-->
  <div class="col-8 m-auto mt-3">
    <h4 id="MonthHeader">Menu for week: </h4>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th id="weekMon">Monday </th>
            <th id="weekTue">Tuesday </th>
            <th id="weekWed">Wednesday </th>
            <th id="weekThu">Thursday </th>
            <th id="weekFri">Friday </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              Menu for Breakfast: Monday
              <br>
              <form method="GET" action="../modules/reservationAction.php">
                <input name="day1" class="day1" type="hidden" value="" />
                <input name="type" id="type" type="hidden" value="bf" />
                <input type="submit" value="Make a reservation" class="btn btn-primary">
              </form>
            </td>
            <td>
              Menu for Breakfast: Tuesday
              <br>
              <form method="GET" action="../modules/reservationAction.php">
                <input name="day2" class="day2" type="hidden" value="" />
                <input name="type" id="type" type="hidden" value="bf" />
                <input type="submit" value="Make a reservation" class="btn btn-primary">
              </form>
            </td>
            <td>
              Menu for Breakfast: Wednesday
              <br>
              <form method="GET" action="../modules/reservationAction.php">
                <input name="day3" class="day3" type="hidden" value="" />
                <input name="type" id="type" type="hidden" value="bf" />
                <input type="submit" value="Make a reservation" class="btn btn-primary">
              </form>
            </td>
            <td>
              Menu for Breakfast: Thursday
              <br>
              <form method="GET" action="../modules/reservationAction.php">
                <input name="day4" class="day4" type="hidden" value="" />
                <input name="type" id="type" type="hidden" value="bf" />
                <input type="submit" value="Make a reservation" class="btn btn-primary">
              </form>
            </td>
            <td>
              Menu for Breakfast: Friday
              <br>
              <form method="GET" action="../modules/reservationAction.php">
                <input name="day5" class="day5" type="hidden" value="" />
                <input name="type" id="type" type="hidden" value="bf" />
                <input type="submit" value="Make a reservation" class="btn btn-primary">
              </form>
            </td>
          </tr>
          <tr>
            <td>
              Menu for Lunch: Monday
              <br>
              <form method="GET" action="../modules/reservationAction.php">
                <input name="day1" class="day1" type="hidden" value="" />
                <input name="type" id="type" type="hidden" value="lu" />
                <input type="submit" value="Make a reservation" class="btn btn-primary">
              </form>
            </td>
            <td>
              Menu for Lunch: Tuesday
              <br>
              <form method="GET" action="../modules/reservationAction.php">
                <input name="day2" class="day2" type="hidden" value="" />
                <input name="type" id="type" type="hidden" value="lu" />
                <input type="submit" value="Make a reservation" class="btn btn-primary">
              </form>
            </td>
            <td>
              Menu for Lunch: Wednesday
              <br>
              <form method="GET" action="../modules/reservationAction.php">
                <input name="day3" class="day3" type="hidden" value="" />
                <input name="type" id="type" type="hidden" value="lu" />
                <input type="submit" value="Make a reservation" class="btn btn-primary">
              </form>
            </td>
            <td>
              Menu for Lunch: Thursday
              <br>
              <form method="GET" action="../modules/reservationAction.php">
                <input name="day4" class="day4" type="hidden" value="" />
                <input name="type" id="type" type="hidden" value="lu" />
                <input type="submit" value="Make a reservation" class="btn btn-primary">
              </form>
            </td>
            <td>
              Menu for Lunch: Friday
              <br>
              <form method="GET" action="../modules/reservationAction.php">
                <input name="day5" class="day5" type="hidden" value="" />
                <input name="type" id="type" type="hidden" value="lu" />
                <input type="submit" value="Make a reservation" class="btn btn-primary">
              </form>
            </td>
          </tr>
          <tr>
            <td>
              Menu for Dinner: Monday
              <br>
              <form method="GET" action="../modules/reservationAction.php">
                <input name="day1" class="day1" type="hidden" value="" />
                <input name="type" id="type" type="hidden" value="di" />
                <input type="submit" value="Make a reservation" class="btn btn-primary">
              </form>
            </td>
            <td>
              Menu for Dinner: Tuesday
              <br>
              <form method="GET" action="../modules/reservationAction.php">
                <input name="day2" class="day2" type="hidden" value="2" />
                <input name="type" id="type" type="hidden" value="di" />
                <input type="submit" value="Make a reservation" class="btn btn-primary">
              </form>
            </td>
            <td>
              Menu for Dinner: Wednesday
              <br>
              <form method="GET" action="../modules/reservationAction.php">
                <input name="day3" class="day3" type="hidden" value="" />
                <input name="type" id="type" type="hidden" value="di" />
                <input type="submit" value="Make a reservation" class="btn btn-primary">
              </form>
            </td>
            <td>
              Menu for Dinner: Thursday
              <br>
              <form method="GET" action="../modules/reservationAction.php">
                <input name="day4" class="day4" type="hidden" value="" />
                <input name="type" id="type" type="hidden" value="di" />
                <input type="submit" value="Make a reservation" class="btn btn-primary">
              </form>
            </td>
            <td>
              Menu for Dinner: Friday
              <br>
              <form method="GET" action="../modules/reservationAction.php">
                <input name="day5" class="day5" type="hidden" value="" />
                <input name="type" id="type" type="hidden" value="di" />
                <input type="submit" value="Make a reservation" class="btn btn-primary">
              </form>
            </td>
          </tr>
        </tbody>
      </table>
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