<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function show($id)
    {
        $class = ClassModel::findOrFail($id);
        return view('frontend.class-detail', compact('class'));
    }
}
