<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<?php
function debug_to_console($putout) {
    $output = $putout;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
$servername = "localhost";
$username = "111117";
$password = "saltaire";
$dbname = "111117";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$data = array();

$sql = "SELECT Amount FROM browsers";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    //$browsers = $row['Browser'];
    $Users = $row['Amount'] . ",";
    array_push($data, $Users);

    debug_to_console($Users);
  }
}else{
  echo"0 results found!";
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<body>

<div id="myPlot" style="width:100%;max-width:700px"></div>

<script>
var xArray = ["Firefox", "Chrome", "Edge"];
var yArray = [<?php echo '"'.implode('","', $data).'"' ?>];
console.log(yArray)

var data = [{
  x:xArray,
  y:yArray,
  type:"bar"
}];

var layout = {title:"Firefox - Chrome"};

Plotly.newPlot("myPlot", data, layout);
</script>

</body>
</html>

