<!-- Password field -->
Password: <input type="password" value="FakePSW" id="myInput">

<!-- An element to toggle between password visibility -->
<input type="checkbox" onclick="myFunction()">Show Password

<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>