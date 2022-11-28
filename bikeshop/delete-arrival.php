<?php
// Process delete operation after confirmation
if(isset($_POST["id"]) && !empty($_POST["id"])){
 
    require_once "config.php";
    
    
    $sql = "DELETE FROM new_arrivals WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
       
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        

        $param_id = trim($_POST["id"]);
        
    
        if(mysqli_stmt_execute($stmt)){
            
            header("location: admin-new-arrival.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     

    mysqli_stmt_close($stmt);
    
    
    mysqli_close($link);
} else{
    
    if(empty(trim($_GET["id"]))){
        
        header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="admin-html-body">
<head>
    <meta charset="UTF-8">
    <title>New arrivals | Delete</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body class="admin-html-body">
<section class="inside-section-supplier-delete">

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Delete Record</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Are you sure you want to delete this record?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="admin-new-arrival.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
    </section>
</body>
</html>