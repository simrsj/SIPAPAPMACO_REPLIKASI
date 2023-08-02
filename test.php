<div class="card bg-light text-black shadow m-2">
    <?php
    $x = 1;
    switch ($x < 5) {
        case $x == 4:
            echo $x . "pertama ";
        case 1:
            echo $x . "pert2ama ";

        case 3:
            echo $x . "pert3ama ";

        case 4:
            echo $x . "pert4ama ";

        case 5:
            echo $x . "pert5ama ";
    }
    ?>
    asdas


    <script></script>
</div>
<style>
    .dropdown-menu li {
        position: relative;
    }

    .dropdown-menu .dropdown-submenu {
        display: none;
        position: absolute;
        left: 100%;
        top: -7px;
    }

    .dropdown-menu .dropdown-submenu-left {
        right: 100%;
        left: auto;
    }

    .dropdown-menu>li:hover>.dropdown-submenu {
        display: block;
    }
</style>
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
        <button class="dropdown-item" type="button">Action</button>
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Another action2</button>

        <button class="dropdown-item" type="button">Something else here</button>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <ul class="navbar-nav ms-auto">
            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLinkRight" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    Dropdown link
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkRight">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li>
                        <a class="dropdown-item" href="#"> Submenu &raquo; </a>
                        <ul class="dropdown-menu dropdown-submenu dropdown-submenu-left">
                            <li>
                                <a class="dropdown-item" href="#">Submenu item 1</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Submenu item 2</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" id="cek">Submenu item 4</a>
                                <ul class="dropdown-menu" aria-labelledby="cek">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Submenu item 5</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>