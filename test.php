<input type="text" id="my_input1" />
<input type="text" id="my_input2" />
<input type="button" value="Add Them Together" onclick="doMath();" />

<script type="text/javascript">
    function doMath() {
        // Capture the entered values of two input boxes
        var my_input1 = document.getElementById('my_input1').value;
        var my_input2 = document.getElementById('my_input2').value;

        // Add them together and display
        var sum = parseInt(my_input1) + parseInt(my_input2);
        document.write(sum);
    }
</script>