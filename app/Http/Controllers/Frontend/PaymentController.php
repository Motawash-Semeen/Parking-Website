<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\BookMail;
use App\Models\ParkingSlots;
use App\Models\Slots;
use App\Models\TransationInfo;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DGvai\SSLCommerz\SSLCommerz;
use Stripe\PaymentIntent;
use Stripe\Refund;

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

        //return $request->all();
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
            $slot = ParkingSlots::where('id', $request->slot_id)->first();
            $data = [
                'slot_id' => $request->slot_id,
                'slot_number' => $request->slot_number,
                'slot_address' => $slot->building_name . ', ' . $slot->building_number . ', ' . $slot->post_area . ', ' . $slot->city . ', ' . $slot->zip,
                'coordinates_send' => $request->coordinates_send,
                'arriveDateTime' => $request->arriveDateTime,
                'leavingDateTime' => $request->leavingDateTime,
                'price' => round($request->price),
                'user_name' => Auth::user()->name,
                'user_email' => Auth::user()->email,
                'payment_id' => $charge->id,
            ];
            try {
                Mail::to(Auth::user()->email)->send(new BookMail($data));
                $notification = array(
                    'message' => 'Payment Successful',
                    'alert-type' => 'success'
                );
                $transation = new TransationInfo;
                $transation->user_id = Auth::user()->id;
                $transation->slot_id = $request->slot_id;
                $transation->slot_number = $request->slot_number;
                $transation->name = Auth::user()->name;
                $transation->email = Auth::user()->email;
                $transation->phone = Auth::user()->number;
                $transation->payment_type = 'online';
                $transation->payment_method = 'Stripe';
                $transation->transaction_id = 'PK-' . Str::random(8);
                $transation->invoice_number = $charge->id;
                $transation->amount = round($request->price);
                $transation->order_date = time();
                $transation->start_time = $request->arriveDateTime;
                $transation->end_time = $request->leavingDateTime;
                $transation->status = 'confirmed';

                $transation->save();

                $updateSlot = Slots::where('slot_id', $request->slot_id)->where('slot_number', $request->slot_number)->first();
                $updateSlot->occupied = 'yes';
                $updateSlot->end_time = strtotime($request->leavingDateTime);
                $updateSlot->user_id = Auth::user()->id;

                $updateSlot->update();

                session()->put('id', $transation->id);

                return redirect('/congratulation')->with($notification);
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
        } catch (\Exception $ex) {
            $notification = array(
                'message' => $ex->getMessage(),
                'alert-type' => 'error'
            );
            return redirect('/')->with($notification);
        }
        //return $charge;
    }
    public function makeCashPayment(Request $request)
    {
        $request->validate([
            'slot_id' => 'required',
            'coordinates_send' => 'required',
            'coordinates_start' => 'required',
            'arriveDateTime' => 'required',
            'leavingDateTime' => 'required',
            'price' => 'required',
        ]);

        //return $request->all();
        try {

            $slot = ParkingSlots::where('id', $request->slot_id)->first();
            $data = [
                'slot_id' => $request->slot_id,
                'slot_number' => $request->slot_number,
                'slot_address' => $slot->building_name . ', ' . $slot->building_number . ', ' . $slot->post_area . ', ' . $slot->city . ', ' . $slot->zip,
                'coordinates_send' => $request->coordinates_send,
                'arriveDateTime' => $request->arriveDateTime,
                'leavingDateTime' => $request->leavingDateTime,
                'price' => round($request->price),
                'user_name' => Auth::user()->name,
                'user_email' => Auth::user()->email,
                'payment_id' => 'Ch-' . Str::random(8),
            ];
            try {
                Mail::to(Auth::user()->email)->send(new BookMail($data));
                $notification = array(
                    'message' => 'Payment Successful',
                    'alert-type' => 'success'
                );
                $transation = new TransationInfo;
                $transation->user_id = Auth::user()->id;
                $transation->slot_id = $request->slot_id;
                $transation->slot_number = $request->slot_number;
                $transation->name = Auth::user()->name;
                $transation->email = Auth::user()->email;
                $transation->phone = Auth::user()->number;
                $transation->payment_type = 'Cash';
                $transation->payment_method = 'Cash';
                $transation->transaction_id = 'PK-' . Str::random(8);
                $transation->invoice_number = 'Ch-' . Str::random(8);
                $transation->amount = round($request->price);
                $transation->order_date = time();
                $transation->start_time = $request->arriveDateTime;
                $transation->end_time = $request->leavingDateTime;
                $transation->status = 'pending';

                $transation->save();

                $updateSlot = Slots::where('slot_id', $request->slot_id)->where('slot_number', $request->slot_number)->first();
                $updateSlot->occupied = 'yes';
                $updateSlot->end_time = strtotime($request->leavingDateTime);
                $updateSlot->user_id = Auth::user()->id;

                $updateSlot->update();

                session()->put('id', $transation->id);

                return redirect('/congratulation')->with($notification);
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
        } catch (\Exception $ex) {
            $notification = array(
                'message' => $ex->getMessage(),
                'alert-type' => 'error'
            );
            return redirect('/')->with($notification);
        }
        //return $charge;
    }
    public function congrtsPage(Request $request)
    {
        return view('afterpayment')->with('delay', 5000);
    }
    public function cancelPaymentStripe($id)
    {
        $timestamp = time();
        $formattedDate = date('Y-m-d\TH:i', $timestamp);
        $trans = TransationInfo::where('id', $id)->where('status','confirmed')->where('start_time','>=',$formattedDate)->first();

        if ($trans->user_id == Auth::user()->id && $trans->payment_method == 'Stripe') {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            try {
                $chargeId = $trans->invoice_number;
                $charge = Charge::retrieve($chargeId);
                //return $charge;
                if ($charge && $charge->status == 'succeeded') {
                    // Refund the charge
                    Refund::create([
                        'charge' => $chargeId
                    ]);
                    $trans->return_date = time();
                    $trans->status = 'cancel';
                    $trans->update();
                    $updateSlot = Slots::where('slot_id', $trans->slot_id)->where('slot_number', $trans->slot_number)->first();
                    $updateSlot->occupied = 'no';
                    $updateSlot->end_time = null;
                    $updateSlot->user_id = null;
                    $updateSlot->update();

                    $notification = array(
                        'message' => 'Refund successful',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                } else {
                    $notification = array(
                        'message' => 'Some Issue Occured',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }
            } catch (\Exception $e) {
                $notification = array(
                    'message' => 'Some Issue Occured',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } else if($trans->user_id == Auth::user()->id && $trans->payment_method == 'Online') {
        }
        else{
            $notification = array(
                'message' => 'Some Issue Occured',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
