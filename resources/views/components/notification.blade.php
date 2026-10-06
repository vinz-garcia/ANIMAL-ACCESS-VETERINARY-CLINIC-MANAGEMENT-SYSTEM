@php
    $today = today();

    $notificationAppointments = \App\Models\Appointment::whereDate(
        'appointment_date',
        $today
    )
    ->orderBy('appointment_time')
    ->get();

    $notificationGrooming = \App\Models\Grooming::whereDate(
        'grooming_date',
        $today
    )
    ->orderBy('grooming_time')
    ->get();

    $notificationCount =
        $notificationAppointments->count() +
        $notificationGrooming->count();
@endphp


<div class="notification-wrapper">

    <button
        type="button"
        class="notification"
        id="notificationBtn"
        title="Notifications"
    >

        🔔

        @if($notificationCount > 0)

            <span class="notification-badge">
                {{ $notificationCount }}
            </span>

        @endif

    </button>


    <div
        class="notification-dropdown"
        id="notificationDropdown"
    >

        <div class="notification-header">

            <strong>
                Notifications
            </strong>

            <span>
                {{ $notificationCount }} today
            </span>

        </div>


        @if($notificationCount > 0)

            <div class="notification-section-title">
                Today's Activities
            </div>


            {{-- APPOINTMENTS --}}

            @foreach($notificationAppointments as $appointment)

                <div class="notification-item">

                    <div class="notification-item-icon">
                        📅
                    </div>

                    <div>

                        <strong>
                            {{ $appointment->pet_name ?? 'Appointment' }}
                        </strong>

                        <small>
                            Appointment at
                            {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}
                        </small>

                    </div>

                </div>

            @endforeach


            {{-- GROOMING --}}

            @foreach($notificationGrooming as $grooming)

                <div class="notification-item">

                    <div class="notification-item-icon">
                        ✂
                    </div>

                    <div>

                        <strong>
                            {{ $grooming->pet_name ?? 'Grooming' }}
                        </strong>

                        <small>
                            Grooming at
                            {{ \Carbon\Carbon::parse($grooming->grooming_time)->format('h:i A') }}
                        </small>

                    </div>

                </div>

            @endforeach


        @else

            <div class="notification-empty">
                No notifications for today.
            </div>

        @endif

    </div>

</div>