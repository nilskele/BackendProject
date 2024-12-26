<?php


namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // Show the contact form
    public function showForm()
    {
        return view('contact.form'); // Corrected to use 'contact.form'
    }

    // Store the contact form message
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        // Create the contact message in the database
        ContactMessage::create([
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        // Redirect back with a success message
        return redirect()->route('contact.form')->with('success', 'Your message has been sent.');
    }

    public function showMessages()
{
    // Fetch non-responded and responded messages
    $nonRespondedMessages = ContactMessage::where('responded', false)->get();
    $respondedMessages = ContactMessage::where('responded', true)->get();

    // Return the view with the respective message lists
    return view('contact.admin.contact_messages', compact('nonRespondedMessages', 'respondedMessages'));
}

public function respond(Request $request, ContactMessage $message)
{
    // Validate the admin's response content
    $request->validate([
        'response' => 'required|string|min:10', // Ensure a meaningful response
    ]);

    // Send the response email to the user
    Mail::raw($request->response, function ($mail) use ($message) {
        $mail->to($message->email)
             ->subject('Response to your contact request: ' . $message->subject);
    });

    // Update the message to mark as responded and save the admin's response
    $message->update([
        'response' => $request->response,
        'responded' => true,
    ]);

    // Redirect back with a success message
    return redirect()->route('contact.messages')->with('success', 'Response sent successfully!');
}

}



