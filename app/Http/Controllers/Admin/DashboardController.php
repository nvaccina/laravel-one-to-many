<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;

class DashboardController extends Controller
{
    public function index(){

        //$work_deleted = Work::withTrashed()->find(4); //trovo l'elemento eliminato
        //$work_deleted->restore(); //Lo tolgo dagli eliminati

        $n_works = Work::all()->count();
        //$n_deleted = Work::onlyTrashed()->get()->count();
        //$n_deleted = Work::onlyTrashed()->get()->count();
        //$n_works_all = Work::withTrashed()->get()->count();

        return view('admin.home', compact('n_works'));
    }

    public function settings(){
        return view('admin.settings');
    }

    public function stats(){
        return view('admin.stats');
    }
}
