<!DOCTYPE html>
<?php
session_start();
$Roll_Number = $_SESSION['Roll_Number'] ?? "";
if ($Roll_Number == "")
{
  echo "<script>alert('login to proceed')</script>";
    header("location:./index.php");
}
?>
<html>

  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="main.js"></script>
    <link rel="stylesheet" href="last.css">
    <script type="text/javascript">
      function preventBack() { window.history.forward(); }
      setTimeout("preventBack()", 0);
      window.onunload = function () { null };
    </script>

  </head>

  <!--<body class= "title" background ="i9.jpeg">-->
  <!--<body class= "title" background ="imag4.jpeg">-->
  
<body class= "title" background ="dark.jpeg">
 
  
    <section class="my-5">
      <div class="p3">
        <br><br><br><br><br><br>
        <h1 style="font-size:8vw"class="text-center text-white"><b>THANK YOU<b></h1>
      </div>
      <br>
      <div class="w-50 m-auto text-center text-white">
       
                <h3 ><i>Thank you for participation, it means a lot to us, just like you do! We really appreciate you giving us a moment of your time.</i><h3><br><br>
        <a href="index.php" class="btn btn-primary btn-lg " role="button" aria-disabled="true"><b>Home</b></a>
      </div>
    </section>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>

</html>