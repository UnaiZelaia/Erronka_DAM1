<?php
phpinfo();

$result;

$i = 1;
foreach($result as $item){
    extract($item);
    ?>
    <div id="<?php  echo  "arrastrable" . $i   ?>">
        <button>
            <?php echo $item_description ?>
        </button>
    </div><?php
    $i++;
}
?>