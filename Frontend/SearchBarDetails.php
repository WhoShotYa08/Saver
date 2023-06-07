<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Details</title>
</head>
<body>

<div class="Container">
    <p><span style="font-size:20px; font-weight:bold; position: absolute; left:10">Product Details</span></p>
</div>



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
    echo "Discount Price: " . $result['thirdColumn'] . "<br>";
    echo "Original Price: " . $result['SecondColumn'] . "<br>";
    echo "<br>";
  }
?>

</body>
</html>




