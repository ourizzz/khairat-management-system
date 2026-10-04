<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member - Khairat Management System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .edit-member-page{--em-primary:#a88970;--em-dark:#765d49;--em-soft:#f3ece6;--em-bg:#f7f4f1;--em-card:#fff;--em-text:#302b27;--em-muted:#81776f;--em-border:#e8e0d9;min-height:100vh;display:flex;background:var(--em-bg);color:var(--em-text);font-family:Inter,Arial,sans-serif}
        .edit-member-page *{box-sizing:border-box}.em-sidebar{width:245px;min-height:100vh;position:sticky;top:0;height:100vh;padding:24px 16px 18px;display:flex;flex-direction:column;background:var(--em-primary);color:#fff;flex-shrink:0}.em-profile{display:flex;align-items:center;gap:12px;padding:8px 10px 22px;border-bottom:1px solid rgba(255,255,255,.25)}.em-avatar{width:54px;height:54px;border-radius:50%;display:grid;place-items:center;background:#fff;color:var(--em-dark);font-weight:700;font-size:18px}.em-profile h3{margin:0 0 4px;font-size:14px;color:#fff}.em-profile span{font-size:11px;opacity:.9}.em-nav{padding-top:18px}.em-label{margin:14px 10px 7px;font-size:9px;font-weight:700;letter-spacing:1.1px;opacity:.8}.em-link{display:flex;align-items:center;gap:11px;min-height:42px;padding:10px 12px;margin:3px 0;border-radius:10px;color:#fff;text-decoration:none;font-size:12px;font-weight:500}.em-link:hover{background:rgba(255,255,255,.12)}.em-link.active{background:#fff;color:var(--em-dark);font-weight:600}.em-icon{width:18px;text-align:center;font-size:13px}.em-logout{margin-top:auto;padding-top:18px;border-top:1px solid rgba(255,255,255,.25)}.em-logout button{width:100%;border:0;background:transparent;color:#fff;padding:11px 12px;text-align:left;font:600 12px Inter,Arial,sans-serif;cursor:pointer}
        .em-main{flex:1;min-width:0;padding:38px 42px 65px}.em-header{display:flex;justify-content:space-between;gap:20px;align-items:flex-start;margin-bottom:28px}.em-eyebrow{margin:0 0 7px;color:var(--em-dark);font-size:9px;font-weight:700;letter-spacing:1.3px}.em-header h1{margin:0 0 7px;font-size:27px;line-height:1.2}.em-header p{margin:0;color:var(--em-muted);font-size:12px}.em-back{padding:10px 16px;border:1px solid var(--em-border);border-radius:10px;background:#fff;color:var(--em-dark);text-decoration:none;font-size:12px;font-weight:600}.admin-form-errors{margin:0 0 20px;padding:14px 16px;background:#fff5f5;border:1px solid #efcaca;border-radius:12px;color:#8b3434;font-size:12px}.admin-form-errors ul{margin:8px 0 0;padding-left:18px}
        .em-form{max-width:1180px}.em-section{margin-bottom:25px}.em-section-title{display:flex;align-items:center;gap:10px;margin-bottom:12px}.em-part{padding:5px 9px;border-radius:6px;background:#eee2d8;color:var(--em-dark);font-size:9px;font-weight:700;letter-spacing:.8px}.em-section-title h2{margin:0;font-size:15px}.em-card{padding:20px;background:#fff;border:1px solid var(--em-border);border-radius:14px;box-shadow:0 4px 18px rgba(76,57,43,.05)}.em-grid{display:grid;grid-template-columns:repeat(6,minmax(0,1fr));gap:14px}.em-field{grid-column:span 2;min-width:0}.em-field.half{grid-column:span 3}.em-field.full{grid-column:1/-1}.em-field label,.edit-member-page .dependent-entry label{display:block;margin:0 0 7px;color:var(--em-muted);font-size:9px;font-weight:700;letter-spacing:.65px;text-transform:uppercase}.em-field input,.em-field select,.edit-member-page .dependent-entry input,.edit-member-page .dependent-entry select{width:100%;height:43px;padding:0 12px;border:1px solid var(--em-border);border-radius:9px;background:#faf8f6;color:var(--em-text);font:500 12px Inter,Arial,sans-serif;outline:none}.em-field input:focus,.em-field select:focus,.edit-member-page .dependent-entry input:focus,.edit-member-page .dependent-entry select:focus{border-color:var(--em-primary);box-shadow:0 0 0 3px rgba(168,137,112,.12);background:#fff}.em-note{margin:12px 0 0;color:var(--em-muted);font-size:11px;line-height:1.55}
        #dependent-container:empty{display:none}.dependent-entry{padding:18px;margin:0 0 14px;border:1px solid var(--em-border);border-radius:12px;background:#faf8f6}.registration-dependent-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:14px;padding-bottom:10px;border-bottom:1px solid var(--em-border)}.dependent-title{margin:0;color:var(--em-dark);font-size:13px}.btn-remove-dependent{border:1px solid #e8c9c9;background:#fff;color:#9a4747;border-radius:8px;padding:7px 10px;font-size:9px;font-weight:700;cursor:pointer}.edit-member-page .dependent-entry .form-row{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:14px;margin-bottom:14px}.edit-member-page .dependent-entry .form-group{min-width:0}.edit-member-page .dependent-entry .form-group.full{grid-column:1/-1}.edit-member-page .dependent-entry small{display:block;margin-top:6px;color:var(--em-muted);font-size:10px}.student-verification{margin-top:8px;padding:14px;border-radius:10px;background:#f3ece6}.dependent-age-message{margin:8px 0 0;color:var(--em-dark);font-size:10px;font-weight:600}.btn-add-dependent{margin-top:4px;padding:10px 14px;border:1px solid var(--em-primary);border-radius:9px;background:#fff;color:var(--em-dark);font:700 10px Inter,Arial,sans-serif;cursor:pointer}.btn-add-dependent:hover{background:var(--em-soft)}
        .em-membership-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:14px}.em-summary{padding:15px 16px;border:1px solid var(--em-border);border-radius:10px;background:#faf8f6}.em-summary span{display:block;margin-bottom:6px;color:var(--em-muted);font-size:9px;font-weight:700;letter-spacing:.6px}.em-summary strong{color:var(--em-dark);font-size:13px}.admin-form-actions{display:flex;justify-content:flex-end;gap:10px;padding-top:3px}.admin-cancel,.btn-submit{min-width:135px;padding:11px 18px;border-radius:9px;font:700 11px Inter,Arial,sans-serif;text-align:center;cursor:pointer}.admin-cancel{border:1px solid var(--em-border);background:#fff;color:var(--em-dark);text-decoration:none}.btn-submit{border:1px solid var(--em-dark);background:var(--em-dark);color:#fff}.btn-submit:hover{opacity:.92}
        @media(max-width:900px){.edit-member-page{display:block}.em-sidebar{width:100%;min-height:auto;height:auto;position:relative}.em-main{padding:28px 20px 50px}.em-field,.em-field.half{grid-column:span 3}}@media(max-width:650px){.em-header{flex-direction:column}.em-grid{grid-template-columns:1fr}.em-field,.em-field.half,.em-field.full{grid-column:1/-1}.em-membership-grid,.edit-member-page .dependent-entry .form-row{grid-template-columns:1fr}.admin-form-actions{flex-direction:column-reverse}.admin-cancel,.btn-submit{width:100%}}
    </style>
</head>
<body>
<div class="edit-member-page">
    <aside class="em-sidebar">
        <div class="em-profile"><div class="em-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div><div><h3>{{ Auth::user()->name }}</h3><span>Administrator</span></div></div>
        <nav class="em-nav">
            <p class="em-label">MENU</p><a href="{{ route('admin.dashboard') }}" class="em-link"><span class="em-icon">▦</span>Dashboard</a>
            <p class="em-label">MEMBERS</p>
                <a href="{{ route('admin.members') }}" class="em-link active"><span class="em-icon">●</span>Member List</a>
                <a href="{{ route('admin.pending') }}" class="em-link"><span class="em-icon">!</span>New Registrations</a>
                
                <p class="em-label">RENEWALS</p>
                <a href="{{ route('admin.renewals') }}" class="em-link">
                    <span class="em-icon">!</span>Recent Renewals</a>
            <p class="em-label">CLAIMS</p><a href="{{ route('admin.claims') }}" class="em-link"><span class="em-icon">■</span>Claim List</a><a href="{{ route('admin.claims.history') }}" class="em-link"><span class="em-icon">◷</span>Claim History</a>
        </nav>
        <div class="em-logout"><form method="POST" action="{{ route('logout') }}">@csrf<button type="submit">↪ &nbsp; Log Out</button></form></div>
    </aside>

    <main class="em-main">
        <header class="em-header">
            <div><p class="em-eyebrow">MEMBER MANAGEMENT</p><h1>Edit Member</h1><p>Update the member's Khairat information and dependent records.</p></div>
            <a href="{{ route('admin.members') }}" class="em-back">Back to Member List</a>
        </header>

        @if ($errors->any())
            <div class="admin-form-errors"><strong>Please correct the following:</strong><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
        @endif

        <form method="POST" action="{{ route('admin.members.update', $member->member_id) }}" enctype="multipart/form-data" class="em-form" id="khairatRegistrationForm">
            @csrf
            @method('PUT')

            <section class="em-section">
                <div class="em-section-title"><span class="em-part">PART A</span><h2>Applicant Details</h2></div>
                <div class="em-card"><div class="em-grid">
                    <div class="em-field half">
                        <label>Full Name</label>
                        <input type="text" name="full_name"
                            value="{{ old('full_name', $member->full_name) }}"
                            placeholder="e.g. AHMAD BIN ALI"
                            minlength="3" maxlength="100" required>
                    </div>

                    <div class="em-field half">
                        <label>Phone</label>
                        <input type="tel" name="phone"
                            value="{{ old('phone', $member->phone) }}"
                            placeholder="e.g. 0123456789"
                            inputmode="numeric"
                            pattern="01[0-9]{8,9}"
                            maxlength="11" required>
                    </div>

                    <div class="em-field">
                        <label>IC Number</label>
                        <input type="text" name="ic_number"
                            value="{{ old('ic_number', $member->ic_number) }}"
                            placeholder="e.g. 010203040506"
                            inputmode="numeric"
                            pattern="[0-9]{12}"
                            minlength="12" maxlength="12"
                            title="Please enter exactly 12 digits without dashes."
                            required>
                    </div>

                    <div class="em-field">
                        <label>Birth Date</label>
                        <input type="date" name="birth_date"
                            value="{{ old('birth_date', $member->birth_date?->format('Y-m-d')) }}"
                            max="{{ date('Y-m-d') }}" required>
                    </div>

                    <div class="em-field">
                        <label>Email</label>
                        <input type="email" name="email"
                            value="{{ old('email', $member->user->email ?? $member->email) }}"
                            placeholder="e.g. ahmad@gmail.com"
                            maxlength="255" required>
                    </div>

                    <div class="em-field full">
                        <label>Address</label>
                        <input type="text" name="address"
                            value="{{ old('address', $member->address) }}"
                            placeholder="e.g. NO. 10, JALAN MELATI, RAWANG"
                            minlength="5" maxlength="255" required>
                    </div>

                    <div class="em-field half">
                        <label>Heir's Name</label>
                        <input type="text" name="heir_name"
                            value="{{ old('heir_name', $member->heir_name) }}"
                            placeholder="e.g. SITI BINTI ALI"
                            minlength="3" maxlength="100" required>
                    </div>

                    <div class="em-field half">
                        <label>Heir's Phone No.</label>
                        <input type="tel" name="heir_phone"
                            value="{{ old('heir_phone', $member->heir_phone) }}"
                            placeholder="e.g. 0123456789"
                            inputmode="numeric"
                            pattern="01[0-9]{8,9}"
                            maxlength="11" required>
                    </div>
            </section>

            <section class="em-section">
                <div class="em-section-title"><span class="em-part">PART B</span><h2>Dependent Details</h2></div>
                <div class="em-card"><p class="em-note" style="margin-top:0">Update existing dependents or add a new dependent, if applicable.</p><div id="dependent-container"></div><button type="button" class="btn-add-dependent" onclick="addDependent()">+ ADD DEPENDENT</button></div>
            </section>

            <section class="em-section">
                <div class="em-section-title"><span class="em-part">PART C</span><h2>Membership Details</h2></div>
                <div class="em-card"><div class="em-membership-grid"><div class="em-summary"><span>MEMBERSHIP STATUS</span><strong>ACTIVE</strong></div><div class="em-summary"><span>REGISTRATION FEE</span><strong>RM 60.00</strong></div></div></div>
            </section>

            <div class="admin-form-actions"><a href="{{ route('admin.members') }}" class="admin-cancel">CANCEL</a><button type="submit" class="btn-submit" id="registration-submit">UPDATE MEMBER</button></div>
        </form>
    </main>
</div>
<script>

        @php
            $existingDependentsData = $member->dependents->map(function ($dependent) {
                return [
                    'id' => $dependent->dependent_id,
                    'full_name' => $dependent->full_name,
                    'ic_number' => $dependent->ic_number,
                    'birth_date' => $dependent->date_of_birth
                        ? \Carbon\Carbon::parse($dependent->date_of_birth)->format('Y-m-d')
                        : null,
                    'relationship' => $dependent->relationship,
                    'student_status' => $dependent->is_student
                        ? 'Studying'
                        : 'Not Studying',
                    'has_document' => !empty($dependent->student_proof_path),
                ];
            })->values();
        @endphp

const existingDependents = @json($existingDependentsData);

const editMemberForm = document.getElementById('khairatRegistrationForm');

editMemberForm.addEventListener('input', function (event) {
    const field = event.target;

    if (!(field instanceof HTMLInputElement)) return;

    const fieldName = field.name || '';

    // Numbers only
    if (
        field.type === 'tel' ||
        fieldName === 'ic_number' ||
        fieldName.endsWith('[ic_number]')
    ) {
        field.value = field.value.replace(/\D/g, '');
        return;
    }

    // Auto uppercase text fields
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

        let dependentIndex = 0;

        // ADD DEPENDENT

        // Do not allow another dependent until existing child checks are complete.

        function validateDependentEligibility() {

            const entries = document.querySelectorAll('.dependent-entry');

            for (const entry of entries) {

                const relationship = entry.querySelector('select[name$="[relationship]"]');

                const birthInput = entry.querySelector('input[type="date"]');

                const studentSelect = entry.querySelector('select[name$="[student_status]"]');

                const documentInput = entry.querySelector('input[type="file"]');

                const message = entry.querySelector('.dependent-age-message');

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

                    const hasExistingDocument =

                        entry.querySelector('.has-existing-document').value === '1';



                    if (!documentInput.files.length && !hasExistingDocument) {

                        message.textContent =

                            'Please upload the student document before adding another dependent or submitting.';



                        documentInput.focus();

                        return false;

                    }

}

                message.textContent = '';

            }

            return true;

        }

        function addDependent(isExisting = false) {

            if (!isExisting && !validateDependentEligibility()) return;

            const container =

                document.getElementById('dependent-container');

            const index = dependentIndex++;

            const dependentHTML = \`

                <div class="dependent-entry"

                     id="dependent-${index}">



                     <input type="hidden"

                        name="dependents[${index}][id]"

                        class="existing-dependent-id"

                        value="">



                    <input type="hidden"

                        name="dependents[${index}][has_existing_document]"

                        class="has-existing-document"

                        value="0">



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

            \`;

            container.insertAdjacentHTML(

                'beforeend',

                dependentHTML

            );

                updateDependentNumbers();

                return index;

            }



            // LOAD EXISTING DEPENDENTS

            function loadExistingDependents() {



                existingDependents.forEach(function (data) {



                    // Create a form for each existing dependent

                    const index = addDependent(true);



                    const entry = document.getElementById(

                        \`dependent-${index}\`

                    );



                    // Store the existing dependent's ID

                    entry.querySelector('.existing-dependent-id').value =

                        data.id;



                    // Store whether a document already exists

                    entry.querySelector('.has-existing-document').value =

                        data.has_document ? '1' : '0';



                    // Fill in the existing information

                    entry.querySelector(

                        \`input[name="dependents[${index}][full_name]"]\`

                    ).value = data.full_name ?? '';



                    entry.querySelector(

                        \`input[name="dependents[${index}][ic_number]"]\`

                    ).value = data.ic_number ?? '';



                    entry.querySelector(

                        \`input[name="dependents[${index}][birth_date]"]\`

                    ).value = data.birth_date

                        ? String(data.birth_date).substring(0, 10)

                        : '';



                    entry.querySelector(

                        \`select[name="dependents[${index}][relationship]"]\`

                    ).value = data.relationship ?? '';



                    // Calculate the dependent's age and display student fields

                    checkDependentAge(index);



                    // Restore the existing student status

                    const studentSelect = entry.querySelector(

                        \`select[name="dependents[${index}][student_status]"]\`

                    );



                    if (data.relationship === 'Anak' && data.student_status) {

                        studentSelect.value = data.student_status;

                        toggleStudentDocument(index);

                    }



                });



                updateDependentNumbers();

            }



            loadExistingDependents();



        // REMOVE DEPENDENT

        function removeDependent(index) {

            const dependent =

                document.getElementById(

                    \`dependent-${index}\`

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

                    \`Dependent ${index + 1}\`;

            });

        }

        // CALCULATE AGE FROM DATE OF BIRTH

        function checkDependentAge(index) {

            const dependent = document.getElementById(\`dependent-${index}\`);

            const birthInput = dependent.querySelector('input[type="date"]');

            const relationship = dependent.querySelector('select[name$="[relationship]"]').value;

            const ageInput = document.getElementById(\`dependent-age-${index}\`);

            const verification = document.getElementById(\`student-verification-${index}\`);

            const message = document.getElementById(\`dependent-age-message-${index}\`);

            const studentSelect = verification.querySelector('select');

            const documentSection = document.getElementById(\`student-document-${index}\`);

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

            ageInput.value = \`${age} years old\`;

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

                    \`student-verification-${index}\`

                );

            const studentStatus =

                verification.querySelector('select');

            const documentSection =

                document.getElementById(

                    \`student-document-${index}\`

                );

            const documentInput =

                documentSection.querySelector(

                    'input[type="file"]'

                );

            if (studentStatus.value === 'Studying') {

                documentSection.style.display = 'block';



                const entry = document.getElementById(\`dependent-${index}\`);



                const hasExistingDocument =

                    entry.querySelector('.has-existing-document').value === '1';



                // A new upload is only required if no document exists.

                documentInput.required = !hasExistingDocument;

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

    </script>
</body>
</html>
