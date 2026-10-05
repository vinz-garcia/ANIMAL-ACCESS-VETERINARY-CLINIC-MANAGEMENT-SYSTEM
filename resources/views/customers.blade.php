<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Customers - Animal Access Veterinary Clinic</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <style>

        /* =========================
           CUSTOMERS PAGE
        ========================= */

        .customers-page {
            background: #ffffff;
        }


        .customers-page .page-content {
            padding-top: 18px;
        }


        /* =========================
           SEARCH
        ========================= */

        .customer-search-wrapper {
            margin-top: 18px;
            margin-bottom: 24px;
        }


        .customer-search-wrapper input {
            width: 100%;
            height: 42px;
            box-sizing: border-box;
            border: 1px solid #d9e8e8;
            border-radius: 8px;
            padding: 0 16px 0 42px;
            font-size: 12px;
            color: #304848;
            outline: none;
            background: #ffffff;
        }


        .customer-search-wrapper input:focus {
            border-color: #71cccc;
        }


        .customer-search-box {
            position: relative;
        }


        .customer-search-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 15px;
        }


        /* =========================
           CUSTOMER TABLE
        ========================= */

        .customer-table-wrapper {
            width: 100%;
            overflow-x: auto;
            border: 1px solid #d7eeee;
            border-radius: 14px;
            background: #ffffff;
        }


        .customer-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 950px;
        }


        .customer-table thead {
            background: #fafcfc;
        }


        .customer-table th {
            padding: 15px 20px;
            text-align: left;
            font-size: 10px;
            font-weight: 600;
            color: #829292;
            letter-spacing: 0.3px;
            text-transform: uppercase;
            border-bottom: 1px solid #e5eeee;
        }


        .customer-table td {
            padding: 15px 20px;
            border-bottom: 1px solid #edf2f2;
            vertical-align: middle;
            font-size: 12px;
            color: #526565;
        }


        .customer-table tbody tr:last-child td {
            border-bottom: none;
        }


        .customer-table tbody tr:hover {
            background: #fbfefe;
        }


        /* =========================
           CLIENT
        ========================= */

        .client-cell {
            display: flex;
            align-items: center;
            gap: 11px;
            min-width: 175px;
        }


        .client-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #116f70;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: 700;
            flex-shrink: 0;
        }


        .client-name {
            font-size: 13px;
            font-weight: 600;
            color: #172f30;
        }


        .client-id {
            display: block;
            margin-top: 3px;
            font-size: 10px;
            color: #8a9a9a;
        }


        /* =========================
           CONTACT
        ========================= */

        .contact-phone {
            color: #304848;
            font-size: 12px;
            white-space: nowrap;
        }


        .contact-email {
            display: block;
            margin-top: 4px;
            color: #8a9999;
            font-size: 10px;
        }


        /* =========================
           PET TAGS
        ========================= */

        .pet-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            min-width: 70px;
        }


        .pet-tag {
            display: inline-flex;
            align-items: center;
            padding: 4px 9px;
            border: 1px solid #f0c95d;
            border-radius: 20px;
            background: #fffdf4;
            color: #8a6500;
            font-size: 10px;
            white-space: nowrap;
        }


        .no-pets {
            color: #a0aaaa;
            font-size: 11px;
        }


        /* =========================
           ADDRESS
        ========================= */

        .customer-address {
            max-width: 190px;
            line-height: 1.4;
            color: #526565;
        }


        /* =========================
           MEMBER SINCE
        ========================= */

        .member-date {
            white-space: nowrap;
            color: #526565;
        }


        /* =========================
           VISITS
        ========================= */

        .visit-count {
            font-size: 13px;
            font-weight: 700;
            color: #116f70;
        }


        /* =========================
           ACTIONS
        ========================= */

        .customer-actions {
            white-space: nowrap;
        }


        .profile-action,
        .customer-edit-action {
            color: #087373;
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
        }


        .profile-action:hover,
        .customer-edit-action:hover {
            text-decoration: underline;
        }


        .customer-action-divider {
            margin: 0 7px;
            color: #c7d1d1;
        }


        /* =========================
           EMPTY
        ========================= */

        .customer-empty {
            text-align: center;
            padding: 45px !important;
            color: #8a9999 !important;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .customer-table-wrapper {
                overflow-x: auto;
            }

        }

    </style>

