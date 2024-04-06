<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ComponentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('components')->delete();
        
        \DB::table('components')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Switch Klakson',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 1,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'dongkrak bekas',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Air AKI Tambah',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Aki Yokoma NS 70',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Isolasi Kabel',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 1,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Balon H3 24V',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 8,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Balon H4 24V',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 1,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'bohlam besar 2kk',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 11,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'bohlam besar 1kk',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 1,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'bohlam besar 2kk 12V',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'bohlam besar 1kk 12V',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'lampu Tembak',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Baut Roda Belakang Hino',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Baut Roda Depan Hino',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 207,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Baut Roda Belakang Hino 500',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 10,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Baut Roda Depan Hino 500',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 23,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Baut Roda Depan Nisan',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Baut Roda Belakang Nisan',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Busing Ding Dong',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 15,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Filter Oli Hino',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 5,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Filter Oli Hino Seri 500',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Filter Oli Transmisi Hino Seri 500',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 2,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Filter Oli Nisan',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Filter Solar Atas Hino ',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 2,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Filter Solar Bawah Hino',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Filter Solar Bawah Hino Seri 500',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 3,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Filter solar bawah hino dutro HT',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 1,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Filter Solar Atas Nisan',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Filter Solar Bawah Nisan',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Gemuk Kiyodo Yushi',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Kampas Rem Belakang Hino',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Kampas Rem Belakang Hino Seri 500',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 1,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Kampas rem dpn hino',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 3,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Kampas Rem Depan Hino Seri 500',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Kampas Rem Depan Nisan',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'Karet Rem 55,56 L',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Karet Rem 1 3/8 L',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Karet Rem 1 1/2 L',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'Karet Rem 50,8 L',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'Karet Rem 53.5 L',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'Lahar 32310',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 1,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'Lahar 32313',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 4,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Lahar 32217',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 1,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'Lahar 32218',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'Lahar 30311',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'Minyak Rem ',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'Karet Tutup Debu',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'Saringan udara ',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'oli seal roda dpn Hino',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 17,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'oli seal roda blk hino',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'per dpn no 1 HINO',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'per dpn no 2 HINO',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'per blk no 1 HINO',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'per blk no 2 HINO',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'kampas kopling ',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'Repair Kit Kap Break',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 2,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'Per Kampas Dpn Hino',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'Topi Velek ',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 1,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'Velek 8 lubang',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'Rivet Kampas',
                'measurement' => 'buah',
                'category_id' => 1,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'Mersrania 2T Super',
                'measurement' => 'liter',
                'category_id' => 2,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'Meditran SC ',
                'measurement' => 'liter',
                'category_id' => 2,
                'in_stock' => 17,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            62 => 
            array (
                'id' => 63,
            'name' => 'Delvac Super 1300 15/40 (208L)',
                'measurement' => 'liter',
                'category_id' => 2,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            63 => 
            array (
                'id' => 64,
            'name' => 'octail supreme t.disel 15w40 ci-4 s (200L)',
                'measurement' => 'liter',
                'category_id' => 2,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            64 => 
            array (
                'id' => 65,
            'name' => 'octal gear oil sae 90 (200L)',
                'measurement' => 'liter',
                'category_id' => 2,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            65 => 
            array (
                'id' => 66,
            'name' => 'octal gear oil sae 140 (200L)',
                'measurement' => 'liter',
                'category_id' => 2,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'Meditran SX',
                'measurement' => 'liter',
                'category_id' => 2,
                'in_stock' => 118,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'Rored HDA 90',
                'measurement' => 'liter',
                'category_id' => 2,
                'in_stock' => 166,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'Rored HDA 140',
                'measurement' => 'liter',
                'category_id' => 2,
                'in_stock' => 160,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'Rored EPA-140 6x4 ',
                'measurement' => 'liter',
                'category_id' => 2,
                'in_stock' => 47,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'Rored EPA-140 4x5',
                'measurement' => 'liter',
                'category_id' => 2,
                'in_stock' => 4,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'Rored HAD-140 4x5',
                'measurement' => 'liter',
                'category_id' => 2,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'Rored HAD-140 6x4',
                'measurement' => 'liter',
                'category_id' => 2,
                'in_stock' => 3,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'Rored EPA-90 6x4',
                'measurement' => 'liter',
                'category_id' => 2,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'Rored EPA-90 4x5',
                'measurement' => 'liter',
                'category_id' => 2,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'Rored HAD-90 6x4',
                'measurement' => 'liter',
                'category_id' => 2,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            76 => 
            array (
                'id' => 77,
            'name' => 'Ban Luar 600-13 Asli 8 PLY (GT)',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 2,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'Ban Luar Asli Apollo 750-16',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 6,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'Ban Luar Asli hancook 750-16',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'Ban Luar Asli Michelin 750-16',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'ban luar asli EFFIPLUS 750-16',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'Pentil Tubless',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 7,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'Ban Luar Asli HIXIH 750-16',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'Ban Luar Asli KTX 879 750-16',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'Ban Luar 1000-20 Asli Apollo',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'Ban Luar 1000-20 Asli Hankook ',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'Ban Luar Asli DUNLOP SP571  1000-20',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 9,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'Ban Luar asli DUNLOP 1000-20 TBLS',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 4,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'Ban Luar asli HIXIH TBLS 1100-20',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'Ban Luar asli ECED 1000-20',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'Ban Luar asli ECED 1000-20 CAKAR',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'Ban Luar asli JOYAL A876 TBLS R22,5',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 1,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'Ban Luar 1000-20 Asli HIXIH',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'Ban Luar Asli Michelin R22,5 1000-20',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'Ban Luar Asli hancook R22,5 1000-20',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'Ban Luar 1000-20 Joyal A9',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'Ban Luar 1000-20 Asli BFG cross control',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'Ban Luar 1000-20 Asli ROADBOSS',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'Ban Luar 1000-20 Asli TBB KTX 788',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'Ban Luar 1000-20 Asli KTX 879',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'Ban Luar 1000-20 Asli GAMA A9',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            101 => 
            array (
                'id' => 102,
                'name' => 'ban luar asli AULICE 101 1000-20',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            102 => 
            array (
                'id' => 103,
                'name' => 'ban luar asli EFFIPLUS 1000-20',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'Ban Luar 700-16 Vulkanisir OP AB Gron',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            104 => 
            array (
                'id' => 105,
                'name' => 'Ban Luar 750-16 Vulkanisir OP AB VJ',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 1,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'Ban Luar 750-16 Vulkanisir OP AB Gron',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'Ban Luar 750-16 Vulkanisir OP DS Gron',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 1,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'Ban Luar 750-16 Vulkanisir AMB',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'Ban Luar 900-20 Vulkanisir OP AB Gron',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'Ban Luar 1000-20 Vulkanisir OP AB VJ',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'Ban Luar 1000-20 Vulkanisir AMB ',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'Ban Luar 1000-20 Vulkanisir OP ELG Gron',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'Ban Luar 1000-20 Vulkanisir OP HW Gron',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 4,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'Ban Luar 1000-20 Vulkanisir OP AB Gron',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            114 => 
            array (
                'id' => 115,
                'name' => 'Ban dalam Aspira 750-16',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            115 => 
            array (
                'id' => 116,
                'name' => 'Ban Dalam GT 750-16',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            116 => 
            array (
                'id' => 117,
                'name' => 'Ban Dalam Op Vj 750-16',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            117 => 
            array (
                'id' => 118,
                'name' => 'Ban Dalam 700 16 GT',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            118 => 
            array (
                'id' => 119,
                'name' => 'Ban Dalam 1000-20 GT',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            119 => 
            array (
                'id' => 120,
                'name' => 'Ban dalam GAMA 1000-20',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            120 => 
            array (
                'id' => 121,
                'name' => 'Ban Dalam 900 20 Grand Prix',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            121 => 
            array (
                'id' => 122,
                'name' => 'Ban Dalam 1000 20 KRC',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            122 => 
            array (
                'id' => 123,
                'name' => 'Ban Dalam OP VJ 1000-20',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            123 => 
            array (
                'id' => 124,
                'name' => 'Ban Dalam AMB 1000-20',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            124 => 
            array (
                'id' => 125,
                'name' => 'Ban Dalam 1000 20 GT',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 7,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            125 => 
            array (
                'id' => 126,
                'name' => 'Lidah Ban 750 16 Aspira',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            126 => 
            array (
                'id' => 127,
                'name' => 'Lidah Ban 750 16 GT',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            127 => 
            array (
                'id' => 128,
                'name' => 'Lidah Ban 1000-20 GT',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 8,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            128 => 
            array (
                'id' => 129,
                'name' => 'Lidah Ban op vj 750/16',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            129 => 
            array (
                'id' => 130,
                'name' => 'Lidah ban aspira 1000-20',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            130 => 
            array (
                'id' => 131,
                'name' => 'Lidah Ban 900 20 Gron Prix',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            131 => 
            array (
                'id' => 132,
                'name' => 'Lidah Ban 1000 20 Bonus',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            132 => 
            array (
                'id' => 133,
                'name' => 'Lidah Ban OP VJ 1000-20',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            133 => 
            array (
                'id' => 134,
                'name' => 'Lidah Ban AMB 1000-20',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
            134 => 
            array (
                'id' => 135,
                'name' => 'Lidah Ban 1000-20 ',
                'measurement' => 'buah',
                'category_id' => 3,
                'in_stock' => 0,
                'created_at' => '2024-03-30 00:00:00',
                'updated_at' => '2024-03-30 00:00:00',
            ),
        ));
        
        
    }
}