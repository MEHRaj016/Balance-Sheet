<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\MonthlyData;

class MonthlyDataController extends Controller
{
    public function index()
    {
        $data = MonthlyData::all();
        return view('dashboard', compact('data'));
    }

    public function store(Request $request)
    {
        \Log::info('Route hit successfully.');
        \Log::info($request->all());
        $request->validate([
            'date' => 'required|date_format:Y-m-d',
            'salary' => 'required|numeric|min:0',
            'food_expenses' => 'required|numeric|min:0',
            'home_rent' => 'required|numeric|min:0',
            'transportation' => 'required|numeric|min:0',
            'medicine' => 'required|numeric|min:0',
        ]);

        $totalExpenses = $request->food_expenses + $request->home_rent + $request->transportation + $request->medicine;
        $remainingBalance = $request->salary - $totalExpenses;

        MonthlyData::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'salary' => $request->salary,
            'food_expenses' => $request->food_expenses,
            'home_rent' => $request->home_rent,
            'transportation' => $request->transportation,
            'medicine' => $request->medicine,
            'total_expenses' => $totalExpenses,
            'remaining_balance' => $remainingBalance,
        ]);


        
       
        return redirect()->route('dashboard')->with('success', 'Data saved successfully!');
    }
}
