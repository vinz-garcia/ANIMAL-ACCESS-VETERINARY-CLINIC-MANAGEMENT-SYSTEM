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

        
.profile-action {
    border: none;
    background: transparent;
    color: #087f8c;
    font-size: 12px;
    font-weight: 500;
    padding: 0;
    cursor: pointer;
    text-decoration: none;
}

.profile-action:hover {
    color: #075e66;
    text-decoration: underline;
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

        /* CUSTOMER PROFILE MODAL */

.customer-profile-modal {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 2000;
    align-items: center;
    justify-content: center;
    padding: 20px;
    background: rgba(13, 47, 47, 0.38);
    backdrop-filter: blur(7px);
    -webkit-backdrop-filter: blur(7px);
}

.customer-profile-modal.show {
    display: flex;
}

.customer-profile-content {
    width: 100%;
    max-width: 670px;
    max-height: 85vh;
    overflow: hidden;
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 20px 60px rgba(0, 40, 40, 0.2);
}

.customer-profile-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 22px 24px;
    border-bottom: 1px solid #edf1f1;
}

.customer-profile-header h2 {
    margin: 0;
    color: #183b3b;
    font-size: 19px;
}

.customer-profile-header button {
    border: none;
    background: transparent;
    color: #8a9999;
    font-size: 24px;
    cursor: pointer;
}

.customer-profile-body {
    max-height: calc(85vh - 70px);
    overflow-y: auto;
    padding: 24px;
}

.customer-profile-info {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 24px;
}

.customer-profile-avatar {
    width: 56px;
    height: 56px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 14px;
    background: #116f70;
    color: #fff;
    font-size: 18px;
    font-weight: 700;
}

.customer-profile-info h3 {
    margin: 0 0 5px;
    color: #183b3b;
    font-size: 20px;
}

.customer-profile-info p {
    margin: 3px 0;
    color: #839292;
    font-size: 12px;
}

.customer-profile-stats {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 12px;
    margin-bottom: 24px;
}

.customer-profile-stat {
    padding: 17px;
    border-radius: 12px;
    background: #f7f9fa;
}

.customer-profile-stat span,
.customer-profile-label {
    display: block;
    margin-bottom: 8px;
    color: #8a9999;
    font-size: 10px;
    letter-spacing: 0.3px;
}

.customer-profile-stat strong {
    color: #183b3b;
    font-size: 16px;
}

.customer-profile-section {
    margin-bottom: 22px;
}

.customer-profile-section > p {
    margin: 0;
    color: #344e4e;
    font-size: 13px;
    line-height: 1.5;
}

.profile-pet-item,
.profile-appointment-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding: 15px;
    margin-top: 8px;
    border: 1px solid #e9f0f0;
    border-radius: 12px;
}

.profile-pet-item {
    background: #eefafa;
}

.profile-pet-name,
.profile-appointment-name {
    color: #244444;
    font-size: 13px;
    font-weight: 600;
}

.profile-pet-detail,
.profile-appointment-detail {
    display: block;
    margin-top: 4px;
    color: #839292;
    font-size: 11px;
}

.profile-status {
    flex-shrink: 0;
    padding: 5px 11px;
    border-radius: 20px;
    background: #d8f5f3;
    color: #126767;
    font-size: 10px;
}

.profile-empty {
    padding: 16px;
    color: #8a9999;
    font-size: 12px;
}

.customer-profile-close-btn {
    width: 100%;
    padding: 12px;
    border: 1px solid #d9e5e5;
    border-radius: 8px;
    background: white;
    color: #345050;
    cursor: pointer;
}

.customer-profile-close-btn:hover {
    background: #f6fafa;
}

