<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Claims History - Khairat Management System</title>

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
                    <svg viewBox="0 0 24 24"><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/></svg>
                </span>
                <span>Dashboard</span>
            </a>

            <p class="professional-admin-label">MEMBERS</p>

            <a href="{{ route('admin.members') }}"
               class="professional-admin-menu-item {{ request()->routeIs('admin.members') ? 'active' : '' }}">
                <span class="professional-admin-menu-icon">
                    <svg viewBox="0 0 24 24"><path d="M16 11c1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3 1.34 3 3 3zM8 11c1.66 0 3-1.34 3-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm8 2c-2 0-6 1-6 3v3h12v-3c0-2-4-3-6-3zM8 13c-2.33 0-7 1.17-7 3.5V19h7v-3c0-.85.33-1.56.91-2.14C8.61 13.81 8.3 13 8 13z"/></svg>
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
                <span>Registrations List</span>
            </a>

            <p class="professional-admin-label">RENEWALS</p>

            <a href="{{ route('admin.renewals') }}"
                class="professional-admin-menu-item {{ request()->routeIs('admin.renewals') ? 'active' : '' }}">
                    <span class="professional-admin-menu-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 2a10 10 0 1 0 10 10A10.01 10.01 0 0 0 12 2zm1 11h-2V6h2zm0 4h-2v-2h2z"/>
                        </svg>
                    </span>
                    <span>Renewals List</span>
                </a>

            <p class="professional-admin-label">CLAIMS</p>

            <a href="{{ route('admin.claims') }}"
               class="professional-admin-menu-item {{ request()->routeIs('admin.claims') ? 'active' : '' }}">
                <span class="professional-admin-menu-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 2a10 10 0 1 0 10 10A10.01 10.01 0 0 0 12 2zm1 11h-2V6h2zm0 4h-2v-2h2z"/>
                    </svg>
                </span>
                <span>Claim List</span>
            </a>

            <a href="{{ route('admin.claims.history') }}"
               class="professional-admin-menu-item {{ request()->routeIs('admin.claims.history') ? 'active' : '' }}">
                <span class="professional-admin-menu-icon">
                    <svg viewBox="0 0 24 24"><path d="M13 3a9 9 0 1 0 8.95 10H19.9A7 7 0 1 1 13 5v3l4-4-4-4v3zm-1 5h2v5h4v2h-6V8z"/></svg>
                </span>
                <span>Claim History</span>
            </a>

        </nav>

        <div class="professional-admin-logout">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="professional-admin-logout-btn">
                    <span class="professional-admin-menu-icon">
                        <svg viewBox="0 0 24 24"><path d="M10 17v-3H3v-4h7V7l5 5-5 5zm9-14H9c-1.1 0-2 .9-2 2v3h2V5h10v14H9v-3H7v3c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/></svg>
                    </span>
                    <span>Log Out</span>
                </button>
            </form>
        </div>

    </aside>

    <main class="professional-admin-main professional-claim-history-main">

        <header class="professional-admin-page-header">
            <div>
                <p class="professional-admin-eyebrow">CLAIM MANAGEMENT</p>
                <h1>Claim History</h1>
                <p>View previously approved and rejected Khairat claim records.</p>
            </div>
        </header>

        <section class="professional-claim-history-table-card">

            <div class="professional-claim-history-table-wrapper">

                <table class="professional-claim-history-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Deceased</th>
                            <th>Relationship</th>
                            <th>Claim Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Remark</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($claims as $claim)

                            <tr>
                                <td>
                                    <strong class="professional-claim-history-name">
                                        {{ $claim->member->user->name }}
                                    </strong>
                                </td>

                                <td>{{ $claim->deceased_name }}</td>

                                <td>{{ $claim->relationship }}</td>

                                <td>{{ $claim->created_at->format('d/m/Y') }}</td>

                                <td>
                                    <strong class="professional-claim-history-amount">
                                        RM {{ $claim->claim_amount }}
                                    </strong>
                                </td>

                                <td>
                                    @if($claim->status == 'Approved')
                                        <span class="professional-history-status professional-history-approved">
                                            APPROVED
                                        </span>
                                    @elseif($claim->status == 'Rejected')
                                        <span class="professional-history-status professional-history-rejected">
                                            REJECTED
                                        </span>
                                    @else
                                        <span class="professional-history-status professional-history-other">
                                            {{ $claim->status }}
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    @if($claim->status == 'Rejected' && $claim->rejection_remark)
                                        {{ $claim->rejection_remark }}
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="7">
                                    <div class="professional-claim-history-empty">
                                        <h3>No Claim History</h3>
                                        <p>Approved and rejected Khairat claim records will appear here.</p>
                                    </div>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>
                </table>

            </div>

        </section>

    </main>

</body>
</html>
