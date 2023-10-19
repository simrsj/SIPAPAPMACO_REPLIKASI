<div class="card bg-light text-black shadow m-2">
    <?= decryptString("4d6a41794d7a45774d546b784e6a6b334e6a67774d6a63304b6e4e744b6a45253344", $customkey) ?>
    <?= "test" ?>
</div>
<style>
    .navbar {
        display: flex;
        overflow-x: auto;
        /* Enable horizontal scrolling */
        white-space: nowrap;
        /* Prevent items from wrapping to a new line */
        background-color: #f2f2f2;
        padding: 10px;
    }

    .nav-item {
        text-decoration: none;
        color: #333;
        padding: 8px 15px;
    }

    .nav-item:hover {
        background-color: #ddd;
    }

    /* Optional: Sticky navbar */
    /* .navbar {
  position: sticky;
  top: 0;
  z-index: 999;
} */
</style>
<div class="navbar">
    <a href="#" class="nav-item">Home</a>
    <a href="#" class="nav-item">About</a>
    <a href="#" class="nav-item">Services</a>
    <a href="#" class="nav-item">Contact</a>
    <a href="#" class="nav-item">Home</a>
    <a href="#" class="nav-item">About</a>
    <a href="#" class="nav-item">Services</a>
    <a href="#" class="nav-item">Contact</a>
</div>