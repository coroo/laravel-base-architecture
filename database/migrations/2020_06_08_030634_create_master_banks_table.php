<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_banks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_bank');
            $table->string('nama_bank');
            $table->timestamps();
        });

        DB::table('master_banks')->insert([
            [
                'kode_bank'         => '002',
                'nama_bank'         => 'BANK BRI',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '014',
                'nama_bank'         => 'BANK BCA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '008',
                'nama_bank'         => 'BANK MANDIRI',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '009',
                'nama_bank'         => 'BANK BNI',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '427',
                'nama_bank'         => 'BANK BNI SYARIAH',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '451',
                'nama_bank'         => 'BANK SYARIAH MANDIRI (BSM)',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '022',
                'nama_bank'         => 'BANK CIMB NIAGA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '147',
                'nama_bank'         => 'BANK MUAMALAT',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '213',
                'nama_bank'         => 'BANK BTPN',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '547',
                'nama_bank'         => 'BANK BTPN SYARIAH',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '422',
                'nama_bank'         => 'BANK BRI SYARIAH',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '200',
                'nama_bank'         => 'BANK BTN',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '013',
                'nama_bank'         => 'BANK PERMATA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '011',
                'nama_bank'         => 'BANK DANAMON',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '016',
                'nama_bank'         => 'BANK BII MAYBANK',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '426',
                'nama_bank'         => 'BANK MEGA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '153',
                'nama_bank'         => 'BANK SINARMAS',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '950',
                'nama_bank'         => 'BANK COMMONWEALTH',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '028',
                'nama_bank'         => 'BANK OCBC NISP',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '441',
                'nama_bank'         => 'BANK BUKOPIN',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '521',
                'nama_bank'         => 'BANK BUKOPIN SYARIAH',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '536',
                'nama_bank'         => 'BANK BCA SYARIAH',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '026',
                'nama_bank'         => 'BANK LIPPO',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '031',
                'nama_bank'         => 'CITIBANK',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '789',
                'nama_bank'         => 'INDOSAT DOMPETKU',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '911',
                'nama_bank'         => 'TELKOMSEL TCASH',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '110',
                'nama_bank'         => 'BANK JABAR',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '111',
                'nama_bank'         => 'BANK DKI JAKARTA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '112',
                'nama_bank'         => 'BPD DIY (YOGYAKARTA)',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '113',
                'nama_bank'         => 'BANK JATENG (JAWA TENGAH)',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '114',
                'nama_bank'         => 'BANK JATIM (JAWA BARAT)',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '115',
                'nama_bank'         => 'BPD JAMBI',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '116',
                'nama_bank'         => 'BPD ACEH',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '117',
                'nama_bank'         => 'BANK SUMUT',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '118',
                'nama_bank'         => 'BANK NAGARI (BANK SUMBAR)',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '119',
                'nama_bank'         => 'BANK RIAU KEPRI',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '120',
                'nama_bank'         => 'BANK SUMSEL BABEL',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '121',
                'nama_bank'         => 'BANK LAMPUNG',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '122',
                'nama_bank'         => 'BANK KALSEL (BANK KALIMANTAN SELATAN)',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '123',
                'nama_bank'         => 'BANK KALBAR (BANK KALIMANTAN BARAT)',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '124',
                'nama_bank'         => 'BANK KALTIMTARA (BANK KALIMANTAN TIMUR DAN UTARA)',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '125',
                'nama_bank'         => 'BANK KALTENG (BANK KALIMANTAN TENGAH)',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '126',
                'nama_bank'         => 'BANK SULSELBAR (BANK SULAWESI SELATAN DAN BARAT)',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '127',
                'nama_bank'         => 'BANK SULUTGO (BANK SULAWESI UTARA DAN GORONTALO)',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '128',
                'nama_bank'         => 'BANK NTB',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '129',
                'nama_bank'         => 'BANK BPD BALI',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '130',
                'nama_bank'         => 'BANK NTT',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '131',
                'nama_bank'         => 'BANK MALUKU MALUT',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '132',
                'nama_bank'         => 'BANK PAPUA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '133',
                'nama_bank'         => 'BANK BENGKULU',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '134',
                'nama_bank'         => 'BANK SULTENG (BANK SULAWESI TENGAH)',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '135',
                'nama_bank'         => 'BANK SULTRA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '137',
                'nama_bank'         => 'BANK BPD BANTEN',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '003',
                'nama_bank'         => 'BANK EKSPOR INDONESIA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '019',
                'nama_bank'         => 'BANK PANIN',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '517',
                'nama_bank'         => 'BANK PANIN DUBAI SYARIAH',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '020',
                'nama_bank'         => 'BANK ARTA NIAGA KENCANA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '023',
                'nama_bank'         => 'BANK UOB INDONESIA (BANK BUANA INDONESIA)',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '030',
                'nama_bank'         => 'AMERICAN EXPRESS BANK LTD',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '032',
                'nama_bank'         => 'JP. MORGAN CHASE BANK, N.A.',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '033',
                'nama_bank'         => 'BANK OF AMERICA, N.A',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '034',
                'nama_bank'         => 'ING INDONESIA BANK',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '036',
                'nama_bank'         => 'BANK MULTICOR',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '037',
                'nama_bank'         => 'BANK ARTHA GRAHA INTERNASIONAL',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '039',
                'nama_bank'         => 'BANK CREDIT AGRICOLE INDOSUEZ',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '040',
                'nama_bank'         => 'THE BANGKOK BANK COMP. LTD',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '041',
                'nama_bank'         => 'BANK HSBC',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '042',
                'nama_bank'         => 'THE BANK OF TOKYO MITSUBISHI UFJ LTD',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '045',
                'nama_bank'         => 'BANK SUMITOMO MITSUI INDONESIA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '046',
                'nama_bank'         => 'BANK DBS INDONESIA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '047',
                'nama_bank'         => 'BANK RESONA PERDANIA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '048',
                'nama_bank'         => 'BANK MIZUHO INDONESIA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '050',
                'nama_bank'         => 'STANDARD CHARTERED BANK',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '052',
                'nama_bank'         => 'BANK ABN AMRO',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '053',
                'nama_bank'         => 'BANK KEPPEL TATLEE BUANA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '054',
                'nama_bank'         => 'BANK CAPITAL INDONESIA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '057',
                'nama_bank'         => 'BANK BNP PARIBAS INDONESIA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '059',
                'nama_bank'         => 'KOREA EXCHANGE BANK DANAMON',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '060',
                'nama_bank'         => 'RABOBANK INTERNASIONAL INDONESIA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '061',
                'nama_bank'         => 'BANK ANZ INDONESIA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '068',
                'nama_bank'         => 'BANK WOORI SAUDARA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '069',
                'nama_bank'         => 'BANK OF CHINA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '076',
                'nama_bank'         => 'BANK BUMI ARTA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '087',
                'nama_bank'         => 'BANK EKONOMI',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '088',
                'nama_bank'         => 'BANK ANTARDAERAH',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '089',
                'nama_bank'         => 'BANK HAGA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '093',
                'nama_bank'         => 'BANK IFI',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '095',
                'nama_bank'         => 'BANK CENTURY',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '097',
                'nama_bank'         => 'BANK MAYAPADA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '145',
                'nama_bank'         => 'BANK NUSANTARA PARAHYANGAN',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '146',
                'nama_bank'         => 'BANK SWADESI (BANK OF INDIA INDONESIA)',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '151',
                'nama_bank'         => 'BANK MESTIKA DHARMA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '152',
                'nama_bank'         => 'BANK SHINHAN INDONESIA (BANK METRO EXPRESS)',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '157',
                'nama_bank'         => 'BANK MASPION INDONESIA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '159',
                'nama_bank'         => 'BANK HAGAKITA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '161',
                'nama_bank'         => 'BANK GANESHA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '162',
                'nama_bank'         => 'BANK WINDU KENTJANA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '164',
                'nama_bank'         => 'BANK ICBC INDONESIA (HALIM INDONESIA BANK)',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '166',
                'nama_bank'         => 'BANK HARMONI INTERNATIONAL',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '167',
                'nama_bank'         => 'BANK QNB KESAWAN (BANK QNB INDONESIA)',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '212',
                'nama_bank'         => 'BANK HIMPUNAN SAUDARA 1906',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '405',
                'nama_bank'         => 'BANK SWAGUNA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '459',
                'nama_bank'         => 'BANK BISNIS INTERNASIONAL',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '466',
                'nama_bank'         => 'BANK SRI PARTHA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '472',
                'nama_bank'         => 'BANK JASA JAKARTA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '484',
                'nama_bank'         => 'BANK BINTANG MANUNGGAL',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '485',
                'nama_bank'         => 'BANK MNC INTERNASIONAL (BANK BUMIPUTERA)',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '490',
                'nama_bank'         => 'BANK YUDHA BHAKTI',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '491',
                'nama_bank'         => 'BANK MITRANIAGA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '494',
                'nama_bank'         => 'BANK BRI AGRO NIAGA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '498',
                'nama_bank'         => 'BANK SBI INDONESIA (BANK INDOMONEX)',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '501',
                'nama_bank'         => 'BANK ROYAL INDONESIA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '503',
                'nama_bank'         => 'BANK NATIONAL NOBU (BANK ALFINDO)',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '506',
                'nama_bank'         => 'BANK MEGA SYARIAH',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '513',
                'nama_bank'         => 'BANK INA PERDANA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '520',
                'nama_bank'         => 'PRIMA MASTER BANK',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '525',
                'nama_bank'         => 'BANK AKITA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '526',
                'nama_bank'         => 'LIMAN INTERNATIONAL BANK',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '531',
                'nama_bank'         => 'ANGLOMAS INTERNASIONAL BANK',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '523',
                'nama_bank'         => 'BANK SAHABAT SAMPEORNA (BANK DIPO INTERNATIONAL)',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '535',
                'nama_bank'         => 'BANK KESEJAHTERAAN EKONOMI',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '542',
                'nama_bank'         => 'BANK ARTOS INDONESIA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '548',
                'nama_bank'         => 'BANK MULTI ARTA SENTOSA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '553',
                'nama_bank'         => 'BANK MAYORA INDONESIA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '555',
                'nama_bank'         => 'BANK INDEX SELINDO',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '566',
                'nama_bank'         => 'BANK VICTORIA INTERNATIONAL',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '558',
                'nama_bank'         => 'BANK EKSEKUTIF',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '559',
                'nama_bank'         => 'CENTRATAMA NASIONAL BANK',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '562',
                'nama_bank'         => 'BANK FAMA INTERNASIONAL',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '564',
                'nama_bank'         => 'BANK MANDIRI TASPEN POS (BANK SINAR HARAPAN BALI)',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '567',
                'nama_bank'         => 'BANK HARDA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '945',
                'nama_bank'         => 'BANK AGRIS (BANK FINCONESIA)',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '946',
                'nama_bank'         => 'BANK MERINCORP',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '947',
                'nama_bank'         => 'BANK MAYBANK INDOCORP',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '948',
                'nama_bank'         => 'BANK OCBC – INDONESIA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '949',
                'nama_bank'         => 'BANK CTBC (CHINA TRUST) INDONESIA',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '425',
                'nama_bank'         => 'BANK BJB SYARIAH',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'kode_bank'         => '688',
                'nama_bank'         => 'BPR KS (KARYAJATNIKA SEDAYA)',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_banks');
    }
}
