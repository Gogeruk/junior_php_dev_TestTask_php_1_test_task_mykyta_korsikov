<?php include('Main.php'); ?>
<?php include('Navigation.php'); ?>



<button class="m-3 btn btn-primary" type="button" onclick="javascript:getJson()">Get Json</button>

<div class="mb-4">
    <div class="m-3" id="newJsonCreate">
    </div>
</div>

<button class="m-3 btn btn-danger" type="button" onclick="proceed();">Save</button>


<script type="text/javascript" language="javascript">
    let stop = false;
    let clicked = 1;
    let apiData = [];
    const getJson = async () => {
        if (stop === true) {
            console.log(stop);
            return;
        }

        const response = await fetch('http://jsonplaceholder.typicode.com/posts/' + clicked);
        const myJson = await response.json();

        clicked++;
        if (clicked === 11) {
            stop = true;
        }

        apiData.push(myJson);

        // create new element
        const para = document.createElement("p");
        const node = document.createTextNode("TITLE: " + myJson.title + " | BODY: " + myJson.body);
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
