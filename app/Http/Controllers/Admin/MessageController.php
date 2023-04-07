<?php

namespace App\Http\Controllers\Admin;

use App\Services\ApiService;
use Illuminate\Http\Request;
use App\Services\MediaFileService;
use App\Http\Controllers\Controller;
use App\Mail\MessageAnswer;
use App\Mail\MessageAnswerMail;
use App\Models\Message;
use App\Notifications\MessageAnswerNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Message::query()->orderByDesc('created_at')->get();

        ApiService::_success($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::query()->where('id', $id)->first();

        return ApiService::_success($message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $message = Message::query()->where('id', $request->id)->first();

        $message->update([
            'answer' => $request->answer,
            'status' => 1,
        ]);


        // Notification::send(null, new MessageAnswerNotification($message->email));
        Mail::to($message->email)->send(new MessageAnswer($message->answer));

        return ApiService::_success("article updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::query()->where('id', $id)->first();

        $message->delete();

        return ApiService::_success("article deleted successfully");
    }
}
