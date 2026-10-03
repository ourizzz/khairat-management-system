<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <title>My Registration - Khairat Management System</title>



    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"

          rel="stylesheet">



    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>





<body class="dashboard-body">



    <!-- ============================================

         SIDEBAR

         ============================================ -->



    <aside class="dashboard-sidebar">



        <!-- System / Profile Area -->

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





    <!-- ============================================

         MAIN CONTENT

         ============================================ -->



    <main class="dashboard-main member-registration-main">



        @php

            $snapshot = $member->registration_snapshot ?? [];



            $applicant = $snapshot['applicant'] ?? [];

            $dependents = $snapshot['dependents'] ?? [];

            $payment = $snapshot['payment'] ?? [];

        @endphp





        <!-- PAGE HEADER -->



        <div class="member-dashboard-header">



            <div class="dashboard-heading">

                <h1>Registration</h1>

                <p>View your original Khairat membership registration information.</p>

            </div>



        </div>

        <!-- ============================================

             PART A : APPLICANT DETAILS

             ============================================ -->



        <section class="member-registration-section">



            <div class="registration-section-heading">

                <span>PART A</span>

                <h2>Applicant Details</h2>

            </div>





            <div class="registration-info-card">



                <div class="registration-info-grid registration-applicant-grid">



                    <div class="registration-info-box">

                        <span class="registration-info-label">Full Name</span>

                        <span class="registration-info-value">

                            {{ $applicant['full_name'] ?? '-' }}

                        </span>

                    </div>





                    <div class="registration-info-box">

                        <span class="registration-info-label">Phone</span>

                        <span class="registration-info-value">

                            {{ $applicant['phone'] ?? '-' }}

                        </span>

                    </div>





                    <div class="registration-info-box">

                        <span class="registration-info-label">IC Number</span>

                        <span class="registration-info-value">

                            {{ $applicant['ic_number'] ?? '-' }}

                        </span>

                    </div>





                    <div class="registration-info-box">

                        <span class="registration-info-label">Birth Date</span>

                        <span class="registration-info-value">

                            {{ $applicant['birth_date'] ?? '-' }}

                        </span>

                    </div>





                    <!-- EMAIL -->
                    <div class="registration-info-box">

                        <span class="registration-info-label">Email</span>

                        <span class="registration-info-value">
                            {{ $applicant['email'] ?? '-' }}
                        </span>

                    </div>


                    <!-- ADDRESS -->
                    <div class="registration-info-box">

                        <span class="registration-info-label">Address</span>

                        <span class="registration-info-value">
                            {{ $applicant['address'] ?? '-' }}
                        </span>

                    </div>


                    <!-- HEIR'S NAME -->
                    <div class="registration-info-box">

                        <span class="registration-info-label">Heir's Name</span>

                        <span class="registration-info-value">
                            {{ $applicant['heir_name'] ?? '-' }}
                        </span>

                    </div>


                    <!-- HEIR'S PHONE -->
                    <div class="registration-info-box">

                        <span class="registration-info-label">Heir's Phone No.</span>

                        <span class="registration-info-value">
                            {{ $applicant['heir_phone'] ?? '-' }}
                        </span>

                    </div>



                </div>



            </div>



        </section>





        <!-- ============================================
                    PART B : DEPENDENT DETAILS
        ============================================ -->

        <section class="member-registration-section">

            <div class="registration-section-heading">
                <span>PART B</span>
                <h2>Dependent Details</h2>
            </div>

            @if(count($dependents) > 0)

                <div class="dependent-list-table">

                    <!-- TABLE HEADER -->
                    <div class="dependent-list-header">

                        <div>Full Name</div>
                        <div>IC Number</div>
                        <div>Birth Date</div>
                        <div>Relationship</div>
                        <div>Student Status</div>
                        <div>Remark</div>

                    </div>


                    <!-- DEPENDENT ROWS -->
                    @foreach($dependents as $dependent)

                        @php
                            $relationshipLabels = [
                                'Anak' => 'Child',
                                'Isteri' => 'Wife',
                                'Suami' => 'Husband',
                            ];

                            $isStudying =
                                ($dependent['student_status'] ?? null) === 'Studying';

                            $hasStudentDocument =
                                !empty($dependent['student_document_path']);
                        @endphp


                        <div class="dependent-list-row">

                            <!-- FULL NAME -->
                            <div class="dependent-list-cell">
                                {{ $dependent['full_name'] ?? '-' }}
                            </div>


                            <!-- IC NUMBER -->
                            <div class="dependent-list-cell">
                                {{ $dependent['ic_number'] ?? '-' }}
                            </div>


                            <!-- BIRTH DATE -->
                            <div class="dependent-list-cell">
                                {{ $dependent['birth_date'] ?? '-' }}
                            </div>


                            <!-- RELATIONSHIP -->
                            <div class="dependent-list-cell">
                                {{
                                    $relationshipLabels[
                                        $dependent['relationship'] ?? ''
                                    ] ?? '-'
                                }}
                            </div>


                            <!-- STUDENT STATUS -->
                            <div class="dependent-list-cell">

                                @if($isStudying)

                                    <span class="dependent-student-badge">
                                        Still Studying
                                    </span>

                                @else

                                    <span class="dependent-not-applicable">
                                        —
                                    </span>

                                @endif

                            </div>


                            <!-- REMARK -->
                            <div class="dependent-list-cell dependent-list-remark">

                                @if($isStudying && $hasStudentDocument)

                                    Student verification document submitted

                                @elseif($isStudying)

                                    <span class="dependent-remark-warning">
                                        No verification document recorded
                                    </span>

                                @else

                                    No student verification required

                                @endif

                            </div>

                        </div>

                    @endforeach

                </div>


            @else

                <div class="registration-empty-card">

                    <strong>No Dependents Registered</strong>

                    <p>
                        No dependents were included in your original registration.
                    </p>

                </div>

            @endif

        </section>

        <!-- ============================================

             PART C : PAYMENT DETAILS

             ============================================ -->



        <section class="member-registration-section">

            <div class="registration-section-heading">
                <span>PART C</span>
                <h2>Payment Details</h2>
            </div>

            <div class="registration-info-card">

                <div class="registration-info-grid registration-applicant-grid">

                    <!-- REGISTRATION FEE -->
                    <div class="registration-info-box">

                        <span class="registration-info-label">
                            Registration Fee
                        </span>

                        <span class="registration-payment-value">
                            RM {{ number_format(
                                $payment['membership_fee'] ?? 60,
                                2
                            ) }}
                        </span>

                    </div>


                    <!-- PAYMENT METHOD -->
                    <div class="registration-info-box">

                        <span class="registration-info-label">
                            Payment Method
                        </span>

                        <span class="registration-info-value">
                            {{ $payment['payment_method'] ?? '-' }}
                        </span>

                    </div>


                    <!-- BANK NAME -->
                    <div class="registration-info-box">

                        <span class="registration-info-label">
                            Bank Name
                        </span>

                        <span class="registration-info-value">
                            {{ $payment['bank_name'] ?? '-' }}
                        </span>

                    </div>


                    <!-- RECEIPT NUMBER -->
                    <div class="registration-info-box">

                        <span class="registration-info-label">
                            Receipt Number
                        </span>

                        <span class="registration-info-value">
                            {{ $payment['receipt_number'] ?? '-' }}
                        </span>

                    </div>


                    <!-- PAYMENT DATE -->
                    <div class="registration-info-box">

                        <span class="registration-info-label">
                            Payment Date
                        </span>

                        <span class="registration-info-value">
                            {{
                                $registrationPayment
                                    ? \Carbon\Carbon::parse(
                                        $registrationPayment->payment_date
                                    )->format('d/m/Y')
                                    : '-'
                            }}
                        </span>

                    </div>

                </div>

            </div>

        </section>

        <div style="height: 30px; flex-shrink: 0;"></div>

    </main>



</body>

</html>