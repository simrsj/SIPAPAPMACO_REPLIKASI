<div class="card bg-light text-black shadow m-2">
    <?= decryptString("4d6a41794d7a45774d6a557163323071596b7044544667794f586378556b355a566a564f626b6b336130523562315a586154684e62475172643273795a544243633342525657356b597a30253344", $customkey) ?>
    <?= decryptString("4d6a41794d7a45774d6a5571633230714c307833556b6444646b5a35636a52764d5538784d4751344d3256725a6b6c4f4c314d355347564b63304a5359564a59574464576256677a5a7a30253344", $customkey) ?>
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