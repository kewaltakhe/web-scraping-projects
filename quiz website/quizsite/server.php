<?php
    $servername = "localhost";
    $dbuser = "raspoi";
    $dbpass = "poisql";
    $dbname = "basicsem";
    $conn = new mysqli($servername, $dbuser, $dbpass, $dbname);
    //
    $category_id = 0;
    $sql = "select * from question_bank where category_id = ".$category_id;
    $result = $conn->query($sql);
    //

    if ($result->num_rows > 0) {
        $count = 1;
        while($row = $result->fetch_assoc()) {
            $json[] = $row;
            $count++;
        }
        echo json_encode($json);

    } else {
        echo "0 results";
    }

    $conn->close();

?>
