<?php

Route::get('/','EmployeeController@index');
Route::get('add/employee','EmployeeController@addEmployee');
Route::get('getEmployee','EmployeeController@index');
Route::get('view/employee','EmployeeController@viewEmployee');
Route::get('edit/employee','EmployeeController@editEmployee');
Route::get('update/employee','EmployeeController@updateEmployee');
Route::get('delete/employee','EmployeeController@deleteEmployee');


//Route::get('employeedata','EmployeeController@getemployeedata');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
