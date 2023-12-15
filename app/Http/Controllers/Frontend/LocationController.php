<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ParkingImage;
use App\Models\ParkingSlots;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    public function inputPage()
    {
        return view('allservice');
    }

    public function resultPage(Request $request)
    {
        $location = $request->input('location');
        return view('result', compact('location'));
    }
    public function directionPage()
    {
        return view('direction');
    }
    public function addParking()
    {
        return view('addparking');
    }
    public function storeParking(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'building_name' => 'required',
            'building_number' => 'required',
            'locationSearch' => 'required',
            'number' => 'required|numeric',
            'city' => 'required',
            'post_area' => 'required',
            'zip' => 'required|numeric',
            'price' => 'required|numeric',
            'slot_numbers' => 'required',
            'open_time' => 'required',
            'close_time' => 'required',
            'type' => 'required|array',
            'type.*' => 'in:cng,bus,truck,bike,car',
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'building_name.required' => 'Building name is required',
            'building_number.required' => 'Building number is required',
            'locationSearch.required' => 'Coordinates is required',
            'number.required' => 'Mobile is required',
            'number.numeric' => 'Mobile must be number',
            'city.required' => 'City is required',
            'post_area.required' => 'Post area is required',
            'zip.required' => 'Zip is required',
            'zip.numeric' => 'Zip must be number',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be number',
            'slot_numbers.required' => 'Slot numbers is required',
            'open_time.required' => 'Open time is required',
            'close_time.required' => 'Close time is required',
            'type.required' => 'Slot type is required',
        ]);
        if ($validation->fails()) {
            \Log::error('Image Upload Validation Errors:', $validation->errors()->all());
            $notification = array(
                'message' => 'Please fill up all the fields',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification)->withErrors($validation)->withInput();
        }

        $slot = new ParkingSlots;
        $slot->building_name = $request->building_name;
        $slot->building_number = $request->building_number;
        $slot->coordinates = $request->locationSearch;
        $slot->mobile = $request->number;
        $slot->city = $request->city;
        $slot->post_area = $request->post_area;
        $slot->zip = $request->zip;
        $slot->price = $request->price;
        $slot->slot_numbers = $request->slot_numbers;
        $slot->open_time = $request->open_time;
        $slot->close_time = $request->close_time;
        $slot_type = implode(',', $request->type);
        $slot->slot_type = $slot_type;
        $request->cctv ? $slot->cctv = $request->cctv : '';
        $request->security ? $slot->security = $request->security : '';
        $request->guest ? $slot->guest = $request->guest : '';
        $request->extinguisher ? $slot->extinguisher = $request->extinguisher : '';
        $request->water ? $slot->water = $request->water : '';
        $request->mainroad ? $slot->mainroad = $request->mainroad : '';
        $slot->user_id = Auth::user()->id;
        $slot->save();


        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $name = time() . '-' . $slot->id . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();

                $success = $image->move('frontend/assets/img/previewSlot/', $name);
                $multipleImages = new ParkingImage;
                $multipleImages->parking_id = $slot->id;

                // Check if the image was successfully uploaded
                if ($success) {
                    // Resize the uploaded image to 300x300 pixels
                    Image::make('frontend/assets/img/previewSlot/' . $name)
                        ->resize(400, 250)
                        ->save('frontend/assets/img/previewSlot/' . $name);

                    // Update the brand's image attribute
                    $multipleImages->image = $name;
                }
                else {
                    // Log an error or print a message to help identify the issue
                    \Log::error('Failed to move image: ' . $name);
                }
                $multipleImages->save();
            }
        }

        $notification = array(
            'message' => 'Waiting for admin approval',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
        // return $slot_type;
    }
}
