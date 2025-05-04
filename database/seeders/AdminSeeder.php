<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Alasan;
use App\Models\Produk;
use App\Models\Layanan;
use App\Models\Customer;
use App\Models\Testimoni;
use App\Models\Portofolio;
use Faker\Factory as Faker;
use App\Models\GambarAlasan;
use App\Models\GambarProduk;
use App\Models\Memilih;
use App\Models\PengaturanBanner;
use App\Models\GambarLayanan;
use App\Models\PengaturanWeb;
use Illuminate\Database\Seeder;
use App\Models\GambarPortofolio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        DB::transaction(function () use ($faker) {
            // Membuat Admin
            Admin::create([
                'nama_admin' => 'Ujang',
                'username' => 'damaarsi01',
                'password' => Hash::make('DamaarsiDiHati'),
                'no_telp' => '081231298709',
                'email' => 'damaarsi@gmail.com',
                'role' => 'superadmin',
            ]);
            Admin::create([
                'nama_admin' => 'Udin',
                'username' => 'admin01',
                'password' => Hash::make('DamaarsiDiHati'),
                'no_telp' => '081231298719',
                'email' => 'damaarsi2@gmail.com',
                'role' => 'admin',
            ]);
            Admin::create([
                'nama_admin' => 'Umar',
                'username' => 'admin02',
                'password' => Hash::make('DamaarsiDiHati'),
                'no_telp' => '081231298729',
                'email' => 'damaarsi3@gmail.com',
                'role' => 'nonaktif',
            ]);

            $adminId = Admin::pluck('id')->toArray();
            $produkName = ['Bronze', 'Silver', 'Gold', 'Diamond', 'Rumah Etnic', 'European Clasic House', 'Scandinavian House', 'Industrial House', 'Modern House', 'Cafe'];
            $descProduk = [
                'Produk ini terbuat dari bahan berkualitas tinggi yang cocok untuk penggunaan sehari-hari.',
                'Solusi terbaik untuk Anda yang membutuhkan produk dengan daya tahan lama dan desain menarik.',
                'Produk ini memiliki fitur terbaru yang memudahkan kegiatan Anda sehari-hari.',
                'Dengan desain modern dan elegan, produk ini menjadi pilihan sempurna untuk kebutuhan Anda.',
                'Produk ini sangat direkomendasikan untuk Anda yang menginginkan kualitas dengan harga terjangkau.',
                'Dapatkan kenyamanan maksimal dengan produk kami yang telah teruji kualitasnya.',
                'Solusi cerdas untuk kebutuhan Anda, hadir dengan berbagai fitur menarik dan fungsional.',
                'Produk ini dirancang dengan bahan ramah lingkungan yang mendukung gaya hidup hijau.',
                'Kombinasi sempurna antara keindahan dan fungsi untuk melengkapi kebutuhan ruang Anda.',
                'Produk ini hadir dengan desain yang unik dan eksklusif untuk kesan yang lebih berkelas.'
            ];

            // Membuat Produk Paket
            for ($i = 0; $i < 4; $i++) {
                Produk::create([
                    'id_admin' => $faker->randomElement($adminId),
                    'nama_produk' => $produkName[$i],
                    'tipe' => 'Paket',
                    'deskripsi' => $descProduk[$i],
                    'harga' => $faker->numberBetween(10, 30) * 10000,
                ]);
            }

            // Membuat Produk Desain
            for ($i = 0; $i < 6; $i++) {
                Produk::create([
                    'id_admin' => $faker->randomElement($adminId),
                    'nama_produk' => $produkName[($i + 4)],
                    'tipe' => 'Desain',
                    'deskripsi' => $descProduk[($i + 4)],
                    'harga' => $faker->numberBetween(10, 30) * 10000,
                ]);
            }

            $produkId = Produk::pluck('id')->toArray();

            // Membuat Customer
            for ($i = 0; $i < 23; $i++) {
                Customer::create([
                    'id_produk' => $faker->randomElement($produkId),
                    'nama' => $faker->name(),
                    'email' => $faker->unique()->safeEmail(),
                    'no_telp' => $faker->numerify('08##########'),
                ]);
            }

            $testiImg = ['masjid.jpg', 'museum.jpg', 'tropis.jpg'];
            $testimoniTexts = [
                "Layanan yang sangat memuaskan, saya sangat terbantu dengan produk ini!",
                "Pengalaman yang luar biasa, kualitas produk benar-benar di luar ekspektasi.",
                "Saya sangat puas dengan pelayanan yang diberikan, sangat profesional!"
            ];

            // Membuat Testimoni
            for ($i = 0; $i < 3; $i++) {
                Testimoni::create([
                    'nama' => $faker->name(),
                    'testimoni' => $testimoniTexts[$i],
                    'gambar' => $testiImg[$i],
                ]);
            }

            $ketWeb = ['Whatsapp', 'Email', 'Alamat', 'Instagram'];
            $valWeb = ['08123478990', 'damaarsi@gmail.com', 'Jalan Soekarno-Hatta, Borokulon, Banyuurip, Purworejo', '@damaarsi'];
            // Membuat Pengaturan Web
            for ($i = 0; $i < 4; $i++) {
                PengaturanWeb::create([
                    'keterangan' => $ketWeb[$i],
                    'value' => $valWeb[$i],
                ]);
            }

            $bannerImg = ['banner1.jpg', 'des.jpg', 'banner3.jpg', 'nvdia.jpg', 'sketsa.png'];
            // Membuat Pengaturan Banner
            for ($i = 0; $i < 5; $i++) {
                PengaturanBanner::create([
                    'gambar' => $bannerImg[$i],
                    'title' => 'Judul Banner ' . ($i + 1),
                    'deskripsi' => 'Deskripsi untuk banner ' . ($i + 1),
                    'link' => 'damaarsi.com',
                    'status'  => 'nonaktif'
                ]);
            }


            $namaPesanan = ['The Lowanu Residence', 'Havana Residence', 'Bale Kahyangan', 'Jaten Residence', 'Graha Kenara', 'Arana Residence', 'Bale Yasa Antapura', 'Bestariland', 'Grand Boto', 'Grand Jeruk Sari'];
            $lokasi = ['Puworejo', 'Purworejo', 'Prambanan', 'Solo', 'Purworejo', 'Purworejo', 'Wonosari', 'Purworejo', 'Purworejo', 'Yogyakarta'];
            // Membuat Portofolio
            for ($i = 0; $i < 10; $i++) {
                Portofolio::create([
                    'id_produk' => $faker->randomElement($produkId),
                    'id_admin' => $faker->randomElement($adminId),
                    'tgl_selesai' => $faker->dateTimeBetween('2024-01-01', '2024-12-31')->format('Y-m-d'),
                    'nama' => $namaPesanan[$i],
                    'luas' => $faker->numberBetween(1, 10) * 50,
                    'lokasi' => $lokasi[$i]
                ]);
            }

            $produkData = DB::table('produk')->pluck('id', 'nama_produk')->toArray();

            $gambarProduk = [
                'Bronze1.jpg',
                'Bronze2.jpg',
                'Silver1.jpg',
                'Silver2.jpg',
                'Gold1.jpg',
                'Gold2.jpg',
                'Diamond1.jpg',
                'Diamond2.jpg',
                'Rumah Etnic1.jpg',
                'Rumah Etnic2.jpg',
                'Rumah Etnic3.jpg',
                'European Clasic House1.jpg',
                'European Clasic House2.jpg',
                'Scandinavian House1.jpg',
                'Scandinavian House2.jpg',
                'Scandinavian House3.jpg',
                'Industrial House1.jpg',
                'Industrial House2.jpg',
                'Modern House1.jpg',
                'Modern House2.jpg',
                'Cafe1.jpg',
                'Cafe2.jpg',
                'Cafe3.jpg'
            ];

            // Membuat Gambar Produk
            foreach ($gambarProduk as $fileName) {
                // Mendapatkan kategori produk dari nama file (sebelum angka dan ekstensi)
                $kategori = preg_replace('/[0-9]+\.jpg$/', '', $fileName);

                // Cari id_produk berdasarkan kategori di $produkData
                $id_produk = $produkData[$kategori] ?? null;

                // Jika id_produk ditemukan, buat data di tabel gambar produk
                if ($id_produk) {
                    GambarProduk::create([
                        'id_produk' => $id_produk,
                        'gambar' => $fileName
                    ]);
                }
            }

            $portofolioData = DB::table('portofolio')->pluck('id', 'nama')->toArray();

            $gambarPortofolio = [
                "Arana Residence1.jpg",
                "Bale Kahyangan1.jpg",
                "Bale Kahyangan2.jpg",
                "Bale Kahyangan3.jpg",
                "Bale Yasa Antapura1.jpg",
                "Bale Yasa Antapura2.jpg",
                "Bestariland1.jpg",
                "Bestariland2.jpg",
                "Graha Kenara1.jpg",
                "Grand Boto1.jpg",
                "Grand Boto2.jpg",
                "Grand Jeruk Sari1.jpg",
                "Havana Residence1.jpg",
                "Havana Residence2.jpg",
                "Havana Residence3.jpg",
                "Havana Residence4.jpg",
                "Jaten Residence1.jpg",
                "The Lowanu Residence1.jpg",
                "The Lowanu Residence2.jpg",
                "The Lowanu Residence3.jpg",
                "The Lowanu Residence4.jpg",
                "TheThe Lowanu Residence1.jpg"
            ];
            // Membuat Gambar Portofolio
            foreach ($gambarPortofolio as $fileName) {
                // Mendapatkan kategori produk dari nama file (sebelum angka dan ekstensi)
                $kategori = preg_replace('/[0-9]+\.jpg$/', '', $fileName);

                // Cari id_produk berdasarkan kategori di $portofolioData
                $id_portofolio = $portofolioData[$kategori] ?? null;

                // Jika id_produk ditemukan, buat data di tabel gambar produk
                if ($id_portofolio) {
                    GambarPortofolio::create([
                        'id_portofolio' => $id_portofolio,
                        'gambar' => $fileName
                    ]);
                }
            }

            $titleLayanan = [
                'Layanan Konsultasi',
                'Layanan Pengaduan',
                'Layanan Bantuan',
                'Layanan Informasi',
                'Layanan Customer Service',
                'Layanan Estimasi Biaya'
            ];
    
            for ($i = 0; $i < count($titleLayanan); $i++) {
                Layanan::create([
                    'gambar' => 'smile.png',
                    'title' => $titleLayanan[$i]
                ]);
            }

            $titleMemilih = [
                'Pelayanan cepat',
                'Harga Terjangkau',
                'Kualitas Terjamin',
                'Tim Profesional'
            ];
    
            for ($i = 0; $i < count($titleMemilih); $i++) {
                Memilih::create([
                    'gambar' => 'smile.png',
                    'title' => $titleMemilih[$i]
                ]);
            }
        });
    }
}
