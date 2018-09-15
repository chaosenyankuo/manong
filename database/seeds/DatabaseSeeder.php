<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CateTableSeeder::class);
        $this->call(PackTableSeeder::class);
        $this->call(ShopTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(WuliuTableSeeder::class);
        $this->call(ZhifuTableSeeder::class);
        $this->call(LinkTableSeeder::class);
        $this->call(PtagTableSeeder::class);
        $this->call(UaddressTableSeeder::class);
        $this->call(ComTableSeeder::class);
        $this->call(FlavorsTableSeeder::class);
        $this->call(ZhuangtaiTableSeeder::class);
        $this->call(LunboTableSeeder::class);
        $this->call(ScttTableSeeder::class);
        $this->call(CouponsTableSeeder::class);

    }
}
