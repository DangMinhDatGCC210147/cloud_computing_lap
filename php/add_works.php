<?php
    include_once 'header.php';
?>
<!-- Link css -->
<link rel='stylesheet' type='text/css' href='../css/add_works.css'/>
<link rel='stylesheet' type='text/css' href='../css/header.css'/>
<link rel='stylesheet' type='text/css' href='../css/footer.css'/>
<!--  -->
<!--PHP  -->
    <?php

        require_once 'connect.php';
        $conn = new Connect();
        $db_link = $conn->connectToPDO();
        if(isset($_GET['update_id'])):
            $value = $_GET['update_id'];
            $sqlSelect = "SELECT * FROM art WHERE a_id = ?"; //This one
            $stmt = $db_link->prepare($sqlSelect);
            $stmt->execute(array("$value"));
            if($stmt->rowCount()>0):
                    $re = $stmt->fetch(PDO::FETCH_ASSOC);
                    $a_name = $re['a_name'];
                    $a_category = $re['a_category'];
                    $a_date = $re['a_date'];
                    $a_description = $re['a_description'];
                    $a_date = $re['a_date'];
                    $a_image = $re['a_image'];
            endif;
        endif;
        if(isset($_POST['a_name']) && isset($_POST['a_date'])):
                $imgs = str_replace(' ', '_', $_FILES['a_image']['name']);
                $storedImage = "../images/";
                // $a_id = $_POST['a_id'];
                $a_name = $_POST['a_name'];
                $a_category = $_POST['a_category'];
                $a_date = $_POST['a_date'];
                $a_description = $_POST['a_description'];
                $flag = move_uploaded_file($_FILES['a_image']['tmp_name'], $storedImage.$imgs);
                if(isset($_POST['btnSubmit'])):
                    $sqlInsert = "INSERT INTO `art` (`a_name`, `a_date`, `a_category`, `a_description`, `a_image`) VALUES (?,?,?,?,?)";
                    $stmt = $db_link->prepare($sqlInsert);
                    $execute = $stmt->execute(array("$a_name", "$a_date", "$a_category", "$a_description", "$imgs"));
                    if($execute){
                            echo '<script>alert("Added successfully")</script>';
                    }else{
                            echo "Failed ".$execute;
                    }
                // else:
                //     $sqlUpdate = "UPDATE `art` SET `a_id`=?,`a_name`=?,`a_date`=?,`a_category`=?,`a_description`=?,`a_image`=? WHERE `a_id` = ?";
                //     $stmt = $db_link->prepare($sqlUpdate);
                //     $execute = $stmt->execute(array("$a_id","$a_name","$a_date","$a_category","$a_description"," ","$a_id"));
                //     if($execute){
                //             header("Location: galleries.php");
                //     }else{
                //            echo "Failed".$execute;
                //     }
                endif;
        endif;

    ?>
<!-- PHP -->
        <div class="title1"><h2 style="font-weight: bold;" value=''>ADD THE ART</h2></div>
        <!-- Form template-->
        <form action="add_works.php" method="post" enctype="multipart/form-data">
            <div class="formbold-form-wrapper">
                <div class="formbold-input-flex">
                    <div>
                        <label for="" class="formbold-form-label"> Artwork: </label>
                        <input value="<?php echo isset($a_name)?($a_name):"";?>" placeholder="Type here" type="text" name="a_name" id="" class="formbold-form-input"  required/>
                        <input value="<?php echo isset($update_id)?($update_id):"";?>" placeholder="Type here" type="text" name="a_id" id="" class="formbold-form-input"  hidden/>
                    </div>
                    
                </div>
                <div class="formbold-input-flex category">
                    <div>
                        <label for="" class="custom-select formbold-form-label"> Category: </label>
                        <select name="a_category" class="form-select">
                            <option>Select category:</option>
                            <?php
                                include_once 'connect.php';
                                $conn = new Connect();
                                $db_link = $conn->connectToMySQL();
                                $sql = "SELECT * FROM category";
                                $re = $db_link->query($sql);
                                while($row = $re->fetch_assoc()):
                            ?>
                            <option value="<?=$row['cat_id']?>"><?=$row['cat_name']?></option>
                            <?php
                                endwhile;
                            ?>
                        </select>
                    </div>
                    <div>
                        <label for="" class="formbold-form-label"> Date: </label>
                        <input value="<?php echo isset($a_date)?($a_date):"";?>" type="date" name="a_date" id="a_date" class="formbold-form-input" required/>
                    </div>
                </div>
                <div class="formbold-input-flex">
                <div>
                    <label for="" class="formbold-form-label"> Description: </label>
                    <input value="<?php echo isset($a_description)?($a_description):"";?>" placeholder="Type here" type="text" name="a_description" id="" class="formbold-form-input" required/>
                </div>
                </div>
                <!-- <div class="formbold-input-flex"> -->
                    <div class="photo">
                        <label class="formbold-form-label"  for="image-vertical">Image: </label>
                        <input type="file" name="a_image" id="a_image" class="form-control" value="<?php echo isset($imgs)?($imgs):"";?>">
                    </div>
                <!-- </div> -->
                <input type="submit" name="<?php echo isset($_GET["update_id"])?"btnRenew":"btnSubmit"; ?>" id="btnAction" value='<?php echo isset($_GET["update_id"])?"Renew":"Submit"; ?>' class="formbold-btn" style="font-size: 20px;">
                </input>
            </div>
        </form>
    <!--  -->
    
    <!-- Show list -->
    <div class="title2">
        <h2 style="font-weight: bold;">LIST OF THE WORK</h2>
    </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                        <tr>
                            <th scope="col">Artwork</th>
                            <th scope="col">Date public</th>
<!--                            <th scope="col">Description</th>-->
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                        </tr>
                </thead>
                <tbody>
                    <?php
                        include_once 'connect.php';
                        $conn = new Connect();
                        $db_link = $conn->connectToMySQL();
                        $sql = "SELECT * FROM category c JOIN art a ON a.a_category = c.cat_id";
                        $re = $db_link->query($sql);
                        while($row = $re->fetch_assoc()):
                            $newDate = date("m-d-Y",strtotime($row['a_date']))  
                    ?>
                    <tr>
                        <td><?=$row['a_name']?></td>
                        <td><?=$newDate?></td>
<!--                        <td>--><?//=$row['a_description']?><!--</td>-->
                        <td><?=$row['cat_name']?></td>
                    <td>
                        <!-- <a href="add_works.php?update_id=<?=$row['a_id']?>"><div class="button">Update</div></a> -->
                        <a href="add_works.php?del_id=<?=$row['a_id']?>"><div class="button">Delete</div></a>
                    </td>
                    </tr>
                    <?php
                        endwhile;
                    ?>
                </tbody>
            </table>
        </div>

<!-- Delete -->
<?php
    require_once 'connect.php';
    if(isset($_GET['del_id'])){
        $art_del = $_GET['del_id'];
        $query = "DELETE FROM `art` WHERE `a_id` = ?";
        $stmt = $db_link->prepare($query);
        $stmt->bind_param('s', $art_del);
        $stmt->execute();
        if($stmt){
            echo '<script>alert("Work delete successfully")</script>';
            header("Location:add_works.php");
        }else{
            echo '<script>alert("Something wrong")</script>';
        }
    }
?>
<!--  -->

<!--  -->
<?php
    include_once 'footer.php'
?>