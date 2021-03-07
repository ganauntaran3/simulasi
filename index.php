<?php
include "partials/header.php";
include "partials/navbar.php";
?>


<div class="container">
      <?php  
        // ambil json
        $json = file_get_contents('shapes/triangle.json');
        $triangle = json_decode($json,true);
        $t = count($triangle);
        $json = file_get_contents('shapes/circle.json');
        $circle = json_decode($json,true);
        $c = count($circle);
        $json = file_get_contents('shapes/square.json');
        $square = json_decode($json,true);
        $s = count($square);
      ?>
      <br>
      <br>
      <br>
      <br>
      <br>
      <h5>Diagram Batang</h5>
      <br>
    <table>
      <tr>
        <td valign=bottom><div style="width:50px; height:<?= $t*50 ?>px; background:#fea; text-align: center;"><?= $t ?></td>
        <td valign=bottom><div style="width:50px; height:<?= $c*50 ?>px; background:#fea;  text-align: center;"><?= $c ?></td>
        <td valign=bottom><div style="width:50px; height:<?= $s*50 ?>px; background:#fea;  text-align: center;"><?= $s ?></td>
      </tr>
      
      <tr>
        <th>Segitiga &nbsp;&nbsp;</th> <th>Lingkaran &nbsp;&nbsp;</th> <th>Persegi &nbsp;&nbsp;</th>
      </tr>
      </table>

      <hr>

    </div>

    <?php
    include "partials/footer.php";
    ?>