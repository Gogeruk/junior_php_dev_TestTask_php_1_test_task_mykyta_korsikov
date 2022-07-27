<?php include('Main.php'); ?>
<?php include('Navigation.php'); ?>

<form class="m-3" action="/login" id="form" method="post">

    <div class="form-group mb-4">
        <label for="email">Email address</label>
        <input name="email" type="email" class="form-control" id="email" value="<?= $_POST['email'] ?? null ?>" aria-describedby="emailHelp" placeholder="Enter email">
    </div>

    <?php include('FormErrorEmail.php'); ?>

    <div class="form-group mb-4">
        <label for="password">Password</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="Password">
    </div>

    <?php include('FormErrorPassword.php'); ?>

    <button type="submit" class="btn btn-primary mb-4">Submit</button>
</form>

<?php include('End.php'); ?>
