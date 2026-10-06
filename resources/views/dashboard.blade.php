<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Animal Access Veterinary Clinic
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="dashboard-page">


    <!-- =====================================================
         SIDEBAR
    ====================================================== -->

    <aside class="appointments-sidebar">


        <div class="appointments-logo-area">

            <div class="appointments-logo">

                <img
                    src="{{ asset('images/animal-access-logo.jpg') }}"
                    alt="Animal Access Veterinary Clinic Logo"
                >

            </div>


            <div class="appointments-clinic">

                <h2>
                    Animal Access
                </h2>

                <span>
                    Veterinary Clinic
                </span>

            </div>

        </div>


        <nav class="appointments-nav">


            <a
                href="/dashboard"
                class="active"
            >

                <span>
                    ▣
                </span>

                Dashboard

            </a>


            <a href="/appointments">

                <span>
                    ▦
                </span>

                Appointments

            </a>


            <a href="/grooming">

                <span>
                    ✂
                </span>

                Grooming

            </a>


            <a href="/pets">

                <span>
                    🐾
                </span>

                Pet Records

            </a>


            <a href="/customers">

                <span>
                    ♙
                </span>

                Customers

            </a>


        </nav>


        <div class="appointments-user">


            <div class="appointments-avatar">
                A
            </div>


            <div class="appointments-user-info">

                <strong>
                    Admin
                </strong>

                <small>
                    Administrator
                </small>

            </div>


            <button
                type="button"
                class="logout-power-btn"
                id="logoutPowerBtn"
                title="Sign out"
            >

                ⏻

            </button>


        </div>


    </aside>



    <!-- =====================================================
         MAIN CONTENT
    ====================================================== -->

    <main class="main-content">


        <!-- =================================================
             TOPBAR
        ================================================== -->

        <header class="topbar">


            <h3>
                Dashboard
            </h3>


            <div class="top-right">


                <!-- =================================================
                     SHARED NOTIFICATION
                ================================================== -->

                <x-notification />


                <!-- =================================================
                     SIGN OUT BUTTON
                ================================================== -->

                <button
                    type="button"
                    class="signout"
                    id="topSignoutBtn"
                >

                    Sign out

                </button>


            </div>


        </header>



        <!-- =================================================
             PAGE CONTENT
        ================================================== -->

        <section class="page-content">


            <!-- =================================================
                 WELCOME BANNER
            ================================================== -->

            <div class="welcome-banner">


                <div class="welcome-content">


                    <small>

                        {{ now()->format('l, F j, Y') }}

                    </small>


                    <h1>


                        @php
                            $hour = now()->hour;
                        @endphp


                        @if($hour < 12)

                            Good morning.

                        @elseif($hour < 18)

                            Good afternoon.

                        @else

                            Good evening.

                        @endif


                    </h1>


                    <p>

                        You have

                        <strong>

                            {{ $todayAppointments->count() }}
                            appointments

                        </strong>

                        and

                        <strong>

                            {{ $todayGrooming->count() }}
                            grooming sessions

                        </strong>

                        today.

                    </p>


                </div>



                <!-- WELCOME IMAGE -->

                <div class="welcome-image">


                    <img
                        src="{{ asset('images/welcome-banner.jpg') }}"
                        alt="Pets"
                    >


                </div>


            </div>



            <!-- =================================================
                 STATISTICS
            ================================================== -->

            <div class="stats-container">


                <!-- TODAY'S APPOINTMENTS -->

                <div class="stat-card">


                    <div class="stat-card-top">


                        <span>
                            Today's Appointments
                        </span>


                        <div class="stat-icon calendar-icon">
                            ▦
                        </div>


                    </div>


                    <h2>

                        {{ $todayAppointments->count() }}

                    </h2>


                    <p>

                        {{
                            $todayAppointments
                                ->where('status', 'Confirmed')
                                ->count()
                        }}

                        confirmed

                    </p>


                </div>



                <!-- GROOMING -->

                <div class="stat-card">


                    <div class="stat-card-top">


                        <span>
                            Grooming Sessions
                        </span>


                        <div class="stat-icon grooming-icon">
                            ✂
                        </div>


                    </div>


                    <h2>

                        {{ $todayGrooming->count() }}

                    </h2>


                    <p>

                        {{
                            $todayGrooming
                                ->where('status', 'Pending')
                                ->count()
                        }}

                        pending confirmation

                    </p>


                </div>



                <!-- CONFIRMED -->

                <div class="stat-card">


                    <div class="stat-card-top">


                        <span>
                            Confirmed Today
                        </span>


                        <div class="stat-icon confirmed-icon">
                            ✓
                        </div>


                    </div>


                    <h2>


                        {{
                            $todayAppointments
                                ->where('status', 'Confirmed')
                                ->count()
                        }}


                    </h2>


                    <p>
                        Vet appointments
                    </p>


                </div>



                <!-- PENDING -->

                <div class="stat-card">


                    <div class="stat-card-top">


                        <span>
                            Pending Review
                        </span>


                        <div class="stat-icon pending-icon">
                            ⌛
                        </div>


                    </div>


                    <h2>


                        {{
                            $todayAppointments
                                ->where('status', 'Pending')
                                ->count()
                        }}


                    </h2>


                    <p>
                        Need confirmation
                    </p>


                </div>


            </div>



            <!-- =================================================
                 LOWER DASHBOARD
            ================================================== -->

            <div class="dashboard-grid">


                <!-- =================================================
                     TODAY'S APPOINTMENTS
                ================================================== -->

                <div class="dashboard-section">


                    <div class="section-title">


                        <h2>
                            Today's Appointments
                        </h2>


                        <a href="/appointments">
                            View all
                        </a>


                    </div>



                    <div class="appointment-card">


                        @forelse($todayAppointments as $appointment)


                            <div class="appointment">


                                <!-- TIME -->

                                <span class="time">


                                    {{
                                        \Carbon\Carbon::parse(
                                            $appointment->appointment_time
                                        )->format('g:i A')
                                    }}


                                </span>



                                <!-- PET ICON -->

                                <span class="pet">
                                    🐶
                                </span>



                                <!-- APPOINTMENT INFORMATION -->

                                <div class="appointment-info">


                                    <strong>

                                        {{ $appointment->pet_name }}

                                    </strong>


                                    <small>


                                        {{ $appointment->customer_name }}

                                        ·

                                        {{ $appointment->service }}


                                    </small>


                                </div>



                                <!-- STATUS -->

                                <span
                                    class="status {{ strtolower($appointment->status) }}"
                                >

                                    {{ $appointment->status }}

                                </span>


                            </div>


                        @empty


                            <!-- EMPTY APPOINTMENTS -->

                            <div class="empty-dashboard">


                                <span>
                                    📅
                                </span>


                                <strong>
                                    No appointments today
                                </strong>


                                <small>
                                    There are no scheduled appointments for today.
                                </small>


                            </div>


                        @endforelse


                    </div>


                </div>



                <!-- =================================================
                     GROOMING QUEUE
                ================================================== -->

                <div class="dashboard-section">


                    <div class="section-title">


                        <h2>
                            Grooming Queue
                        </h2>


                        <a href="/grooming">
                            View all
                        </a>


                    </div>



                    <div class="appointment-card">


                        @forelse($todayGrooming as $grooming)


                            <div class="grooming-row">


                                <!-- TIME -->

                                <span class="time">


                                    {{
                                        \Carbon\Carbon::parse(
                                            $grooming->grooming_time
                                        )->format('g:i A')
                                    }}


                                </span>



                                <!-- PET ICON -->

                                <span class="pet">
                                    🐾
                                </span>



                                <!-- GROOMING INFORMATION -->

                                <div class="appointment-info">


                                    <strong>

                                        {{ $grooming->pet_name }}

                                    </strong>


                                    <small>

                                        {{ $grooming->grooming_service }}

                                    </small>


                                </div>



                                <!-- STATUS -->

                                <span
                                    class="status {{ strtolower($grooming->status) }}"
                                >

                                    {{ $grooming->status }}

                                </span>


                            </div>


                        @empty


                            <!-- EMPTY GROOMING -->

                            <div class="empty-dashboard">


                                <span>
                                    ✂
                                </span>


                                <strong>
                                    No grooming appointments today
                                </strong>


                                <small>
                                    There are no scheduled grooming services for today.
                                </small>


                            </div>


                        @endforelse


                    </div>


                </div>


            </div>


        </section>


    </main>



    <!-- =====================================================
         LOGOUT CONFIRMATION MODAL
    ====================================================== -->

    <div
        class="logout-modal"
        id="logoutModal"
    >


        <div class="logout-modal-content">


            <div class="logout-icon">
                ⏻
            </div>


            <h2>
                Are you sure?
            </h2>


            <p>
                Are you sure you want to log out?
            </p>


            <div class="logout-modal-actions">


                <button
                    type="button"
                    class="logout-cancel-btn"
                    id="logoutCancelBtn"
                >

                    Cancel

                </button>


                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >

                    @csrf


                    <button
                        type="submit"
                        class="logout-confirm-btn"
                    >

                        Log out

                    </button>


                </form>


            </div>


        </div>


    </div>


</body>

</html>