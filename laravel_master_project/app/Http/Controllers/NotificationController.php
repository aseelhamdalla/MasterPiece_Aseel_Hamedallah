<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

use App\User;

class NotificationController extends Controller
{
   public function showAllNotification()
   {

      $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->get();

      foreach (auth()->user()->unreadNotifications as $notification) {
         $id = $notification->data['user']['id'];
      }
      $userImage =  user::find($id)->info->image;
      // dd($userImage);
      return view('notification/AllNotification', compact('notifications', 'userImage'));
   }

   public function showAllNotificationForUser()
   {

      $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->get();
      foreach (auth()->user()->unreadNotifications as $notification) {
         $id = $notification->data['Provider']['id'];
      }
      $userImage =  user::find($id)->info->image;
      return view('notification/AllNotificationForUser', compact('notifications', 'userImage'));
   }


   public function picturToPublicMain()
   {

      foreach (auth()->user()->unreadNotifications as $notification) {
         $id = $notification->data['user']['id'];
      }
      $userImage =  user::find($id)->info->image;
      //  return $userImage;
      return view('layout/public_main', compact('userImage'));
   }
}
