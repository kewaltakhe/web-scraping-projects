<?php
    $servername = "localhost";
    $dbuser = "raspoi";
    $dbpass = "poisql";
    $dbname = "basicsem";
    $conn = new mysqli($servername, $dbuser, $dbpass, $dbname);
    //
    $category_id = (int)$_GET['id'];
    echo "<h2>".$category_name = $_GET['cat_name']."</h2><br>";
    $sql = "select * from question_bank where category_id = ".$category_id;
    $result = $conn->query($sql);
    //

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        //load_question();

    } else {
        echo "0 results";
    }

    $conn->close();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="panel">
        <div class="result">

        </div>
        <div class="question-container" id="question">
        </div>
        <div class="option-container">
            <button class="option" onclick="" id="op1" ></button>

            <button class="option" id="op2" ></button>

            <button class="option" id="op3"></button>

            <button class="option" id="op4"></button>
        </div>
        <div class="navigation">
            <button class="evaluate">Evaluate</button>
            <button class="next" action>Next</button>
        </div>
    </div>
    <script type="text/javascript">
        var start = true;

    // Iterate
    function iterate() {

        // Getting the result display section
        var result = document.getElementsByClassName("result");
        result[0].innerText = "";
        // Getting the question
        const question = document.getElementById("question");
        question.innerText = "<?php echo $row["q_text"];?>";

        const op1 = document.getElementById('op1');
        const op2 = document.getElementById('op2');
        const op3 = document.getElementById('op3');
        const op4 = document.getElementById('op4');
        // Providing option text
        op1.innerText = "<?php echo substr($row["otp1"],4);?>"
        op2.innerText = "<?php echo substr($row["otp2"],4);?>";
        op3.innerText = "<?php echo substr($row["otp3"],4);?>";
        op4.innerText = "<?php echo substr($row["otp4"],4);?>";
        var selected = "";

        // Show selection for op1
        op1.addEventListener("click", () => {
            op1.style.backgroundColor = "lightgoldenrodyellow";
            op2.style.backgroundColor = "lightskyblue";
            op3.style.backgroundColor = "lightskyblue";
            op4.style.backgroundColor = "lightskyblue";
            selected = "A";
        })

        // Show selection for op2
        op2.addEventListener("click", () => {
            op1.style.backgroundColor = "lightskyblue";
            op2.style.backgroundColor = "lightgoldenrodyellow";
            op3.style.backgroundColor = "lightskyblue";
            op4.style.backgroundColor = "lightskyblue";
            selected = "B";
        })

        // Show selection for op3
        op3.addEventListener("click", () => {
            op1.style.backgroundColor = "lightskyblue";
            op2.style.backgroundColor = "lightskyblue";
            op3.style.backgroundColor = "lightgoldenrodyellow";
            op4.style.backgroundColor = "lightskyblue";
            selected = "C";
        })

        // Show selection for op4
        op4.addEventListener("click", () => {
            op1.style.backgroundColor = "lightskyblue";
            op2.style.backgroundColor = "lightskyblue";
            op3.style.backgroundColor = "lightskyblue";
            op4.style.backgroundColor = "lightgoldenrodyellow";
            selected = "D";
        })

        // Grabbing the evaluate button
        const evaluate = document.getElementsByClassName("evaluate");

        // Evaluate method
        evaluate[0].addEventListener("click", () => {
                var val = "<?php echo $row["ans"] ?>";
                if (val == selected){
                    result[0].innerHTML = "correct";
    			    result[0].style.color = "green";
                }else{
                    result[0].innerHTML = "wrong";
    			    result[0].style.color = "red";
                }

        })
    }

    if (start) {
        iterate();
    }
    const next = document.getElementsByClassName('next')[0];
    var id = 0;

    next.addEventListener("click", () => {
        iterate();

    })
    </script>

</body>

</html>
