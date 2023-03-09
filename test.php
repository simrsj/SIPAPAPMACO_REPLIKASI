<div class="card bg-light text-black shadow m-2">
    <div class="card-body">
        <div class="position-fixed">

            <!-- Create the toast message -->
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000" id="toast_success">

                <!-- Create the toast header -->
                <div class="toast-header  bg-success text-light">
                    <strong class="mr-auto">ERROR</strong>
                    <!-- <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>

                <!-- Create the toast body -->
                <div class="toast-body">
                    ERRRO CUY
                </div>
            </div>
            <!-- Create the toast message -->
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false" id="toast_primary">

                <!-- Create the toast header -->
                <div class="toast-header  bg-primary text-light">
                    <strong class="mr-auto">ERROR</strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Create the toast body -->
                <div class="toast-body">
                    ERRRO CUY
                </div>
            </div>
            <!-- Create the toast message -->
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="5000" id="toast_danger">

                <!-- Create the toast header -->
                <div class="toast-header  bg-danger text-light">
                    <strong class="mr-auto">ERROR</strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Create the toast body -->
                <div class="toast-body">
                    ERRRO CUY
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#toast_success').toast("show");
        $('#toast_primary').toast("show");
        $('#toast_danger').toast("show");
    });
</script>