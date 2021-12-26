<?php

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/delivery', 'Shop\DeliveryController@index')->name('delivery');
Route::get('/constructor', 'Shop\ConstructorController@index')->name('constructor');
Route::post('/constructor', 'Shop\ConstructorController@index')->name('constructor');
Route::get('/catalog', 'Shop\CatalogController@index')->name('catalog');
Route::post('/catalog', 'Shop\CatalogController@index')->name('catalog');
Route::get('/product/{id}', 'Shop\ProductController@show')->name('product');
Route::get('/cart', 'Shop\CartController@index')->name('cart');
Route::post('/add-to-cart', 'Shop\CartController@addToCart')->name('addToCart');

Route::post('/payments/callback', 'PaymentController@callback')->name('payment.callback');

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Address
    Route::delete('addresses/destroy', 'AddressController@massDestroy')->name('addresses.massDestroy');
    Route::resource('addresses', 'AddressController');

    // City
    Route::delete('cities/destroy', 'CityController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CityController');

    // Event
    Route::delete('events/destroy', 'EventController@massDestroy')->name('events.massDestroy');
    Route::resource('events', 'EventController');

    // Color
    Route::delete('colors/destroy', 'ColorController@massDestroy')->name('colors.massDestroy');
    Route::resource('colors', 'ColorController');

    // Size
    Route::delete('sizes/destroy', 'SizeController@massDestroy')->name('sizes.massDestroy');
    Route::resource('sizes', 'SizeController');

    // Promo Code
    Route::delete('promo-codes/destroy', 'PromoCodeController@massDestroy')->name('promo-codes.massDestroy');
    Route::resource('promo-codes', 'PromoCodeController');

    // Delivery Period
    Route::delete('delivery-periods/destroy', 'DeliveryPeriodController@massDestroy')->name('delivery-periods.massDestroy');
    Route::resource('delivery-periods', 'DeliveryPeriodController');

    // Bonus
    Route::delete('bonus/destroy', 'BonusController@massDestroy')->name('bonus.massDestroy');
    Route::resource('bonus', 'BonusController');

    // User Event
    Route::delete('user-events/destroy', 'UserEventController@massDestroy')->name('user-events.massDestroy');
    Route::resource('user-events', 'UserEventController');

    // Setting
    Route::delete('settings/destroy', 'SettingController@massDestroy')->name('settings.massDestroy');
    Route::post('settings/media', 'SettingController@storeMedia')->name('settings.storeMedia');
    Route::post('settings/ckmedia', 'SettingController@storeCKEditorImages')->name('settings.storeCKEditorImages');
    Route::resource('settings', 'SettingController');

    // Order Status
    Route::delete('order-statuses/destroy', 'OrderStatusController@massDestroy')->name('order-statuses.massDestroy');
    Route::resource('order-statuses', 'OrderStatusController');

    // Payment
    Route::delete('payments/destroy', 'PaymentController@massDestroy')->name('payments.massDestroy');
    Route::resource('payments', 'PaymentController');

    // Bouquet Category
    Route::delete('bouquet-categories/destroy', 'BouquetCategoryController@massDestroy')->name('bouquet-categories.massDestroy');
    Route::post('bouquet-categories/media', 'BouquetCategoryController@storeMedia')->name('bouquet-categories.storeMedia');
    Route::post('bouquet-categories/ckmedia', 'BouquetCategoryController@storeCKEditorImages')->name('bouquet-categories.storeCKEditorImages');
    Route::post('bouquet-categories/parse-csv-import', 'BouquetCategoryController@parseCsvImport')->name('bouquet-categories.parseCsvImport');
    Route::post('bouquet-categories/process-csv-import', 'BouquetCategoryController@processCsvImport')->name('bouquet-categories.processCsvImport');
    Route::resource('bouquet-categories', 'BouquetCategoryController');

    // Element Category
    Route::delete('element-categories/destroy', 'ElementCategoryController@massDestroy')->name('element-categories.massDestroy');
    Route::post('element-categories/media', 'ElementCategoryController@storeMedia')->name('element-categories.storeMedia');
    Route::post('element-categories/ckmedia', 'ElementCategoryController@storeCKEditorImages')->name('element-categories.storeCKEditorImages');
    Route::post('element-categories/parse-csv-import', 'ElementCategoryController@parseCsvImport')->name('element-categories.parseCsvImport');
    Route::post('element-categories/process-csv-import', 'ElementCategoryController@processCsvImport')->name('element-categories.processCsvImport');
    Route::resource('element-categories', 'ElementCategoryController');

    // Element
    Route::delete('elements/destroy', 'ElementController@massDestroy')->name('elements.massDestroy');
    Route::post('elements/media', 'ElementController@storeMedia')->name('elements.storeMedia');
    Route::post('elements/ckmedia', 'ElementController@storeCKEditorImages')->name('elements.storeCKEditorImages');
    Route::post('elements/parse-csv-import', 'ElementController@parseCsvImport')->name('elements.parseCsvImport');
    Route::post('elements/process-csv-import', 'ElementController@processCsvImport')->name('elements.processCsvImport');
    Route::resource('elements', 'ElementController');

    // Bouquet
    Route::delete('bouquets/destroy', 'BouquetController@massDestroy')->name('bouquets.massDestroy');
    Route::post('bouquets/media', 'BouquetController@storeMedia')->name('bouquets.storeMedia');
    Route::post('bouquets/ckmedia', 'BouquetController@storeCKEditorImages')->name('bouquets.storeCKEditorImages');
    Route::post('bouquets/parse-csv-import', 'BouquetController@parseCsvImport')->name('bouquets.parseCsvImport');
    Route::post('bouquets/process-csv-import', 'BouquetController@processCsvImport')->name('bouquets.processCsvImport');
    Route::resource('bouquets', 'BouquetController');

    // Quick Order
    Route::delete('quick-orders/destroy', 'QuickOrderController@massDestroy')->name('quick-orders.massDestroy');
    Route::resource('quick-orders', 'QuickOrderController');

    // Order
    Route::delete('orders/destroy', 'OrderController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrderController');

    // Offer
    Route::delete('offers/destroy', 'OfferController@massDestroy')->name('offers.massDestroy');
    Route::resource('offers', 'OfferController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth', '2fa']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Address
    Route::delete('addresses/destroy', 'AddressController@massDestroy')->name('addresses.massDestroy');
    Route::resource('addresses', 'AddressController');

    // City
    Route::delete('cities/destroy', 'CityController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CityController');

    // Event
    Route::delete('events/destroy', 'EventController@massDestroy')->name('events.massDestroy');
    Route::resource('events', 'EventController');

    // Color
    Route::delete('colors/destroy', 'ColorController@massDestroy')->name('colors.massDestroy');
    Route::resource('colors', 'ColorController');

    // Size
    Route::delete('sizes/destroy', 'SizeController@massDestroy')->name('sizes.massDestroy');
    Route::resource('sizes', 'SizeController');

    // Promo Code
    Route::delete('promo-codes/destroy', 'PromoCodeController@massDestroy')->name('promo-codes.massDestroy');
    Route::resource('promo-codes', 'PromoCodeController');

    // Delivery Period
    Route::delete('delivery-periods/destroy', 'DeliveryPeriodController@massDestroy')->name('delivery-periods.massDestroy');
    Route::resource('delivery-periods', 'DeliveryPeriodController');

    // Bonus
    Route::delete('bonus/destroy', 'BonusController@massDestroy')->name('bonus.massDestroy');
    Route::resource('bonus', 'BonusController');

    // User Event
    Route::delete('user-events/destroy', 'UserEventController@massDestroy')->name('user-events.massDestroy');
    Route::resource('user-events', 'UserEventController');

    // Setting
    Route::delete('settings/destroy', 'SettingController@massDestroy')->name('settings.massDestroy');
    Route::post('settings/media', 'SettingController@storeMedia')->name('settings.storeMedia');
    Route::post('settings/ckmedia', 'SettingController@storeCKEditorImages')->name('settings.storeCKEditorImages');
    Route::resource('settings', 'SettingController');

    // Order Status
    Route::delete('order-statuses/destroy', 'OrderStatusController@massDestroy')->name('order-statuses.massDestroy');
    Route::resource('order-statuses', 'OrderStatusController');

    // Payment
    Route::delete('payments/destroy', 'PaymentController@massDestroy')->name('payments.massDestroy');
    Route::resource('payments', 'PaymentController');

    // Bouquet Category
    Route::delete('bouquet-categories/destroy', 'BouquetCategoryController@massDestroy')->name('bouquet-categories.massDestroy');
    Route::post('bouquet-categories/media', 'BouquetCategoryController@storeMedia')->name('bouquet-categories.storeMedia');
    Route::post('bouquet-categories/ckmedia', 'BouquetCategoryController@storeCKEditorImages')->name('bouquet-categories.storeCKEditorImages');
    Route::resource('bouquet-categories', 'BouquetCategoryController');

    // Element Category
    Route::delete('element-categories/destroy', 'ElementCategoryController@massDestroy')->name('element-categories.massDestroy');
    Route::post('element-categories/media', 'ElementCategoryController@storeMedia')->name('element-categories.storeMedia');
    Route::post('element-categories/ckmedia', 'ElementCategoryController@storeCKEditorImages')->name('element-categories.storeCKEditorImages');
    Route::resource('element-categories', 'ElementCategoryController');

    // Element
    Route::delete('elements/destroy', 'ElementController@massDestroy')->name('elements.massDestroy');
    Route::post('elements/media', 'ElementController@storeMedia')->name('elements.storeMedia');
    Route::post('elements/ckmedia', 'ElementController@storeCKEditorImages')->name('elements.storeCKEditorImages');
    Route::resource('elements', 'ElementController');

    // Bouquet
    Route::delete('bouquets/destroy', 'BouquetController@massDestroy')->name('bouquets.massDestroy');
    Route::post('bouquets/media', 'BouquetController@storeMedia')->name('bouquets.storeMedia');
    Route::post('bouquets/ckmedia', 'BouquetController@storeCKEditorImages')->name('bouquets.storeCKEditorImages');
    Route::resource('bouquets', 'BouquetController');

    // Quick Order
    Route::delete('quick-orders/destroy', 'QuickOrderController@massDestroy')->name('quick-orders.massDestroy');
    Route::resource('quick-orders', 'QuickOrderController');

    // Order
    Route::delete('orders/destroy', 'OrderController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrderController');

    // Offer
    Route::delete('offers/destroy', 'OfferController@massDestroy')->name('offers.massDestroy');
    Route::resource('offers', 'OfferController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
    Route::post('profile/toggle-two-factor', 'ProfileController@toggleTwoFactor')->name('profile.toggle-two-factor');
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});
