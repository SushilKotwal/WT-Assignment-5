<?php
$name = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$age = $_POST['age'];
$mno = $_POST['mobile'];
$area = $_POST['area'];

$conn = new mysqli('localhost','root','','assignment 5');
if($conn->connect_error){
    die('connection failed :'.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into registration(name, gender, email, age, mobile, area) 
    values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiis",$name,$gender,$email,$age,$mno,$area);
    $stmt->execute();
    echo " Registered successfull";
    $stmt->close();
    $conn->close();
}

$connect = new mysqli('localhost','root','','assignment 5');
$sql = "SELECT * from registration";
$output = mysqli_query($connect,$sql);
$json_array = array();
while($row = mysqli_fetch_assoc($output))
{
    $json_array[] = $row;
}

$json_data = json_encode($json_array);
file_put_contents('data.json',$json_data)

?>
