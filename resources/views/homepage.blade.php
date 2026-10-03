<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masjid As-Salam - Khairat Management System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Navbar -->
    <!-- Navbar -->
<nav class="home-navbar">
    <div class="home-logo">
        <img src="{{ asset('images/logo.png') }}" alt="Masjid As-Salam Logo">
    </div>
    <div class="home-nav-links">
        <a href="{{ route('login') }}" class="nav-icon" title="Login">
            <img src="{{ asset('images/login.png') }}" alt="Login">
        </a>
    </div>
</nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-bismillah">
                <img src="{{ asset('images/caligraphy.png') }}" alt="Bismillah">
            </div>
            <p class="hero-subtitle">In the name of Allah</p>
            <p class="hero-tagline">Life is a journey from Allah to Allah</p>
            <h1 class="hero-title">MASJID AS-SALAM</h1>
            <p class="hero-location">BUKIT SENTOSA / BUKIT BERUNTUNG</p>
        </div>
    </section>

        <!-- Khairat Section -->
    <section class="khairat-section">
        

        <div class="khairat-container">
            
            <!-- Gambar Donation (Kiri) -->
            <div class="khairat-image">
                <img src="{{ asset('images/donation 2.jpg') }}" alt="Donation">
            </div>

            <!-- Text (Kanan) -->
            <div class="khairat-content">
                <h2 class="khairat-title">KHAIRAT</h2>
                
                <p class="khairat-description">
                    A welfare fund or financial contribution collected through members' 
                    contributions or provided by certain organizations to help the 
                    deceased's family manage funeral arrangements when a person passes away.
                </p>

                <p class="khairat-arabic">
                    الَّذِينَ إِذَا أَصَابَتْهُم مُّصِيبَةٌ قَالُوا إِنَّا لِلَّهِ وَإِنَّا إِلَيْهِ رَاجِعُونَ
                </p>

                <p class="khairat-translation">
                    "Those who, when afflicted with hardship, say: 'Indeed, we belong to Allah, 
                    and indeed, to Him we shall return.'"
                </p>
            </div>

        </div>

        <!-- Gambar Tangan + Hati (Kanan Bawah) -->
        <div class="khairat-hand-bottom">
            <img src="{{ asset('images/donation.png') }}" alt="Hand with heart">
        </div>

    </section>

        <!-- Registration & Contribution Section -->
        <section class="registration-section">

            <!-- 1. Divider -->
            <div class="registration-divider">
                <img src="{{ asset('images/header.png') }}" alt="Divider">
            </div>

            <div class="registration-container">

                <!-- 2. Header -->
                <div class="registration-header">
                    <h2>REGISTRATION & CONTRIBUTION</h2>
                </div>

                <!-- 3. Fee Row -->
                <div class="fee-row">

                    <!-- Registration Fee -->
                    <div class="fee-box">
                        <div class="fee-label">REGISTRATION<br>FEE</div>
                        <div class="fee-amount">RM40</div>
                    </div>

                    <!-- Annual Contribution -->
                    <div class="fee-box">
                        <div class="fee-label">ANNUAL<br>CONTRIBUTION</div>
                        <div class="fee-amount">RM60</div>
                    </div>

                </div>

                <!-- 4. Benefit Row -->
                <div class="benefit-row">

                    <!-- Kariah Benefit (KECIL) -->
                    <div class="benefit-box kariah-box">
                        <div class="benefit-header">KARIAH BENEFIT</div>
                        <div class="benefit-content">
                            <p>Funeral</p>
                            <p>Arrangements</p>
                            <p>Fully Covered</p>
                        </div>
                        <div class="badge-container">
                            <img src="{{ asset('images/sale.png') }}" alt="Sale" class="sale-icon">
                            <img src="{{ asset('images/MEMBER ONLY.png') }}" alt="Member Only" class="member-only-img">
                        </div>
                    </div>

                    <!-- Non Kariah (BESAR) -->
                    <div class="benefit-box non-kariah-box">
                        <div class="benefit-header">NON KARIAH</div>
                        <div class="benefit-content">
                            <ul>
                                <li>RM1000 ( Partner / Parents )</li>
                                <li>RM500 ( Children / Dependents Aged 4 to Under 21 Years )</li>
                                <li>Child :
                                    <ul>
                                        <li>RM500 ( 1 - 3 Years )</li>
                                        <li>RM250 ( Fetus - 1 Year )</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>

        </section>

        <!-- Contact Us Section -->
        <section class="contact-section">
            <div class="contact-container">

                <!-- Header -->
                <div class="contact-header">
                    <h2>CONTACT US</h2>
                </div>

                <!-- Content -->
                <div class="contact-content">

                    <!-- Left: Map -->
                    <div class="contact-map">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.778406398693!2d101.56657177473151!3d3.4041494965704335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc68e21a0c4d5f%3A0xec455dc593157bd5!2sMasjid%20As%20Salam%20Bukit%20Sentosa%20(Al%20Salam%20Mosque)!5e0!3m2!1sen!2smy!4v1789702113129!5m2!1sen!2smy" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>

                    <!-- Right: Contact Info -->
                    <div class="contact-info">

                        <!-- Facebook -->
                        <div class="contact-item">
                            <div class="contact-icon">
                                <img src="{{ asset('images/facebook.png') }}" alt="Facebook">
                            </div>
                            <div class="contact-text">Masjid Assalam Bkt Sentosa</div>
                        </div>

                        <!-- Instagram -->
                        <div class="contact-item">
                            <div class="contact-icon">
                                <img src="{{ asset('images/instagram.png') }}" alt="Instagram">
                            </div>
                            <div class="contact-text">masjid_assalam_bukit_sentosa</div>
                        </div>

                        <!-- WhatsApp -->
                        <div class="contact-item">
                            <div class="contact-icon">
                                <img src="{{ asset('images/whatsapp.png') }}" alt="WhatsApp">
                            </div>
                            <div class="contact-text">
                                012 2184236 (USTAZ FIRDAUS)<br>
                                012 3029851 (CIK SYAHIDAH)<br>
                                019 2406600 (HJ. NAZARUDDIN)
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="contact-item">
                            <div class="contact-icon">
                                <img src="{{ asset('images/phone.png') }}" alt="Phone">
                            </div>
                            <div class="contact-text">03 60201773 (OFFICE)</div>
                        </div>

                        <!-- Email -->
                        <div class="contact-item">
                            <div class="contact-icon">
                                <img src="{{ asset('images/email.png') }}" alt="Email">
                            </div>
                            <div class="contact-text">AsSalamBS@gmail.com</div>
                        </div>

                        <!-- Location -->
                        <div class="contact-item">
                            <div class="contact-icon">
                                <img src="{{ asset('images/location.png') }}" alt="Location">
                            </div>
                            <div class="contact-text">
                                Masjid As Salam Bukit Sentosa (Al Salam Mosque), 
                                Bukit Sentosa, 48300 Rawang, Selangor
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>

</body>
</html>
