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

<body class="dashboard-body">

    <!-- =========================================
         SIDEBAR
    ========================================== -->

    <aside class="dashboard-sidebar">

        <div class="sidebar-profile">

            <div class="profile-icon">
                <img src="{{ Auth::user()->profile_photo
                    ? \Illuminate\Support\Facades\Storage::url(Auth::user()->profile_photo)
                    : asset('images/profile pic.png') }}"
                    alt="Profile">
            </div>

            <div class="sidebar-user-info">
                <h3>{{ Auth::user()->name }}</h3>
                <span>Member</span>
            </div>

        </div>


        <nav class="sidebar-menu">

            <div class="sidebar-section-label">MENU</div>

            <a href="{{ route('member.dashboard') }}" class="menu-item">

                <span class="menu-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M3 3h8v8H3V3zm10 0h8v8h-8V3zM3 13h8v8H3v-8zm10 0h8v8h-8v-8z"/>
                    </svg>
                </span>

                Dashboard
            </a>


            <div class="sidebar-section-label">ACCOUNT</div>

            <a href="{{ route('member.profile') }}" class="menu-item active">

                <span class="menu-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 12c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm0 2c-3.33 0-10 1.67-10 5v3h20v-3c0-3.33-6.67-5-10-5z"/>
                    </svg>
                </span>

                Profile
            </a>


            <a href="{{ route('member.dependents') }}" class="menu-item">

                <span class="menu-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M16 11c1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3 1.34 3 3 3zM8 11c1.66 0 3-1.34 3-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V20h14v-3.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V20h6v-3.5c0-2.33-4.67-3.5-7-3.5z"/>
                    </svg>
                </span>

                Dependents
            </a>


            <div class="sidebar-section-label">KHAIRAT</div>

            <a href="{{ route('member.registration') }}" class="menu-item">

                <span class="menu-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-3 14H8v-2h8v2zm0-4H8v-2h8v2zm0-4H8V7h8v2z"/>
                    </svg>
                </span>

                Registration
            </a>


            <a href="{{ route('member.renewal') }}" class="menu-item">

                <span class="menu-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 4V1L8 5l4 4V6c3.31 0 6 2.69 6 6 0 1.01-.25 1.96-.69 2.79l1.46 1.46A7.94 7.94 0 0 0 20 12c0-4.42-3.58-8-8-8zm-6 6c0-1.01.25-1.96.69-2.79L5.23 5.75A7.94 7.94 0 0 0 4 10c0 4.42 3.58 8 8 8v3l4-4-4-4v3c-3.31 0-6-2.69-6-6z"/>
                    </svg>
                </span>

                Renewal
            </a>


            <a href="{{ route('member.claim') }}" class="menu-item">

                <span class="menu-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm1 7V3.5L18.5 9H15zm-4 9-3.5-3.5 1.41-1.41L11 15.17l4.59-4.59L17 12l-6 6z"/>
                    </svg>
                </span>

                Claims
            </a>


            <a href="{{ route('member.history') }}" class="menu-item">

                <span class="menu-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M13 3a9 9 0 1 0 8.95 10H20a7 7 0 1 1-2.05-4.95L15 11h7V4l-2.64 2.64A8.96 8.96 0 0 0 13 3zm-1 5v6l5 3 .75-1.23-4.25-2.52V8H12z"/>
                    </svg>
                </span>

                History
            </a>

        </nav>


        <div class="sidebar-logout">

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="logout-btn">

                    <span class="menu-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M10 17v-2H3V9h7V7l5 5-5 5zm9-14H9c-1.1 0-2 .9-2 2v2h2V5h10v14H9v-2H7v2c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/>
                        </svg>
                    </span>

                    Log Out
                </button>

            </form>

        </div>

    </aside>


    <!-- =========================================
         MAIN CONTENT
    ========================================== -->

    <main class="dashboard-main member-profile-main">

        <!-- Page Header -->

        <div class="member-dashboard-header">

            <div class="dashboard-heading">
                <h1>My Profile</h1>
                <p>View and update your personal information.</p>
            </div>

        </div>


        <!-- =========================================
             PROFILE OVERVIEW
        ========================================== -->

        <section class="member-profile-overview">

            <div class="member-profile-photo-wrapper">

                <div class="member-profile-large-photo"
                     onclick="document.getElementById('profile-photo-input').click()"
                     onkeydown="if (event.key === 'Enter' || event.key === ' ') {
                         event.preventDefault();
                         document.getElementById('profile-photo-input').click();
                     }"
                     role="button"
                     tabindex="0"
                     aria-label="Change profile picture"
                     title="Click to change profile picture">

                    <img src="{{ Auth::user()->profile_photo
                        ? \Illuminate\Support\Facades\Storage::url(Auth::user()->profile_photo)
                        : asset('images/profile pic.png') }}"
                        alt="Profile">

                    <div class="profile-photo-edit-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 15.2c1.77 0 3.2-1.43 3.2-3.2s-1.43-3.2-3.2-3.2-3.2 1.43-3.2 3.2 1.43 3.2 3.2 3.2zM9 2 7.17 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2h-3.17L15 2H9zm3 16c-3.31 0-6-2.69-6-6s2.69-6 6-6 6 2.69 6 6-2.69 6-6 6z"/>
                        </svg>
                    </div>

                </div>


                <div class="member-profile-name">
                    <h2>{{ $member->full_name }}</h2>
                    <p>Khairat Member</p>
                    <span>Click the photo to change your profile picture</span>
                </div>

            </div>

        </section>


        <!-- Profile picture upload.
             Functionality remains unchanged. -->

        <form id="profile-photo-form"
              method="POST"
              action="{{ route('member.profile.photo') }}"
              enctype="multipart/form-data">

            @csrf

            <input type="file"
                   id="profile-photo-input"
                   name="profile_photo"
                   accept=".jpg,.jpeg,.png"
                   style="display: none;"
                   onchange="if (this.files.length) this.form.submit()">

        </form>


        <!-- =========================================
             PERSONAL INFORMATION
        ========================================== -->

        <section class="member-profile-section">

            <div class="section-heading">
                <div>
                    <h2>Personal Information</h2>
                    <p>Manage your personal and contact details.</p>
                </div>
            </div>


            <form method="POST"
                  action="{{ route('member.profile.update') }}"
                  class="member-profile-form">

                @csrf
                @method('PUT')


                @if(session('success'))

                    <div class="profile-success">
                        {{ session('success') }}
                    </div>

                @endif


                @if($errors->any())

                    <div class="alert profile-error">

                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach

                    </div>

                @endif


                <!-- Row / Column Information Grid -->

                <div class="member-profile-grid">


                    <!-- NAME -->

                    <div class="member-profile-field">

                        <label>Name</label>

                        <span>
                            {{ $member->full_name }}
                        </span>

                    </div>


                    <!-- IC NUMBER -->

                    <div class="member-profile-field">

                        <label>IC Number</label>

                        <span>
                            {{ $member->ic_number }}
                        </span>

                    </div>


                    <!-- PHONE -->

                    <div class="member-profile-field">

                        <label>Phone Number</label>

                        <span class="profile-value">
                            {{ $member->phone }}
                        </span>

                        <input type="text"
                               name="phone"
                               class="profile-input profile-edit-input"
                               value="{{ old('phone', $member->phone) }}"
                               required
                               hidden>

                    </div>


                    <!-- EMAIL -->

                    <div class="member-profile-field">

                        <label>Email Address</label>

                        <span class="profile-value">
                            {{ $member->email }}
                        </span>

                        <input type="email"
                               name="email"
                               class="profile-input profile-edit-input"
                               value="{{ old('email', $member->email) }}"
                               required
                               hidden>

                    </div>


                    <!-- ADDRESS -->

                    <div class="member-profile-field member-profile-field-wide">

                        <label>Address</label>

                        <span class="profile-value">
                            {{ $member->address }}
                        </span>

                        <input type="text"
                               name="address"
                               class="profile-input profile-edit-input"
                               value="{{ old('address', $member->address) }}"
                               required
                               hidden>

                    </div>

                <!-- Buttons -->

                <div class="member-profile-actions">

                    <button type="button"
                            class="btn-edit"
                            onclick="enableEdit()">

                        Edit Profile

                    </button>


                    <button type="submit"
                            class="btn-save"
                            id="profile-save"
                            hidden>

                        Save Changes

                    </button>

                </div>

            </form>

        </section>

        <div style="height: 30px; flex-shrink: 0;"></div>

    </main>


    <!-- =========================================
         EXISTING EDIT FUNCTION
    ========================================== -->

    <script>

        function enableEdit() {

            document.querySelectorAll('.profile-value').forEach(element => {
                element.hidden = true;
            });

            document.querySelectorAll('.profile-edit-input').forEach(input => {
                input.hidden = false;
            });

            document.querySelector('.btn-edit').hidden = true;

            document.getElementById('profile-save').hidden = false;
        }

    </script>

</body>
</html>