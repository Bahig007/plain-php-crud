<?php

session_start();

$name = $_SESSION['name'];


?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bigo's Pizza</title>
    <style>
        .center {
            display: flex !important;
            justify-content: center !important;
            margin-top: 20px !important;
        }

        #add {
            color: white !important;
        }

        #cards-holder {
            margin-top: 50px !important;
        }

        #submit-button {
            color: white !important;
        }

        .container-lg {
            margin-top: 20px !important;
            padding-top: 20px !important;
            background-color: whitesmoke !important;
            height: 400px !important;
            width: 800px !important;
            border-radius: 15px !important;

        }

        .header {
            margin-top: 20px !important;
            display: flex !important;
            flex-direction: column !important;
            justify-content: center !important;
            text-align: center !important;
        }

        #details {
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
        }

        #img-pizza {
            width: 200px !important;
            height: 200px !important;
        }

        .card {
            display: flex;
            align-items: center;
        }

        .card-body li {
            list-style: none;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

</head>

<body class="container-fluid">
    <nav class="navbar navbar-expand-lg bg-body-tertiary" ">
        <!-- Navbar content -->
        <div class=" container-fluid">
        <a class="navbar-brand" href="index.php">Bigo's pizza </a>
        <div class="col-2">

            <ul class="navbar-nav  me-auto mb-2 mb-lg-0" id="nav-mobile">
                <li>
                    HELLO <?php echo htmlspecialchars($name) ?>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-primary"> <a class="nav-link active" aria-current="page" id="add" href="add.php">Add Pizza</a>
                </li></button>
            </ul>
        </div>
        </div>
    </nav>