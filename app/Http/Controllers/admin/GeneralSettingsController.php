<?php



namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\GeneralSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralSettingsController extends Controller
{
    public function get_setting()
    {

        $general_response = GeneralSettings::get();

        return view('admin.general_settings', compact('general_response'));
    }




    public function update_settings(Request $request)
    {



        try {


            DB::transaction(function () use ($request) {

                foreach ($request->settings as $index => $setting) {

                    $value = $setting['value'] ?? null;

                    if ($request->hasFile("settings.$index.value")) {


                        $file = $request->file("settings.$index.value");


                        if ($file->isValid()) {
                            $value = $file->store('settings', 'public');
                        }
                    }

                    GeneralSettings::where('id', $setting['id'])
                        ->update([
                            'value' => $value,
                            'status' => $setting['status'],
                        ]);
                }
            });


            return redirect()
                ->back()
                ->with('success', 'General settings updated successfully.');
        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with('message', 'Custom Error: Settings update failed.')
                ->with('error', $e->getMessage());
        }
    }
}
