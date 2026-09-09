<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\homeController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\DoctorController;
use App\Http\Controllers\frontend\AppointmentController;
use App\Http\Controllers\admin\AppointmentController  as AdminAppointentController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\PartnerController;
use App\Models\admin\Partner;
use App\Http\Controllers\admin\DoctrAchhivementController;
use App\Http\Controllers\ContacController;
use App\Http\Controllers\admin\ForceDeleteController;
use App\Http\Controllers\admin\FileController;
use App\Http\Controllers\admin\GeneralSettingsController;

Route::get('/', function () {
    return view('frontent.home');    })->name('home');

Route::get('/',[homeController::class, 'home'])->name('home');


Route::get('/service',           [homeController::class, 'service'])->name('service');
Route::get('/about',             [homeController::class, 'about'])->name('about');
Route::get('/department',        [homeController::class, 'department'])->name('department');
Route::get('/single-department', [homeController::class, 'single_department'])->name('single_department');


// doctor
Route::get('/doctor', [homeController::class, 'doctor'])->name('doctor');

// Route::get('/doctor/{id}', [DoctorController::class, 'index'])->name('doctor.department');

Route::get('/doctor-single/{slug}', [homeController::class, 'sigle_doctor'])->name('single-doctor');

// blog
Route::get('/blog-sidebar',[homeController::class, 'blog_sidebar'])->name('blog-sidebar');

// blog-single
Route::get('/blog-single/{slug}/',[homeController::class, 'blog_single'])->name('blog-single');
// Route::get('/blog-single/',[homeController::class, 'blog_single'])->name('blog-single');



// contact
Route::get('/contact', [homeController::class, 'contact'])->name('contact');

// terms and conditions
Route::get('/terms-and-conditions', [homeController::class, 'terms'])->name('terms');

// Appointment
route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment');
Route::post('/appointment-create',[AppointmentController::class, 'insert'])->name('appointment.create');

Route::get('/get-doctors/{category_id}',[AppointmentController::class, 'getDoctors'])->name('appointment.getDoctors');



// Admin login



// Route::get('/login', [LoginController::class, 'showLogin'])->name('showLogin');
// Route::post('/login',[LoginController::class,'login'])->name('login');
// Route::get('/logout',[LoginController::class, 'logout'])->name('admin.logout');
// Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

// footer

// contact
 Route::post('/contact-post',[ContacController::class,'insert'])->name('contact.insert');



