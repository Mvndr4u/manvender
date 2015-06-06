<html>
<?php
$connect=mysqli_connect("localhost","root","@mysql007","minipro");
if(mysqli_connect_errno())
{
	echo "failed to connect to server";
}
$number=$_REQUEST['number'];
$pwd=$_REQUEST['password'];

$sql="select student.sem,student.regno,details.password from details,student where student.id=details.stu_id and student.regno='$number'";
$result=mysqli_query($connect,$sql);
$no=0;
$sem=0;
$pass=-1;
while($row=mysqli_fetch_array($result))
{
 $sem=$row['sem'];
 $no=$row['regno'];
 $pass=$row['password'];
}

if($no==$number&&$pass==$pwd)
{
	echo "<head><script>window.location.assign('pages/sem$sem.html');</script></head>";
}
else
echo "Incorrect Username or Password";
?>
</html>