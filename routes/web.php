<?php

use App\Models\Product;
use App\Models\ProductionsLine;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Product\ProductComponent;
use App\Http\Livewire\ProductLine\ProductLineComponent;
use App\Http\Livewire\Admin\Voucher\AdminVoucherComponent;
use App\Http\Livewire\Admin\Customers\AdminCustomerComponent;
use App\Http\Livewire\Admin\Countries\AdminCountriesComponent;
use App\Http\Livewire\Admin\FoodsRestrictions\AdminFoodRestrictionComponent;
use App\Http\Livewire\Admin\RoomsConfigurations\AdminRoomConfigurationComponent;


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
    return redirect('/admin');
});


Route::get('/product-line', ProductLineComponent::class);
Route::get('/product', ProductComponent::class); 

//NatureColombia

Route::get('/customers', AdminCustomerComponent::class)->name('customers');
Route::get('/countries', AdminCountriesComponent::class)->name('countries');
Route::get('/foods-restrictions', AdminFoodRestrictionComponent::class)->name('foods-restrictions');
Route::get('/rooms-configurations', AdminRoomConfigurationComponent::class)->name('rooms-configuration');
Route::get('/voucher', AdminVoucherComponent::class)->name('voucher');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});






