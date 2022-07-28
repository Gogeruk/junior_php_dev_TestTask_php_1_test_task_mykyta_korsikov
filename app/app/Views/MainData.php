<?php include('Main.php'); ?>
<?php include('Navigation.php'); ?>



<button class="m-3 btn btn-primary" type="button" onclick="javascript:getJson()">Get Json</button>

<div class="mb-4">
    <div class="m-3" id="newJsonCreate">
    </div>

</div>




<script type="text/javascript" language="javascript">
    let stop = false;
    let clicked = 1;
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

        // do something with myJson
        // console.log(myJson);


        // var allReceived = [];


        // create new element
        const para = document.createElement("p");
        const node = document.createTextNode(myJson.title);
        para.appendChild(node);

        const element = document.getElementById("newJsonCreate");
        element.append(para);
    }
</script>






<?php include('End.php'); ?>
