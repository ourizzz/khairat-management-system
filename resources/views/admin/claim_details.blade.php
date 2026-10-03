<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Claim Details - Khairat Management System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .claim-details-page{--cd-primary:#a88970;--cd-dark:#765d49;--cd-soft:#f3ece6;--cd-bg:#f7f4f1;--cd-text:#302b27;--cd-muted:#81776f;--cd-border:#e8e0d9;min-height:100vh;display:flex;background:var(--cd-bg);color:var(--cd-text);font-family:Inter,Arial,sans-serif}
        .claim-details-page *{box-sizing:border-box}.cd-sidebar{width:245px;height:100vh;position:sticky;top:0;flex-shrink:0;display:flex;flex-direction:column;padding:24px 16px 18px;background:var(--cd-primary);color:#fff}.cd-profile{display:flex;align-items:center;gap:12px;padding:8px 10px 22px;border-bottom:1px solid rgba(255,255,255,.25)}.cd-avatar{width:54px;height:54px;border-radius:50%;display:grid;place-items:center;background:#fff;color:var(--cd-dark);font-weight:700;font-size:18px}.cd-profile h3{margin:0 0 4px;font-size:14px;color:#fff}.cd-profile span{font-size:11px;opacity:.9}.cd-nav{padding-top:18px}.cd-label{margin:14px 10px 7px;font-size:9px;font-weight:700;letter-spacing:1.1px;opacity:.8}.cd-link{display:flex;align-items:center;gap:11px;min-height:42px;padding:10px 12px;margin:3px 0;border-radius:10px;color:#fff;text-decoration:none;font-size:12px;font-weight:500}.cd-link:hover{background:rgba(255,255,255,.12)}.cd-link.active{background:#fff;color:var(--cd-dark);font-weight:600}.cd-icon{width:18px;text-align:center}.cd-logout{margin-top:auto;padding-top:18px;border-top:1px solid rgba(255,255,255,.25)}.cd-logout button{width:100%;border:0;background:transparent;color:#fff;padding:11px 12px;text-align:left;font:600 12px Inter,Arial,sans-serif;cursor:pointer}
        .cd-main{flex:1;min-width:0;padding:38px 42px 65px}.cd-header{display:flex;justify-content:space-between;gap:20px;align-items:flex-start;margin-bottom:28px}.cd-eyebrow{margin:0 0 7px;color:var(--cd-dark);font-size:9px;font-weight:700;letter-spacing:1.3px}.cd-header h1{margin:0 0 7px;font-size:27px}.cd-header p{margin:0;color:var(--cd-muted);font-size:12px}.cd-back{padding:10px 16px;border:1px solid var(--cd-border);border-radius:10px;background:#fff;color:var(--cd-dark);text-decoration:none;font-size:12px;font-weight:600}
        .cd-section{margin-bottom:25px}.cd-section-title{display:flex;align-items:center;gap:10px;margin-bottom:12px}.cd-part{padding:5px 9px;border-radius:6px;background:#eee2d8;color:var(--cd-dark);font-size:9px;font-weight:700;letter-spacing:.8px}.cd-section-title h2{margin:0;font-size:15px}.cd-grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:12px}.cd-card{min-width:0;min-height:88px;padding:16px 17px;display:flex;flex-direction:column;justify-content:center;gap:7px;background:#fff;border:1px solid var(--cd-border);border-radius:11px;box-shadow:0 3px 12px rgba(76,57,43,.045)}.cd-card.span-2{grid-column:span 2}.cd-card.full{grid-column:1/-1}.cd-card span,.cd-doc span{color:var(--cd-muted);font-size:9px;font-weight:700;letter-spacing:.65px;text-transform:uppercase}.cd-card strong{overflow-wrap:anywhere;font-size:13px;font-weight:600;line-height:1.45}.cd-status{display:inline-flex;width:max-content;padding:5px 9px;border-radius:20px;background:var(--cd-soft);color:var(--cd-dark);font-size:10px;font-weight:700}
        .cd-doc-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:12px}.cd-doc{min-height:92px;padding:16px 17px;display:flex;flex-direction:column;justify-content:space-between;gap:12px;background:#fff;border:1px solid var(--cd-border);border-radius:11px}.cd-doc a{width:max-content;padding:7px 11px;border-radius:8px;background:var(--cd-soft);color:var(--cd-dark);text-decoration:none;font-size:10px;font-weight:700}.cd-doc a:hover{background:#e8d9cd}.cd-missing{color:#aaa;font-size:12px}
        .cd-actions{display:flex;justify-content:flex-end;gap:10px;margin-top:28px;padding-top:20px;border-top:1px solid var(--cd-border)}.cd-actions form{margin:0}.cd-btn{min-width:110px;padding:10px 16px;border-radius:9px;font:700 10px Inter,Arial,sans-serif;cursor:pointer;text-decoration:none;text-align:center}.cd-approve{border:1px solid #7f9b82;background:#7f9b82;color:#fff}.cd-reject{border:1px solid #b87777;background:#fff;color:#9b5555}.cd-btn:hover{opacity:.9}
        @media(max-width:950px){.claim-details-page{display:block}.cd-sidebar{width:100%;height:auto;position:relative}.cd-main{padding:28px 20px 50px}.cd-grid{grid-template-columns:repeat(2,minmax(0,1fr))}.cd-doc-grid{grid-template-columns:repeat(2,minmax(0,1fr))}}@media(max-width:600px){.cd-header{flex-direction:column}.cd-grid,.cd-doc-grid{grid-template-columns:1fr}.cd-card.span-2,.cd-card.full{grid-column:span 1}.cd-actions{flex-wrap:wrap}.cd-btn{flex:1}}
    </style>
</head>
<body>
<div class="claim-details-page">
    <aside class="cd-sidebar">
        <div class="cd-profile">
            <div class="cd-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
            <div><h3>{{ Auth::user()->name }}</h3><span>Administrator</span></div>
        </div>
        <nav class="cd-nav">
            <p class="cd-label">MENU</p>
            <a href="{{ route('admin.dashboard') }}" class="cd-link"><span class="cd-icon">▦</span>Dashboard</a>
            <p class="cd-label">MEMBERS</p>
            <a href="{{ route('admin.members') }}" class="cd-link"><span class="cd-icon">●</span>Member List</a>
            <a href="{{ route('admin.pending') }}" class="cd-link">
                <span class="cd-icon">!</span>Unchecked Registrations
            </a>

            <p class="cd-label">RENEWALS</p>

            <a href="{{ route('admin.renewals') }}" class="cd-link">
                <span class="cd-icon">!</span>Unchecked Renewals
            </a>

            <p class="cd-label">CLAIMS</p>
            <a href="{{ route('admin.claims') }}" class="cd-link active"><span class="cd-icon">■</span>Claim List</a>
            <a href="{{ route('admin.claims.history') }}" class="cd-link"><span class="cd-icon">◷</span>Claim History</a>
        </nav>
        <div class="cd-logout">
            <form method="POST" action="{{ route('logout') }}">@csrf
                <button type="submit">↪ &nbsp; Log Out</button>
            </form>
        </div>
    </aside>

    <main class="cd-main">
        <header class="cd-header">
            <div>
                <p class="cd-eyebrow">CLAIM MANAGEMENT</p>
                <h1>Claim Details</h1>
                <p>Review the member, deceased and supporting document information for this claim.</p>
            </div>
            <a href="{{ route('admin.claims') }}" class="cd-back">Back to Claim List</a>
        </header>

        <section class="cd-section">
            <div class="cd-section-title"><span class="cd-part">PART A</span><h2>Member Information</h2></div>
            <div class="cd-grid">
                <div class="cd-card"><span>Member ID</span><strong>{{ $claim->member?->formatted_member_id ?? '-' }}</strong></div>
                <div class="cd-card span-2"><span>Name</span><strong>{{ $claim->member?->user?->name ?? '-' }}</strong></div>
                <div class="cd-card"><span>Claim Date</span><strong>{{ $claim->claim_date ? $claim->claim_date->format('d/m/Y') : '-' }}</strong></div>
                <div class="cd-card span-2"><span>Claim Type</span><strong>{{ ucfirst($claim->claim_type ?? '-') }}</strong></div>
                <div class="cd-card span-2"><span>Status</span><strong class="cd-status">{{ strtoupper($claim->status ?? '-') }}</strong></div>
            </div>
        </section>

        <section class="cd-section">
            <div class="cd-section-title"><span class="cd-part">PART B</span><h2>Deceased Information</h2></div>
            <div class="cd-grid">
                <div class="cd-card span-2"><span>Name</span><strong>{{ $claim->deceased_name }}</strong></div>
                <div class="cd-card span-2"><span>IC Number</span><strong>{{ $claim->deceased_ic }}</strong></div>
                <div class="cd-card"><span>Date of Death</span><strong>{{ $claim->date_of_death ? $claim->date_of_death->format('d/m/Y') : '-' }}</strong></div>
                <div class="cd-card"><span>Relationship</span><strong>{{ $claim->relationship }}</strong></div>
                <div class="cd-card span-2"><span>Death Certificate No.</span><strong>{{ $claim->death_certificate_no }}</strong></div>
                <div class="cd-card span-2"><span>Place of Death</span><strong>{{ $claim->place_of_death }}</strong></div>
                <div class="cd-card span-2"><span>Cause of Death</span><strong>{{ $claim->cause_of_death ?? '-' }}</strong></div>
            </div>
        </section>

        <section class="cd-section">

            <div class="cd-section-title">
                <span class="cd-part">PART C</span>
                <h2>Supporting Documents</h2>
            </div>

            <div class="cd-doc-grid">

                <div class="cd-doc">
                    <span>Member IC</span>

                    @if($claim->member_ic_document)
                        <a href="{{ route(
                            'admin.claims.document',
                            [$claim->claim_id, 'member-ic']
                        ) }}"
                        target="_blank"
                        rel="noopener noreferrer">
                            View Document
                        </a>
                    @else
                        <span class="cd-missing">Not provided</span>
                    @endif
                </div>

                <div class="cd-doc">
                    <span>Death Certificate</span>

                    @if($claim->death_certificate_document)
                        <a href="{{ route(
                            'admin.claims.document',
                            [$claim->claim_id, 'death-certificate']
                        ) }}"
                        target="_blank"
                        rel="noopener noreferrer">
                            View Document
                        </a>
                    @else
                        <span class="cd-missing">Not provided</span>
                    @endif
                </div>

                <div class="cd-doc">
                    <span>Burial Permit</span>

                    @if($claim->burial_permit_document)
                        <a href="{{ route(
                            'admin.claims.document',
                            [$claim->claim_id, 'burial-permit']
                        ) }}"
                        target="_blank"
                        rel="noopener noreferrer">
                            View Document
                        </a>
                    @else
                        <span class="cd-missing">Not provided</span>
                    @endif
                </div>

                <div class="cd-doc">
                    <span>Marriage Certificate</span>

                    @if($claim->marriage_certificate_document)
                        <a href="{{ route(
                            'admin.claims.document',
                            [$claim->claim_id, 'marriage-certificate']
                        ) }}"
                        target="_blank"
                        rel="noopener noreferrer">
                            View Document
                        </a>
                    @else
                        <span class="cd-missing">Not provided</span>
                    @endif
                </div>

                <div class="cd-doc">
                    <span>Birth Certificate</span>

                    @if($claim->birth_certificate_document)
                        <a href="{{ route(
                            'admin.claims.document',
                            [$claim->claim_id, 'birth-certificate']
                        ) }}"
                        target="_blank"
                        rel="noopener noreferrer">
                            View Document
                        </a>
                    @else
                        <span class="cd-missing">Not provided</span>
                    @endif
                </div>

            </div>

        </section>

        <div class="cd-actions">
            @if($claim->status === 'Pending')
                <form method="POST" action="{{ route('admin.claims.reject', $claim->claim_id) }}">
                    @csrf
                    <button type="submit" class="cd-btn cd-reject" onclick="return confirm('Reject this claim?')">REJECT</button>
                </form>
                <form method="POST" action="{{ route('admin.claims.approve', $claim->claim_id) }}">
                    @csrf
                    <button type="submit" class="cd-btn cd-approve" onclick="return confirm('Approve this claim?')">APPROVE</button>
                </form>
            @endif
        </div>
    </main>
</div>
</body>
</html>
