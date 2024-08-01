<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bank;
use App\Models\Agama;
use App\Models\Level;
use App\Models\Shift;
use App\Models\Cabang;
use App\Models\Divisi;
use App\Models\Jurusan;
use App\Models\Sekolah;
use App\Models\Golongan;
use App\Models\Keahlian;
use App\Models\SubDivisi;
use App\Models\Pendidikan;
use Illuminate\Database\Seeder;
use App\Models\StatusPerkawinan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Cabang::insert([
            ["nama" => "Kantor Direksi"],
            ["nama" => "PG Kebon Agung"],
            ["nama" => "PG Trangkil"],
        ]);

        Divisi::insert([
            ["nama" => "TUK"],
            ["nama" => "Tanaman"],
            ["nama" => "Teknik"],
            ["nama" => "Pabrikasi"],
            ["nama" => "QC"],
        ]);

        SubDivisi::insert([
            ["nama" => "Personalia", "divisi_id" => 1],
            ["nama" => "Umum", "divisi_id" => 1],
            ["nama" => "Logistik", "divisi_id" => 1],
            ["nama" => "Gudang Perlengkapan", "divisi_id" => 1],
            ["nama" => "Akunting", "divisi_id" => 1],
            ["nama" => "PDE", "divisi_id" => 1],
            ["nama" => "Bangunan", "divisi_id" => 1],
            ["nama" => "Garasi", "divisi_id" => 1],
            ["nama" => "Bina Wilayah Utara", "divisi_id" => 2],
            ["nama" => "Bina Wilayah Selatan", "divisi_id" => 2],
            ["nama" => "Bina Wilayah Tengah", "divisi_id" => 2],
            ["nama" => "Penerimaan", "divisi_id" => 2],
            ["nama" => "Tebang Angkut", "divisi_id" => 2],
            ["nama" => "Litbang", "divisi_id" => 2],
            ["nama" => "Biro Tanaman", "divisi_id" => 2],
            ["nama" => "Gilingan", "divisi_id" => 3],
            ["nama" => "Ketel", "divisi_id" => 3],
            ["nama" => "Listrik", "divisi_id" => 3],
            ["nama" => "Instrumen", "divisi_id" => 3],
            ["nama" => "Besali", "divisi_id" => 3],
            ["nama" => "Bagian Umum Teknik", "divisi_id" => 3],
            ["nama" => "Pemurnian", "divisi_id" => 4],
            ["nama" => "Penguapan", "divisi_id" => 4],
            ["nama" => "DRK", "divisi_id" => 4],
            ["nama" => "Masakan", "divisi_id" => 4],
            ["nama" => "Puteran", "divisi_id" => 4],
            ["nama" => "Pembungkusan", "divisi_id" => 4],
            ["nama" => "Bagian Umum Pabrikasi", "divisi_id" => 4],
            ["nama" => "Off Farm", "divisi_id" => 5],
            ["nama" => "On Farm", "divisi_id" => 5],
            ["nama" => "Bagian Umum QC", "divisi_id" => 5],
        ]);

        Level::insert([
            ["nama" => "Direktur"],
            ["nama" => "Kadiv"],
            ["nama" => "Pemimpin"],
            ["nama" => "Kasie"],
            ["nama" => "Kasubsie"],
            ["nama" => "Koordinator"],
            ["nama" => "PPL"],
            ["nama" => "Ketua Regu"],
            ["nama" => "Pelaksana"],
        ]);

        Golongan::insert([
            ["nama" => "Tetap"],
            ["nama" => "Kampanye"],
            ["nama" => "PKWTT"],
            ["nama" => "PKWT"],
            ["nama" => "Borongan"],
        ]);

        Pendidikan::insert([
            ["nama" => "Tidak Bersekolah"],
            ["nama" => "SD"],
            ["nama" => "SMP"],
            ["nama" => "SMA"],
            ["nama" => "SMK"],
            ["nama" => "D1"],
            ["nama" => "D2"],
            ["nama" => "D3"],
            ["nama" => "S1"],
        ]);

        Sekolah::insert([
            ["nama" => "Institut Teknik Sepuluh November"],
            ["nama" => "Universitas Brawijaya"],
            ["nama" => "Politeknik LPP Agro"],
            ["nama" => "Universitas Negeri Malang"],
            ["nama" => "Politeknik Negeri Malang"],
            ["nama" => "Institut Nasional Malang"],
            ["nama" => "SMK Negeri 7 Malang"],
            ["nama" => "Lainnya"],
        ]);

        Jurusan::insert([
            ["nama" => "Akuntansi"],
            ["nama" => "Manajemen"],
            ["nama" => "Informatika"],
            ["nama" => "Mesin"],
            ["nama" => "Elektro"],
            ["nama" => "Instrumentasi"],
            ["nama" => "Kimia"],
            ["nama" => "Industri"],
            ["nama" => "Sipil"],
            ["nama" => "Arsitektur"],
            ["nama" => "Fisika"],
            ["nama" => "Matematika"],
            ["nama" => "Psikologi"],
            ["nama" => "Umum"],
        ]);

        Agama::insert([
            ["nama" => "Islam"],
            ["nama" => "Kristen Protestan"],
            ["nama" => "Kristen Katholik"],
            ["nama" => "Hindu"],
            ["nama" => "Buddha"],
            ["nama" => "Konghucu"],
        ]);

        StatusPerkawinan::insert([
            ["nama" => "Lajang"],
            ["nama" => "Menikah"],
            ["nama" => "Cerai"],
        ]);

        Bank::insert([
            ["nama" => "Bank Aceh Syariah"],
            ["nama" => "Bank Aladin Syariah"],
            ["nama" => "Bank Amar Indonesia"],
            ["nama" => "Bank ANZ Indonesia"],
            ["nama" => "Bank Artha Graha Internasional"],
            ["nama" => "Bank Banten"],
            ["nama" => "Bank BCA Syariah"],
            ["nama" => "Bank Bengkulu"],
            ["nama" => "Bank BJB"],
            ["nama" => "Bank BJB Syariah"],
            ["nama" => "Bank BNP Paribas Indonesia"],
            ["nama" => "Bank BPD Bali"],
            ["nama" => "Bank BPD DIY"],
            ["nama" => "Bank BRK Syariah"],
            ["nama" => "Bank BSG"],
            ["nama" => "Bank BTPN"],
            ["nama" => "Bank Bumi Arta"],
            ["nama" => "Bank Capital Indonesia"],
            ["nama" => "Bank Central Asia"],
            ["nama" => "Bank China Construction Bank Indonesia"],
            ["nama" => "Bank CIMB Niaga"],
            ["nama" => "Bank Commonwealth"],
            ["nama" => "Bank CTBC Indonesia"],
            ["nama" => "Bank Danamon Indonesia"],
            ["nama" => "Bank DBS Indonesia"],
            ["nama" => "Bank Digital BCA"],
            ["nama" => "Bank DKI"],
            ["nama" => "Bank Ganesha"],
            ["nama" => "Bank Hana Indonesia"],
            ["nama" => "Bank Hibank Indonesia"],
            ["nama" => "Bank HSBC Indonesia"],
            ["nama" => "Bank IBK Indonesia"],
            ["nama" => "Bank ICBC Indonesia"],
            ["nama" => "Bank Ina Perdana"],
            ["nama" => "Bank Index Selindo"],
            ["nama" => "Bank Jago"],
            ["nama" => "Bank Jambi"],
            ["nama" => "Bank Jasa Jakarta"],
            ["nama" => "Bank Jateng"],
            ["nama" => "Bank Jatim"],
            ["nama" => "Bank J Trust Indonesia"],
            ["nama" => "Bank Kalbar"],
            ["nama" => "Bank Kalsel"],
            ["nama" => "Bank Kalteng"],
            ["nama" => "Bank KB Indonesia"],
            ["nama" => "Bank KB Syariah"],
            ["nama" => "Bank Lampung"],
            ["nama" => "Bank Maluku Malut"],
            ["nama" => "Bank Mandiri"],
            ["nama" => "Bank Mandiri Taspen"],
            ["nama" => "Bank Maspion"],
            ["nama" => "Bank Mayapada Internasional"],
            ["nama" => "Bank Maybank Indonesia"],
            ["nama" => "Bank Mega"],
            ["nama" => "Bank Mega Syariah"],
            ["nama" => "Bank Mestika Dharma"],
            ["nama" => "Bank Mizuho Indonesia"],
            ["nama" => "Bank MNC Internasional"],
            ["nama" => "Bank Muamalat Indonesia"],
            ["nama" => "Bank Multiarta Sentosa"],
            ["nama" => "Bank Nagari"],
            ["nama" => "Bank Nano Syariah"],
            ["nama" => "Bank Nationalnobu"],
            ["nama" => "Bank Negara Indonesia"],
            ["nama" => "Bank Neo Commerce"],
            ["nama" => "Bank NTT"],
            ["nama" => "Bank OCBC Indonesia"],
            ["nama" => "Bank Oke Indonesia"],
            ["nama" => "Bank Papua"],
            ["nama" => "Bank Permata"],
            ["nama" => "Bank QNB Indonesia"],
            ["nama" => "Bank Rakyat Indonesia"],
            ["nama" => "Bank Raya Indonesia"],
            ["nama" => "Bank Resona Perdania"],
            ["nama" => "Bank Sahabat Sampoerna"],
            ["nama" => "Bank SBI Indonesia"],
            ["nama" => "Bank Shinhan Indonesia"],
            ["nama" => "Bank Sinarmas"],
            ["nama" => "Bank Sulselbar"],
            ["nama" => "Bank Sulteng"],
            ["nama" => "Bank Sultra"],
            ["nama" => "Bank Sumsel Babel"],
            ["nama" => "Bank Sumut"],
            ["nama" => "Bank Superbank Indonesia"],
            ["nama" => "Bank Syariah Indonesia"],
            ["nama" => "Bank Tabungan Negara"],
            ["nama" => "Bank UOB Indonesia"],
            ["nama" => "Bank Victoria Syariah"],
            ["nama" => "Bank Woori Saudara"],
        ]);

        Keahlian::insert([
            ["nama" => "Public Speaking"],
            ["nama" => "Bahasa Inggris"],
            ["nama" => "Bahasa Mandarin"],
            ["nama" => "Akuntansi"],
            ["nama" => "Statistik"],
            ["nama" => "Pemrograman Desktop"],
            ["nama" => "Pemrograman Web"],
            ["nama" => "Pemrograman Mobile"],
            ["nama" => "Robotika"],
            ["nama" => "Instalasi Jaringan Fiber Optic"],
            ["nama" => "Instalasi Jaringan Ethernet"],
            ["nama" => "Teknisi Hardware"],
            ["nama" => "Panel Wiring"],
            ["nama" => "Pemrograman PLC"],
            ["nama" => "Pemrograman HMI"],
            ["nama" => "Instalasi Listrik Arus Kuat"],
            ["nama" => "Pengelasan"],
            ["nama" => "Mekanik Mesin"],
            ["nama" => "Pengoperasian Alat Berat"],
            ["nama" => "Konstruksi Bangunan"],
            ["nama" => "Arsitek Bangunan"],
            ["nama" => "Analisa Laboratorium"],
        ]);

        Shift::insert([
            ["nama" => "Harian", "jam_masuk" => "07:00", "jam_pulang" => "15:00", "jam_istirahat" => "11:30", "jam_kembali_setelah_istirahat" => "12:30"],
            ["nama" => "Pagi", "jam_masuk" => "05:00", "jam_pulang" => "13:00", "jam_istirahat" => null, "jam_kembali_setelah_istirahat" => null],
            ["nama" => "Sore", "jam_masuk" => "13:00", "jam_pulang" => "21:00", "jam_istirahat" => null, "jam_kembali_setelah_istirahat" => null],
            ["nama" => "Malam", "jam_masuk" => "21:00", "jam_pulang" => "05:00", "jam_istirahat" => null, "jam_kembali_setelah_istirahat" => null],
        ]);
    }
}
