<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Milba Backoffice</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin-assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin-assets/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">
    <script src="https://printjs-4de6.kxcdn.com/print.min.js" defer></script>
    @yield('styles')

    @livewireStyles

</head>

<body id="page-top">

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a style="margin-bottom: 60px" class="sidebar-brand d-flex mt-0" href="/admin">
                <div class="sidebar-brand-text">
                    <img width="150" src="/storage/logo.png" alt="">
                </div>
            </a>

                           
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Πελάτες</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="#">Δημιουργία Πελάτη</a>
                        <a class="collapse-item" href="/admin/customers">Όλοι οι Πελάτες</a>
                        <a class="collapse-item" href="#">Στατιστικά Για Πελάτες</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item py-1">
                <a style="padding-top: 0" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#orders"
                    aria-expanded="true" aria-controls="orders">
                    <i class="fas fa-file-invoice"></i>
                    <span>Παραγγελίες</span>
                </a>
                <div id="orders" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="#">Δημιουργία</a>
                        <a class="collapse-item" href="/admin/orders/new">Νέες Παραγγελίες</a>
                        <a class="collapse-item" href="/admin/orders">Όλες οι Παραγγελίες</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item py-1">
                <a style="padding-top: 0" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#products"
                    aria-expanded="true" aria-controls="products">
                    <i class="fas fa-box"></i>
                    <span>Αποθήκη</span>
                </a>
                <div id="products" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/admin/categories">Κατηγορίες</a>
                        <a class="collapse-item" href="/admin/products">Προϊόντα</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item py-1">
                <a style="padding-top: 0" class="nav-link" href="/admin">
                    <i class="fas fa-coins"></i>
                    <span>Πωλήσεις / Στατιστικά</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item py-1">
                <a style="padding-top: 0" class="nav-link" href="/admin/end-of-day">
                    <i class="fas fa-archive"></i>
                    <span>Κλείσιμο Ημέρας</span></a>
            </li>
            @if(auth()->user()->role == 'Superadmin')
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item py-1">
                <a style="padding-top: 0" class="nav-link" href="/admin">
                    <i class="fas fa-fw fa-chart-line"></i>
                    <span>ΣΤΑΤΙΣΤΙΚΑ</span></a>
            </li>
            @endif
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a href="/admin/orders/create" class="btn btn-primary">NEA ΠΑΡΑΓΓΕΛΙΑ</a>
                    <livewire:endofday-toggle /> 
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow mx-1 pt-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <span class="badge badge-danger badge-counter">5+</span>
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    ΝΕΕΣ ΠΑΡΑΓΓΕΛΙΕΣ
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">Σεπτέμβριος 23, 2022</div>
                                        <span class="font-weight-bold">ΩΡΑ: 14:30, ΠΡΟΙΟΝΤΑ:....</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">Σεπτέμβριος 23, 2022</div>
                                        <span class="font-weight-bold">ΩΡΑ: 16:10, ΠΡΟΙΟΝΤΑ:....</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">Σεπτέμβριος 23, 2022</div>
                                        <span class="font-weight-bold">ΩΡΑ: 17:43, ΠΡΟΙΟΝΤΑ:....</span>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Προβολή Όλων</a>
                            </div>
                        </li>
                        

                        <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i>
                                <span class="pt-1 ml-2 d-none d-lg-inline text-gray-600 small">Διαχειριστής</span>
                                <!-- <img class="img-profile rounded-circle" src="img/undraw_profile.svg"> -->
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">
                            @yield('title')
                        </h1>
                    </div>

                    <!-- Content Row -->
                    <main>
                        @yield('content') 
                    </main>
                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; TechnoPOS Systems 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @livewireScripts

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
    <x-livewire-alert::scripts />
  
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin-assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin-assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin-assets/js/sb-admin-2.min.js') }}"></script>
    <script>
        window.addEventListener('day_started', () => {
            $('#startOfDay').modal('hide')
        })
        window.addEventListener('day_ended', () => {
            $('#endOfDay').modal('hide')
        })
    </script>
    @yield('scripts')
</body>

</html>