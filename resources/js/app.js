import './bootstrap';
import '../sass/app.scss';

document.addEventListener('DOMContentLoaded', function () {

    console.log('Animal Access Veterinary Clinic System loaded.');


    /* =====================================================
       APPOINTMENTS
    ===================================================== */

    const appointmentSearch =
        document.getElementById('appointmentSearch');

    const appointmentStatusFilter =
        document.getElementById('statusFilter');

    const appointmentTableBody =
        document.getElementById('appointmentTableBody');

    const appointmentTabs =
        document.querySelectorAll(
            '#appointmentTabs .status-tab'
        );


    function filterAppointments() {

        if (!appointmentTableBody) {
            return;
        }

        const searchValue = appointmentSearch
            ? appointmentSearch.value.trim().toLowerCase()
            : '';

        let selectedStatus = 'all';

        const activeTab = document.querySelector(
            '#appointmentTabs .status-tab.active'
        );

        if (activeTab) {
            selectedStatus = activeTab.dataset.status;
        }

        if (
            appointmentStatusFilter &&
            appointmentStatusFilter.value !== 'all'
        ) {
            selectedStatus =
                appointmentStatusFilter.value.toLowerCase();
        }

        const rows =
            appointmentTableBody.querySelectorAll('tr');

        rows.forEach(function (row) {

            if (!row.querySelector('td')) {
                return;
            }

            const text =
                row.textContent.toLowerCase();

            const rowStatus =
                (row.dataset.status || '').toLowerCase();

            const searchMatch =
                text.includes(searchValue);

            const statusMatch =
                selectedStatus === 'all' ||
                rowStatus === selectedStatus;

            row.style.display =
                searchMatch && statusMatch
                    ? ''
                    : 'none';
        });
    }


    if (appointmentSearch) {

        appointmentSearch.addEventListener(
            'input',
            filterAppointments
        );

    }


    if (appointmentStatusFilter) {

        appointmentStatusFilter.addEventListener(
            'change',
            function () {

                appointmentTabs.forEach(function (tab) {
                    tab.classList.remove('active');
                });

                filterAppointments();

            }
        );

    }


    appointmentTabs.forEach(function (tab) {

        tab.addEventListener('click', function () {

            appointmentTabs.forEach(function (item) {
                item.classList.remove('active');
            });

            this.classList.add('active');

            if (appointmentStatusFilter) {
                appointmentStatusFilter.value = 'all';
            }

            filterAppointments();

        });

    });


    /* =====================================================
       GROOMING SEARCH + STATUS FILTER
    ===================================================== */

    const groomingSearch =
        document.getElementById('groomingSearch');

    const groomingTabs =
        document.querySelectorAll(
            '#groomingTabs .status-tab'
        );

    const groomingContainer =
        document.getElementById('groomingTableBody');


    function filterGroomingCards(status) {

        if (!groomingContainer) {
            return;
        }

        const searchValue = groomingSearch
            ? groomingSearch.value.trim().toLowerCase()
            : '';

        const cards =
            groomingContainer.querySelectorAll(
                '.grooming-card'
            );

        cards.forEach(function (card) {

            const cardStatus =
                (card.getAttribute('data-status') || '')
                .toLowerCase();

            const searchText =
                (card.getAttribute('data-search') || '')
                .toLowerCase();

            const statusMatch =
                status === 'all' ||
                cardStatus === status;

            const searchMatch =
                searchText.includes(searchValue);

            card.style.display =
                statusMatch && searchMatch
                    ? ''
                    : 'none';

        });
    }


    groomingTabs.forEach(function (tab) {

        tab.addEventListener('click', function () {

            groomingTabs.forEach(function (item) {
                item.classList.remove('active');
            });

            this.classList.add('active');

            const status =
                this.getAttribute('data-status');

            filterGroomingCards(status);

        });

    });


    if (groomingSearch) {

        groomingSearch.addEventListener(
            'input',
            function () {

                const activeTab =
                    document.querySelector(
                        '#groomingTabs .status-tab.active'
                    );

                const status =
                    activeTab
                        ? activeTab.getAttribute('data-status')
                        : 'all';

                filterGroomingCards(status);

            }
        );

    }


    /* =====================================================
       PET RECORDS SEARCH
    ===================================================== */

    const petSearch =
        document.getElementById('petSearch');

    const petTableBody =
        document.getElementById('petTableBody');


    if (petSearch && petTableBody) {

        petSearch.addEventListener(
            'input',
            function () {

                const value =
                    this.value.trim().toLowerCase();

                petTableBody
                    .querySelectorAll('tr')
                    .forEach(function (row) {

                        const text =
                            row.textContent.toLowerCase();

                        row.style.display =
                            text.includes(value)
                                ? ''
                                : 'none';

                    });

            }
        );

    }


    /* =====================================================
       CUSTOMERS SEARCH
    ===================================================== */

    const customerSearch =
        document.getElementById('customerSearch');

    const customerTableBody =
        document.getElementById('customerTableBody');


    if (customerSearch && customerTableBody) {

        customerSearch.addEventListener(
            'input',
            function () {

                const value =
                    this.value.trim().toLowerCase();

                customerTableBody
                    .querySelectorAll('tr')
                    .forEach(function (row) {

                        const text =
                            row.textContent.toLowerCase();

                        row.style.display =
                            text.includes(value)
                                ? ''
                                : 'none';

                    });

            }
        );

    }


    /* =====================================================
       APPOINTMENT MODAL
    ===================================================== */

    const addAppointmentBtn =
        document.getElementById('addAppointmentBtn');

    const appointmentModal =
        document.getElementById('appointmentModal');

    const closeModal =
        document.getElementById('closeModal');


    if (addAppointmentBtn && appointmentModal) {

        addAppointmentBtn.addEventListener(
            'click',
            function () {

                appointmentModal.classList.add('show');

            }
        );

    }


    if (closeModal && appointmentModal) {

        closeModal.addEventListener(
            'click',
            function () {

                appointmentModal.classList.remove('show');

            }
        );

    }


    /* =====================================================
       GROOMING MODAL
    ===================================================== */

    const addGroomingBtn =
        document.getElementById('addGroomingBtn');

    const groomingModal =
        document.getElementById('groomingModal');

    const closeGroomingModal =
        document.getElementById('closeGroomingModal');


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


    /* =====================================================
       PET MODAL
    ===================================================== */

    const addPetBtn =
        document.getElementById('addPetBtn');

    const petModal =
        document.getElementById('petModal');

    const closePetModal =
        document.getElementById('closePetModal');


    if (addPetBtn && petModal) {

        addPetBtn.addEventListener(
            'click',
            function () {

                petModal.classList.add('show');

            }
        );

    }


    if (closePetModal && petModal) {

        closePetModal.addEventListener(
            'click',
            function () {

                petModal.classList.remove('show');

            }
        );

    }


    /* =====================================================
       CUSTOMER MODAL
    ===================================================== */

    const addCustomerBtn =
        document.getElementById('addCustomerBtn');

    const customerModal =
        document.getElementById('customerModal');

    const closeCustomerModal =
        document.getElementById('closeCustomerModal');


    if (addCustomerBtn && customerModal) {

        addCustomerBtn.addEventListener(
            'click',
            function () {

                customerModal.classList.add('show');

            }
        );

    }


    if (closeCustomerModal && customerModal) {

        closeCustomerModal.addEventListener(
            'click',
            function () {

                customerModal.classList.remove('show');

            }
        );

    }


    /* =====================================================
       LOGIN PASSWORD
    ===================================================== */

    const showPassword =
        document.getElementById('showPassword');

    const passwordInput =
        document.getElementById('password');


    if (showPassword && passwordInput) {

        showPassword.addEventListener(
            'click',
            function () {

                if (passwordInput.type === 'password') {

                    passwordInput.type = 'text';

                    showPassword.textContent = 'Hide';

                } else {

                    passwordInput.type = 'password';

                    showPassword.textContent = 'Show';

                }

            }
        );

    }


    /* =====================================================
       LOGOUT MODAL
    ===================================================== */

    const topSignoutBtn =
        document.getElementById('topSignoutBtn');

    const logoutPowerBtn =
        document.getElementById('logoutPowerBtn');

    const logoutModal =
        document.getElementById('logoutModal');

    const logoutCancelBtn =
        document.getElementById('logoutCancelBtn');


    function openLogoutModal() {

        if (logoutModal) {
            logoutModal.classList.add('show');
        }

    }


    function closeLogoutModal() {

        if (logoutModal) {
            logoutModal.classList.remove('show');
        }

    }


    if (topSignoutBtn) {

        topSignoutBtn.addEventListener(
            'click',
            function (event) {

                event.preventDefault();

                openLogoutModal();

            }
        );

    }


    if (logoutPowerBtn) {

        logoutPowerBtn.addEventListener(
            'click',
            openLogoutModal
        );

    }


    if (logoutCancelBtn) {

        logoutCancelBtn.addEventListener(
            'click',
            closeLogoutModal
        );

    }


    if (logoutModal) {

        logoutModal.addEventListener(
            'click',
            function (event) {

                if (event.target === logoutModal) {
                    closeLogoutModal();
                }

            }
        );

    }


    /* =====================================================
       NOTIFICATION
       FRONTEND / UI ONLY
    ===================================================== */

    const notificationBtn =
        document.getElementById('notificationBtn');

    const notificationDropdown =
        document.getElementById('notificationDropdown');


    if (notificationBtn && notificationDropdown) {

        notificationBtn.addEventListener(
            'click',
            function (event) {

                event.stopPropagation();

                notificationDropdown.classList.toggle('show');

            }
        );


        document.addEventListener(
            'click',
            function (event) {

                if (
                    !notificationDropdown.contains(event.target) &&
                    !notificationBtn.contains(event.target)
                ) {

                    notificationDropdown.classList.remove('show');

                }

            }
        );

    }


    /* =====================================================
       ESCAPE KEY
    ===================================================== */

    document.addEventListener(
        'keydown',
        function (event) {

            if (event.key === 'Escape') {

                if (logoutModal) {
                    logoutModal.classList.remove('show');
                }

                if (appointmentModal) {
                    appointmentModal.classList.remove('show');
                }

                if (groomingModal) {
                    groomingModal.classList.remove('show');
                }

                if (petModal) {
                    petModal.classList.remove('show');
                }

                if (customerModal) {
                    customerModal.classList.remove('show');
                }

                if (notificationDropdown) {
                    notificationDropdown.classList.remove('show');
                }

            }

        }
    );

});