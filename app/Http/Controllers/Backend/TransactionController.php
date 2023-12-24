<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TransationInfo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function showTransaction(){
        $trans = TransationInfo::all();
        
        return view('admin.show_transaction', compact('trans'));
    }
    public function downloadInvoice($id){
        $image = public_path('backend/images/pk-logo.png');

        $trans = TransationInfo::with('users','slots')->where('id',$id)->first();
        $arriveDateTime = Carbon::parse($trans->start_time);
        $leavingDateTime = Carbon::parse($trans->end_time);

        // Calculate the difference in minutes
        $minutesDifference = $leavingDateTime->diffInMinutes($arriveDateTime);

        $duration = ($minutesDifference / 60);
        $pdf = Pdf::loadView('pdf.invoice', compact('trans','duration','image'))->setPaper('a4');
        //return gettype($trans->amount);
        return $pdf->download('invoice.pdf');
        //return view('pdf.invoice', compact('trans','duration','image'));
    }
}
