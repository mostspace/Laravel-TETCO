<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\School;
use App\DiscountMatrix;
use App\EducationalLevel;
use App\Grade;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed Users Table
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('adminadmin'),
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
            School::create(['school_name' => $name]);
        }

        // Seed Educational Level
        $educationalLevel = [
            ['level_name' => 'KG', 'price_limit' => 15000],
            ['level_name' => 'Elementary', 'price_limit' => 18000],
            ['level_name' => 'Intermediate', 'price_limit' => 23000],
            ['level_name' => 'High School', 'price_limit' => 26000],
        ];

        foreach ($educationalLevel as $data) {
            EducationalLevel::create([
                'level_name' => $data['level_name'],
                'price_limit' => $data['price_limit']
            ]);
        }

        // Seed Discount Matrix
        $discountMatrixes = [
            ['from' => 0, 'to' => 10, 'applied_discount' => 10],
            ['from' => 11, 'to' => 29, 'applied_discount' => 20],
            ['from' => 30, 'to' => 1000, 'applied_discount' => 30],
        ];

        foreach ($discountMatrixes as $data) {
            DiscountMatrix::create([
                'from' => $data['from'],
                'to' => $data['to'],
                'applied_discount' => $data['applied_discount'],
            ]);
        }

        // Seed Grades Table
        $grades = [
            ['school_id' => 1, 'edu_level' => 2, 'grade' => 1, 'seats' => 12, 'actual_price' => 18000],
            ['school_id' => 2, 'edu_level' => 2, 'grade' => 1, 'seats' => 8, 'actual_price' => 16000],
            ['school_id' => 3, 'edu_level' => 2, 'grade' => 1, 'seats' => 21, 'actual_price' => 20000],
        ];

        foreach ($grades as $data) { // Use $grades instead of $discountMatrixes
            Grade::create([
                'school_id' => $data['school_id'],
                'edu_level' => $data['edu_level'],
                'grade' => $data['grade'],
                'seats' => $data['seats'],
                'actual_price' => $data['actual_price'],
            ]);
        }
    }
}
