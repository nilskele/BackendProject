<?php


namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact.form'); 
    }
    public function clearBacklog()
    {
        ContactMessage::where('responded', true)->delete();

        return redirect()->route('contact.messages')->with('success', 'Responded messages backlog cleared.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        ContactMessage::create([
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->route('contact.form')->with('success', 'Your message has been sent.');
    }

    public function showMessages()
{
    $nonRespondedMessages = ContactMessage::where('responded', false)->get();
    $respondedMessages = ContactMessage::where('responded', true)->get();

    return view('contact.admin.contact_messages', compact('nonRespondedMessages', 'respondedMessages'));
}

public function respond(Request $request, ContactMessage $message)
{
    $request->validate([
        'response' => 'required|string|min:10', 
    ]);

    Mail::raw($request->response, function ($mail) use ($message) {
        $mail->to($message->email)
             ->subject('Response to your contact request: ' . $message->subject);
    });

    $message->update([
        'response' => $request->response,
        'responded' => true,
    ]);

    return redirect()->route('contact.messages')->with('success', 'Response sent successfully!');
}

}



