<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getApiProject($id){
        $project=Project::find($id);


    }
}
