<?php
include('config/db_connect.php');

// write down the query 
$sql = 'SELECT id , title , ingredients FROM pizzas ORDER BY created_at';
// make query and get results
$results = mysqli_query($conn, $sql);
// fetch the data from the results
$pizzas = mysqli_fetch_all($results, MYSQLI_ASSOC);
// free memory from results
mysqli_free_result($results);
// close " lose the connection " with the database 
mysqli_close($conn);


// var_dump($pizzas);









?>



<!doctype html>
<html lang="en">
<?php include('templetes/header.php') ?>
<h4 class="center">pizzas</h4>
<div class="container-fluid ">
    <div class="row d-flex justify-content-center" id="cards-holder">
        <?php
        foreach ($pizzas as $pizza) : ?>

            <div class="col-4 d-flex justify-content-center">

                <div class="card" style="width: 24rem;">
                    <img src="img/pizza.svg" alt="pizza icon" id="img-pizza">
                    <div class="card-body">

                        <h5 class="card-title text-center"><?php echo htmlspecialchars($pizza['title']); ?></h5>
                        <p class="card-text text-center">
                        <ul>
                            <?php foreach (explode(',', $pizza['ingredients']) as $ing) : ?>
                                <li><?php echo htmlspecialchars($ing); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        </p>
                        <a href="detailes.php?id=<?php echo $pizza['id'] ?>" class="btn btn-primary center">More Info</a>
                    </div>

                </div>
            </div>




        <?php endforeach; ?>




    </div>
</div>
<?php include('templetes/footer.php') ?>

</html>