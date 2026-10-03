<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DependentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// ========================================
// PUBLIC ROUTES
// ========================================

Route::get('/', function () {
    return view('homepage');
});

// ========================================
// AUTHENTICATION ROUTES
// ========================================

// Login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

// Admin Login
Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AuthController::class, 'adminLogin'])
    ->name('admin.login.submit');

// Registration
Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register']);

// Logout - ALL authenticated users
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// ========================================
// NORMAL USER ROUTES
// ========================================

Route::middleware(['auth', 'role:normal'])
    ->prefix('user')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard',
            [MemberController::class, 'normalDashboard']
        )->name('normal.dashboard');

        // Profile
        Route::get('/profile',
            [MemberController::class, 'normalProfile']
        )->name('normal.profile');

        Route::put('/profile',
            [MemberController::class, 'updateNormalProfile']
        )->name('normal.profile.update');

        // Khairat Registration
        Route::get('/register-khairat',
            [MemberController::class, 'showRegisterKhairat']
        )->name('normal.register.khairat');

        Route::post('/register-khairat',
            [MemberController::class, 'registerKhairat']
        );

    });

// ========================================
// MEMBER ROUTES
// ========================================

Route::middleware(['auth', 'role:member'])
    ->prefix('member')
    ->group(function () {

        // Registration (read-only)
        Route::get('/registration',
            [MemberController::class, 'viewRegistration']
        )->name('member.registration');

        // Dashboard
        Route::get('/dashboard',
            [MemberController::class, 'memberDashboard']
        )->name('member.dashboard');

        // Profile
        Route::get('/profile',
            [MemberController::class, 'profile']
        )->name('member.profile');

        Route::put('/profile',
            [MemberController::class, 'updateProfile']
        )->name('member.profile.update');

        // Upload member profile picture
        Route::post('/profile/photo',
            [MemberController::class, 'updateProfilePhoto']
        )->name('member.profile.photo');

        // Dependent Details
        Route::get('/dependents',
            [DependentController::class, 'index']
        )->name('member.dependents');

        // Upload Student Verification Document
        Route::post('/dependents/{id}/student-document',
            [DependentController::class, 'uploadStudentDocument']
        )->name('member.dependents.student-document');

        // View Student Verification Document
        Route::get('/dependents/{id}/student-document',
            [DependentController::class, 'viewStudentDocument']
        )->name('member.dependents.view-document');

        // Renewal
        Route::get('/renewal',
            [PaymentController::class, 'index']
        )->name('member.renewal');

        Route::post('/renewal',
            [PaymentController::class, 'store']
        )->name('member.renewal.store');

        // Claims
        Route::get('/claim',
            [ClaimController::class, 'index']
        )->name('member.claim');

        Route::post('/claim',
            [ClaimController::class, 'store']
        );

        // Payment History
        Route::get('/history',
            [PaymentController::class, 'history']
        )->name('member.history');

        Route::post('/notifications/read',
            function () {
                auth()->user()->unreadNotifications->markAsRead();
                return response()->json(['success' => true]);
            }
        )->name('member.notifications.read');
    });

// ========================================
// ADMIN ROUTES
// ========================================

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard',
            [AdminController::class, 'dashboard']
        )->name('admin.dashboard');

        // Members
        Route::get('/members',
            [AdminController::class, 'members']
        )->name('admin.members');

        // Display Add Member form
        Route::get('/members/create',
            [AdminController::class, 'createMember']
        )->name('admin.members.create');

        // Save new member
        Route::post('/members',
            [AdminController::class, 'storeMember']
        )->name('admin.members.store');

        // Edit member
        Route::get('/members/{id}/edit', [AdminController::class, 'editMember'])
            ->name('admin.members.edit');

        Route::put('/members/{id}', [AdminController::class, 'updateMember'])
            ->name('admin.members.update');

        // Delete member
        Route::delete('/members/{id}', [AdminController::class, 'destroyMember'])
            ->name('admin.members.destroy');

        // Unchecked Registrations
        Route::get('/pending',
            [AdminController::class, 'pending']
        )->name('admin.pending');

        // Mark Registration as Checked
        Route::post('/pending/{id}/check',
            [AdminController::class, 'markRegistrationChecked']
        )->name('admin.registration.check');

        // Claims
        Route::get('/claims',
            [AdminController::class, 'claims']
        )->name('admin.claims');

        // Claim History
        Route::get('/claims/history',
            [AdminController::class, 'claimsHistory']
        )->name('admin.claims.history');

        Route::post('/claims/{id}/approve',
            [AdminController::class, 'approveClaim']
        )->name('admin.claims.approve');

        Route::post('/claims/{id}/reject',
            [AdminController::class, 'rejectClaim']
        )->name('admin.claims.reject');

        Route::get('/claims/{id}/details',
            [AdminController::class, 'claimDetails']
        )->name('admin.claims.details');

        // Securely view private claim document
        Route::get('/claims/{id}/document/{type}',
            [AdminController::class, 'viewClaimDocument']
        )->name('admin.claims.document');

        // Renewals
        Route::get('/renewals',
            [AdminController::class, 'renewals']
        )->name('admin.renewals');

        Route::post('/renewals/{id}/check',
            [AdminController::class, 'markRenewalChecked']
        )->name('admin.renewals.check');

        // View Student Proof
        Route::get('/dependents/{id}/student-proof',
            [AdminController::class, 'viewStudentDocument']
        )->name('admin.student-proof.view');

        // View original registration details
        Route::get(
            '/registration/{id}/details',
            [AdminController::class, 'registrationDetails']
        )->name('admin.registration.details');



    });
