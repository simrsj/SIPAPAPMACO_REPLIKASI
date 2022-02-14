<button onclick="cek()">CEK</button><br>
<div class="boxed-check-group boxed-check-default boxed-check-sm">
    <label class="boxed-check boxed-check-inline">
        <input class="boxed-check-input" type="radio" name="radio-overview" checked>
        <div class="boxed-check-label">Normal</div>
    </label>
    <label class="boxed-check boxed-check-inline">
        <input class="boxed-check-input" type="radio" name="radio-overview" checked>
        <div class="boxed-check-label">asdasd</div>
    </label>
</div>

<div class="boxed-check-group boxed-check-success">
    <label class="boxed-check">
        <input class="boxed-check-input" type="radio" name="radio-overview-custom">
        <div class="boxed-check-label" style="text-align:center;">
            <h2>Breakfast</h2>
            <span>Good Morning</span>
        </div>
    </label>
    <label class="boxed-check">
        <input class="boxed-check-input" type="radio" name="radio-overview-custom">
        <div class="boxed-check-label" style="text-align:center;">
            <h2>Lunch</h2>
            <span>Good Afternoon</span>
        </div>
    </label>
    <label class="boxed-check">
        <input class="boxed-check-input" type="radio" name="radio-overview-custom">
        <div class="boxed-check-label" style="text-align:center;">
            <h2>Supper</h2>
            <span>Good Evening</span>
        </div>
    </label>
</div>
<script>
    $(document).ready(function() {
        console.log("ready!");
    });
</script>