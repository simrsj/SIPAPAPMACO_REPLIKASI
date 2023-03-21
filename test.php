<div class="card bg-light text-black shadow m-2">
    <div class="card-body"><button class="btn btn-primary">Click me!</button>

        <div class="toast fixed-top mx-auto mt-5 shadow-lg" role="alert" data-autohide="false">
            <div class="toast-header">
                <strong class="mr-auto">Bootstrap</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <script>
            $(function() {
                $('.btn').on('click', function() {
                    $('.toast').toast('show');
                });
            });
        </script>
    </div>
</div>