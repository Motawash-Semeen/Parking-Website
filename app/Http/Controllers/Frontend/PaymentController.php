<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ParkingSlots;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Stripe\Stripe;
use Stripe\Charge;
class PaymentController extends Controller
{
    public function paymentPage(Request $request)
    {
        $request->validate([
            'slot_id' => 'required',
            'coordinates_send' => 'required',
            'coordinates_start' => 'required',
            'arriveDateTime' => 'required',
            'leavingDateTime' => 'required',
        ]);
        $slot = ParkingSlots::with('users')->where('id', $request->slot_id)->first();
        $arriveDateTime = Carbon::parse($request->arriveDateTime);
        $leavingDateTime = Carbon::parse($request->leavingDateTime);

        // Calculate the difference in minutes
        $minutesDifference = $leavingDateTime->diffInMinutes($arriveDateTime);

        $price = ($minutesDifference / 60) * $slot->price;

        $currentDateTime = Carbon::now('Asia/Dhaka');

        // Format the current date and time
        $formattedDateTime = $currentDateTime->format('F j, Y | g:i A');
        $stratTime = $arriveDateTime->format('F j, Y | g:i A');
        $endTime = $leavingDateTime->format('F j, Y | g:i A');
        //return $price;
        return view('payments', compact('request', 'slot', 'price', 'formattedDateTime', 'stratTime', 'endTime'));
    }
    public function makePayment(Request $request)
    {
        $request->validate([
            'slot_id' => 'required',
            'coordinates_send' => 'required',
            'coordinates_start' => 'required',
            'arriveDateTime' => 'required',
            'leavingDateTime' => 'required',
            'price' => 'required',
        ]);


        Stripe::setApiKey(env('STRIPE_SECRET'));
        try {

            $charge = Charge::create([
                'amount' => round($request->price) * 100, // amount in cents
                'currency' => 'bdt',
                'source' => $request->stripeToken,
                'description' => 'Payment to Parking',
                'metadata' => [
                    'order_id' => uniqid(),
                ],
            ]);
        } catch (\Exception $ex) {
            $notification = array(
                'message' => $ex->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        return $charge;
    }
}
