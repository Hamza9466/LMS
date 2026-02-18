<?php

use Illuminate\Support\Facades\Route;

// ===== Admin Controllers =====
use App\Http\Controllers\Admin\BloController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Website\AuthController;
use App\Http\Controllers\Website\BlogController;
use App\Http\Controllers\Website\FaqsController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\ZoomController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Website\AboutController;
use App\Http\Controllers\Admin\CheckoutController;


// ===== Website Controllers =====
use App\Http\Controllers\Admin\QuizPlayController;
use App\Http\Controllers\Admin\AboutIconController;
use App\Http\Controllers\Admin\AboutPostController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Website\AddCartController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Admin\CourseViewController;
use App\Http\Controllers\Admin\FaqStudentController;
use App\Http\Controllers\Admin\FaqTeacherController;
use App\Http\Controllers\Admin\LessonViewController;
use App\Http\Controllers\Website\CoursehubConroller;
use App\Http\Controllers\Admin\AboutBannerController;
use App\Http\Controllers\Admin\QuizAttemptController;
use App\Http\Controllers\Admin\SectionViewController;


// ===== Shared Controllers =====
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\ZoomMeetingController;
use App\Http\Controllers\Admin\AnnouncementController;

/* ==== ADDED: Q&A + Discussions Controllers (do not remove) ==== */
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\EmailContactController;
use App\Http\Controllers\Admin\QuizQuestionController;
use App\Http\Controllers\Website\BlogDetailController;
use App\Http\Controllers\Website\CourseGridController;
use App\Http\Controllers\Website\MembershipController;
use App\Http\Controllers\Admin\EnrolledCourseController;
use App\Http\Controllers\Website\CourseDetailController;
use App\Http\Controllers\Website\CourseReviewController;
use App\Http\Controllers\Website\NotificationController;
use App\Http\Controllers\Admin\PurchaseHistoryController;
use App\Http\Controllers\Admin\CourseCategoriesController;
use App\Http\Controllers\Admin\PersonalDiscountController;
use App\Http\Controllers\Website\CourseCategoryController;
use App\Http\Controllers\Admin\AboutGalleryImageController;
use App\Http\Controllers\Admin\StudentQuizAttemptController;
use App\Http\Controllers\Admin\QnaController as AdminQnaController;
use App\Http\Controllers\Website\QnaController as WebsiteQnaController;
use App\Http\Controllers\Admin\DiscussionController as AdminDiscussionController;
use App\Http\Controllers\Website\DiscussionController as WebsiteDiscussionController;
use App\Http\Controllers\Website\AnnouncementController as WebsiteAnnouncementController;
use App\Http\Controllers\Website\NotificationController as WebsiteNotificationController;


/* =============================================================== */

/*
|--------------------------------------------------------------------------
| Public Website
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/course_hub', [CoursehubConroller::class, 'course_hub'])->name('course_hub');
Route::get('/course_detail/{slug}', [CourseDetailController::class, 'CourseDetail'])->name('CourseDetail');
Route::get('/course_grid/{category:slug?}', [CourseGridController::class, 'CourseGrid'])->name('CourseGrid');
Route::get('/blog', [BlogController::class, 'Blog'])->name('Blog');
Route::get('/blog/{slug}', [BlogDetailController::class, 'BlogDetail'])->name('BlogDetail');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/contact', [ContactController::class, 'Contact'])->name('Contact');
Route::get('/faqs', [FaqsController::class, 'faqs'])->name('faqs');
Route::get('/course_category', [CourseCategoryController::class, 'CourseCategory'])->name('CourseCategory');
Route::get('/zoom', [ZoomController::class, 'Zoom'])->name('Zoom');
Route::get('/addcart', [AddCartController::class, 'addcart'])->name('addcart');
Route::get('/membership_plans', [MembershipController::class, 'membership'])->name('membership');

/*
|--------------------------------------------------------------------------
| Authentication (Public)
|--------------------------------------------------------------------------
*/
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// (You can keep GET logout if you want, though POST is recommended)
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/checkout/auth', [AuthController::class, 'checkoutGate'])->name('checkout.auth');

