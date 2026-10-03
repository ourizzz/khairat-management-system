<!DOCTYPE html>







<html lang="en">







<head>







    <meta charset="UTF-8">







    <meta name="viewport"







          content="width=device-width, initial-scale=1.0">















    <title>Registration Details - Khairat Management System</title>















    <link rel="stylesheet"







          href="{{ asset('css/style.css') }}">







</head>















<body class="admin-body professional-admin-body">



<aside class="professional-admin-sidebar">



    <div class="professional-admin-profile">



        <div class="professional-admin-avatar"><span>{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span></div>



        <div class="professional-admin-user"><h3>{{ Auth::user()->name }}</h3><span>Administrator</span></div>



    </div>



    <nav class="professional-admin-menu">



        <p class="professional-admin-label">MENU</p>



        <a href="{{ route('admin.dashboard') }}" class="professional-admin-menu-item"><span class="professional-admin-menu-icon"><svg viewBox="0 0 24 24"><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/></svg></span><span>Dashboard</span></a>



        <p class="professional-admin-label">MEMBERS</p>



        <a href="{{ route('admin.members') }}" class="professional-admin-menu-item"><span class="professional-admin-menu-icon"><svg viewBox="0 0 24 24"><path d="M16 11c1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3 1.34 3 3 3zM8 11c1.66 0 3-1.34 3-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm8 2c-2 0-6 1-6 3v3h12v-3c0-2-4-3-6-3z"/></svg></span><span>Member List</span></a>



        <a href="{{ route('admin.pending') }}" class="professional-admin-menu-item active">
            <span class="professional-admin-menu-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M12 2a10 10 0 1 0 10 10A10.01 10.01 0 0 0 12 2zm1 11h-2V6h2zm0 4h-2v-2h2z"/>
                </svg>
            </span>
            <span>Unchecked Registrations</span></a>

        <p class="professional-admin-label">RENEWALS</p>



        <a href="{{ route('admin.renewals') }}" class="professional-admin-menu-item">
            <span class="professional-admin-menu-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M12 2a10 10 0 1 0 10 10A10.01 10.01 0 0 0 12 2zm1 11h-2V6h2zm0 4h-2v-2h2z"/>
                </svg>
            </span>
        <span>Unchecked Renewals</span></a>


        <p class="professional-admin-label">CLAIMS</p>



        <a href="{{ route('admin.claims') }}" class="professional-admin-menu-item"><span class="professional-admin-menu-icon">
        <svg viewBox="0 0 24 24">
            <path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm1 7V3.5L18.5 9H15zm-4 9-3.5-3.5 1.41-1.41L11 15.17l4.59-4.59L17 12l-6 6z"/>
        </svg>
    </span>
    
    <span>Claim List</span></a>



        <a href="{{ route('admin.claims.history') }}" class="professional-admin-menu-item"><span class="professional-admin-menu-icon"><svg viewBox="0 0 24 24"><path d="M13 3a9 9 0 1 0 8.95 10H19.9A7 7 0 1 1 13 5v3l4-4-4-4v3zm-1 5h2v5h4v2h-6V8z"/></svg></span><span>Claim History</span></a>



    </nav>



    <div class="professional-admin-logout"><form method="POST" action="{{ route('logout') }}">@csrf



        <button type="submit" class="professional-admin-logout-btn"><span class="professional-admin-menu-icon"><svg viewBox="0 0 24 24"><path d="M10 17v-3H3v-4h7V7l5 5-5 5zm9-14H9c-1.1 0-2 .9-2 2v3h2V5h10v14H9v-3H7v3c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/></svg></span><span>Log Out</span></button>



    </form></div>



</aside>



<main class="professional-admin-main professional-registration-details-main">



    <header class="professional-admin-page-header">



        <div><p class="professional-admin-eyebrow">MEMBER MANAGEMENT</p><h1>Registration Details</h1><p>Review the information submitted during Khairat membership registration.</p></div>



        @if(request('from') === 'members')
            <a href="{{ route('admin.members') }}" class="professional-registration-back-btn">
                Back to Member List
            </a>
        @else
            <a href="{{ route('admin.pending') }}"
                class="admin-back-link">

                <svg viewBox="0 0 24 24">
                    <path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1s-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm-2 15-4-4 1.41-1.41L10 15.17l6.59-6.59L18 10l-8 8z"/>
                </svg>

                <span>Back to Unchecked Registrations</span>
            </a>
        @endif



    </header>







@php

    $applicant = data_get($snapshot, 'applicant', []);

    $dependents = $member->dependents;

    $payment = data_get($snapshot, 'payment', []);



    $show = function ($value) {

        return ($value === null || $value === '') ? '-' : $value;

    };

@endphp



<div class="reg-details-content">



    <section class="reg-details-section">

        <div class="reg-details-section-heading">

            <span>PART A</span>

            <h2>Applicant Details</h2>

        </div>



        <div class="reg-info-grid reg-applicant-grid">

            <div class="reg-info-card reg-span-2">
                <span class="reg-info-label">Full Name</span>
                <strong>{{ $show(data_get($applicant, 'full_name')) }}</strong>
            </div>

            <div class="reg-info-card reg-span-2">
                <span class="reg-info-label">Phone</span>
                <strong>{{ $show(data_get($applicant, 'phone')) }}</strong>
            </div>

            <div class="reg-info-card reg-span-2">
                <span class="reg-info-label">IC Number</span>
                <strong>{{ $show(data_get($applicant, 'ic_number')) }}</strong>
            </div>

            <div class="reg-info-card reg-span-2">
                <span class="reg-info-label">Birth Date</span>
                <strong>{{ $show(data_get($applicant, 'birth_date')) }}</strong>
            </div>

            <div class="reg-info-card reg-span-2">
                <span class="reg-info-label">Email</span>
                <strong>{{ $show(data_get($applicant, 'email')) }}</strong>
            </div>

            <div class="reg-info-card reg-span-2">
                <span class="reg-info-label">Address</span>
                <strong>{{ $show(data_get($applicant, 'address')) }}</strong>
            </div>

            <div class="reg-info-card reg-span-2">
                <span class="reg-info-label">Heir's Name</span>
                <strong>{{ $show(data_get($applicant, 'heir_name')) }}</strong>
            </div>

            <div class="reg-info-card reg-span-2">
                <span class="reg-info-label">Heir's Phone No.</span>
                <strong>{{ $show(data_get($applicant, 'heir_phone')) }}</strong>
            </div>

        </div>

    </section>



    <!-- ============================================
        PART B : DEPENDENT DETAILS
        ============================================ -->

    <section class="reg-details-section">

        <div class="reg-details-section-heading">
            <span>PART B</span>
            <h2>Dependent Details</h2>
        </div>

        @if($dependents->count() > 0)

            <div class="admin-dependent-table">

                <!-- TABLE HEADER -->
                <div class="admin-dependent-table-header">

                    <div>Full Name</div>
                    <div>IC Number</div>
                    <div>Birth Date</div>
                    <div>Relationship</div>
                    <div>Student Status</div>
                    <div>Supporting Document</div>

                </div>


                <!-- DEPENDENT ROWS -->
                @foreach($dependents as $dependent)

                    @php
                        $relationship = data_get($dependent, 'relationship');

                        $relationshipLabels = [
                            'Anak' => 'Child',
                            'Isteri' => 'Wife',
                            'Suami' => 'Husband',
                        ];

                        $relationshipLabel =
                            $relationshipLabels[$relationship]
                            ?? $relationship
                            ?? '-';

                        $isStudent =
                            (bool) data_get($dependent, 'is_student');

                        $hasStudentDocument =
                            !empty(data_get($dependent, 'student_proof_path'));
                    @endphp


                    <div class="admin-dependent-table-row">

                        <!-- FULL NAME -->
                        <div class="admin-dependent-table-cell admin-dependent-name">
                            {{ $show(data_get($dependent, 'full_name')) }}
                        </div>


                        <!-- IC NUMBER -->
                        <div class="admin-dependent-table-cell">
                            {{ $show(data_get($dependent, 'ic_number')) }}
                        </div>


                        <!-- BIRTH DATE -->
                        <div class="admin-dependent-table-cell">
                            {{
                                data_get($dependent, 'date_of_birth')
                                    ? \Carbon\Carbon::parse(
                                        data_get($dependent, 'date_of_birth')
                                    )->format('d/m/Y')
                                    : '-'
                            }}
                        </div>


                        <!-- RELATIONSHIP -->
                        <div class="admin-dependent-table-cell">
                            {{ $relationshipLabel }}
                        </div>


                        <!-- STUDENT STATUS -->
                        <div class="admin-dependent-table-cell">

                            @if($isStudent)

                                <span class="admin-student-status">
                                    Still Studying
                                </span>

                            @else

                                <span class="admin-table-muted">
                                    —
                                </span>

                            @endif

                        </div>


                        <!-- SUPPORTING DOCUMENT -->
                        <div class="admin-dependent-table-cell">

                            @if($isStudent && $hasStudentDocument)

                                <a
                                    href="{{ route(
                                        'admin.student-proof.view',
                                        data_get($dependent, 'dependent_id')
                                    ) }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="admin-document-btn"
                                >
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8zm1 7V3.5L18.5 9zM8 13h8v2H8zm0 4h6v2H8z"/>
                                    </svg>

                                    <span>View Document</span>
                                </a>

                            @elseif($isStudent)

                                <span class="admin-document-missing">
                                    No Document Submitted
                                </span>

                            @else

                                <span class="admin-table-muted">
                                    Not Required
                                </span>

                            @endif

                        </div>

                    </div>

                @endforeach

            </div>


        @else

            <div class="reg-empty-card">
                <strong>No dependents were submitted.</strong>
            </div>

        @endif

    </section>


    <section class="reg-details-section">

        <div class="reg-details-section-heading">

            <span>PART C</span>

            <h2>Payment Details</h2>

        </div>



        <div class="reg-payment-card">

            <div class="reg-payment-header">

                <div>

                    <span>REGISTRATION PAYMENT</span>

                    <h3>Payment Information</h3>

                </div>

                <strong class="reg-payment-amount">RM {{ number_format((float) data_get($payment, 'membership_fee', 0), 2) }}</strong>

            </div>



            <div class="reg-payment-grid">

                <div><span>Payment Method</span><strong>{{ $show(data_get($payment, 'payment_method')) }}</strong></div>

                <div><span>Bank Name</span><strong>{{ $show(data_get($payment, 'bank_name')) }}</strong></div>

                <div><span>Receipt Number</span><strong>{{ $show(data_get($payment, 'receipt_number')) }}</strong></div>

                <div><span>Registration Date</span><strong>{{ $show(data_get($snapshot, 'registration_date')) }}</strong></div>

            </div>

        </div>

    </section>



</div>

</main>

</body>

</html>