<div class="card bg-light text-black shadow m-2">
    <style>
        .radio {
            display: inline-block;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
            background-color: white;
        }

        input[type="radio"] {
            display: none;
        }

        input[type="radio"]:checked+label {
            color: white;
        }

        input[type="radio"][id="red"]:checked+label {
            background-color: red;
        }

        input[type="radio"][id="yellow"]:checked+label {
            background-color: yellow;
        }

        input[type="radio"][id="green"]:checked+label {
            background-color: green;
        }
    </style>
    <div class="card-body">
        <input type="radio" name="color" id="red" checked>
        <label for="red" class="radio">Red</label>

        <input type="radio" name="color" id="yellow">
        <label for="yellow" class="radio">Yellow</label>

        <input type="radio" name="color" id="green">
        <label for="green" class="radio">Green</label>


    </div>
</div>