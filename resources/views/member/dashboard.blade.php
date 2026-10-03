<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Member Dashboard - Khairat Management System</title>

    <!-- Professional Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="dashboard-body">

    <!-- =========================================
         SIDEBAR
    ========================================== -->
    <aside class="dashboard-sidebar">

        <!-- System / Profile Area -->
        <div class="sidebar-profile">

            <div class="profile-icon">
                <img src="{{ asset('images/profile pic.png') }}" alt="Profile">
            </div>

            <div class="sidebar-user-info">
                <h3>{{ Auth::user()->name }}</h3>
                <span>Member</span>
            </div>

        </div>


        <!-- Navigation -->
        <nav class="sidebar-menu">

            <p class="sidebar-section-label">MENU</p>

            <a href="{{ route('member.dashboard') }}"
               class="menu-item {{ request()->routeIs('member.dashboard') ? 'active' : '' }}">

                <span class="menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                    </svg>
                </span>

                <span>Dashboard</span>
            </a>


            <p class="sidebar-section-label">ACCOUNT</p>

            <a href="{{ route('member.profile') }}"
               class="menu-item {{ request()->routeIs('member.profile') ? 'active' : '' }}">

                <span class="menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </span>

                <span>Profile</span>
            </a>


            <a href="{{ route('member.dependents') }}"
               class="menu-item {{ request()->routeIs('member.dependents') ? 'active' : '' }}">

                <span class="menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M16 11c1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3 1.34 3 3 3zM8 11c1.66 0 3-1.34 3-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm8 2c-2 0-6 1-6 3v3h12v-3c0-2-4-3-6-3zM8 13c-2.33 0-7 1.17-7 3.5V19h7v-3c0-.85.33-1.56.91-2.14C8.61 13.81 8.3 13 8 13z"/>
                    </svg>
                </span>

                <span>Dependents</span>
            </a>


            <p class="sidebar-section-label">KHAIRAT</p>

            <a href="{{ route('member.registration') }}"
               class="menu-item {{ request()->routeIs('member.registration') ? 'active' : '' }}">

                <span class="menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 4H6V5h12v2zm0 4H6V9h12v2zm-5 4H6v-2h7v2z"/>
                    </svg>
                </span>

                <span>Registration</span>
            </a>


            <a href="{{ route('member.renewal') }}"
               class="menu-item {{ request()->routeIs('member.renewal') ? 'active' : '' }}">

                <span class="menu-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 4V1L8 5l4 4V6c3.31 0 6 2.69 6 6 0 1.01-.25 1.96-.69 2.79l1.46 1.46A7.94 7.94 0 0 0 20 12c0-4.42-3.58-8-8-8zm-6 6c0-1.01.25-1.96.69-2.79L5.23 5.75A7.94 7.94 0 0 0 4 10c0 4.42 3.58 8 8 8v3l4-4-4-4v3c-3.31 0-6-2.69-6-6z"/>
                    </svg>
                </span>

                <span>Renewal</span>
            </a>


            <a href="{{ route('member.claim') }}"
               class="menu-item {{ request()->routeIs('member.claim') ? 'active' : '' }}">

                <span class="menu-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm1 7V3.5L18.5 9H15zm-4 9-3.5-3.5 1.41-1.41L11 15.17l4.59-4.59L17 12l-6 6z"/>
                    </svg>
                </span>

                <span>Claims</span>
            </a>


            <a href="{{ route('member.history') }}"
               class="menu-item {{ request()->routeIs('member.history') ? 'active' : '' }}">

                <span class="menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M13 3a9 9 0 1 0 8.95 10H19.9A7 7 0 1 1 13 5v3l4-4-4-4v3zm-1 5h2v5h4v2h-6V8z"/>
                    </svg>
                </span>

                <span>History</span>
            </a>

        </nav>


        <!-- Logout -->
        <div class="sidebar-logout">

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="logout-btn">

                    <span class="menu-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M10 17v-3H3v-4h7V7l5 5-5 5zm9-14H9c-1.1 0-2 .9-2 2v3h2V5h10v14H9v-3H7v3c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/>
                        </svg>
                    </span>

                    <span>Log Out</span>

                </button>
            </form>

        </div>

    </aside>


    <!-- =========================================
         MAIN CONTENT
    ========================================== -->
    <main class="dashboard-main">

        <!-- Header -->
        <header class="member-dashboard-header">

            <div class="dashboard-heading">
                <h1>Dashboard</h1>
                <p>
                    Welcome back, {{ Auth::user()->name }}.
                    Here is an overview of your Khairat membership.
                </p>
            </div>

            <div class="dashboard-header-actions">

                <div class="notification-dropdown-wrapper">

                    <button type="button"
                            class="notification-button"
                            id="notificationButton"
                            aria-label="Notifications"
                            onclick="toggleNotificationDropdown(event)">

                        <img src="{{ asset('images/notification.png') }}"
                            alt="Notification">

                        @if(Auth::user()->unreadNotifications->count() > 0)
                            <span class="notification-badge" id="notificationBadge">
                                {{ Auth::user()->unreadNotifications->count() }}
                            </span>
                        @endif

                    </button>


                    <!-- Notification Dropdown -->
                    <div class="notification-dropdown"
                        id="notificationDropdown">

                        <div class="notification-dropdown-header">
                            <h3>Notifications</h3>
                            <span>Latest updates</span>
                        </div>

                        <div class="notification-dropdown-list">

                            @forelse($notifications as $notification)

                                <div class="notification-dropdown-item">

                                    <div class="notification-dropdown-icon">
                                        <svg viewBox="0 0 24 24">
                                            <path d="M12 22c1.1 0 1.99-.9 1.99-2h-4A2 2 0 0 0 12 22zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4a1.5 1.5 0 0 0-3 0v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/>
                                        </svg>
                                    </div>

                                    <div class="notification-dropdown-content">

                                        <strong>
                                            {{ $notification->data['title'] ?? 'Notification' }}
                                        </strong>

                                        <p>
                                            {{ $notification->data['message'] ?? '' }}
                                        </p>

                                        <small>
                                            {{ $notification->created_at->format('d/m/Y h:i A') }}
                                        </small>

                                    </div>

                                </div>

                            @empty

                                <div class="notification-dropdown-empty">
                                    No notifications at the moment.
                                </div>

                            @endforelse

                        </div>

                    </div>

                </div>

            </div>

        </header>

        <!-- =========================================
             SUMMARY
        ========================================== -->

        <section class="dashboard-section">

            <div class="dashboard-summary-grid">

                <div class="summary-card">

                    <div class="summary-card-content">

                        <span class="summary-label">
                            Total Paid
                        </span>

                        <h3>
                            RM {{ number_format($totalPaid, 2) }}
                        </h3>

                        <p>
                            Total successful contributions
                        </p>

                    </div>

                    <div class="summary-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M21 7H3c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2zm0 12H3V9h18v10zm-9-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM3 3h18v2H3V3z"/>
                        </svg>
                    </div>

                </div>


                <div class="summary-card">

                    <div class="summary-card-content">

                        <span class="summary-label">
                            Dependents
                        </span>

                        <h3>
                            {{ $dependentsCount }}
                        </h3>

                        <p>
                            Active registered dependents
                        </p>

                    </div>

                    <div class="summary-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M16 11c1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3 1.34 3 3 3zM8 11c1.66 0 3-1.34 3-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm8 2c-2 0-6 1-6 3v3h12v-3c0-2-4-3-6-3zM8 13c-2.33 0-7 1.17-7 3.5V19h7v-3c0-.85.33-1.56.91-2.14C8.61 13.81 8.3 13 8 13z"/>
                        </svg>
                    </div>

                </div>

            </div>

            <!-- Membership Information -->
            <div class="membership-info-card">

                <div class="membership-info-header">
                    <h3>Membership Information</h3>
                    <p>Your Khairat membership details.</p>
                </div>

                <div class="membership-info-grid">

                <!-- Member ID -->
                <div class="membership-info-item">

                    <div class="membership-info-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zM8 8a2 2 0 1 1 0 4 2 2 0 0 1 0-4zm4 8H4v-1c0-1.33 2.67-2 4-2s4 .67 4 2v1zm6-1h-4v-2h4v2zm0-4h-4V9h4v2z"/>
                        </svg>
                    </div>

                    <div class="membership-info-content">
                        <span>Member ID</span>
                        <strong>{{ $member->formatted_member_id ?? '-' }}</strong>
                    </div>

                </div>

                <!-- Membership Status -->
                <div class="membership-info-item">

                    <div class="membership-info-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 2a10 10 0 1 0 10 10A10.01 10.01 0 0 0 12 2zm-1 15-5-5 1.41-1.41L11 14.17l5.59-5.59L18 10z"/>
                        </svg>
                    </div>

                    <div class="membership-info-content">
                        <span>Membership Status</span>

                        @if($member->membership_status === 'Active')
                            <strong class="member-status-active">
                                Active
                            </strong>

                        @elseif($member->membership_status === 'Inactive')
                            <strong class="member-status-inactive">
                                Inactive
                            </strong>

                        @else
                            <strong>
                                {{ $member->membership_status ?? '-' }}
                            </strong>
                        @endif

                    </div>

                </div>

                <!-- Registration Date -->
                <div class="membership-info-item">

                    <div class="membership-info-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/>
                        </svg>
                    </div>

                    <div class="membership-info-content">
                        <span>Registration Date</span>

                        <strong>
                            {{ $member->registration_date
                                ? \Carbon\Carbon::parse($member->registration_date)->format('d/m/Y')
                                : '-' }}
                        </strong>
                    </div>

                </div>


                <!-- Membership Expiry Date -->
                <div class="membership-info-item">

                    <div class="membership-info-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11zm-7-9h5v5h-5z"/>
                        </svg>
                    </div>

                    <div class="membership-info-content">
                        <span>Membership Expiry Date</span>

                        <strong>
                            {{ $member->membership_expiry_date
                                ? \Carbon\Carbon::parse($member->membership_expiry_date)->format('d/m/Y')
                                : '-' }}
                        </strong>
                    </div>

                </div>

            </div>


        </section>


        <!-- =========================================
             RECENT ACTIVITY
        ========================================== -->

        <section class="dashboard-section">

            <div class="section-heading">
                <div>
                    <h2>Recent Activity</h2>
                    <p>Your latest payments and claims.</p>
                </div>
            </div>


            <div class="dashboard-activity-grid">

                <!-- Recent Payments -->
                <div class="dashboard-panel">

                    <div class="panel-header">
                        <h3>Recent Payments</h3>
                    </div>


                    <div class="dashboard-table-wrapper">

                        <table class="professional-dashboard-table">

                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                            </thead>

                            <tbody>

                                @forelse($recentPayments as $payment)

                                    <tr>

                                        <td>
                                            {{ $payment->payment_date
                                                ? $payment->payment_date->format('d/m/Y')
                                                : '-' }}
                                        </td>

                                        <td>
                                            RM {{ number_format($payment->amount, 2) }}
                                        </td>

                                        <td>

                                            <span class="table-status-badge
                                                {{ strtolower($payment->payment_status ?? '') === 'approved'
                                                    || strtolower($payment->payment_status ?? '') === 'successful'
                                                    ? 'table-status-success'
                                                    : 'table-status-pending' }}">

                                                {{ strtoupper($payment->payment_status ?? '-') }}

                                            </span>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="3"
                                            class="dashboard-empty-state">
                                            No payments yet.
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>


                <!-- Recent Claims -->
                <div class="dashboard-panel">

                    <div class="panel-header">
                        <h3>Recent Claims</h3>
                    </div>


                    <div class="dashboard-table-wrapper">

                        <table class="professional-dashboard-table">

                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Remark</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($recentClaims as $claim)

                                    <tr>

                                        <td>
                                            {{ $claim->claim_date
                                                ? $claim->claim_date->format('d/m/Y')
                                                : '-' }}
                                        </td>

                                        <td>
                                            RM {{ number_format($claim->claim_amount ?? 0, 2) }}
                                        </td>

                                        <td>
                                            <span class="table-status-badge
                                                {{ strtolower($claim->status) === 'approved'
                                                    ? 'table-status-success'
                                                    : 'table-status-pending' }}">

                                                {{ strtoupper($claim->status) }}

                                            </span>
                                        </td>

                                        <td>
                                            @if($claim->status === 'Rejected' && $claim->rejection_remark)
                                                {{ $claim->rejection_remark }}
                                            @else
                                                -
                                            @endif
                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="4" class="dashboard-empty-state">
                                            No claims yet.
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </section>

        <div style="height: 30px; flex-shrink: 0;"></div>

    </main>

    <script>
        function toggleNotificationDropdown(event) {
            event.stopPropagation();

            const dropdown = document.getElementById('notificationDropdown');
            const badge = document.getElementById('notificationBadge');

            dropdown.classList.toggle('show');

            if (dropdown.classList.contains('show') && badge) {

                fetch('{{ route("member.notifications.read") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        badge.remove();
                    }
                });
            }
        }

        document.addEventListener('click', function(event) {
            const wrapper = document.querySelector('.notification-dropdown-wrapper');
            const dropdown = document.getElementById('notificationDropdown');

            if (wrapper && !wrapper.contains(event.target)) {
                dropdown.classList.remove('show');
            }
        });
    </script>

</body>
</html>