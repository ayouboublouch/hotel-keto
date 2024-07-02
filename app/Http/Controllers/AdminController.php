<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallary;
use App\Models\Contact;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function index(){
        if(Auth::id()){
            $usertype = Auth()->user()->usertype;
            if($usertype == 'user'){
                $gallery = Gallary::all();
                $room=Room::all();
                return view('home.index',compact('room','gallery'));
            }
            else if ($usertype == 'admin'){
                return view('admin.index');
            }
            else {
                return redirect()->back();
            }
        }
    }
    public function home(){
        
        $room=Room::all();
        
        $gallery = Gallary::all();
        
        return view ('home.index',compact('room','gallery'));
    }
    public function create_room(){
        return view ('admin.create_room');
    }
    public function add_room (Request $request){
        $data = new Room();

        $data->room_title =$request->title;

        $data->description =$request->description;

        $data->WI_FI=$request->wifi;

        $data->room_type =$request->type;

        $data->price =$request->price;
        
        $image=$request->image;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('room',$imagename);

            $data->image=$imagename;
        }

        $data->save();
        return redirect()->back();
    }
    public function view_room(){
        $data = Room::all();
        return view ('admin.view_room',compact('data'));
    
    }
    public function room_delete($id){
        $data = Room::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function room_update($id){
        $data = Room::find($id);
        return view('admin.room_update',compact('data'));
    }
    public function edit_room(Request $request, $id){
        $data = Room::find($id);
        $data->room_title =$request->title;
        $data->description =$request->description;
        $data->WI_FI=$request->wifi;
        $data->room_type =$request->type;
        $data->price =$request->price;
        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('room',$imagename);
            $data->image=$imagename;
            }
            $data->save();
            return redirect()->back();
    }
    public function bookings(){
        $data=Booking::all();
        return view('admin.booking',compact('data'));
    }
    public function delete_booking($id){
        $data=Booking::find($id);

        $data->delete();

        return redirect()->back();
    }
    public function view_gallery(){
        $gallery = Gallary::all();
        return view('admin.gallery',compact('gallery'));
    }
    public function upload_gallery(Request $request){
        $data = new Gallary();
        $image=$request->image;
        if($image){
             $imagename=time().'.'.$image->getClientOriginalExtension();
             $request->image->move('gallery',$imagename);
             $data->image=$imagename;
             $data->save();
             return redirect()->back();
        }
       
    }
    public function delete_gallery($id){
        $data=Gallary::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function all_messages(){
        $data=Contact::all();
        
        return view('admin.all_messages',compact('data'));
    }
    public function approve_book($id){
        $booking=Booking::find($id);
        $booking->status='Approve';
        $booking->save();
        return redirect()->back();

    }
    public function reject_book($id){
        $booking=Booking::find($id);
        $booking->status='Rejected';
        $booking->save();
        return redirect()->back();

    }
    public function send_mail($id){
        $data=Contact::find($id);


        return view('admin/send_mail',compact('data'));
    }
    public function mail(Request $request,$id){
        
        $data=Contact::find($id);
        $details = [
            'greeting'=> $request->greeting ,

            'body' => $request->body ,

            'action_text' => $request->action_text ,

            'action_link' => $request->action_link ,

            'endline' => $request->endline ,
        ];
        Notification::send($data,new SendEmailNotification($details));
        return redirect()->back();
    }
}