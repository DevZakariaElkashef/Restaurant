<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index () {
        return view('admin.dashboard');
    }

    public function todoList () {
        return view('admin.apps.todolist');
    }

    public function notes () {
        return view('admin.apps.notes');
    }

    public function calendar () {
        return view('admin.apps.calendar');
    }
}
