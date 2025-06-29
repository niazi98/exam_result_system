<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

// Clear all users
DB::table('users')->truncate();

echo "All users have been deleted!\n";
echo "You can now register with superadmin@gmail.com to get admin access.\n"; 