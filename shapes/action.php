<?php

//menghitung luas segitiga
if (isset($_POST['triangle'])) {

    $a = $_POST['a'];
    $t = $_POST['t'];

    $json = file_get_contents('triangle.json');
    $data = json_decode($json, true);
    $id = uniqid(rand());
    $row = array(
        'id' => $id,
        'a' => $a,
        't' => $t,
        'luas' => 0.5 * $a * $t,
        'create_at' => date('Y-m-d h:i:s A'),
    );
    $data[$id] = $row;
    $final = json_encode($data,JSON_PRETTY_PRINT);
    if (file_put_contents('triangle.json',$final)) {
        header('Location: http://localhost/simulasi/triangle.php');
    }
}

//Menghitung luas lingkaran
if (isset($_POST['circle'])) {

    $r = $_POST['r'];

    $json = file_get_contents('circle.json');
    $data = json_decode($json, true);
    $id = uniqid(rand());
    $row = array(
        'id' => $id,
        'r' => $r,
        'luas' => 3.14 * $r * $r,
        'create_at' => date('Y-m-d h:i:s A'),
    );
    $data[$id] = $row;
    $final = json_encode($data,JSON_PRETTY_PRINT);
    if (file_put_contents('circle.json',$final)) {
        header('Location: http://localhost/simulasi/circle.php');
    }
}


//Menghitung luas persegi
if (isset($_POST['square'])) {

    $s = $_POST['s'];

    $json = file_get_contents('square.json');
    $data = json_decode($json, true);
    $id = uniqid(rand());
    $row = array(
        'id' => $id,
        's' => $s,
        'luas' => $s * $s,
        'create_at' => date('Y-m-d h:i:s A'),
    );
    $data[$id] = $row;
    $final = json_encode($data,JSON_PRETTY_PRINT);
    if (file_put_contents('square.json',$final)) {
        header('Location: http://localhost/simulasi/square.php');
    }
}

// Delete ingkaran

if($_GET['resultC'] == 1) {

    $json = file_get_contents('circle.json');
    $data = json_decode($json, true);

    unset($data[$_GET['id']]);
    $final = json_encode($data,JSON_PRETTY_PRINT);
    if (file_put_contents('circle.json',$final)) {
        header('Location: http://localhost/simulasi/circle.php');
    }

}

if($_GET['resultS'] == 1) {

    $json = file_get_contents('square.json');
    $data = json_decode($json, true);

    unset($data[$_GET['id']]);
    $final = json_encode($data,JSON_PRETTY_PRINT);
    if (file_put_contents('square.json',$final)) {
        header('Location: http://localhost/simulasi/square.php');
    }

}

if($_GET['resultT'] == 1) {

    $json = file_get_contents('triangle.json');
    $data = json_decode($json, true);

    unset($data[$_GET['id']]);
    $final = json_encode($data,JSON_PRETTY_PRINT);
    if (file_put_contents('triangle.json',$final)) {
        header('Location: http://localhost/simulasi/triangle.php');
    }

}
?>