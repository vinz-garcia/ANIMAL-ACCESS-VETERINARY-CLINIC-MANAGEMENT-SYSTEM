<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Grooming - Animal Access Veterinary Clinic</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <style>

        /* =====================================================
           EDIT GROOMING PAGE
        ===================================================== */

        html,
        body {
            margin: 0 !important;
            padding: 0 !important;
            min-height: 100% !important;
        }

        body {
            background: #faf9f6 !important;
            overflow-x: hidden !important;
        }


        /* =====================================================
           MAIN EDIT OVERLAY
        ===================================================== */

        .grooming-edit-overlay {
            position: fixed !important;
            inset: 0 !important;

            background: rgba(5, 35, 35, 0.38) !important;

            backdrop-filter: blur(7px) !important;
            -webkit-backdrop-filter: blur(7px) !important;

            display: flex !important;
            align-items: center !important;
            justify-content: center !important;

            padding: 20px !important;

            box-sizing: border-box !important;

            z-index: 3000 !important;
        }


        /* =====================================================
           EDIT MODAL
        ===================================================== */

        .grooming-edit-modal {
            width: 512px !important;
            max-width: calc(100% - 30px) !important;

            background: #ffffff !important;

            border-radius: 16px !important;

            box-shadow:
                0 18px 45px rgba(0, 0, 0, 0.16) !important;

            overflow: hidden !important;
        }


        /* =====================================================
           MODAL HEADER
        ===================================================== */

        .grooming-edit-modal-header {
            height: 72px !important;

            padding: 0 24px !important;

            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;

            box-sizing: border-box !important;

            border-bottom: 1px solid #edf0f0 !important;
        }

        .grooming-edit-modal-header h2 {
            margin: 0 !important;

            color: #102f2f !important;

            font-family: Georgia, "Times New Roman", serif !important;

            font-size: 20px !important;

            font-weight: 600 !important;
        }

        .grooming-edit-close {
            width: 28px !important;
            height: 28px !important;

            border: none !important;

            background: transparent !important;

            color: #8ca0a0 !important;

            font-size: 20px !important;

            line-height: 28px !important;

            padding: 0 !important;

            cursor: pointer !important;

            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        .grooming-edit-close:hover {
            color: #174e4e !important;
        }


        /* =====================================================
           FORM
        ===================================================== */

        .grooming-edit-form {
            padding: 22px 24px 20px !important;

            box-sizing: border-box !important;
        }


        /* =====================================================
           TWO COLUMN GRID
        ===================================================== */

        .grooming-edit-grid {
            display: grid !important;

            grid-template-columns: 1fr 1fr !important;

            column-gap: 16px !important;

            row-gap: 16px !important;
        }


        /* =====================================================
           FORM GROUP
        ===================================================== */

        .grooming-edit-group {
            min-width: 0 !important;
        }

        .grooming-edit-group label {
            display: block !important;

            margin-bottom: 7px !important;

            color: #718080 !important;

            font-size: 11px !important;

            font-weight: 700 !important;

            text-transform: uppercase !important;
        }


        /* =====================================================
           INPUTS / SELECT
        ===================================================== */

        .grooming-edit-group input,
        .grooming-edit-group select {
            width: 100% !important;

            height: 38px !important;

            padding: 0 12px !important;

            box-sizing: border-box !important;

            border: 1px solid #d9e2e2 !important;

            border-radius: 7px !important;

            background: #ffffff !important;

            color: #263838 !important;

            font-family: Arial, Helvetica, sans-serif !important;

            font-size: 13px !important;

            outline: none !important;
        }

        .grooming-edit-group input:focus,
        .grooming-edit-group select:focus {
            border-color: #0f7777 !important;

            box-shadow: 0 0 0 2px rgba(15, 119, 119, 0.08) !important;
        }


        /* =====================================================
           HIDDEN DATE
        ===================================================== */

        .grooming-date-hidden {
            display: none !important;
        }


        /* =====================================================
           BUTTONS
        ===================================================== */

        .grooming-edit-actions {
            display: grid !important;

            grid-template-columns: 1fr 1fr !important;

            gap: 12px !important;

            margin-top: 22px !important;
        }

        .grooming-edit-cancel,
        .grooming-edit-save {
            height: 42px !important;

            border-radius: 7px !important;

            font-size: 13px !important;

            font-weight: 600 !important;

            cursor: pointer !important;

            display: flex !important;
            align-items: center !important;
            justify-content: center !important;

            box-sizing: border-box !important;

            text-decoration: none !important;
        }

        .grooming-edit-cancel {
            border: 1px solid #d9e2e2 !important;

            background: #ffffff !important;

            color: #667878 !important;
        }

        .grooming-edit-cancel:hover {
            background: #f7f9f9 !important;
        }

        .grooming-edit-save {
            border: none !important;

            background: #0f7777 !important;

            color: #ffffff !important;
        }

        .grooming-edit-save:hover {
            background: #0b6868 !important;
        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 600px) {

            .grooming-edit-overlay {
                padding: 12px !important;
            }

            .grooming-edit-modal {
                width: 100% !important;

                max-width: 100% !important;
            }

            .grooming-edit-grid {
                grid-template-columns: 1fr !important;
            }

            .grooming-edit-modal-header {
                padding: 0 20px !important;
            }

            .grooming-edit-form {
                padding: 20px !important;
            }

        }

    </style>

</head>


<body>


    <!-- =====================================================
         SIDEBAR
    ====================================================== -->

    <aside class="sidebar">

        <div class="logo-area">

            <div class="logo">

                <img
                    src="{{ asset('images/animal-access-logo.jpg') }}"
                    alt="Animal Access Veterinary Clinic Logo"
                >

            </div>

            <div>

                <h2>Animal Access</h2>

                <span>Veterinary Clinic</span>

            </div>

        </div>


        <!-- NAVIGATION -->

        <nav>

            <a href="/dashboard">

                <span>▣</span>

                Dashboard

            </a>


            <a href="/appointments">

                <span>▦</span>

                Appointments

            </a>


            <a
                href="/grooming"
                class="active"
            >

                <span>✂</span>

                Grooming

            </a>


            <a href="/pets">

                <span>🐾</span>

                Pet Records

            </a>


            <a href="/customers">

                <span>♙</span>

                Customers

            </a>

        </nav>


        <!-- SIDEBAR USER -->

        <div class="sidebar-user">

            <div class="user-avatar">
                A
            </div>

            <div class="sidebar-user-info">

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


        <!-- TOPBAR -->

        <header class="topbar">

            <h3>
                Grooming
            </h3>


            <div class="top-right">

                <span class="notification">
                    🔔
                </span>


                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >

                    @csrf

                    <button
                        type="submit"
                        class="signout"
                    >
                        Sign out
                    </button>

                </form>

            </div>

        </header>


        <!-- =================================================
             BACKGROUND CONTENT
        ================================================== -->

        <section class="page-content">

            <div class="section-title">

                <div>

                    <h1>
                        Grooming
                    </h1>

                    <p>
                        {{ now()->format('F j, Y') }}
                        — {{ \App\Models\Grooming::count() }} total
                    </p>

                </div>

            </div>

        </section>

    </main>



    <!-- =====================================================
         EDIT GROOMING MODAL
    ====================================================== -->

    <div class="grooming-edit-overlay">


        <div class="grooming-edit-modal">


            <!-- MODAL HEADER -->

            <div class="grooming-edit-modal-header">

                <h2>
                    Edit Grooming —
                    G-{{ str_pad($grooming->id, 3, '0', STR_PAD_LEFT) }}
                </h2>


                <a
                    href="{{ route('grooming.index') }}"
                    class="grooming-edit-close"
                    title="Close"
                >
                    ×
                </a>

            </div>



            <!-- FORM -->

            <form
                method="POST"
                action="{{ route('grooming.update', $grooming->id) }}"
                class="grooming-edit-form"
            >

                @csrf

                @method('PUT')


                <input
                    type="hidden"
                    name="grooming_date"
                    value="{{ $grooming->grooming_date }}"
                >


                <div class="grooming-edit-grid">


                    <!-- PET NAME -->

                    <div class="grooming-edit-group">

                        <label for="pet_name">
                            Pet Name
                        </label>

                        <input
                            type="text"
                            id="pet_name"
                            name="pet_name"
                            value="{{ $grooming->pet_name }}"
                            required
                        >

                    </div>



                    <!-- OWNER -->

                    <div class="grooming-edit-group">

                        <label for="customer_name">
                            Owner
                        </label>

                        <input
                            type="text"
                            id="customer_name"
                            name="customer_name"
                            value="{{ $grooming->customer_name }}"
                            required
                        >

                    </div>



                    <!-- SERVICE -->

                    <div class="grooming-edit-group">

                        <label for="grooming_service">
                            Service
                        </label>

                        <select
                            id="grooming_service"
                            name="grooming_service"
                            required
                        >

                            <option value="Basic Grooming"
                                {{ $grooming->grooming_service == 'Basic Grooming' ? 'selected' : '' }}>
                                Basic Grooming
                            </option>

                            <option value="Full Grooming"
                                {{ $grooming->grooming_service == 'Full Grooming' ? 'selected' : '' }}>
                                Full Grooming
                            </option>

                            <option value="Bath & Blow Dry"
                                {{ $grooming->grooming_service == 'Bath & Blow Dry' ? 'selected' : '' }}>
                                Bath & Blow Dry
                            </option>

                            <option value="Nail Trimming"
                                {{ $grooming->grooming_service == 'Nail Trimming' ? 'selected' : '' }}>
                                Nail Trimming
                            </option>

                            <option value="Haircut"
                                {{ $grooming->grooming_service == 'Haircut' ? 'selected' : '' }}>
                                Haircut
                            </option>

                        </select>

                    </div>


                     <!-- GROOMER -->
                        <div class="form-group">

                        <label for="groomer">
                              Groomer
                     </label>

    <select
        id="groomer"
        name="groomer"
        required
    >

        <option value="">
            Select Groomer
        </option>

        <option
            value="Ate Liza"
            {{ $grooming->groomer == 'Ate Liza' ? 'selected' : '' }}
        >
            Ate Liza
        </option>

        <option
            value="Kuya Ben"
            {{ $grooming->groomer == 'Kuya Ben' ? 'selected' : '' }}
        >
            Kuya Ben
        </option>

    </select>

</div>


                    <!-- TIME -->

                    <div class="grooming-edit-group">

                        <label for="grooming_time">
                            Time
                        </label>

                        <input
                            type="time"
                            id="grooming_time"
                            name="grooming_time"
                            value="{{ $grooming->grooming_time }}"
                            required
                        >

                    </div>



                    <!-- STATUS -->

                    <div class="grooming-edit-group">

                        <label for="status">
                            Status
                        </label>

                        <select
                            id="status"
                            name="status"
                            required
                        >

                            <option
                                value="Pending"
                                {{ $grooming->status == 'Pending' ? 'selected' : '' }}
                            >
                                Pending
                            </option>

                            <option
                                value="Confirmed"
                                {{ $grooming->status == 'Confirmed' ? 'selected' : '' }}
                            >
                                Confirmed
                            </option>

                            <option
                                value="Completed"
                                {{ $grooming->status == 'Completed' ? 'selected' : '' }}
                            >
                                Completed
                            </option>

                            <option
                                value="Cancelled"
                                {{ $grooming->status == 'Cancelled' ? 'selected' : '' }}
                            >
                                Cancelled
                            </option>

                        </select>

                    </div>


                </div>



                <!-- BUTTONS -->

                <div class="grooming-edit-actions">


                    <a
                        href="{{ route('grooming.index') }}"
                        class="grooming-edit-cancel"
                    >
                        Cancel
                    </a>


                    <button
                        type="submit"
                        class="grooming-edit-save"
                    >
                        Save Changes
                    </button>

                </div>


            </form>

        </div>

    </div>



    <!-- =====================================================
         LOGOUT CONFIRMATION
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