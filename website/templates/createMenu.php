<?php
include("../model/User.class.php");
include("../model/MySQLPDO.class.php");
session_start();
if (isset($_SESSION["user"]) && $_SESSION["loged"] == "ok") {


?>
    <!doctype html>
    <html lang="en">
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
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script>
            var items = [];
            $(document).ready(function() {
                // Dar a las imágenes la capacidad de mover las imágenes
                <?php
                    $result = MySQLPDO::menuItems();
                    $i = 1;
                    foreach ($result as $items) {
                        extract($items);
                    ?>
                        items.push( "<?php echo $item_description ?>");
                    
                    <?php
                    }
                    ?>});

            // Get the list element from the HTML document
            const list = document.getElementById("myTable")


            console.log('"Java" + "Script" = \"' + 'Java' + 'Script\"');
            // '"Java" + "Script" = "JavaScript"'


            items.forEach(item => {
                const tr = document.createElement('tr');
                const tdcolumn1 = document.createElement('td');
                tdcolumn1.classList.add("column1");
                tdcolumn1.textContent = item;
                const tdcolumn2 = document.createElement('td');
                tdcolumn2.classList.add("column2");
                tr.appendChild(tdcolumn1);
                tr.appendChild(tdcolumn2);
                list.appendChild(tr);
            });
            // Loop through each item in the array and create an  element for it
            // <?php
                // if (sizeof($result) >= 0) {
                //     foreach ($result as $item) {
                //         extract($item); 
                ?>
            //         var maintr = document.createElement('tr');
            //         var tdcolumn1 = document.createElement('td');
            //         tdcolumn1.classList.add("column1");
            //         tdcolumn1.textContent = "<-?php echo $item_description ?>";
            //         var tdcolumn2 = document.createElement('td');
            //         tdcolumn2.classList.add("column2");
            //         maintr.appendChild(tdcolumn1);
            //         maintr.appendChild(tdcolumn2);
            //         list.appendChild(maintr);

            // <-?php

            //     }
            //} ?>


            // Get all cells in the table
            const cells = document.querySelectorAll('#myTable td');

            // Add drag and drop event listeners to each cell
            cells.forEach(cell => {
                cell.draggable = true;
                cell.addEventListener('dragstart', handleDragStart);
                cell.addEventListener('dragover', handleDragOver);
                cell.addEventListener('dragenter', handleDragEnter);
                cell.addEventListener('dragleave', handleDragLeave);
                cell.addEventListener('drop', handleDrop);
                cell.addEventListener('dragend', handleDragEnd);
            });

            // Set variables for the cell being dragged, the empty column being dragged to, and the original column of the cell
            let draggedCell = null;
            let draggedToEmptyColumn = false;
            let originalColumn = null;

            // Drag functions
            function handleDragStart(e) {
                draggedCell = e.target;
                originalColumn = e.target.parentNode.className;
                e.dataTransfer.effectAllowed = 'move';
            }

            function handleDragOver(e) {
                e.preventDefault();
                e.dataTransfer.dropEffect = 'move';
            }

            function handleDragEnter(e) {
                if (e.target.classList.contains('column2') && e.target.innerHTML === '') {
                    draggedToEmptyColumn = true;
                    e.target.classList.add('over');
                } else if (e.target.classList.contains('column1') && e.target.innerHTML === '') {
                    draggedToEmptyColumn = false;
                    e.target.classList.add('over');
                }
            }

            function handleDragLeave(e) {
                if (e.target.classList.contains('column2') || e.target.classList.contains('column1')) {
                    e.target.classList.remove('over');
                }
            }

            function handleDrop(e) {
                e.preventDefault();
                const dropCell = e.target;
                if (draggedToEmptyColumn && dropCell.classList.contains('column2') && dropCell.innerHTML === '') {
                    // Move the contents of the dragged cell to the empty column
                    dropCell.innerHTML = draggedCell.innerHTML;
                    draggedCell.innerHTML = '';

                    // Update the classes of the cells to keep them in their respective columns
                    draggedCell.classList.remove('over');
                    dropCell.classList.remove('over');
                    draggedCell.classList.add('column2');
                } else if (!draggedToEmptyColumn && dropCell.classList.contains('column1') && dropCell.innerHTML === '') {
                    // Move the contents of the dragged cell to the non-empty column
                    dropCell.innerHTML = draggedCell.innerHTML;
                    draggedCell.innerHTML = '';

                    // Update the classes of the cells to keep them in their respective columns
                    draggedCell.classList.remove('over');
                    dropCell.classList.remove('over');
                    draggedCell.classList.add('column1');
                }
            }

            function handleDragEnd(e) {
                draggedCell = null;
                draggedToEmptyColumn = false;
                originalColumn = null;
            }
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

        <div class="container-fluid mb-5 bg-white m-auto text-center justify-content-center ">
            <h1 class="mb-5 m-auto justify-content-center"> New Menu </h1>
            <div class="col-8 rounded-3 container-fluid text-light mt-5 m-auto p-4" id="divDestino">
                <div>
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

                    <div id="container">
                        <table id="myTable" class="tblLocations table-responsive mt-5 m-auto p-4 table-bordered" cellpadding="0" cellspacing="0" border="1">
                            <tr>
                                <th>Meal</th>
                                <th>Menu</th>
                            </tr>
                            <tbody>
                                <?php

                                if (sizeof($result) >= 0) {
                                    foreach ($result as $item) {
                                        extract($item); ?>
                                        <tr>
                                            <td>

                                                

                                            </td>
                                            <td>
                                                <div>

                                                </div>
                                            </td>
                                        </tr>

                                <?php
                                    }
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>

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