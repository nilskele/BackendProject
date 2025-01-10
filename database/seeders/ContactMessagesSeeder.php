<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactMessage;

class ContactMessagesSeeder extends Seeder
{
    public function run()
    {
        // Contact message with a response
        ContactMessage::create([
            'email' => 'user1@example.com',
            'subject' => 'Inquiry about product availability',
            'message' => 'Hi, I wanted to know if the latest phone model is available in stock.',
            'response' => 'Thank you for your inquiry. The phone is currently in stock.',
            'responded' => true,
        ]);

        // Contact message without a response
        ContactMessage::create([
            'email' => 'user2@example.com',
            'subject' => 'Support issue',
            'message' => 'I am facing an issue with my account login. Can you assist?',
            'response' => null,
            'responded' => false,
        ]);

        // Another contact message with a response
        ContactMessage::create([
            'email' => 'user3@example.com',
            'subject' => 'Order status update',
            'message' => 'Can you please provide an update on my recent order?',
            'response' => 'Your order has been shipped and is expected to arrive within 3 days.',
            'responded' => true,
        ]);

        // Another contact message without a response
        ContactMessage::create([
            'email' => 'user4@example.com',
            'subject' => 'Shipping inquiry',
            'message' => 'How long does shipping typically take?',
            'response' => null,
            'responded' => false,
        ]);

        // Contact message with a response
        ContactMessage::create([
            'email' => 'user5@example.com',
            'subject' => 'Refund request',
            'message' => 'I would like to request a refund for my recent purchase.',
            'response' => 'We have processed your refund. You should receive it within 5-7 business days.',
            'responded' => true,
        ]);

        // Contact message without a response
        ContactMessage::create([
            'email' => 'user6@example.com',
            'subject' => 'Question about new products',
            'message' => 'When will the new products be available on the website?',
            'response' => null,
            'responded' => false,
        ]);

        // Contact message with a response
        ContactMessage::create([
            'email' => 'user7@example.com',
            'subject' => 'Complaint about delivery',
            'message' => 'My recent order was damaged during delivery. Can you help?',
            'response' => 'We apologize for the inconvenience. Please send us a photo of the damaged product for a refund or replacement.',
            'responded' => true,
        ]);

        // Another contact message with a response
        ContactMessage::create([
            'email' => 'user8@example.com',
            'subject' => 'Product recommendation',
            'message' => 'Could you recommend some products for my home office?',
            'response' => 'We suggest checking out our range of ergonomic chairs and desks for a better work-from-home setup.',
            'responded' => true,
        ]);

        // Another contact message without a response
        ContactMessage::create([
            'email' => 'user9@example.com',
            'subject' => 'Payment issue',
            'message' => 'I encountered an issue while making a payment. Can you assist?',
            'response' => null,
            'responded' => false,
        ]);

        // Contact message with a response
        ContactMessage::create([
            'email' => 'user10@example.com',
            'subject' => 'Product return request',
            'message' => 'I would like to return an item I purchased. Can you help with the process?',
            'response' => 'We have initiated the return process. Please check your email for return instructions.',
            'responded' => true,
        ]);
    }
}
