<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khairat Registration - Khairat Management System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="normal-professional-body">

    <!-- TERMS & CONDITIONS MODAL -->
    <div class="khairat-terms-overlay" id="khairatTermsModal">

        <div class="khairat-terms-modal">

            <div class="khairat-terms-header">
                <div>
                    <span class="khairat-terms-eyebrow">KHAIRAT MEMBERSHIP</span>
                    <h2>Terms & Conditions</h2>
                    <p>Please read the following terms and conditions before proceeding with your registration.</p>
                </div>

                <button type="button"
                        class="khairat-terms-close"
                        onclick="closeKhairatTerms()"
                        aria-label="Close">
                    &times;
                </button>
            </div>

            <div class="khairat-terms-content">

                <div class="khairat-terms-section">
                    <h3>1. Membership Eligibility</h3>
                    <ul>
                        <li>The member and their dependents must be Malaysian citizens or permanent residents.</li>
                        <li>The member must be a Muslim.</li>
                        <li>The member must be 21 years old or above.</li>
                    </ul>
                </div>

                <div class="khairat-terms-section">
                    <h3>2. Dependent Eligibility</h3>
                    <ul>
                        <li>A legally married husband or wife may be registered as a dependent.</li>
                        <li>Biological children aged 21 years old and below may be registered as dependents, except those who are already married.</li>
                        <li>Biological children who are continuing their studies at a public or private higher education institution (IPTA/IPTS) may remain as dependents until the age of 25 only.</li>
                        <li>A registered member with more than one wife must register a separate membership for the second and subsequent wives.</li>
                        <li>A second, third, or fourth wife is not permitted to register her husband as her dependent.</li>
                    </ul>
                </div>

                <div class="khairat-terms-section">
                    <h3>3. Eligibility to Receive Benefits(Claims)</h3>
                    <ul>
                        <li>The member must have been a registered member for more than 3 months.</li>
                        <li>The member's status as an Ahli Kariah (parish member) must remain valid and must not have been revoked.</li>
                    </ul>
                </div>

            </div>

            <div class="khairat-terms-footer">
                <button type="button"
                        class="khairat-terms-continue"
                        onclick="closeKhairatTerms()">
                    Continue to Registration
                </button>
            </div>

        </div>
    </div>

    <!-- SIDEBAR -->
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
            <a href="{{ route('normal.dashboard') }}" class="normal-professional-menu-item {{ request()->routeIs('normal.dashboard') ? 'active' : '' }}">
                <span class="normal-professional-menu-icon"><svg viewBox="0 0 24 24"><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/></svg></span>
                <span>Dashboard</span>
            </a>

            <p class="normal-professional-label">ACCOUNT</p>
            <a href="{{ route('normal.profile') }}" class="normal-professional-menu-item {{ request()->routeIs('normal.profile') ? 'active' : '' }}">
                <span class="normal-professional-menu-icon"><svg viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg></span>
                <span>Profile</span>
            </a>

            <p class="normal-professional-label">KHAIRAT</p>
            <a href="{{ route('normal.register.khairat') }}" class="normal-professional-menu-item {{ request()->routeIs('normal.register.khairat') ? 'active' : '' }}">
                <span class="normal-professional-menu-icon"><svg viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 4H6V5h12v2zm0 4H6V9h12v2zm-5 4H6v-2h7v2z"/></svg></span>
                <span>Registration</span>
            </a>

            <a href="#" class="normal-professional-menu-item" onclick="alert('You must register as a Khairat member before accessing Renewal.'); return false;">
                <span class="normal-professional-menu-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 4V1L8 5l4 4V6c3.31 0 6 2.69 6 6 0 1.01-.25 1.96-.69 2.79l1.46 1.46A7.94 7.94 0 0 0 20 12c0-4.42-3.58-8-8-8zm-6 6c0-1.01.25-1.96.69-2.79L5.23 5.75A7.94 7.94 0 0 0 4 10c0 4.42 3.58 8 8 8v3l4-4-4-4v3c-3.31 0-6-2.69-6-6z"/>
                    </svg>
                </span>
                <span>Renewal</span>
            </a>

            <a href="#" class="normal-professional-menu-item" onclick="alert('You must register as a Khairat member before accessing Claims.'); return false;">
                <span class="normal-professional-menu-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm1 7V3.5L18.5 9H15zm-4 9-3.5-3.5 1.41-1.41L11 15.17l4.59-4.59L17 12l-6 6z"/>
                    </svg>
                </span>
                <span>Claims</span>
            </a>

            <a href="#" class="normal-professional-menu-item" onclick="alert('You must register as a Khairat member before accessing History.'); return false;">
                <span class="normal-professional-menu-icon"><svg viewBox="0 0 24 24"><path d="M13 3a9 9 0 1 0 8.95 10H19.9A7 7 0 1 1 13 5v3l4-4-4-4v3zm-1 5h2v5h4v2h-6V8z"/></svg></span>
                <span>History</span>
            </a>

        </nav>

        <div class="normal-professional-logout">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="normal-professional-logout-btn">
                    <span class="normal-professional-menu-icon"><svg viewBox="0 0 24 24"><path d="M10 17v-3H3v-4h7V7l5 5-5 5zm9-14H9c-1.1 0-2 .9-2 2v3h2V5h10v14H9v-3H7v3c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/></svg></span>
                    <span>Log Out</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="normal-professional-main">
        <header class="normal-professional-page-header normal-registration-page-header">
            <span class="normal-professional-eyebrow">KHAIRAT</span>
            <h1>Khairat Registration</h1>
            <p>Complete the information below to submit your Khairat membership registration.</p>
        </header>

        <!-- REGISTRATION FORM -->
        <form method="POST"
              action="{{ route('normal.register.khairat') }}"
              enctype="multipart/form-data"
              class="normal-registration-form"
              id="khairatRegistrationForm">

            @csrf

            <input type="hidden" name="demo_payment_confirmed" id="demo-payment-confirmed" value="0">
            <section class="normal-registration-section">
                <div class="normal-registration-section-header">
                    <span class="normal-registration-section-number">A</span>
                    <div class="normal-registration-section-heading">
                        <h2>Applicant Details</h2>
                        <p>Enter your personal and contact information.</p>
                    </div>
                </div>
                <div class="normal-registration-section-content">
                    <div class="normal-registration-grid">
                        <div class="normal-registration-group">
                            <label>Full Name</label>
                            <input type="text" name="full_name" value="{{ old('full_name', Auth::user()->name) }}" placeholder="e.g. AHMAD BIN ALI" minlength="3" maxlength="100" required>
                        </div>
                        <div class="normal-registration-group">
                            <label>Phone</label>
                            <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="e.g. 0123456789" inputmode="numeric" pattern="01[0-9]{8,9}" maxlength="11" title="Please enter a valid Malaysian mobile number (10 to 11 digits, starting with 01)." required>
                        </div>
                    </div>

                    <div class="normal-registration-grid three-column">
                        <div class="normal-registration-group">
                            <label>IC Number</label>
                            <input type="text" name="ic_number" value="{{ old('ic_number') }}" placeholder="e.g. 010203040506" inputmode="numeric" pattern="[0-9]{12}" minlength="12" maxlength="12" title="Please enter exactly 12 digits without dashes." required>
                        </div>

                        <div class="normal-registration-group">
                            <label>Birth Date</label>
                            <input type="date" name="birth_date" value="{{ old('birth_date') }}" max="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="normal-registration-group">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" placeholder="e.g. ahmad@gmail.com" maxlength="255" required>
                        </div>
                    </div>

                    <div class="normal-registration-grid">
                        <div class="normal-registration-group normal-registration-full">
                            <label>Address</label>
                            <input type="text" name="address" value="{{ old('address') }}" placeholder="e.g. NO. 10, JALAN MELATI, RAWANG" minlength="5" maxlength="255" required>
                        </div>
                    </div>

                    <div class="normal-registration-grid">
                        <div class="normal-registration-group">
                            <label>Heir's Name</label>
                            <input type="text" name="heir_name" value="{{ old('heir_name') }}" placeholder="e.g. SITI BINTI ALI" minlength="3" maxlength="100" required>
                        </div>

                        <div class="normal-registration-group">
                            <label>Heir's Phone No</label>
                            <input type="tel" name="heir_phone" value="{{ old('heir_phone') }}" placeholder="e.g. 0123456789" inputmode="numeric" pattern="01[0-9]{8,9}" maxlength="11" title="Please enter a valid Malaysian mobile number (10 to 11 digits, starting with 01)." required>
                        </div>
                    </div>
                </div>
            </section>


            <section class="normal-registration-section">
                <div class="normal-registration-section-header">
                    <span class="normal-registration-section-number">B</span>
                    <div class="normal-registration-section-heading">
                        <h2>Dependent Details</h2>
                        <p>Add dependent information only when applicable.</p>
                    </div>
                </div>

                <div class="normal-registration-section-content">
                    <p class="normal-dependent-description">Please provide information about your dependents, if applicable.</p>
                    <div id="dependent-container" class="normal-dependent-container"></div>
                    <button type="button" class="normal-add-dependent-btn btn-add-dependent" onclick="addDependent()">+ Add Dependent</button>
                </div>
            </section>

            <section class="normal-registration-section">
                <div class="normal-registration-section-header">
                    <span class="normal-registration-section-number">D</span>
                    <div class="normal-registration-section-heading">
                        <h2>Payment Details</h2>
                        <p>Complete the simulated FPX payment before submitting your registration.</p>
                    </div>
                </div>

                <div class="normal-registration-section-content">
                    <div class="fpx-payment-info">
                        <h3>Registration Payment</h3>
                        <div class="fpx-payment-summary"><span>Khairat Registration Fee</span><strong>RM 60.00</strong></div>
                    </div>

                    <div class="normal-registration-group fpx-bank-section">
                        <label for="fpx-bank">Select Bank</label>
                        <select id="fpx-bank" name="bank_name" required>
                            <option value="" disabled selected>Select your preferred bank to continue.</option>
                            <option>Maybank</option><option>CIMB Bank</option><option>Public Bank</option>
                            <option>RHB Bank</option><option>Hong Leong Bank</option>
                            <option>Bank Islam</option><option>Bank Rakyat</option><option>BSN</option>
                        </select>

                        <div class="fpx-actions" id="fpx-pay-actions">
                            <button type="button" class="fpx-primary" onclick="showPaymentDetails()">Pay Now</button>
                        </div>
                    </div>

                    <section id="fpx-review" class="fpx-panel" hidden>
                        <h3>Payment Details</h3>
                        <div class="fpx-detail"><span>Date</span><strong id="fpx-review-date"></strong></div>
                        <div class="fpx-detail"><span>Receipt Reference</span><strong id="fpx-review-ref"></strong></div>
                        <div class="fpx-detail"><span>Bank Name</span><strong id="fpx-review-bank"></strong></div>
                        <div class="fpx-detail"><span>Payment Method</span><strong>Simulated FPX</strong></div>
                        <div class="fpx-detail"><span>Amount</span><strong>RM 60.00</strong></div>
                        <div class="fpx-actions">
                            <button type="button" class="fpx-secondary" onclick="editPaymentBank()">Back</button>
                            <button type="button" class="fpx-primary" onclick="confirmDemoPayment()">Confirm Payment</button>
                        </div>
                    </section>

                    <section id="fpx-receipt" class="fpx-panel" hidden>
                        <h3>Masjid As-Salam — Payment Receipt</h3>
                        <p class="fpx-success">Payment Successful</p>
                        <div class="fpx-detail"><span>Date</span><strong id="fpx-receipt-date"></strong></div>
                        <div class="fpx-detail"><span>Receipt Reference</span><strong id="fpx-receipt-ref"></strong></div>
                        <div class="fpx-detail"><span>Bank Name</span><strong id="fpx-receipt-bank"></strong></div>
                        <div class="fpx-detail"><span>Payment Type</span><strong>Registration</strong></div>
                        <div class="fpx-detail"><span>Amount</span><strong>RM 60.00</strong></div>
                    </section>
                </div>
            </section>

            <!-- TERMS & CONDITIONS AGREEMENT -->
            <div class="khairat-terms-agreement">

                <label>
                    <input type="checkbox"
                        name="terms_agreed"
                        value="1"
                        required>

                    <span>
                        I confirm that I have read, understood, and agree to the
                        <button type="button"
                                class="khairat-terms-link"
                                onclick="openKhairatTerms()">
                            Terms & Conditions of Khairat Membership
                        </button>.
                    </span>
                </label>

            </div>

            <div class="normal-registration-submit form-submit">
                <button type="submit" class="btn-submit" id="registration-submit" disabled>Submit Registration</button>
            </div>
        </form>

        <div class="normal-bottom-space"></div>
    </main>

    <!-- JAVASCRIPT -->
    <script>

        function closeKhairatTerms() {
            document.getElementById('khairatTermsModal').classList.add('closed');
        }

        function openKhairatTerms() {
            document.getElementById('khairatTermsModal').classList.remove('closed');
        }

        // FORM INPUT STANDARD: uppercase text, numeric filtering and friendly validation.
        const registrationForm = document.getElementById('khairatRegistrationForm');

        registrationForm.addEventListener('input', function (event) {
            const field = event.target;

            if (!(field instanceof HTMLInputElement) && !(field instanceof HTMLTextAreaElement)) return;

            const fieldName = field.name || '';

            // Keep phone and IC fields numeric only.
            if (
                field.type === 'tel' ||
                fieldName === 'ic_number' ||
                fieldName.endsWith('[ic_number]')
            ) {
                field.value = field.value.replace(/\D/g, '');
                return;
            }

            // Capitalize ordinary text information only.
            // Email, dates, files, numbers and reference/member IDs are excluded.
            if (
                field.type === 'text' &&
                !field.readOnly
            ) {
                const start = field.selectionStart;
                const end = field.selectionEnd;
                field.value = field.value.toUpperCase();
                if (start !== null && end !== null) {
                    field.setSelectionRange(start, end);
                }
            }
        });

        registrationForm.addEventListener('invalid', function (event) {
            const field = event.target;
            const fieldName = field.name || '';

            field.setCustomValidity('');

            if (field.validity.valueMissing) {
                field.setCustomValidity('Please fill in this field.');
            } else if (fieldName === 'ic_number' || fieldName.endsWith('[ic_number]')) {
                if (field.validity.patternMismatch || field.validity.tooShort) {
                    field.setCustomValidity('Please enter exactly 12 digits without dashes.');
                }
            } else if (field.type === 'tel' && field.validity.patternMismatch) {
                field.setCustomValidity('Please enter a valid Malaysian mobile number (10 to 11 digits, starting with 01).');
            } else if (field.type === 'email' && field.validity.typeMismatch) {
                field.setCustomValidity('Please enter a valid email address.');
            }
        }, true);

        registrationForm.addEventListener('input', function (event) {
            event.target.setCustomValidity('');
        });

        let dependentIndex = 0;

        // ADD DEPENDENT
        // Do not allow another dependent until existing child checks are complete.
        function validateDependentEligibility() {
            const entries = document.querySelectorAll('.dependent-entry');
            for (const entry of entries) {
                const relationship = entry.querySelector('select[name$="[relationship]"]');
                const birthInput = entry.querySelector('input[type="date"]');
                const studentSelect = entry.querySelector('select[name$="[student_status]"]');
                const documentInput = entry.querySelector('input[type="file"]')
                const message = entry.querySelector('.dependent-age-message')
                if (!relationship.value || !birthInput.value) {
                    message.textContent = 'Please enter the birth date and relationship first.';
                    (birthInput.value ? relationship : birthInput).focus();
                    return false;
                }

                const dob = new Date(birthInput.value + 'T00:00:00');
                const today = new Date();
                let age = today.getFullYear() - dob.getFullYear();
                if (today.getMonth() < dob.getMonth() ||
                    (today.getMonth() === dob.getMonth() && today.getDate() < dob.getDate())) {
                    age--;
                }


                if (relationship.value === 'Anak' && age >= 26) {
                    message.textContent = 'Children aged 26 and above are not eligible. Please remove this dependent.';
                    birthInput.focus();
                    return false;

                }

                if (relationship.value === 'Anak' && age >= 21 && age <= 25) {

                    if (studentSelect.value !== 'Studying') {
                        message.textContent = 'Not eligible: children aged 21 to 25 must still be studying.';
                        studentSelect.focus();
                        return false;
                    }

                    if (!documentInput.files.length) {
                        message.textContent = 'Please upload the student document before adding another dependent or submitting.';
                        documentInput.focus();

                        return false;
                    }
                }

                message.textContent = '';
            }

            return true;
        }

        function addDependent() {
            if (!validateDependentEligibility()) return;
            const container =
                document.getElementById('dependent-container');

            const index = dependentIndex++;

            const dependentHTML = `
                <div class="dependent-entry"
                     id="dependent-${index}">

                    <div class="registration-dependent-header">
                        <h3 class="dependent-title">
                            Dependent
                        </h3>
                        <button type="button"
                                class="btn-remove-dependent"
                                onclick="removeDependent(${index})">
                            REMOVE
                        </button>
                    </div>

                    <!-- FULL NAME + IC -->
                    <div class="form-row">
                        <div class="form-group half">
                            <label>FULL NAME</label>
                            <input type="text"
                                name="dependents[${index}][full_name]"
                                placeholder="e.g. NUR AISYAH BINTI AHMAD"
                                minlength="3"
                                maxlength="100"
                                required>
                        </div>

                        <div class="form-group half">
                            <label>IC NUMBER</label>
                            <input type="text"
                                name="dependents[${index}][ic_number]"
                                placeholder="e.g. 100203040506"
                                inputmode="numeric"
                                pattern="[0-9]{12}"
                                minlength="12"
                                maxlength="12"
                                title="Please enter exactly 12 digits without dashes."
                                required>
                        </div>
                    </div>

                    <!-- BIRTH DATE + RELATIONSHIP -->
                    <div class="form-row">
                        <div class="form-group half">
                            <label>BIRTH DATE</label>
                            <input type="date"
                                   name="dependents[${index}][birth_date]"
                                   max="${new Date().toLocaleDateString('en-CA')}"
                                   onchange="checkDependentAge(${index})"
                                   required>
                        </div>

                        <div class="form-group half">
                            <label>RELATIONSHIP</label>
                            <select name="dependents[${index}][relationship]"
                                    onchange="checkDependentAge(${index})"
                                    required>
                                <option value="">
                                    Select Relationship
                                </option>
                                <option value="Isteri">
                                    Wife
                                </option>
                                <option value="Suami">
                                    Husband
                                </option>
                                <option value="Anak">
                                    Child
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- AUTOMATICALLY CALCULATED AGE -->
                    <div class="form-row">
                        <div class="form-group half">
                            <label>AGE (AUTOMATICALLY CALCULATED)</label>
                            <input type="text"
                                   id="dependent-age-${index}"
                                   placeholder="Select birth date"
                                   readonly>
                        </div>
                    </div>

                    <!-- STUDENT VERIFICATION -->
                    <div class="student-verification"
                         id="student-verification-${index}"
                         style="display:none;">
                        <div class="form-group full">
                            <label>STUDENT STATUS</label>
                            <select name="dependents[${index}][student_status]"
                                    onchange="toggleStudentDocument(${index})">
                                <option value="">
                                    Select Student Status
                                </option>
                                <option value="Studying">
                                    Still Studying
                                </option>
                                <option value="Not Studying">
                                    Not Studying
                                </option>
                            </select>
                        </div>

                        <div class="student-document-section"
                             id="student-document-${index}"
                             style="display:none;">
                            <div class="form-group full">
                                <label>
                                    STUDENT VERIFICATION DOCUMENT
                                </label>
                                <input type="file"
                                       name="dependents[${index}][student_document]"
                                       accept=".pdf,.jpg,.jpeg,.png">
                                <small>
                                    Please upload a valid student
                                    confirmation letter.
                                </small>
                            </div>
                        </div>
                    </div>


                    <!-- AGE MESSAGE -->
                    <p class="dependent-age-message"
                       id="dependent-age-message-${index}">
                    </p>
                </div>
            `;

            container.insertAdjacentHTML(
                'beforeend',
                dependentHTML
            );

            updateDependentNumbers();
        }

        // REMOVE DEPENDENT
        function removeDependent(index) {

            const dependent =
                document.getElementById(
                    `dependent-${index}`
                );

            if (dependent) {
                dependent.remove();
            }

            updateDependentNumbers();
        }

        // UPDATE DEPENDENT NUMBER
        function updateDependentNumbers() {

            const dependents =
                document.querySelectorAll(
                    '.dependent-entry'
                );

            dependents.forEach((dependent, index) => {

                const title =
                    dependent.querySelector(
                        '.dependent-title'
                    );

                title.textContent =
                    `Dependent ${index + 1}`;
            });
        }


        // CALCULATE AGE FROM DATE OF BIRTH
        function checkDependentAge(index) {

            const dependent = document.getElementById(`dependent-${index}`);

            const birthInput = dependent.querySelector('input[type="date"]');

            const relationship = dependent.querySelector('select[name$="[relationship]"]').value;

            const ageInput = document.getElementById(`dependent-age-${index}`);

            const verification = document.getElementById(`student-verification-${index}`);

            const message = document.getElementById(`dependent-age-message-${index}`);

            const studentSelect = verification.querySelector('select');

            const documentSection = document.getElementById(`student-document-${index}`);

            const documentInput = documentSection.querySelector('input[type="file"]');

            verification.style.display = 'none';
            studentSelect.required = false;
            studentSelect.value = '';
            documentInput.value = '';
            documentInput.required = false;
            documentSection.style.display = 'none';
            message.textContent = '';
            birthInput.setCustomValidity('');
            studentSelect.setCustomValidity('');
            ageInput.value = '';

            if (!birthInput.value) return;

            const today = new Date();

            const birthDate = new Date(birthInput.value + 'T00:00:00');

            if (Number.isNaN(birthDate.getTime()) || birthDate > today) {
                birthInput.setCustomValidity('Please select a valid birth date.');
                message.textContent = 'Please select a valid birth date.';
                return;
            }

            let age = today.getFullYear() - birthDate.getFullYear();

            const monthDifference = today.getMonth() - birthDate.getMonth();

            if (monthDifference < 0 ||
                (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            ageInput.value = `${age} years old`;

            if (relationship !== 'Anak') return;

            if (age >= 26) {
                message.textContent = 'Children aged 26 and above are not eligible.';
                birthInput.setCustomValidity('Children aged 26 and above are not eligible.');

            } else if (age >= 21) {
                verification.style.display = 'block';
                studentSelect.required = true;
                message.textContent = 'Children aged 21 to 25 must still be studying and upload a verification document.';
                toggleStudentDocument(index);

            } else {
                message.textContent = 'No student verification required.';
            }
        }

        // SHOW DOCUMENT FIELD
        function toggleStudentDocument(index) {
            const verification =
                document.getElementById(
                    `student-verification-${index}`
                );

            const studentStatus =
                verification.querySelector('select');

            const documentSection =
                document.getElementById(
                    `student-document-${index}`
                );

            const documentInput =
                documentSection.querySelector(
                    'input[type="file"]'
                );

            if (studentStatus.value === 'Studying') {
                documentSection.style.display = 'block';
                documentInput.required = true;

            } else {
                documentSection.style.display = 'none';
                documentInput.required = false;
                documentInput.value = '';
                if (studentStatus.value === 'Not Studying') {
                    studentStatus.setCustomValidity('Children aged 21 to 25 must still be studying.');

                } else {
                    studentStatus.setCustomValidity('');
                }
            }

            if (studentStatus.value === 'Studying') {
                studentStatus.setCustomValidity('');
            }
        }

        document.getElementById('khairatRegistrationForm')

            .addEventListener('submit', function (event) {

                if (!validateDependentEligibility()) {
                    event.preventDefault();
                }
            });

        // FRONTEND PREVIEW ONLY: the backend will issue the real receipt reference.
        let demoPayment = null;

        function showPaymentDetails() {
            const form = document.getElementById('khairatRegistrationForm');
            const bank = document.getElementById('fpx-bank');
            // ==========================================
            // 1. CHECK APPLICANT DETAILS FIRST
            // ==========================================
            const requiredFields = form.querySelectorAll(
                '.normal-registration-section:first-of-type input[required], ' +
                '.normal-registration-section:first-of-type select[required]'
            );
            for (const field of requiredFields) {
                if (!field.checkValidity()) {
                    field.reportValidity();
                    field.focus();
                    return;
                }
            }
            // ==========================================
            // 2. CHECK DEPENDENT DETAILS
            // ==========================================
            if (!validateDependentEligibility()) {
                return;
            }
            // ==========================================
            // 3. CHECK BANK
            // ==========================================
            if (!bank.value) {
                bank.reportValidity();
                bank.focus();
                return;
            }
            // ==========================================
            // 4. CONTINUE TO PAYMENT
            // ==========================================
            demoPayment = {
                bank: bank.value,
                date: new Date().toLocaleString('en-MY'),
                reference: 'PREVIEW-' + Date.now()
            };
            document.getElementById('fpx-review-date').textContent =
                demoPayment.date;
            document.getElementById('fpx-review-ref').textContent =
                demoPayment.reference;
            document.getElementById('fpx-review-bank').textContent =
                demoPayment.bank;
            bank.disabled = true;
            document.getElementById('fpx-pay-actions').hidden = true;
            document.getElementById('fpx-review').hidden = false;
        }

        function editPaymentBank() {
            document.getElementById('fpx-bank').disabled = false;
            document.getElementById('fpx-review').hidden = true;
            document.getElementById('fpx-pay-actions').hidden = false;
            demoPayment = null;
        }

        function confirmDemoPayment() {
            if (!demoPayment) return;
            document.getElementById('fpx-review').hidden = true;
            document.getElementById('fpx-receipt-date').textContent =
                demoPayment.date;
            document.getElementById('fpx-receipt-ref').textContent =
                demoPayment.reference;
            document.getElementById('fpx-receipt-bank').textContent =
                demoPayment.bank;
            document.getElementById('fpx-receipt').hidden = false;


            // Record that the user completed the demonstration.
            document.getElementById('demo-payment-confirmed').value = '1';
            document.getElementById('fpx-bank').disabled = false;

            // Enable final registration submission.
            const submitButton =
                document.getElementById('registration-submit');

            submitButton.disabled = false;
            submitButton.removeAttribute('title');
        }

    </script>

</body>

</html>