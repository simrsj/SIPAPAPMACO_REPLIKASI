<div class="card bg-light text-black shadow m-2">

    <h2>Check whether a value is number or not in JavaScript.</h2>
    <h4>Using the <i> isNaN() </i> method for different values.</h4>
    <div id="number1"></div>
    <script>
        var number1 = document.getElementById("number1");
        number1.innerHTML = "-32.34 is number : " + !isNaN(-32.34) + " <br/>";
        number1.innerHTML += "false is number : " + !isNaN(false) + " <br/>";
        number1.innerHTML += "TutorialsPoint is number : " + !isNaN("TutorialsPoint") + " <br/> ";
    </script>
</div>
<style>
    .navbar {
        display: flex;
        overflow-x: auto;
        /* Enable horizontal scrolling */
        white-space: nowrap;
        /* Prevent items from wrapping to a new line */
        background-color: #f2f2f2;
        padding: 10px;
    }

    .nav-item {
        text-decoration: none;
        color: #333;
        padding: 8px 15px;
    }

    .nav-item:hover {
        background-color: #ddd;
    }

    /* Optional: Sticky navbar */
    /* .navbar {
  position: sticky;
  top: 0;
  z-index: 999;
} */
</style>
<div class="navbar">
    <a href="#" class="nav-item">Home</a>
    <a href="#" class="nav-item">About</a>
    <a href="#" class="nav-item">Services</a>
    <a href="#" class="nav-item">Contact</a>
    <a href="#" class="nav-item">Home</a>
    <a href="#" class="nav-item">About</a>
    <a href="#" class="nav-item">Services</a>
    <a href="#" class="nav-item">Contact</a>
</div>