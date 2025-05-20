<?php
session_start();

require_once './config/db.php';
global $db;

$sql = "SELECT p.* , u.name, u.last_name
        FROM `post` as p
        LEFT JOIN `users` as u ON p.`user_id` = u.`id`
        ";
$result = mysqli_query($db, $sql);



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .bi {
            width: 1em;
            height: 1em;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }
    </style>
</head>
<body class="">
    <div class="container">
       <h2>ID: <?= $_SESSION['id'] ?></h2>
       <h2>FIRST NAME: <?= $_SESSION['name']  ?></h2>
       <h2>LAST NAME: <?= $_SESSION['last_name'] ?></h2>
       <h2>EMAIL: <?= $_SESSION['email'] ?></h2>
       <h2>PASSWORD: <?= $_SESSION['password'] ?></h2>

        <form action="action/form.php" method="post" enctype="multipart/form-data">
            <input type="text" name="name" class="form-control" value="<?= $_SESSION['name'] ?>">
            <input type="text" name="last_name" class="form-control" value="<?= $_SESSION['last_name'] ?>">
            <input type="email" name="email" class="form-control" value="<?= $_SESSION['email'] ?>">
            <input type="password" name="password" class="form-control" value="<?= $_SESSION['password'] ?>">
            <input type="file" name="file" class="form-control">
            <?php if (isset($_SESSION['file'])){ ?>
                <img src="uploads/<?= $_SESSION['file'] ?>" alt="" height="300" width="300">
            <?php } ?>
            <input type="submit" name="update" value="update" class="form-control">
            <input type="submit" name="add" value="add" class="form-control">
        </form>
    </div>
    <br><br><br>
    <hr>
    <br><br><br>
<div>
    <a href="logout.php">logout</a>
</div>

    <br><br><br>
    <hr>
    <br><br><br>


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-title">
                        <h3>Add Post</h3>
                    </div>
                    <div class="card-body">
                        <form action="./action/post.php" enctype="multipart/form-data" method="post">
                            <input type="file" name="file_post" class="form-control">
                            <textarea name="post_message" id="" cols="30" rows="10"></textarea>
                            <input type="submit" name="add_post" class="form-control">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <?php if ($result){ ?>
                    <?php  while ($row = mysqli_fetch_assoc($result)){ ?>
                        <div class="card">
                            <div class="card-title">
                                <h3>User Full Name: <?= $row['name'] . " " . $row['last_name'] ?></h3>
                            </div>
                            <div class="card-body">
                                <h4><?= $row['post_message'] ?></h4>
                                <img src="./uploads/post/<?= $row['file_name']  ?>" alt="" width="200" height="200">
                            </div>
                            <div class="card-footer">
                                <input type="hidden" name="post_id" value="<?= $row['id']; ?>">
                                <input type="hidden" name="user_id" value="<?= $row['user_id']; ?>">
                                <button type="button" class="post_like">Like</button>
                                <p class="like_count">Count: </p>
                            </div>

                        </div>
                    <?php  }  ?>
                <?php  }  ?>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src = "./js/index.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
</body>
</html>
