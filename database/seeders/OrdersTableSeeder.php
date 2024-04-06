<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('orders')->delete();
        
        \DB::table('orders')->insert(array (
            0 => 
            array (
                'id' => 1,
                'no' => '0/ST/2022',
            'from' => 'Stock Akhir Desember (Ban)',
                'at' => '-',
                'date' => '2021-12-31',
                'total_item' => 7,
                'total_price' => 76,
                'created_at' => '2024-04-02 14:24:06',
                'updated_at' => '2024-04-02 14:24:06',
            ),
            1 => 
            array (
                'id' => 2,
                'no' => '0/ST/2022',
            'from' => 'Stock Akhir Desember (Spare Part)',
                'at' => '-',
                'date' => '2021-12-31',
                'total_item' => 19,
                'total_price' => 317,
                'created_at' => '2024-04-02 14:31:17',
                'updated_at' => '2024-04-02 14:31:17',
            ),
            2 => 
            array (
                'id' => 3,
                'no' => '0/ST/2022',
            'from' => 'Stock Akhir Desember (Pelumas)',
                'at' => '-',
                'date' => '2021-12-31',
                'total_item' => 7,
                'total_price' => 724,
                'created_at' => '2024-04-02 14:38:44',
                'updated_at' => '2024-04-02 14:38:44',
            ),
            3 => 
            array (
                'id' => 4,
                'no' => '1/ST/2022',
                'from' => '01 Januari 2022',
                'at' => '-',
                'date' => '2022-01-01',
                'total_item' => 2,
                'total_price' => 60,
                'created_at' => '2024-04-02 15:14:36',
                'updated_at' => '2024-04-02 15:14:36',
            ),
            4 => 
            array (
                'id' => 5,
                'no' => '3/ST/2022',
                'from' => '03 Januari 2022',
                'at' => '-',
                'date' => '2022-01-03',
                'total_item' => 2,
                'total_price' => 10,
                'created_at' => '2024-04-02 15:17:55',
                'updated_at' => '2024-04-02 15:19:28',
            ),
            5 => 
            array (
                'id' => 6,
                'no' => '4/ST/2022',
                'from' => '04 Januari 2022',
                'at' => '-',
                'date' => '2022-01-04',
                'total_item' => 1,
                'total_price' => 209,
                'created_at' => '2024-04-02 15:20:36',
                'updated_at' => '2024-04-02 15:20:36',
            ),
            6 => 
            array (
                'id' => 7,
                'no' => '6/ST/2022',
                'from' => '06 Januari 2022',
                'at' => '-',
                'date' => '2022-01-06',
                'total_item' => 1,
                'total_price' => 209,
                'created_at' => '2024-04-02 15:21:59',
                'updated_at' => '2024-04-02 15:21:59',
            ),
            7 => 
            array (
                'id' => 8,
                'no' => '11/ST/2022',
                'from' => '11 Januari 2022',
                'at' => '-',
                'date' => '2022-01-11',
                'total_item' => 1,
                'total_price' => 10,
                'created_at' => '2024-04-02 15:24:12',
                'updated_at' => '2024-04-02 15:24:12',
            ),
            8 => 
            array (
                'id' => 9,
                'no' => '13/ST/2022',
                'from' => '13 Januari 2022',
                'at' => '-',
                'date' => '2022-01-13',
                'total_item' => 4,
                'total_price' => 21,
                'created_at' => '2024-04-02 15:26:49',
                'updated_at' => '2024-04-02 15:35:02',
            ),
            9 => 
            array (
                'id' => 10,
                'no' => '14/ST/2022',
                'from' => '14 januari 2022',
                'at' => '-',
                'date' => '2022-01-14',
                'total_item' => 8,
                'total_price' => 64,
                'created_at' => '2024-04-02 15:34:36',
                'updated_at' => '2024-04-02 15:34:36',
            ),
            10 => 
            array (
                'id' => 11,
                'no' => '17/ST/2022',
                'from' => '17 Januari 2022',
                'at' => '-',
                'date' => '2022-01-17',
                'total_item' => 8,
                'total_price' => 1084,
                'created_at' => '2024-04-02 15:42:37',
                'updated_at' => '2024-04-02 15:42:37',
            ),
            11 => 
            array (
                'id' => 12,
                'no' => '18/ST/2022',
                'from' => '18 Januari 2022',
                'at' => '-',
                'date' => '2022-01-18',
                'total_item' => 1,
                'total_price' => 1,
                'created_at' => '2024-04-02 15:43:45',
                'updated_at' => '2024-04-02 15:43:45',
            ),
            12 => 
            array (
                'id' => 13,
                'no' => '19/St/2022',
                'from' => '19 Januari 2022',
                'at' => '-',
                'date' => '2022-01-19',
                'total_item' => 2,
                'total_price' => 12,
                'created_at' => '2024-04-02 15:45:16',
                'updated_at' => '2024-04-02 15:45:16',
            ),
            13 => 
            array (
                'id' => 14,
                'no' => '20/ST/2022',
                'from' => '20 Januari 2022',
                'at' => '-',
                'date' => '2022-01-20',
                'total_item' => 3,
                'total_price' => 24,
                'created_at' => '2024-04-02 15:47:35',
                'updated_at' => '2024-04-02 15:47:35',
            ),
            14 => 
            array (
                'id' => 15,
                'no' => '21/ST/2022',
                'from' => '21 Januari 2022',
                'at' => '-',
                'date' => '2022-01-21',
                'total_item' => 4,
                'total_price' => 52,
                'created_at' => '2024-04-02 15:49:37',
                'updated_at' => '2024-04-02 15:49:37',
            ),
            15 => 
            array (
                'id' => 16,
                'no' => '22/ST/2022',
                'from' => '22 Januari 2022',
                'at' => '-',
                'date' => '2022-01-22',
                'total_item' => 1,
                'total_price' => 6,
                'created_at' => '2024-04-02 15:51:36',
                'updated_at' => '2024-04-02 15:51:36',
            ),
            16 => 
            array (
                'id' => 17,
                'no' => '28/ST/2022',
                'from' => '28 Januari 2022',
                'at' => '-',
                'date' => '2022-01-28',
                'total_item' => 1,
                'total_price' => 6,
                'created_at' => '2024-04-02 15:53:46',
                'updated_at' => '2024-04-02 15:53:46',
            ),
            17 => 
            array (
                'id' => 18,
                'no' => '3/FEB/2022',
                'from' => 'HelloWorld',
                'at' => '-',
                'date' => '2022-02-03',
                'total_item' => 2,
                'total_price' => 12,
                'created_at' => '2024-04-03 05:14:23',
                'updated_at' => '2024-04-03 05:14:23',
            ),
            18 => 
            array (
                'id' => 19,
                'no' => '4/FEB/2022',
                'from' => 'HelloWorld',
                'at' => '-',
                'date' => '2022-02-04',
                'total_item' => 3,
                'total_price' => 29,
                'created_at' => '2024-04-03 05:16:19',
                'updated_at' => '2024-04-03 05:16:19',
            ),
            19 => 
            array (
                'id' => 20,
                'no' => '5/FEB/2022',
                'from' => 'HelloWorld',
                'at' => '-',
                'date' => '2022-02-05',
                'total_item' => 3,
                'total_price' => 44,
                'created_at' => '2024-04-03 05:19:30',
                'updated_at' => '2024-04-03 05:24:47',
            ),
            20 => 
            array (
                'id' => 21,
                'no' => '7/FEB/2022',
                'from' => 'HelloWorld',
                'at' => '-',
                'date' => '2022-02-07',
                'total_item' => 6,
                'total_price' => 41,
                'created_at' => '2024-04-03 05:23:39',
                'updated_at' => '2024-04-03 05:24:25',
            ),
            21 => 
            array (
                'id' => 22,
                'no' => '9/FEB/2022',
                'from' => 'HelloWorld',
                'at' => '-',
                'date' => '2022-02-09',
                'total_item' => 2,
                'total_price' => 23,
                'created_at' => '2024-04-03 05:27:36',
                'updated_at' => '2024-04-03 05:27:36',
            ),
            22 => 
            array (
                'id' => 23,
                'no' => '12/FEB/2022',
                'from' => 'HelloWorld',
                'at' => '-',
                'date' => '2022-02-12',
                'total_item' => 3,
                'total_price' => 42,
                'created_at' => '2024-04-03 05:32:09',
                'updated_at' => '2024-04-03 05:32:09',
            ),
            23 => 
            array (
                'id' => 24,
                'no' => '14/FEB/2022',
                'from' => 'HelloWorld',
                'at' => '-',
                'date' => '2022-02-14',
                'total_item' => 3,
                'total_price' => 822,
                'created_at' => '2024-04-03 05:37:34',
                'updated_at' => '2024-04-03 05:37:34',
            ),
            24 => 
            array (
                'id' => 25,
                'no' => '17/FEB/2022',
                'from' => 'HelloWorld',
                'at' => '-',
                'date' => '2022-02-17',
                'total_item' => 4,
                'total_price' => 41,
                'created_at' => '2024-04-03 05:41:07',
                'updated_at' => '2024-04-03 05:42:19',
            ),
            25 => 
            array (
                'id' => 26,
                'no' => '22/FEB/2022',
                'from' => 'HelloWorld',
                'at' => '-',
                'date' => '2022-02-22',
                'total_item' => 2,
                'total_price' => 4,
                'created_at' => '2024-04-03 05:44:05',
                'updated_at' => '2024-04-03 05:44:05',
            ),
            26 => 
            array (
                'id' => 27,
                'no' => '23/FEB/2022',
                'from' => 'HelloWorld',
                'at' => '-',
                'date' => '2022-02-23',
                'total_item' => 1,
                'total_price' => 10,
                'created_at' => '2024-04-03 05:44:43',
                'updated_at' => '2024-04-03 05:44:43',
            ),
            27 => 
            array (
                'id' => 28,
                'no' => '1/MRT/2022',
                'from' => 'HelloWorld',
                'at' => '-',
                'date' => '2022-03-01',
                'total_item' => 3,
                'total_price' => 12,
                'created_at' => '2024-04-04 04:44:59',
                'updated_at' => '2024-04-04 04:44:59',
            ),
            28 => 
            array (
                'id' => 29,
                'no' => '4/MRT/2022',
                'from' => 'HelloWorld',
                'at' => '-',
                'date' => '2022-03-04',
                'total_item' => 1,
                'total_price' => 8,
                'created_at' => '2024-04-04 04:46:06',
                'updated_at' => '2024-04-04 04:46:06',
            ),
            29 => 
            array (
                'id' => 30,
                'no' => '7/MRT/2022',
                'from' => 'HelloWorld',
                'at' => '-',
                'date' => '2022-03-07',
                'total_item' => 2,
                'total_price' => 30,
                'created_at' => '2024-04-04 04:47:07',
                'updated_at' => '2024-04-04 04:47:07',
            ),
            30 => 
            array (
                'id' => 31,
                'no' => '8/MRT/2022',
                'from' => 'HelloWorld',
                'at' => '-',
                'date' => '2022-03-08',
                'total_item' => 9,
                'total_price' => 39,
                'created_at' => '2024-04-04 04:50:28',
                'updated_at' => '2024-04-04 04:50:28',
            ),
            31 => 
            array (
                'id' => 32,
                'no' => '11/MRT/2022',
                'from' => 'HelloWorld',
                'at' => '-',
                'date' => '2022-03-11',
                'total_item' => 1,
                'total_price' => 8,
                'created_at' => '2024-04-04 04:56:36',
                'updated_at' => '2024-04-04 04:56:36',
            ),
            32 => 
            array (
                'id' => 33,
                'no' => '12/MRT/2022',
                'from' => 'HelloWorld',
                'at' => '-',
                'date' => '2022-03-12',
                'total_item' => 1,
                'total_price' => 10,
                'created_at' => '2024-04-04 04:57:18',
                'updated_at' => '2024-04-04 04:57:18',
            ),
            33 => 
            array (
                'id' => 34,
                'no' => '14/MRT/2022',
                'from' => 'HelloWorld',
                'at' => '-',
                'date' => '2022-03-14',
                'total_item' => 3,
                'total_price' => 48,
                'created_at' => '2024-04-04 05:00:09',
                'updated_at' => '2024-04-04 05:00:09',
            ),
            34 => 
            array (
                'id' => 35,
                'no' => '16/MRT/2022',
                'from' => 'HelloWorld',
                'at' => '-',
                'date' => '2022-03-16',
                'total_item' => 4,
                'total_price' => 23,
                'created_at' => '2024-04-04 05:03:20',
                'updated_at' => '2024-04-04 05:03:20',
            ),
            35 => 
            array (
                'id' => 36,
                'no' => '18/MRT/2022',
                'from' => 'HelloWorld',
                'at' => '-',
                'date' => '2022-03-18',
                'total_item' => 2,
                'total_price' => 30,
                'created_at' => '2024-04-04 05:06:22',
                'updated_at' => '2024-04-04 05:06:22',
            ),
            36 => 
            array (
                'id' => 37,
                'no' => '21/MRT/2022',
                'from' => 'HelloWorld',
                'at' => '-',
                'date' => '2022-03-21',
                'total_item' => 1,
                'total_price' => 10,
                'created_at' => '2024-04-04 05:07:28',
                'updated_at' => '2024-04-04 05:07:28',
            ),
            37 => 
            array (
                'id' => 38,
                'no' => '23/MRT/2022',
                'from' => 'HelloWorld',
                'at' => '-',
                'date' => '2022-03-23',
                'total_item' => 1,
                'total_price' => 4,
                'created_at' => '2024-04-04 05:08:38',
                'updated_at' => '2024-04-04 05:08:38',
            ),
            38 => 
            array (
                'id' => 39,
                'no' => '24/MRT/2022',
                'from' => 'HelloWorld',
                'at' => '-',
                'date' => '2022-03-24',
                'total_item' => 1,
                'total_price' => 15,
                'created_at' => '2024-04-04 05:10:20',
                'updated_at' => '2024-04-04 05:10:20',
            ),
            39 => 
            array (
                'id' => 40,
                'no' => '28/MRT/2022',
                'from' => 'HelloWorld',
                'at' => '-',
                'date' => '2022-03-28',
                'total_item' => 1,
                'total_price' => 4,
                'created_at' => '2024-04-04 05:11:32',
                'updated_at' => '2024-04-04 05:11:32',
            ),
            40 => 
            array (
                'id' => 41,
                'no' => '30/MRT/2022',
                'from' => 'HelloWorld',
                'at' => '-',
                'date' => '2022-03-30',
                'total_item' => 2,
                'total_price' => 4,
                'created_at' => '2024-04-04 05:12:14',
                'updated_at' => '2024-04-04 05:12:14',
            ),
        ));
        
        
    }
}