<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    // room views
    public function Room()
    {
        $rooms = Room::all();
        return view('backend.room.room', compact('rooms'));
    }

    // room create
    public function RoomCreate()
    {
        return view('backend.room.room-create');
    }

    // room store
    public function roomStore(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'wifi' => 'required',
            'room_type' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        } else {

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/room'), $image_name);
            $image_path = 'uploads/room/' . $image_name;

            $room = new Room();
            $room->title = $request->title;
            $room->price = $request->price;
            $room->description = $request->description;
            $room->wifi = $request->wifi;
            $room->room_type = $request->room_type;
            $room->image = $image_path;
            $room->save();
            return redirect()->route('room')->with('success', 'Room Created successfully');
        }
    }

    // room edit
    public function roomEdit($id)
    {
        $room = Room::find($id);
        return view('backend.room.roomEdit', compact('room'));
    }

    // room update
    public function roomUpdate($id, Request $request)
    {
        $room = Room::find($id);

        $validate = Validator::make($request->all(),[
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'wifi' => 'required',
            'room_type' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        } else {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/room'), $image_name);
                $image_path = 'uploads/room/' . $image_name;
                File::delete($room->image);
                $room->image = $image_path;
            }
            $room->title = $request->title;
            $room->price = $request->price;
            $room->description = $request->description;
            $room->wifi = $request->wifi;
            $room->room_type = $request->room_type;
            $room->save();
            return redirect()->route('room')->with('success', 'Room Updated successfully');
        }
    }

    // room delete
    public function roomDelete($id)
    {
        $room = Room::find($id);
        File::delete($room->image);
        $room->delete();
        return redirect()->route('room')->with('success', 'Room Deleted successfully');
    }
}
