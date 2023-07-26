<div class="card bg-light text-black shadow m-2">
    <!-- Your content here -->

    <!-- Floating alert at the top -->
    <div class="alert alert-warning alert-dismissible fixed-top m-5">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Warning!</strong> This is a floating alert at the top of the screen.
    </div>

    <!-- More content here -->

    <script>
        $(document).ready(function() {
            $("#myForm").submit(function(event) {
                var checkbox1 = $("input[name='checkbox1']");
                var checkbox2 = $("input[name='checkbox2']");
                var selectedDate = $("input[name='selectedDate']");

                if (!checkbox1.is(":checked") && !checkbox2.is(":checked")) {
                    alert("Please choose at least one checkbox.");
                    event.preventDefault(); // Prevent form submission
                } else if (selectedDate.val() === "") {
                    alert("Please fill in the date field.");
                    event.preventDefault(); // Prevent form submission
                }
            });
        });
    </script>
</div>