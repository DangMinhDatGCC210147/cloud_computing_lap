<?php
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/header.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" 
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" 
    integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <title>Art Gallery</title>
    <!-- <link rel="icon" href="../img/Smalllogo.png"> -->
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bubblegum+Sans&family=Dancing+Script&family=Quicksand:wght@700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">

    <link rel='shortcut icon' href='../images/icons8-art-100.png' />
</head>

<nav class="navbar navbar-expand-lg justify-content-center" style="background-color: #2B3467;">
    <div class="navbar-nav">
            <!-- Beamy's Art -->
            <img src="https://cdn.logojoy.com/wp-content/uploads/2018/05/30143701/97-768x591.png" alt="Logo" style="width: 100px;">
    </div>
    <style>
        *{
            font-family:'Quicksand', sans-serif !important;
        }
        body{
            font-weight: 500 !important;
        }
        #Logo.navbar-brand{
            padding-left: 20px;
        }
        nav.navbar{
            font-weight: 600;
        }
    </style>
    <button style="color:#fff" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
        <span class="bi bi-list"></span>
    </button>
        <style>
            .dropdown:hover .dropdown-menu{
                display: block;
            }
            .navbar-toggler{
                color: #fff;
            }
        </style>

<div class="collapse navbar-collapse justify-content-center" id="navbarMain">
        <div class="navbar-nav">
            <a class="nav-link" style="color: #ffffff;" href="../php/index.php">Home</a>
            <a href="../php/galleries.php" class="nav-link" style="color: #ffffff;">Galleries</a>
            <a href="../php/blog.php" class="nav-link" style="color: #ffffff;">Blog</a>
            <a class="nav-link" href="../php/category.php" style="color: #ffffff;">Category</a>
            <!-- <a class="nav-link" href="" style="color: #ffffff;">Attendance</a>
            <a class="nav-link" href=""style="color: #ffffff;">Activities</a>
            <a class="nav-link" href=""style="color: #ffffff;">Account</a> -->
        </div>
</div>
<div class="contact justify-content-between" style="color:#ffffff">
    <a href="" class="nav-item nav-link">Contact me</a>
    <a href="" class="nav-item nav-link"><i class="bi bi-person-circle"></i></a>
</div>
</nav>
</html>