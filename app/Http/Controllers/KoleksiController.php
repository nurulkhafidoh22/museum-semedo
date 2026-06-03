<?php

namespace App\Http\Controllers;

class KoleksiController extends Controller
{
    private function getKoleksiData()
    {
        return [

            'rahangbawah-badak' => [
                'judul' => 'Rahang Bawah Badak Purba',
                'gambar' => '/images/rahangbawah-badak.jpg',
                'kategori' => 'paleontologi',
                'deskripsi' => 'Fosil rahang bawah badak purba yang menjadi bukti keberadaan mamalia besar pemakan tumbuhan di kawasan Semedo.',

                'periode' => 'Pleistosen',
                'usia' => '± 700.000 - 1 juta tahun',
                'lokasi' => 'Semedo, Kabupaten Tegal',

                'deskripsi_lengkap_1' => 'Rahang bawah ini merupakan bagian dari badak purba yang hidup di wilayah Semedo pada masa Pleistosen. Struktur rahang dan giginya memberikan informasi mengenai pola makan serta karakteristik biologis hewan tersebut.',
                'deskripsi_lengkap_2' => 'Fosil badak purba termasuk temuan penting dalam penelitian paleontologi karena membantu mengidentifikasi jenis fauna yang pernah hidup di kawasan Semedo dan hubungannya dengan lingkungan purba setempat.',
                'konteks' => 'Badak purba merupakan salah satu mamalia besar yang menjadi bagian dari ekosistem Semedo pada masa Pleistosen. Temuan rahang bawah ini memperkaya informasi mengenai keberagaman fauna yang hidup di kawasan tersebut sebelum masa modern.',
            ],

            'gading-gajah' => [
                'judul' => 'Gading Gajah Purba',
                'gambar' => '/images/gading-gajah.jpg',
                'kategori' => 'paleontologi',
                'deskripsi' => 'Fragmen gading gajah purba yang menjadi bukti keberadaan mamalia besar di kawasan Semedo pada masa prasejarah.',

                'periode' => 'Pleistosen',
                'usia' => '± 700.000 - 1,5 juta tahun',
                'lokasi' => 'Semedo, Kabupaten Tegal',

                'deskripsi_lengkap_1' => 'Fragmen gading ini merupakan bagian dari gajah purba yang hidup di kawasan Semedo pada masa Pleistosen. Fosil tersebut ditemukan bersama endapan sedimen yang mengandung berbagai sisa fauna purba lainnya.',
                'deskripsi_lengkap_2' => 'Temuan ini menunjukkan bahwa wilayah Semedo pernah menjadi habitat bagi mamalia berukuran besar yang berkembang di lingkungan tropis purba. Keberadaan fosil gading memberikan informasi penting mengenai keanekaragaman fauna yang hidup pada masa tersebut.',
                'konteks' => 'Pada masa Pleistosen, wilayah Semedo dihuni oleh berbagai spesies mamalia besar. Fosil gading gajah menjadi salah satu bukti penting yang membantu para peneliti merekonstruksi kondisi lingkungan dan kehidupan fauna purba di Nusantara.',
            ],

            'kura-darat' => [
                'judul' => 'Kura-Kura Darat Raksasa',
                'gambar' => '/images/kura-darat.jpg',
                'kategori' => 'paleontologi',
                'deskripsi' => 'Fosil kura-kura darat raksasa yang menunjukkan keberadaan reptil berukuran besar di kawasan Semedo pada masa prasejarah.',

                'periode' => 'Pleistosen',
                'usia' => '± 700.000 - 1 juta tahun',
                'lokasi' => 'Semedo, Kabupaten Tegal',

                'deskripsi_lengkap_1' => 'Fosil ini berasal dari kura-kura darat raksasa genus Megalochelys yang pernah hidup di kawasan Asia Tenggara. Ukurannya jauh lebih besar dibandingkan kura-kura darat yang hidup saat ini.',
                'deskripsi_lengkap_2' => 'Temuan fosil Megalochelys memberikan informasi penting mengenai keragaman fauna purba yang pernah menghuni kawasan Semedo. Kehadirannya juga menunjukkan adanya lingkungan yang mampu mendukung kehidupan hewan berukuran besar.',
                'konteks' => 'Kura-kura darat raksasa merupakan salah satu fauna yang hidup berdampingan dengan mamalia besar pada masa Pleistosen. Fosil ini membantu para peneliti memahami ekosistem purba yang pernah berkembang di wilayah Semedo.',    
            ],

            'homo-sapiens' => [
                'judul' => 'Homo sapiens Wajak',
                'gambar' => '/images/homo-sapiens.jpg',
                'kategori' => 'paleoantropologi',
                'deskripsi' => 'Replika tengkorak Homo sapiens Wajak yang menjadi salah satu temuan penting manusia modern awal di Indonesia.',

                'periode' => 'Pleistosen Akhir - Holosen Awal',
                'usia' => '± 40.000 - 15.000 tahun',
                'lokasi' => 'Wajak, Tulungagung',

                'deskripsi_lengkap_1' => 'Homo sapiens Wajak merupakan salah satu temuan manusia purba penting di Indonesia yang ditemukan di daerah Wajak, Tulungagung, Jawa Timur. Fosil ini termasuk dalam kelompok Homo sapiens atau manusia modern awal.',
                'deskripsi_lengkap_2' => 'Replika tengkorak dan rahang atas ini digunakan sebagai media edukasi untuk memperkenalkan perkembangan manusia modern di Nusantara. Struktur tengkoraknya menunjukkan ciri yang lebih mendekati manusia modern dibandingkan Homo erectus.',
                'konteks' => 'Penemuan manusia Wajak menjadi salah satu bukti penting perkembangan Homo sapiens di Asia Tenggara. Temuan ini membantu para peneliti memahami proses migrasi dan evolusi manusia modern di wilayah Nusantara pada akhir zaman es.',
            ],

            'lingkungan-purba' => [
                'judul' => 'Tengkorak Parietal',
                'gambar' => '/images/tengkorak-parietal.jpg',
                'kategori' => 'paleoantropologi',
                'deskripsi' => 'Fragmen tengkorak parietal Homo erectus yang ditemukan di kawasan Semedo dan menjadi bukti keberadaan manusia purba di wilayah tersebut.',

                'periode' => 'Pleistosen Tengah',
                'usia' => '± 700.000 tahun',
                'lokasi' => 'Semedo, Kabupaten Tegal',

                'deskripsi_lengkap_1' => 'Fragmen tengkorak ini merupakan bagian parietal dari Homo erectus Semedo 1 yang ditemukan di kawasan Semedo, Kabupaten Tegal. Temuan ini menjadi salah satu bukti penting keberadaan manusia purba di wilayah Jawa pada masa Pleistosen.',
                'deskripsi_lengkap_2' => 'Bagian parietal merupakan area sisi atas tengkorak yang membantu peneliti mempelajari bentuk kepala dan perkembangan kapasitas otak manusia purba. Fosil ini memberikan informasi penting mengenai evolusi Homo erectus di Nusantara.',
                'konteks' => 'Penemuan fragmen tengkorak Homo erectus di Semedo memperkuat posisi kawasan tersebut sebagai salah satu situs penting penelitian prasejarah di Indonesia. Temuan ini membantu merekonstruksi kehidupan manusia purba yang pernah berkembang di Pulau Jawa sekitar ratusan ribu tahun lalu.',
            ],

            'rahang-sangiran' => [
                'judul' => 'Rahang Sangiran',
                'gambar' => '/images/rahang-sangiran.jpg',
                'kategori' => 'paleoantropologi',
                'deskripsi' => 'Replika fragmen rahang manusia purba dari kawasan Sangiran yang menjadi salah satu situs paleoantropologi penting di Indonesia.',

                'periode' => 'Pleistosen Tengah',
                'usia' => '± 700.000 tahun',
                'lokasi' => 'Sangiran, Jawa Tengah',

                'deskripsi_lengkap_1' => 'Fragmen rahang ini merupakan replika bagian fosil manusia purba yang ditemukan di kawasan Sangiran. Struktur rahang dan susunan gigi memberikan informasi penting mengenai karakteristik biologis Homo erectus yang hidup pada masa Pleistosen.',
                'deskripsi_lengkap_2' => 'Sangiran dikenal sebagai salah satu situs manusia purba terpenting di dunia dan telah menghasilkan berbagai temuan fosil Homo erectus. Replika ini digunakan sebagai media edukasi untuk memperkenalkan perkembangan manusia purba kepada masyarakat.',
                'konteks' => 'Penemuan fosil manusia purba di Sangiran memberikan kontribusi besar terhadap penelitian evolusi manusia di Asia. Kawasan ini menjadi salah satu pusat penelitian paleoantropologi yang diakui secara internasional.',
            ],

            'bola-batu' => [
                'judul' => 'Bola Batu',
                'gambar' => '/images/bola-batu.jpg',
                'kategori' => 'artefak',
                'deskripsi' => 'Artefak batu berbentuk bulat yang digunakan manusia purba untuk aktivitas berburu dan pengolahan bahan.',

                'periode' => 'Paleolitikum',
                'usia' => '± 1,6 juta tahun',
                'lokasi' => 'Semedo, Kabupaten Tegal',

                'deskripsi_lengkap_1' => 'Bola batu merupakan salah satu artefak prasejarah yang ditemukan di berbagai situs manusia purba, termasuk Semedo. Sebagian bola batu terbentuk secara alami, sementara sebagian lainnya diduga dimanfaatkan manusia purba sebagai alat bantu aktivitas sehari-hari.',
                'deskripsi_lengkap_2' => 'Artefak ini diperkirakan digunakan untuk menumbuk, memecah bahan makanan, atau membantu kegiatan berburu. Bentuknya yang sederhana menunjukkan teknologi awal manusia dalam memanfaatkan material batu di lingkungan sekitarnya.',
                'konteks' => 'Bola batu ditemukan di sejumlah situs prasejarah di Indonesia dan menjadi bagian penting dalam kajian teknologi alat batu awal manusia purba. Temuan di Semedo memperlihatkan bahwa kawasan ini pernah menjadi pusat aktivitas manusia prasejarah pada masa Paleolitikum.',
            ],

            'kapak-genggam' => [
                'judul' => 'Kapak Genggam Acheulean',
                'gambar' => '/images/kapak-genggam.jpg',
                'kategori' => 'artefak',
                'deskripsi' => 'Kapak genggam batu tipe Acheulean yang digunakan manusia purba untuk berbagai aktivitas sehari-hari.',

                'periode' => 'Paleolitikum',
                'usia' => '± 900.000 - 1,7 juta tahun',
                'lokasi' => 'Semedo, Kabupaten Tegal',

                'deskripsi_lengkap_1' => 'Kapak genggam Acheulean merupakan salah satu artefak batu penting pada masa Paleolitikum. Artefak ini memiliki bentuk khas menyerupai tetesan air dengan permukaan yang dipangkas pada kedua sisinya.',
                'deskripsi_lengkap_2' => 'Kapak genggam digunakan oleh manusia purba untuk memotong, menggali, menguliti hewan, dan berbagai aktivitas lainnya. Temuan artefak ini menunjukkan perkembangan teknologi alat batu yang semakin maju pada masa Homo erectus.',
                'konteks' => 'Teknologi Acheulean berkembang luas pada masa Paleolitikum dan menjadi salah satu pencapaian penting dalam perkembangan budaya manusia purba. Kehadiran kapak genggam di Semedo memperlihatkan adanya aktivitas manusia purba yang telah mampu membuat alat batu secara lebih sistematis.',
            ],

            'kapak-perimbas' => [
                'judul' => 'Kapak Perimbas',
                'gambar' => '/images/kapak-perimbas.jpg',
                'kategori' => 'artefak',
                'deskripsi' => 'Kapak batu tipe chopper yang digunakan manusia purba untuk memotong, menguliti, dan membantu aktivitas berburu serta meramu.',

                'periode' => 'Paleolitikum',
                'usia' => '± 700.000 - 1,5 juta tahun',
                'lokasi' => 'Semedo, Kabupaten Tegal',

                'deskripsi_lengkap_1' => 'Kapak perimbas atau chopper merupakan salah satu alat batu khas masa Paleolitikum. Artefak ini dibuat dengan teknik pemangkasan pada satu sisi batu sehingga menghasilkan bagian tajam yang dapat digunakan sebagai alat bantu aktivitas sehari-hari manusia purba.',
                'deskripsi_lengkap_2' => 'Kapak perimbas digunakan untuk merimbas kayu, menguliti hewan, memecah tulang, menusuk, dan menggali tanah untuk mencari bahan makanan. Temuan artefak ini menunjukkan perkembangan teknologi sederhana manusia purba pada masa berburu dan meramu.',
                'konteks' => 'Kapak perimbas banyak ditemukan di wilayah Asia Timur dan Asia Tenggara, termasuk Situs Semedo. Artefak ini menjadi salah satu bukti penting aktivitas manusia purba dalam memanfaatkan alat batu untuk bertahan hidup dan beradaptasi dengan lingkungan sekitarnya.',

            ],

        ];
    }

    public function index()
    {
        $kategori = request('kategori');

        $koleksi = $this->getKoleksiData();

        // FILTER KATEGORI
        if ($kategori) {

            $koleksi = array_filter(
                $koleksi,
                fn ($item) => $item['kategori'] === $kategori
            );
        }

        return view('pages.koleksi', [
            'koleksi' => $koleksi,
            'kategori' => $kategori,
        ]);
    }

    public function show(string $slug)
    {
        $koleksi = $this->getKoleksiData();

        abort_if(!isset($koleksi[$slug]), 404);

        $detail = $koleksi[$slug];

        $related = collect($koleksi)
            ->except($slug)
            ->take(3);

        return view('pages.koleksi-detail', [
            ...$detail,
            'related' => $related,
        ]);
    }
}