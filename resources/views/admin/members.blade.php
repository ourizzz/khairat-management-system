<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members List - Khairat Management System</title>

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

    <main class="professional-admin-main professional-member-list-main">

        <header class="professional-admin-page-header">
            <div>
                <p class="professional-admin-eyebrow">MEMBER MANAGEMENT</p>
                <h1>Members List</h1>
                <p>View and manage registered Khairat members.</p>
            </div>

            <a href="{{ route('admin.members.create') }}" class="professional-add-member-btn">
                <span>+</span>
                Add Member
            </a>
        </header>

        <section class="professional-member-tools">

            <form method="GET" action="{{ route('admin.members') }}" class="professional-member-search">

                <div class="professional-search-input-wrap">
                    <span class="professional-search-icon">
                        <svg viewBox="0 0 24 24"><path d="M9.5 3a6.5 6.5 0 1 0 3.98 11.64L19.85 21 21 19.85l-6.36-6.37A6.5 6.5 0 0 0 9.5 3zm0 2a4.5 4.5 0 1 1 0 9 4.5 4.5 0 0 1 0-9z"/></svg>
                    </span>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search by name or IC number..."
                    >
                </div>

                <button type="submit" class="professional-search-btn">
                    Search
                </button>

            </form>

            <div class="professional-member-filters">
                <a href="{{ route('admin.members') }}"
                   class="professional-filter-btn {{ !request('status') ? 'active' : '' }}">
                    All
                </a>

                <a href="{{ route('admin.members', ['status' => 'Active']) }}"
                   class="professional-filter-btn {{ request('status') == 'Active' ? 'active' : '' }}">
                    Active
                </a>

                <a href="{{ route('admin.members', ['status' => 'Inactive']) }}"
                   class="professional-filter-btn {{ request('status') == 'Inactive' ? 'active' : '' }}">
                    Inactive
                </a>
            </div>

        </section>

        <section class="professional-member-table-card">

            <div class="professional-member-table-wrapper">

                <table class="professional-member-table">
                    <thead>
                        <tr>
                            <th>Member ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th class="professional-actions-heading">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($members as $member)

                            <tr>
                                <td>
                                    <span class="professional-member-id">
                                        {{ $member->formatted_member_id }}
                                    </span>
                                </td>

                                <td>
                                    <strong class="professional-member-name">
                                        {{ $member->user->name ?? '-' }}
                                    </strong>
                                </td>

                                <td>
                                    {{ $member->phone ?? '-' }}
                                </td>

                                <td>
                                    <span class="professional-member-status
                                        {{ strtolower($member->membership_status) == 'active'
                                            ? 'professional-status-active'
                                            : 'professional-status-inactive' }}">
                                        {{ strtoupper($member->membership_status) }}
                                    </span>
                                </td>

                                <td>
                                    <div class="professional-member-actions">

                                        <a href="{{ route('admin.registration.details', ['id' => $member->member_id, 'from' => 'members']) }}"
                                           class="professional-action-icon professional-view-icon"
                                           title="View Details"
                                           aria-label="View Details">
                                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M12 5c-7.63 0-11 7-11 7s3.37 7 11 7 11-7 11-7-3.37-7-11-7zm0 12c-4.42 0-7.13-3.23-8.3-5C4.87 10.23 7.58 7 12 7s7.13 3.23 8.3 5c-1.17 1.77-3.88 5-8.3 5zm0-8a3 3 0 1 0 0 6 3 3 0 0 0 0-6z"/>
                                            </svg>
                                        </a>

                                        <a href="{{ route('admin.members.edit', $member->member_id) }}"
                                           class="professional-action-icon professional-edit-icon"
                                           title="Edit Member"
                                           aria-label="Edit Member">
                                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zm17.71-10.04a1.003 1.003 0 0 0 0-1.42l-2.5-2.5a1.003 1.003 0 0 0-1.42 0l-1.96 1.96 3.75 3.75 2.13-1.79z"/>
                                            </svg>
                                        </a>

                                        <form action="{{ route('admin.members.destroy', $member->member_id) }}"
                                              method="POST"
                                              class="professional-delete-form"
                                              onsubmit="return confirm('Are you sure you want to delete this member?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="professional-action-icon professional-delete-icon"
                                                    title="Delete Member"
                                                    aria-label="Delete Member">
                                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zm3.46-7.12 1.41-1.41L12 11.59l1.12-1.12 1.41 1.41L13.41 13l1.12 1.12-1.41 1.41L12 14.41l-1.12 1.12-1.41-1.41L10.59 13l-1.13-1.12zM15.5 4l-1-1h-5l-1 1H5v2h14V4z"/>
                                                </svg>
                                            </button>

                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="5">
                                    <div class="professional-member-empty">
                                        <h3>No Members Found</h3>
                                        <p>No member records match your current search or filter.</p>
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
