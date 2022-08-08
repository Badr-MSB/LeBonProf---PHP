<?php

use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TuteurController;
use App\Http\Controllers\LieuController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReservationController;
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

Route::get('/', [WebsiteController::class, 'home'])->name('home');

/* Student or User */
Route::post('/Student/RegistrationSubmit', [WebsiteController::class,'StudentRegistration_submit'])->name('StudentRegistration_submit');
Route::post('/Student/Login  Submit', [WebsiteController::class,'StudentLogin_Submit'])->name('StudentLogin_Submit');
Route::get('/student/Dashboard', [WebsiteController::class,'StudentDashboard'])->name('StudentDashboard')->middleware('auth');
Route::get('/student/Dashboard/StudentCoursDisponibles', [WebsiteController::class,'StudentCoursDisponibles'])->name('StudentCoursDisponibles')->middleware('auth');
Route::get('/student/Dashboard/StudentMesDemandes', [WebsiteController::class,'StudentMesDemandes'])->name('StudentMesDemandes')->middleware('auth');
Route::get('/student/Dashboard/StudentMesRéservationsEnCours', [WebsiteController::class,'StudentMesRéservationsEnCours'])->name('StudentMesRéservationsEnCours')->middleware('auth');
Route::get('/student/Dashboard/StudentMesReservationsConfirmees', [WebsiteController::class,'StudentMesReservationsConfirmees'])->name('StudentMesReservationsConfirmees')->middleware('auth');
Route::get('/Student/logout', [WebsiteController::class, 'StudentLogout'])->name('StudentLogout');
Route::post('/Student/Edit', [WebsiteController::class,'StudentEdit'])->name('StudentEdit');
Route::get('/Student/Delete', [WebsiteController::class,'StudentDelete'])->name('StudentDelete');
Route::get('/Student/ReservationSubmit/{id}', [WebsiteController::class,'StudentReservation_submit'])->name('StudentReservation_submit');
Route::post('/Student/LieuSelectSubmit/{id1}/{id2}', [WebsiteController::class,'StudentLieuSelectSubmit'])->name('StudentLieuSelectSubmit');
Route::post('/Tuteur/LieuSelectSubmit/{id1}/{id2}', [WebsiteController::class,'TuteurLieuSelectSubmit'])->name('TuteurLieuSelectSubmit');
Route::post('/Student/Search/Result', [WebsiteController::class, 'SearchResult'])->name('SearchResult');



/* Admin */
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin_login');
Route::post('/admin/login-submit', [AdminController::class, 'login_submit'])->name('admin_login_submit');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard')->middleware('admin:admin');
Route::get('/admin/dashboard/Students', [AdminController::class, 'AdminShowStudent'])->name('AdminShowStudent')->middleware('admin:admin');
Route::get('/admin/dashboard/Tuteurs', [AdminController::class, 'AdminShowTuteur'])->name('AdminShowTuteur')->middleware('admin:admin');
Route::get('/admin/dashboard/Lieux', [AdminController::class, 'AdminShowLieu'])->name('AdminShowLieu')->middleware('admin:admin');
Route::get('/admin/dashboard/Posts', [AdminController::class, 'AdminShowPosts'])->name('AdminShowPosts')->middleware('admin:admin');
Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin_settings')->middleware('admin:admin');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin_logout');
Route::get('/Admin/Student/Delete/{id}', [AdminController::class,'AdminStudentDelete'])->name('AdminStudentDelete');
Route::get('/Admin/Tuteur/Delete/{id}', [AdminController::class,'AdminTuteurDelete'])->name('AdminTuteurDelete');
Route::get('/Admin/Lieu/Delete/{id}', [AdminController::class,'AdminLieuDelete'])->name('AdminLieuDelete');
Route::get('/Admin/Post/Delete/{id}', [AdminController::class,'AdminPostDelete'])->name('AdminPostDelete');
Route::get('/Admin/Tuteur/validate/{id}', [AdminController::class,'AdminTuteurValidate'])->name('AdminTuteurValidate');
Route::get('/Admin/Lieu/validate/{id}', [AdminController::class,'AdminLieuValidate'])->name('AdminLieuValidate');


