<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Address
    Route::apiResource('addresses', 'AddressApiController');

    // City
    Route::apiResource('cities', 'CityApiController');

    // Event
    Route::apiResource('events', 'EventApiController');

    // Color
    Route::apiResource('colors', 'ColorApiController');

    // Size
    Route::apiResource('sizes', 'SizeApiController');

    // Promo Code
    Route::apiResource('promo-codes', 'PromoCodeApiController');

    // Delivery Period
    Route::apiResource('delivery-periods', 'DeliveryPeriodApiController');

    // Bonus
    Route::apiResource('bonus', 'BonusApiController');

    // User Event
    Route::apiResource('user-events', 'UserEventApiController');

    // Setting
    Route::post('settings/media', 'SettingApiController@storeMedia')->name('settings.storeMedia');
    Route::apiResource('settings', 'SettingApiController');

    // Order Status
    Route::apiResource('order-statuses', 'OrderStatusApiController');

    // Payment
    Route::apiResource('payments', 'PaymentApiController');

    // Bouquet Category
    Route::post('bouquet-categories/media', 'BouquetCategoryApiController@storeMedia')->name('bouquet-categories.storeMedia');
    Route::apiResource('bouquet-categories', 'BouquetCategoryApiController');

    // Element Category
    Route::post('element-categories/media', 'ElementCategoryApiController@storeMedia')->name('element-categories.storeMedia');
    Route::apiResource('element-categories', 'ElementCategoryApiController');

    // Element
    Route::post('elements/media', 'ElementApiController@storeMedia')->name('elements.storeMedia');
    Route::apiResource('elements', 'ElementApiController');

    // Bouquet
    Route::post('bouquets/media', 'BouquetApiController@storeMedia')->name('bouquets.storeMedia');
    Route::apiResource('bouquets', 'BouquetApiController');

    // Order
    Route::apiResource('orders', 'OrderApiController');

    // Offer
    Route::apiResource('offers', 'OfferApiController');
});
