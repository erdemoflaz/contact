<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts = [
            [
                'name' => 'Erdem',
                'last_name' => 'OFLAZ',
                'company' => 'masomo',
                'information' => [
                    'phone' => '05417109458',
                    'email' => 'info@erdemoflaz.com',
                    'location' => 'izmir',
                ]
            ],
            [
                'name' => 'John',
                'last_name' => 'Doe',
                'company' => 'miniclip',
                'information' => [
                    'phone' => '05417109455',
                    'email' => 'info@john.com',
                    'location' => 'istanbul',
                ]
            ],
            [
                'name' => 'Serdar',
                'last_name' => 'Ortaç',
                'company' => 'laisrecords',
                'information' => [
                    'phone' => '05417109454',
                    'email' => 'info@serdar.com',
                    'location' => 'istanbul',
                ]
            ]
        ];

        foreach ($contacts as $contact) {
            echo "Processing " . $contact['name'] . "'s Contact" . PHP_EOL;

            $createdContact = Contact::create([
                'name'      => $contact['name'],
                'last_name' => $contact['last_name'],
                'company'   => $contact['company'],
            ]);

            $createdContact->information()->create([
               'phone'      =>  $contact['information']['phone'],
               'email'      =>  $contact['information']['email'],
               'location'   =>  $contact['information']['location'],
            ]);
        }
    }
}
