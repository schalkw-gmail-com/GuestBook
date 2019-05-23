<?php

    namespace App;

    /***
     * Class UserRole
     * @package App\Role
     */
    class UserRole {

        const ROLE_ADMIN = 'ROLE_ADMIN';
        const ROLE_USER = 'ROLE_USER';

        /**
         * @var array
         */
        protected static $roleHierarchy = [
            self::ROLE_ADMIN => ['*'],
            self::ROLE_USER => []
        ];

        /**
         * @param string $role
         * @return array
         */
        public static function getAllowedRoles(string $role)
        {
            if (isset(self::$roleHierarchy[$role])) {
                return self::$roleHierarchy[$role];
            }

            return [];
        }

        /***
         * @return array
         */
        public static function getRoleList()
        {
            return [
                static::ROLE_ADMIN =>'Admin',
                static::ROLE_USER => 'User',
            ];
        }

    }