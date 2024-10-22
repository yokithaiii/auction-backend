<?php

namespace Database\Seeders;

use App\Models\Lot;
use App\Models\LotCategory;
use App\Models\LotDeliveryMethod;
use App\Models\LotImage;
use App\Models\LotParameter;
use App\Models\LotPaymentMethod;
use App\Models\LotPaymentType;
use App\Models\Seller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()->create([
            'name' => 'spartak',
            'email' => 'spartak@gmail.com',
            'password' => Hash::make('qweqweqwe'),
        ]);

        $seller = Seller::query()->create([
            'user_id' => $user->id,
            'firstname' => 'Спартак',
            'lastname' => 'Васильев',
            'phone' => '+79676243734',
            'email' => 'spartakvasilev1999@gmail.com',
            'is_email_verified' => true,
            'birthdate' => '1999-09-04',
            'sex' => 'male',
            'avatar_url' => 'avatar.png',
            'whatsapp' => '+79676243734',
            'telegram' => 'spxrtxk',
        ]);

        $lotCategory = LotCategory::query()->create([
            'name' => 'Картины',
            'description' => 'Картины XX века',
            'image_url' => 'art.png',
        ]);

        $lot = Lot::query()->create([
            'seller_id' => $seller->id,
            'title' => 'Lot no 1',
            'description' => 'Lorem Ipsum is simply dummy text',
            'price' => 990,
            'quantity' => 1,
            'start_date' => Carbon::now()->format('Y-m-d'),
            'end_date' => Carbon::now()->addWeek()->format('Y-m-d'),
            'category_id' => $lotCategory->id,
        ]);

        LotDeliveryMethod::query()->create([
            'lot_id' => $lot->id,
            'method' => 'courier'
        ]);

        LotPaymentMethod::query()->create([
            'lot_id' => $lot->id,
            'method' => 'card'
        ]);

        LotPaymentType::query()->create([
            'lot_id' => $lot->id,
            'type' => 'prepayment'
        ]);

        LotImage::query()->create([
            'lot_id' => $lot->id,
            'url' => 'image_1.png',
        ]);

        LotImage::query()->create([
            'lot_id' => $lot->id,
            'url' => 'image_2.png',
        ]);

        LotImage::query()->create([
            'lot_id' => $lot->id,
            'url' => 'image_3.png',
        ]);

        LotParameter::query()->create([
            'lot_id' => $lot->id,
            'title' => 'Размер',
            'value' => '180x120'
        ]);

        LotParameter::query()->create([
            'lot_id' => $lot->id,
            'title' => 'Цвет',
            'value' => 'Черный'
        ]);

    }
}
