<div class="card bg-light text-black shadow m-2">
    <form id="myForm" action="_print/lap_akun_pdf/" method="post" target="_blank">
        <label>
            <input type="checkbox" name="checkbox1"> Checkbox 1
        </label>
        <br>
        <label>
            <input type="checkbox" name="checkbox2"> Checkbox 2
        </label>
        <br>
        <label>
            Date: <input type="date" name="selectedDate">
        </label>
        <br>
        <button type="submit">Submit</button>
    </form>

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