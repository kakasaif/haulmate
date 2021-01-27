<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Admin\Auth\LoginController@login');
Route::get('/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');

Route::middleware(['auth:admin'])->group(function ()
{
    Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
    Route::get('/chart/{type}', 'Admin\DashboardController@chart')->name('admin.chart');
    Route::get('/change_password', 'Admin\ChangePasswordController@index')->name('admin.change_password');
    Route::post('/change_password', 'Admin\ChangePasswordController@update')->name('admin.update_password');

    Route::middleware(['roles:Super'])->group(function ()
    {
        Route::resource('administrators', 'Admin\AdministratorController');
        Route::post('/administrators/export_excel', 'Admin\AdministratorController@exportExcel')->name('administrators.export');
    });

    Route::middleware(['roles:Super,Admin'])->group(function ()
    {
        Route::resource('users', 'Admin\UsersController');
        Route::post('/users/export_excel', 'Admin\UsersController@exportExcel')->name('users.export');
        Route::get('/movings', 'Admin\MovingsController@index')->name('movings');
        Route::post('/movings/export_excel', 'Admin\MovingsController@exportExcel')->name('movings.export');
        Route::resource('locations', 'Admin\LocationsController');
        Route::resource('categories', 'Admin\CategoriesController');
        Route::resource('pref_options', 'Admin\PrefOptionsController');
        Route::resource('services', 'Admin\ServicesController');
        Route::resource('dashboardlinks', 'Admin\DashboardLinksController');
        Route::resource('contact_us', 'Admin\ContactUsController');
        Route::resource('testimonials', 'Admin\TestimonialsController');
        Route::resource('topics', 'Admin\TopicsController');
    });

    Route::middleware(['roles:Super,Admin,Housing,Both'])->group(function ()
    {
        Route::resource('housing', 'Admin\HousingController');
    });

    Route::middleware(['roles:Super,Admin,Partner,Both'])->group(function ()
    {
        Route::resource('product', 'Admin\ProductController');
        Route::get('product/wizard/add', 'Admin\ProductController@wizard_create')->name('product.wizard.create');
        Route::post('product/wizard/store', 'Admin\ProductController@wizard_store')->name('product.wizard.store');
        Route::get('product/wizard/edit/{product}', 'Admin\ProductController@wizard_edit')->name('product.wizard.edit');
        Route::put('product/wizard/update/{product}', 'Admin\ProductController@wizard_update')->name('product.wizard.update');

        Route::resource('product_category', 'Admin\ProductCategoryController');
        Route::get('product_category/wizard/add', 'Admin\ProductCategoryController@wizard_create')->name('product_category.wizard.create');
        Route::post('product_category/wizard/store', 'Admin\ProductCategoryController@wizard_store')->name('product_category.wizard.store');
        Route::get('product_category/wizard/edit/{product_category}', 'Admin\ProductCategoryController@wizard_edit')->name('product_category.wizard.edit');
        Route::put('product_category/wizard/update/{product_category}', 'Admin\ProductCategoryController@wizard_update')->name('product_category.wizard.update');

        Route::resource('product_detail', 'Admin\ProductDetailController');
        Route::get('product/details/add/{product}', 'Admin\WizardProductDetailController@create')->name('product_detail.wizard.create');
        Route::get('product/details/edit/{product}', 'Admin\WizardProductDetailController@edit')->name('product_detail.wizard.edit');
        Route::put('product/details/update/{product}', 'Admin\WizardProductDetailController@update')->name('product_detail.wizard.update');

        Route::resource('product_section', 'Admin\ProductSectionController');
        Route::get('product_category/sections/add/{product_category}', 'Admin\WizardSectionController@create')->name('category_sections.wizard.create');
        Route::post('product_category/sections/store', 'Admin\WizardSectionController@store')->name('category_sections.wizard.store');
        Route::get('product_category/sections/edit/{product_category}', 'Admin\WizardSectionController@edit')->name('category_sections.wizard.edit');
        Route::put('product_category/sections/update/{product_category}', 'Admin\WizardSectionController@update')->name('category_sections.wizard.update');

        Route::resource('product_section_item', 'Admin\ProductSectionItemController');
        Route::resource('partners', 'Admin\PartnerController');

        Route::get('get_sections', 'Admin\WizardSectionController@get_sections')->name('get_sections');
        Route::get('get_items', 'Admin\WizardSectionController@get_items')->name('get_items');
    });

    Route::resource('leads', 'Admin\LeadController');
    Route::get('/get_score/{location}', 'Admin\LocationsController@scores')->name('locations.scores');
    Route::post('/update_score', 'Admin\LocationsController@update_scores')->name('get_score');
    Route::group(['prefix' => 'ajax'], function ()
    {
        Route::post('dashboard/moving_to_filter', 'Admin\DashboardController@getMovingToFilter');
        Route::post('dashboard/filter', 'Admin\DashboardController@getData');
        Route::post('dashboard/chart_filter', 'Admin\DashboardController@getChartData');
        Route::post('upload/user-photo', 'Admin\UsersController@uploadPhoto');
        Route::post('upload/location-image', 'Admin\LocationsController@uploadImage');
        Route::post('upload/partner-image', 'Admin\PartnerController@uploadImage');
        Route::post('location/reorder-location-images', 'Admin\LocationsController@reorderLocationImages');
        Route::post('housing/reorder-images', 'Admin\HousingController@reorderImages');
        Route::post('upload/housing-image', 'Admin\HousingController@uploadImage');
        Route::post('upload/pref-image', 'Admin\Ref_optionController@uploadIcon');
        Route::post('upload/service-icon', 'Admin\ServicesController@uploadDefaultIcon');
        Route::post('upload/service-active-icon', 'Admin\ServicesController@uploadActiveIcon');
        Route::post('upload/testimonial-image', 'Admin\TestimonialsController@uploadImage');
        Route::post('testimonials/sortable', 'Admin\TestimonialsController@sortable');
        Route::post('testimonials/row-reorder', 'Admin\TestimonialsController@updateRowOrder');
        Route::post('upload/product-image', 'Admin\ProductController@uploadImage');
        Route::post('product_section_item/sortable', 'Admin\ProductSectionItemController@sortable');
        Route::post('product_category/sortable', 'Admin\ProductCategoryController@sortable');
        Route::post('product_section/sortable', 'Admin\ProductSectionController@sortable');
        Route::post('product/sortable', 'Admin\ProductController@sortable');
    });
});
