<?php if (isset($errors) && !empty($errors)) {
    foreach ($errors['email'] as $key => $error) {
        if (!is_null($error)) {
            echo '<div class="alert alert-primary" role="alert">';
            echo $error;
            echo '</div>';
        }
    }
} ?>