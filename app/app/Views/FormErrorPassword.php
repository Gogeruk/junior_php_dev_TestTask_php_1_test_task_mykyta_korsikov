<?php if (isset($errors) && !empty($errors)) {
    foreach ($errors['password'] as $key => $error) {
        if (!is_null($error)) {
            echo '<div class="alert alert-danger" role="alert">';
            echo $error;
            echo '</div>';
        }
    }
} ?>