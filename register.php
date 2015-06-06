<html>
<?php
$connect=mysqli_connect("localhost","root","@mysql007","minipro");
if(mysqli_connect_errno())
{
	echo "failed to connect to server";
}
$name=$_REQUEST['name'];
$pwd=$_REQUEST['password'];
$sem=$_REQUEST['sem'];
$reg=$_REQUEST['number'];

$sql="select name from student where regno=$reg";
$result=mysqli_query($connect,$sql);
echo mysqli_num_rows($result);
if(mysqli_num_rows($result)==0)
{
	$sql="insert into student(name,sem,regno) values('$name',$sem,$reg)";
	$result=mysqli_query($connect,$sql);
	$sql="select max(id) as mx from student";
	$result=mysqli_query($connect,$sql);
	$row=mysqli_fetch_array($result);
	$id=$row['mx'];
	echo $id;
	$sql="insert into details(stu_id,password) values($id,'$pwd')";
	$result=mysqli_query($connect,$sql);
}
else
echo "$name already present. Try another";
//while($row=mysqli_fetch_array($result))
{
//echo $row['regno']."<br>";<strong></strong>
//echo $row['password']."<br>";
}
?>
</html>