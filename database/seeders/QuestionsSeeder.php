<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionsSeeder extends Seeder
{
    public function run()
    {
        // Existing questions with answers
        Question::create([
            'user_name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'question' => 'How do I reset my password?',
            'answer' => 'To reset your password, go to the login page and click on "Forgot Password". Follow the instructions sent to your email.',
            'is_answered' => true,
            'category_id' => 1
        ]);

        Question::create([
            'user_name' => 'Jane Doe',
            'email' => 'jane.doe@example.com',
            'question' => 'Where can I find the best electronics?',
            'answer' => 'You can find a wide selection of electronics in our "Electronics" section on the website.',
            'is_answered' => true,
            'category_id' => 2
        ]);

        Question::create([
            'user_name' => 'Alice Smith',
            'email' => 'alice.smith@example.com',
            'question' => 'How do I track my order?',
            'answer' => 'Once your order has shipped, you will receive a tracking number via email. You can use this number on our order tracking page.',
            'is_answered' => true,
            'category_id' => 3
        ]);

        Question::create([
            'user_name' => 'Bob Johnson',
            'email' => 'bob.johnson@example.com',
            'question' => 'How can I contact support?',
            'answer' => 'You can contact support via our live chat feature on the website or by emailing support@example.com.',
            'is_answered' => true,
            'category_id' => 4
        ]);

        Question::create([
            'user_name' => 'Charlie Brown',
            'email' => 'charlie.brown@example.com',
            'question' => 'Is there a refund policy?',
            'answer' => 'Yes, we offer a 30-day return policy on most items. Please visit our "Returns & Refunds" page for more information.',
            'is_answered' => true,
            'category_id' => 4
        ]);

        Question::create([
            'user_name' => 'David White',
            'email' => 'david.white@example.com',
            'question' => 'What are your shipping options?',
            'answer' => 'We offer standard, expedited, and express shipping options. You can choose your preferred option at checkout.',
            'is_answered' => true,
            'category_id' => 3
        ]);

        Question::create([
            'user_name' => 'Eve Black',
            'email' => 'eve.black@example.com',
            'question' => 'Can I change my order after purchasing?',
            'answer' => 'Unfortunately, we cannot modify orders once they have been placed. Please contact us immediately if you need assistance.',
            'is_answered' => true,
            'category_id' => 2
        ]);

        Question::create([
            'user_name' => 'Frank Harris',
            'email' => 'frank.harris@example.com',
            'question' => 'How do I return an item?',
            'answer' => 'To return an item, please visit our "Returns" page and follow the instructions. You will need your order number.',
            'is_answered' => true,
            'category_id' => 2
        ]);

        Question::create([
            'user_name' => 'Grace Lee',
            'email' => 'grace.lee@example.com',
            'question' => 'Do you offer gift cards?',
            'answer' => 'Yes, we offer gift cards. You can purchase them in the "Gift Cards" section of our website.',
            'is_answered' => true,
            'category_id' => 1
        ]);

        Question::create([
            'user_name' => 'Helen Clark',
            'email' => 'helen.clark@example.com',
            'question' => 'How do I create an account?',
            'answer' => 'Click on "Sign Up" at the top right of the page, fill out your details, and click "Create Account" to get started.',
            'is_answered' => true,
            'category_id' => 1
        ]);

        // New questions
        Question::create([
            'user_name' => 'Isaac Newton',
            'email' => 'isaac.newton@example.com',
            'question' => 'What are the return options for faulty products?',
            'answer' => 'If your product is faulty, please contact us within 14 days for a full refund or replacement. Visit our "Returns" page for details.',
            'is_answered' => true,
            'category_id' => 4
        ]);

        Question::create([
            'user_name' => 'Marie Curie',
            'email' => 'marie.curie@example.com',
            'question' => 'How can I get a discount on my first purchase?',
            'answer' => 'You can receive a discount by signing up for our newsletter. We will send you a promo code for your first purchase.',
            'is_answered' => true,
            'category_id' => 1
        ]);

        Question::create([
            'user_name' => 'Nikola Tesla',
            'email' => 'nikola.tesla@example.com',
            'question' => 'Do you offer free shipping?',
            'answer' => 'We offer free shipping on orders over $50. Check our website for more details about promotional shipping offers.',
            'is_answered' => true,
            'category_id' => 3
        ]);
        Question::create([
            'user_name' => 'Nikola Tesla',
            'email' => 'nikola.tesla@example.com',
            'question' => 'Do you offer free shipping world wide?',
            'is_answered' => false,
            'category_id' => 3
        ]);

        Question::create([
            'user_name' => 'Albert Einstein',
            'email' => 'albert.einstein@example.com',
            'question' => 'What is your privacy policy?',
            'answer' => 'We take privacy seriously. Please review our detailed privacy policy available on our website under the "Privacy" section.',
            'is_answered' => true,
            'category_id' => 1
        ]);

        Question::create([
            'user_name' => 'Ada Lovelace',
            'email' => 'ada.lovelace@example.com',
            'question' => 'Can I change the delivery address after placing the order?',
            'answer' => 'Once an order is placed, we are unable to change the delivery address. Please contact us as soon as possible if you need assistance.',
            'is_answered' => true,
            'category_id' => 2
        ]);
        Question::create([
            'user_name' => 'Albert Einstein',
            'email' => 'albert.einstein@example.com',
            'question' => 'What is your privacy policy in Europe?',
            'is_answered' => false,
            'category_id' => 1
        ]);

        Question::create([
            'user_name' => 'Ada Lovelace',
            'email' => 'ada.lovelace@example.com',
            'question' => 'Can I change the delivery address after placing the order or choose a drop off place?',
            'is_answered' => false,
            'category_id' => 2
        ]);
    }
}
