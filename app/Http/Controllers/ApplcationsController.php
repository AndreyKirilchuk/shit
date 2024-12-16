<?php

namespace App\Http\Controllers;


use App\Models\Application;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplcationsController extends Controller
{
    public function index()
    {
        $applications = Application::all();

        return view('pages/admin_panel', compact('applications'));
    }

    public function create(Request $request)
    {
        $v = Validator::make($request->all(), [
            'number' => 'required|string',
            'about' => 'required|string'
        ]);

        if($v->fails())
        {
            return redirect()->back()->withErrors($v);
        }

        $user = Auth::user();

        $application = Application::create([
            'number' => $request->number,
            'about' => $request->about,
            'status' => 'Новая',
            'user_name' => $user->name,
            'user_id' => $user->id,
        ]);

        return redirect('/');
    }

    public function show()
    {
        $user = Auth::user();

        $applications = Application::where('user_id', $user->id)->get();

        return view('pages/applications', compact('applications'));
    }

    public function update(Request $request, $id)
    {
        $application = Application::find($id);

        $application->status = $request->status;

        $application->save();

        return redirect()->back();
    }
}
