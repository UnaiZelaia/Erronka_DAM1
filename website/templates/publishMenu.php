<?php
include("../model/User.class.php");
include("../model/MySQLPDO.class.php");
include("../modules/updateSessionUser.php");
session_start();
if (isset($_SESSION["user"]) && $_SESSION["loged"] == "ok" && $_SESSION["user"]->getRole() == 4) {
  updateUser();
  $resultMenu = MySQLPDO::selectMenusWeek();
  $menus = MySQLPDO::listMenus();
  $menuNames = MySQLPDO::menuNames();
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

      <div class="col-12 container text-center mb-5">
        <h3 class="mt-5 m-auto">Publish a menu</h3>
        <div class="col-12 rounded-4 mt-5 m-auto p-auto d-flex">
          <div class="col-4 rounded-3 p-4 bg-uni mt-5 flex-item m-auto">
            <div class="accordion" id="accordionExample">
              <?php
              $i = 1;
              foreach ($menuNames as $menuName) {
                extract($menuName)
                  ?>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading<?php echo $i ?>">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapse<?php echo $i ?>" aria-expanded="true"
                      aria-controls="collapse<?php echo $i ?>">
                      <?php echo $menu_name ?>
                    </button>
                  </h2>
                  <div id="collapse<?php echo $i ?>" class="accordion-collapse collapse"
                    aria-labelledby="heading<?php echo $i ?>" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <?php foreach ($menus as $menu) {
                        extract($menu);
                        if($menuName["menu_name"] == $menu_name){
                        echo "<ul class='list-group'>
                                <li class='list-group-item' >" . $item_description . "</li>
                              </ul>";
                        }

                      } ?>
                    </div>
                  </div>
                </div>
                <?php
                $i++;
              } ?>
            </div>

          </div>

          <form class="col-4 rounded-3 p-4 mt-5 flex-item m-auto" id="reservationForm" action="../modules/publishMenu.php"
            method="GET">
            <div class="form-group mt-5">
              <label class="text-light" for="menuName">Menu to publish: </label>
              <select name="reservationMeal" id="reservationMeal">
                <?php foreach($menuNames as $menus){
                        extract($menus);
                  ?>
                <option value="<?php echo $id_menu ?>"><?php echo $menu_name ?></option>
                <?php } ?>

              </select>

            </div>
            <div class="form-group mt-5">
              <label class="text-light" for="reservationDate">Date to publish</label>
              <input type="date" name="reservationDate" id="reservationDate" />
            </div>


            <input type="submit" value="Make reservation" class="btn btn-primary mt-5">
          </form>
        </div>
      </div>

      <div class="col-8 m-auto mt-3 table-responsive">
        <h4 id="MonthHeader">Menu for week: </h4>
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
              </td>
              <td>
                Menu for Breakfast: Tuesday
                <br>
              </td>
              <td>
                Menu for Breakfast: Wednesday
                <br>
              </td>
              <td>
                Menu for Breakfast: Thursday
                <br>
              </td>
              <td>
                Menu for Breakfast: Friday
                <br>
              </td>
            </tr>
            <tr>
              <td>
                Menu for Lunch: Monday
                <br>
              </td>
              <td>
                Menu for Lunch: Tuesday
                <br>
              </td>
              <td>
                Menu for Lunch: Wednesday
                <br>
              </td>
              <td>
                Menu for Lunch: Thursday
                <br>
              </td>
              <td>
                Menu for Lunch: Friday
                <br>
              </td>
            </tr>
            <tr>
              <td>
                Menu for Dinner: Monday
                <br>
              </td>
              <td>
                Menu for Dinner: Tuesday
                <br>
              </td>
              <td>
                Menu for Dinner: Wednesday
                <br>
              </td>
              <td>
                Menu for Dinner: Thursday
                <br>
              </td>
              <td>
                Menu for Dinner: Friday
                <br>
              </td>
            </tr>
          </tbody>
        </table>
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
                <img width="290" height="210" src="../img/lg.png">
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