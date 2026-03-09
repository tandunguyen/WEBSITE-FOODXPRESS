<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('khach_hangs')->delete();
        DB::table('khach_hangs')->truncate();
        DB::table('khach_hangs')->insert([
            [
                'id'            => 1,
                'ho_va_ten'     => 'Nguyễn Tấn Dũng',
                'so_dien_thoai' => '0123456780',
                'email'         => 'nguyentandung@gmail.com',
                'password'      => '123456',
                'cccd'          => '123456789012',
                'ngay_sinh'     => '2004-02-01',
                'avatar'        => "https://i.pinimg.com/736x/73/61/8c/73618c83cac16313090fc26114eb5f73.jpg",
                'hash_reset'    => null,
                'hash_active'   => null,
                'is_active'     => 1,
                'is_block'      => 0,
            ],
            [
                'id'            => 2,
                'ho_va_ten'     => 'Nguyễn Đình Đức Mạnh',
                'so_dien_thoai' => '0123456789',
                'email'         => 'ducmanh@gmail.com',
                'password'      => '123456',
                'cccd'          => '123456789012',
                'ngay_sinh'     => '2004-04-22',
                'avatar'        => "https://i.pinimg.com/736x/8f/cb/6d/8fcb6d720aa69cbf2598c46b3ccc15d9.jpg",
                'hash_reset'    => null,
                'hash_active'   => null,
                'is_active'     => 1,
                'is_block'      => 0,
            ],
            [
                'id'            => 3,
                'ho_va_ten'     => 'Dương Đình Hiếu',
                'so_dien_thoai' => '0987654321',
                'email'         => 'dinhhieu@gmail.com',
                'password'      => '123456',
                'cccd'          => '987654321001',
                'ngay_sinh'     => '2004-09-29',
                'avatar'        => "https://i.pinimg.com/736x/96/b4/5e/96b45ea49da3132a317e403c29507f81.jpg",
                'hash_reset'    => null,
                'hash_active'   => null,
                'is_active'     => 1,
                'is_block'      => 0,
            ],
            [
                'id'            => 4,
                'ho_va_ten'     => 'Trần Nguyễn Minh Công',
                'so_dien_thoai' => '0911223344',
                'email'         => 'minhcong@gmail.com',
                'password'      => '123456',
                'cccd'          => '456789123456',
                'ngay_sinh'     => '1998-08-20',
                'avatar'        => "https://i.pinimg.com/736x/81/df/4c/81df4cb532bac611535d19e50e0909db.jpg",
                'hash_reset'    => null,
                'hash_active'   => null,
                'is_active'     => 1,
                'is_block'      => 0,
            ],
            [
                'id'            => 5,
                'ho_va_ten'     => 'Đặng Quốc Nam',
                'so_dien_thoai' => '0933445566',
                'email'         => 'quochuy.dang@gmail.com',
                'password'      => '123456',
                'cccd'          => '112233445566',
                'ngay_sinh'     => '1996-11-30',
                'avatar'        => "https://i.pinimg.com/736x/29/06/1d/29061de90fe6f8251de63b61f811c9a7.jpg",
                'hash_reset'    => null,
                'hash_active'   => null,
                'is_active'     => 1,
                'is_block'      => 0,
            ],
            [
                'id'            => 6,
                'ho_va_ten'     => 'Phạm Thị Mai Phương',
                'so_dien_thoai' => '0909887766',
                'email'         => 'mai.pham@gmail.com',
                'password'      => '123456',
                'cccd'          => '445566778899',
                'ngay_sinh'     => '1999-03-22',
                'avatar'        => "https://i.pinimg.com/736x/6b/4e/30/6b4e302394efd4a38d7024e0a9530c0a.jpg",
                'hash_reset'    => null,
                'hash_active'   => null,
                'is_active'     => 1,
                'is_block'      => 0,
            ],
            [
                'id'            => 7,
                'ho_va_ten'     => 'Ngô Đình Văn',
                'so_dien_thoai' => '0966887799',
                'email'         => 'vanlam.ngo@gmail.com',
                'password'      => '123456',
                'cccd'          => '998877665544',
                'ngay_sinh'     => '1997-07-12',
                'avatar'        => "https://i.pinimg.com/736x/ee/4e/04/ee4e046b5e6223acc9d6aa4d2406af57.jpg",
                'hash_reset'    => null,
                'hash_active'   => null,
                'is_active'     => 1,
                'is_block'      => 0,
            ],
        ]);
    }
}
