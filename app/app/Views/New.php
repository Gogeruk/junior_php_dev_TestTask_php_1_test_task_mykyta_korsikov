<?php include('Main.php'); ?>


<form class="m-3" action="/new" id="form" method="post">

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

    <div class="form-check mb-4">
        <input class="form-check-input" type="radio" name="director" id="director">
        <label class="form-check-label" for="director">
            Директор
        </label>
    </div>
    <div class="form-check mb-4">
        <input class="form-check-input" type="radio" name="manager" id="manager">
        <label class="form-check-label" for="manager">
            Менеджер
        </label>
    </div>
    <div class="form-check mb-4">
        <input class="form-check-input" type="radio" name="worker" id="worker">
        <label class="form-check-label" for="worker">
            Исполнитель
        </label>
    </div>

    <button type="submit" class="btn btn-primary mb-4">Submit</button>
</form>

<?php include('End.php'); ?>
