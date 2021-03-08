<?php
include "partials/header.php";
include "partials/navbar.php";
?>

<div class="container">

<div class="row">
    <div class="col-lg-12">
        <form class="mt-3" action="shapes/action.php" method="POST">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Alas (cm)</label>
            <input type="number" class="form-control" name="a" id="exampleFormControlInput1" placeholder="Masukkan panjang alas">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tinggi (cm)</label>
            <input type="number" class="form-control" name="t" id="exampleFormControlInput1" placeholder="Masukkan tinggi segitiga">
        </div>

         
        <button type="submit" name="triangle" class="btn btn-primary">Hitung</button>
        </form>
    </div>
</div>

<table class="table mt-5">
        <thead>
        <tr>
        <th>#</th>
        <th>Panjang Alas</th>
        <th>Tinggi Segitiga</th>
        <th>Luas</th>
        <th>Create at</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php 
            $json = file_get_contents('shapes/triangle.json');
            $data = json_decode($json,true);
            if ($data !== null && !empty($data)) :
            foreach ($data as $key =>$k) { 
                $sort[$key] = strtotime($k['create_at']); 
            } 
            array_multisort($sort,SORT_DESC,$data); 
                $i=1; 
                foreach ($data as $row): 
            ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $row["a"] ?> cm</td>
                <td><?= $row["t"] ?> cm</td>
                <td><?= $row["luas"] ?> cm<sup>2</sup></td>
                <td><?= $row["create_at"] ?>  </td>
                <td>
                    <form action="shapes/action.php">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="hidden" name="resultT" value="1">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>


            <?php 
               $i++;
                endforeach;
            endif;
            ?>
        </tbody>
        
    </table>
</div>



    <?php
    include "partials/footer.php";
    ?>