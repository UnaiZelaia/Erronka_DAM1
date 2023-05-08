<!doctype html>
<html lang="en">
<?php
include("../model/MySQLPDO.class.php");
$resultMenuItems = MySQLPDO::selectMenusWeek();
?>
<head>
  <meta charset="utf-8">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../img/lg.png" type="image/x-icon">
  <title>Calendar</title>
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
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../index.html">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="calendario.html">CALENDAR</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aboutUs.html">ABOUT US</a>
                </li>
                    <li class="nav-item rounded-3 bg-primary ms-2">
                        <a class="nav-link ms-2" href="login_form.php">LOG IN</a>
                    </li>
                    <li class="nav-item rounded-3 bg-primary ms-2">
                        <a class="nav-link ms-2" href="signup_form.html ">SIGN UP</a>
                    </li>
            </ul>
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
          <tr name="BreakfastRow">
            <td name="BreakfastMonday">
              Breakfast:<br><br>
              <?php
              foreach ($resultMenuItems as $menu) {
                extract($menu);
                if ($meal == "Breakfast") {
                  if (date("w", strtotime($menu_date)) == 1) {

                    echo "-" . $item_description . "<br>";
                  }
                }
              } ?>
            </td>

            <td name="BreakfastTuesday">
              Breakfast:<br><br>
              <?php
              foreach ($resultMenuItems as $menu) {
                extract($menu);
                if ($meal == "Breakfast") {
                  if (date("w", strtotime($menu_date)) == 2) {

                    echo "-" . $item_description . "<br>";
                  }
                }
              }
              ?>
            </td>

            <td name="BreakfastWednesday">
              Breakfast:<br><br>
              <?php
              foreach ($resultMenuItems as $menu) {
                extract($menu);
                if ($meal == "Breakfast") {
                  if (date("w", strtotime($menu_date)) == 3) {

                    echo "-" . $item_description . "<br>";
                  }
                }
              }
              ?>
            </td>

            <td name="BreakfastThursday">
              Breakfast:<br><br>
              <?php
              foreach ($resultMenuItems as $menu) {
                extract($menu);
                if ($meal == "Breakfast") {
                  if (date("w", strtotime($menu_date)) == 4) {

                    echo "-" . $item_description . "<br>";
                  }
                }
              }
              ?>
            </td>

            <td name="BreakfastFriday">
              Breakfast:<br><br>
              <?php
              foreach ($resultMenuItems as $menu) {
                extract($menu);
                if ($meal == "Breakfast") {
                  if (date("w", strtotime($menu_date)) == 5) {

                    echo "-" . $item_description . "<br>";
                  }
                }
              }
              ?>
            </td>

          <tr name="LunchRow">


            <td name="LunchMonday">
              Lunch:<br><br>
              <?php
              foreach ($resultMenuItems as $menu) {
                extract($menu);
                if ($meal == "Lunch") {
                  if (date("w", strtotime($menu_date)) == 1) {

                    echo "-" . $item_description . "<br>";
                  }
                }
              }
              ?>
            </td>

            <td name="LunchTuesday">
              Lunch:<br><br>
              <?php
              foreach ($resultMenuItems as $menu) {
                extract($menu);
                if ($meal == "Lunch") {
                  if (date("w", strtotime($menu_date)) == 2) {

                    echo "-" . $item_description . "<br>";
                  }
                }
              }
              ?>
            </td>

            <td name="LunchWednesday">
              Lunch:<br><br>
              <?php
              foreach ($resultMenuItems as $menu) {
                extract($menu);
                if ($meal == "Lunch") {
                  if (date("w", strtotime($menu_date)) == 3) {

                    echo "-" . $item_description . "<br>";
                  }
                }
              }
              ?>
            </td>

            <td name="LunchThursday">
              Lunch:<br><br>
              <?php
              foreach ($resultMenuItems as $menu) {
                extract($menu);
                if ($meal == "Lunch") {
                  if (date("w", strtotime($menu_date)) == 4) {

                    echo "-" . $item_description . "<br>";
                  }
                }
              }
              ?>
            </td>

            <td name="LunchFriday">
              Lunch:<br><br>
              <?php
              foreach ($resultMenuItems as $menu) {
                extract($menu);
                if ($meal == "Lunch") {
                  if (date("w", strtotime($menu_date)) == 5) {

                    echo "-" . $item_description . "<br>";
                  }
                }
              }
              ?>
            </td>
          </tr>

          <tr name="DinnerRow">

            <td name="dinnerMonday">
              Dinner:<br><br>
              <?php
              foreach ($resultMenuItems as $menu) {
                extract($menu);
                if ($meal == "Dinner") {
                  if (date("w", strtotime($menu_date)) == 1) {

                    echo "-" . $item_description . "<br>";
                  }
                }
              }
              ?>
            </td>

            <td name="dinnerTuesday">
              Dinner:<br><br>
              <?php
              foreach ($resultMenuItems as $menu) {
                extract($menu);
                if ($meal == "Dinner") {
                  if (date("w", strtotime($menu_date)) == 2) {

                    echo "-" . $item_description . "<br>";
                  }
                }
              }
              ?>
            </td>

            <td name="dinnerWednesday">
              Dinner:<br><br>
              <?php
              foreach ($resultMenuItems as $menu) {
                extract($menu);
                if ($meal == "Dinner") {
                  if (date("w", strtotime($menu_date)) == 3) {

                    echo "-" . $item_description . "<br>";
                  }
                }
              }
              ?>
            </td>

            <td name="dinnerThursday">
              Dinner:<br><br>
              <?php
              foreach ($resultMenuItems as $menu) {
                extract($menu);
                if ($meal == "Dinner") {
                  if (date("w", strtotime($menu_date)) == 4) {

                    echo "-" . $item_description . "<br>";
                  }
                }
              }
              ?>
            </td>

            <td name="dinnerFriday">
              Dinner:<br><br>
              <?php
              foreach ($resultMenuItems as $menu) {
                extract($menu);
                if ($meal == "Dinner") {
                  if (date("w", strtotime($menu_date)) == 5) {

                    echo "-" . $item_description . "<br>";
                  }
                }
              }
              ?>
            </td>
          </tr>
        </tbody>
      </table>
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
              <li><a href="../index.html">HOME</a></li>
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