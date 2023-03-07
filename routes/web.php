<?php

use App\Http\Controllers\{CategoryController, DashboardMannager , FrontendMannageController, PhpQuestionController, QueryGeneratorController, QuestionMannageController, StudentCommentController, StudentFeedbackController, StudentRegistrationController};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//FrontendMannageController start
Route::get('/',[FrontendMannageController::class , 'index'])->name('index');
Route::get('/registration/index',[FrontendMannageController::class , 'registration_index'])->name('student.registration.index');
Route::get('/contact',[FrontendMannageController::class , 'contact'])->name('contact');
Route::get('/service',[FrontendMannageController::class , 'service'])->name('service');
Route::get('/service/details/page/{id}',[FrontendMannageController::class , 'service_details'])->name('service.details');
//FrontendMannageController end

// chat gpt Section start
Route::get('/write/generate/view',[QueryGeneratorController::class , 'index'])->name('write.generate.view');
Route::post('/write/generate',[QueryGeneratorController::class , 'index_post'])->name('write.generate');
// chat gpt Section end

// Student Registration Controller start
Route::post('/student/registration',[StudentRegistrationController::class , 'student_registration'])->name('student.registration');
Route::post('/student/login',[StudentRegistrationController::class , 'student_login'])->name('student.login');
// Student Registration Controller end

// student feedback controller part start
Route::post('/student/feedback/post',[StudentFeedbackController::class , 'student_feedback'])->name('student.feedback');
// student feedback controller part end
// student comment controller part start for frontend view
Route::post('/contact/post',[StudentCommentController::class , 'contact_submit'])->name('contact.submit');


Route::middleware(['auth', 'verified'])->group(function () {

// for dashboard shows file

//
Route::get('/php/{id}',[QuestionMannageController::class , 'php_view'])->name('php.view');

// PHP Question Controller start
Route::get('/php/question/view',[PhpQuestionController::class , 'php'])->name('php.question.view');
Route::post('/php/question/insert',[PhpQuestionController::class , 'php_insert'])->name('php.question.insert.db');
Route::get('/php/question/edit/view/{id}',[PhpQuestionController::class , 'php_edit_view'])->name('php.question.edit.view');
Route::post('/php/question/edit/{id}',[PhpQuestionController::class , 'php_edit'])->name('php.question.edit');
Route::post('/php/question/delete/{id}',[PhpQuestionController::class , 'php_delete'])->name('php.question.delete.db');

// category controller part start
Route::post('/category/insert',[CategoryController::class , 'category_insert'])->name('category.insert');
Route::get('/category/edit/{id}',[CategoryController::class , 'category_edit'])->name('category.edit');
Route::post('/category/edit/{id}',[CategoryController::class , 'category_edit_post'])->name('category.edit.post');
Route::post('/category/delete/{id}',[CategoryController::class , 'category_delete_post'])->name('category.delete.post');

// student feedbacks controller part start
Route::get('/student/feedbacks/show',[StudentFeedbackController::class , 'student_feedback_show'])->name('student.feedback.show');
Route::post('/student/feedbacks/active/{id}',[StudentFeedbackController::class , 'student_feedback_active'])->name('student.feedback.active');
Route::post('/student/feedbacks/reject/{id}',[StudentFeedbackController::class , 'student_feedback_reject'])->name('student.feedback.reject');
Route::post('/student/feedbacks/delete/{id}',[StudentFeedbackController::class , 'student_feedback_delete'])->name('student.feedback.delete');

// student comment controller part start for backend view
Route::get('/student/comment/view',[StudentCommentController::class , 'comment_view'])->name('comment.view');
Route::post('/student/comment/active/{id}',[StudentCommentController::class , 'comment_active'])->name('comment.active');
Route::post('/student/comment/reject/{id}',[StudentCommentController::class , 'comment_reject'])->name('comment.reject');
Route::post('/student/comment/delete/{id}',[StudentCommentController::class , 'comment_delete'])->name('comment.delete');

// DashboardMannager Controller start
Route::get('/dashboard',[DashboardMannager::class , 'dashboard_index'])->name('dashboard');
Route::post('/dashboard/admin/create',[DashboardMannager::class , 'dashboard_admin_create'])->name('dashboard.admin.create');
Route::post('/dashboard/user/delete/{id}',[DashboardMannager::class , 'dashboard_user_remove'])->name('dashboard.user.remove');
Route::get('/dashboard/category',[DashboardMannager::class , 'category_index'])->name('category.index');
Route::get('/dashboard/profile',[DashboardMannager::class , 'profile_update'])->name('profile');
Route::post('/dashboard/profile/update',[DashboardMannager::class , 'profile_update_info'])->name('profile.update.info');
Route::post('/dashboard/profile/password' , [DashboardMannager::class, 'update_password'])->name('update.user.password');
Route::post('/dashboard/profile/image/upload',[DashboardMannager::class , 'update_image'])->name('update.user.image');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// DashboardMannager Controller start
});
require __DIR__.'/auth.php';
