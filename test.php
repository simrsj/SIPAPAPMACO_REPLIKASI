<div class="card bg-light text-black shadow m-2">
    <!-- Your content here -->
    <!-- Block level -->
    <div class="row">
        <div class="col-2 text-truncate">
            Praeterea iter est quasdam res quas ex communi.
        </div>
    </div>

    <!-- Inline level -->
    <span class="d-inline-block text-truncate" style="max-width: 150px;">
        Praeterea iter est quasdam res quas ex communi.
    </span>

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