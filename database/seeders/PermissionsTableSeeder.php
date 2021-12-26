<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'address_create',
            ],
            [
                'id'    => 18,
                'title' => 'address_edit',
            ],
            [
                'id'    => 19,
                'title' => 'address_show',
            ],
            [
                'id'    => 20,
                'title' => 'address_delete',
            ],
            [
                'id'    => 21,
                'title' => 'address_access',
            ],
            [
                'id'    => 22,
                'title' => 'city_create',
            ],
            [
                'id'    => 23,
                'title' => 'city_edit',
            ],
            [
                'id'    => 24,
                'title' => 'city_show',
            ],
            [
                'id'    => 25,
                'title' => 'city_delete',
            ],
            [
                'id'    => 26,
                'title' => 'city_access',
            ],
            [
                'id'    => 27,
                'title' => 'shop_access',
            ],
            [
                'id'    => 28,
                'title' => 'event_create',
            ],
            [
                'id'    => 29,
                'title' => 'event_edit',
            ],
            [
                'id'    => 30,
                'title' => 'event_show',
            ],
            [
                'id'    => 31,
                'title' => 'event_delete',
            ],
            [
                'id'    => 32,
                'title' => 'event_access',
            ],
            [
                'id'    => 33,
                'title' => 'color_create',
            ],
            [
                'id'    => 34,
                'title' => 'color_edit',
            ],
            [
                'id'    => 35,
                'title' => 'color_show',
            ],
            [
                'id'    => 36,
                'title' => 'color_delete',
            ],
            [
                'id'    => 37,
                'title' => 'color_access',
            ],
            [
                'id'    => 38,
                'title' => 'size_create',
            ],
            [
                'id'    => 39,
                'title' => 'size_edit',
            ],
            [
                'id'    => 40,
                'title' => 'size_show',
            ],
            [
                'id'    => 41,
                'title' => 'size_delete',
            ],
            [
                'id'    => 42,
                'title' => 'size_access',
            ],
            [
                'id'    => 43,
                'title' => 'promo_code_create',
            ],
            [
                'id'    => 44,
                'title' => 'promo_code_edit',
            ],
            [
                'id'    => 45,
                'title' => 'promo_code_show',
            ],
            [
                'id'    => 46,
                'title' => 'promo_code_delete',
            ],
            [
                'id'    => 47,
                'title' => 'promo_code_access',
            ],
            [
                'id'    => 48,
                'title' => 'delivery_period_create',
            ],
            [
                'id'    => 49,
                'title' => 'delivery_period_edit',
            ],
            [
                'id'    => 50,
                'title' => 'delivery_period_show',
            ],
            [
                'id'    => 51,
                'title' => 'delivery_period_delete',
            ],
            [
                'id'    => 52,
                'title' => 'delivery_period_access',
            ],
            [
                'id'    => 53,
                'title' => 'bonu_create',
            ],
            [
                'id'    => 54,
                'title' => 'bonu_edit',
            ],
            [
                'id'    => 55,
                'title' => 'bonu_show',
            ],
            [
                'id'    => 56,
                'title' => 'bonu_delete',
            ],
            [
                'id'    => 57,
                'title' => 'bonu_access',
            ],
            [
                'id'    => 58,
                'title' => 'user_event_create',
            ],
            [
                'id'    => 59,
                'title' => 'user_event_edit',
            ],
            [
                'id'    => 60,
                'title' => 'user_event_show',
            ],
            [
                'id'    => 61,
                'title' => 'user_event_delete',
            ],
            [
                'id'    => 62,
                'title' => 'user_event_access',
            ],
            [
                'id'    => 63,
                'title' => 'setting_create',
            ],
            [
                'id'    => 64,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 65,
                'title' => 'setting_show',
            ],
            [
                'id'    => 66,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 67,
                'title' => 'setting_access',
            ],
            [
                'id'    => 68,
                'title' => 'order_status_create',
            ],
            [
                'id'    => 69,
                'title' => 'order_status_edit',
            ],
            [
                'id'    => 70,
                'title' => 'order_status_show',
            ],
            [
                'id'    => 71,
                'title' => 'order_status_delete',
            ],
            [
                'id'    => 72,
                'title' => 'order_status_access',
            ],
            [
                'id'    => 73,
                'title' => 'payment_create',
            ],
            [
                'id'    => 74,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 75,
                'title' => 'payment_show',
            ],
            [
                'id'    => 76,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 77,
                'title' => 'payment_access',
            ],
            [
                'id'    => 78,
                'title' => 'bouquet_category_create',
            ],
            [
                'id'    => 79,
                'title' => 'bouquet_category_edit',
            ],
            [
                'id'    => 80,
                'title' => 'bouquet_category_show',
            ],
            [
                'id'    => 81,
                'title' => 'bouquet_category_delete',
            ],
            [
                'id'    => 82,
                'title' => 'bouquet_category_access',
            ],
            [
                'id'    => 83,
                'title' => 'element_category_create',
            ],
            [
                'id'    => 84,
                'title' => 'element_category_edit',
            ],
            [
                'id'    => 85,
                'title' => 'element_category_show',
            ],
            [
                'id'    => 86,
                'title' => 'element_category_delete',
            ],
            [
                'id'    => 87,
                'title' => 'element_category_access',
            ],
            [
                'id'    => 88,
                'title' => 'element_create',
            ],
            [
                'id'    => 89,
                'title' => 'element_edit',
            ],
            [
                'id'    => 90,
                'title' => 'element_show',
            ],
            [
                'id'    => 91,
                'title' => 'element_delete',
            ],
            [
                'id'    => 92,
                'title' => 'element_access',
            ],
            [
                'id'    => 93,
                'title' => 'bouquet_create',
            ],
            [
                'id'    => 94,
                'title' => 'bouquet_edit',
            ],
            [
                'id'    => 95,
                'title' => 'bouquet_show',
            ],
            [
                'id'    => 96,
                'title' => 'bouquet_delete',
            ],
            [
                'id'    => 97,
                'title' => 'bouquet_access',
            ],
            [
                'id'    => 98,
                'title' => 'quick_order_create',
            ],
            [
                'id'    => 99,
                'title' => 'quick_order_edit',
            ],
            [
                'id'    => 100,
                'title' => 'quick_order_show',
            ],
            [
                'id'    => 101,
                'title' => 'quick_order_delete',
            ],
            [
                'id'    => 102,
                'title' => 'quick_order_access',
            ],
            [
                'id'    => 103,
                'title' => 'order_create',
            ],
            [
                'id'    => 104,
                'title' => 'order_edit',
            ],
            [
                'id'    => 105,
                'title' => 'order_show',
            ],
            [
                'id'    => 106,
                'title' => 'order_delete',
            ],
            [
                'id'    => 107,
                'title' => 'order_access',
            ],
            [
                'id'    => 108,
                'title' => 'offer_create',
            ],
            [
                'id'    => 109,
                'title' => 'offer_edit',
            ],
            [
                'id'    => 110,
                'title' => 'offer_show',
            ],
            [
                'id'    => 111,
                'title' => 'offer_delete',
            ],
            [
                'id'    => 112,
                'title' => 'offer_access',
            ],
            [
                'id'    => 113,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
