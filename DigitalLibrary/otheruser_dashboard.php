<?php
include("data_class.php");

$userloginid=$_SESSION["userid"];

if(empty($_SESSION['userid'])){
    header("Location: index.php?msg=Login First");
}

// $userloginid=$_SESSION["userid"] = $_GET['userlogid'];

// if(empty($_SESSION['userid'])){
//     header("Location: index.php?msg=Login First");
// }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- custom css link -->
    <link rel="stylesheet" href="otheruser_dashboard_style.css">

</head>
<body>
    <div class="container">
        <div class="innerdiv">
            <div class="row">
                <img class="imagelogo" src="images/logo.jpeg" alt="">
            </div>
            <div class="leftinnerdiv">
                <Button class="greenbtn" onclick="openpart('myaccount')">
                <img class="icons" src="images/icon/profile.png" width="30px" height="30px" /> My Account</Button>

                <Button class="greenbtn" onclick="openpart('requestbook')">
                <img class="icons" src="images/icon/book.png" width="30px" height="30px" /> Request Book</Button>

                <Button class="greenbtn" onclick="openpart('issuereport')">
                <img class="icons" src="images/icon/monitoring.png" width="30px" height="30px" /> Book Report</Button>
                
                <a href="index.php"><Button class="greenbtn"><img class="icons" src="images/icon/logout.png" width="30px" height="30px" /> LOGOUT</Button></a>
            </div>

<!-- My Account Portion -->
    <div class="rightinnerdiv">
        <div id="myaccount" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo ""; }?>">
            <Button class="greenbtn btn-title">My Account</Button>
            <?php
                $u=new data;
                $u->setconnection();
                $u->userdetail($userloginid);
                $recordset=$u->userdetail($userloginid);
                foreach($recordset as $row){

                $id= $row[0];
                $name= $row[1];
                $email= $row[2];
                $pass= $row[3];
                $type= $row[4];
                }               
            ?>
            <table>
                <tr><td>Person Name:</td><td><?php echo $name ?></td></tr>
                <tr><td>Person Email:</td><td><?php echo $email ?></td></tr>
                <tr><td>Account Type:</td><td><?php echo $type ?></td></tr>
            </table>
        </div>
    </div>

<!-- Book Record Portion -->
    <div class="rightinnerdiv">
        <div id="issuereport" class="innerright portion"
            style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo "display:none"; }?>">
            <Button class="greenbtn btn-title">BOOK RECORD</Button>
            <?php
                //$userloginid=$_SESSION["userid"] = $_GET['userlogid'];
                $u=new data;
                $u->setconnection();
                $u->getissuebook($userloginid);
                $recordset=$u->getissuebook($userloginid);

                $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  
                padding: 8px;'>Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Return</th></tr>";

                foreach($recordset as $row)
                {
                    $table.="<tr>";
                    "<td>$row[0]</td>";
                    $table.="<td>$row[2]</td>";
                    $table.="<td>$row[3]</td>";
                    $table.="<td>$row[6]</td>";
                    $table.="<td>$row[7]</td>";
                    $table.="<td>$row[8]</td>";
                    $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'><button type='button' class='btn btn-primary'>Return</button></a></td>";
                    $table.="</tr>";
                    // $table.=$row[0];
                }
                $table.="</table>";
                echo $table;
            ?>
        </div>
    </div>

<!-- Return Book Portion -->
    <!-- <div class="rightinnerdiv">
        <div id="return" class="innerright portion"
            style="<?php  if(!empty($_REQUEST['returnid'])){ $returnid=$_REQUEST['returnid'];} else {echo "display:none"; }?>">
            <Button class="greenbtn btn-title">Return Book</Button>

        <?php

            $u=new data;
            $u->setconnection();
            $u->returnbook($returnid);
            $recordset=$u->returnbook($returnid);
        ?>

        </div>
    </div> -->

<!-- Request Book Portion -->
    <div class="rightinnerdiv">
        <div id="requestbook" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ $returnid=$_REQUEST['returnid'];echo "display:none";} else {echo "display:none"; }?>">
            <Button class="greenbtn btn-title">Request Book</Button>
            <?php
                $u=new data;
                $u->setconnection();
                $u->getbookissue();
                $recordset=$u->getbookissue();

                $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr>
                <th>Image</th><th>Book Name</th><th>Book Authour</th><th>branch</th><th>price</th></th><th>Request Book</th></tr>";

                foreach($recordset as $row)
                {
                    $table.="<tr>";
                    "<td>$row[0]</td>";
                    $table.="<td><img src='uploads/$row[1]' width='100px' height='100px' style='border:1px solid #333333;'></td>";
                    $table.="<td>$row[2]</td>";
                    $table.="<td>$row[4]</td>";
                    $table.="<td>$row[6]</td>";
                    $table.="<td>$row[7]</td>";
                    $table.="<td><a href='requestbook.php?bookid=$row[0]&userid=$userloginid'><button type='button' class='btn btn-primary'>Request Book</button></a></td>";
            
                    $table.="</tr>";
                    // $table.=$row[0];
                }
                $table.="</table>";
                echo $table;
            ?>

        </div>
    </div>

</div>
</div>


<script>
    function openpart(portion) {
        var i;
        var x = document.getElementsByClassName("portion");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        document.getElementById(portion).style.display = "block";
    }
</script>

    <!-- bootstrap script link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <!-- jquery script link -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="" async defer></script>
</body>

</html>