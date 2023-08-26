<?php
    $servername = "localhost";
    $dbuser = "raspoi";
    $dbpass = "poisql";
    $dbname = "basicsem";
    $conn = new mysqli($servername, $dbuser, $dbpass, $dbname);

    echo "<h2>categories</h2><br>";
    $sql = "SELECT * FROM category";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
  // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<a href='qpage.html?id=".$row["category_id"]."&cat_name=".$row["category_name"]."'>".$row["category_name"]."</a><br>";
        }
    } else {
        echo "0 results";
    }

    $conn->close();
?>
