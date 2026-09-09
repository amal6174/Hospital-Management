<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Category;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function index()
    {

        $appointments = Appointment::with([
            'doctor',
            'category',
            'statusUpdatedBy',

        ])->latest()->paginate(config('app.pagination_limit'));

        // dd($appointments->toArray());


        return view('admin.appointments', compact('appointments'));
    }


    public function updateStatus(Request $request, $id)
    {

        $request->validate([
            'status' => [
                'required',
                'in:pending,confirm,compleate,cancelled',
            ],
        ]);

        DB::beginTransaction();

        try {

            $appointment = Appointment::findOrFail($id);

            $appointment->update([
                'status' => $request->status,
                'status_updated_by' => auth()->id(),
                'status_updated_at' => now(),
            ]);

            $appointment->load('statusUpdatedBy');

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Status updated successfully.',

                'status' => $appointment->status,

                'status_updated_by' => $appointment->statusUpdatedBy?->name,

                'status_updated_at' =>
                $appointment->status_updated_at ? $appointment->status_updated_at->format('d-m-Y h:i A'): null,
            ]);


        } catch (\Throwable $e) {

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }








        // dd([
        //     'id' => $id,
        //     'status' => $request->status,
        //     'user' => auth()->id(),
        // ]);

        //     $request->validate([
        //         'status' => [
        //             'required',
        //             'in:pending,confirm,compleate,cancelled',
        //         ],
        //     ]);

        //     DB::beginTransaction();

        //     try {

        //         $appointment = Appointment::findOrFail($id);

        //         $appointment->update([

        //             'status' => $request->status,


        //             'status_updated_by' => auth()->id(),


        //             'status_updated_at' => now(),
        //         ]);



        //         DB::commit();

        //         return back()->with(
        //             'success',
        //             'Appointment status updated successfully.'
        //         );

        //     } catch (\Throwable $e) {

        //         DB::rollBack();

        //         return back()
        //             ->withInput()
        //             ->with('error', $e->getMessage());
        //     }
    }
}
