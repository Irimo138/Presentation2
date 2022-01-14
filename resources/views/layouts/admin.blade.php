<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="{{ URL::asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom CSS for this template-->
    <link href="{{ URL::asset('css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Area</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Control Panel </span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Users
            </div>

            <!-- Nav Item  -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('indexUser')}}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Regular Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('indexArtist')}}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Artists</span>
                </a>
            </li>

            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Events
            </div>

            <!-- Nav Item  -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('event.show.checked')}}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Confirmed Events</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('event.show.notChecked')}}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Unconfirmed Events</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/logo.png" alt="...">
                <p class="text-center mb-2"><strong>Agenda.eus</strong> admid panel!</p>
                <a class="btn btn-dark btn-sm" href="{{route('index')}}">Back to the web </a>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-dark bg-dark topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!-- Update events from the API -->
                    <form method="GET" action="/refreshEvent">
                                @csrf 
       
                    <button type="submit" class="btn btn-warning mt-3 d-none d-lg-inline">Refresh events</button>
                    </form>
                    <!-- Create user -->
                    <form method="GET" action="/registerStore">
                                @csrf 
       
                    <button type="submit" class="btn btn-warning mt-3 d-none d-lg-inline">Create a user</button>
                    </form>

                     <!-- Create artist -->
                     <form method="GET" action="/registerArtist">
                                @csrf 
                    <button type="submit" class="btn btn-warning mt-3 d-none d-lg-inline">Create a artist</button>
                    </form>
                    <!-- Create event -->
                    <form method="GET" action="/createEvent">
                                @csrf 
       
                    <button type="submit" class="btn btn-warning mt-3 d-none d-lg-inline">Create event</button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item">
                        <li class="nav-item"><button class="btn btn-success-warning bg-warning" href="{{ url('/logout') }}"><a id="logoutLink" href="{{ url('/logout') }}"> Logout </a></button></li>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <section>
                @section('content')
                @show
                </section>



                  <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Agenda.eus 2021</span>
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





</body>

</html>