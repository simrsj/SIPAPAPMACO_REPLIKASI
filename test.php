<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class="product-options">
    <a id="myWish" href="javascript:;" class="btn btn-mini">Add to Wishlist </a>
    <a href="" class="btn btn-mini"> Purchase </a>
</div>
<div class="alert alert-success" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Success! </strong> Product have added to your wishlist.
</div>
<p>
    akl;sdnjiabfuiwebfuiwebfuiwbuiwebfui
    akl;sdnjiabfuiwebfuiwebfuiwbuiwebfui
    akl;sdnjiabfuiwebfuiwebfuiwbuiwebfui
    akl;sdnjiabfuiwebfuiwebfuiwbuiwebfui
    akl;sdnjiabfuiwebfuiwebfuiwbuiwebfui
    akl;sdnjiabfuiwebfuiwebfuiwbuiwebfui
    akl;sdnjiabfuiwebfuiwebfuiwbuiwebfui
    akl;sdnjiabfuiwebfuiwebfuiwbuiwebfui
    akl;sdnjiabfuiwebfuiwebfuiwbuiwebfui
    akl;sdnjiabfuiwebfuiwebfuiwbuiwebfui
    akl;sdnjiabfuiwebfuiwebfuiwbuiwebfui
</p>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $("#success-alert").hide();
        $("#myWish").click(function showAlert() {
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                $("#success-alert").slideUp(500);
            });
        });
    });
</script>