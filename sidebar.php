<?php
require_once("includes/connect.php");
?>
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.2.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@4.2.0/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@4.2.0/main.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.2.0/main.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    <style>
            .nav-item:hover {
        background-color: #3d3535; 
    }

    
    </style>
        
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background:  linear-gradient(to bottom, #800000 , #000000); color: whitesmoke !important; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); padding-top: 17px;">




            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">  
                </div>
                <div class="sidebar-brand-text mx-3">
                <div class="text-center">
                    <img src="img/hytecpower1.png" class="rounded mx-auto d-block" alt="Hytec Power INC" width="150" height="150"> <br>
                </div>
 
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            
            <li class="nav-item active">
                <a class="nav-link" href="404.html">

                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Profile</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

          

            <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Notifications</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="client_list.php">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Client List</span></a>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="new_prospect.php">
                        <i class="fas fa-fw fa-calendar-alt"></i>
                        <span>New Prospect</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="itenerary.html">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Itenerary</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="404.html">
                        <i class="fas fa-fw fa-check"></i>
                        <span>Data Analytics</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contacts-list-archived.php">
                        <i class="fas fa-fw fa-tools"></i>
                        <span>Maintenance</span></a>
                </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        


        <!-- for bootstrap logo icons -->
        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
        </svg> -->