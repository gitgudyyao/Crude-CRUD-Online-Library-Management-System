<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['update']))
{
$title=$_POST['title'];
$category=$_POST['category'];
$author=$_POST['author'];
$description=$_POST['description'];
$year=$_POST['year'];
$bookid=intval($_GET['bookid']);
$sql="UPDATE tblbooks set Title=:title,Author=:author,Category=:category,Description=:description,Year=:year where id=:bookid";
$query = $dbh->prepare($sql);
$query->bindParam(':title',$title,PDO::PARAM_STR);
$query->bindParam(':author',$author,PDO::PARAM_STR);
$query->bindParam(':category',$category,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':year',$year,PDO::PARAM_STR);
$query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
$query->execute();
$_SESSION['msg']="Book info updated successfully";
header('location:manage-books.php');


}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Edit Book</title>
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
                <h4 class="header-line">Update Book Details</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Book Info
</div>
<div class="panel-body">
<form role="form" method="post">
<?php 
$bookid=intval($_GET['bookid']);
$sql = "SELECT tblbooks.Title,tblbooks.Author,tblbooks.Category,tblbooks.Description,tblbooks.Year,tblbooks.id as bookid from  tblbooks";
$query = $dbh -> prepare($sql);
$query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
             ?>  

<div class="form-group">
<label>Title<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="title" value="<?php echo htmlentities($result->Title);?>" required />
</div>

<div class="form-group">
<label>Author<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="author" value="<?php echo htmlentities($result->Author);?>" required />
</div>

<div class="form-group">
<label>Category<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="category" value="<?php echo htmlentities($result->Category);?>" required />
</div>

<div class="form-group">
<label>Description<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="description" value="<?php echo htmlentities($result->Description);?>" required />
</div>

<div class="form-group">
<label>Year Published<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="year" value="<?php echo htmlentities($result->Year);?>" required />
</div>


 <?php  ?>
<button type="submit" name="update" class="btn btn-info">Update Book Details!</button>

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