@media (max-width: 600px) {
    .customer-profile-modal {
        padding: 12px;
    }

    .customer-profile-body {
        padding: 18px;
    }

    .customer-profile-stats {
        gap: 7px;
    }

    .customer-profile-stat {
        padding: 12px 9px;
    }

    .customer-profile-stat strong {
        font-size: 13px;
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

<button
    type="button"
    class="profile-action"
    data-customer-id="{{ $customer->id }}"
>
    Profile
</button>


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

    <!-- CUSTOMER PROFILE MODAL -->
<div class="customer-profile-modal" id="customerProfileModal">
    <div class="customer-profile-content">

        <div class="customer-profile-header">
            <h2>Client Profile</h2>
            <button type="button" id="closeCustomerProfile" aria-label="Close">
                &times;
            </button>
        </div>

        <div class="customer-profile-body">

            <div class="customer-profile-info">
                <div class="customer-profile-avatar" id="profileAvatar">C</div>

                <div>
                    <h3 id="profileName">Customer Name</h3>
                    <p id="profileEmail">Email address</p>
                    <p id="profilePhone">Phone number</p>
                </div>
            </div>

            <div class="customer-profile-stats">
                <div class="customer-profile-stat">
                    <span>MEMBER SINCE</span>
                    <strong id="profileMemberSince">—</strong>
                </div>

                <div class="customer-profile-stat">
                    <span>TOTAL VISITS</span>
                    <strong id="profileVisits">0</strong>
                </div>

                <div class="customer-profile-stat">
                    <span>PETS</span>
                    <strong id="profilePetCount">0</strong>
                </div>
            </div>

            <div class="customer-profile-section">
                <span class="customer-profile-label">ADDRESS</span>
                <p id="profileAddress">—</p>
            </div>

            <div class="customer-profile-section">
                <span class="customer-profile-label">REGISTERED PETS</span>
                <div id="profilePets"></div>
            </div>

            <div class="customer-profile-section">
                <span class="customer-profile-label">APPOINTMENT HISTORY</span>
                <div id="profileAppointments"></div>
            </div>

            <button
                type="button"
                class="customer-profile-close-btn"
                id="closeCustomerProfileBottom"
            >
                Close
            </button>

        </div>
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
   CUSTOMER PROFILE MODAL
========================= */

const profileModal = document.getElementById('customerProfileModal');
const closeProfileTop = document.getElementById('closeCustomerProfile');
const closeProfileBottom = document.getElementById('closeCustomerProfileBottom');

function closeCustomerProfile() {
    if (profileModal) {
        profileModal.classList.remove('show');
    }
}

if (closeProfileTop) {
    closeProfileTop.addEventListener('click', closeCustomerProfile);
}

if (closeProfileBottom) {
    closeProfileBottom.addEventListener('click', closeCustomerProfile);
}

if (profileModal) {
    profileModal.addEventListener('click', function (event) {
        if (event.target === profileModal) {
            closeCustomerProfile();
        }
    });
}

window.openCustomerProfile = async function (customerId) {
    if (!profileModal) return;

    const profileName = document.getElementById('profileName');
    const profileEmail = document.getElementById('profileEmail');
    const profilePhone = document.getElementById('profilePhone');
    const profileAvatar = document.getElementById('profileAvatar');
    const profileMemberSince = document.getElementById('profileMemberSince');
    const profileVisits = document.getElementById('profileVisits');
    const profilePetCount = document.getElementById('profilePetCount');
    const profileAddress = document.getElementById('profileAddress');
    const profilePets = document.getElementById('profilePets');
    const profileAppointments = document.getElementById('profileAppointments');

    profileModal.classList.add('show');

    profileName.textContent = 'Loading...';
    profileEmail.textContent = '';
    profilePhone.textContent = '';
    profilePets.innerHTML = '';
    profileAppointments.innerHTML = '';

    try {
        const response = await fetch(`/customers/${customerId}/profile`, {
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        if (!response.ok) {
            throw new Error('Unable to load customer profile.');
        }

        const data = await response.json();
        const customer = data.customer;

        profileName.textContent = customer.customer_name || '—';
        profileEmail.textContent = customer.email || 'No email provided';
        profilePhone.textContent = customer.phone || 'No phone provided';
        profileAvatar.textContent = (customer.customer_name || 'C').charAt(0).toUpperCase();

        profileMemberSince.textContent = customer.created_at
            ? new Date(customer.created_at).toLocaleDateString('en-US', {
                month: 'short',
                year: 'numeric',
                timeZone: 'UTC'
            })
            : '—';

        profileVisits.textContent = data.visit_count ?? 0;
        profilePetCount.textContent = data.pets.length;
        profileAddress.textContent = customer.address || 'No address provided';

        if (data.pets.length) {
          
data.pets.forEach(pet => {
    const item = document.createElement('div');
    item.className = 'profile-pet-item';

    const left = document.createElement('div');
    left.className = 'profile-pet-left';

    const emoji = document.createElement('span');
    emoji.className = 'profile-pet-emoji';

    const species = (pet.species || '').toLowerCase();

    if (species.includes('cat')) {
        emoji.textContent = '🐱';
    } else if (species.includes('bird') || species.includes('parrot')) {
        emoji.textContent = '🦜';
    } else if (species.includes('rabbit')) {
        emoji.textContent = '🐰';
    } else if (species.includes('fish')) {
        emoji.textContent = '🐠';
    } else {
        emoji.textContent = '🐶';
    }

    const details = document.createElement('div');

    const name = document.createElement('div');
    name.className = 'profile-pet-name';
    name.textContent = pet.pet_name || 'Unnamed pet';

    const detail = document.createElement('span');
detail.className = 'profile-pet-detail';

const ageText = pet.age !== null && pet.age !== ''
    ? `${pet.age} years old`
    : 'Age not specified';

detail.textContent = [
    pet.species,
    pet.breed,
    ageText
].filter(Boolean).join(' · ');

const health = document.createElement('span');
health.className = 'profile-status';
health.textContent = pet.status || 'Status not specified';

details.append(name, detail, health);
    details.append(name, detail);
    left.append(emoji, details);
    item.append(left);
    profilePets.append(item);
});
        } else {
            profilePets.innerHTML = '<div class="profile-empty">No registered pets.</div>';
        }

        
if (data.appointments.length) {
    data.appointments.forEach(appointment => {
        const item = document.createElement('div');
        item.className = 'profile-appointment-item';

        const details = document.createElement('div');

        const name = document.createElement('div');
        name.className = 'profile-appointment-name';
        name.textContent = appointment.service || 'Veterinary appointment';

        const detail = document.createElement('span');
        detail.className = 'profile-appointment-detail';

        const date = appointment.appointment_date
            ? new Date(appointment.appointment_date + 'T00:00:00')
                .toLocaleDateString('en-US', {
                    month: 'short',
                    day: 'numeric',
                    year: 'numeric'
                })
            : 'Date unavailable';

        const time = appointment.appointment_time || '';

        detail.textContent = [
            appointment.pet_name || 'Pet not specified',
            date,
            time
        ].filter(Boolean).join(' · ');

        details.append(name, detail);

        const status = document.createElement('span');
        status.className = 'profile-status';
        status.textContent = appointment.status || 'Scheduled';

        item.append(details, status);
        profileAppointments.append(item);
    });
} else {
    profileAppointments.innerHTML =
        '<div class="profile-empty">No appointment history.</div>';
}
    } catch (error) {
        console.error(error);
        profileName.textContent = 'Unable to load profile';
        profilePets.innerHTML = '<div class="profile-empty">Please refresh and try again.</div>';
        profileAppointments.innerHTML = '';
    }
};


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

        document.querySelectorAll('.profile-action[data-customer-id]').forEach(button => {
    button.addEventListener('click', function () {
        const customerId = this.dataset.customerId;
        openCustomerProfile(customerId);
    });
});

    </script>


</body>

</html>