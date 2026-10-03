<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Claims - Khairat Management System</title>

    <link rel="preconnect" href="https\://fonts.googleapis.com">

    <link rel="preconnect" href="https\://fonts.gstatic.com" crossorigin>

    <link href="https\://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body class="dashboard-body">



<aside class="dashboard-sidebar">

    <div class="sidebar-profile">

        <div class="profile-icon">

            <img src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('images/profile pic.png') }}" alt="Profile">

        </div>

        <div class="sidebar-user-info">

            <h3>{{ Auth::user()->name }}</h3>

            <span>Member</span>

        </div>

    </div>



    <nav class="sidebar-menu">

        <p class="sidebar-section-label">MENU</p>

        <a href="{{ route('member.dashboard') }}" class="menu-item {{ request()->routeIs('member.dashboard') ? 'active' : '' }}">

            <span class="menu-icon"><svg viewBox="0 0 24 24"><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/></svg></span>

            <span>Dashboard</span>

        </a>



        <p class="sidebar-section-label">ACCOUNT</p>

        <a href="{{ route('member.profile') }}" class="menu-item {{ request()->routeIs('member.profile') ? 'active' : '' }}">

            <span class="menu-icon"><svg viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg></span>

            <span>Profile</span>

        </a>

        <a href="{{ route('member.dependents') }}" class="menu-item {{ request()->routeIs('member.dependents') ? 'active' : '' }}">

            <span class="menu-icon"><svg viewBox="0 0 24 24"><path d="M16 11c1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3 1.34 3 3 3zM8 11c1.66 0 3-1.34 3-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm8 2c-2 0-6 1-6 3v3h12v-3c0-2-4-3-6-3zM8 13c-2.33 0-7 1.17-7 3.5V19h7v-3c0-.85.33-1.56.91-2.14C8.61 13.81 8.3 13 8 13z"/></svg></span>

            <span>Dependents</span>

        </a>



        <p class="sidebar-section-label">KHAIRAT</p>

        <a href="{{ route('member.registration') }}" class="menu-item {{ request()->routeIs('member.registration') ? 'active' : '' }}">

            <span class="menu-icon"><svg viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 4H6V5h12v2zm0 4H6V9h12v2zm-5 4H6v-2h7v2z"/></svg></span>

            <span>Registration</span>

        </a>

        <a href="{{ route('member.renewal') }}" class="menu-item {{ request()->routeIs('member.renewal') ? 'active' : '' }}">

            <span class="menu-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M12 4V1L8 5l4 4V6c3.31 0 6 2.69 6 6 0 1.01-.25 1.96-.69 2.79l1.46 1.46A7.94 7.94 0 0 0 20 12c0-4.42-3.58-8-8-8zm-6 6c0-1.01.25-1.96.69-2.79L5.23 5.75A7.94 7.94 0 0 0 4 10c0 4.42 3.58 8 8 8v3l4-4-4-4v3c-3.31 0-6-2.69-6-6z"/>
                </svg>
            </span>

            <span>Renewal</span>

        </a>

        <a href="{{ route('member.claim') }}" class="menu-item {{ request()->routeIs('member.claim') ? 'active' : '' }}">

            <span class="menu-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm1 7V3.5L18.5 9H15zm-4 9-3.5-3.5 1.41-1.41L11 15.17l4.59-4.59L17 12l-6 6z"/>
                </svg>
            </span>

            <span>Claims</span>

        </a>

        <a href="{{ route('member.history') }}" class="menu-item {{ request()->routeIs('member.history') ? 'active' : '' }}">

            <span class="menu-icon"><svg viewBox="0 0 24 24"><path d="M13 3a9 9 0 1 0 8.95 10H19.9A7 7 0 1 1 13 5v3l4-4-4-4v3zm-1 5h2v5h4v2h-6V8z"/></svg></span>

            <span>History</span>

        </a>

    </nav>



    <div class="sidebar-logout">

        <form method="POST" action="{{ route('logout') }}">

            @csrf

            <button type="submit" class="logout-btn">

                <span class="menu-icon"><svg viewBox="0 0 24 24"><path d="M10 17v-3H3v-4h7V7l5 5-5 5zm9-14H9c-1.1 0-2 .9-2 2v3h2V5h10v14H9v-3H7v3c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/></svg></span>

                <span>Log Out</span>

            </button>

        </form>

    </div>

</aside>



