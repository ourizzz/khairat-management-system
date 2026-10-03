<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile - Khairat Management System</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="normal-professional-body">

    <!-- =========================================
         SIDEBAR
    ========================================== -->
    <aside class="normal-professional-sidebar">

        <div class="normal-professional-profile">

            <div class="normal-professional-avatar">
                <img src="{{ asset('images/profile pic.png') }}" alt="Profile">
            </div>

            <div class="normal-professional-user">
                <h3>{{ Auth::user()->name }}</h3>
                <span>Normal User</span>
            </div>

        </div>


        <nav class="normal-professional-menu">

            <p class="normal-professional-label">MENU</p>

            <a href="{{ route('normal.dashboard') }}"
               class="normal-professional-menu-item">

                <span class="normal-professional-menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                    </svg>
                </span>

                <span>Dashboard</span>
            </a>


            <p class="normal-professional-label">ACCOUNT</p>

            <a href="{{ route('normal.profile') }}"
               class="normal-professional-menu-item active">

                <span class="normal-professional-menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </span>

                <span>Profile</span>
            </a>


            <p class="normal-professional-label">KHAIRAT</p>

            <a href="{{ route('normal.register.khairat') }}"
               class="normal-professional-menu-item">

                <span class="normal-professional-menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 4H6V5h12v2zm0 4H6V9h12v2zm-5 4H6v-2h7v2z"/>
                    </svg>
                </span>

                <span>Registration</span>
            </a>


            <a href="#"
               class="normal-professional-menu-item"
               onclick="alert('You must register as a Khairat member first.'); return false;">

                <span class="normal-professional-menu-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 4V1L8 5l4 4V6c3.31 0 6 2.69 6 6 0 1.01-.25 1.96-.69 2.79l1.46 1.46A7.94 7.94 0 0 0 20 12c0-4.42-3.58-8-8-8zm-6 6c0-1.01.25-1.96.69-2.79L5.23 5.75A7.94 7.94 0 0 0 4 10c0 4.42 3.58 8 8 8v3l4-4-4-4v3c-3.31 0-6-2.69-6-6z"/>
                    </svg>
                </span>

                <span>Renewal</span>
            </a>


            <a href="#"
               class="normal-professional-menu-item"
               onclick="alert('You must register as a Khairat member first.'); return false;">

                <span class="normal-professional-menu-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm1 7V3.5L18.5 9H15zm-4 9-3.5-3.5 1.41-1.41L11 15.17l4.59-4.59L17 12l-6 6z"/>
                    </svg>
                </span>

                <span>Claims</span>
            </a>


            <a href="#"
               class="normal-professional-menu-item"
               onclick="alert('You must register as a Khairat member first.'); return false;">

                <span class="normal-professional-menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M13 3a9 9 0 1 0 8.95 10H19.9A7 7 0 1 1 13 5v3l4-4-4-4v3zm-1 5h2v5h4v2h-6V8z"/>
                    </svg>
                </span>

                <span>History</span>
            </a>

        </nav>


        <div class="normal-professional-logout">

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                        class="normal-professional-logout-btn">

                    <span class="normal-professional-menu-icon">
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
    <main class="normal-professional-main">

        <!-- Header -->
        <header class="normal-professional-page-header">

            <span class="normal-professional-eyebrow">
                ACCOUNT
            </span>

            <h1>My Profile</h1>

            <p>
                View your account information and personal details.
            </p>

        </header>


        <!-- Success Message -->
        @if(session('success'))
            <div class="normal-profile-success">
                {{ session('success') }}
            </div>
        @endif


        <!-- Validation Errors -->
        @if($errors->any())

            <div class="normal-profile-error">

                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach

            </div>

        @endif


        <!-- =========================================
             PROFILE CARD
        ========================================== -->
        <section class="normal-profile-card">

            <!-- Profile Header -->
            <div class="normal-profile-card-header">

                <div class="normal-profile-large-avatar">
                    <img src="{{ asset('images/profile pic.png') }}"
                         alt="Profile">
                </div>

                <div class="normal-profile-card-user">

                    <h2>{{ Auth::user()->name }}</h2>

                    <p>{{ Auth::user()->email }}</p>

                    <span>Normal User</span>

                </div>

            </div>


            <!-- =========================================
                 ORIGINAL PROFILE FORM
                 Functionality preserved
            ========================================== -->
            <form method="POST"
                  action="{{ route('normal.profile.update') }}"
                  class="normal-profile-details">

                @csrf
                @method('PUT')


                <!-- NAME -->
                <div class="normal-profile-detail-box">

                    <span class="normal-profile-detail-label">
                        Name
                    </span>

                    <strong>
                        {{ Auth::user()->name }}
                    </strong>

                    <input type="text"
                           name="name"
                           class="profile-input profile-edit-input"
                           value="{{ old('name', Auth::user()->name) }}"
                           required
                           hidden>

                </div>


                <!-- IC NUMBER -->
                <div class="normal-profile-detail-box">

                    <span class="normal-profile-detail-label">
                        IC Number
                    </span>

                    <strong>-</strong>

                </div>


                <!-- PHONE -->
                <div class="normal-profile-detail-box">

                    <span class="normal-profile-detail-label">
                        Phone
                    </span>

                    <strong>-</strong>

                </div>


                <!-- EMAIL -->
                <div class="normal-profile-detail-box">

                    <span class="normal-profile-detail-label">
                        Email
                    </span>

                    <strong>
                        {{ Auth::user()->email }}
                    </strong>

                    <input type="email"
                           name="email"
                           class="profile-input profile-edit-input"
                           value="{{ old('email', Auth::user()->email) }}"
                           required
                           hidden>

                </div>


                <!-- ADDRESS -->
                <div class="normal-profile-detail-box normal-profile-wide">

                    <span class="normal-profile-detail-label">
                        Address
                    </span>

                    <strong>-</strong>

                </div>

            </form>

        </section>

    </main>

</body>
</html>