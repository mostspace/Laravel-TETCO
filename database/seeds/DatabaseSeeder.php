<?php

use Illuminate\Database\Seeder;
use App\User;
use App\School;
use App\DiscountMatrix;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // Seed School Table
        $schools = [
            'الاخاء الأهلية القسم (الدولي)',
            'الإخاء الأهلية',
            'الذكر المتوسطة الأهلية',
            'دار الفرسان  الأهلية لرياض الأطفال',
            'دار الفرسان الإبتدائية الأهلية',
            'دار الفرسان الإبتدائية الأهليمدارس العباقرة',
            'المستقبل الأهلية لرياض الأطفال',
            'مدرسة الوردة البيضاء الأهلية الابتدائية',
            'الاخاء الابتدائية الاهلية'
        ];

        foreach ($schools as $name) {
            School::create(['name' => $name]);
        }

        // Seed Discount Matrix
        $discountMatrixes = [
            ['from' => 1, 'to' => 10, 'applied_discount' => 10],
            ['from' => 11, 'to' => 29, 'applied_discount' => 20],
            ['from' => 30, 'to' => 1000, 'applied_discount' => 30],
        ];

        foreach($discountMatrixes as $matrix => $data) {
            DiscountMatrix::factory()->create([
                'from' => $data['from'],
                'to' =>$data['to'],
                'applied_discount' =>$data['applied_discount'],
            ]);
        }

    }
}
