
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>
        @yield('title', 'Student Management System')
    </title>


    <!-- =========================================
         Bootstrap 5 CSS
    ========================================== -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">


    <!-- =========================================
         Bootstrap Icons
    ========================================== -->

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <!-- =========================================
         Custom CSS
    ========================================== -->

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f5f7fb;
            font-family: Arial, Helvetica, sans-serif;
            color: #212529;
        }


        /* =========================================
           Sidebar
        ========================================== */

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;

            width: 250px;
            height: 100vh;

            background: #ffffff;

            border-right: 1px solid #e5e7eb;

            z-index: 1000;

            overflow-y: auto;
        }


        .sidebar-logo {
            height: 70px;

            display: flex;
            align-items: center;

            padding: 0 22px;

            border-bottom: 1px solid #e5e7eb;
        }


        .sidebar-logo a {
            text-decoration: none;

            font-size: 20px;
            font-weight: 700;

            color: #0d6efd;
        }


        .sidebar-logo i {
            margin-right: 8px;
        }


        /* =========================================
           Sidebar Menu
        ========================================== */

        .sidebar-menu {
            padding: 20px 12px;
        }


        .menu-title {
            padding: 10px 12px;

            font-size: 11px;

            font-weight: 700;

            text-transform: uppercase;

            color: #9ca3af;

            letter-spacing: 0.5px;
        }


        .sidebar-menu a {
            display: flex;

            align-items: center;

            gap: 12px;

            padding: 11px 13px;

            margin-bottom: 5px;

            border-radius: 7px;

            color: #4b5563;

            text-decoration: none;

            font-size: 14px;

            transition: 0.2s;
        }


        .sidebar-menu a:hover {
            background: #eef5ff;

            color: #0d6efd;
        }


        .sidebar-menu a.active {
            background: #0d6efd;

            color: #ffffff;
        }


        .sidebar-menu a i {
            width: 20px;

            font-size: 17px;
        }


        /* =========================================
           Main Area
        ========================================== */

        .main-wrapper {
            margin-left: 250px;

            min-height: 100vh;

            display: flex;

            flex-direction: column;
        }


        /* =========================================
           Top Navbar
        ========================================== */

        .top-navbar {
            height: 70px;

            background: #ffffff;

            border-bottom: 1px solid #e5e7eb;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 25px;

            position: sticky;

            top: 0;

            z-index: 999;
        }


        .page-title {
            font-size: 18px;

            font-weight: 600;

            margin: 0;
        }


        .user-area {
            display: flex;

            align-items: center;

            gap: 10px;
        }


        .user-avatar {
            width: 38px;

            height: 38px;

            border-radius: 50%;

            background: #0d6efd;

            color: #ffffff;

            display: flex;

            align-items: center;

            justify-content: center;

            font-weight: 600;
        }


        .user-info {
            line-height: 1.2;
        }


        .user-name {
            font-size: 14px;

            font-weight: 600;
        }


        .user-role {
            font-size: 11px;

            color: #9ca3af;
        }


        /* =========================================
           Content
        ========================================== */

        .main-content {
            flex: 1;

            padding: 25px;
        }


        /* =========================================
           Cards
        ========================================== */

        .card {
            border: 0;

            border-radius: 10px;

            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
        }


        .card-header {
            border-bottom: 1px solid #eeeeee;
        }


        /* =========================================
           Footer
        ========================================== */

        .main-footer {
            background: #ffffff;

            border-top: 1px solid #e5e7eb;

            padding: 15px 25px;

            color: #6b7280;

            font-size: 13px;
        }


        /* =========================================
           Mobile
        ========================================== */

        .mobile-menu-btn {
            display: none;
        }


        @media (max-width: 991px) {

            .sidebar {
                left: -250px;

                transition: 0.3s;
            }


            .sidebar.show {
                left: 0;
            }


            .main-wrapper {
                margin-left: 0;
            }


            .mobile-menu-btn {
                display: inline-flex;
            }

        }


        @media (max-width: 576px) {

            .main-content {
                padding: 15px;
            }


            .top-navbar {
                padding: 0 15px;
            }


            .user-info {
                display: none;
            }

        }

    </style>


    @stack('styles')

