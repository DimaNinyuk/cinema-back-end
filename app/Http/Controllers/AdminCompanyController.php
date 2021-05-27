<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Film;

class AdminCompanyController extends Controller
{
    public function index()
    {
        return Company::all();
    }
}
