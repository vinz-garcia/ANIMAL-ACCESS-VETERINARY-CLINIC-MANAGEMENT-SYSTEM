<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Pet Records - Animal Access Veterinary Clinic
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        /* =========================
           PET RECORDS
        ========================= */

        .pets-card-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-top: 20px;
        }


        .pet-card {
            position: relative;
            background: #ffffff;
            border: 1px solid #dceeee;
            border-radius: 14px;
            padding: 20px;
            overflow: hidden;
            transition: 0.2s ease;
        }


        .pet-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: #31b9b5;
        }


        .pet-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 18px rgba(0, 50, 50, 0.06);
        }


        /* =========================
           CARD HEADER
        ========================= */

        .pet-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 12px;
            margin-top: 2px;
            margin-bottom: 18px;
        }


        .pet-main-info {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
        }


        .pet-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #e7f7f7;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 21px;
            flex-shrink: 0;
        }


        .pet-name {
            margin: 0;

            font-size: 16px;
            font-weight: 700;
            color: #243838;
        }


        /* Breed under pet name */

        .pet-owner {
            display: block;

            margin-top: 3px;

            font-size: 11px;
            color: #728181;
        }


        .pet-status {
            padding: 5px 11px;

            border-radius: 20px;

            font-size: 10px;
            font-weight: 600;

            white-space: nowrap;
        }


        .pet-status.healthy {
            background: #d9f4e4;
            color: #27804b;
        }


        .pet-status.due-vaccine {
            background: #fff0c4;
            color: #a86b00;
        }


        .pet-status.under-treatment {
            background: #eee1ff;
            color: #8643bd;
        }


        /* =========================
           AGE / WEIGHT / SPECIES
        ========================= */

        .pet-basic-details {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;

            margin-bottom: 18px;
        }


        .pet-basic-box {
            background: #f7f9f9;
            border-radius: 9px;

            padding: 12px 10px;
        }


        .pet-basic-label {
            display: block;

            margin-bottom: 5px;

            color: #849494;

            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }


        .pet-basic-value {
            display: block;

            color: #243838;

            font-size: 12px;
            font-weight: 600;
        }


        /* =========================
           VACCINES
        ========================= */

        .pet-vaccines {
            padding-bottom: 16px;

            border-bottom: 1px solid #edf1f1;
        }


        .pet-section-label {
            display: block;

            margin-bottom: 8px;

            color: #849494;

            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }


        .vaccine-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }


        .vaccine-tag {
            display: inline-flex;
            align-items: center;

            padding: 5px 9px;

            border-radius: 15px;

            background: #eaf8f8;

            color: #087373;

            font-size: 10px;
        }


        .no-vaccine {
            color: #9aa7a7;
            font-size: 10px;
        }


        /* =========================
           OWNER / LAST VISIT
        ========================= */

        .pet-owner-visit {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;

            padding: 14px 0;

            border-bottom: 1px solid #edf1f1;
        }


        .pet-owner-column:last-child {
            text-align: right;
        }


        .pet-owner-column span {
            display: block;

            margin-bottom: 4px;

            color: #849494;

            font-size: 9px;
        }


        .pet-owner-column strong {
            display: block;

            color: #243838;

            font-size: 11px;

            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }


        /* =========================
           ACTIONS
        ========================= */

        .pet-card-actions {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 8px;

            margin-top: 14px;
        }


        .pet-view-btn,
        .pet-edit-btn {
            height: 34px;

            display: flex;
            align-items: center;
            justify-content: center;

            box-sizing: border-box;

            border-radius: 7px;

            font-size: 11px;
            font-weight: 600;

            cursor: pointer;

            text-decoration: none;
        }


        .pet-view-btn {
            width: 100%;

            border: 1px solid #72d4d4;

            background: #ffffff;

            color: #087373;
        }


        .pet-view-btn:hover {
            background: #effafa;
        }


        .pet-edit-btn {
            border: 1px solid #d9e2e2;

            background: #ffffff;

            color: #506565;
        }


        .pet-edit-btn:hover {
            background: #f7f9f9;
        }


        /* =========================
           EMPTY STATE
        ========================= */

        .empty-state {
            grid-column: 1 / -1;

            background: #ffffff;

            border: 1px solid #dceeee;

            border-radius: 14px;

            padding: 40px;

            text-align: center;

            color: #758585;
        }


        /* =========================
           VIEW RECORD MODAL
        ========================= */

        .pet-record-modal {
            position: fixed;

            inset: 0;

            z-index: 9999;

            display: none;

            align-items: center;
            justify-content: center;

            padding: 20px;

            box-sizing: border-box;

            background: rgba(5, 35, 35, 0.40);

            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
        }


        .pet-record-modal.show {
            display: flex;
        }


        .pet-record-modal-content {
            width: 100%;
            max-width: 650px;

            max-height: 90vh;

            overflow-y: auto;

            background: #ffffff;

            border-radius: 16px;

            box-shadow: 0 18px 50px rgba(0, 0, 0, 0.18);
        }


        .pet-record-header {
            height: 64px;

            padding: 0 24px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            box-sizing: border-box;

            border-bottom: 1px solid #edf1f1;
        }


        .pet-record-header h2 {
            margin: 0;

            color: #173636;

            font-family: Georgia, "Times New Roman", serif;

            font-size: 20px;
            font-weight: 600;
        }


        .pet-record-close {
            width: 28px;
            height: 28px;

            border: none;

            background: transparent;

            color: #8ca0a0;

            font-size: 20px;

            cursor: pointer;
        }


        .pet-record-close:hover {
            color: #174e4e;
        }


        /* =========================
           RECORD PET INFO
        ========================= */

        .pet-record-main {
            display: flex;
            align-items: center;

            gap: 14px;

            padding: 20px 24px;
        }


        .pet-record-icon {
            width: 58px;
            height: 58px;

            border-radius: 14px;

            background: #e7f7f7;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 30px;

            flex-shrink: 0;
        }


        .pet-record-main h3 {
            margin: 0 0 3px;

            color: #243838;

            font-size: 20px;
        }


        .pet-record-main p {
            margin: 0 0 7px;

            color: #718181;

            font-size: 12px;
        }


        .pet-record-status {
            display: inline-block;

            padding: 5px 10px;

            border-radius: 20px;

            background: #d9f4e4;

            color: #27804b;

            font-size: 10px;
        }


        /* =========================
           RECORD BASIC INFO
        ========================= */

        .pet-record-details {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 12px;

            padding: 0 24px 20px;
        }


        .pet-record-box {
            background: #f7f9f9;

            border-radius: 11px;

            padding: 16px;
        }


        .pet-record-box span {
            display: block;

            margin-bottom: 6px;

            color: #849494;

            font-size: 9px;
        }


        .pet-record-box strong {
            color: #243838;

            font-size: 14px;
        }


        /* =========================
           RECORD SECTIONS
        ========================= */

        .pet-record-section {
            padding: 0 24px 20px;
        }


        .pet-record-label {
            display: block;

            margin-bottom: 8px;

            color: #849494;

            font-size: 10px;
        }


        .pet-record-section > strong {
            color: #243838;

            font-size: 13px;
        }


        .clinical-notes-box {
            padding: 15px;

            border-radius: 11px;

            background: #f7f9f9;

            color: #334848;

            font-size: 12px;

            line-height: 1.6;
        }


        /* =========================
           RECORD FOOTER
        ========================= */

        .pet-record-footer {
            display: flex;
            align-items: center;

            gap: 4px;

            margin: 0 24px;

            padding: 15px 0;

            border-top: 1px solid #edf1f1;

            color: #718181;

            font-size: 11px;
        }


        .pet-record-footer strong {
            color: #243838;
        }


        .pet-record-close-bottom {
            margin-left: auto;

            border: none;

            background: transparent;

            color: #087373;

            font-size: 11px;
            font-weight: 600;

            cursor: pointer;
        }


        /* =========================
           NEW PET MODAL
        ========================= */

        #petModal .modal-content {
            max-height: 90vh;

            overflow-y: auto;
        }


        #petModal form {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 14px 16px;
        }


        #petModal label {
            display: block;

            margin: 0 0 6px;

            color: #718080;

            font-size: 10px;

            font-weight: 700;

            text-transform: uppercase;
        }


        #petModal input,
        #petModal select,
        #petModal textarea {
            width: 100%;

            min-height: 38px;

            padding: 0 11px;

            box-sizing: border-box;

            border: 1px solid #d9e2e2;

            border-radius: 7px;

            background: #ffffff;

            color: #263838;

            font-family: Arial, Helvetica, sans-serif;

            font-size: 12px;

            outline: none;
        }


        #petModal textarea {
            min-height: 90px;

            padding: 10px 11px;

            resize: vertical;
        }


        #petModal input:focus,
        #petModal select:focus,
        #petModal textarea:focus {
            border-color: #0f7777;

            box-shadow: 0 0 0 2px rgba(15, 119, 119, 0.08);
        }


        #petModal .full-width {
            grid-column: 1 / -1;
        }


        #petModal .primary-btn {
            grid-column: 1 / -1;

            margin-top: 5px;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1100px) {

            .pets-card-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

        }


        @media (max-width: 700px) {

            .pets-card-grid {
                grid-template-columns: 1fr;
            }


            .pet-record-details {
                grid-template-columns: 1fr;
            }


            #petModal form {
                grid-template-columns: 1fr;
            }


            #petModal .full-width,
            #petModal .primary-btn {
                grid-column: auto;
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


            <a
                href="/pets"
                class="active"
            >

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


    <!-- MAIN CONTENT -->

    <main class="main-content">


        <!-- TOPBAR -->

        <header class="topbar">

            <h3>
                Pet Records
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
                        Pet Records
                    </h1>

                    <p>
                        {{ now()->format('F j, Y') }}
                        —
                        {{ $pets->count() }} registered pets
                    </p>

                </div>


                <button
                    type="button"
                    class="primary-btn"
                    id="addPetBtn"
                >
                    + New Pet
                </button>

            </div>


            <!-- SEARCH -->

            <div class="appointment-tools">

                <input
                    type="text"
                    id="petSearch"
                    placeholder="🔍 Search pet or customer..."
                >

            </div>


            <!-- PET CARDS -->

            <div
                class="pets-card-grid"
                id="petTableBody"
            >

                @forelse($pets as $pet)

                    <div
                        class="pet-card"
                        data-search="{{ strtolower(
                            $pet->pet_name . ' ' .
                            $pet->customer_name . ' ' .
                            $pet->species . ' ' .
                            ($pet->breed ?? '')
                        ) }}"
                    >


                        <!-- CARD HEADER -->

                        <div class="pet-card-header">


                            <div class="pet-main-info">

                                <div class="pet-icon">

                                    @if(strtolower($pet->species) === 'dog')
                                        🐶
                                    @elseif(strtolower($pet->species) === 'cat')
                                        🐱
                                    @elseif(strtolower($pet->species) === 'rabbit')
                                        🐰
                                    @elseif(strtolower($pet->species) === 'bird')
                                        🐦
                                    @else
                                        🐾
                                    @endif

                                </div>


                                <div>

                                    <h3 class="pet-name">
                                        {{ $pet->pet_name }}
                                    </h3>


                                    <!-- BREED -->

                                    <span class="pet-owner">

                                        {{ $pet->breed ?: 'Unknown breed' }}

                                    </span>

                                </div>

                            </div>


                            <!-- STATUS -->

                            @php

                                $statusClass = strtolower(
                                    str_replace(
                                        ' ',
                                        '-',
                                        $pet->status ?? 'Healthy'
                                    )
                                );

                            @endphp


                            <span class="pet-status {{ $statusClass }}">

                                {{ $pet->status ?? 'Healthy' }}

                            </span>

                        </div>


                        <!-- AGE / WEIGHT / SPECIES -->

                        <div class="pet-basic-details">


                            <div class="pet-basic-box">

                                <span class="pet-basic-label">
                                    AGE
                                </span>

                                <span class="pet-basic-value">

                                    {{ $pet->age !== null
                                        ? $pet->age . ' yrs'
                                        : '—'
                                    }}

                                </span>

                            </div>


                            <div class="pet-basic-box">

                                <span class="pet-basic-label">
                                    WEIGHT
                                </span>

                                <span class="pet-basic-value">

                                    {{ $pet->weight !== null
                                        ? $pet->weight . ' kg'
                                        : '—'
                                    }}

                                </span>

                            </div>


                            <div class="pet-basic-box">

                                <span class="pet-basic-label">
                                    SPECIES
                                </span>

                                <span class="pet-basic-value">

                                    {{ $pet->species }}

                                </span>

                            </div>

                        </div>


                        <!-- VACCINES -->

                        <div class="pet-vaccines">

                            <span class="pet-section-label">
                                VACCINES
                            </span>


                            <div class="vaccine-tags">

                                @if($pet->vaccines)

                                    @foreach(
                                        explode(',', $pet->vaccines)
                                        as $vaccine
                                    )

                                        @if(trim($vaccine) !== '')

                                            <span class="vaccine-tag">

                                                {{ trim($vaccine) }}

                                            </span>

                                        @endif

                                    @endforeach

                                @else

                                    <span class="no-vaccine">
                                        No vaccination record
                                    </span>

                                @endif

                            </div>

                        </div>


                        <!-- OWNER / LAST VISIT -->

                        <div class="pet-owner-visit">


                            <div class="pet-owner-column">

                                <span>
                                    Owner
                                </span>

                                <strong>

                                    {{ $pet->customer_name }}

                                </strong>

                            </div>


                            <div class="pet-owner-column">

                                <span>
                                    Last Visit
                                </span>

                                <strong>

                                    {{ $pet->last_visit
                                        ? $pet->last_visit->format('M d, Y')
                                        : '—'
                                    }}

                                </strong>

                            </div>

                        </div>


                        <!-- ACTIONS -->

                        <div class="pet-card-actions">


                            <button
                                type="button"
                                class="pet-view-btn"
                                data-pet-id="{{ $pet->id }}"
                            >
                                View Record
                            </button>


                            <a
                                href="{{ route('pets.edit', $pet->id) }}"
                                class="pet-edit-btn"
                            >
                                Edit
                            </a>

                        </div>

                    </div>


                    <!-- =========================
                         VIEW RECORD MODAL
                         IMPORTANT:
                         THIS IS INSIDE THE FORELSE
                    ========================= -->

                    <div
                        class="pet-record-modal"
                        id="petRecordModal{{ $pet->id }}"
                    >

                        <div class="pet-record-modal-content">


                            <!-- HEADER -->

                            <div class="pet-record-header">

                                <h2>

                                    {{ $pet->pet_name }}
                                    — Full Record

                                </h2>


                                <button
                                    type="button"
                                    class="pet-record-close"
                                    data-close-pet="{{ $pet->id }}"
                                >
                                    ×
                                </button>

                            </div>


                            <!-- PET INFO -->

                            <div class="pet-record-main">


                                <div class="pet-record-icon">

                                    @if(strtolower($pet->species) === 'dog')
                                        🐶
                                    @elseif(strtolower($pet->species) === 'cat')
                                        🐱
                                    @elseif(strtolower($pet->species) === 'rabbit')
                                        🐰
                                    @elseif(strtolower($pet->species) === 'bird')
                                        🐦
                                    @else
                                        🐾
                                    @endif

                                </div>


                                <div>

                                    <h3>
                                        {{ $pet->pet_name }}
                                    </h3>


                                    <p>

                                        {{ $pet->breed ?: 'Unknown breed' }}

                                        ·

                                        {{ $pet->species }}

                                    </p>


                                    <span class="pet-record-status">

                                        {{ $pet->status ?? 'Healthy' }}

                                    </span>

                                </div>

                            </div>


                            <!-- BASIC INFORMATION -->

                            <div class="pet-record-details">


                                <div class="pet-record-box">

                                    <span>
                                        PET ID
                                    </span>

                                    <strong>

                                        P-{{
                                            str_pad(
                                                $pet->id,
                                                3,
                                                '0',
                                                STR_PAD_LEFT
                                            )
                                        }}

                                    </strong>

                                </div>


                                <div class="pet-record-box">

                                    <span>
                                        AGE
                                    </span>

                                    <strong>

                                        {{ $pet->age !== null
                                            ? $pet->age . ' yrs'
                                            : '—'
                                        }}

                                    </strong>

                                </div>


                                <div class="pet-record-box">

                                    <span>
                                        WEIGHT
                                    </span>

                                    <strong>

                                        {{ $pet->weight !== null
                                            ? $pet->weight . ' kg'
                                            : '—'
                                        }}

                                    </strong>

                                </div>

                            </div>


                            <!-- OWNER -->

                            <div class="pet-record-section">

                                <span class="pet-record-label">
                                    OWNER
                                </span>


                                <strong>

                                    {{ $pet->customer_name }}

                                </strong>

                            </div>


                            <!-- VACCINATION HISTORY -->

                            <div class="pet-record-section">

                                <span class="pet-record-label">
                                    VACCINATION HISTORY
                                </span>


                                <div class="vaccine-tags">

                                    @if($pet->vaccines)

                                        @foreach(
                                            explode(',', $pet->vaccines)
                                            as $vaccine
                                        )

                                            @if(trim($vaccine) !== '')

                                                <span class="vaccine-tag">

                                                    {{ trim($vaccine) }} ✓

                                                </span>

                                            @endif

                                        @endforeach

                                    @else

                                        <span class="no-record">

                                            No vaccination record

                                        </span>

                                    @endif

                                </div>

                            </div>


                            <!-- CLINICAL NOTES -->

                            <div class="pet-record-section">

                                <span class="pet-record-label">
                                    CLINICAL NOTES
                                </span>


                                <div class="clinical-notes-box">

                                    {{
                                        $pet->clinical_notes
                                        ?: 'No clinical notes recorded.'
                                    }}

                                </div>

                            </div>


                            <!-- LAST VISIT -->

                            <div class="pet-record-footer">

                                <span>
                                    Last visit:
                                </span>


                                <strong>

                                    {{ $pet->last_visit
                                        ? $pet->last_visit->format('M d, Y')
                                        : 'No visit recorded'
                                    }}

                                </strong>


                                <button
                                    type="button"
                                    class="pet-record-close-bottom"
                                    data-close-pet="{{ $pet->id }}"
                                >
                                    Close
                                </button>

                            </div>

                        </div>

                    </div>


                @empty


                    <div class="empty-state">

                        <p>
                            No pet records found.
                        </p>

                    </div>


                @endforelse

            </div>

        </section>

    </main>


    <!-- =========================
         ADD PET MODAL
    ========================= -->

    <div
        class="modal"
        id="petModal"
    >

        <div class="modal-content">


            <div class="modal-header">

                <h2>
                    Register New Pet
                </h2>


                <button
                    type="button"
                    id="closePetModal"
                >
                    ×
                </button>

            </div>


            <form
                method="POST"
                action="{{ route('pets.store') }}"
            >

                @csrf


                <!-- PET NAME -->

                <div>

                    <label>
                        Pet Name
                    </label>

                    <input
                        type="text"
                        name="pet_name"
                        placeholder="e.g. Luna"
                        required
                    >

                </div>


                <!-- SPECIES -->

                <div>

                    <label>
                        Species
                    </label>

                    <select
                        name="species"
                        required
                    >

                        <option value="">
                            Select Species
                        </option>

                        <option value="Dog">
                            Dog
                        </option>

                        <option value="Cat">
                            Cat
                        </option>

                        <option value="Rabbit">
                            Rabbit
                        </option>

                        <option value="Bird">
                            Bird
                        </option>

                        <option value="Other">
                            Other
                        </option>

                    </select>

                </div>


                <!-- BREED -->

                <div>

                    <label>
                        Breed
                    </label>

                    <input
                        type="text"
                        name="breed"
                        placeholder="e.g. Labrador"
                    >

                </div>


                <!-- AGE -->

                <div>

                    <label>
                        Age
                    </label>

                    <input
                        type="number"
                        name="age"
                        min="0"
                        placeholder="e.g. 2 yrs"
                    >

                </div>


                <!-- WEIGHT -->

                <div>

                    <label>
                        Weight (kg)
                    </label>

                    <input
                        type="number"
                        name="weight"
                        min="0"
                        step="0.01"
                        placeholder="e.g. 5.2 kg"
                    >

                </div>


                <!-- OWNER -->

                <div>

                    <label>
                        Owner
                    </label>

                    <select
                        name="customer_name"
                        required
                    >

                        <option value="">
                            Select owner...
                        </option>

                        @foreach($customers as $customer)

                            <option
                                value="{{ $customer->customer_name }}"
                            >
                                {{ $customer->customer_name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <!-- VACCINES -->

                <div class="full-width">

                    <label>
                        Vaccines (comma-separated)
                    </label>

                    <input
                        type="text"
                        name="vaccines"
                        placeholder="e.g. Rabies, Distemper, Parvo"
                    >

                </div>


                <!-- CLINICAL NOTES -->

                <div class="full-width">

                    <label>
                        Clinical Notes
                    </label>

                    <textarea
                        name="clinical_notes"
                        rows="4"
                        placeholder="Behavioral notes, allergies, ongoing treatments..."
                    ></textarea>

                </div>


                <!-- LAST VISIT -->

                <div>

                    <label>
                        Last Visit
                    </label>

                    <input
                        type="date"
                        name="last_visit"
                    >

                </div>


                <!-- STATUS -->

                <div>

                    <label>
                        Status
                    </label>

                    <select
                        name="status"
                    >

                        <option
                            value="Healthy"
                            selected
                        >
                            Healthy
                        </option>

                        <option value="Due Vaccine">
                            Due Vaccine
                        </option>

                        <option value="Under Treatment">
                            Under Treatment
                        </option>

                    </select>

                </div>


                <!-- SAVE -->

                <button
                    type="submit"
                    class="primary-btn"
                >
                    Save Pet
                </button>

            </form>

        </div>

    </div>


    <!-- =========================
         LOGOUT MODAL
    ========================= -->

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


    <!-- =========================
         JAVASCRIPT
    ========================= -->

    <script>

        document.addEventListener(
            'DOMContentLoaded',
            function () {


                /* =========================
                   PET SEARCH
                ========================= */

                const petSearch =
                    document.getElementById('petSearch');

                const petCards =
                    document.querySelectorAll('.pet-card');


                if (petSearch) {

                    petSearch.addEventListener(
                        'input',
                        function () {

                            const searchValue =
                                this.value
                                    .toLowerCase()
                                    .trim();


                            petCards.forEach(
                                function (card) {

                                    const searchText =
                                        card.dataset.search || '';


                                    if (
                                        searchText.includes(
                                            searchValue
                                        )
                                    ) {

                                        card.style.display =
                                            '';

                                    } else {

                                        card.style.display =
                                            'none';

                                    }

                                }
                            );

                        }
                    );

                }


                /* =========================
                   NEW PET MODAL
                ========================= */

                const addPetBtn =
                    document.getElementById(
                        'addPetBtn'
                    );

                const petModal =
                    document.getElementById(
                        'petModal'
                    );

                const closePetModal =
                    document.getElementById(
                        'closePetModal'
                    );


                if (
                    addPetBtn &&
                    petModal
                ) {

                    addPetBtn.addEventListener(
                        'click',
                        function () {

                            petModal.classList.add(
                                'show'
                            );

                        }
                    );

                }


                if (
                    closePetModal &&
                    petModal
                ) {

                    closePetModal.addEventListener(
                        'click',
                        function () {

                            petModal.classList.remove(
                                'show'
                            );

                        }
                    );

                }


                if (petModal) {

                    petModal.addEventListener(
                        'click',
                        function (event) {

                            if (
                                event.target ===
                                petModal
                            ) {

                                petModal.classList.remove(
                                    'show'
                                );

                            }

                        }
                    );

                }


                /* =========================
                   VIEW RECORD
                ========================= */

                const viewButtons =
                    document.querySelectorAll(
                        '.pet-view-btn'
                    );

                const recordModals =
                    document.querySelectorAll(
                        '.pet-record-modal'
                    );

                const closeRecordButtons =
                    document.querySelectorAll(
                        '[data-close-pet]'
                    );


                viewButtons.forEach(
                    function (button) {

                        button.addEventListener(
                            'click',
                            function () {

                                const petId =
                                    this.dataset.petId;

                                const modal =
                                    document.getElementById(
                                        'petRecordModal' +
                                        petId
                                    );


                                if (modal) {

                                    modal.classList.add(
                                        'show'
                                    );

                                }

                            }
                        );

                    }
                );


                closeRecordButtons.forEach(
                    function (button) {

                        button.addEventListener(
                            'click',
                            function () {

                                const petId =
                                    this.dataset.closePet;

                                const modal =
                                    document.getElementById(
                                        'petRecordModal' +
                                        petId
                                    );


                                if (modal) {

                                    modal.classList.remove(
                                        'show'
                                    );

                                }

                            }
                        );

                    }
                );


                recordModals.forEach(
                    function (modal) {

                        modal.addEventListener(
                            'click',
                            function (event) {

                                if (
                                    event.target ===
                                    modal
                                ) {

                                    modal.classList.remove(
                                        'show'
                                    );

                                }

                            }
                        );

                    }
                );


                /* =========================
                   LOGOUT MODAL
                ========================= */

                const logoutPowerBtn =
                    document.getElementById(
                        'logoutPowerBtn'
                    );

                const logoutModal =
                    document.getElementById(
                        'logoutModal'
                    );

                const logoutCancelBtn =
                    document.getElementById(
                        'logoutCancelBtn'
                    );


                if (
                    logoutPowerBtn &&
                    logoutModal
                ) {

                    logoutPowerBtn.addEventListener(
                        'click',
                        function () {

                            logoutModal.classList.add(
                                'show'
                            );

                        }
                    );

                }


                if (
                    logoutCancelBtn &&
                    logoutModal
                ) {

                    logoutCancelBtn.addEventListener(
                        'click',
                        function () {

                            logoutModal.classList.remove(
                                'show'
                            );

                        }
                    );

                }


                if (logoutModal) {

                    logoutModal.addEventListener(
                        'click',
                        function (event) {

                            if (
                                event.target ===
                                logoutModal
                            ) {

                                logoutModal.classList.remove(
                                    'show'
                                );

                            }

                        }
                    );

                }

            }
        );

    </script>


</body>

</html>