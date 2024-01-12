<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\ProductApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// use method get: api/product/
Route::get('/product', [ProductApiController::class, 'index']);
Route::get('/product/{id}', [ProductApiController::class, 'detailProduct']);
Route::get('/category', [ProductApiController::class, 'getCategory']);

Route::post('/addToCart/{productId}/{quantity}', [ProductApiController::class, 'addToCart'])->middleware('auth:sanctum');


//Login & Register & Logout
Route::post('/register', [AuthApiController::class, 'register']);
/*
        Chọn phương thức POST.
        Đặt URL: http://your-app-url/api/register.
        Chọn tab "Body" và truyền dữ liệu đăng ký dưới dạng form-data hoặc raw JSON.

    */
Route::post('/login', [AuthApiController::class, 'login']);
/*
        Chọn phương thức POST.
        Đặt URL: http://your-app-url/api/login.
        Chọn tab "Body" và truyền dữ liệu đăng nhập dưới dạng form-data hoặc raw JSON.
        Note: khi login thành công sẽ có 1 mã access_token nếu nó không phải string thì phải chạy composer, và chạy php artisan passport:install rồi thử lại
    */
Route::post('/logout', [AuthApiController::class, 'logout'])->middleware('auth:api');
/*
    -Chọn phương thức POST.
    -Đặt URL là http://your-app-url/api/logout.
    -Thêm header "Authorization" với giá trị "Bearer {access_token}" (lấy từ API login).
    Nhấn nút "Send" để gửi yêu cầu.
*/

Route::middleware('auth:api')->group(function () {
    Route::get('/profile', [AuthApiController::class, 'showProfile']);
    Route::put('/profile/update', [AuthApiController::class, 'updateProfile']);
    Route::get('/order_all', [OrderController::class, 'getListOrder']);
    Route::post('/order', [OrderController::class, 'create']);
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
