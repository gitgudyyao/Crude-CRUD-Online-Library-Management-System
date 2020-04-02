<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['add']))
{
$title=$_POST['title'];
$category=$_POST['category'];
$author=$_POST['author'];
$description=$_POST['description'];
$year=$_POST['year'];
$sql="INSERT INTO  tblbooks(Title,Category,Author,Description,Year) VALUES(:title,:category,:author,:description,:year)";
$query = $dbh->prepare($sql);
$query->bindParam(':title',$title,PDO::PARAM_STR);
$query->bindParam(':category',$category,PDO::PARAM_STR);
$query->bindParam(':author',$author,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':year',$year,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Book Listed successfully";
header('location:manage-books.php');
}
else 
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:manage-books.php');
}

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Add Books</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wra
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add Book</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Book Details
</div>
<div class="panel-body">
<form role="form" method="post">
<div class="form-group">
<label>Title<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="title" autocomplete="off"  required />
</div>

<div class="form-group">
<label>Author<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="author" autocomplete="off"  required />
</div>

<div class="form-group">
<label>Category<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="category"  required="required" autocomplete="off"  />
</div>

<div class="form-group">
<label>Description<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="description"  required="required" autocomplete="off"  />
</div>


 <div class="form-group">
 <label>Year Published<span style="color:red;">*</span></label>
 <input class="form-control" type="text" name="year" autocomplete="off"   required="required" />
 </div>
<button type="submit" name="add" class="btn btn-info">Add Book</button>

                                    </form>
                            </div>
                        </div>
                            </div>

        </div>
   
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
