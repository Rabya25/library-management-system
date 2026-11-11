<?php
require __DIR__ . '/vendor/autoload.php';

$faker = Faker\Factory::create();

echo "Name: " . $faker->name() . "\n";
echo "Email: " . $faker->email() . "\n";
echo "Address: " . $faker->address() . "\n";