<?php
session_start();
include '../db.php';
include '../config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS | Certificates Issued List</title>
    
    <!-- Font Awesome included for icons. -->
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css">


    <!-- Bootstrap included css jquery and javascript all included -->

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript" src="../js/script.js"></script>

    <style>
        .advancetable{
            box-shadow: 0px 5px 10px rgba(104, 100, 100, 0.5);
            border-radius:5px;
            padding: 0px 10px 10px 10px;
            margin: 30px 0px;
            min-height: 60vh;
        }
        .panel-body{
            box-shadow: 0px 5px 10px rgba(104, 100, 100, 0.5);
            border-radius:5px;
        }

    </style>


</head>
<body>

<?php include '../nav.php'?>
<?php include 'changepassword.php'?>

<div class="container">
<div class="advancetable">
<div class="row" style="margin: 10px 0;">
    <div class="col-md-12">
    <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading" style="text-align: center; margin:20px 0;"><h3>List of Issued Certificates</h3></div>
                <div class="panel-body">
                    <div class="table-responsive" style="padding: 20px;">
                        <table class="table table-striped table-bordered table-hover" id="myTable">
                            
                            <thead>
                                <tr>

                                    <th>Request Id</th>
                                    <th>Certificate_number</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <!-- <th>Contact</th> -->
                                    <th>Type</th>
                                    <th>Organization</th>
                                    <th>Issued Date</th>
                                    <!-- <th>Action</th> -->

                                </tr>
                            </thead>
                            
                            <tbody>

                                <?php
                                $records = "SELECT * FROM certificate_issued ORDER BY request_id ASC";
                                $showrecords = mysqli_query($db, $records);
                                while($issued = mysqli_fetch_assoc($showrecords))
                                {?> 
                                    <tr class="odd gradeX">

                                        <td class="center"><?php echo $issued['request_id'];?></td>
                                        <td class="center"><?php echo $issued['certificate_number'];?></td>
                                        <td class="center"><?php echo $issued['name'];?></td>
                                        <td class="center"><?php echo $issued['email'];?></td>
                                        <!-- <td class="center"><?php echo $issued['contact'];?></td> -->
                                        <td class="center"><?php echo $issued['type'];?></td>
                                        <td class="center"><?php echo $issued['organization'];?></td>
                                        <td class="center"><?php echo $issued['issued_date'];?></td>
                                        <!-- <td class="center"><button>Delete</button></td> -->

                                    </tr>
                                <?php }?>                               
                            </tbody>
                        </table>
                    </div>            
                </div>
        </div>
    <!--End Advanced Tables -->
    </div>
</div>
</div>
</div>








<!-- FOOTER -->

<?php include '../footer.php'?>

<!-- Footer Ends Here -->

<script type="text/javascript" src="../DataTables/datatables.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>

</body>
</html>