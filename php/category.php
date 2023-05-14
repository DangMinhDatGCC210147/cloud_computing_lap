<?php
    include_once 'header.php';
?>
<!-- Link css -->
  <link rel='stylesheet' type='text/css' href='../css/category.css'/>
  <link rel='stylesheet' type='text/css' href='../css/header.css'/>
  <link rel='stylesheet' type='text/css' href='../css/footer.css'/>
<!--  -->

<a href="../php/add_category.php" class="button2 adding">Add category</a>
<div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Category Id</th>
          <th scope="col">Category</th>
          <th scope="col">Type</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
            include_once 'connect.php';
            $conn = new Connect();
            $db_link = $conn->connectToMySQL();
            $sql = "SELECT * FROM category ORDER BY `cat_id` ASC";
            $re = $db_link->query($sql);
            while($row = $re->fetch_assoc()):
        ?>
        <tr>
          <td><?=$row['cat_id']?></td>
          <td><?=$row['cat_name']?></td>
          <td><?=$row['cat_type']?></td>
          <td>
            <a href="add_category.php?cid=<?=$row['cat_id']?>" class="button3 update">Update</a>
            <a href="delete_category.php?cid=<?=$row['cat_id']?>"class="button3 delete">Delete</a>
        </td>
        </tr>
        <?php
            endwhile;  
        ?>
      </tbody>
    </table>
</div>

<!-- PHP -->

<?php
    include_once 'footer.php';
?>