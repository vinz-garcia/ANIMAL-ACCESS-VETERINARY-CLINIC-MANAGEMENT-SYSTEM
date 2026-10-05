<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Customer - Animal Access Veterinary Clinic</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
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

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background: #063d3d;
            color: white;
            z-index: 100;
        }

        .logo-area {
            height: 116px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 22px;
            box-sizing: border-box;
        }

        .logo img {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            object-fit: cover;
        }

        .logo-area h2 {
            margin: 0;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 17px;
            font-weight: 600;
        }

        .logo-area span {
            font-size: 10px;
            color: #a9caca;
        }

        .sidebar nav {
            display: flex;
            flex-direction: column;
            gap: 4px;
            padding: 0 14px;
        }

        .sidebar nav a {
            height: 42px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 14px;
            color: #c4d7d7;
            text-decoration: none;
            border-radius: 8px;
            font-size: 13px;
            box-sizing: border-box;
        }

        .sidebar nav a:hover,
        .sidebar nav a.active {
            background: rgba(255, 255, 255, 0.09);
            color: #ffffff;
        }

        .sidebar nav a span {
            width: 18px;
            text-align: center;
        }

        /* =========================
           SIDEBAR USER
        ========================= */

        .sidebar-user {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 72px;
            padding: 0 18px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-sizing: border-box;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        .user-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #d8eeee;
            color: #0b5b5b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 700;
        }

        .sidebar-user-info {
            flex: 1;
            min-width: 0;
        }

        .sidebar-user strong {
            display: block;
            font-size: 12px;
            color: #ffffff;
        }

        .sidebar-user small {
            display: block;
            margin-top: 2px;
            font-size: 10px;
            color: #9bb5b5;
        }

        .logout-power-btn {
            width: 30px;
            height: 30px;
            border: none;
            background: transparent;
            color: #b7cece;
            font-size: 19px;
            cursor: pointer;
            border-radius: 6px;
        }

        .logout-power-btn:hover {
            background: rgba(255, 255, 255, 0.08);
            color: #ffffff;
        }

        /* =========================
           MAIN CONTENT
        ========================= */

        .main-content {
            margin-left: 250px;
            min-height: 100vh;
        }

        .topbar {
            height: 68px;
            background: #ffffff;
            border-bottom: 1px solid #e9eeee;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            box-sizing: border-box;
        }

        .topbar h3 {
            margin: 0;
            color: #173636;
            font-size: 14px;
            font-weight: 600;
        }

        .top-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .notification {
            font-size: 17px;
        }

        .signout {
            border: none;
            background: transparent;
            color: #6d7f7f;
            font-size: 12px;
            cursor: pointer;
        }

        /* =========================
           EDIT MODAL
        ========================= */

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

        .grooming-edit-modal {
            width: 512px !important;
            max-width: calc(100% - 30px) !important;
            background: #ffffff !important;
            border-radius: 16px !important;
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.16) !important;
            overflow: hidden !important;
        }

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

        .grooming-edit-modal-header p {
            margin: 4px 0 0 !important;
            color: #879696 !important;
            font-size: 11px !important;
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
            text-decoration: none !important;
        }

        .grooming-edit-close:hover {
            color: #174e4e !important;
        }

        .grooming-edit-form {
            padding: 22px 24px 20px !important;
        }

        .grooming-edit-grid {
            display: grid !important;
            grid-template-columns: 1fr 1fr !important;
            column-gap: 16px !important;
            row-gap: 16px !important;
        }

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

        /* =========================
           LOGOUT MODAL
        ========================= */

        .logout-modal {
            position: fixed;
            inset: 0;
            background: rgba(5, 35, 35, 0.38);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 5000;
        }

        .logout-modal.show {
            display: flex;
        }

        .logout-modal-content {
            width: 360px;
            background: #ffffff;
            border-radius: 15px;
            padding: 28px;
            text-align: center;
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.18);
            box-sizing: border-box;
        }

        .logout-icon {
            width: 48px;
            height: 48px;
            margin: 0 auto 14px;
            border-radius: 50%;
            background: #e7f3f3;
            color: #0f7777;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
        }

        .logout-modal-content h2 {
            margin: 0;
            color: #173636;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 20px;
        }

        .logout-modal-content p {
            margin: 8px 0 22px;
            color: #718080;
            font-size: 13px;
        }

        .logout-modal-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .logout-cancel-btn,
        .logout-confirm-btn {
            height: 40px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        .logout-cancel-btn {
            border: 1px solid #d9e2e2;
            background: #ffffff;
            color: #667878;
        }

        .logout-confirm-btn {
            width: 100%;
            border: none;
            background: #0f7777;
            color: #ffffff;
        }

        /* =========================
           MOBILE
        ========================= */

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

            .sidebar {
                width: 210px;
            }

            .main-content {
                margin-left: 210px;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
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

        <nav>

            <a href="{{ route('dashboard') }}">
                <span>▣</span>
                Dashboard
            </a>

            <a href="{{ route('appointments.index') }}">
                <span>▦</span>
                Appointments
            </a>

            <a href="{{ route('grooming.index') }}">
                <span>✂</span>
                Grooming
            </a>

            <a href="{{ route('pets.index') }}">
                <span>🐾</span>
                Pet Records
            </a>

            <a href="{{ route('customers.index') }}" class="active">
                <span>♙</span>
                Customers
            </a>

        </nav>

        <div class="sidebar-user">

            <div class="user-avatar">
                A
            </div>

            <div class="sidebar-user-info">
                <strong>Admin</strong>
                <small>Administrator</small>
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


    <!-- MAIN CONTENT -->
    <main class="main-content">

        <header class="topbar">

            <h3>
                Customers
            </h3>

            <div class="top-right">

                <span class="notification">
                    🔔
                </span>

                <form method="POST" action="{{ route('logout') }}">

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


        <!-- EDIT MODAL -->
        <div class="grooming-edit-overlay">

            <div class="grooming-edit-modal">

                <div class="grooming-edit-modal-header">

                    <div>

                        <h2>
                            Edit Customer
                        </h2>

                        <p>
                            C-{{ str_pad($customer->id, 4, '0', STR_PAD_LEFT) }}
                        </p>

                    </div>

                    <a
                        href="{{ route('customers.index') }}"
                        class="grooming-edit-close"
                        title="Close"
                    >
                        ×
                    </a>

                </div>


                <form
                    method="POST"
                    action="{{ route('customers.update', $customer->id) }}"
                    class="grooming-edit-form"
                >

                    @csrf
                    @method('PUT')


                    <div class="grooming-edit-grid">

                        <!-- CUSTOMER NAME -->
                        <div class="grooming-edit-group">

                            <label for="name">
                                Customer Name
                            </label>

                            <input
                               
                             type="text"
                             id="customer_name"
                             name="customer_name"
                             value="{{ $customer->customer_name }}"
                            required
                                >
                            >

                        </div>


                        <!-- PHONE -->
                        <div class="grooming-edit-group">

                            <label for="phone">
                                Phone
                            </label>

                            <input
                                type="text"
                                id="phone"
                                name="phone"
                                value="{{ $customer->phone }}"
                                placeholder="Enter phone number"
                                required
                            >

                        </div>


                        <!-- EMAIL -->
                        <div class="grooming-edit-group">

                            <label for="email">
                                Email
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ $customer->email }}"
                                placeholder="Enter email address"
                            >

                        </div>


                        <!-- ADDRESS -->
                        <div class="grooming-edit-group">

                            <label for="address">
                                Address
                            </label>

                            <input
                                type="text"
                                id="address"
                                name="address"
                                value="{{ $customer->address }}"
                                placeholder="Enter address"
                                required
                            >

                        </div>

                    </div>


                    <!-- BUTTONS -->
                    <div class="grooming-edit-actions">

                        <a
                            href="{{ route('customers.index') }}"
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

    </main>


    <!-- LOGOUT CONFIRMATION MODAL -->
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