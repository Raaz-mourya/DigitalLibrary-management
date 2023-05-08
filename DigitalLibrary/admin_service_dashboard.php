<?php

include("data_class.php");

if(empty($_SESSION['adminid'])){
    header("Location:index.php?msg=Login First");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Library</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- custom css link -->
    <link rel="stylesheet" href="admin_service_style.css">


</head>

<body>
    
    <div class="container">
        <div class="innerdiv">
            <div class="row">
                <img class="imagelogo" src="images/logo.jpeg" alt="">
            </div>
            <div class="leftinnerdiv">
                <Button class="greenbtn">Admin</Button>
                <Button class="greenbtn" onclick="openpart('addbook')">ADD BOOK</Button>
                <Button class="greenbtn" onclick="openpart('bookreport')">BOOK REPORT</Button>
                <Button class="greenbtn" onclick="openpart('bookrequestapprove')">BOOK REQUEST</Button>
                <Button class="greenbtn" onclick="openpart('addperson')">ADD STUDENT</Button>
                <Button class="greenbtn" onclick="openpart('studentrecord')">STUDENT REPORT</Button>
                <Button class="greenbtn" onclick="openpart('issuebook')">ISSUE BOOK</Button>
                <Button class="greenbtn" onclick="openpart('issuebookreport')">ISSUE REPORT</Button>
                <a href="index.php"><Button class="greenbtn">LOGOUT</Button></a>
            </div>

<!-- Add Book Portion -->
            <div class="rightinnerdiv">
                <div id="addbook" class="innerright portion" style="display:none">
                    <Button class="greenbtn btn-title">ADD BOOK</Button>
                    <form action="addbookserver_page.php" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td><label>Book Name:</label></td>
                                <td><input type="text" name="bookname" /> </td>
                            </tr>
                            <tr>
                                <td><label>Detail:</label></td>
                                <td><input type="text" name="bookdetail" /> </td>
                            </tr>
                            <tr>
                                <td><label>Author:</label></td>
                                <td><input type="text" name="bookauthor" /> </td>
                            </tr>
                            <tr>
                                <td><label>Publication:</label></td>
                                <td><input type="text" name="bookpub" /> </td>
                            </tr>
                            <tr>
                                <td><label>Branch:</label></td>
                                <td><input type="radio" name="branch" value="it" />IT
                                    <input type="radio" name="branch" value="civil" />Civil
                                    <input type="radio" name="branch" value="ec" />EC
                                </td>
                            </tr>
                            <tr>
                                <td><label>Price:</label></td>
                                <td><input type="number" name="bookprice" /> </td>
                            </tr>
                            <tr>
                                <td><label>Quantity:</label></td>
                                <td><input type="number" name="bookquantity" /> </td>
                            </tr>
                            <tr>
                                <td><label>Photo:</label></td>
                                <td><input type="file" name="bookphoto" /> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="SUBMIT" /> </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>

<!-- issue book -->
        <div class="rightinnerdiv">
                <div id="issuebook" class="innerright portion" style="display:none">
                    <Button class="greenbtn btn-title">ISSUE BOOK</Button>
                    <form action="issuebook_server.php" method="post" enctype="multipart/form-data">
                        <table>
                        <tr><td>Choose Book:</td>
                        <td>
                        <select name="book">
                        <?php
                            $u=new data;
                            $u->setconnection();
                            $u->getbookissue();
                            $recordset=$u->getbookissue();
                            foreach($recordset as $row){
                            echo "<option value='". $row[2] ."'>" .$row[2] ."</option>";
                            }            
                        ?>
                        </select>
                        </td></tr>
                        <tr><td>Select Student:</td><td>
                        <select name="userselect">
                        <?php
                            $u=new data;
                            $u->setconnection();
                            $u->userdata();
                            $recordset=$u->userdata();
                            foreach($recordset as $row){
                            $id= $row[0];
                                echo "<option value='". $row[1] ."'>" .$row[1] ."</option>";
                            }            
                        ?>
                        </select>
                        </td></tr>
                        <tr>
                        <td>Days</td> <td><input type="number" name="days" />
                        </td></tr>
                        <tr><td></td><td><input type="submit" value="SUBMIT" /></td></tr>
                        </table>
                    </form>
                </div>
        </div>

<!-- Issue Book Report -->
        <div class="rightinnerdiv">   
            <div id="issuebookreport" class="innerright portion" style="display:none">
            <Button class="greenbtn btn-title" >ISSUE BOOK RECORD</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->issuereport();
            $recordset=$u->issuereport();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  
            padding: 8px;'>Issue Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Issue Type</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[4]</td>";
                // $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'>Return</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";
            echo $table;
            ?>
            </div>
        </div>

<!-- Book Request Portion -->
        <div class="rightinnerdiv">   
            <div id="bookrequestapprove" class="innerright portion" style="display:none">
            <Button class="greenbtn btn-title" >BOOK REQUEST APPROVE</Button>

            <?php
                $u=new data;
                $u->setconnection();
                $u->requestbookdata();
                $recordset=$u->requestbookdata();

                $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='
                padding: 8px;'>Person Name</th><th>person type</th><th>Book name</th><th>Days </th><th>Approve</th></tr>";
                foreach($recordset as $row){
                    $table.="<tr>";
                    "<td>$row[0]</td>";
                    "<td>$row[1]</td>";
                    "<td>$row[2]</td>";

                    $table.="<td>$row[3]</td>";
                    $table.="<td>$row[4]</td>";
                    $table.="<td>$row[5]</td>";
                    $table.="<td>$row[6]</td>";
                    $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approved</button></a></td>";
                    // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
                    $table.="</tr>";
                }
                $table.="</table>";

                echo $table;
            ?>

            </div>
        </div>

<!-- Book Report Portion -->
            <div class="rightinnerdiv">
                <div id="bookreport" class="innerright portion" style="display:none">
                    <Button class="greenbtn btn-title">BOOK RECORD</Button>
                    <?php
                        $u = new data;
                        $u->setconnection();
                        $u->getbook();
                        $recordset = $u->getbook();

                        $table = "<table style='font-family: Arial, Helvetica, sans-serif;border-collapse:collapse; width: 100%;'>
                        <tr><th style='border: 1px solid #ddd; padding: 8px;'>Book Name</th><th>Price</th><th>Qnt</th><th>Available</th><th>Rent</th><th>View</th>";
                        foreach($recordset as $row){
                            $table.="<tr>";
                            "<td>$row[0]</td>";
                            $table.="<td>$row[2]</td>";
                            $table.="<td>$row[7]</td>";
                            $table.="<td>$row[8]</td>";
                            $table.="<td>$row[9]</td>";
                            $table.="<td>$row[10]</td>";
                            $table.="<td><a href='admin_service_dashboard.php?viewid=$row[0]'><Button class='btn btn-primary' onclick='openpart('studentrecord')'>View</Button></a></td>";
                            $table.="</tr>";
                        }
                        $table.="</table>";

                        echo $table;
                    ?>
                </div>
            </div>
<!-- Book Detail -->
            <div class="rightinnerdiv">
                <div id="bookdetail" class="innerright portion" style="<?php  if(!empty($_REQUEST['viewid'])){ $viewid=$_REQUEST['viewid'];} else {echo "display:none"; }?>">
                    <Button class="greenbtn btn-title">BOOK DETAIL</Button> <br />

                    <?php
                        $u = new data;
                        $u->setconnection();
                        $u->getbookdetail($viewid);
                        $recordset = $u->getbookdetail($viewid);
                        foreach($recordset as $row){
                            $bookid = $row[0];
                            $bookimg = $row[1];
                            $bookname = $row[2];
                            $bookdetail = $row[3];
                            $bookauthor = $row[4];
                            $bookpub = $row[5];
                            $branch = $row[6];
                            $bookprice = $row[7];
                            $bookquantity = $row[8];
                            $bookava = $row[9];
                            $bookrent = $row[10];
                        }
                    
                    ?>
                    <table style='font-family: Arial, Helvetica, sans-serif;border-collapse:collapse; width: 90%;'>
                        <tr>
                            <td>Book Name:</td>
                            <td><?php echo $bookname ?></td>
                            <td rowspan='8' width='30%'><img style="max-height:350px; border:2px solid #333; padding:5px;" src="uploads/<?php echo $bookimg?>">
                            </td>
                        </tr>
                        <tr style="color:black">
                            <td>Book Detail:</td>
                            <td><?php echo $bookdetail ?></td>
                            <td></td>
                        </tr>
                        <tr style="color:black">
                            <td>Book Author:</td>
                            <td><?php echo $bookauthor ?></td>
                            <td></td>
                        </tr>
                        <tr style="color:black">
                            <td>Book Publisher:</td>
                            <td><?php echo $bookpub ?></td>
                            <td></td>
                        </tr>
                        <tr style="color:black">
                            <td>Book Branch:</td>
                            <td><?php echo $branch ?></td>
                            <td></td>
                        </tr>
                        <tr style="color:black">
                            <td>Book Price:</td>
                            <td><?php echo $bookprice ?></td>
                            <td></td>
                        </tr>
                        <tr style="color:black">
                            <td>Book Available:</td>
                            <td><?php echo $bookava ?></td>
                            <td></td>
                        </tr>
                        <tr style="color:black">
                            <td>Book Rent:</td>
                            <td><?php echo $bookrent ?></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>

<!-- Student Report Portion -->
            <div class="rightinnerdiv">
                <div id="studentrecord" class="innerright portion" style="display:none">
                    <Button class="greenbtn btn-title">STUDENT RECORD</Button>
                    <?php
                        $u = new data;
                        $u->setconnection();
                        $u->userdata();
                        $recordset = $u->userdata();

                        $table = "<table style='font-family: Arial, Helvetica, sans-serif;border-collapse:collapse; width: 100%;'><tr><th style='border: 1px solid #ddd; padding: 8px;'>Issue Name</th><th>Book Name</th><th>Issue Date</th><th>Return</th>";
                        foreach($recordset as $row){
                            $table.="<tr>";
                            "<td>$row[0]</td>";
                            $table.="<td>$row[1]</td>";
                            $table.="<td>$row[2]</td>";
                            $table.="<td>$row[4]</td>";
                            $table.="<td><a href='deleteuser.php?useriddelete=$row[0]'><Button class='btn btn-danger' onclick='openpart('studentrecord')'>Delete</Button></a></td>";
                            $table.="</tr>";
                        }
                        $table.="</table>";

                        echo $table;
                    ?>
                </div>
            </div>

<!-- Add student Portion -->
            <div class="rightinnerdiv">
                <div id="addperson" class="innerright portion" style="display:none">
                    <Button class="greenbtn btn-title">ADD STUDENT</Button>
                    <form action="addpersonserver_page.php" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td><label>Name:</label></td>
                                <td><input type="text" name="addname" /> </td>
                            </tr>
                            <tr>
                                <td><label>Password:</label></td>
                                <td><input type="password" name="addpass" /> </td>
                            </tr>
                            <tr>
                                <td><label>Email:</label></td>
                                <td><input type="email" name="addemail" /> </td>
                            </tr>
                            <tr>
                                <td><label for="type">Choose Type:</label></td>
                                <td><select name="type">
                                        <option value="student">Student</option>
                                        <option value="teacher">Teacher</option>
                                    </select> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="SUBMIT" /> </td>
                            </tr>
                        </table>
                    </form>
                </div>
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


