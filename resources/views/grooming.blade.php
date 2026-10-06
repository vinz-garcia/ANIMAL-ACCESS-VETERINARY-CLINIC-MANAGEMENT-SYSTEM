<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Grooming - Animal Access Veterinary Clinic</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        /* =====================================================
           GROOMING PAGE
        ===================================================== */

        body {
            background: #faf9f6 !important;
        }


        /* =====================================================
           GROOMING CARD GRID
        ===================================================== */

        .grooming-card-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
            margin-top: 20px;
        }

        .grooming-card {
            background: #ffffff;
            border: 1px solid #dceeee;
            border-radius: 14px;
            padding: 20px;
            box-shadow: none;
            transition: 0.2s ease;
        }

        .grooming-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 18px rgba(0, 50, 50, 0.06);
        }


        /* =====================================================
           CARD HEADER
        ===================================================== */

        .grooming-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 14px;
        }

        .grooming-main-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .grooming-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #fff3c9;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .grooming-pet-name {
            font-size: 16px;
            font-weight: 700;
            color: #1f3333;
            margin: 0;
        }

        .grooming-owner {
            font-size: 12px;
            color: #758585;
            margin-top: 3px;
        }

        .grooming-id {
            display: none;
        }


        /* =====================================================
           STATUS BADGES
        ===================================================== */

        .grooming-status {
            padding: 5px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: capitalize;
            white-space: nowrap;
        }

        .grooming-status.confirmed {
            background: #d9f4f4;
            color: #087373;
        }

        .grooming-status.pending {
            background: #fff0c4;
            color: #a86b00;
        }

        .grooming-status.cancelled {
            background: #fde7e7;
            color: #c43d3d;
        }

        .grooming-status.in-progress {
            background: #dcecff;
            color: #3974c8;
        }

        .grooming-status.completed {
            background: #e4f4e8;
            color: #3f8f5f;
        }


        /* =====================================================
           CARD DETAILS
        ===================================================== */

        .grooming-details {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 12px;
            padding: 16px 0;
            border-top: 1px solid #eeeeee;
            border-bottom: 1px solid #eeeeee;
        }

        .grooming-detail {
            display: flex;
            flex-direction: column;
            gap: 4px;
            min-width: 0;
        }

        .grooming-detail-label {
            font-size: 10px;
            color: #999999;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .grooming-detail-value {
            font-size: 13px;
            font-weight: 600;
            color: #333333;
            overflow-wrap: break-word;
        }


        /* =====================================================
           CARD ACTIONS
        ===================================================== */

        .grooming-card-actions {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 14px;
        }

        .grooming-edit-btn,
        .grooming-checkin-btn,
        .grooming-complete-btn {
            height: 32px;
            padding: 0 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 7px;
            box-sizing: border-box;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
        }

        .grooming-edit-btn {
            border: 1px solid #72d4d4;
            background: #ffffff;
            color: #087373;
        }

        .grooming-edit-btn:hover {
            background: #effafa;
        }

        .grooming-checkin-btn {
            border: 1px solid #087373;
            background: #087373;
            color: #ffffff;
        }

        .grooming-checkin-btn:hover {
            background: #075f5f;
        }

        .grooming-complete-btn {
            border: 1px solid #72b88a;
            background: #3f8f5f;
            color: #ffffff;
        }

        .grooming-complete-btn:hover {
            background: #34794e;
        }

        .grooming-completed-label {
            font-size: 11px;
            font-weight: 600;
            color: #3f8f5f;
        }


        /* =====================================================
           EMPTY
        ===================================================== */

        .grooming-empty {
            grid-column: 1 / -1;
            text-align: center;
            padding: 50px 20px;
            background: #ffffff;
            border-radius: 14px;
            border: 1px solid #dceeee;
            color: #888888;
        }


        /* =====================================================
           GROOMING BANNER
        ===================================================== */

        .grooming-banner {
            width: 100%;
            height: 145px;
            margin-top: 25px;
            border-radius: 15px;
            overflow: hidden;
            position: relative;

            background:
                linear-gradient(
                    90deg,
                    rgba(20, 60, 60, 0.92) 0%,
                    rgba(20, 60, 60, 0.62) 45%,
                    rgba(20, 60, 60, 0.08) 100%
                ),
                url("{{ asset('images/welcome-banner.jpg') }}");

            background-size: cover;
            background-position: center;
        }

        .grooming-banner-content {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 0 32px;
        }

        .grooming-banner-title {
            margin: 0;
            color: white;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 20px;
            font-weight: 600;
        }

        .grooming-banner-text {
            margin: 7px 0 0;
            color: #aee8e3;
            font-size: 13px;
            font-weight: 500;
        }


        /* =====================================================
           PAGE TITLE
        ===================================================== */

        body:not(.dashboard-page) .section-title {
            margin-bottom: 0 !important;
        }

        body:not(.dashboard-page) .section-title h1 {
            font-family: Georgia, "Times New Roman", serif !important;
            font-size: 28px !important;
            color: #123d3d !important;
        }


        /* =====================================================
           BOOK GROOMING BUTTON
        ===================================================== */

        .grooming-new-btn {
            background: #f8a008 !important;
            color: white !important;
            border: none !important;
            border-radius: 8px !important;
            padding: 13px 20px !important;
            font-size: 13px !important;
            font-weight: 700 !important;
            cursor: pointer !important;
        }

        .grooming-new-btn:hover {
            background: #e99000 !important;
        }


        /* =====================================================
           GROOMING STATUS TABS
        ===================================================== */

        .grooming-status-tabs {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 25px;
            margin-bottom: 14px;
        }

        .grooming-tab {
            border: 1px solid #d9e5e5;
            background: #ffffff;
            color: #666666;
            padding: 8px 16px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .grooming-tab:hover {
            background: #effafa;
            color: #087373;
        }

        .grooming-tab.active {
            background: #087373;
            border-color: #087373;
            color: #ffffff;
        }


        /* =====================================================
           SEARCH
        ===================================================== */

        .grooming-search-tools {
            margin-bottom: 18px;
        }

        #groomingSearch {
            width: 100%;
            max-width: 430px;
            height: 43px;
            padding: 0 15px;
            box-sizing: border-box;
            border: 1px solid #d9e2e2;
            border-radius: 8px;
            background: white;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
            outline: none;
        }

        #groomingSearch:focus {
            border-color: #69aaa8;
        }


        /* =====================================================
           BOOK GROOMING MODAL
        ===================================================== */

        #groomingModal {
            position: fixed !important;
            inset: 0 !important;
            display: none !important;
            align-items: center !important;
            justify-content: center !important;
            background: rgba(15, 45, 45, 0.38) !important;
            backdrop-filter: blur(5px) !important;
            z-index: 4000 !important;
        }

        #groomingModal.show {
            display: flex !important;
        }

        #groomingModal .modal-content {
            width: 512px !important;
            max-width: calc(100% - 40px) !important;
            max-height: calc(100vh - 40px) !important;
            background: #ffffff !important;
            border-radius: 16px !important;
            overflow: hidden !important;
            padding: 0 !important;
            box-shadow: 0 20px 50px rgba(0, 50, 50, 0.18) !important;
        }

        #groomingModal .modal-header {
            height: 73px !important;
            padding: 0 24px !important;
            margin: 0 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            border-bottom: 1px solid #edf1f1 !important;
        }

        #groomingModal .modal-header h2 {
            margin: 0 !important;
            color: #123d3d !important;
            font-family: Georgia, "Times New Roman", serif !important;
            font-size: 20px !important;
            font-weight: 600 !important;
        }

        #groomingModal .modal-header button {
            width: 30px !important;
            height: 30px !important;
            border: none !important;
            background: transparent !important;
            color: #8ca0a0 !important;
            font-size: 19px !important;
            cursor: pointer !important;
        }

        #groomingModal form {
            padding: 20px 24px !important;
        }

        #groomingModal form label {
            display: block !important;
            margin-bottom: 7px !important;
            color: #718080 !important;
            font-size: 11px !important;
            font-weight: 700 !important;
        }

        #groomingModal form input,
        #groomingModal form select {
            width: 100% !important;
            height: 39px !important;
            padding: 0 12px !important;
            box-sizing: border-box !important;
            border: 1px solid #dbe3e3 !important;
            border-radius: 7px !important;
            background: #ffffff !important;
            color: #253b3b !important;
            font-family: Arial, Helvetica, sans-serif !important;
            font-size: 13px !important;
            outline: none !important;
            margin-bottom: 16px !important;
        }

        #groomingModal form input::placeholder {
            color: #a1aaaa !important;
        }

        #groomingModal form input:focus,
        #groomingModal form select:focus {
            border-color: #56aaa7 !important;
            box-shadow: 0 0 0 2px rgba(15, 119, 119, 0.08) !important;
        }

        .grooming-modal-row {
            display: grid !important;
            grid-template-columns: 1fr 1fr !important;
            gap: 16px !important;
        }

        .grooming-modal-actions {
            display: grid !important;
            grid-template-columns: 1fr 1fr !important;
            gap: 12px !important;
            margin-top: 2px !important;
        }

        .grooming-cancel-btn,
        .grooming-book-btn {
            height: 42px !important;
            border-radius: 7px !important;
            font-family: Arial, Helvetica, sans-serif !important;
            font-size: 13px !important;
            font-weight: 600 !important;
            cursor: pointer !important;
        }

        .grooming-cancel-btn {
            border: 1px solid #dbe3e3 !important;
            background: white !important;
            color: #657777 !important;
        }

        .grooming-book-btn {
            border: none !important;
            background: #f8a008 !important;
            color: white !important;
        }

        .grooming-book-btn:hover {
            background: #e99000 !important;
        }


        /* =====================================================
           CHECK-IN CONFIRMATION MODAL
        ===================================================== */

        #checkinModal {
            position: fixed;
            inset: 0;
            display: none;
            align-items: center;
            justify-content: center;
            background: rgba(15, 45, 45, 0.38);
            backdrop-filter: blur(5px);
            z-index: 5000;
        }

        #checkinModal.show {
            display: flex;
        }

        .checkin-modal-box {
            width: 420px;
            max-width: calc(100% - 32px);
            background: #ffffff;
            border-radius: 14px;
            padding: 24px;
            box-sizing: border-box;
            box-shadow: 0 20px 50px rgba(0, 50, 50, 0.18);
        }

        .checkin-modal-box h3 {
            margin: 0 0 12px;
            color: #123d3d;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 20px;
            font-weight: 600;
        }

        .checkin-modal-box p {
            margin: 0;
            color: #555555;
            font-size: 14px;
            line-height: 1.6;
        }

        .checkin-modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 22px;
        }

        .checkin-cancel-btn,
        .checkin-confirm-btn {
            height: 38px;
            padding: 0 16px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        .checkin-cancel-btn {
            border: 1px solid #dbe3e3;
            background: #ffffff;
            color: #657777;
        }

        .checkin-cancel-btn:hover {
            background: #f5f5f5;
        }

        .checkin-confirm-btn {
            border: 1px solid #087373;
            background: #087373;
            color: #ffffff;
        }

        .checkin-confirm-btn:hover {
            background: #075f5f;
        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 900px) {

            .grooming-card-grid {
                grid-template-columns: 1fr;
            }

            .grooming-details {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

        }


        @media (max-width: 600px) {

            .grooming-details {
                grid-template-columns: 1fr 1fr;
            }

            .grooming-status-tabs {
                flex-wrap: wrap;
            }

            .grooming-modal-row {
                grid-template-columns: 1fr !important;
                gap: 0 !important;
            }

            .grooming-modal-actions {
                grid-template-columns: 1fr !important;
            }

            #groomingModal .modal-content {
                width: calc(100% - 24px) !important;
                max-width: none !important;
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

                <span>
                    Veterinary Clinic
                </span>

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


        <!-- =================================================
             PAGE CONTENT
        ================================================== -->

        <section class="page-content">


            <!-- PAGE TITLE -->

            <div class="section-title">

                <div>

                    <h1>
                        Grooming Schedule
                    </h1>

                    <p>
                        {{ now()->format('F j, Y') }}
                        — {{ $groomings->count() }} sessions
                    </p>

                </div>

                <button
                    type="button"
                    class="grooming-new-btn"
                    id="addGroomingBtn"
                >
                    + Book Session
                </button>

            </div>


            <!-- =================================================
                 GROOMING BANNER
            ================================================== -->

            <div class="grooming-banner">

                <div class="grooming-banner-content">

                    <h2 class="grooming-banner-title">
                        {{ $groomings->count() }} grooming sessions today
                    </h2>

                    <p class="grooming-banner-text">
                        Ate Liza &amp; Kuya Ben — Operating 8:00 AM – 5:00 PM
                    </p>

                </div>

            </div>


            <!-- =================================================
                 STATUS TABS
            ================================================== -->

            <div class="grooming-status-tabs">

                <button
                    type="button"
                    class="grooming-tab active"
                    data-status="all"
                >
                    All
                </button>

                <button
                    type="button"
                    class="grooming-tab"
                    data-status="pending"
                >
                    Pending
                </button>

                <button
                    type="button"
                    class="grooming-tab"
                    data-status="in progress"
                >
                    In Progress
                </button>

                <button
                    type="button"
                    class="grooming-tab"
                    data-status="completed"
                >
                    Completed
                </button>

            </div>


            <!-- =================================================
                 SEARCH
            ================================================== -->

            <div class="grooming-search-tools">

                <input
                    type="text"
                    id="groomingSearch"
                    placeholder="🔍 Search pet or customer..."
                >

            </div>


            <!-- =================================================
                 GROOMING CARDS
            ================================================== -->

            <div
                class="grooming-card-grid"
                id="groomingTableBody"
            >

                @forelse($groomings as $grooming)

                    <div
                        class="grooming-card"
                        data-status="{{ strtolower($grooming->status) }}"
                        data-search="{{ strtolower(
                            $grooming->pet_name . ' ' .
                            $grooming->customer_name . ' ' .
                            $grooming->grooming_service . ' ' .
                            ($grooming->groomer ?? '')
                        ) }}"
                    >


                        <!-- CARD HEADER -->

                        <div class="grooming-card-header">

                            <div class="grooming-main-info">

                                <div class="grooming-icon">
                                    ✂️
                                </div>

                                <div>

                                    <h3 class="grooming-pet-name">
                                        {{ $grooming->pet_name }}
                                    </h3>

                                    <div class="grooming-owner">
                                        {{ $grooming->customer_name }}
                                    </div>

                                    <div class="grooming-id">
                                        G-{{
                                            str_pad(
                                                $grooming->id,
                                                4,
                                                '0',
                                                STR_PAD_LEFT
                                            )
                                        }}
                                    </div>

                                </div>

                            </div>


                            <!-- STATUS BADGE -->

                            <span
                                class="grooming-status {{ strtolower(str_replace(' ', '-', $grooming->status)) }}"
                            >
                                {{ $grooming->status }}
                            </span>

                        </div>


                        <!-- DETAILS -->

                        <div class="grooming-details">

                            <div class="grooming-detail">

                                <span class="grooming-detail-label">
                                    TIME
                                </span>

                                <span class="grooming-detail-value">

                                    {{
                                        \Carbon\Carbon::parse(
                                            $grooming->grooming_time
                                        )->format('g:i A')
                                    }}

                                </span>

                            </div>


                            <div class="grooming-detail">

                                <span class="grooming-detail-label">
                                    SERVICE
                                </span>

                                <span class="grooming-detail-value">
                                    {{ $grooming->grooming_service }}
                                </span>

                            </div>


                            <div class="grooming-detail">

                                <span class="grooming-detail-label">
                                    GROOMER
                                </span>

                                <span class="grooming-detail-value">
                                    {{ $grooming->groomer ?: 'Not assigned' }}
                                </span>

                            </div>


                            <div class="grooming-detail">

                                <span class="grooming-detail-label">
                                    DATE
                                </span>

                                <span class="grooming-detail-value">

                                    {{
                                        \Carbon\Carbon::parse(
                                            $grooming->grooming_date
                                        )->format('M j, Y')
                                    }}

                                </span>

                            </div>

                        </div>


                        <!-- =================================================
                             ACTIONS
                        ================================================== -->

                        <div class="grooming-card-actions">

                            <a
                                href="{{ route('grooming.edit', $grooming->id) }}"
                                class="grooming-edit-btn"
                            >
                                Edit
                            </a>


                            @if(
                                strtolower($grooming->status) === 'pending' ||
                                strtolower($grooming->status) === 'confirmed'
                            )

                                <button
                                    type="button"
                                    class="grooming-checkin-btn"
                                    onclick="openCheckinModal(
                                        {{ $grooming->id }},
                                        @js($grooming->pet_name),
                                        @js($grooming->grooming_service),
                                        @js($grooming->groomer ?: 'Not assigned')
                                    )"
                                >
                                    Check-in
                                </button>


                            @elseif(strtolower($grooming->status) === 'in progress')

                                <form
                                    action="{{ route('grooming.status', $grooming->id) }}"
                                    method="POST"
                                    style="margin: 0;"
                                >

                                    @csrf
                                    @method('PATCH')

                                    <input
                                        type="hidden"
                                        name="status"
                                        value="Completed"
                                    >

                                    <button
                                        type="submit"
                                        class="grooming-complete-btn"
                                    >
                                        Done
                                    </button>

                                </form>


                            @elseif(strtolower($grooming->status) === 'completed')

                                <span class="grooming-completed-label">
                                    ✓ Completed
                                </span>

                            @endif

                        </div>

                    </div>


                @empty

                    <div class="grooming-empty">
                        No grooming appointments found.
                    </div>

                @endforelse

            </div>

        </section>

    </main>


    <!-- =====================================================
         BOOK GROOMING SESSION MODAL
    ====================================================== -->

    <div
        class="modal"
        id="groomingModal"
    >

        <div class="modal-content">


            <div class="modal-header">

                <h2>
                    Book Grooming Session
                </h2>

                <button
                    type="button"
                    id="closeGroomingModal"
                >
                    ×
                </button>

            </div>


            <form
                method="POST"
                action="{{ route('grooming.store') }}"
            >

                @csrf


                <!-- PET OWNER -->

                <label>
                    PET OWNER
                </label>

                <input
                    type="text"
                    name="customer_name"
                    placeholder="Select owner ..."
                    required
                >


                <!-- PET NAME -->

                <label>
                    PET NAME
                </label>

                <input
                    type="text"
                    name="pet_name"
                    placeholder="e.g. Coco"
                    required
                >


                <!-- SERVICE + GROOMER -->

                <div class="grooming-modal-row">

                    <div>

                        <label>
                            SERVICE
                        </label>

                        <select
                            name="grooming_service"
                            required
                        >

                            <option value="Full Grooming">
                                Full Grooming
                            </option>

                            <option value="Basic Grooming">
                                Basic Grooming
                            </option>

                            <option value="Bath & Blow Dry">
                                Bath &amp; Blow Dry
                            </option>

                            <option value="Nail Trimming">
                                Nail Trimming
                            </option>

                            <option value="Haircut">
                                Haircut
                            </option>

                        </select>

                    </div>


                    <div>

                        <label>
                            GROOMER
                        </label>

                        <select
                            name="groomer"
                            required
                        >

                            <option value="">
                                Select Groomer
                            </option>

                            <option value="Ate Liza">
                                Ate Liza
                            </option>

                            <option value="Kuya Ben">
                                Kuya Ben
                            </option>

                        </select>

                    </div>

                </div>


                <!-- TIME + DURATION -->

                <div class="grooming-modal-row">

                    <div>

                        <label>
                            TIME
                        </label>

                        <select
                            name="grooming_time"
                            required
                        >

                            <option value="08:00">
                                8:00 AM
                            </option>

                            <option value="09:00">
                                9:00 AM
                            </option>

                            <option value="10:00">
                                10:00 AM
                            </option>

                            <option value="11:00">
                                11:00 AM
                            </option>

                            <option value="13:00">
                                1:00 PM
                            </option>

                            <option value="14:00">
                                2:00 PM
                            </option>

                            <option value="15:00">
                                3:00 PM
                            </option>

                            <option value="16:00">
                                4:00 PM
                            </option>

                        </select>

                    </div>


                    <div>

                        <label>
                            DURATION
                        </label>

                        <select>

                            <option>
                                20 min
                            </option>

                            <option>
                                15 min
                            </option>

                            <option>
                                60 min
                            </option>

                            <option>
                                30 min
                            </option>

                            <option>
                                90 min
                            </option>

                            <option>
                                120 min
                            </option>

                        </select>

                    </div>

                </div>


                <!-- DATE -->

                <input
                    type="hidden"
                    name="grooming_date"
                    value="{{ now()->format('Y-m-d') }}"
                >


                <!-- BUTTONS -->

                <div class="grooming-modal-actions">

                    <button
                        type="button"
                        class="grooming-cancel-btn"
                        id="groomingCancelBtn"
                    >
                        Cancel
                    </button>


                    <button
                        type="submit"
                        class="grooming-book-btn"
                    >
                        Book Session
                    </button>

                </div>

            </form>

        </div>

    </div>


    <!-- =====================================================
         CHECK-IN CONFIRMATION MODAL
    ====================================================== -->

    <div
        id="checkinModal"
        class="checkin-modal"
    >

        <div class="checkin-modal-box">

            <h3>
                Confirm Check-in
            </h3>

            <p id="checkinMessage"></p>


            <div class="checkin-modal-actions">

                <button
                    type="button"
                    class="checkin-cancel-btn"
                    onclick="closeCheckinModal()"
                >
                    Cancel
                </button>


                <form
                    id="checkinForm"
                    method="POST"
                    style="margin: 0;"
                >

                    @csrf
                    @method('PATCH')

                    <input
                        type="hidden"
                        name="status"
                        value="In Progress"
                    >

                    <button
                        type="submit"
                        class="checkin-confirm-btn"
                    >
                        Confirm Check-in
                    </button>

                </form>

            </div>

        </div>

    </div>


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


    <!-- =====================================================
         JAVASCRIPT
    ====================================================== -->

    <script>

        document.addEventListener('DOMContentLoaded', function () {


            /* =================================================
               BOOK GROOMING MODAL
            ================================================= */

            const addGroomingBtn =
                document.getElementById('addGroomingBtn');

            const groomingModal =
                document.getElementById('groomingModal');

            const closeGroomingModal =
                document.getElementById('closeGroomingModal');

            const groomingCancelBtn =
                document.getElementById('groomingCancelBtn');


            if (addGroomingBtn && groomingModal) {

                addGroomingBtn.addEventListener(
                    'click',
                    function () {

                        groomingModal.classList.add('show');

                    }
                );

            }


            if (closeGroomingModal && groomingModal) {

                closeGroomingModal.addEventListener(
                    'click',
                    function () {

                        groomingModal.classList.remove('show');

                    }
                );

            }


            if (groomingCancelBtn && groomingModal) {

                groomingCancelBtn.addEventListener(
                    'click',
                    function () {

                        groomingModal.classList.remove('show');

                    }
                );

            }


            /* =================================================
               STATUS TABS + SEARCH
            ================================================= */

            const tabs =
                document.querySelectorAll('.grooming-tab');

            const cards =
                document.querySelectorAll('.grooming-card');

            const searchInput =
                document.getElementById('groomingSearch');


            let selectedStatus = 'all';


            function filterGroomingCards() {

                const searchValue =
                    searchInput
                        ? searchInput.value.toLowerCase().trim()
                        : '';


                cards.forEach(function (card) {

                    const cardStatus =
                        (card.dataset.status || '').toLowerCase();

                    const cardSearch =
                        (card.dataset.search || '').toLowerCase();


                    const statusMatch =
                        selectedStatus === 'all' ||
                        cardStatus === selectedStatus;


                    const searchMatch =
                        cardSearch.includes(searchValue);


                    if (statusMatch && searchMatch) {

                        card.style.display = '';

                    } else {

                        card.style.display = 'none';

                    }

                });

            }


            tabs.forEach(function (tab) {

                tab.addEventListener(
                    'click',
                    function () {

                        tabs.forEach(function (item) {

                            item.classList.remove('active');

                        });


                        tab.classList.add('active');


                        selectedStatus =
                            tab.dataset.status.toLowerCase();


                        filterGroomingCards();

                    }
                );

            });


            if (searchInput) {

                searchInput.addEventListener(
                    'input',
                    function () {

                        filterGroomingCards();

                    }
                );

            }

        });


        /* =====================================================
           CHECK-IN CONFIRMATION
        ===================================================== */

        function openCheckinModal(
            id,
            petName,
            service,
            groomer
        ) {

            const modal =
                document.getElementById('checkinModal');

            const message =
                document.getElementById('checkinMessage');

            const form =
                document.getElementById('checkinForm');


            if (!modal || !message || !form) {
                return;
            }


            message.textContent =
                `Check in ${petName} for ${service} with ${groomer}?`;


            form.action =
                `/grooming/${id}/status`;


            modal.classList.add('show');

        }


        function closeCheckinModal() {

            const modal =
                document.getElementById('checkinModal');


            if (modal) {

                modal.classList.remove('show');

            }

        }


        /* =====================================================
           CLOSE CHECK-IN MODAL WHEN CLICKING OUTSIDE
        ===================================================== */

        document.addEventListener(
            'click',
            function (event) {

                const modal =
                    document.getElementById('checkinModal');


                if (
                    modal &&
                    event.target === modal
                ) {

                    closeCheckinModal();

                }

            }
        );

    </script>


</body>

</html>