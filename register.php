<?php 
include_once 'dbc.php';
if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['age']) && isset($_POST['contact_no']) && isset($_POST['email'])) {

$id =$_POST['id'];
$name =$_POST['name'];
$age =$_POST['age'];
$contact_no =$_POST['contact_no'];
$email =$_POST['email'];

$sql = "INSERT INTO patients (id,name,age,contact_no,email) VALUES ('$id','$name','$age','$contact_no','$email')";
$result = mysqli_query($connect,$sql);

header("Location:index.php?signup=sucess");

}
if (isset($_POST['deleteid'])) {
$deleteid =$_POST['deleteid'];

$sql1 = "DELETE FROM patients WHERE id = $deleteid";
$result1 = mysqli_query($connect,$sql1);
header("Location:index.php?deleterow=sucess");
}

if (isset($_POST['updateid']) && isset($_POST['updateage'])) {
$updateid =$_POST['updateid'];
$updateage =$_POST['updateage'];

$sql2 = "UPDATE patients SET age = $updateage WHERE id = $updateid";
$result2 = mysqli_query($connect,$sql2);

header("Location:index.php?updaterow=sucess");
}
?>