</head>


<body>


    <!-- =========================================
         SIDEBAR
    ========================================== -->

    <aside class="sidebar" id="sidebar">


        <!-- Logo -->

        <div class="sidebar-logo">

            <a href="{{ url('/') }}">

                <i class="bi bi-mortarboard-fill"></i>

                Student Management

            </a>

        </div>


        <!-- Menu -->

        <div class="sidebar-menu">


            <div class="menu-title">
                Main Menu
            </div>


            <!-- Dashboard -->

            <a href="{{ url('/') }}">

                <i class="bi bi-speedometer2"></i>

                <span>
                    Dashboard
                </span>

            </a>


            <!-- Students -->

            <a href="{{ url('/students') }}"
               class="active">

                <i class="bi bi-people-fill"></i>

                <span>
                    Students
                </span>

            </a>


            <!-- Add Student -->

            <a href="{{ url('/students/create') }}">

                <i class="bi bi-person-plus-fill"></i>

                <span>
                    Add Student
                </span>

            </a>


            <div class="menu-title mt-3">
                Management
            </div>


            <!-- Departments -->

            <a href="#">

                <i class="bi bi-building"></i>

                <span>
                    Departments
                </span>

            </a>


            <!-- Reports -->

            <a href="#">

                <i class="bi bi-bar-chart-fill"></i>

                <span>
                    Reports
                </span>

            </a>


            <!-- Settings -->

            <a href="#">

                <i class="bi bi-gear-fill"></i>

                <span>
                    Settings
                </span>

            </a>


        </div>

    </aside>



    <!-- =========================================
         MAIN WRAPPER
    ========================================== -->

    <div class="main-wrapper">


        <!-- =====================================
             TOP NAVBAR
        ====================================== -->

        <header class="top-navbar">


            <div class="d-flex align-items-center gap-3">


                <!-- Mobile Menu -->

                <button
                    type="button"
                    class="btn btn-light mobile-menu-btn"
                    onclick="toggleSidebar()">

                    <i class="bi bi-list fs-5"></i>

                </button>


                <!-- Page Title -->

                <h5 class="page-title">

                    @yield('page-title', 'Student Management')

                </h5>

            </div>



            <!-- User Area -->

            <div class="user-area">


                <div class="user-avatar">

                    A

                </div>


                <div class="user-info">

                    <div class="user-name">

                        Admin

                    </div>

                    <div class="user-role">

                        Administrator

                    </div>

                </div>


                <button
                    type="button"
                    class="btn btn-light btn-sm">

                    <i class="bi bi-chevron-down"></i>

                </button>


            </div>

        </header>



        <!-- =====================================
             MAIN CONTENT
        ====================================== -->

        <main class="main-content">


            <!-- Success Message -->

            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show">

                    <i class="bi bi-check-circle-fill me-2"></i>

                    {{ session('success') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                    </button>

                </div>

            @endif



            <!-- Error Message -->

            @if(session('error'))

                <div class="alert alert-danger alert-dismissible fade show">

                    <i class="bi bi-exclamation-triangle-fill me-2"></i>

                    {{ session('error') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                    </button>

                </div>

            @endif



            <!-- Validation Errors -->

            @if($errors->any())

                <div class="alert alert-danger">

                    <strong>
                        Please fix the following errors:
                    </strong>

                    <ul class="mb-0 mt-2">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif



            <!-- Page Content -->

            @yield('content')


        </main>



        <!-- =====================================
             FOOTER
        ====================================== -->

        <footer class="main-footer">

            <div class="d-flex justify-content-between">

                <span>
                    © {{ date('Y') }} Student Management System
                </span>

                <span>
                    All Rights Reserved
                </span>

            </div>

        </footer>


    </div>



    <!-- =========================================
         BOOTSTRAP JS
    ========================================== -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>



    <!-- =========================================
         CUSTOM JS
    ========================================== -->

    <script>

        function toggleSidebar()
        {
            const sidebar =
                document.getElementById('sidebar');

            sidebar.classList.toggle('show');
        }

    </script>


    @stack('scripts')


</body>

</html>
