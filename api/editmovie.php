<?php
include_once("../base.php");


if (!empty($_POST['name']) &&!empty($_POST['onday'])&&!empty($_POST['offday'])&&!empty($_POST['star'])&&!empty($_POST['inform'])) {
    if (strtotime($_POST['onday']) >= strtotime($_POST['offday'])) {
    to("../backend.php?do=edit&movie={$_POST['id']}&error=daywrong");
        
    } else{

        $data = $Movie->find($_POST['id']);
        if (!empty($_FILES['poster']['tmp_name'])) {
            move_uploaded_file($_FILES['poster']['tmp_name'], '../img/' . $_FILES['poster']['name']);
            $data['poster'] = $_FILES['poster']['name'];
        }
        foreach ($_POST as $key => $value) {

            if ($key != "star") {
                $data[$key] = $value;
            } else if ($key == "star") {
                $data['star'] = implode(",", $value);
            }
        }

        $Movie->save($data);
        to("../backend.php?do=movie&notice=editsus");

    }
} else {
    to("../backend.php?do=edit&movie={$_POST['id']}&error=empty");

}




