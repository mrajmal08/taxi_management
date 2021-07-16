<?php

return [
    'userManagement'    => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'        => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'routes'    => [
        'title'          => 'Routes',
        'title_singular' => 'Route',
        'fields' => [
            'id' => 'ID',
            'route' => 'Route Name',
            'address' => 'Route Address'
        ]
    ],
    'peoples'    => [
        'title'          => 'Peoples',
        'title_singular' => 'People',
        'fields' => [
            'id'        => 'ID',
            'name'      => 'Name',
            'phone'     => 'Phone',
            'address'   => 'Address',
            'post_code' => 'Postal Code',
            'area'      => 'Area'
        ]
    ],
    'areas'    => [
        'title'          => 'Areas',
        'title_singular' => 'Area',
        'fields' => [
            'id'        => 'ID',
            'name'      => 'Name',
        ]
    ],
    'contracts' => [
        'title'          => 'Contracts',
        'title_singular' => 'Contract',
        'fields' => [
            'id'        => 'ID',
            'route'     => 'Route',
            'people'    => 'People',
            'start'     => 'Start Time',
            'end'       => 'End Time',
            'driver'    => 'Driver',
            'cost_per_day' => 'Cost Per Day',
            'vat_amount' => 'Vat Percentage',
            'pay_per_day' => 'Pay Per Day'
        ]
    ],
    'role'              => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'              => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'vehicle'   => [
        'title'          => 'Vehicles',
        'title_singular' => 'Vehicle',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'vehicle_reg'       => 'Vehicle Reg',
            'vehicle_reg_doc'   => 'Vehicle Registration Doc',
            'plate_no'          => 'Plate No',
            'plate_no_expiry'   => 'Plate No Expiry',
            'mot'               => 'Mot',
            'mot_expiry'        => 'Mot Expiry',
            'insurance_company' => 'Insurance Company',
            'insurance_company_expiry'       => 'Insurance Company Expiry',
            'insurance_company_doc' => 'Insurance Company doc',
            'plate_issue_authority' => 'Plate Issue Authority',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
            'created_by'        => 'Created By',
            'created_by_helper' => '',
        ],
    ],
     'drivers'         => [
        'title'          => 'Drivers',
        'title_singular' => 'Driver',
        'driver'         => 'Detail',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'First Name',
            'name_helper'       => '',
            'm_name'            => 'Middle Name',
            'm_helper'          => '',
            's_name'            => 'Surname',
            's_helper'          => '',
            'vehicle_reg'       => 'Vehicle Reg',
            'v_r_helper'        => '',
            'capacity'          => 'Capacity',
            'c_helper'          => '',
            'plate_number'      => 'Plate Number',
            'p_helper'          => '',
            'plate_renewal'     => 'Plate Renewal',
            'p_l_helper'        => '',
            'r_date'            => 'Insurance Renewal Date',
            'r_date_helper'     => '',
            'i_provider'        => 'Insurance Provider',
            'badge'             => 'Driver Badge',
            'i_p_helper'        => '',
            'start_date'        => 'Start Date',
            'finish_date'       => 'Finish Date',
            'license_no'        => 'License No',
            'license_no_helper' => '',
            'license_exp'       => 'License Expiry',
            'license_exp_helper' => '',
            'is_verified'       => 'Is Verified',
            'is_verified_helper'=> '',
            'gender'            => 'Gender',
            'gender_helper'     => '',
            'dob'               => 'DOB',
            'dob_helper'        => '',
            'is_active'         => 'Is active',
            'is_active_helper'  => '',
            'status'            => 'Status',
            'status_helper'     => '',
            'user_name'         => 'User Name',
            'user_name_helper'  => '',
            'country_code'      => 'Country Code',
            'country_code_helper' => '',
            'password'          => 'Password',
            'password_helper'   => '',
            'email'             => 'Email',
            'email_helper'      => '',
            'phone'             => 'Phone Number',
            'phone_helper'      => '',
            'car'               => 'Car',
            'car_helper'      => '',
            'address'           => 'Address',
            'address_helper'    => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'badges'         => [
        'title'          => 'Badges',
        'title_singular' => 'Badge',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'badge'             => 'Badge',
            'date'              => 'Badge Renewal Date'
        ]
    ],
    'insurances'         => [
        'title'          => 'Insurances',
        'title_singular' => 'Insurance',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Company name',
        ]
    ],
    'maintainers'         => [
        'title'          => 'Maintainers',
        'title_singular' => 'Maintainer',
        'fields'         => [   
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Maintainer company name',
        ]
    ],
    'entries'    => [
        'title'          => 'Daily Entries',
        'title_singular' => 'Daily Entry',
        'fields' => [
            'id' => 'ID',
            'driver' => 'Driver',
            'route'  => 'Route',
            'date'   => 'Date',
            'status' => 'Work Status'
        ]
    ],
    'holidays'    => [
        'title'          => 'Holiday Types',
        'title_singular' => 'Holiday Type',
        'fields' => [
            'id' => 'ID',
            'type'   => 'Holiday Type'
        ]
    ],
    'suppliers'    => [
        'title'          => 'Suppliers',
        'title_singular' => 'Supplier',
        'fields' => [
            'id' => 'ID',
            'name'   => 'Supplier Name'
        ]
    ],
    'expenses'    => [
        'title'          => 'Company Expenses',
        'title_singular' => 'Company Expense',
        'fields' => [
            'id' => 'ID',
            'date'              => 'Expense Date',
            'supplier'          => 'Supplier',
            'discription'       => 'Discription',
            'sub_total'         => 'Sub Total',
            'vat'               => 'Vat',
            'paymnet_method'    => 'Payment Method',
            'paymnet_reference' => 'Payment Reference',
        ]
    ],
    'maintenances'    => [
        'title'          => 'Vehicle Maintenances',
        'title_singular' => 'Vehicle Maintenance',
        'fields' => [
            'id'                => 'ID',
            'date'              => 'Maintenance Date',
            'supplier'          => 'Supplier',
            'maintainer'        => 'Maintainer',
            'vehicle_reg'       => 'Vehicle Reg',
            'plate_no'          => 'Plate No',
            'millage'           => 'Millage',
            'cost'              => 'Parts Cost',
            'vat'               => 'Parts VAT',
            'la_cost'           => 'Labor Cost',
            'la_vat'            => 'Labor VAT',
            'vehicle'           => 'Vehicle',
            'description'       => 'Description'

        ]
    ],
];