/*
|--------------------------------------------------------------------------
| Admin Dashboard (Auth required)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Admin: Courses / Sections / Lessons / Teachers (role:admin)
|--------------------------------------------------------------------------
*/
    // Courses CRUD
    Route::resource('courses', CourseController::class);

    // Sections + Lessons CRUD
    Route::resource('sections', SectionController::class);
    Route::resource('lessons', LessonController::class);

    // Teachers CRUD (namespaced to admin.teachers.*)
    Route::resource('teachers', TeacherController::class)->names('admin.teachers');

// Teacher: My Courses (only shows courses where teacher_id = auth()->id())


/*
|--------------------------------------------------------------------------
| Admin: Profile (Auth)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile'); // admin.profile
});

/*
|--------------------------------------------------------------------------
| Cart + Checkout (Mixed public/auth)
|--------------------------------------------------------------------------
*/
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{course}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/apply-coupon', [CartController::class, 'applyCoupon'])->name('cart.coupon');

Route::middleware('auth')->group(function () {
    Route::get('/cart/checkout', [CartController::class, 'checkoutPage'])->name('cart.checkout');

    // Demo / Fake checkout
    Route::match(['get', 'post'], '/checkout/fake', [CheckoutController::class, 'fakeCheckout'])
        ->name('checkout.fake');

    Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/checkout/cancel/{order}',  [CheckoutController::class, 'cancel'])->name('checkout.cancel');
});



// Payment provider callbacks (public)
Route::get('/pay/paypal/return/{order}', [CheckoutController::class, 'paypalReturn'])->name('paypal.return');
Route::match(['get', 'post'], '/pay/jazzcash/return',  [CheckoutController::class, 'jazzcashReturn'])->name('jazzcash.return');
Route::match(['get', 'post'], '/pay/easypaisa/return', [CheckoutController::class, 'easypaisaReturn'])->name('easypaisa.return');

/*
|--------------------------------------------------------------------------
| Transactions (Auth)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/transactions', [TransactionController::class, 'index'])->name('admin.transactions.index');
    Route::delete('/admin/transactions/{transaction}', [TransactionController::class, 'destroy'])
        ->name('admin.transactions.destroy');
});

/*
|--------------------------------------------------------------------------
| Reviews (Student + Admin)
|--------------------------------------------------------------------------
*/
// STUDENT — create/update review + reviews history page
Route::middleware(['auth'])->group(function () {
    Route::post('/courses/{course}/reviews', [CourseReviewController::class, 'store'])->name('reviews.store');
    Route::get('/dashboard/reviews', [CourseReviewController::class, 'my'])->name('student.reviews.index');
});

// ADMIN — list / approve / delete
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::resource('coursereview', CourseReviewController::class)
        ->only(['index', 'update', 'destroy'])
        ->names('coursereview'); // coursereview.index/update/destroy
});

