<?php
    include_once('header.php');
    date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
<!-- Link for css -->
<link rel='stylesheet' type='text/css' href='../css/galleries.css'/>
<link rel='stylesheet' type='text/css' href='../css/header.css'/>
<link rel='stylesheet' type='text/css' href='../css/footer.css'/>
<!--  -->
<!-- Body -->
<a href="../php/add_works.php" class="button2 adding">Manage my work</a>
<div class="container justify-content-center">
    <div class="row">
        <?php
            include_once 'connect.php';
            $c = new Connect();
            $dblink = $c->connectToMySQL();
            $sql = "SELECT * FROM category c JOIN art a ON a.a_category = c.cat_id";
            $re = $dblink->query($sql);
             
            if($re->num_rows>0):
                
                while($row=$re->fetch_assoc()):
                    $newDate = date("m-d-Y",strtotime($row['a_date'])); 
        ?>
        <div class="col-md-4 cardss">
            <div class="card" >
            <a href="detail.php?a_id=<?=$row['a_id']?>"><img src="../images/<?=$row['a_image']?>" class="card-img-top" alt="Image"></a>
                <div class="card-body">
                    <h5 class="card-title">Name art: <span><?=$row['a_name']?></span></h5>
                    <p class="card-content">Date: <span><?=$newDate?></span></p>
                    <p class="card-content">Category: <span><?=$row['cat_name']?></span></p>
                    <a href="detail.php?a_id=<?=$row['a_id']?>" class="button2">See more</a>
                </div>
            </div>
        </div>
        <?php
            endwhile;
            endif;
        ?>
    </div>
</div>
<br>

<?php
    include_once 'footer.php';
?>