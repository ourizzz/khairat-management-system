<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dependents - Khairat Management System</title>

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

            <a href="{{ route('member.profile') }}" class="menu-item">

                <span class="menu-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 12c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm0 2c-3.33 0-10 1.67-10 5v3h20v-3c0-3.33-6.67-5-10-5z"/>
                    </svg>
                </span>

                Profile
            </a>


            <a href="{{ route('member.dependents') }}" class="menu-item active">

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

    <main class="dashboard-main member-dependent-main">

        <div class="member-dashboard-header">

            <div class="dashboard-heading">
                <h1>Dependents</h1>
                <p>
                    View your registered dependents and their current eligibility.
                </p>
            </div>

        </div>


        <!-- Messages -->

        @if(session('success'))

            <div class="dependent-success-message">
                {{ session('success') }}
            </div>

        @endif


        @if($errors->any())

            <div class="dependent-error-message">

                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach

            </div>

        @endif


        <!-- =========================================
             DEPENDENT DETAILS
        ========================================== -->

        <section class="member-dependent-section">

            <div class="section-heading">

                <div>
                    <h2>Registered Dependents</h2>
                    <p>
                        Dependent eligibility is based on information submitted during registration.
                    </p>
                </div>

            </div>


            <div class="dependent-table-card">

                <div class="dependent-table-wrapper">

                    <table class="dependent-table">

                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>IC Number</th>
                                <th>Age</th>
                                <th>Relationship</th>
                                <th>Eligibility</th>
                                <th>Document</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($dependents as $dependent)

                                @php
                                    // Age recorded during registration
                                    $age = $dependent->age !== null
                                        ? (int) $dependent->age
                                        : \Carbon\Carbon::parse($dependent->date_of_birth)->age;

                                    $isChild = $dependent->relationship === 'Anak';

                                    // Children aged 21–25 require student verification
                                    $needsDocument =
                                        $isChild &&
                                        $age >= 21 &&
                                        $age <= 25;

                                    $hasDocument =
                                        !empty($dependent->student_proof_path);

                                    $eligible =
                                        !$isChild ||
                                        $age < 21 ||
                                        (
                                            $needsDocument &&
                                            $dependent->is_student &&
                                            $hasDocument
                                        );

                                    if ($isChild && $age >= 26) {
                                        $eligible = false;
                                    }
                                @endphp


                                <tr>

                                    <!-- Name -->
                                    <td>
                                        <strong class="dependent-table-name">
                                            {{ $dependent->full_name }}
                                        </strong>
                                    </td>


                                    <!-- IC Number -->
                                    <td>
                                        {{ $dependent->ic_number }}
                                    </td>


                                    <!-- Age -->
                                    <td>
                                        {{ $age }}
                                    </td>


                                    <!-- Relationship -->
                                    <td>
                                        {{ $dependent->relationship }}
                                    </td>


                                    <!-- Eligibility -->
                                    <td>

                                        @if($eligible)

                                            <span class="verification-approved">
                                                Eligible
                                            </span>

                                        @else

                                            <span class="verification-required">
                                                Not Eligible
                                            </span>

                                        @endif

                                    </td>


                                    <!-- Document -->
                                    <td>

                                        @if($needsDocument)

                                            @if($hasDocument)

                                                <a href="{{ route(
                                                        'member.dependents.view-document',
                                                        $dependent->dependent_id
                                                    ) }}"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                class="dependent-document-btn">

                                                    <svg viewBox="0 0 24 24">
                                                        <path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm1 7V3.5L18.5 9H15z"/>
                                                    </svg>

                                                    <span>View</span>

                                                </a>

                                            @else

                                                <form method="POST"
                                                    action="{{ route(
                                                        'member.dependents.student-document',
                                                        $dependent->dependent_id
                                                    ) }}"
                                                    enctype="multipart/form-data"
                                                    class="dependent-table-upload">

                                                    @csrf

                                                    <label class="dependent-upload-btn">

                                                        <svg viewBox="0 0 24 24">
                                                            <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                                                        </svg>

                                                        <span>Upload</span>

                                                        <input type="file"
                                                            name="student_document"
                                                            accept=".pdf,.jpg,.jpeg,.png"
                                                            required
                                                            onchange="this.form.submit()">

                                                    </label>

                                                </form>

                                            @endif

                                        @else

                                            <span class="dependent-no-document">
                                                —
                                            </span>

                                        @endif

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td colspan="6"
                                        class="dependent-table-empty">

                                        <div class="dependent-empty-icon">

                                            <svg viewBox="0 0 24 24">
                                                <path d="M16 11c1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3 1.34 3 3 3zM8 11c1.66 0 3-1.34 3-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V20h14v-3.5C15 14.17 10.33 13 8 13z"/>
                                            </svg>

                                        </div>

                                        <strong>No Dependents Registered</strong>

                                        <p>
                                            No dependent information is currently available for your membership.
                                        </p>

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