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
                        if(isset($_POST['btnAdd'])):
                                $sqlInsert = "INSERT INTO `category`(`cat_id`, `cat_name`) VALUES (?,?)";
                                $stmt = $db_link->prepare($sqlInsert);
                                $execute = $stmt->execute(array("$cid","$cname"));
                                if($execute){
                                        header("Location: category.php");
                                }else{
                                        echo "Failed ".$execute;
                                }
                        else:
                                $sqlUpdate = "UPDATE `category` SET `cat_id`=?,`cat_name`=? WHERE `cat_id` = ?";
                                $stmt = $db_link->prepare($sqlUpdate);
                                $execute = $stmt->execute(array("$cid","$cname","$cid"));
                                if($execute){
                                        header("Location: category.php");
                                }else{
                                        echo "Failed".$execute;
                                }
                        endif;
                endif;
                ?>
                <form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
                    <div class="form-group pb-3 pt-3">
                            <label for="txtTen" class="col-sm-2 control-label">Category ID:  </label>
                            <div class="col-sm-12">
                                <input required type="text" name="txtID" id="txtID" class="form-control" placeholder="Category ID" value='<?php echo isset($_GET["cid"])?($_GET["cid"]):"";?>'>
                            </div>
                    </div>
                    <div class="form-group pb-3">
                            <label for="txtTen" class="col-sm-2 control-label">Category Name:  </label>
                            <div class="col-sm-12">
                                <input required type="text" name="txtName" id="txtName" class="form-control" placeholder="Category Name" value="<?php echo isset($cat_name)?($cat_name):"";?>">
                            </div>
                    </div>
            
            
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