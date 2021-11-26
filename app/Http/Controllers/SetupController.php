<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SetupDatabaseRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class SetupController extends Controller
{
    private function phpVersionCheck()
    {
        $result = version_compare(PHP_VERSION, '7.3') >= 0 ? 1 : 0;
        return $result;
    }
    private function phpExtCheck()
    {
        $result = (extension_loaded('bcmath') && extension_loaded('ctype') && extension_loaded('json') && extension_loaded('openssl') && extension_loaded('pdo') && extension_loaded('mbstring')) ? 1 : 0;
        return $result;
    }
    public function database()
    {
        $data = [
            'pageTitle'       => __('setup.database_setup'),
            'currentStep'     => __('setup.database_information'),
            'currentDesc'     => __('setup.database_description'),
            'currentLoad'     => __('setup.database_load'),
            'step'            => 'database',
            'vectorImg'       => 'setup-database.svg',
            'purpleTag'       => __('setup.get_started'),
            'phpVersionCheck' => $this->phpVersionCheck(),
            'phpExtCheck'     => $this->phpExtCheck(),
        ];

        return view('setup.database', $data);
    }
    public function administrative()
    {
        $data = [
            'pageTitle'       => __('setup.administrative_setup'),
            'currentStep'     => __('setup.administrative_setup'),
            'currentDesc'     => __('setup.administrative_description'),
            'currentLoad'     => __('setup.administrative_load'),
            'step'            => 'administrative',
            'vectorImg'       => 'setup-administrative.svg',
            'purpleTag'       => __('setup.get_started'),
            'phpVersionCheck' => $this->phpVersionCheck(),
            'phpExtCheck'     => $this->phpExtCheck(),
        ];

        return view('setup.administrative', $data);
    }
    public function finish()
    {
        $data = [
            'pageTitle'   => __('setup.finish_setup'),
            'currentStep' => __('setup.finish_setup'),
            'currentDesc' => __('setup.finish_description'),
            'currentLoad' => NULL,
            'step'        => 'finish',
            'vectorImg'   => 'setup-finish.svg',
            'purpleTag'   => __('setup.get_started')
        ];

        return view('setup.finish', $data);
    }
    /**
     * Store a new blog post.
     *
     * @param  \App\Http\Requests\SetupDatabaseRequest  $request
     * @return Illuminate\Http\Response
     */
    public function ajaxDatabase(SetupDatabaseRequest $request)
    {
        // $validated = $request->validated();


        // Storage::disk('local')->put('database.php', 'Contents');
        // Crypt::encryptString($request->token);

    }
    public function ajaxAdministrative()
    {
        
    } 
}