<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    public function list()
    {
        $categories = Category::where('user_id', auth()->user()->id)->latest()->get();
        $expenses = Expense::select('expenses.*', 'categories.category_name	 as category_name')
            ->join('categories', 'expenses.category_id', '=', 'categories.id')
            ->where('expenses.user_id', auth()->id())
            ->latest('expenses.created_at')
            ->get();

        return view('Add_Daily_Expense.add_daily_expense', compact('categories', 'expenses'));
    }

    public function current_month_report_graph()
    {
        $current_month_report = Expense::select(
            'categories.category_name',
            DB::raw('SUM(expenses.amount) as total_amount')
        )
            ->join('categories', 'expenses.category_id', '=', 'categories.id')
            ->where('expenses.user_id', auth()->id())
            ->whereMonth('expenses.expense_date', now()->month)
            ->groupBy('categories.category_name')
            ->get();

        // Grand total
        $total = $current_month_report->sum('total_amount');

        $chartLabels = $current_month_report->pluck('category_name');
        $chartData = $current_month_report->pluck('total_amount');

       // return $chartLabels;
        return view('monthly_report_graph.monthly_report_graph', compact('chartLabels', 'chartData', 'total'));
    }
    public function current_month_report()
    {
        $current_month_report = Expense::select(
            'categories.category_name',
            DB::raw('SUM(expenses.amount) as total_amount')
        )
            ->join('categories', 'expenses.category_id', '=', 'categories.id')
            ->where('expenses.user_id', auth()->id())
            ->whereMonth('expenses.expense_date', now()->month)
            ->groupBy('categories.category_name')
            ->get();

        // Grand total
        $total = $current_month_report->sum('total_amount');

        $chartLabels = $current_month_report->pluck('category_name');
       
        $chartData = $current_month_report->pluck('total_amount');

        return view('Current_Month_Report.current_month_report', compact('current_month_report','chartLabels','chartData','total'));
    }

    public function expense_store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'amount' => 'required|numeric',
        ]);

        $data = new Expense();
        $data->expense_date = $request->expense_date; // Assuming you want to set the current date as expense date
        $data->title = $request->title;
        $data->category_id = $request->category_id;
        $data->amount = $request->amount;
        $data->user_id = auth()->id(); // Assuming you want to associate the expense with the authenticated user
        $data->save();
        return back()->with('success', 'Expense added successfully');
    }

    public function destroy(Request $request)
    {
        Expense::where('id', $request->id)->delete();
        return back()->with('success', 'Expense deleted successfully');
    }
}