/*
|--------------------------------------------------------------------------
| Student Dashboard: Enrolled Courses, Sections, Lessons, Quizzes
|--------------------------------------------------------------------------
|
| IMPORTANT: These names must match your Blade + controllers exactly.
| - Unlock flow is enforced by SectionViewController and QuizPlayController.
|
*/
Route::middleware(['auth'])->prefix('dashboard')->group(function () {

    // Enrolled courses list
    Route::get('enrolled-courses', [EnrolledCourseController::class, 'index'])
        ->name('enrolled-courses');

    // View course (student)
    Route::get('courses/{course}', [CourseViewController::class, 'show'])
        ->name('student.courses.show');

    // Sections — this method enforces locks (must complete previous section & pass MCQs)
    Route::get('sections/{section}', [SectionViewController::class, 'show'])
        ->name('student.sections.show');

    // Lessons — shows media/MCQs and respects watch progress
    Route::get('lessons/{lesson}', [LessonViewController::class, 'show'])
        ->name('student.lessons.show');

    // Mark lesson complete (optional manual endpoint; your flow auto-completes on pass)
    Route::post('lessons/{lesson}/complete', [LessonViewController::class, 'complete'])
        ->name('student.lessons.complete');

    // Track YouTube watch progress (called by JS)
    Route::post('lessons/{lesson}/progress', [LessonViewController::class, 'progress'])
        ->name('student.lessons.progress');

            Route::get('/lessons/{lesson}/download', [LessonViewController::class, 'download'])
        ->name('student.lessons.download');

    // ===== QUIZ PLAY (Student-side) =====
    // Start attempt (POST; guarded for purchased course and 90% watch if video)
    Route::post('quizzes/{quiz}/start', [QuizPlayController::class, 'start'])
        ->name('student.quizzes.start');

    // Take attempt UI (GET)
    Route::get('attempts/{attempt}/take', [QuizPlayController::class, 'take'])
        ->name('student.attempts.take');

    // Submit attempt (POST) — grades and, on pass, writes quiz_passed_at + completed_at
    Route::post('attempts/{attempt}/submit', [QuizPlayController::class, 'submit'])
        ->name('student.attempts.submit');

    // Result page
    Route::get('attempts/{attempt}/done', [QuizPlayController::class, 'result'])
        ->name('student.attempts.result');

    /* ==== ADDED: Q&A (Student) ==== */
    Route::get('lessons/{lesson}/qna', [WebsiteQnaController::class, 'index'])->name('student.qna.index');
    Route::post('lessons/{lesson}/qna', [WebsiteQnaController::class, 'store'])->name('student.qna.store');
    Route::get('qna/{thread}', [WebsiteQnaController::class, 'show'])->name('student.qna.show');
    Route::post('qna/{thread}/reply', [WebsiteQnaController::class, 'reply'])->name('student.qna.reply');

    /* ==== ADDED: Discussions (Student) ==== */
    Route::get('lessons/{lesson}/discussions', [WebsiteDiscussionController::class, 'index'])->name('student.discussion.index');
    Route::post('lessons/{lesson}/discussions', [WebsiteDiscussionController::class, 'store'])->name('student.discussion.store');
    Route::get('discussions/{thread}', [WebsiteDiscussionController::class, 'show'])->name('student.discussion.show');
    Route::post('discussions/{thread}/reply', [WebsiteDiscussionController::class, 'reply'])->name('student.discussion.reply');
});

/*
|--------------------------------------------------------------------------
| Admin: Quiz Builder, Attempts (role:admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    // Quiz CRUD
    Route::resource('quizzes', QuizController::class);

    // Publish toggle
    Route::patch('quizzes/{quiz}/toggle', [QuizController::class, 'togglePublish'])
        ->name('quizzes.toggle');

    // Question builder
    Route::get('quizzes/{quiz}/questions',  [QuizQuestionController::class, 'index'])->name('quizzes.questions.index');
    Route::post('quizzes/{quiz}/questions', [QuizQuestionController::class, 'store'])->name('quizzes.questions.store');
    Route::get('questions/{question}/edit', [QuizQuestionController::class, 'edit'])->name('questions.edit');
    Route::put('questions/{question}',      [QuizQuestionController::class, 'update'])->name('questions.update');
    Route::delete('questions/{question}',   [QuizQuestionController::class, 'destroy'])->name('questions.destroy');

    // Attempts admin views
    Route::get('quizzes/{quiz}/attempts',           [QuizAttemptController::class, 'index'])->name('quizzes.attempts.index');
    Route::delete('quizzes/{quiz}/attempts/{user}', [QuizAttemptController::class, 'resetUser'])->name('quizzes.attempts.resetUser');
    Route::get('attempts/{attempt}',                [QuizAttemptController::class, 'show'])->name('attempts.show');
    Route::delete('attempts/{attempt}',             [QuizAttemptController::class, 'destroy'])->name('attempts.destroy');

    // NOTE: Do NOT define student.* routes here; student routes live under /dashboard
});


// course categories 
Route::middleware(['auth','role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('course-categories', CourseCategoriesController::class);
});

/* ==== ADDED: Q&A + Discussions Moderation (Admin/Teacher via /admin) ====
   - Uses only 'auth' here so teachers can access; the controller checks role (admin/teacher).
   - Does NOT change any of your existing admin groups.
*/
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Q&A moderation
    Route::get('qna', [AdminQnaController::class, 'index'])->name('admin.qna.index');
    Route::post('qna/replies/{reply}/mark-answer', [AdminQnaController::class, 'markAnswer'])->name('admin.qna.markAnswer');
    Route::post('qna/threads/{thread}/toggle', [AdminQnaController::class, 'toggleStatus'])->name('admin.qna.toggle');
    Route::delete('qna/threads/{thread}', [AdminQnaController::class, 'destroy'])->name('admin.qna.delete');

    // Discussions moderation
    Route::get('discussions', [AdminDiscussionController::class, 'index'])->name('admin.discussion.index');
    Route::post('discussions/threads/{thread}/pin', [AdminDiscussionController::class, 'pin'])->name('admin.discussion.pin');
    Route::delete('discussions/threads/{thread}', [AdminDiscussionController::class, 'destroy'])->name('admin.discussion.delete');
    
});

