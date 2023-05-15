<?php
include('config/db_connect.php');
$email = $title = $ingredients = '';
$errors = array('email' => '', 'title' => '', 'ingredients' => '');


if (isset($_POST['submit'])) {
    // echo htmlspecialchars($_POST['email']) . '<br/>';
    // echo htmlspecialchars($_POST['title']) . '<br/>';
    // echo htmlspecialchars($_POST['ingredients']) . '<br/>';


    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'you have to type a right email address <br/>';
        } else {
            // echo htmlspecialchars($_POST['email'])  . '<br/>';
        }
    } else {
        $errors['email'] = 'you have to type an email address <br/>';
    }


    if (!empty($_POST['title'])) {
        $title = $_POST['title'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors['title'] = 'Title must be letters and spaces only <br/>';
        } else {
            // echo htmlspecialchars($_POST['title'])  . '<br/>';
        }
    } else {
        $errors['title'] = 'you have to type an title <br/>';
    }


    if (!empty($_POST['ingredients'])) {
        $ingredients = $_POST['ingredients'];
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
            $errors['ingredients'] = 'you have to type a commaa seprated sentences <br/>';
        } else {
            // echo htmlspecialchars($_POST['ingredients'])  . '<br/>';
        }
    } else {
        $errors['ingredients'] = 'you have to type an ingredients comma seprated <br/>';
    }

    if (array_filter($errors)) {
        // echo 'all the errors <br/>';
    } else {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

        $sql = "INSERT INTO pizzas (title,email,ingredients) VALUES ('$title' , '$email' , '$ingredients')";

        if (mysqli_query($conn, $sql)) {
            header('Location: index.php');
        } else {
            echo 'query error' . mysqli_error($conn);
        }
    }
} // end of post check 














?>



<!doctype html>
<html lang="en">
<?php include('templetes/header.php') ?>
<div class="header">
    <h1 id=add-pizza>Add Pizza</h1>
</div>

<div class="container-lg w-50 ">
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo htmlspecialchars($email) ?>">
            <div class="text-danger"><?php echo  $errors['email']; ?></div>
        </div>
        <div class="form-group">
            <label for="title">Pizza Title</label>
            <input type="title" class="form-control" name="title" placeholder="Pizza Title" value="<?php echo htmlspecialchars($title) ?>">
            <div class="text-danger"><?php echo  $errors['title']; ?></div>
        </div>
        <div class="form-group">
            <label for="ingredients">Ingredients</label>
            <input type="ingredients" class="form-control" name="ingredients" aria-describedby="emailHelp" placeholder="Ingredients (Comma Separated)" value="<?php echo htmlspecialchars($ingredients) ?>">
            <div class="text-danger"><?php echo  $errors['ingredients']; ?></div>
        </div>
        <div class="center"> <input type="submit" class="form-control bg-primary" id="submit-button" name="submit" value="submit"></div>



    </form>
</div>
<?php include('templetes/footer.php') ?>

</html>