<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Renewal - Khairat Management System</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="dashboard-body">

    <aside class="dashboard-sidebar">

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

    <main class="dashboard-main member-renewal-main">

        <header class="member-dashboard-header">
            <div class="dashboard-heading">
                <h1>Renewal</h1>
                <p>Renew your annual Khairat membership contribution.</p>
            </div>
        </header>

        <div class="renewal-notice-card">
            <div class="renewal-notice-icon">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M17.65 6.35A7.96 7.96 0 0012 4a8 8 0 00-7.75 10H2l3.5 3.5L9 14H6.28A6 6 0 1112 18c-1.47 0-2.82-.53-3.86-1.41l-1.42 1.42A7.96 7.96 0 0012 20a8 8 0 005.65-13.65z"/>
                </svg>
            </div>
            <div>
                <strong>Annual Membership Renewal</strong>
                <p>Select your preferred bank and complete the payment confirmation below.</p>
            </div>
        </div>

        <form method="POST"
              action="{{ route('member.renewal.store') }}"
              class="khairat-form member-renewal-form"
              id="renewalPaymentForm">

            @csrf

            <section class="member-renewal-section">

                <div class="registration-section-heading">
                    <span>PAYMENT</span>
                    <h2>Payment Details</h2>
                </div>

                <div class="renewal-payment-card">

                    <div class="renewal-fee-card">
                        <div>
                            <span class="renewal-fee-label">Annual Khairat Renewal Fee</span>
                            <p>Annual membership contribution</p>
                        </div>
                        <strong>RM 40.00</strong>
                    </div>

                    <div class="renewal-bank-box">

                        <label for="fpx-bank">Select Bank</label>

                        <select id="fpx-bank" name="bank_name" required>
                            <option value="" disabled selected>Select your preferred bank to continue.</option>
                            <option value="Maybank">Maybank</option>
                            <option value="CIMB Bank">CIMB Bank</option>
                            <option value="Public Bank">Public Bank</option>
                            <option value="RHB Bank">RHB Bank</option>
                            <option value="Hong Leong Bank">Hong Leong Bank</option>
                            <option value="Bank Islam">Bank Islam</option>
                            <option value="Bank Rakyat">Bank Rakyat</option>
                            <option value="BSN">BSN</option>
                        </select>

                        <div class="renewal-actions" id="fpx-pay-actions">
                            <button type="button"
                                    class="renewal-primary-btn"
                                    onclick="showPaymentDetails()">
                                Pay Now
                            </button>
                        </div>

                    </div>

                    <section id="fpx-review" class="renewal-review-card" hidden>

                        <div class="renewal-panel-heading">
                            <div>
                                <span>REVIEW</span>
                                <h3>Payment Details</h3>
                            </div>
                        </div>

                        <div class="renewal-review-details">

                            <div class="renewal-review-row">
                                <span>Date</span>
                                <strong id="fpx-review-date"></strong>
                            </div>

                            <div class="renewal-review-row">
                                <span>Receipt Reference</span>
                                <strong id="fpx-review-ref"></strong>
                            </div>

                            <div class="renewal-review-row">
                                <span>Bank Name</span>
                                <strong id="fpx-review-bank"></strong>
                            </div>

                            <div class="renewal-review-row">
                                <span>Payment Method</span>
                                <strong>Simulated FPX</strong>
                            </div>

                            <div class="renewal-review-row">
                                <span>Payment Type</span>
                                <strong>Renewal</strong>
                            </div>

                            <div class="renewal-review-row">
                                <span>Amount</span>
                                <strong>RM 40.00</strong>
                            </div>

                        </div>

                        <div class="renewal-actions renewal-review-actions">
                            <button type="button"
                                    class="renewal-secondary-btn"
                                    onclick="editPaymentBank()">
                                Back
                            </button>

                            <button type="button"
                                    class="renewal-primary-btn"
                                    onclick="confirmDemoPayment()">
                                Confirm Payment
                            </button>
                        </div>

                    </section>

                    <section id="fpx-receipt" class="renewal-receipt-card" hidden>

                        <div class="renewal-receipt-header">

                            <div class="renewal-success-icon">
                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                </svg>
                            </div>

                            <div>
                                <span>MASJID AS-SALAM</span>
                                <h3>Payment Receipt</h3>
                                <p>Payment Successful</p>
                            </div>

                        </div>

                        <div class="renewal-detail-grid">

                            <div class="renewal-detail-box">
                                <span>Date</span>
                                <strong id="fpx-receipt-date"></strong>
                            </div>

                            <div class="renewal-detail-box">
                                <span>Receipt Reference</span>
                                <strong id="fpx-receipt-ref"></strong>
                            </div>

                            <div class="renewal-detail-box">
                                <span>Bank Name</span>
                                <strong id="fpx-receipt-bank"></strong>
                            </div>

                            <div class="renewal-detail-box">
                                <span>Payment Type</span>
                                <strong>Renewal</strong>
                            </div>

                            <div class="renewal-detail-box">
                                <span>Payment Method</span>
                                <strong>FPX</strong>
                            </div>

                            <div class="renewal-detail-box renewal-amount-box">
                                <span>Amount</span>
                                <strong>RM 40.00</strong>
                            </div>

                        </div>

                    </section>

                </div>

            </section>

            <div class="renewal-submit-area">
                <button type="submit"
                        class="renewal-submit-btn"
                        id="renewal-submit"
                        disabled>
                    Submit Renewal
                </button>
            </div>

        </form>

    </main>

    <script>
        // UI preview only. The backend must create the real transaction reference.
        let demoPayment = null;

        function showPaymentDetails() {
            const bank = document.getElementById('fpx-bank');

            if (!bank.value) {
                bank.reportValidity();
                return;
            }

            demoPayment = {
                bank: bank.value,
                date: new Date().toLocaleString('en-MY'),
                reference: 'PREVIEW-' + Date.now()
            };

            document.getElementById('fpx-review-date').textContent = demoPayment.date;
            document.getElementById('fpx-review-ref').textContent = demoPayment.reference;
            document.getElementById('fpx-review-bank').textContent = demoPayment.bank;

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

            document.getElementById('fpx-receipt-date').textContent = demoPayment.date;
            document.getElementById('fpx-receipt-ref').textContent = demoPayment.reference;
            document.getElementById('fpx-receipt-bank').textContent = demoPayment.bank;

            document.getElementById('fpx-receipt').hidden = false;

            // Keep the selected bank available when the form is submitted
            document.getElementById('fpx-bank').disabled = false;

            // Enable Laravel submission after payment confirmation
            const submitButton = document.getElementById('renewal-submit');
            submitButton.disabled = false;
            submitButton.removeAttribute('title');
        }
    </script>

</body>
</html>
