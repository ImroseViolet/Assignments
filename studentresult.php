<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result Calculator</title>
</head>
<body>
    <form method="POST">
        <label>Student Name:</label><input type="text" name="student_name">
        <br><br>
        <label>DSAII:</label><input type="number" name="marks[]">
        <br><br>
        <label>SESA:</label><input type="number" name="marks[]">
        <br><br>
        <label>NMA:</label><input type="number" name="marks[]">
        <br><br>
        <label>MATH:</label><input type="number" name="marks[]">
        <br><br>
        <label>IPLab:</label><input type="number" name="marks[]">
        <br><br>
        <button type="submit" name="calculate">Calculate Result</button>
    </form>
    <?php
    if(isset($_POST['calculate'])){
        $name = htmlspecialchars($_POST['student_name']);
        $marks = array_map('intval',$_POST['marks']);
        $subjects = ["DSAII", "SESA", "NMA", "MATH", "IPLab"];
        $total = 0;
        $highest = $marks[0];
        $lowest = $marks[0];
        $passed = 0;
        $failed = 0;

        echo "<hr>";
        echo "<h2>Student Result</h2>";
        echo "<p><b>Student Name:</b> $name</p>";
        echo "<table border='1' cellpadding='8'>";
        echo "<tr><th>Subject</th><th>Marks</th><th>Result</th></tr>";
        for($i = 0; $i < 5; $i++){
            $total += $marks[$i];
            if($marks[$i] >= 40){
                $result = "Pass";
                $passed++;
            }
            else{
                $result = "Fail";
                $failed++;
            }
            if($marks[$i] > $highest){
                $highest = $marks[$i];
            }
            if($marks[$i] < $lowest){
                $lowest = $marks[$i];
            }
            echo "<tr>";
            echo "<td>" . $subjects[$i] . "</td>";
            echo "<td>" . $marks[$i] . "</td>";
            echo "<td>" . $result . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        $average = $total / 5;
        if($failed == 0){
            $overall = "Pass";
        }
        else{
            $overall = "Fail";
        }
        echo "<h3>Summary</h3>";
        echo "Total Marks: $total/500 <br>";
        echo "Average Marks: " . number_format($average, 2) . "<br>";
        echo "Highest Mark: $highest<br>";
        echo "Lowest Mark: $lowest<br>";
        echo "Passed Subjects: $passed<br>";
        echo "Failed Subjects: $failed<br>";

        echo "<h3>Overall Result: $overall</h3>";
    }
    ?>

    
</body>
</html>