Route::prefix('admin')->group(function () {

    // Login
    Route::get('/login', [LoginController::class, 'showLogin'])->name('showLogin');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    // Logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    // categories
    Route::get('category', [CategoriesController::class, 'index'])->name('admin.category.index');
    Route::get('/categories', [CategoriesController::class, 'categories_page'])->name('admin.categories_page');
    Route::post('/categories', [CategoriesController::class, 'caegory_store'])->name('admin.category.store');

    Route::get('/view-categories', [CategoriesController::class, 'categories'])->name('admin.view.categories');
    Route::get('/categories-eedit/{id}', [CategoriesController::class, 'edit'])->name('admin.category.edit');
    Route::put('/categories-update/{id}', [CategoriesController::class, 'update'])->name('admin.category.update');
    Route::delete('/category-delete/{id}', [CategoriesController::class, 'destroy'])->name('admin.category.destroy');
    //
    Route::patch('category/status/{id}', [CategoriesController::class, 'status'])->name('admin.category.status');
    Route::get('/category-search', [CategoriesController::class, 'view_categories'])->name('admin.view_categories');



    //  doctor
    Route::get('/admin-doctor-view', [DoctorController::class, 'index'])->name('admin.doctor.index');
    Route::get('/admin-doctor-create', [DoctorController::class, 'create'])->name('admin.doctor.create.page');
    Route::post('/admin-doctor-create', [DoctorController::class, 'insert'])->name('admin.doctor.insert');
    Route::get('/admin-doctor/{doctor}/edit', [DoctorController::class, 'edit'])->name('admin.doctor.edit');
    Route::put('/admin-doctor-update/{id}', [DoctorController::class, 'update'])->name('admin.doctor.update');
    Route::get('/admin-doctor-delete/{id}', [DoctorController::class, 'delete'])->name('admin.doctor.destroy');

    // Appointment
    Route::get('/admin-appointments',           [AdminAppointentController::class, 'index'])->name('admin.appointment');
    Route::put('/admin-appointment-status/{id}',[AdminAppointentController::class, 'updateStatus'])->name('admin.appointment.status');

    // service

    Route::get('/admin-all-page-view',           [PageController::class,  'index'])->name('admin.service.index');
    Route::get('/admin-all-page-edit/{id}',      [PageController::class,  'edit'])->name('admin.page.edit');
    // Route::get('/admin-service-edit-page/{id}',[PageController::class, 'service_edit'])->name('admin.service.edit');
    Route::put('/admin-service-page-update/{id}',[PageController::class,  'update'])->name('admin.page.update');

    // blog
    Route::get('/admin-blog-view',       [BlogController::class, 'index'])->name('admin.blog.view');
    Route::get('/admin-blog-create',     [BlogController::class, 'create'])->name('admin.blog.create');
    Route::post('/admin-blog-insert',    [BlogController::class, 'insert'])->name('admin.blog.insert');
    Route::get('/admin-blog-edit/{id}',  [BlogController::class, 'edit'])->name('admin.blog.edit');
    Route::put('/admin-blog-update/{id}',[BlogController::class, 'update'])->name('admin.blog.update');
    Route::get('/admin-blog-delete/{id}',[BlogController::class, 'delete'])->name('admin.blog.delete');

    // partner
    Route::get('/admin-partner-view',    [PartnerController::class,  'index'])->name('admin.partner.index');
    Route::get('/admin-partner-create',  [PartnerController::class,  'create'])->name('admin.partner.create');
    Route::post('/admin-partner-insert', [PartnerController::class,  'insert'])->name('admin.partner.insert');
    Route::get('/admin-partner-edit/{id}',    [PartnerController::class , 'edit'])->name('admin.partner.edit');
    Route::post('/admin-partner-uppdate/{id}',[PartnerController::class,  'update'])->name('admin.partner.update');
    Route::get('/admin-partner-delete/{id}',  [PartnerController::class,     'delete'])->name('admin.partner.delete');






    // Doctor Achivement
    Route::get('/admin-doctor-achivement-view',[DoctrAchhivementController::class, 'index'])->name('admin.d.achivement.view');
    Route::get('/admin-dooctor-achivement-create',[DoctrAchhivementController::class, 'create'])->name('admin.achivement.create');
    Route::post('/admin-doctor-achive-insert',[DoctrAchhivementController::class, 'insert'])->name('admin.doctor.achivement.insert');
    Route::get('/admin-doctor-achive-edit/{id}',[DoctrAchhivementController::class, 'edit'])->name('admin.doctor.achivement.edit');
    Route::post('/admin-doctor-achivement-update/{id}/',[DoctrAchhivementController::class, 'update'])->name('admin.doctor.achivement.update');
    Route::get('/admin-doctor-achivement-delete/{id}',[DoctrAchhivementController::class, 'delete'])->name('admin.doctor.achivement.delete');

    // trusht




    // contact
    Route::get('/admiin-contact-view',[ContacController::class, 'index'])->name('admin.contact.index');
    Route::get('/admin-contact-delete',[ContacController::class, 'delete'])->name('admin.contact.delete');


    // force delete
    Route::get('/admin-contact-view',[ForceDeleteController::class, 'index'])->name('admin.forceDelete.view');


    //partners trusht
     // trashed
    // Route::get('/admin-achivement-trusht',[PartnerController::class,'trash'])->name('admin.partner.trash');
    Route::delete('/dcdc-fccfc/{id}',[PartnerController::class, 'SoftDelete'])->name('records.destroy');
    Route::post('/admin-partners-restore/{id}',[PartnerController::class,'restore'])->name('admin.partner.restore');
    Route::delete('/admin-partner-force-delete/{id}',[PartnerController::class, 'forceDelete'])->name('admin.partner.forceDelete');

    // Achivemet Trusted
    Route::delete('/admin-achives-soft-delete/{id}',[DoctrAchhivementController::class, 'SoftDelete'])->name('admin.achive.softdelete');
    Route::post('/admin-achive-restore/{id}',[DoctrAchhivementController::class, 'reStore'])->name('admin.achive.restore');
    Route::delete('/admin-achive-force-delete/{id}',[DoctrAchhivementController::class, 'forceDelete'])->name('admin.achive.forcedelete');


    // file handling
    Route::get('/files',[FileController::class, 'index'])->name('admin.file.view');
    Route::get('/file-create',[FileController::class, 'create'])->name('admin.file.create');
    Route::post('files-upload',[FileController::class, 'insert'])->name('admin.file.insert');
    //dwonload
    Route::get('/file/{id}/dwonload',[FileController::class, 'dwonload'])->name('file.dwonload');
    //read
    Route::get('/file/{id}/read',[FileController::class, 'read'])->name('file.read');

    Route::get('/files/{id}/copy', [FileController::class, 'copy'])
    ->name('files.copy');

    // general setting
    Route::get('/general-setting',[GeneralSettingsController::class, 'get_setting'])->name('admin.general_setting');
    Route::post('/general-setting-update',[GeneralSettingsController::class, 'update_settings'])->name('general_setting_update');


    // terms and conditions
    Route::get('/terms',                        [\App\Http\Controllers\admin\TermsAndConditionController::class, 'index']  )->name('admin.terms.index');
    Route::get('/terms/create',                 [\App\Http\Controllers\admin\TermsAndConditionController::class, 'create'] )->name('admin.terms.create');
    Route::post('/terms/store',                 [\App\Http\Controllers\admin\TermsAndConditionController::class, 'store']  )->name('admin.terms.store');
    Route::get('/terms/{id}/edit',              [\App\Http\Controllers\admin\TermsAndConditionController::class, 'edit']   )->name('admin.terms.edit');
    Route::put('/terms/{id}/update',            [\App\Http\Controllers\admin\TermsAndConditionController::class, 'update'] )->name('admin.terms.update');
    Route::delete('/terms/{id}/delete',         [\App\Http\Controllers\admin\TermsAndConditionController::class, 'destroy'])->name('admin.terms.destroy');






    });






Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');


});
