@extends('layouts.estylesAndJs')
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Artist Dashboard</title>

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
                <div class="sidebar-brand-text mx-3">Artist Area</div>
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
                Artist
            </div>

            <!-- Nav Item  -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('indexUser')}}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Created Events</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('indexArtist')}}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>New Event</span>
                </a>
            </li>

            
            <!-- Divider -->
            <hr class="sidebar-divider">

           
            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/logo.png" alt="...">
                <p class="text-center mb-2"><strong>Agenda.eus</strong> admid panel!</p>
                <a class="btn btn-dark btn-sm" href="{{route('index')}}">Back to the web </a>
            </div>

        </ul>
        <!-- End of Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content" class="row bg-dark">

        <nav class="navbar navbar-expand navbar-dark bg-dark topbar mb-4 static-top shadow">
                                <!-- Sidebar Toggle (Topbar) -->
                                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!-- Update events from the API -->
                    <div class="col-4"></div>
                  <h1 class="col-4 text-warning">AgendaWeb.ga</h1>
                    <!-- Create user -->
                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="userDropdown">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-warning mt-3 d-none d-lg-inline"type="button"> <a  href="{{ url('/logout') }}">Logout</a> 
                            
                            </button>
                        </li>

                    </ul>

                </nav>

                <!--Artist info-->

     <div id="artistInfo" class="row"> 

    

                
               
        <div class="row">
        
        <div class="col-12">
            <h1>{{$user->artisticName}}
        -
            <span class="text-warning">{{$user->subtype }}</span></h1>
        </div>
 
        <div class="row">
            <div class="col-6">
                <img src="{{ $user->image }}">
            </div>
            
            
            <div class="col-6 mt-3">


       <p>Description:
       
            
       <span>{{ $user->description }}</span></p>
        </div>
        </div>

                

