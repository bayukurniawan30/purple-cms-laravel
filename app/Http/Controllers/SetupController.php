<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SetupController extends Controller
{
    public function database()
    {
        $data = [
            'pageTitle'   => __('setup.database_setup'),
            'currentStep' => __('setup.database_information'),
            'currentDesc' => __('setup.database_description'),
            'currentLoad' => __('setup.database_load'),
            'step'        => 'database',
            'vectorImg'   => 'setup-database.svg'
        ];

        return view('setup.database', $data);
    }
    public function administrative()
    {
        $data = [
            'pageTitle' => __('setup.administrative_setup'),
            'currentStep' => __('setup.administrative_setup'),
            'currentDesc' => __('setup.administrative_description'),
            'currentLoad' => __('setup.administrative_load'),
            'step'      => 'administrative',
            'vectorImg'   => 'setup-administrative.svg'
        ];

        return view('setup.administrative', $data);
    }
    public function finish()
    {
        $data = [
            'pageTitle' => __('setup.finish_setup'),
            'currentStep' => __('setup.administrative_setup'),
            'currentDesc' => __('setup.administrative_description'),
            'step'      => 'finish',
            'vectorImg'   => 'setup-finish.svg'
        ];

        return view('setup.finish', $data);
    }
    public function ajaxDatabase()
    {
        
    }
    public function ajaxAdministrative()
    {
        
    } 
}