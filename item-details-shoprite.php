<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Details</title>
</head>
<body>
<script>

</script>

<?php
//display what is clicked on the searchbck (Will be modified)
$resultData = $_GET['resultData'];
$resultArray = json_decode($resultData, true);

// Use the $resultArray as needed

// Example: Output the result data
foreach ($resultArray as $result) {
    echo "<img src='" . $result['imageSrc'] . "'><br>";
    echo "Name: " . $result['name'] . "<br>";
    echo "Third Column: " . $result['thirdColumn'] . "<br>";
    echo "Second Column: " . $result['SecondColumn'] . "<br>";
    echo "<br>";
  }
?>

</body>
</html>




