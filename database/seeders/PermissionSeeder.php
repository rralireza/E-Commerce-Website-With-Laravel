<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Categories Permissions
         */
        Permission::query()->insert([
            [
                'title' => 'read-category',
                'label' => 'Read Categories'
            ],
            [
                'title' => 'create-category',
                'label' => 'Create Category'
            ],
            [
                'title' => 'update-category',
                'label' => 'Update Category'
            ],
            [
                'title' => 'delete-category',
                'label' => 'Delete Category'
            ]
        ]);

        /**
         * Brands Permissions
         */
        Permission::query()->insert([
            [
                'title' => 'read-brand',
                'label' => 'Read Brands'
            ],
            [
                'title' => 'create-brand',
                'label' => 'Create Brand'
            ],
            [
                'title' => 'update-brand',
                'label' => 'Update Brand'
            ],
            [
                'title' => 'delete-brand',
                'label' => 'Delete Brand'
            ]
        ]);

        /**
         * Products Permissions
         */
        Permission::query()->insert([
            [
                'title' => 'read-product',
                'label' => 'Read Products'
            ],
            [
                'title' => 'create-product',
                'label' => 'Create Product'
            ],
            [
                'title' => 'update-product',
                'label' => 'Update Product'
            ],
            [
                'title' => 'delete-product',
                'label' => 'Delete Product'
            ]
        ]);

        /**
         * Discount Permissions
         */
        Permission::query()->insert([
            [
                'title' => 'read-discount',
                'label' => 'Read Discounts'
            ],
            [
                'title' => 'create-discount',
                'label' => 'Create Discount'
            ],
            [
                'title' => 'update-discount',
                'label' => 'Update Discount'
            ],
            [
                'title' => 'delete-discount',
                'label' => 'Delete Discount'
            ]
        ]);

        /**
         * Gallery Permissions
         */
        Permission::query()->insert([
            [
                'title' => 'read-picture',
                'label' => 'Read Gallery'
            ],
            [
                'title' => 'create-picture',
                'label' => 'Create Gallery'
            ],
            [
                'title' => 'update-picture',
                'label' => 'Update Gallery'
            ],
            [
                'title' => 'delete-picture',
                'label' => 'Delete Gallery'
            ]
        ]);

        /**
         * Offer Permissions
         */
        Permission::query()->insert([
            [
                'title' => 'read-offer',
                'label' => 'Read Offer'
            ],
            [
                'title' => 'create-offer',
                'label' => 'Create Offer'
            ],
            [
                'title' => 'update-offer',
                'label' => 'Update Offer'
            ],
            [
                'title' => 'delete-offer',
                'label' => 'Delete Offer'
            ]
        ]);

        /**
         * Role Permissions
         */
        Permission::query()->insert([
            [
                'title' => 'read-role',
                'label' => 'Read Roles'
            ],
            [
                'title' => 'create-role',
                'label' => 'Create Role'
            ],
            [
                'title' => 'update-role',
                'label' => 'Update Role'
            ],
            [
                'title' => 'delete-role',
                'label' => 'Delete Role'
            ]
        ]);

        /**
         * Role Permission
         */
        Permission::query()->insert([
            [
                'title' => 'view-dashboard',
                'label' => 'View Dashboard'
            ]
        ]);


    }
}
