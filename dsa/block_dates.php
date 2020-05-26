<?php
session_start();
error_reporting(0);

//echo "person id=".$_SESSION['personid'];
if(!isset($_SESSION['email'])){
   header("Location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Residencia</title>
  <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-2.2.4.js" ></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="a.css">
    <title> View Available Rooms </title>
    <script>
      $(document).ready(function ()
      {
        var minDate = new Date();
        $("#from").datepicker({
          showAnim: 'drop',
          numberOfMonth: 1,
          minDate: minDate,
          maxDate:120,
          dateFormat: 'yy/mm/dd',
          onClose: function(selectedDate){
            $('#to').datepicker("option", "minDate",selectedDate);
          }
        });


        $("#to").datepicker({
          showAnim: 'drop',
          numberOfMonth: 1,
          minDate: minDate,
          maxDate:120,
          dateFormat: 'yy/mm/dd',
          onClose: function(SelectedDate){
            $('#to').datepicker("option", "minDate",selectedDate);
          }
        });


      });

    </script>


<style>

.input-container {
  display: flex;
  width: 100%;
  margin-bottom: 10px;
}

/* Style the form icons  dodgerblue */
.icon {
  padding: 13px;
  background: #ff4641;
  color: white;
  min-width: 65px;
  text-align: center;
}

/* Style the input fields */
.input-field {
  width: 70%;
  padding: 10px;
  outline: none;

}

.input-field:focus {
  border: 1px solid #ff4641;
}
.three{
  border: 3px solid #f1f1f1;

}
.ten{
  border: 3px solid #f1f1f1;

}
.nine{
  font-family: 'Poiret One', cursive;
  font-size: 20px;
  font-weight: bold;
}

button{
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 60%;
}


/*  hover effect for buttons */
button:hover {
  opacity: 0.8;
}

.one{
  display: flex;
  justify-content: center;
  padding-top: 100px;

}
span.psw {
  float: right;
  padding-top: 16px;
}

.two{
  font-family: 'Poiret One', cursive;
  font-size: 25px;
  font-weight: bold;
  min-height: 128px;
  background-color: #eaf4f4;
}
p{
  font-family: 'Poiret One', cursive;
  font-size: 30px;
  font-weight: bold;
}

.four{
  font-family: 'Poiret One', cursive;
  font-size: 20px;
  font-weight: bold;
  min-height: 375px;
}
.five{
  font-family: 'Poiret One', cursive;
  font-size: 25px;
  font-weight: bold;
}

.fa {
  padding: 20px;
  font-size: 30px;
  width: 30px;
  text-align: center;
  text-decoration: none;
  border-radius: 50%;
}
.six{
  max-width: 99%;
  background-color: #eaf4f4;
}
.eight{
  min-height: 500px;
}

a:link {
  text-decoration: none;
}
</style>


</head>

<body>
<nav class="navbar  two" id="scroll1">
  <div class="container-fluid">
        <div class="navbar-header" >
          <a class="navbar navbar-brand" href="index.php">
          <img src="images/logo2.png">
          </a>

        </div>
        <div>

        <ul class="nav navbar-nav navbar-right">
		<li><a href="admin.php"> Dashboard</a> &nbsp&nbsp&nbsp <a href="logout.php"> Logout</a> </li>

        </ul>
      </div>
</nav>

    <br/>

    <?php
    if(isset($_POST['mybutton']))
    {
      $mysqlHostname = "localhost";
      $mysqlUsername = "root";
     $mysqlPassword = "meera";
      //$mysqlPassword = "";
      $mysqlDb = "dsadb";
      $conn=mysql_connect($mysqlHostname, $mysqlUsername, $mysqlPassword)
      or die("Connection to MySQL database failed: ". mysql_error());


      mysql_select_db("$mysqlDb")
      or die("Selection of database failed: ".mysql_error());

      $rs= @mysql_select_db ($mysqlDb, $conn)
      or die("Could not open $mysqlDb: ".mysql_error());



    	$sql1= "insert into blocked_dates(from_date, to_date, reason)	values('$_POST[from]', '$_POST[to]', '$_POST[reason]')";

    	   $rs1 =@mysql_query($sql1,$conn) or die ("could not execute insert SQL query");

    	echo "<p><font color=\"blue\"> All rooms blocked on the given dates..... </font></p>";



    } //submitted_for if ?>


<form action="block_dates.php" method="post" autocomplete="off">
<div class="container-fluid eight">


<br/>

<div  class="container four">
<p>Block Rooms</p>

<div class="row text-center">
  <div class="col-md-3">
    <div class="row">
      <div class="col-md-12">From Date</div>

    </div>
    <div class="row ">
      <div class="col-md-12 input-container"><i class="fa fa-calendar icon"></i>&nbsp&nbsp<input class="input-field" type="text" name="from" id="from" required/></div>


    </div>
  </div>


  <div class="col-md-3">
    <div class="row">
      <div class="col-md-12">To Date</div>
    </div>
    <div class="row">
      <div class="col-md-12 input-container"><i class="fa fa-calendar icon"></i>&nbsp&nbsp<input class="input-field" type="text" name="to" id="to" required/></div>
  </div>
  </div>

  <div class="col-md-3">
    <div class="row">
      <div class="col-md-12">Reason</div>
    </div>
    <div class="row">
      <div class="col-md-12 input-container">&nbsp&nbsp<input class="input-field" type="text" name="reason" id="reason" required/></div>
    </div>
	</div>

  <div class="col-md-3">
    <div class="row">
      <br/>
    </div >
    <div class="row">

    <button type="submit" name="mybutton" class="btn btn-primary" id="mybutton"><b>Block</b></button>
  </div>
  </div>



</div> <!-- row div -->








</div>




<footer class="six">

<div class="row">
  <div class="col-md-4"></div>

    <div class="col-md-4 text center">
        &nbsp&nbsp  &nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp
        <a href="#" class="fa fa-facebook"></a> &nbsp&nbsp
        <a href="#" class="fa fa-twitter"></a> &nbsp&nbsp
        <a href="#" class="fa fa-instagram"></a> &nbsp&nbsp
    </div>
<div class="col-md-4"></div>
</div>

<div class="row">
    <div class="col-md-4"></div>

    <div class="col-md-4 text center ten nine">
      &nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp
        <a href="#">hotelresidencia30@gmail.com</a>
    </div>
    <div class="col-md-4"></div>
</div>
</div>


</footer>
</body>
</html>
