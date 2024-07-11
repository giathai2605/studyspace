<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\Admin\ExcelController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PracticeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TestCaseController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\CertificateController;
use App\Http\Controllers\Client\CourseIntroController;
use App\Http\Controllers\Client\LessonLearn;
use App\Http\Controllers\Client\PracticeLearnController;
use App\Http\Controllers\Client\CommentController as ClientCommentController;
use App\Http\Controllers\Client\SearchController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Client\HomeController as ClientHomeController;
use App\Http\Controllers\Client\CourseController as ClientCourseController;
use App\Http\Controllers\Client\DashboardController as ClientDashboardController;
use App\Http\Controllers\Client\AccoutClientController;
use App\Http\Controllers\Client\WishlistController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Client\RatingController as ClientRatingController;
use App\Http\Controllers\Admin\CertificateController as AdminCertificateController;


// ---------------------------- NEW CLIENT -------------------------------------
// ================== HOME =========================
Route::controller(ClientHomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::group(['middleware' => 'auth'], function () {
    Route::controller(WishlistController::class)->group(function () {
        Route::get('/wishlist', 'index')->name('wishlist');
        Route::post('/addWishlist', 'addWishlist')->name('wishlist.add');
        Route::get('/addWishlist/{id}', 'addWishlistwithGet')->name('wishlist.add.get');
    });
});
// ================== DETAIL =========================

//Route::get('/newclient/course/detail', function () {
//    return view('newclient.detail.index');add-video
//})->name('detail.courses');

Route::controller(ClientCourseController::class)->group(function () {
    Route::match(['get', 'post'], '/client/courses', 'all')->name('all.courses');
    Route::get('/client/courses/{id}', 'filterCate')->name('filterByCategory.courses');
    Route::get('/client/course/detail/{id}', 'detail')->name('detail.courses');
});

Route::controller(ClientRatingController::class)->group(function () {
    Route::post('/client/rating/store', 'store')->name('rating.store');
    Route::post('/client/rating/storeReply', 'storeReply')->name('rating.storeReply');
});
Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');
Route::get('/term-condition', function () {
    return view('term-condition');
})->name('term-condition');

// ================== MY_DASHBOARD =========================

//======================= COURSES =========================

Route::get('/newclient/dashboard/courses', function () {
    return view('newclient.dashboard.courses.index');
})->name('dashbord.teacher');

// ================== EDIT PROFILE =========================
Route::get('/newclient/dashboard/edit_profile', function () {
    return view('newclient.dashboard.edit_profile.index');
})->name('dashbord.edit_profile');

//======================= ORDER =========================
Route::get('/newclient/dashboard/order', function () {
    return view('newclient.dashboard.order.index');
})->name('dashbord.order');

// ================== STUDENT MANAGEMENT =========================
Route::get('/newclient/dashboard/student_management', function () {
    return view('newclient.dashboard.student_management.index');
})->name('dashbord.student_management');

//========================= SECURITY =========================
Route::get('/newclient/dashboard/security', function () {
    return view('newclient.dashboard.security.index');
})->name('dashbord.security');

//======================= DELETE ACCOUNT =========================
Route::get('/newclient/dashboard/delete_account', function () {
    return view('newclient.dashboard.delete_account.index');
})->name('delete_account');

// ---------------------- MY_DASHBOARD END ------------------------


// ================== STUDENT =========================

// ================== MY STUDENT =========================
Route::get('/newclient/student/dashboard', function () {
    return view('newclient.student.dashboard.index');
})->name('dashboard.student');
// ================== DASHBOARD END =========================

// ================== COURSES =========================
Route::get('/newclient/student/courses', function () {
    return view('newclient.student.courses.index');
})->name('student.courses');

// ================== WISHLIST =========================
Route::get('/newclient/student/wishlist', function () {
    return view('newclient.student.wishlist.index');
})->name('student.wishlist');


// ================== MESSAGE =========================
Route::get('/newclient/student/message', function () {
    return view('newclient.student.message.index');
})->name('student.message');

// ================== PURCHASE_HISTORY =========================
// Route::get('/newclient/student/purchase_history', function () {
//     return view('newclient.student.purchase_history.index');
// })->name('student.purchase_history');

Route::get('/newclient/student/invoice_history', function () {
    return view('newclient.student.invoice_history.index');
})->name('student.invoice_history');

Route::get('/admin/history', function () {
    return view('admin.history.index');
})->name('history.index');
// ================== STUDENT END =========================


// ---------------------------- NEW CLIENT END --------------------------------------------


// -------------Test route course-------------
Route::get('/client/course', function () {
    return view('client.course');
})->name('course');

// -------------Test route course-------------
//Route::get('/client/course-intro/{id}', function () {
//    return view('client.course-intro');
//})->name('course-intro');

// -------------Test route course-------------
Route::get('/client/course-watch', function () {
    return view('client.course-watch');
})->name('course-watch');
Route::get('/client/course-testcase', function () {
    return view('client.course-testcase');
})->name('course-testcase');

Route::get('/admin/dashboard/analytic', function () {
    return view('admin.dashboard.analytics.index');
})->name('analytic');
Route::get('/admin/dashboard/ecommerce', function () {
    return view('admin.dashboard.ecommerce.index');
})->name('ecommerce');
Route::get('/admin/dashboard/marketing', function () {
    return view('admin.dashboard.marketing.index');
})->name('marketing');
Route::get('/admin/dashboard/CRM', function () {
    return view('admin.dashboard.CRM.index');
})->name('CRM');

// -------------Calendar-------------
Route::get('/admin/calendar', function () {
    return view('admin.calendar.index');
})->name('calendar');
// -------------Profile-------------

Route::get('/admin/profile', function () {
    return view('admin.profile.index');
})->name('profile');
// -------------Tasks-------------

Route::get('/admin/task/list', function () {
    return view('admin.task.list.index');
})->name('list');
Route::get('/admin/task/kanban', function () {
    return view('admin.task.kanban.index');
})->name('kanban');
// -------------Forms-------------

Route::get('/admin/forms/form_elementor', function () {
    return view('admin.forms.form_elementor.index');
})->name('form_elementor');
Route::get('/admin/forms/form_layout', function () {
    return view('admin.forms.form_layout.index');
})->name('form_layout');
// -------------Table-------------

Route::get('/admin/table', function () {
    return view('admin.table.index');
})->name('table');
// -------------Pages-------------

Route::get('/admin/pages/setting', function () {
    return view('admin.pages.setting.index');
})->name('setting');
Route::get('/admin/pages/file_manager', function () {
    return view('admin.pages.file_manager.index');
})->name('file_manager');
Route::get('/admin/pages/data_table', function () {
    return view('admin.pages.data_table.index');
})->name('data_table');
Route::get('/admin/pages/pricing_table', function () {
    return view('admin.pages.pricing_table.index');
})->name('pricing_table');
Route::get('/admin/pages/error_page', function () {
    return view('admin.pages.error_page.index');
})->name('error_page');
Route::get('/admin/pages/mail_success', function () {
    return view('admin.pages.mail_success.index');
})->name('mail_success');


// -------------Message-------------

Route::get('/admin/message', function () {
    return view('admin.message.index');
})->name('message');
// -------------Inbox-------------

Route::get('/admin/inbox', function () {
    return view('admin.inbox.index');
})->name('inbox');
// -------------Invoice-------------

Route::get('/admin/invoice', function () {
    return view('admin.invoice.index');
})->name('invoice');
// -------------Others-------------

Route::get('/admin/others/advanced_chart', function () {
    return view('admin.others.advanced_chart.index');
})->name('advanced_chart');

// -------------UI_elementor-------------

Route::get('/admin/ui_element/alert', function () {
    return view('admin.ui_element.alert.index');
})->name('alert');
Route::get('/admin/ui_element/button', function () {
    return view('admin.ui_element.button.index');
})->name('button');
Route::get('/admin/ui_element/button_group', function () {
    return view('admin.ui_element.button_group.index');
})->name('button_group');
Route::get('/admin/ui_element/badge', function () {
    return view('admin.ui_element.badge.index');
})->name('badge');
Route::get('/admin/ui_element/breadcrumb', function () {
    return view('admin.ui_element.breadcrumb.index');
})->name('breadcrumb');
Route::get('/admin/ui_element/card', function () {
    return view('admin.ui_element.card.index');
})->name('card');
Route::get('/admin/ui_element/accordion', function () {
    return view('admin.ui_element.accordion.index');
})->name('accordion');
Route::get('/admin/ui_element/pagination', function () {
    return view('admin.ui_element.pagination.index');
})->name('pagination');
Route::get('/admin/ui_element/progress', function () {
    return view('admin.ui_element.progress.index');
})->name('progress');
Route::get('/admin/ui_element/video', function () {
    return view('admin.ui_element.video.index');
})->name('video');

// -------------signin-------------
Route::get('/admin/signin', function () {
    return view('admin.signin.index');
})->name('signin');
// -------------sigup-------------
Route::get('/admin/sigup', function () {
    return view('admin.sigup.index');
})->name('sigup');
// -------------reset passwword-------------
Route::get('/admin/reset_password', function () {
    return view('admin.reset_password.index');
})->name('reset_password');
Route::post('/search', [SearchController::class, 'search'])->name('search');

// Route::get('/listCourse', [CoursesController::class, 'listCourses'])->name('listCourse');
// Route::match(['get', 'post'], 'listCourse/add', [CoursesController::class, 'createCourse'])->name('createCourse');
// Route::match(['get', 'post'], 'listCourse/edit/{id}', [CoursesController::class, 'editCourse'])->name('editCourse');
// // Route::get('deleteCourse/{id}', [CoursesController::class, 'deleteCourse'])->name('deleteCourse');

Route::get('/send-reminder-email', function () {
    Artisan::call('reminder:send');
});
Route::post('/sendMessage', [MessageController::class, 'sendMessage'])->name('sendMessage');
Route::get('/getMessage', [MessageController::class, 'index'])->name('getMessage');
Route::get('/getInbox', [MessageController::class, 'getInbox'])->name('getInbox');
Route::get('/getChatWithUser/{id}', [MessageController::class, 'getChatWithUser'])->name('getChatWithUser');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:Admin|IT - Support|Quality Manager|Censor|Supper Admin']], function () {
    Route::controller(HomeController::class)->group(function () {
        Route::match(['get', 'post'], '/', 'index')->name('admin.index');
    });
    Route::get('all-orders', [HomeController::class, 'allOrders'])->name('allOrders');
    Route::group(['prefix' => '/excel'], function () {
        Route::controller(ExcelController::class)->group(function () {
            Route::get('/downloadCourseTemplate', 'downloadCourseTemplate')->name('excel.downloadCourseTemplate');
            Route::get('/downloadChapterTemplate', 'downloadChapterTemplate')->name('excel.downloadChapterTemplate');
            Route::get('/downloadLessonTemplate', 'downloadLessonTemplate')->name('excel.downloadLessonTemplate');
            Route::get('/downloadPracticeTemplate', 'downloadPracticeTemplate')->name('excel.downloadPracticeTemplate');
            Route::get('/downloadTestcaseTemplate', 'downloadTestcaseTemplate')->name('excel.downloadTestcaseTemplate');
        });
    });
    Route::group(['prefix' => '/users'], function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/', 'index')->name('users.index');
            Route::get('/create/{id}', 'create')->name('users.create');
            Route::post('/store', 'store')->name('users.store');
            Route::get('/staff', 'staff')->name('users.staff');
            Route::get('/admin', 'admin')->name('users.admin');
            Route::get('/customer', 'customer')->name('users.customer');
            Route::get('/edit/{id}', 'edit')->name('users.edit');
            Route::post('/update/{id}', 'update')->name('users.update');
            Route::get('/destroy/{id}', 'destroy')->name('users.destroy');
            Route::get('/block/{id}', 'block')->name('users.block');
            Route::post('/userStatus', 'updateUserStatus')->name('users.status');
            Route::get('/profile/{id}', 'show')->name('users.profile');
        });
    });

    // Tài liệu
    Route::controller(DocumentController::class)->group(function () {
        Route::prefix('documents')->group(function () {
            Route::match(['get', 'post'], '/', 'index')->name('documents.index');
            Route::get('/create', 'create')->name('documents.create');
            Route::post('/store', 'store')->name('documents.store');
            Route::get('/edit/{id}', 'edit')->name('documents.edit');
            Route::post('/update/{id}', 'update')->name('documents.update');
            Route::get('/destroy/{id}', 'destroy')->name('documents.destroy');
            Route::get('/show/{id}', 'show')->name('documents.show');
            Route::post('/approved', 'updateDocumentStatus')->name('documents.approved');
            Route::post('/featured', 'updateDocumentFeatured')->name('documents.featured');
        });
    });
    Route::group(['prefix' => 'roles'], function () {
        Route::controller(RoleController::class)->group(function () {
            Route::get('/', 'index')->name('roles.index');
            Route::get('/create', 'create')->name('roles.create');
            Route::post('/store', 'store')->name('roles.store');
            Route::get('/edit/{id}', 'edit')->name('roles.edit');
            Route::post('/update/{id}', 'update')->name('roles.update');
            Route::get('/destroy/{id}', 'destroy')->name('roles.destroy');
            Route::get('/show/{id}', 'show')->name('roles.show');
        });
    });

    Route::group(['prefix' => 'permissions'], function () {
        Route::controller(PermissionController::class)->group(function () {
            Route::get('/', 'index')->name('permissions.index');
            //            Route::get('/create', 'create')->name('permissions.create');
            //            Route::post('/store', 'store')->name('permissions.store');
            //            Route::get('/edit/{id}', 'edit')->name('permissions.edit');
            //            Route::post('/update/{id}', 'update')->name('permissions.update');
            //            Route::get('/destroy/{id}', 'destroy')->name('permissions.destroy');
        });
    });

    Route::group(['prefix' => '/category'], function () {
        Route::controller(CategoryController::class)->group(function () {
            Route::get('/', 'index')->name('category.index');
            Route::get('/create', 'create')->name('category.create');
            Route::post('/store', 'store')->name('category.store');
            Route::get('/edit/{id}', 'edit')->name('category.edit');
            Route::post('/update/{id}', 'update')->name('category.update');
            Route::get('/destroy/{id}', 'destroy')->name('category.destroy');
            Route::get('/show/{id}', 'show')->name('category.show');
        });
    });

    Route::group(['prefix' => '/courses'], function () {
        Route::controller(CoursesController::class)->group(function () {
            Route::get('/', 'index')->name('courses.index');
            Route::get('/add', 'add')->name('courses.add');
            Route::post('/store', 'store')->name('courses.store');
            Route::get('/edit/{id}', 'edit')->name('courses.edit');
            Route::post('/update/{id}', 'update')->name('courses.update');
            Route::get('/destroy/{id}', 'destroy')->name('courses.destroy');
            Route::get('/show/{id}', 'show')->name('courses.show');
            Route::post('/import', 'import')->name('courses.import');
            Route::get('/show-import', 'showImport')->name('courses.show-import');
            Route::post('/courseStatus', 'updateCourseStatus')->name('courses.status');
            Route::get('/ratingManagement/{id}', 'ratingManagement')->name('courses.ratingManagement');
            Route::get('/ratingDetail/{id}', 'ratingDetail')->name('courses.ratingDetail');
            Route::get('/deleteRating/{id}', 'deleteRating')->name('courses.deleteRating');
            Route::get('/deleteReplyRating/{id}', 'deleteReplyRating')->name('courses.deleteReplyRating');
        });
    });

    Route::group(['prefix' => '/chapter'], function () {
        Route::controller(ChapterController::class)->group(function () {
            Route::get('/', 'index')->name('chapter.index');
            Route::get('/create', 'create')->name('chapter.create');
            Route::get('/create/{id}', 'create')->name('chapter.createWithCourseId');
            Route::post('/store', 'store')->name('chapter.store');
            Route::post('/import', 'import')->name('chapter.import');
            Route::get('/edit/{id}', 'edit')->name('chapter.edit');
            Route::post('/update/{id}', 'update')->name('chapter.update');
            Route::get('/destroy/{id}', 'destroy')->name('chapter.destroy');
            Route::get('/show/{id}', 'show')->name('chapter.show');
        });
    });

    Route::group(['prefix' => '/lesson'], function () {
        Route::controller(LessonController::class)->group(function () {
            Route::get('/', 'index')->name('lesson.index');
            Route::get('/create', 'create')->name('lesson.create');
            Route::get('/create/{id}', 'create')->name('lesson.createWithChapterId');
            Route::post('/store', 'store')->name('lesson.store');
            Route::get('/edit/{id}', 'edit')->name('lesson.edit');
            Route::post('/update/{id}', 'update')->name('lesson.update');
            Route::get('/destroy/{id}', 'destroy')->name('lesson.destroy');
            Route::get('/detail/{id}', 'show')->name('lesson.detail');
            Route::get('/add-video/{id}', 'addVideos')->name('lesson.add-video');
            Route::post('/store-video/{id}', 'storeVideos')->name('lesson.store-video');
            Route::get('/destroyVideo/{id}', 'destroyVideo')->name('lessonVideo.destroy');
            Route::post('/import', 'import')->name('lesson.import');
        });
    });

    Route::group(['prefix' => '/practice'], function () {
        Route::controller(PracticeController::class)->group(function () {
            Route::get('/{id}', 'index')->name('practice.index');
            Route::get('/create/{id}', 'create')->name('practice.create');
            Route::post('/store', 'store')->name('practice.store');
            Route::get('/destroy/{id}', 'destroy')->name('practice.destroy');
            Route::get('/edit/{id}', 'edit')->name('practice.edit');
            Route::post('/update/{id}', 'update')->name('practice.update');
            Route::post('/import', 'import')->name('practice.import');
        });
    });

    Route::group(['prefix' => '/testcase'], function () {
        Route::controller(TestCaseController::class)->group(function () {
            Route::get('/{id}', 'index')->name('testcase.index');
            Route::get('/create/{id}', 'create')->name('testcase.create');
            Route::post('/store', 'store')->name('testcase.store');
            Route::get('/destroy/{id}', 'destroy')->name('testcase.destroy');
            Route::get('/edit/{id}', 'edit')->name('testcase.edit');
            Route::post('/update/{id}', 'update')->name('testcase.update');
            Route::post('/import', 'import')->name('testcase.import');
        });
    });

    Route::group(['prefix' => '/comments'], function () {
        Route::controller(CommentController::class)->group(function () {
            Route::get('/', 'index')->name('comments.index');
            Route::get('/{id}', 'show')->name('comments.show');
            Route::get('/destroy/{id}', 'destroy')->name('comments.destroy');
            Route::get('/lesson/{id}', 'getByLesson')->name('comments.lesson');
        });
    });
    Route::group(['prefix' => '/certificates'], function () {
        Route::controller(AdminCertificateController::class)->group(function () {
            Route::get('/', 'index')->name('certificate.index');
            Route::post('/approved', 'updateCertificateStatus')->name('certificates.approved');
            Route::get('/filterCertificateByCategory/{id}/', 'filterCertificateByCategory')->name('certificate.filterCertificateByCategory');
        });
    });
});

