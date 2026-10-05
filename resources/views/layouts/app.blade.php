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

<body>

    @yield('content')


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