<main class="dashboard-main member-claim-main">

    <header class="member-dashboard-header">

        <div class="dashboard-heading">

            <h1>Claims</h1>

            <p>Submit a Khairat claim and the required supporting documents.</p>

        </div>

    </header>

    @if (session('success'))
        <div class="claim-success-message">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('member.claim') }}" enctype="multipart/form-data" class="khairat-form member-claim-form" id="memberClaimForm">

        @csrf



        <section class="member-claim-section">

            <div class="registration-section-heading">

                <span>CLAIM TYPE</span>

                <h2>Select Claim Category</h2>

            </div>

            <div class="professional-claim-type-card">

                <label class="professional-claim-option">
                    <input type="radio" name="claim_type" value="member" required>
                    <span>Member</span>
                </label>

                <label class="professional-claim-option">
                    <input type="radio" name="claim_type" value="dependant" required>
                    <span>Dependant</span>
                </label>

            </div>

        </section>



        <section class="member-claim-section">

            <div class="registration-section-heading">

                <div class="professional-claim-card">

                    <div class="professional-claim-grid">

                        <div class="professional-claim-field">

                            <label>Full Name</label>

                            <input type="text"
                                name="full_name"
                                value="{{ Auth::user()->member?->full_name ?? '-' }}"
                                readonly>

                        </div>

                        <div class="professional-claim-field">

                            <label>Member ID</label>

                            <input type="text"
                                name="member_id"
                                value="{{ Auth::user()->member?->formatted_member_id ?? '-' }}"
                                readonly>

                        </div>

                        <div class="professional-claim-field">

                            <label>IC Number</label>

                            <input type="text"
                                name="ic_number"
                                value="{{ Auth::user()->member?->ic_number ?? '-' }}"
                                readonly>

                        </div>

                        <div class="professional-claim-field">

                            <label>Phone</label>

                            <input type="text"
                                name="phone"
                                value="{{ Auth::user()->member?->phone ?? '-' }}"
                                readonly>

                        </div>

                        <div class="professional-claim-field professional-claim-field-wide">

                            <label>Birth Date</label>

                            <input type="date"
                                name="birth_date"
                                value="{{ Auth::user()->member?->birth_date?->format('Y-m-d') }}"
                                readonly>

                        </div>

                    </div>

                </div>

             </section>



        <section class="member-claim-section">

            <div class="registration-section-heading">

                <span>PART B</span>

                <h2>Details of the Deceased</h2>

            </div>

            <div class="professional-claim-card">

                <div class="professional-claim-grid">

                    <div class="professional-claim-field">

                        <label>Full Name</label>

                        <input type="text" name="deceased_name" placeholder="e.g. SITI BINTI ALI" minlength="3" maxlength="100" required>

                    </div>

                    <div class="professional-claim-field">

                        <label>Relationship</label>

                        <select name="relationship" required>
                            <option value="" selected disabled>Select relationship</option>
                            <option value="HUSBAND">Husband</option>
                            <option value="WIFE">Wife</option>
                            <option value="CHILD">Child</option>
                        </select>

                    </div>

                    <div class="professional-claim-field">

                        <label>IC Number</label>

                        <input type="text" name="deceased_ic" placeholder="e.g. 010203040506" inputmode="numeric" pattern="[0-9]{12}" minlength="12" maxlength="12" title="Please enter exactly 12 digits without dashes." required>

                    </div>

                    <div class="professional-claim-field">

                        <label>Death Date</label>

                        <input type="date" name="death_date" max="{{ date('Y-m-d') }}" required>

                    </div>

                    <div class="professional-claim-field">

                        <label>Death Certificate No</label>

                        <input type="text" name="death_cert_no" placeholder="e.g. DC123456" maxlength="50" required>

                    </div>

                    <div class="professional-claim-field">

                        <label>Place of Death</label>

                        <input type="text" name="place_of_death" placeholder="e.g. HOSPITAL SELAYANG" maxlength="150" required>

                    </div>

                    <div class="professional-claim-field professional-claim-field-wide">

                        <label>Cause of Death</label>

                        <input type="text" name="cause_of_death" placeholder="e.g. NATURAL CAUSES" maxlength="255" required>

                    </div>

                </div>

            </div>

        </section>



        <section class="member-claim-section">

            <div class="registration-section-heading">

                <span>PART C</span>

                <h2>Supporting Documents</h2>

            </div>

            <div class="professional-claim-card claim-documents">

                <div class="professional-document-grid">



                    <div class="professional-document-field">

                        <label>Member / Deceased IC</label>

                        <label class="professional-upload-field" for="member_ic">

                            <span id="member_ic_name">Attach your document here</span>

                            <span class="professional-upload-icon">↥</span>

                        </label>

                        <input type="file" id="member_ic" name="member_ic" accept=".pdf,.jpg,.jpeg,.png" class="claim-file-input" onchange="showClaimFileName(this)" required>

                    </div>



                    <div class="professional-document-field">

                        <label>Death Certificate</label>

                        <label class="professional-upload-field" for="death_certificate">

                            <span id="death_certificate_name">Attach your document here</span>

                            <span class="professional-upload-icon">↥</span>

                        </label>

                        <input type="file" id="death_certificate" name="death_certificate" accept=".pdf,.jpg,.jpeg,.png" class="claim-file-input" onchange="showClaimFileName(this)" required>

                    </div>



                    <div class="professional-document-field">

                        <label>Burial Permit</label>

                        <label class="professional-upload-field" for="burial_permit">

                            <span id="burial_permit_name">Attach your document here</span>

                            <span class="professional-upload-icon">↥</span>

                        </label>

                        <input type="file" id="burial_permit" name="burial_permit" accept=".pdf,.jpg,.jpeg,.png" class="claim-file-input" onchange="showClaimFileName(this)" required>

                    </div>



                    <div class="professional-document-field">

                        <label>Marriage Certificate <span>(If Partner)</span></label>

                        <label class="professional-upload-field" for="marriage_certificate">

                            <span id="marriage_certificate_name">Attach your document here</span>

                            <span class="professional-upload-icon">↥</span>

                        </label>

                        <input type="file" id="marriage_certificate" name="marriage_certificate" accept=".pdf,.jpg,.jpeg,.png" class="claim-file-input" onchange="showClaimFileName(this)">

                    </div>



                    <div class="professional-document-field professional-document-wide">

                        <label>Birth Certificate <span>(If Child)</span></label>

                        <label class="professional-upload-field" for="birth_certificate">

                            <span id="birth_certificate_name">Attach your document here</span>

                            <span class="professional-upload-icon">↥</span>

                        </label>

                        <input type="file" id="birth_certificate" name="birth_certificate" accept=".pdf,.jpg,.jpeg,.png" class="claim-file-input" onchange="showClaimFileName(this)">

                    </div>



                </div>

            </div>

        </section>



        <div class="professional-claim-submit">

            <button type="submit" class="professional-claim-submit-btn">Submit Claim</button>

        </div>

    </form>

    <div style="height: 30px; flex-shrink: 0;"></div>

