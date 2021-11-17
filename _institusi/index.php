<?php
if ($_SESSION['status_user'] == "Y" && $_SESSION['level_user'] == 2) {
?>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?">
                    <div class="sidebar-brand-text mx-3">SIPAPAP MACO</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="?">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Kediklatan
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="?prk">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Praktikan</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Data
                </div>
                <?php
                if ($_SESSION['level_user'] == 1) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?jrs">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Jurusan</span>
                        </a>
                        <a class="nav-link" href="?mou">
                            <i class="fas fa-fw fa-table"></i>
                            <span>MoU</span>
                        </a>
                        <a class="nav-link" href="?pmb">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Pembimbing</span>
                        </a>
                        <a class="nav-link" href="?spf">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Spesifikasi</span>
                        </a>
                    </li>
                <?php
                }
                ?>
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                    <?php
                    include "_nav.php";
                    ?>
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>RS Jiwa Provinsi Jawa Barat 2021</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Yakin Keluar?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                        <a class="btn btn-danger" href="?lo">Ya</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
<?php
} else {
?>
    <script>
        alert('Anda belum Login, Silahkan Login Terlebih dahulu');
    </script>
<?php
    header("Refresh:0; url=?lo");
}
?>