// announcement

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('announcements', [AnnouncementController::class, 'index'])->name('admin.announcements.index');
    Route::post('announcements', [AnnouncementController::class, 'store'])->name('admin.announcements.store');
    Route::delete('announcements/{announcement}', [AnnouncementController::class, 'destroy'])->name('admin.announcements.destroy');
    Route::post('announcements/{announcement}/toggle', [AnnouncementController::class, 'toggle'])->name('admin.announcements.toggle');
});

// Student Announcements
Route::middleware(['auth'])->group(function () {
    // Student announcements (root level)
    Route::get('/announcements', [WebsiteAnnouncementController::class, 'index'])
        ->name('student.announcements.index');

    Route::post('/announcements/{announcement}/read', [WebsiteAnnouncementController::class, 'markRead'])
        ->name('student.announcements.read'); // <-- must match Blade
});

// Student Notifications
Route::middleware(['auth'])->group(function () {
    // Notifications (student)
    Route::get('/notifications', [WebsiteNotificationController::class, 'index'])
        ->name('student.notifications.index');

    Route::post('/notifications/{id}/read', [WebsiteNotificationController::class, 'markRead'])
        ->name('student.notifications.read');

    Route::post('/notifications/read-all', [WebsiteNotificationController::class, 'markAllRead'])
        ->name('student.notifications.readAll'); // <-- THIS NAME must match the Blade
});

// student quiz attempts
Route::middleware(['auth'])->group(function () {
    Route::get('/quiz-attempts', [StudentQuizAttemptController::class, 'index'])
        ->name('quiz.attempts');
});
 
// blog and blog category

Route::prefix('admin')->name('admin.')->middleware(['web','auth'])->group(function () {
    Route::resource('blog', BloController::class)->parameters([
        'blog' => 'blog' // for BlogPost $blog binding
    ]);
});
Route::prefix('admin')->as('admin.')->middleware('auth')->group(function () {
    Route::resource('blog-categories', BlogCategoryController::class);
});


Route::get('/blog/category/{slug}', [BlogCategoryController::class, 'show'])
    ->name('BlogCategory');

    // purchase history
    Route::middleware('auth')->group(function () {
    Route::get('/purchase-history', [PurchaseHistoryController::class, 'index'])
        ->name('purchase.history');
});

// personal discount

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    // list + create discounts for a course
    Route::get('courses/{course}/discounts',  [PersonalDiscountController::class, 'index'])->name('personal-discounts.index');
    Route::post('courses/{course}/discounts', [PersonalDiscountController::class, 'store'])->name('personal-discounts.store');

    // delete a discount row
    Route::delete('discounts/{discount}',     [PersonalDiscountController::class, 'destroy'])->name('personal-discounts.destroy');
});

// zoom meeting
Route::resource('zoom-meetings', ZoomMeetingController::class);

// AboutBanner --
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('about-banners', AboutBannerController::class);
});
// {{About Icons}}
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('about-icons', AboutIconController::class);
});
// {{aBOUTpOST}}
Route::resource('about-posts', AboutPostController::class);
// {{  About Gallery Images}}

Route::resource('about-gallery-images', AboutGalleryImageController::class);
// contact

Route::post('/contact', [EmailContactController::class, 'store'])->name('contact.store');
Route::get('/admin/contacts', [EmailContactController::class, 'index'])->name('admin.contacts.index');

// faq student

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('faq-students', FaqStudentController::class);
});
// faq teacher

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('faq-teachers', FaqTeacherController::class);
});


/* ====================================================================== */
/* ====================================================================== */