<?php
include_once 'header.php';
?>
<!-- Link -->
<link rel='stylesheet' type='text/css' href='../css/header.css'/>
<link rel='stylesheet' type='text/css' href='../css/add_category.css'/>
<link rel='stylesheet' type='text/css' href='../css/footer.css'/>
<!--  -->
<body>

    <div class="body">
        <h1>Art category</h1>
            <div id="main" class="container border">
                <div className="page-heading pb-2 mt-4 mb-2 ">
                
                </div>
                <?php
                //put your code here
                require_once 'connect.php';
                $conn = new Connect();
                $db_link = $conn->connectToPDO();
                if(isset($_GET['cid'])):
                        $value = $_GET['cid'];
                        $sqlSelect = "SELECT * FROM category WHERE cat_id = ?"; //This one
                        $stmt = $db_link->prepare($sqlSelect);
                        $stmt->execute(array("$value"));
                        if($stmt->rowCount()>0):
                                $re = $stmt->fetch(PDO::FETCH_ASSOC);
                                $cat_name = $re['cat_name'];
                        endif;
                endif;

                if(isset($_POST['txtID']) && isset($_POST['txtName'])):
                        $cid = $_POST['txtID'];
                        $cname = $_POST['txtName'];
                        $ctype = $_POST['txtType'];
                        //Check duplicate value
                        $conn = new Connect();
                        $db_link = $conn->connectToMySQL();
                        $query = "SELECT COUNT(*) as count FROM `category` WHERE `cat_id` = '$cid'";
                        $re = $db_link->query($query);
                        $row = $re->fetch_assoc();
                        $count = $row['count'];
                        if(isset($_POST['btnAdd'])):
                                $pattern = '/^(B|C)\d{3}$/';
                                $input = $_POST['txtID'];
                            if (preg_match($pattern, $input)):
                                if ($count > 0) {
                                        // Duplicate data found, handle the error
                                        echo '<script>alert("Error: Duplicate data found!")</script>';
                                }
                                $sqlInsert = "INSERT INTO `category`(`cat_id`, `cat_name`, `cat_type`) VALUES (?,?,?)";
                                $stmt = $db_link->prepare($sqlInsert);
                                $execute = $stmt->execute(array("$cid","$cname","$ctype"));
                                if($execute){
                                        header("Location: category.php");
                                }else{
                                        echo "Failed ".$execute;
                                }
                           else:
                                echo '<script>alert("Error: Enter an ID that start with either B or C followed by three digits")</script>';  
                           endif;
                        else:
                                        $sqlUpdate = "UPDATE `category` SET `cat_id`=?,`cat_name`=?, `cat_type`=? WHERE `cat_id` = ?";
                                        $stmt = $db_link->prepare($sqlUpdate);
                                        $execute = $stmt->execute(array("$cid","$cname", "$ctype","$cid"));
                                        if($execute){
                                                header("Location: category.php");
                                        }else{
                                                echo "Failed".$execute;
                                        }
                        endif;
                endif;
                

                // $checked = $_POST[''];
        ?>
                <form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
                    <div class="form-group pb-3 pt-3">
                            <label for="txtTen" class="col-sm-2 control-label">Category ID:  </label>
                            <div class="col-sm-12">
                                <input required type="text" name="txtID" id="txtID" class="form-control" placeholder="Category ID" value='<?php echo isset($_GET["cid"])?($_GET["cid"]):"";?>'>
                                <h6 style="font-style: italic; color: green; padding: 3px 0 0 10px; font-size: 13px">(*) ID that start with either 'B' or 'C' followed by three digits</h6>
                            </div>
                    </div>
                    <div class="form-group pb-3">
                            <label for="txtTen" class="col-sm-2 control-label">Category Name:  </label>
                            <div class="col-sm-12">
                                <input required type="text" name="txtName" id="txtName" class="form-control" placeholder="Category Name" value='<?php echo isset($cat_name)?($cat_name):"";?>'>
                            </div>
                    </div>
                    <label for="txtTen" class="col-sm-2 control-label">Type:  </label>
                    <div class="form-group pb-3" style="display:flex; padding-left: 20px;"> 
                        <div class="select">
                                <input type="radio" id="blog" name="txtType" value='Blog'>
                                <label for="blog">Blog</label><br>
                        </div>
                        <div class="select">
                                <input type="radio" id="artwork" name="txtType" value='Artwork' checked>
                                <label for="artwork">Artwork</label><br>
                        </div>
                    </div> 
                        <style>
                                .select{
                                        padding-right: 20px;
                                }
                        </style>
                    <div class="form-group pb-3">
                        <div class="col-sm-offset-2 col-sm-10">
                                <input style="background-color: #2B3467; border: none" type="submit"  class="btn btn-primary" name="<?php echo isset($_GET["cid"])?"btnEdit":"btnAdd"; ?>" id="btnAction" value='<?php echo isset($_GET["cid"])?"Update":"Add new"; ?>'/>
                                <input style="background-color: #2B3467; border: none" type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Back to list" onclick="window.location.href='category.php'" />
                        </div>
                    </div>
                </form>
            </div>
    </div>
</body>

<?php
include_once 'footer.php';
?>