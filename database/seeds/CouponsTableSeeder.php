<?php

use App\Coupon;
use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coupon1 = new Coupon;
        $coupon1 -> name = '5元优惠券';
        $coupon1 -> price = '5';
        $coupon1 -> save();
        $coupon2 = new Coupon;
        $coupon2 -> name = '10元优惠券';
        $coupon2 -> price = '10';
        $coupon2 -> save();
        $coupon4 = new Coupon;
        $coupon4 -> name = '20元优惠券';
        $coupon4 -> price = '20';
        $coupon4 -> save();
        $coupon5 = new Coupon;
        $coupon5 -> name = '25元优惠券';
        $coupon5 -> price = '25';
        $coupon5 -> save();
        $coupon6 = new Coupon;
        $coupon6 -> name = '30元优惠券';
        $coupon6 -> price = '30';
        $coupon6 -> save();
        $coupon8 = new Coupon;
        $coupon8 -> name = '50元优惠券';
        $coupon8 -> price = '50';
        $coupon8 -> save();
        $coupon9 = new Coupon;
        $coupon9 -> name = '80元优惠券';
        $coupon9 -> price = '80';
        $coupon9 -> save();
        $coupon10 = new Coupon;
        $coupon10 -> name = '100元优惠券';
        $coupon10 -> price = '100';
        $coupon10 -> save();

    }
}
