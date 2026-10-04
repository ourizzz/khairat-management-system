<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Khairat Management System</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="admin-body professional-admin-body">

    <aside class="professional-admin-sidebar">

        <div class="professional-admin-profile">
            <div class="professional-admin-avatar">
                <span>{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
            </div>

            <div class="professional-admin-user">
                <h3>{{ Auth::user()->name }}</h3>
                <span>Administrator</span>
            </div>
        </div>

        <nav class="professional-admin-menu">

            <p class="professional-admin-label">MENU</p>

            <a href="{{ route('admin.dashboard') }}"
               class="professional-admin-menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <span class="professional-admin-menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                    </svg>
                </span>
                <span>Dashboard</span>
            </a>

            <p class="professional-admin-label">MEMBERS</p>

            <a href="{{ route('admin.members') }}"
               class="professional-admin-menu-item {{ request()->routeIs('admin.members') ? 'active' : '' }}">
                <span class="professional-admin-menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M16 11c1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3 1.34 3 3 3zM8 11c1.66 0 3-1.34 3-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm8 2c-2 0-6 1-6 3v3h12v-3c0-2-4-3-6-3zM8 13c-2.33 0-7 1.17-7 3.5V19h7v-3c0-.85.33-1.56.91-2.14C8.61 13.81 8.3 13 8 13z"/>
                    </svg>
                </span>
                <span>Member List</span>
            </a>

            <a href="{{ route('admin.pending') }}"
               class="professional-admin-menu-item {{ request()->routeIs('admin.pending') ? 'active' : '' }}">
                <span class="professional-admin-menu-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 2a10 10 0 1 0 10 10A10.01 10.01 0 0 0 12 2zm1 11h-2V6h2zm0 4h-2v-2h2z"/>
                    </svg>
                </span>
                <span>New Registrations</span>
            </a>

            <p class="professional-admin-label">RENEWALS</p>

            <a href="{{ route('admin.renewals') }}"
               class="professional-admin-menu-item {{ request()->routeIs('admin.renewals') ? 'active' : '' }}">
                <span class="professional-admin-menu-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 2a10 10 0 1 0 10 10A10.01 10.01 0 0 0 12 2zm1 11h-2V6h2zm0 4h-2v-2h2z"/>
                    </svg>
                </span>
                <span>Recent Renewals</span>
            </a>

            <p class="professional-admin-label">CLAIMS</p>

            <a href="{{ route('admin.claims') }}"
               class="professional-admin-menu-item {{ request()->routeIs('admin.claims') ? 'active' : '' }}">
                <span class="professional-admin-menu-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm1 7V3.5L18.5 9H15zm-4 9-3.5-3.5 1.41-1.41L11 15.17l4.59-4.59L17 12l-6 6z"/>
                    </svg>
                </span>
                <span>Claim List</span>
            </a>

            <a href="{{ route('admin.claims.history') }}"
               class="professional-admin-menu-item {{ request()->routeIs('admin.claims.history') ? 'active' : '' }}">
                <span class="professional-admin-menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M13 3a9 9 0 1 0 8.95 10H19.9A7 7 0 1 1 13 5v3l4-4-4-4v3zm-1 5h2v5h4v2h-6V8z"/>
                    </svg>
                </span>
                <span>Claim History</span>
            </a>

        </nav>

        <div class="professional-admin-logout">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="professional-admin-logout-btn">
                    <span class="professional-admin-menu-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M10 17v-3H3v-4h7V7l5 5-5 5zm9-14H9c-1.1 0-2 .9-2 2v3h2V5h10v14H9v-3H7v3c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/>
                        </svg>
                    </span>
                    <span>Log Out</span>
                </button>
            </form>
        </div>

    </aside>

    <main class="professional-admin-main">

        <header class="professional-admin-header">
            <div>
                <p class="professional-admin-eyebrow">ADMIN OVERVIEW</p>
                <h1>Welcome, {{ Auth::user()->name }}!</h1>
                <p class="professional-admin-subtitle">
                    Monitor membership, renewals, claims and Khairat collection.
                </p>
            </div>
        </header>

        <section class="professional-admin-stat-grid">

            <div class="professional-admin-stat-card">
                <div class="professional-admin-stat-top">
                    <span>Total Members</span>
                    <div class="professional-admin-stat-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M16 11c1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3 1.34 3 3 3zM8 11c1.66 0 3-1.34 3-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm8 2c-2 0-6 1-6 3v3h12v-3c0-2-4-3-6-3zM8 13c-2.33 0-7 1.17-7 3.5V19h7v-3c0-.85.33-1.56.91-2.14C8.61 13.81 8.3 13 8 13z"/>
                        </svg>
                    </div>
                </div>
                <strong>{{ $totalMembers }}</strong>
                <p>Active registered members</p>
            </div>

            <div class="professional-admin-stat-card">
                <div class="professional-admin-stat-top">
                    <span>New Registrations</span>
                    <div class="professional-admin-stat-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M12 2a10 10 0 1 0 10 10A10.01 10.01 0 0 0 12 2zm1 11h-2V6h2zm0 4h-2v-2h2z"/>
                        </svg>
                    </div>
                </div>
                <strong>{{ $pendingRegistrations }}</strong>
                <p>Applications awaiting review</p>
            </div>

            <div class="professional-admin-stat-card">
                <div class="professional-admin-stat-top">
                    <span>Recent Renewals</span>
                    <div class="professional-admin-stat-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 2a10 10 0 1 0 10 10A10.01 10.01 0 0 0 12 2zm1 11h-2V6h2zm0 4h-2v-2h2z"/>
                        </svg>
                    </div>
                </div>
                <strong>{{ $pendingRenewals }}</strong>
                <p>Renewals awaiting approval</p>
            </div>

            <div class="professional-admin-stat-card">
                <div class="professional-admin-stat-top">
                    <span>Pending Claims</span>
                    <div class="professional-admin-stat-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M20 8h-3V4H3c-1.1 0-2 .9-2 2v11h2c0 1.66 1.34 3 3 3s3-1.34 3-3h6c0 1.66 1.34 3 3 3s3-1.34 3-3h2v-5l-3-4z"/>
                        </svg>
                    </div>
                </div>
                <strong>{{ $pendingClaims }}</strong>
                <p>Claims awaiting review</p>
            </div>

            <div class="professional-admin-stat-card professional-admin-collection-card">
                <div class="professional-admin-stat-top">
                    <span>Total Collection</span>
                    <div class="professional-admin-stat-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M12 1C5.93 1 1 5.93 1 12s4.93 11 11 11 11-4.93 11-11S18.07 1 12 1zm1 17.93V20h-2v-1.09c-1.67-.24-3-1.24-3-2.91h2c0 .76.83 1.2 2 1.2 1.09 0 2-.36 2-1.2 0-.71-.62-1.05-2.41-1.48C9.36 13.98 8 13.21 8 11.3c0-1.55 1.19-2.64 3-2.94V7h2v1.35c1.7.29 2.77 1.35 2.87 2.65h-2.03c-.12-.62-.72-1.1-1.84-1.1-1.04 0-2 .39-2 1.3 0 .69.64 1.02 2.53 1.48C14.73 13.22 16 14.03 16 15.9c0 1.7-1.26 2.72-3 3.03z"/>
                        </svg>
                    </div>
                </div>
                <strong>RM {{ number_format($totalCollection, 2) }}</strong>
                <p>Successful and approved payments</p>
            </div>

        </section>

        <section class="professional-admin-activity">
            <div class="professional-admin-section-heading">
                <div>
                    <span>ACTIVITY</span>
                    <h2>Recent Activity</h2>
                </div>
            </div>

            <div class="professional-admin-activity-card">
                <div class="professional-admin-empty">
                    <h3>No Recent Activity</h3>
                    <p>New administrative activity will appear here.</p>
                </div>
            </div>
        </section>

    </main>

</body>
</html>
