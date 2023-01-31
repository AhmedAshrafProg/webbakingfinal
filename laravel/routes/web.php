<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\FrontendController;

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

Route::get('/', function () {
    return view('frontend.index');
});

Route::prefix('users')->group(function () {

    Route::get('/logout', [AdminUserController::class,'AdminLogout'])->name('user.logout');
    Route::get('/user/change/password', [AdminUserController::class,'change_password'])->name('user.change.password');
    Route::get('/profile', [AdminUserController::class,'ShowProfile'])->name('user.profile');
    Route::post('/change/password', [AdminUserController::class,'ChangePassword'])->name('password.update');
    Route::post('/profile/update', [AdminUserController::class,'ProfileUpdate'])->name('profile.update');

});

Route::prefix('services')->group(function () {
    Route::get('/all/services', [ServiceController::class,'showServices'])->name('allservices');
    Route::get('/add/service', [ServiceController::class,'AddService'])->name('add.service');
    Route::post('/service/store', [ServiceController::class,'ServiceStore'])->name('service.store');
    Route::get('/delete/service/{id}', [ServiceController::class,'deleteService'])->name('service.delete');
    Route::get('/edit/service/{id}', [ServiceController::class,'EditService'])->name('service.edit');
    Route::post('/service/update/{id}', [ServiceController::class,'ServiceUpdate'])->name('service.update');
    });


    Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function () {
    $service=DB::table('services')->get();

$courses=DB::table('courses')->get();
$message=DB::table('contacts')->get();
$projects=DB::table('projects')->get();
    return view('admin.index',compact('service','courses','message','projects'));
})->name('admin.home');

//services
Route::prefix('services')->group(function () {
    Route::get('/all/services', [ServiceController::class,'showServices'])->name('allservices');
    Route::get('/add/service', [ServiceController::class,'AddService'])->name('add.service');
    Route::post('/service/store', [ServiceController::class,'ServiceStore'])->name('service.store');
    Route::get('/delete/service/{id}', [ServiceController::class,'deleteService'])->name('service.delete');
    Route::get('/edit/service/{id}', [ServiceController::class,'EditService'])->name('service.edit');
    Route::post('/service/update/{id}', [ServiceController::class,'ServiceUpdate'])->name('service.update');
    });


    //courses routes
    Route::prefix('courses')->group(function () {
    Route::get('/all/courses', [CourseController::class,'showCourses'])->name('allcourses');
    Route::get('/add/course', [CourseController::class,'AddCourse'])->name('add.course');
    Route::post('/store/course', [CourseController::class,'StoreCourse'])->name('store.course');
    Route::get('/delete/course/{id}', [CourseController::class,'DeleteCourse'])->name('course.delete');
    Route::get('/edit/course/{id}', [CourseController::class,'EditCourse'])->name('course.edit');
    Route::post('/update/course/{id}', [CourseController::class,'updateCourse'])->name('update.course');
});

//Contact Routes
Route::get('/view/message', [ContactController::class,'ViewMessages'])->name('view.Messages');
Route::get('/delete/message/{id}', [ContactController::class,'DeleteMessages'])->name('message.delete');

//projects routes
Route::get('/all/projects', [ProjectController::class,'showProjects'])->name('all.projects');
Route::get('/add/project', [ProjectController::class,'AddProjects'])->name('add.project');
Route::post('/store/project', [ProjectController::class,'StoreProject'])->name('store.project');
Route::get('/delete/project/{id}', [ProjectController::class,'DeleteProjects'])->name('project.delete');
Route::get('/edit/project/{id}', [ProjectController::class,'EditProjects'])->name('project.edit');
Route::post('/update/project/{id}', [ProjectController::class,'UpdateProject'])->name('update.project');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        return view('frontend.index');
    })->name('home');
});

Route::get('/about', [FrontendController::class,'about'])->name('about');
Route::get('/computer', [FrontendController::class,'computer'])->name('computer');
Route::get('/contact', [FrontendController::class,'contact'])->name('contact');
Route::get('/laptop', [FrontendController::class,'laptop'])->name('laptop');
Route::get('/product', [FrontendController::class,'product'])->name('product');
