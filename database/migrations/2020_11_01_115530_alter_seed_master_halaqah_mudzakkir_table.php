<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSeedMasterHalaqahMudzakkirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Seed Master Halaqah
        DB::table('master_halaqahs')->insert([
            [
                'kode_halaqah'      => '001',
                'nama_halaqah'      => 'Mudzakkir ',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '002',
                'nama_halaqah'      => 'Mudzakkir ',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '003',
                'nama_halaqah'      => 'Mudarris',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '004',
                'nama_halaqah'      => 'Qism & Lajnah',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '005',
                'nama_halaqah'      => 'Gabungan Syu\'bah',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '101',
                'nama_halaqah'      => 'Mudzakkir',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '102',
                'nama_halaqah'      => 'Awamin',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '103',
                'nama_halaqah'      => 'Nisa',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '111',
                'nama_halaqah'      => 'Bapak-bapak Cilimus',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '112',
                'nama_halaqah'      => 'Ibu-ibu Cilimus',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '113',
                'nama_halaqah'      => 'Ibu-ibu Bojong',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '114',
                'nama_halaqah'      => 'Ghilman SMA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '121',
                'nama_halaqah'      => 'Ibu-ibu Ragasakti',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '122',
                'nama_halaqah'      => 'Ibu-ibu Bandorasa',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '123',
                'nama_halaqah'      => 'Ibu-ibu Jalaksana',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '124',
                'nama_halaqah'      => 'Fityan',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '125',
                'nama_halaqah'      => 'Ghilman SMP',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '201',
                'nama_halaqah'      => 'Bapak-bapak Cikaso',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '211',
                'nama_halaqah'      => 'Bapak-bapak Nusaherang',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '212',
                'nama_halaqah'      => 'Ibu-ibu Nusaherang',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '213',
                'nama_halaqah'      => 'Fityan Ghilman Nusaherang',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '221',
                'nama_halaqah'      => 'Bapak-bapak Kuningan',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '222',
                'nama_halaqah'      => 'Ibu-ibu Kuningan',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '231',
                'nama_halaqah'      => 'Ibu-ibu Cikaso',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '232',
                'nama_halaqah'      => 'Fityan Ghilman Cikaso',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '301',
                'nama_halaqah'      => 'Awamin & Mudzakkir',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '302',
                'nama_halaqah'      => 'Mudzakkiroh',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '311',
                'nama_halaqah'      => 'Bapak-bapak Far\'ah 01',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '312',
                'nama_halaqah'      => 'Ibu-ibu Far\'ah 01 Senin',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '313',
                'nama_halaqah'      => 'Ibu-ibu Far\'ah 01 Selasa',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '314',
                'nama_halaqah'      => 'SMP',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '315',
                'nama_halaqah'      => 'Akhwat',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '316',
                'nama_halaqah'      => 'Ikhwan',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '321',
                'nama_halaqah'      => 'Bapak-bapak Far\'ah 01 Senin',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '322',
                'nama_halaqah'      => 'Ibu-ibu Far\'ah 02 Kamis',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '331',
                'nama_halaqah'      => 'Far\'ah Karang Sembung',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '401',
                'nama_halaqah'      => 'Awamin & Mudzakkir',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '402',
                'nama_halaqah'      => 'Ghilman',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '403',
                'nama_halaqah'      => 'Fityan',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '411',
                'nama_halaqah'      => 'Far\'ah 01 a',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '412',
                'nama_halaqah'      => 'Far\'ah 01 b',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '421',
                'nama_halaqah'      => 'Far\'ah 02',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '431',
                'nama_halaqah'      => 'Far\'ah 03 a',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '432',
                'nama_halaqah'      => 'Far\'ah 03 b',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '441',
                'nama_halaqah'      => 'Far\'ah 04',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '451',
                'nama_halaqah'      => 'Far\'ah 05',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '511',
                'nama_halaqah'      => 'Cimahi',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '512',
                'nama_halaqah'      => 'Tanjungsari',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '513',
                'nama_halaqah'      => 'Ghilman Fityan',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '611',
                'nama_halaqah'      => 'Awamin & Mudzakkir',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '612',
                'nama_halaqah'      => 'Bapak-bapak Sepuh',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '613',
                'nama_halaqah'      => 'Ibu-ibu a',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '614',
                'nama_halaqah'      => 'Ghilman',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '615',
                'nama_halaqah'      => 'Ikhwan dan Bapak-bapak Muda',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_halaqah'      => '616',
                'nama_halaqah'      => 'Ibu-ibu b',
                'created_at'        => now(),
                'updated_at'        => now(),
            ]
        ]);

        DB::table('master_mudzakkirs')->insert([
            [
                'kode_mudzakkir'    => 'R',
                'nama_mudzakkir'    => 'RIDWAN',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'T',
                'nama_mudzakkir'    => 'TOPIK',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'F',
                'nama_mudzakkir'    => 'FAUZY.MA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Tj',
                'nama_mudzakkir'    => 'M.TIJAR',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Im',
                'nama_mudzakkir'    => 'IMAM FAHRUROZI',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Nd',
                'nama_mudzakkir'    => 'NURDIN',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'S',
                'nama_mudzakkir'    => 'SALMAN',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'M',
                'nama_mudzakkir'    => 'MAS\'UD',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'I',
                'nama_mudzakkir'    => 'IQBAL',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Nd',
                'nama_mudzakkir'    => 'NURDIN',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Hm',
                'nama_mudzakkir'    => 'HASYIM',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'LA',
                'nama_mudzakkir'    => 'LUTFI ARDIAN',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'YF',
                'nama_mudzakkir'    => 'YUSUF FAIZ AL YAZID',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'L',
                'nama_mudzakkir'    => 'LUKMAN',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Hs',
                'nama_mudzakkir'    => 'HASAN SYUKUR',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Nh',
                'nama_mudzakkir'    => 'NURALIM HIDAYAT',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'As',
                'nama_mudzakkir'    => 'AZHARI SUJUD',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'FS',
                'nama_mudzakkir'    => 'FAUZY SYA\'BANI',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'RR',
                'nama_mudzakkir'    => 'RIJALUDIN RABBANI',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Hs',
                'nama_mudzakkir'    => 'HUSEN',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Sh',
                'nama_mudzakkir'    => 'SHOLIHIN',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Ab',
                'nama_mudzakkir'    => 'AHMAD BAYAN',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'As',
                'nama_mudzakkir'    => 'ABDUL SYUKUR',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Kh',
                'nama_mudzakkir'    => 'KHOERUNIZAM',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Js',
                'nama_mudzakkir'    => 'JAFAR SIDIK',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Ay',
                'nama_mudzakkir'    => 'AYUB AL YAZID',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Ans',
                'nama_mudzakkir'    => 'ANSHORUDDIN',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Al',
                'nama_mudzakkir'    => 'ALI',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Nk',
                'nama_mudzakkir'    => 'NURKHOLIK',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Yh',
                'nama_mudzakkir'    => 'YUSUF HANIFAH',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Ah',
                'nama_mudzakkir'    => 'AHMAD SHOLEH',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Mh',
                'nama_mudzakkir'    => 'MUSHAB',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Nh',
                'nama_mudzakkir'    => 'NURUL HADI',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Mk',
                'nama_mudzakkir'    => 'MUKHLIS',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Hd',
                'nama_mudzakkir'    => 'HIDAYAT AL GHIFARI',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Rj',
                'nama_mudzakkir'    => 'RIJAL',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Rf',
                'nama_mudzakkir'    => 'RIFKI',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'H',
                'nama_mudzakkir'    => 'HANIF',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Is',
                'nama_mudzakkir'    => 'ISMAIL',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Ab',
                'nama_mudzakkir'    => 'ABDILLAH',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Aw',
                'nama_mudzakkir'    => 'ANWAR',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Ar',
                'nama_mudzakkir'    => 'ABDURRAHMAN AR',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'IF',
                'nama_mudzakkir'    => 'ISFANI',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Sh',
                'nama_mudzakkir'    => 'SILMI HANIF',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Nf',
                'nama_mudzakkir'    => 'NISA FAUZYA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Mi',
                'nama_mudzakkir'    => 'MAOLI',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Sr',
                'nama_mudzakkir'    => 'SHOFIATURRAHMANIA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Sm',
                'nama_mudzakkir'    => 'SITI MASITHOH',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Ur',
                'nama_mudzakkir'    => 'ULI RAHMA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Ts',
                'nama_mudzakkir'    => 'TSABITSAH',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Sy',
                'nama_mudzakkir'    => 'SYIFA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Kh',
                'nama_mudzakkir'    => 'KHOERUNNISA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Nh',
                'nama_mudzakkir'    => 'NURDINAH',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'At',
                'nama_mudzakkir'    => 'AENANI TAZRIYAH',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Um',
                'nama_mudzakkir'    => 'UMMU AIMAN',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Fd',
                'nama_mudzakkir'    => 'FAADIYAH',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Ft',
                'nama_mudzakkir'    => 'FATIH',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Nd',
                'nama_mudzakkir'    => 'NURFADILAH',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Mq',
                'nama_mudzakkir'    => 'MARIA AL QIBTYA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'H',
                'nama_mudzakkir'    => 'HANIFAH',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Sr',
                'nama_mudzakkir'    => 'SARAH',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_mudzakkir'    => 'Rh',
                'nama_mudzakkir'    => 'RAHMI',
                'created_at'        => now(),
                'updated_at'        => now(),
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