</main>



<script>

const memberClaimForm = document.getElementById('memberClaimForm');

memberClaimForm.addEventListener('input', function (event) {
    const field = event.target;
    if (!(field instanceof HTMLInputElement) && !(field instanceof HTMLTextAreaElement)) return;
    if (field.type === 'tel' || ['ic_number', 'deceased_ic'].includes(field.name)) {
        field.value = field.value.replace(/\D/g, '');
        return;
    }
    if (field.type === 'text' && field.name !== 'member_id' && !field.readOnly) {
        const start = field.selectionStart, end = field.selectionEnd;
        field.value = field.value.toUpperCase();
        if (start !== null && end !== null) field.setSelectionRange(start, end);
    }
});

memberClaimForm.addEventListener('invalid', function (event) {
    const field = event.target;
    field.setCustomValidity('');
    if (field.validity.valueMissing) {
        field.setCustomValidity('Please fill in this field.');
    } else if (['ic_number', 'deceased_ic'].includes(field.name) &&
               (field.validity.patternMismatch || field.validity.tooShort)) {
        field.setCustomValidity('Please enter exactly 12 digits without dashes.');
    } else if (field.type === 'tel' && field.validity.patternMismatch) {
        field.setCustomValidity('Please enter a valid Malaysian mobile number (10 to 11 digits, starting with 01).');
    }
}, true);

memberClaimForm.addEventListener('input', function (event) {
    event.target.setCustomValidity('');
});


function showClaimFileName(input) {

    const filename = document.getElementById(input.id + '_name');



    if (input.files.length > 0) {

        filename.textContent = input.files[0].name;

    } else {

        filename.textContent = 'Attach your document here';

    }

}

</script>



</body>

</html>
