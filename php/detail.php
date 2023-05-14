<?php
    include_once 'header.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
<!-- Link for css -->
<link rel='stylesheet' type='text/css' href='../css/detail.css'/>
<link rel='stylesheet' type='text/css' href='../css/header.css'/>
<link rel='stylesheet' type='text/css' href='../css/footer.css'/>

<!--  -->
<div class="container-fluid">
<a href="../php/galleries.php" class="button2 adding">Turn back</a>
    <div class="row g-4">
        <div class="col-md-10">
            <div class="p-3 border rounded-4">
                <div class="card__content">
                    <div class="card-left col-lg-6">
                        <?php
                            if(isset($_GET['a_id'])):
                            $a_id = $_GET['a_id'];
                            require_once 'connect.php';
                            $conn = new Connect();
                            $dblink = $conn->connectToPDO();
                            $sql = "SELECT * FROM category c JOIN art a ON a.a_category = c.cat_id WHERE a_id = ?";
                            $stmt = $dblink->prepare($sql);
                            $stmt->execute(array($a_id));
                            $re = $stmt->fetch(PDO::FETCH_BOTH);
                            // $date = $re['a_name'];
                            $newDate = date("M d, Y",strtotime($re['a_date']))  
                        ?>
                            <img id="myImg" src="../images/<?=$re['a_image']?>" alt="<?=$re['a_name']?>">
                            <div id="myModal" class="modal">
                                <span class="close">&times;</span>
                                <img class="modal-content" id="img01">
                                <div id="caption"><?=$re['a_name']?></div>
                            </div>
                    </div>
                    <div class="card-right col-lg-6">
                        <div class="article">
                            <a style="text-decoration:none;"><span style=" font-size: 40px"><?=$re['a_name']?></span></a>
                            <br><br>
                        </div>
                        <div class="title">
                            <div class = article> <span>Date: </span><h5><?=$newDate?> </h5> </div>
                            <div class = article><span>Category: </span><h5><?=$re['cat_name']?></h5> </div>
                            <div class = article><span>Information: </span><h5><?=$re['a_description']?></h5> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  -->
<?php
    else:
?>
    <h2>Nothing to show</h2>
<?php
endif;
//?>
<!-- Footer -->
<?php
    include_once 'footer.php';
?>
<script src="../js/detail.js"></script>