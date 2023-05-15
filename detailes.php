<?php

include('config/db_connect.php');

if (isset($_POST["delete"])) {

    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

    if (mysqli_query($conn, $sql)) {
        header('Location: index.php');
        // echo 'amazing';
    } else {
        echo 'Something went wrong' . mysqli_error($conn);
    }

    mysqli_close($conn);
}


if (isset($_GET['id'])) {

    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM pizzas WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $pizza = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include('templetes/header.php') ?>
<div class="container-fluid center " id="details">

    <?php if (isset($pizza)) : ?>
        <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
        <p>Created By : <?php echo htmlspecialchars($pizza['email']); ?></p>
        <p><?php echo date($pizza['created_at']) ?></p>
        <h5>Ingredients</h5>
        <p><?php echo htmlspecialchars($pizza['ingredients']) ?></p>
    <?php else : ?>
        <h5>No such pizza exists!!</h5>
    <?php endif; ?>
    <form action="detailes.php" method="POST">
        <input type="hidden" name="id_to_delete" value="<?php echo htmlspecialchars($pizza['id']) ?>">
        <input type="submit" name="delete" value="Delete" class="btn btn-primary ">
    </form>

</div>
<?php include('templetes/footer.php') ?>





</html>