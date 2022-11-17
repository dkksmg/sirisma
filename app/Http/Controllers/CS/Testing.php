<?php

namespace App\Http\Controllers\CS;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Testing extends Controller
{
    public function testing()
    {
        $mgjan = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 1)
            ->count();
        $mgfeb = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 2)
            ->count();
        $mgmar = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 3)
            ->count();
        $mgapr = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 4)
            ->count();
        $mgmei = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 5)
            ->count();
        $mgjun = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 6)
            ->count();
        $mgjul = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 7)
            ->count();
        $mgags = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 8)
            ->count();
        $mgsep = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 9)
            ->count();
        $mgokt = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 10)
            ->count();
        $mgnov = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 11)
            ->count();
        $mgdes = Application::join('application_types', 'application_types.id', '=', 'applications.jenis_permohonan')->where('application_types.jenis_permohonan', '=', 'Magang/PKL')->whereYear('applications.created_at', '=', $year)
            ->whereMonth('applications.created_at', '=', 12)
            ->count();

        $testing = json_encode(array($mgjan, $mgfeb, $mgmar, $mgapr, $mgmei, $mgjun, $mgjul, $mgags, $mgsep, $mgokt, $mgnov, $mgdes));
    }
}