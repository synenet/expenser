<?php

namespace App\Http\Controllers\Expenses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Expense;
use Session;
use Auth;




class PagesController extends Controller
{
    

     private $expense;

 
     public function __construct(Expense $expense)
     {
         $this->expense = $expense;

     }

     public function expenses(Request $request)
     {
        $auth = Auth::user();

        if($auth == null)
        {
            Session::put('redirect', 'expenses');
            
            return redirect('login');
        }  
        
        
        $user = Auth::user()->id;

        $expenses = $this->expense->where('userId', $user)->get();

        $data = [
            'expenses' => $expenses
        ];

        //dd($data);

        return view('expenses', $data);
    }
 
     public function addExpense(Request $request)
     {
         try {
                
                $body = $request->except(['_token', 'submit']);
             
                //dd($body) ;
                $body['vat'] = $body['value'] * 0.2;

                $this->expense->create($body);

                 Session::put('green', true);
                 return redirect()->back()->withErrors('Expense added successfully');

         } catch (\Exception $e) {
             Session::put('red', true);
             return redirect()->back()->withErrors('Expense could not be added');
         }
     }

 
}