Route::group(['prefix' => 'client', 'middleware' => ['auth', 'verified']], function () {
    Route::group(['prefix' => '/my-account'], function () {
        Route::controller(AccoutClientController::class)->group(function () {
            Route::get('/', 'index')->name('account.index');
            Route::get('/{id}', 'show')->name('account.show');
            Route::get('/edit/{id}', 'edit')->name('account.edit');
            Route::post('/update/{id}', 'update')->name('account.update');
        });
    });
    Route::group(['prefix' => '/dashboard'], function () {
        Route::controller(ClientDashboardController::class)->group(function () {
            Route::get('/', 'index')->name('client.dashboard.index');
            Route::get('/edit-profile/{id}', 'editProfile')->name('client.dashboard.edit-profile');
            Route::post('/update-profile/{id}', 'updateProfile')->name('client.dashboard.update-profile');
            Route::get('/order-history/{id}', 'orderHistory')->name('client.dashboard.order-history');
        });

        Route::controller(ClientCourseController::class)->group(function () {
            Route::get('/courses/{id}', 'index')->name('dashboard.courses')->middleware('checkCourseAccess');
            Route::get('/filterByCategory/{id}', 'filterByCategory')->name('dashboard.filterByCategory');
        });
        Route::controller(CertificateController::class)->group(function () {
            Route::get('/certificate/{id}', 'showCertificate')->name('dashboard.showCertificate');
            Route::get('/filterCertificateByCategory/{id}/', 'filterCertificateByCategory')->name('dashboard.filterCertificateByCategory');
        });
        Route::post('/search/{id}', [SearchController::class, 'search'])->name('searchFromDashboard');
    });
    Route::group(['prefix' => '/course-intro'], function () {
        Route::controller(CourseIntroController::class)->group(function () {
            Route::get('/', 'index')->name('course-intro');
        });
    });
    Route::group(['prefix' => '/lesson-learn'], function () {
        Route::controller(LessonLearn::class)->group(function () {
            Route::get('/{id}', 'index')->name('lesson-learn');
            Route::post('/update-note/{id}', 'updateNote')->name('lesson-learn.update-note');
            Route::post('/store/{id}', 'store')->name('lesson-learn.store');
        });
    });
    Route::group(['prefix' => '/practice'], function () {
        Route::controller(PracticeLearnController::class)->group(function () {
            Route::get('/{id}', 'index')->name('practice');
            Route::post('/compiler', 'compiler')->name('practice.compiler');
            //userPracticeSubmit
            Route::post('/userPracticeSubmit', 'userPracticeSubmit')->name('practice.userPracticeSubmit');
        });
    });

    Route::group(['prefix' => '/comment'], function () {
        Route::controller(ClientCommentController::class)->group(function () {
            Route::post('/create', 'create')->name('comment.create');
            Route::post('/reply', 'reply')->name('comment.reply');
        });
    });
    Route::group(['prefix' => '/certificate'], function () {
        Route::controller(CertificateController::class)->group(function () {
            Route::get('/preview/{courseID}/{userID}', 'previewCertificate')->name('certificate.preview');
            Route::get('/generate/{courseID}', 'generateCertificate')->name('certificate.generate');
        });
    });
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::controller(CheckoutController::class)->group(function () {
        Route::get('/checkout/{id}', 'index')->name('checkout');
        Route::post('/payment/momopay', 'payment')->name('payment.momo');
        Route::post('/payment/vnpay', 'vnpay')->name('payment.vnpay');
        Route::get('/payment/momo-return/{id}/{user_id}', 'checkout_momo')->name('momo.return');
    });

    Route::controller(UserCourseController::class)->group(function () {
        Route::get('/addToUserCourse/{id}/{user_id}', 'addToUserCourse')->name('addToUserCourse');
        Route::get('/my-courses', 'myCourses')->name('users.my-courses');
    });
});

require __DIR__ . '/auth.php';
