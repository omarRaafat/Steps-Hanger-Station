<?php

use App\Notification;
use App\Subscripe;
use Illuminate\Support\Facades\DB;

function getNumberOfSubscripes(){
    $count = Subscripe::count();
    return $count;
}

function getRevenuInYear(){
    $count = Subscripe::count();
    return number_format($count * 285 * 12);
}

function getRevenuInMonth(){
    $count = Subscripe::count();
    return number_format($count * 285);
}

function getNumberOfNotifications(){
    $count = Notification::where("viewed" , "=" , 0)->count();
    return $count;
}

function getNotifications(){
    $notifications = Notification::with('Subscriptions')->with('contacts')->orderBy('id' , 'desc')->get();
    // dd($notifications);
    return $notifications;
}

function INNODB_CONNECTION_WIZARD_TUBE($subscribe){
    $password = \Illuminate\Support\Facades\Hash::make($subscribe->password);
    DB::statement("create database $subscribe->store_name");
    DB::statement("CREATE TABLE $subscribe->store_name.admins LIKE steps.admins;");
    DB::statement("CREATE TABLE $subscribe->store_name.transactions LIKE steps.transactions");
    DB::statement("CREATE TABLE $subscribe->store_name.ads LIKE steps.ads");
    DB::statement("CREATE TABLE $subscribe->store_name.banks LIKE steps.banks;");
    DB::statement("CREATE TABLE $subscribe->store_name.branches LIKE steps.branches;");
    DB::statement("CREATE TABLE $subscribe->store_name.cart LIKE steps.cart;");
    DB::statement("CREATE TABLE $subscribe->store_name.category_branches LIKE steps.category_branches;");
    DB::statement("CREATE TABLE $subscribe->store_name.contact LIKE steps.contact;");
    DB::statement("CREATE TABLE $subscribe->store_name.coupons LIKE steps.coupons;");
    DB::statement("CREATE TABLE $subscribe->store_name.customers LIKE steps.customers;");
    DB::statement("CREATE TABLE $subscribe->store_name.invoices LIKE steps.invoices;");
    DB::statement("CREATE TABLE $subscribe->store_name.loyalities LIKE steps.loyalities;");
    DB::statement("CREATE TABLE $subscribe->store_name.meals_images LIKE steps.meals_images;");
    DB::statement("CREATE TABLE $subscribe->store_name.menu LIKE steps.menu;");
    DB::statement("CREATE TABLE $subscribe->store_name.menu_branches LIKE steps.menu_branches;");
    DB::statement("CREATE TABLE $subscribe->store_name.menu_category LIKE steps.menu_category;");
    DB::statement("CREATE TABLE $subscribe->store_name.personal_access_tokens LIKE steps.personal_access_tokens;");
    DB::statement("CREATE TABLE $subscribe->store_name.password_resets LIKE steps.password_resets;");
    DB::statement("CREATE TABLE $subscribe->store_name.pages LIKE steps.pages;");
    DB::statement("CREATE TABLE $subscribe->store_name.orders LIKE steps.orders;");
    DB::statement("CREATE TABLE $subscribe->store_name.reservations LIKE steps.reservations;");
    DB::statement("CREATE TABLE $subscribe->store_name.restaurant LIKE steps.restaurant;");
    DB::statement("CREATE TABLE $subscribe->store_name.restaurant_category LIKE steps.restaurant_category;");
    DB::statement("CREATE TABLE $subscribe->store_name.reviews LIKE steps.reviews;");
    DB::statement("CREATE TABLE $subscribe->store_name.settings LIKE steps.settings;");
    DB::statement("CREATE TABLE $subscribe->store_name.vats LIKE steps.vats;");
    DB::statement("CREATE TABLE $subscribe->store_name.users LIKE steps.users;");
    DB::statement("INSERT INTO $subscribe->store_name.pages SELECT * from steps.pages");
    DB::statement("INSERT INTO $subscribe->store_name.settings SELECT * from steps.settings");
    DB::statement("INSERT INTO $subscribe->store_name.ads SELECT * from steps.ads");
    DB::statement("INSERT INTO $subscribe->store_name.vats SELECT * from steps.vats");
    DB::statement("INSERT INTO $subscribe->store_name.banks SELECT * from steps.banks");
    DB::statement("INSERT INTO $subscribe->store_name.loyalities SELECT * from steps.loyalities");
    DB::insert("INSERT INTO $subscribe->store_name.admins (username, email, password);
VALUES ('$subscribe->store_name', '$subscribe->email','$password')");
    DB::statement("INSERT INTO $subscribe->store_name.restaurant SELECT * from steps.restaurant");
}