/* Tuteur */
Route::post('/Tuteur/RegistrationSubmit', [TuteurController::class,'TuteurRegistration_submit'])->name('TuteurRegistration_submit');
Route::post('/Tuteur/LoginSubmit', [TuteurController::class,'TuteurLogin_Submit'])->name('TuteurLogin_Submit');
Route::get('/Tuteur/Dashboard', [TuteurController::class,'TuteurDashboard'])->name('TuteurDashboard')->middleware('tuteur:tuteur');
Route::get('/Tuteur/Dashboard/MesDemandes', [TuteurController::class,'TuteurMesDemandes'])->name('TuteurMesDemandes')->middleware('tuteur:tuteur');
Route::get('/Tuteur/Dashboard/ReservationsEnCours', [TuteurController::class,'TuteurReservationsEnCours'])->name('TuteurReservationsEnCours')->middleware('tuteur:tuteur');
Route::get('/Tuteur/Dashboard/ReservationsConfirmees', [TuteurController::class,'TuteurReservationsConfirmees'])->name('TuteurReservationsConfirmees')->middleware('tuteur:tuteur');
Route::get('/Tuteur/logout', [TuteurController::class, 'TuteurLogout'])->name('TuteurLogout');
Route::post('/Tuteur/Edit', [TuteurController::class,'TuteurEdit'])->name('TuteurEdit');
Route::get('/Tuteur/Delete', [TuteurController::class,'TuteurDelete'])->name('TuteurDelete');


/* Lieu */
Route::post('/Lieu/RegistrationSubmit', [LieuController::class,'LieuRegistration_submit'])->name('LieuRegistration_submit');
Route::post('/Lieu/LoginSubmit', [LieuController::class,'LieuLogin_Submit'])->name('LieuLogin_Submit');
Route::get('/Lieu/Dashboard', [LieuController::class,'LieuDashboard'])->name('LieuDashboard')->middleware('lieu:lieu');
Route::get('/Lieu/Dashboard/MesDemandes', [LieuController::class,'LieuMesDemandes'])->name('LieuMesDemandes')->middleware('lieu:lieu');
Route::get('/Lieu/Dashboard/ReservationsConfirmees', [LieuController::class,'LieReservationsConfirmees'])->name('LieReservationsConfirmees')->middleware('lieu:lieu');
Route::get('/Lieu/logout', [LieuController::class, 'LieuLogout'])->name('LieuLogout');
Route::post('/Lieu/Edit', [LieuController::class,'LieuEdit'])->name('LieuEdit');
Route::get('/Lieu/Delete', [LieuController::class,'LieuDelete'])->name('LieuDelete');
Route::get('/Lieu/Disponible', [LieuController::class,'LieuDisponible'])->name('LieuDisponible');


/* Post */
Route::post('/Post/CreatePost', [PostController::class,'post_create'])->name('post_create');
Route::get('/Post/Delete/{id}', [PostController::class,'post_delete'])->name('post_delete');
Route::post('/Post/Edit/{id}', [PostController::class,'post_edit'])->name('post_edit');
Route::get('/Post/EditPage/{id}', [PostController::class,'TuteurPostEdit'])->name('TuteurPostEdit');



/* Reservation */
Route::get('/Tuteur/Reservation/Delete/{id}', [ReservationController::class,'TuteurReservationDelete'])->name('TuteurReservationDelete');
Route::get('/Tuteur/Reservation/Validate/{id}', [ReservationController::class,'TuteurReservationValidate'])->name('TuteurReservationValidate');
Route::get('/Lieu/Reservation/Validate/{id}', [ReservationController::class,'LieuReservationValidate'])->name('LieuReservationValidate');
Route::post('/Lieu/Reservation/Delete/{id}', [ReservationController::class,'LieuReservationDelete'])->name('LieuReservationDelete');
Route::get('/Student/Reservation/Delete/{id}', [ReservationController::class,'StudentReservationDelete'])->name('StudentReservationDelete');
Route::get('/Lieu/Reservation/Select/{id1}', [ReservationController::class,'LieuSelect'])->name('LieuSelect');
Route::get('/Tuteur/Lieu/Reservation/Select/{id1}', [ReservationController::class,'TuteurLieuSelect'])->name('TuteurLieuSelect');