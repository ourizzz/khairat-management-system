<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment History - Khairat Management System</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="dashboard-body">

    <aside class="dashboard-sidebar">

        <div class="sidebar-profile">
            <div class="profile-icon">
                <img
                    src="{{ Auth::user()->profile_photo
                        ? asset('storage/' . Auth::user()->profile_photo)
                        : asset('images/profile pic.png') }}"
                    alt="Profile">
            </div>

            <div class="sidebar-user-info">
                <h3>{{ Auth::user()->name }}</h3>
                <span>Member</span>
            </div>
        </div>

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

    <main class="dashboard-main member-history-main">

        <header class="member-dashboard-header">
            <div class="dashboard-heading">
                <h1>Payment History</h1>
                <p>View your Khairat registration and renewal payment records.</p>
            </div>
        </header>

        <section class="member-history-section">

            <div class="registration-section-heading">
                <span>PAYMENTS</span>
                <h2>Transaction Records</h2>
            </div>

            <div class="professional-history-card">

                <div class="professional-history-table-wrapper">
                    <table class="professional-history-table">
                        <thead>
                            <tr>
                                <th>Payment Type</th>
                                <th>Payment Date</th>
                                <th>Payment Status</th>
                                <th>Amount</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($payments as $payment)
                                <tr>
                                    <td>
                                        <span class="history-payment-type">
                                            {{ strtoupper($payment->payment_type) }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $payment->payment_date
                                            ? $payment->payment_date->format('d/m/Y')
                                            : '-' }}
                                    </td>

                                    <td>
                                        @php
                                            $status = strtolower($payment->payment_status ?? '');
                                        @endphp

                                        <span class="history-status-badge
                                            {{ in_array($status, ['successful', 'approved']) ? 'history-status-success' : '' }}
                                            {{ $status === 'pending' ? 'history-status-pending' : '' }}
                                            {{ in_array($status, ['rejected', 'failed']) ? 'history-status-failed' : '' }}">
                                            {{ strtoupper($payment->payment_status ?? '-') }}
                                        </span>
                                    </td>

                                    <td>
                                        <strong class="history-amount">
                                            RM {{ number_format($payment->amount, 2) }}
                                        </strong>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <div class="professional-history-empty">
                                            <h3>No Payment History</h3>
                                            <p>Your registration and renewal payment records will appear here.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

        </section>

    </main>

</body>
</html>
