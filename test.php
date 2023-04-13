<div class="card bg-light text-black shadow m-2">
    <div class="card-body">
        <label for="redRadio">Red</label>
        <input type="radio" name="color" id="redRadio" class="color-radio red">
        <label for="greenRadio">Green</label>
        <input type="radio" name="color" id="greenRadio" class="color-radio green">

        <style>
            /* Style for radio buttons */
            input[type="radio"] {
                display: none;
                /* Hide the default radio buttons */
            }

            /* Style for labels */
            label {
                display: inline-block;
                padding: 5px 10px;
                background-color: #f2f2f2;
                color: #000;
                cursor: pointer;
            }

            /* Style for selected radio buttons */
            .color-radio:checked {
                border-color: transparent;
                /* Hide the radio button's border */
            }

            .color-radio.red:checked+label {
                background-color: red;
                /* Change to desired red color */
                color: #fff;
                /* Change to desired text color */
            }

            .color-radio.green:checked+label {
                background-color: green;
                /* Change to desired green color */
                color: #fff;
                /* Change to desired text color */
            }
        </style>
    </div>
</div>