<?php
    require 'connect.php';
    session_start();
    $name = $_SESSION['name'];
    $status = $_SESSION['status'];
    if(isset($_SESSION['login'])){
        
    }else{
        // header('location: login.php');
    }

    $data = $pdo->query("SELECT COUNT(*) as total FROM orders");
    $stmt = $data->fetch();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Admin</title>

    <style>
        @media screen and (max-width: 575px){
            .nav-item{
                margin: 10px;
            }

            
        }

        @media screen and (max-width: 992px){
            .icon{
                display: none;
            }

            
        }
    </style>
  </head>
  <body>
    
  <div class="container-fluid overflow-hidden">
    <div class="row vh-100 overflow-auto">
        <div class="col-12 col-sm-3 col-xl-2 px-sm-2 px-0 bg-dark d-flex sticky-top">
            <div class="d-flex flex-sm-column flex-row flex-grow-1 align-items-center align-items-sm-start px-3 pt-2 text-white">
                <a href="/" class="d-flex align-items-center pb-sm-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5">Menu</span>
                </a>
                <ul class="nav nav-pills flex-sm-column flex-row flex-nowrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start" id="menu">
                <li class="nav-item">
                        <a href="home.php" class="nav-link align-middle px-0">
                        <i class="fas fa-house"></i> <span class="ms-1 d-none d-sm-inline text" style="display: none;">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="order.php" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-cart-shopping"></i><span class="ms-1 d-none d-sm-inline text">Orders</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="jobs.php" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-note-sticky"></i> <span class="ms-1 d-none d-sm-inline text">Jobs</span> </a>
                    </li>
                    <li class="nav-item">
                        <a href="stockBarang.php" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-floppy-disk"></i> <span class="ms-1 d-none d-sm-inline text">Stock</span> </a>
                    </li>
                    <li class="nav-item">
                        <a href="message.php" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-message"></i><span class="ms-1 d-none d-sm-inline text">Message</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="applied.php" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-square-check"></i><span class="ms-1 d-none d-sm-inline text" style="margin-top: -10px;">Accepted Applicants</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="acceptedOrder.php" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-cart-plus"></i><span class="ms-1 d-none d-sm-inline text">Accepted Orders</span></a>
                    </li>
                </ul>
                <div class="dropdown py-sm-4 mt-sm-auto ms-auto ms-sm-0 flex-shrink-1">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="d-none d-sm-inline mx-1"><?php echo $name ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <?php if ($status == 'keyadmin'){?>
                            <li><a class="dropdown-item" href="newAdmin.php">Add Admin</a></li>
                       <?php } ?>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col d-flex flex-column h-sm-100">
            <main class="row overflow-auto">
                <div class="col pt-4">
                <div class="mx-0 row row-cols-2 line-1">
            <div class="col">
                <div class="container item px-2">
                    <div class="row p-3">
                        <div class="box order-lg-2 col-12 col-lg-6 col-xl-2 d-flex justify-content-center align-items-center"
                            style="background-color:#B6F0B0; border-radius: 15px;">
                            <i class="fas fa-user fa-2xl icon"></i>
                        </div>
                        <div
                            class="box-2 mt-3 mt-lg-0 order-lg-1 col-12 col-lg-6 col-xl-10 d-flex flex-column  justify-content-around">
                            <h6 class="item-name">Welcome back</h6>
                            <h3 class="item-qty mt-3" id='name'><?php echo $name?></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="container item px-2">
                    <div class="row p-3">
                        <div class="box order-lg-2 col-12 col-lg-6 col-xl-2 d-flex justify-content-center align-items-center"
                            style="background-color:#3C7B8E; border-radius: 15px;">
                            <i class="fa-solid fa-cart-shopping fa-2xl icon" style="color: #183153;"></i>
                        </div>
                        <div
                            class="box-2 mt-3 mt-lg-0 order-lg-1 col-12 col-lg-6 col-xl-10 d-flex flex-column  justify-content-around">
                            <h6 class="item-name">New Orders</h6>
                            <h3 class="item-qty mt-3" id='Order'><?php echo $stmt['total']?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-0 row mt-4 grid" style="color:black;">
            <div class="col-sm-6 col-lg-6 mb-4">

                <div class="new-jobs card px-lg-2" style="color:white;">
                    <div class="card-body">
                        <h5 class="card-title mb-3 jobs">New Jobs Applications</h5>
                        <?php
                            $qry2 = "SELECT * FROM jobs";
                            $stmt2 = $pdo->query($qry2);

                            foreach($stmt2 as $row2){
                                ?>
                                <div class="row">
                                    <div class="col-8 col-lg-7">
                                        <i class="fa-solid fa-briefcase"></i>
                                        <h6 class="d-inline item-name ms-lg-2"><?php echo $row2['nama']?></h6>
                                    </div>
                                </div>
                                <hr>
                                <?php
                            }
                        ?>
                        
                        
                    </div>
                </div>
            </div> <!-- end of new Jobs -->
            <div class="col-sm-6 col-lg-6 mb-4">

                <div class="new-orders card px-lg-2" style="color:white;">
                    <div class="card-body">
                        <h5 class="card-title mb-3 jobs">New Orders</h5>
                        <?php
                            $qry3 = "SELECT * FROM orders";
                            $stmt3 = $pdo->query($qry3);

                            foreach($stmt3 as $row3){
                                ?>
                                <div class="row">
                                    <div class="col-8 col-lg-7">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                        <h6 class="d-inline item-name ms-lg-2"><?php echo $row3['p_name']?></h6>
                                    </div>
                                </div>
                                <hr>
                                <?php
                            }
                        ?>
                        
                        
                    </div>
                </div>
            </div>
            
            </main>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>

