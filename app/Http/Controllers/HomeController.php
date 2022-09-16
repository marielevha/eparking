<?php
/**
 * Created by IntelliJ IDEA.
 * User: maeva
 * Date: 27/08/22
 * Time: 12:17
 */

namespace App\Http\Controllers;


use Inertia\Inertia;

class HomeController
{
    public function index()
    {
        return Inertia::render('Home/Index');
    }
}
