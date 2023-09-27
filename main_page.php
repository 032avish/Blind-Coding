<?php
session_start();
date_default_timezone_set('Asia/Kolkata');//set time zone
$Roll_Number = $_SESSION['Roll_Number'] ?? "";
if ($Roll_Number == "")
{
  echo "<script>alert('login to proceed')</script>";
    header("location: http://codorb.in/");
    
}
if ($_SERVER["REQUEST_METHOD"] !== "POST"){ 
$_SESSION["entryTime"] =serialize(new DateTime(date("h:i:sa")));//initialize first question time & typecast from classs object to string by method serialize, we need to type cast bcoz class object can't store in session
}
?>

<!Doctype Html>
<html>

    <head>


        <script type="text/javascript">
            function preventBack() { window.history.forward(); }
            setTimeout("preventBack()", 0);
            window.onunload = function () { null };
        </script>

        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="http://codorb.in/s.css">
        <script src="http://codorb.in/main.js"></script>
        <!-- <script src="http://codehere.ezyro.com/main_page.js"></script> -->


        <script>
            document.addEventListener("click", () => {
                document.documentElement.requestFullscreen().catch((e) => {
                    console.log(e);
                });
            });
        </script>

    </head>



    <body>
        <div style="height: 50px;">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">Welcome to COD-ORB</a>



                <meta name="viewport" content="width=device-width, initial-scale=1">


                <p id="demo" class="sticky-top ml-auto text-white"></p>

                <script>

                    var countDownDate = new Date("May 30, 2021 16:00:00").getTime();


                    var x = setInterval(function () {


                        var now = new Date().getTime();


                        var distance = countDownDate - now;


                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);


                        document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                            + minutes + "m " + seconds + "s ";

                        // If the count down is over, write some text 
                        if (distance < 0) {
                            clearInterval(x);
                            document.getElementById("demo").innerHTML = "Time Out";
                            window.open("http://codorb.in/thanku_page.php", "_self");
                            

                        }
                    }, 1000);
                </script>
            </nav>
        </div>



        <div>

            <div class="left_half">

                <?php
    $server = "localhost";
    $user = "avish";
    $dbName = "login_details";
    $conn = new mysqli($server, $user, "jay@2000", $dbName);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";


                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $Roll_Number = $_SESSION['Roll_Number'] ?? "";
                    $entryTime = unserialize($_SESSION["entryTime"]);//typecast from string to classs object by unserialize method,need to typecast again in object becoz we have to calcluate time difference  
                        if ($Roll_Number != "")
                        {  
                               
                        $Question = $_SESSION['Question'];
                        $Code = $_POST['Code'];
                        $Language = $_POST['Language'];
                        $exitTime = new DateTime(date("h:i:sa"));//assign submission time of every question
                        $diff =$entryTime->diff($exitTime);//diff is inbuilt fn this return diffrence of time object
                        $timeData= (string)$diff->format("%H:%I:%S");//we can't store object in databse so here also need to typcast in string 
                            $sql = "INSERT INTO text VALUES ('$Roll_Number', $Question, '$Language', '$Code','$timeData')";
                            $conn->query($sql);
                           $_SESSION['entryTime']=null;
                           $_SESSION["entryTime"] =serialize(new DateTime(date("h:i:sa")));//set new entry time start for second question
                            $_SESSION['Question'] += 1;
                        

                        }

                        else
                        {
                            echo "<script>alert('login to proceed')</script>";
                        }

                    }
                        
                    
                    $Question = $_SESSION['Question'];
                    $sql = "SELECT * FROM questions WHERE Question_no = $Question";

                    $res = $conn->query($sql)->fetch_array(MYSQLI_NUM);
                    $question = $res[0] ?? "";
                    $statement = $res[1] ?? "";
                    $input_format = $res[2] ?? "";
                    $output_format = $res[3] ?? "";
                    $constraints = $res[4] ?? "";
                    $sample_input = $res[5] ?? "";
                    $sample_output = $res[6] ?? "";

                    if ($question == "")
                        header("Location: http://codorb.in/thanku_page.php");

                ?>

                    <p><b>Question : </b><?php echo $statement; ?></p>
                    <p><b>input_format : </b><?php echo $input_format; ?></p>
                    <p><b>output_format : </b><?php echo $output_format; ?></p>
                    <p><b>constraints : </b><?php echo $constraints; ?></p>
                    <p><b>sample_input : </b><?php echo $sample_input; ?></p>
                    <p><b>sample_output : </b><?php echo $sample_output; ?></p>

            </div>

            <div class="right_half">

                <form method="POST">
                     
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01"><b>Language</b></label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="Language" required>
                            <option selected disabled value="">Choose...</option>
                            <option value="C">C</option>
                            <option value="Cpp">C++</option>
                            <option value="Python">Python 3</option>
                            <option value="Java">Java</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <h4 class="disable-select">Write your code here....</h4>
                        <!-- <label for="comment">Comment:</label> -->
                        <div>
                            <textarea type ="text" name ="Code" id="code" class="code" rows="" spellcheck="false"></textarea>
                        </div>
                        
                    </div>
                    

                <section>

                    <div class="submit_btn">
                        <button type="submit"  name ="click" class="btn btn-primary">Next</button>
                       
                        <div>
                            
                        </div>
                    </div>

                    <div class="final_submit_btn">
                        
                        <a href="thanku_page.php" button type="submit" class="btn btn-success" role="button"
                            aria-disabled="true">Finish</a>
                    </div>
                </section>
              
                </form>
            </div>
        </div>
    </body>





    <script type="text/javascript">
        window.oncontextmenu = function () {
            return false;
        }
        $(document).keydown(function (event) {
            if (event.keyCode == 123) {
                return false;
            }
            else if ((event.ctrlKey && event.shiftKey && event.keyCode == 73) || (event.ctrlKey && event.shiftKey && event.keyCode == 74)) {
                return false;
            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            const yourInput = document.getElementById('code');
            yourInput.ondrop = e => e.preventDefault();
            //Disable full page
            $('body').bind('cut copy paste', function (e) {
                e.preventDefault();
            });
        });

    </script>

    <script type="text/javascript">
        var mouseDown = false;
        $('textarea').on('mousedown touchstart', function (event) {
            mouseDown = true;
        });
        $('textarea').on('mousemove touchmove', function (event) {
            event.preventDefault();
            if (mouseDown) {
                console.log('dragging');
                const yourInput = document.getElementById('code');
                yourInput.ondragstart = function () {
                    return false;
                };
            }
        });
        $(window.document).on('mouseup touchend', function (event) {
            // Capture this event anywhere in the document, since the mouse may leave our element while mouse is down and then the 'up' event will not fire within the element.
            mouseDown = false;
        });
    </script>

</html>
 




