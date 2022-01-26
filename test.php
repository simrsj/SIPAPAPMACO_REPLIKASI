<div class="container">
    <h1>Bootstrap Datepicker Disable Past Dates Example - itsolutionstuff.com</h1>
    <strong>Current Date is 5/7/2020</strong>
    <input type="text" name="date" class="form-control datepicker" autocomplete="off">
</div>

</body>

<script type="text/javascript">
    $('.datepicker').datepicker({
        startDate: new Date()
    });
</script>