</head>


<body class="customers-page">


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

                <h2>
                    Animal Access
                </h2>

                <span>
                    Veterinary Clinic
                </span>

            </div>

        </div>


        <nav>

            <a href="/dashboard">

                <span>▣</span>

                Dashboard

            </a>


            <a href="/appointments">

                <span>▦</span>

                Appointments

            </a>


            <a href="/grooming">

                <span>✂</span>

                Grooming

            </a>


            <a href="/pets">

                <span>🐾</span>

                Pet Records

            </a>


            <a
                href="/customers"
                class="active"
            >

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



    <!-- MAIN CONTENT -->

    <main class="main-content">


        <!-- TOPBAR -->

        <header class="topbar">

            <h3>
                Customers
            </h3>


           <div class="top-right">

    <x-notification />

    <button
        type="button"
        class="signout"
        id="topSignoutBtn"
    >
        Sign out
    </button>

</div>
        </header>



        <!-- PAGE CONTENT -->

        <section class="page-content">


            <!-- PAGE TITLE -->

            <div class="section-title">

                <div>

                    <h1>
                        Customers
                    </h1>

                    <p>
                        {{ now()->format('F j, Y') }}
                        —
                        {{ $customers->count() }} registered customers
                    </p>

                </div>


                <button
                    type="button"
                    class="primary-btn"
                    id="addCustomerBtn"
                >
                    + New Customer
                </button>

            </div>



            <!-- SEARCH -->

            <div class="customer-search-wrapper">

                <div class="customer-search-box">

                    <span class="customer-search-icon">
                        🔍
                    </span>

                    <input
                        type="text"
                        id="customerSearch"
                        placeholder="Search by name or email..."
                    >

                </div>

            </div>



            <!-- CUSTOMER TABLE -->

            <div class="customer-table-wrapper">

                <table class="customer-table">


                    <thead>

                        <tr>

                            <th>
                                Client
                            </th>

                            <th>
                                Contact
                            </th>

                            <th>
                                Pets
                            </th>

                            <th>
                                Address
                            </th>

                            <th>
                                Member Since
                            </th>

                            <th>
                                Visits
                            </th>

                            <th>
                                Actions
                            </th>

                        </tr>

                    </thead>



                    <tbody id="customerTableBody">


                        @forelse($customers as $customer)


                            <tr
                                class="customer-row"
                                data-search="{{ strtolower(
                                    $customer->customer_name . ' ' .
                                    ($customer->email ?? '')
                                ) }}"
                            >


                                <!-- CLIENT -->

                                <td>

                                    <div class="client-cell">


                                        <div class="client-avatar">

                                            {{ strtoupper(
                                                substr(
                                                    $customer->customer_name,
                                                    0,
                                                    1
                                                )
                                            ) }}

                                        </div>


                                        <div>

                                            <div class="client-name">

                                                {{ $customer->customer_name }}

                                            </div>


                                            <span class="client-id">

                                                C-{{ str_pad(
                                                    $customer->id,
                                                    3,
                                                    '0',
                                                    STR_PAD_LEFT
                                                ) }}

                                            </span>

                                        </div>

                                    </div>

                                </td>



                                <!-- CONTACT -->

                                <td>

                                    <span class="contact-phone">

                                        {{ $customer->phone }}

                                    </span>


                                    @if($customer->email)

                                        <span class="contact-email">

                                            {{ $customer->email }}

                                        </span>

                                    @endif

                                </td>



                                <!-- PETS -->

                                <td>

                                    <div class="pet-tags">


                                        @forelse($customer->pet_list as $pet)

                                            <span class="pet-tag">

                                                {{ $pet->pet_name }}

                                            </span>

                                        @empty

                                            <span class="no-pets">
                                                No pets
                                            </span>

                                        @endforelse


                                    </div>

                                </td>



                                <!-- ADDRESS -->

                                <td>

                                    <div class="customer-address">

                                        {{ $customer->address ?? '—' }}

                                    </div>

                                </td>



                                <!-- MEMBER SINCE -->

                                <td>

                                    <span class="member-date">

                                        {{ $customer->created_at
                                            ? $customer->created_at->format('M Y')
                                            : '—'
                                        }}

                                    </span>

                                </td>



                                <!-- VISITS -->

                                <td>

                                    <span class="visit-count">

                                        {{ $customer->visit_count }}

                                    </span>

                                </td>



                                <!-- ACTIONS -->

                                <td>

                                    <div class="customer-actions">


                                        <a
                                            href="{{ route('customers.edit', $customer->id) }}"
                                            class="profile-action"
                                        >
                                            Profile
                                        </a>


                                        <span class="customer-action-divider">
                                            |
                                        </span>


                                        <a
                                            href="{{ route('customers.edit', $customer->id) }}"
                                            class="customer-edit-action"
                                        >
                                            Edit
                                        </a>

                                    </div>

                                </td>

                            </tr>


                        @empty


                            <tr>

                                <td
                                    colspan="7"
                                    class="customer-empty"
                                >
                                    No customers found.
                                </td>

                            </tr>


                        @endforelse


                    </tbody>

                </table>

            </div>

        </section>

    </main>



    <!-- ADD CUSTOMER MODAL -->

    <div
        class="modal"
        id="customerModal"
    >

        <div class="modal-content">


            <div class="modal-header">

                <h2>
                    New Customer
                </h2>


                <button
                    type="button"
                    id="closeCustomerModal"
                >
                    ×
                </button>

            </div>



            <form
                method="POST"
                action="{{ route('customers.store') }}"
            >

                @csrf


                <label>
                    Customer Name
                </label>

                <input
                    type="text"
                    name="customer_name"
                    placeholder="Enter customer name"
                    required
                >


                <label>
                    Phone
                </label>

                <input
                    type="text"
                    name="phone"
                    placeholder="Enter phone number"
                    required
                >


                <label>
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    placeholder="Enter email address"
                >


                <label>
                    Address
                </label>

                <textarea
                    name="address"
                    placeholder="Enter customer address"
                    rows="3"
                ></textarea>


                <button
                    type="submit"
                    class="primary-btn"
                >
                    Save Customer
                </button>

            </form>

        </div>

    </div>



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



    <!-- CUSTOMER SEARCH + MODAL SCRIPT -->

    <script>

        document.addEventListener('DOMContentLoaded', function () {


            /* =========================
               CUSTOMER SEARCH
            ========================= */

            const customerSearch =
                document.getElementById('customerSearch');

            const customerRows =
                document.querySelectorAll('.customer-row');


            if (customerSearch) {

                customerSearch.addEventListener('input', function () {

                    const searchValue =
                        this.value.toLowerCase().trim();


                    customerRows.forEach(function (row) {

                        const searchText =
                            row.dataset.search || '';


                        if (searchText.includes(searchValue)) {

                            row.style.display = '';

                        } else {

                            row.style.display = 'none';

                        }

                    });

                });

            }



            /* =========================
               NEW CUSTOMER MODAL
            ========================= */

            const addCustomerBtn =
                document.getElementById('addCustomerBtn');

            const customerModal =
                document.getElementById('customerModal');

            const closeCustomerModal =
                document.getElementById('closeCustomerModal');


            if (addCustomerBtn && customerModal) {

                addCustomerBtn.addEventListener('click', function () {

                    customerModal.classList.add('show');

                });

            }


            if (closeCustomerModal && customerModal) {

                closeCustomerModal.addEventListener('click', function () {

                    customerModal.classList.remove('show');

                });

            }


            if (customerModal) {

                customerModal.addEventListener('click', function (event) {

                    if (event.target === customerModal) {

                        customerModal.classList.remove('show');

                    }

                });

            }



            /* =========================
               LOGOUT MODAL
            ========================= */

            const logoutPowerBtn =
                document.getElementById('logoutPowerBtn');

            const logoutModal =
                document.getElementById('logoutModal');

            const logoutCancelBtn =
                document.getElementById('logoutCancelBtn');


            if (logoutPowerBtn && logoutModal) {

                logoutPowerBtn.addEventListener('click', function () {

                    logoutModal.classList.add('show');

                });

            }


            if (logoutCancelBtn && logoutModal) {

                logoutCancelBtn.addEventListener('click', function () {

                    logoutModal.classList.remove('show');

                });

            }


            if (logoutModal) {

                logoutModal.addEventListener('click', function (event) {

                    if (event.target === logoutModal) {

                        logoutModal.classList.remove('show');

                    }

                });

            }

        });

    </script>


</body>

</html>