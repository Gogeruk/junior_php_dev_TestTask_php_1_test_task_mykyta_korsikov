<?php include('Main.php'); ?>
<?php include('Navigation.php'); ?>

<?php
    if ($_SESSION['user_role'] <= 3) {
        echo '<button class="m-3 btn btn-sm btn-primary" type="button" value="Worker" onclick="javascript:getJson(this.value)">Worker</button>';
    }
    if ($_SESSION['user_role'] <= 2) {
        echo '<button class="m-3 btn btn-sm btn-warning" type="button" value="Manager" onclick="javascript:getJson(this.value)">Manager</button>';
    }
    if ($_SESSION['user_role'] <= 1) {
        echo '<button class="m-3 btn btn-sm btn-info" type="button" value="Director" onclick="javascript:getJson(this.value)">Director</button>';
    }
?>

<div class="mb-4">
    <div class="m-3" id="newJsonCreate">
    </div>
</div>

<button class="m-3 btn btn-danger" type="button" onclick="proceed();">Save</button>



<script type="text/javascript" language="javascript">
    let stop = false;
    let clicked = 1;
    let apiData = [];
    let userEmail = "<?php echo $_SESSION['user_email']; ?>";

    const getJson = async (clicked_val) => {
        if (stop === true) {
            return;
        }

        const response = await fetch('http://jsonplaceholder.typicode.com/posts/' + clicked);
        const myJson = await response.json();

        if (clicked === 1) {
            apiData.push({'userEmail': userEmail});
        }

        clicked++;
        if (clicked === 11 || myJson === null) {
            stop = true;
        }

        apiData.push({
            'button': clicked_val,
            'title': myJson['title'],
            'body': myJson['body']
        });

        createParagraph(myJson);
    }

    function createParagraph(data) {

        // create new element
        const para = document.createElement("p");
        const node = document.createTextNode("TITLE: " + data.title + " | BODY: " + data.body);
        para.appendChild(node);

        const element = document.getElementById("newJsonCreate");
        element.append(para);
    }

    function proceed () {
        let form = document.createElement('form');
        form.setAttribute('method', 'post');
        form.setAttribute('action', 'http://localhost:8080/main');
        form.style.display = 'hidden';

        let input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("name", "apiData");
        input.value = JSON.stringify(apiData);

        // append to form element.
        form.appendChild(input);
        document.body.appendChild(form)
        form.submit();
    }
</script>
<?php include('End.php'); ?>
