<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            [ 1, 'Kabupaten Aceh Barat', 'Meulaboh', 'MBO'],
            [ 1, 'Kabupaten Aceh Barat Daya', 'Blangpidie', 'BPD'],
            [ 1, 'Kabupaten Aceh Besar', 'Jantho', 'JTH'],
            [ 1, 'Kabupaten Aceh Jaya', 'Calang', 'CAG'],
            [ 1, 'Kabupaten Aceh Selatan', 'Tapak Tuan', 'TTN'],
            [ 1, 'Kabupaten Aceh Singkil', 'Singkil', 'SKL'],
            [ 1, 'Kabupaten Aceh Tamiang', 'Karang Baru', 'KRB'],
            [ 1, 'Kabupaten Aceh Tengah', 'Takengon', 'TKN'],
            [ 1, 'Kabupaten Aceh Tenggara', 'Kutacane', 'KTN'],
            [ 1, 'Kabupaten Aceh Timur', 'Langsa', 'LGS'],
            [ 1, 'Kabupaten Aceh Utara', 'Lhoksukon', 'LSK'],
            [ 1, 'Kabupaten Bener Meriah', 'Simpang Tiga Redelong', 'STR'],
            [ 1, 'Kabupaten Bireuen', 'Bireuen', 'BIR'],
            [ 1, 'Kabupaten Gayo Lues', 'Blangkejeren', 'BKJ'],
            [ 1, 'Kabupaten Nagan Raya', 'Suka Makmue', 'SKM'],
            [ 1, 'Kabupaten Pidie', 'Sigli', 'SGI'],
            [ 1, 'Kabupaten Pidie Jaya', 'Meureundu', 'MRN'],
            [ 1, 'Kabupaten Simeulue', 'Sinabang', 'SNB'],
            [ 1, 'Kota Banda Aceh', 'Banda Aceh', 'BNA'],
            [ 1, 'Kota Langsa', 'Langsa', 'LGS'],
            [ 1, 'Kota Lhokseumawe', 'Lhokseumawe', 'LSM'],
            [ 1, 'Kota Sabang', 'Sabang', 'SAB'],
            [ 1, 'Kota Subulussalam', 'Subulussalam', 'SUS'],
            [ 2, 'Kabupaten Asahan', 'Kisaran', 'KIS'],
            [ 2, 'Kabupaten Batu Bara', 'Lima Puluh', 'LMP'],
            [ 2, 'Kabupaten Dairi', 'Sidikalang', 'SDK'],
            [ 2, 'Kabupaten Deli Serdang', 'Lubuk Pakam', 'LBP'],
            [ 2, 'Kabupaten Humbang Hasundutan', 'Dolok Sanggul', 'DLS'],
            [ 2, 'Kabupaten Karo', 'Kabanjahe', 'KBJ'],
            [ 2, 'Kabupaten Labuhanbatu', 'Rantau Prapat', 'RAP'],
            [ 2, 'Kabupaten Labuhanbatu Selatan', 'Kota Pinang', 'KPI'],
            [ 2, 'Kabupaten Labuhanbatu Utara', 'Aek Kanopan', 'AKK'],
            [ 2, 'Kabupaten Langkat', 'Stabat', 'STB'],
            [ 2, 'Kabupaten Mandailing Natal', 'Panyabungan', 'PYB'],
            [ 2, 'Kabupaten Nias', 'Gunungsitoli', 'GST'],
            [ 2, 'Kabupaten Nias Barat', 'Lahomi', 'LHM'],
            [ 2, 'Kabupaten Nias Selatan', 'Teluk Dalam', 'TLD'],
            [ 2, 'Kabupaten Nias Utara', 'Lotu', 'LTU'],
            [ 2, 'Kabupaten Padang Lawas', 'Sibuhuan', 'SBH'],
            [ 2, 'Kabupaten Padang Lawas Utara', 'Gunung Tua', 'GNT'],
            [ 2, 'Kabupaten Pakpak Bharat', 'Salak', 'SAL'],
            [ 2, 'Kabupaten Samosir', 'Pangururan', 'PRR'],
            [ 2, 'Kabupaten Serdang Bedagai', 'Sei Rampah', 'SRH'],
            [ 2, 'Kabupaten Simalungun', 'Pematang Siantar', 'PMS'],
            [ 2, 'Kabupaten Tapanuli Selatan', 'Padang Sidempuan', 'PSP'],
            [ 2, 'Kabupaten Tapanuli Tengah', 'Sibolga', 'SBG'],
            [ 2, 'Kabupaten Tapanuli Utara', 'Tarutung', 'TRT'],
            [ 2, 'Kabupaten Toba Samosir', 'Balige', 'BLG'],
            [ 2, 'Kota Binjai', 'Binjai', 'BNJ'],
            [ 2, 'Kota Gunungsitoli', 'Gunungsitoli', 'GST'],
            [ 2, 'Kota Medan', 'Medan', 'MDN'],
            [ 2, 'Kota Padang Sidempuan', 'Padang Sidempuan', 'PSP'],
            [ 2, 'Kota Pematangsiantar', 'Pematangsiantar', 'PMS'],
            [ 2, 'Kota Sibolga', 'Sibolga', 'SBG'],
            [ 2, 'Kota Tanjung Balai', 'Tanjung Balai', 'TJB'],
            [ 2, 'Kota Tebing Tinggi', 'Tebing Tinggi', 'TBT'],
            [ 3, 'Kabupaten Agam', 'Lubuk Basung', 'LBB'],
            [ 3, 'Kabupaten Dharmasraya', 'Pulau Punjung', 'PLJ'],
            [ 3, 'Kabupaten Kepulauan Mentawai', 'Tuapejat', 'TPT'],
            [ 3, 'Kabupaten Lima Puluh Kota', 'Sarilamak', 'SRK'],
            [ 3, 'Kabupaten Padang Pariaman', 'Nagari Parit Malintang', 'NPM'],
            [ 3, 'Kabupaten Pasaman', 'Lubuk Sikaping', 'LBS'],
            [ 3, 'Kabupaten Pasaman Barat', 'Simpang Empat', 'SPE'],
            [ 3, 'Kabupaten Pesisir Selatan', 'Painan', 'PNN'],
            [ 3, 'Kabupaten Sijunjung [ah Lunto Sijunjung)', 'Muaro Sijunjung', 'MRJ'],
            [ 3, 'Kabupaten Solok', 'Arosuka', 'ARS'],
            [ 3, 'Kabupaten Solok Selatan', 'Padang Aro', 'PDA'],
            [ 3, 'Kabupaten Tanah Datar', 'Batusangkar', 'BSK'],
            [ 3, 'Kota Bukittinggi', 'Bukittinggi', 'BKT'],
            [ 3, 'Kota Padang', 'Padang', 'PAD'],
            [ 3, 'Kota Padang Panjang', 'Padang Panjang', 'PDP'],
            [ 3, 'Kota Pariaman', 'Pariaman', 'PMN'],
            [ 3, 'Kota Payakumbuh', 'Payakumbuh', 'PYH'],
            [ 3, 'Kota Sawahlunto', 'Sawahlunto', 'SWL'],
            [ 3, 'Kota Solok', 'Solok', 'SLK'],
            [ 4, 'Kabupaten Bengkalis', 'Bengkalis', 'BLS'],
            [ 4, 'Kabupaten Indragiri Hilir', 'Tembilahan', 'TBH'],
            [ 4, 'Kabupaten Indragiri Hulu', 'Rengat', 'RGT'],
            [ 4, 'Kabupaten Kampar', 'Bangkinang', 'BKN'],
            [ 4, 'Kabupaten Kepulauan Meranti', 'Tebing Tinggi', 'TTG'],
            [ 4, 'Kabupaten Kuantan Singingi', 'Teluk Kuantan', 'TLK'],
            [ 4, 'Kabupaten Pelalawan', 'Pangkalan Kerinci', 'PKK'],
            [ 4, 'Kabupaten Rokan Hilir', 'Ujung Tanjung', 'UJT'],
            [ 4, 'Kabupaten Rokan Hulu', 'Pasir Pengarairan', 'PRP'],
            [ 4, 'Kabupaten Siak', 'Siak Sriindrapura', 'SAK'],
            [ 4, 'Kota Dumai', 'Dumai', 'DUM'],
            [ 4, 'Kota Pekanbaru', 'Pekanbaru', 'PBR'],
            [ 5, 'Kabupaten Batanghari', 'Muara Bulian', 'MBN'],
            [ 5, 'Kabupaten Bungo', 'Muara Bungo', 'MRB'],
            [ 5, 'Kabupaten Kerinci', 'Sungai Penuh', 'SPN'],
            [ 5, 'Kabupaten Merangin', 'Bangko', 'BKO'],
            [ 5, 'Kabupaten Muaro Jambi', 'Sengeti', 'SNT'],
            [ 5, 'Kabupaten Sarolangun', 'Sarolangun', 'SRL'],
            [ 5, 'Kabupaten Tanjung Jabung Barat', 'Kuala Tungkal', 'KLT'],
            [ 5, 'Kabupaten Tanjung Jabung Timur', 'Muara Sabak', 'MSK'],
            [ 5, 'Kabupaten Tebo', 'Muara Tebo', 'MRT'],
            [ 5, 'Kota Jambi', 'Jambi', 'JMB'],
            [ 5, 'Kota Sungai Penuh', 'Sungai Penuh', 'SPN'],
            [ 6, 'Kabupaten Banyuasin', 'Pangkalan Balai', 'PKB'],
            [ 6, 'Kabupaten Empat Lawang', 'Tebing Tinggi', 'TBG'],
            [ 6, 'Kabupaten Lahat', 'Lahat', 'LHT'],
            [ 6, 'Kabupaten Muara Enim', 'Muara Enim', 'MRE'],
            [ 6, 'Kabupaten Musi Banyuasin', 'Sekayu', 'SKY'],
            [ 6, 'Kabupaten Musi Rawas', 'Muarabeliti', 'MBL'],
            [ 6, 'Kabupaten Musi Rawas Utara', 'Rupit', 'RPT'],
            [ 6, 'Kabupaten Ogan Ilir', 'Indralaya', 'IDL'],
            [ 6, 'Kabupaten Ogan Komering Ilir', 'Kayu Agung', 'KAG'],
            [ 6, 'Kabupaten Ogan Komering Ulu', 'Baturaja', 'BTA'],
            [ 6, 'Kabupaten Ogan Komering Ulu Selatan [Selatan)', 'Muaradua', 'MRD'],
            [ 6, 'Kabupaten Ogan Komering Ulu Timur [Timur)', 'Martapura', 'MPR'],
            [ 6, 'Kabupaten Penukal Abab Lematang Ilir', 'Talang Ubi', 'TLB'],
            [ 6, 'Kota Lubuk Linggau', 'Lubuk Linggau', 'LLG'],
            [ 6, 'Kota Pagar Alam', 'Pagar Alam', 'PGA'],
            [ 6, 'Kota Palembang', 'Pelembang', 'PLG'],
            [ 6, 'Kota Prabumulih', 'Prabumulih', 'PBM'],
            [ 7, 'Kabupaten Bengkulu Selatan', 'Manna', 'MNA'],
            [ 7, 'Kabupaten Bengkulu Tengah', 'Karang Tinggi', 'KRT'],
            [ 7, 'Kabupaten Bengkulu Utara', 'Arga Makmur', 'AGM'],
            [ 7, 'Kabupaten Kaur', 'Bintuhan', 'BHN'],
            [ 7, 'Kabupaten Kepahiang', 'Kepahiang', 'KPH'],
            [ 7, 'Kabupaten Lebong', 'Tubei', 'TUB'],
            [ 7, 'Kabupaten Muko Muko', 'Mukomuko', 'MKM'],
            [ 7, 'Kabupaten Rejang Lebong', 'Curup', 'CRP'],
            [ 7, 'Kabupaten Seluma', 'Tais', 'TAS'],
            [ 7, 'Kota Bengkulu', 'Bengkulu', 'BGL'],
            [ 8, 'Kabupaten Lampung Barat', 'Liwa', 'LIW'],
            [ 8, 'Kabupaten Lampung Selatan', 'Kalianda', 'KLA'],
            [ 8, 'Kabupaten Lampung Tengah', 'Gunung Sugih', 'GNS'],
            [ 8, 'Kabupaten Lampung Timur', 'Sukadana', 'SDN'],
            [ 8, 'Kabupaten Lampung Utara', 'Kotabumi', 'KTB'],
            [ 8, 'Kabupaten Mesuji', 'Mesuji', 'MSJ'],
            [ 8, 'Kabupaten Pesawaran', 'Gedong Tataan', 'GDT'],
            [ 8, 'Kabupaten Pesisir Barat', 'Krui', 'KRU'],
            [ 8, 'Kabupaten Pringsewu', 'Pringsewu', 'PRW'],
            [ 8, 'Kabupaten Tanggamus', 'Kota Agung', 'KOT'],
            [ 8, 'Kabupaten Tulang Bawang', 'Menggala', 'MGL'],
            [ 8, 'Kabupaten Tulang Bawang Barat', 'Tulang Bawang Tengah', 'TWG'],
            [ 8, 'Kabupaten Way Kanan', 'Blambangan Umpu', 'BBU'],
            [ 8, 'Kota Bandar Lampung', 'Bandar Lampung', 'BDL'],
            [ 8, 'Kota Metro', 'Metro', 'MET'],
            [ 9, 'Kabupaten Bangka', 'Sungai Liat', 'SGL'],
            [ 9, 'Kabupaten Bangka Barat', 'Mentok', 'MTK'],
            [ 9, 'Kabupaten Bangka Selatan', 'Toboali', 'TBL'],
            [ 9, 'Kabupaten Bangka Tengah', 'Koba', 'KBA'],
            [ 9, 'Kabupaten Belitung', 'Tanjung Pandan', 'TDN'],
            [ 9, 'Kabupaten Belitung Timur', 'Manggar', 'MGR'],
            [ 9, 'Kota Pangkal Pinang', 'Pangkal Pinang', 'PGP'],
            [ 10, 'Kabupaten Bintan', 'Bandar Seri Bentan', 'BSB'],
            [ 10, 'Kabupaten Karimun', 'Tanjung Balai Karimun', 'TBK'],
            [ 10, 'Kabupaten Kepulauan Anambas', 'Tarempa', 'TRP'],
            [ 10, 'Kabupaten Lingga', 'Daik Lingga', 'DKL'],
            [ 10, 'Kabupaten Natuna', 'Ranai', 'RAN'],
            [ 10, 'Kota Batam', 'Batam', 'BTM'],
            [ 10, 'Kota Tanjung Pinang', 'Tanjung Pinang', 'TPG'],
            [ 11, 'Kabupaten Adm. Kepulauan Seribu', 'Kepulauan Seribu Utara', 'KSU'],
            [ 11, 'Kota Jakarta Barat', 'Jakarta Barat', 'GGP'],
            [ 11, 'Kota Jakarta Pusat', 'Jakarta Pusat', 'TNA'],
            [ 11, 'Kota Jakarta Selatan', 'Jakarta Selatan', 'KYB'],
            [ 11, 'Kota Jakarta Timur', 'Jakarta Timur', 'CKG'],
            [ 11, 'Kota Jakarta Utara', 'Jakarta Utara', 'TJP'],
            [ 12, 'Kabupaten Bandung', 'Bandung', 'SOR'],
            [ 12, 'Kabupaten Bandung Barat', 'Bandung Barat', 'NPH'],
            [ 12, 'Kabupaten Bekasi', 'Bekasi', 'CKR'],
            [ 12, 'Kabupaten Bogor', 'Cibinong', 'CBI'],
            [ 12, 'Kabupaten Ciamis', 'Ciamis', 'CMS'],
            [ 12, 'Kabupaten Cianjur', 'Cianjur', 'CJR'],
            [ 12, 'Kabupaten Cirebon', 'Sumber', 'SBR'],
            [ 12, 'Kabupaten Garut', 'Garut', 'GRT'],
            [ 12, 'Kabupaten Indramayu', 'Indramayu', 'IDM'],
            [ 12, 'Kabupaten Karawang', 'Karawang', 'KWG'],
            [ 12, 'Kabupaten Kuningan', 'Kuningan', 'KNG'],
            [ 12, 'Kabupaten Majalengka', 'Majalengka', 'MJL'],
            [ 12, 'Kabupaten Pangandaran', 'Parigi', 'PAG'],
            [ 12, 'Kabupaten Purwakarta', 'Purwakarta', 'PWK'],
            [ 12, 'Kabupaten Subang', 'Subang', 'SNG'],
            [ 12, 'Kabupaten Sukabumi', 'Sukabumi', 'SBM'],
            [ 12, 'Kabupaten Sumedang', 'Sumedang', 'SMD'],
            [ 12, 'Kabupaten Tasikmalaya', 'Singaparna', 'SPA'],
            [ 12, 'Kota Bandung', 'Bandung', 'BDG'],
            [ 12, 'Kota Banjar', 'Banjar', 'BJR'],
            [ 12, 'Kota Bekasi', 'Bekasi', 'BKS'],
            [ 12, 'Kota Bogor', 'Bogor', 'BGR'],
            [ 12, 'Kota Cimahi', 'Cimahi', 'CMH'],
            [ 12, 'Kota Cirebon', 'Cirebon', 'CBN'],
            [ 12, 'Kota Depok', 'Depok', 'DPK'],
            [ 12, 'Kota Sukabumi', 'Sukabumi', 'SKB'],
            [ 12, 'Kota Tasikmalaya', 'Tasikmalaya', 'TSM'],
            [ 13, 'Kabupaten Banjarnegara', 'Banjarnegara', 'BNR'],
            [ 13, 'Kabupaten Banyumas', 'Purwokerto', 'PWT'],
            [ 13, 'Kabupaten Batang', 'Batang', 'BTG'],
            [ 13, 'Kabupaten Blora', 'Blora', 'BLA'],
            [ 13, 'Kabupaten Boyolali', 'Boyolali', 'BYL'],
            [ 13, 'Kabupaten Brebes', 'Brebes', 'BBS'],
            [ 13, 'Kabupaten Cilacap', 'Cilacap', 'CLP'],
            [ 13, 'Kabupaten Demak', 'Demak', 'DMK'],
            [ 13, 'Kabupaten Grobogan', 'Purwodadi', 'PWD'],
            [ 13, 'Kabupaten Jepara', 'Jepara', 'JPA'],
            [ 13, 'Kabupaten Karanganyar', 'Karanganyar', 'KRG'],
            [ 13, 'Kabupaten Kebumen', 'Kebumen', 'KBM'],
            [ 13, 'Kabupaten Kendal', 'Kendal', 'KDL'],
            [ 13, 'Kabupaten Klaten', 'Klaten', 'KLN'],
            [ 13, 'Kabupaten Kudus', 'Kudus', 'KDS'],
            [ 13, 'Kabupaten Magelang', 'Mungkid', 'MKD'],
            [ 13, 'Kabupaten Pati', 'Pati', 'PTI'],
            [ 13, 'Kabupaten Pekalongan', 'Kajen', 'KJN'],
            [ 13, 'Kabupaten Pemalang', 'Pemalang', 'PML'],
            [ 13, 'Kabupaten Purbalingga', 'Purbalingga', 'PBG'],
            [ 13, 'Kabupaten Purworejo', 'Purworejo', 'PWR'],
            [ 13, 'Kabupaten Rembang', 'Rembang', 'RBG'],
            [ 13, 'Kabupaten Semarang', 'Ungaran', 'UNR'],
            [ 13, 'Kabupaten Sragen', 'Sragen', 'SGN'],
            [ 13, 'Kabupaten Sukoharjo', 'Sukoharjo', 'SKH'],
            [ 13, 'Kabupaten Tegal', 'Slawi', 'SLW'],
            [ 13, 'Kabupaten Temanggung', 'Temanggung', 'TMG'],
            [ 13, 'Kabupaten Wonogiri', 'Wonogiri', 'WNG'],
            [ 13, 'Kabupaten Wonosobo', 'Wonosobo', 'WSB'],
            [ 13, 'Kota Magelang', 'Magelang', 'MGG'],
            [ 13, 'Kota Pekalongan', 'Pekalongan', 'PKL'],
            [ 13, 'Kota Salatiga', 'Salatiga', 'SLT'],
            [ 13, 'Kota Semarang', 'Semarang', 'SMG'],
            [ 13, 'Kota Surakarta', 'Surakarta', 'SKT'],
            [ 13, 'Kota Tegal', 'Tegal', 'TGL'],
            [ 14, 'Kabupaten Bantul', 'Bantul', 'BTL'],
            [ 14, 'Kabupaten Gunung Kidul', 'Gunung Kidul', 'WNO'],
            [ 14, 'Kabupaten Kulon Progo', 'Kulon Progo', 'WAT'],
            [ 14, 'Kabupaten Sleman', 'Sleman', 'SMN'],
            [ 14, 'Kota Yogyakarta', 'Yogyakarta', 'YYK'],
            [ 15, 'Kabupaten Bangkalan', 'Bangkalan', 'BKL'],
            [ 15, 'Kabupaten Banyuwangi', 'Banyuwangi', 'BYW'],
            [ 15, 'Kabupaten Blitar', 'Kanigoro', 'KNR'],
            [ 15, 'Kabupaten Bojonegoro', 'Bojonegoro', 'BJN'],
            [ 15, 'Kabupaten Bondowoso', 'Bondowoso', 'BDW'],
            [ 15, 'Kabupaten Gresik', 'Gresik', 'GSK'],
            [ 15, 'Kabupaten Jember', 'Jember', 'JMR'],
            [ 15, 'Kabupaten Jombang', 'Jombang', 'JBG'],
            [ 15, 'Kabupaten Kediri', 'Kediri', 'KDR'],
            [ 15, 'Kabupaten Lamongan', 'Lamongan', 'LMG'],
            [ 15, 'Kabupaten Lumajang', 'Lumajang', 'LMJ'],
            [ 15, 'Kabupaten Madiun', 'Mejayan', 'MJY'],
            [ 15, 'Kabupaten Magetan', 'Magetan', 'MGT'],
            [ 15, 'Kabupaten Malang', 'Malang', 'KPN'],
            [ 15, 'Kabupaten Mojokerto', 'Mojokerto', 'MJK'],
            [ 15, 'Kabupaten Nganjuk', 'Nganjuk', 'NJK'],
            [ 15, 'Kabupaten Ngawi', 'Ngawi', 'NGW'],
            [ 15, 'Kabupaten Pacitan', 'Pacitan', 'PCT'],
            [ 15, 'Kabupaten Pamekasan', 'Pamekasan', 'PMK'],
            [ 15, 'Kabupaten Pasuruan', 'Pasuruan', 'PSR'],
            [ 15, 'Kabupaten Ponorogo', 'Ponorogo', 'PNG'],
            [ 15, 'Kabupaten Probolinggo', 'Probolinggo', 'KRS'],
            [ 15, 'Kabupaten Sampang', 'Sampang', 'SPG'],
            [ 15, 'Kabupaten Sidoarjo', 'Sidoarjo', 'SDA'],
            [ 15, 'Kabupaten Situbondo', 'Situbondo', 'SIT'],
            [ 15, 'Kabupaten Sumenep', 'Sumenep', 'SMP'],
            [ 15, 'Kabupaten Trenggalek', 'Trenggalek', 'TRK'],
            [ 15, 'Kabupaten Tuban', 'Tuban', 'TBN'],
            [ 15, 'Kabupaten Tulungagung', 'Tulungagung', 'TLG'],
            [ 15, 'Kota Batu', 'Batu', 'BTU'],
            [ 15, 'Kota Blitar', 'Blitar', 'BLT'],
            [ 15, 'Kota Kediri', 'Kediri', 'KDR'],
            [ 15, 'Kota Madiun', 'Madiun', 'MAD'],
            [ 15, 'Kota Malang', 'Malang', 'MLG'],
            [ 15, 'Kota Mojokerto', 'Mojokerto', 'MJK'],
            [ 15, 'Kota Pasuruan', 'Pasuruan', 'PSN'],
            [ 15, 'Kota Probolinggo', 'Probolinggo', 'PBL'],
            [ 15, 'Kota Surabaya', 'Surabaya', 'SBY'],
            [ 16, 'Kabupaten Lebak', 'Rangkas Bitung', 'RKB'],
            [ 16, 'Kabupaten Pandeglang', 'Pandeglang', 'PDG'],
            [ 16, 'Kabupaten Serang', 'Serang', 'SRG'],
            [ 16, 'Kabupaten Tangerang', 'Tigaraksa', 'TGR'],
            [ 16, 'Kota Cilegon', 'Cilegon', 'CLG'],
            [ 16, 'Kota Serang', 'Serang', 'SRG'],
            [ 16, 'Kota Tangerang', 'Tangerang', 'TNG'],
            [ 16, 'Kota Tangerang Selatan', 'Ciputat', 'CPT'],
            [ 17, 'Kabupaten Badung', 'Mengwi', 'MGW'],
            [ 17, 'Kabupaten Bangli', 'Bangli', 'BLI'],
            [ 17, 'Kabupaten Buleleng', 'Singaraja', 'SGR'],
            [ 17, 'Kabupaten Gianyar', 'Gianyar', 'GIN'],
            [ 17, 'Kabupaten Jembrana', 'Negara', 'NGA'],
            [ 17, 'Kabupaten Karangasem', 'Karangasem', 'KRA'],
            [ 17, 'Kabupaten Klungkung', 'Semarapura', 'SRP'],
            [ 17, 'Kabupaten Tabanan', 'Tabanan', 'TAB'],
            [ 17, 'Kota Denpasar', 'Denpasar', 'DPR'],
            [ 18, 'Kabupaten Bima', 'Woha', 'WHO'],
            [ 18, 'Kabupaten Dompu', 'Dompu', 'DPU'],
            [ 18, 'Kabupaten Lombok Barat', 'Gerung', 'GRG'],
            [ 18, 'Kabupaten Lombok Tengah', 'Praya', 'PYA'],
            [ 18, 'Kabupaten Lombok Timur', 'Selong', 'SEL'],
            [ 18, 'Kabupaten Lombok Utara', 'Tanjung', 'TJN'],
            [ 18, 'Kabupaten Sumbawa', 'Sumbawa Besar', 'SBW'],
            [ 18, 'Kabupaten Sumbawa Barat', 'Taliwang', 'TLW'],
            [ 18, 'Kota Bima', 'Bima', 'BIM'],
            [ 18, 'Kota Mataram', 'Mataram', 'MTR'],
            [ 19, 'Kabupaten Alor', 'Kalabahi', 'KLB'],
            [ 19, 'Kabupaten Belu', 'Atambua', 'ATB'],
            [ 19, 'Kabupaten Ende', 'Ende', 'END'],
            [ 19, 'Kabupaten Flores Timur', 'Larantuka', 'LRT'],
            [ 19, 'Kabupaten Kupang', 'Kupang', 'KPG'],
            [ 19, 'Kabupaten Lembata', 'Lewoleba', 'LWB'],
            [ 19, 'Kabupaten Malaka', 'Betun', 'BTN'],
            [ 19, 'Kabupaten Manggarai', 'Ruteng', 'RTG'],
            [ 19, 'Kabupaten Manggarai Barat', 'Labuan Bajo', 'LBJ'],
            [ 19, 'Kabupaten Manggarai Timur', 'Borong', 'BRG'],
            [ 19, 'Kabupaten Nagekeo', 'Mbay', 'MBY'],
            [ 19, 'Kabupaten Ngada', 'Bajawa', 'BJW'],
            [ 19, 'Kabupaten Rote Ndao', 'Baa', 'BAA'],
            [ 19, 'Kabupaten Sabu Raijua', 'Sabu Barat', 'SBB'],
            [ 19, 'Kabupaten Sikka', 'Maumere', 'MME'],
            [ 19, 'Kabupaten Sumba Barat', 'Waikabubak', 'WKB'],
            [ 19, 'Kabupaten Sumba Barat Daya', 'Tambolaka', 'TAM'],
            [ 19, 'Kabupaten Sumba Tengah', 'Waibakul', 'WBL'],
            [ 19, 'Kabupaten Sumba Timur', 'Waingapu', 'WGP'],
            [ 19, 'Kabupaten Timor Tengah Selatan', 'Soe', 'SOE'],
            [ 19, 'Kabupaten Timor Tengah Utara', 'Kefamenanu', 'KFM'],
            [ 19, 'Kota Kupang', 'Kupang', 'KPG'],
            [ 20, 'Kabupaten Bengkayang', 'Bengkayang', 'BEK'],
            [ 20, 'Kabupaten Kapuas Hulu', 'Putussibau', 'PTS'],
            [ 20, 'Kabupaten Kayong Utara', 'Sukadane', 'SKD'],
            [ 20, 'Kabupaten Ketapang', 'Ketapang', 'KTP'],
            [ 20, 'Kabupaten Kubu Raya', 'Sungai Raya', 'SRY'],
            [ 20, 'Kabupaten Landak', 'Ngabang', 'NBA'],
            [ 20, 'Kabupaten Melawi', 'Nanga Pinoh', 'NGP'],
            [ 20, 'Kabupaten Mempawah', 'Mempawah', 'MPW'],
            [ 20, 'Kabupaten Sambas', 'Sambas', 'SBS'],
            [ 20, 'Kabupaten Sanggau', 'Sanggau', 'SAG'],
            [ 20, 'Kabupaten Sekadau', 'Sekadau', 'SED'],
            [ 20, 'Kabupaten Sintang', 'Sintang', 'STG'],
            [ 20, 'Kota Pontianak', 'Pontianak', 'PTK'],
            [ 20, 'Kota Singkawang', 'Singkawang', 'SKW'],
            [ 21, 'Kabupaten Barito Selatan', 'Buntok', 'BNT'],
            [ 21, 'Kabupaten Barito Timur', 'Tamiang Layang', 'TML'],
            [ 21, 'Kabupaten Barito Utara', 'Muara Teweh', 'MTW'],
            [ 21, 'Kabupaten Gunung Mas', 'Kuala Kurun', 'KKN'],
            [ 21, 'Kabupaten Kapuas', 'Kuala Kapuas', 'KLK'],
            [ 21, 'Kabupaten Katingan', 'Kasongan', 'KSN'],
            [ 21, 'Kabupaten Kotawaringin Barat', 'Pangkalan Bun', 'PBU'],
            [ 21, 'Kabupaten Kotawaringin Timur', 'Sampit', 'SPT'],
            [ 21, 'Kabupaten Lamandau', 'Nanga Bulik', 'NGB'],
            [ 21, 'Kabupaten Murung Raya', 'Puruk Cahu', 'PRC'],
            [ 21, 'Kabupaten Pulang Pisau', 'Pulang Pisau', 'PPS'],
            [ 21, 'Kabupaten Seruyan', 'Kuala Pembuang', 'KLP'],
            [ 21, 'Kabupaten Sukamara', 'Sukamara', 'SKR'],
            [ 21, 'Kota Palangka Raya', 'Palangkaraya', 'PLK'],
            [ 22, 'Kabupaten Balangan', 'Paringin', 'PRN'],
            [ 22, 'Kabupaten Banjar', 'Martapura', 'MTP'],
            [ 22, 'Kabupaten Barito Kuala', 'Marabahan', 'MRH'],
            [ 22, 'Kabupaten Hulu Sungai Selatan', 'Kandangan', 'KGN'],
            [ 22, 'Kabupaten Hulu Sungai Tengah', 'Barabai', 'BRB'],
            [ 22, 'Kabupaten Hulu Sungai Utara', 'Amuntai', 'AMT'],
            [ 22, 'Kabupaten Kotabaru', 'Kotabaru', 'KBR'],
            [ 22, 'Kabupaten Tabalong', 'Tanjung', 'TJG'],
            [ 22, 'Kabupaten Tanah Bumbu', 'Batulicin', 'BLN'],
            [ 22, 'Kabupaten Tanah Laut', 'Pelaihari', 'PLI'],
            [ 22, 'Kabupaten Tapin', 'Rantau', 'RTA'],
            [ 22, 'Kota Banjarbaru', 'Banjarbaru', 'BJB'],
            [ 22, 'Kota Banjarmasin', 'Banjarmasin', 'BJM'],
            [ 23, 'Kabupaten Berau', 'Tanjung Redeb', 'TNR'],
            [ 23, 'Kabupaten Kutai Barat', 'Sendawar', 'SDW'],
            [ 23, 'Kabupaten Kutai Kartanegara', 'Tenggarong', 'TRG'],
            [ 23, 'Kabupaten Kutai Timur', 'Sanggatta', 'SGT'],
            [ 23, 'Kabupaten Mahakam Ulu', 'Ujoh Bilang', 'UJB'],
            [ 23, 'Kabupaten Paser', 'Tanah Grogot', 'TGT'],
            [ 23, 'Kabupaten Penajam Paser Utara', 'Penajam', 'PNJ'],
            [ 23, 'Kota Balikpapan', 'Balikpapan', 'BPP'],
            [ 23, 'Kota Bontang', 'Bontang', 'BON'],
            [ 23, 'Kota Samarinda', 'Samarinda', 'SMR'],
            [ 23, 'Kabupaten Bulungan [ngan)', 'Tanjung Selor', 'TJS'],
            [ 23, 'Kabupaten Malinau', 'Malinau', 'MLN'],
            [ 23, 'Kabupaten Nunukan', 'Nunukan', 'NNK'],
            [ 23, 'Kabupaten Tana Tidung', 'Tideng Pale', 'TDP'],
            [ 23, 'Kota Tarakan', 'Tarakan', 'TAR'],
            [ 25, 'Kabupaten Bolaang Mongondow', 'Lolak', 'LLK'],
            [ 25, 'Kabupaten Bolaang Mongondow Selatan', 'Bolaang Uki', 'BLU'],
            [ 25, 'Kabupaten Bolaang Mongondow Timur', 'Tutuyan', 'TTY'],
            [ 25, 'Kabupaten Bolaang Mongondow Utara', 'Boroko', 'BRK'],
            [ 25, 'Kabupaten Kepulauan Sangihe', 'Tahuna', 'THN'],
            [ 25, 'Kabupaten Kepulauan Siau Tagulandang Biaro [ro)', 'Ondong Siau', 'ODS'],
            [ 25, 'Kabupaten Kepulauan Talaud', 'Melongguane', 'MGN'],
            [ 25, 'Kabupaten Minahasa', 'Tondano', 'TNN'],
            [ 25, 'Kabupaten Minahasa Selatan', 'Amurang', 'AMR'],
            [ 25, 'Kabupaten Minahasa Tenggara', 'Ratahan', 'RTN'],
            [ 25, 'Kabupaten Minahasa Utara', 'Air Madidi', 'ARM'],
            [ 25, 'Kota Bitung', 'Bitung', 'BIT'],
            [ 25, 'Kota Kotamobagu', 'Kotamobagu', 'KTG'],
            [ 25, 'Kota Manado', 'Manado', 'MND'],
            [ 25, 'Kota Tomohon', 'Tomohon', 'TMH'],
            [ 26, 'Kabupaten Banggai', 'Luwuk', 'LWK'],
            [ 26, 'Kabupaten Banggai Kepulauan', 'Salakan', 'SKN'],
            [ 26, 'Kabupaten Banggai Laut', 'Banggai', 'BGI'],
            [ 26, 'Kabupaten Buol', 'Buol', 'BUL'],
            [ 26, 'Kabupaten Donggala', 'Donggala', 'DGL'],
            [ 26, 'Kabupaten Morowali', 'Bungku', 'BGK'],
            [ 26, 'Kabupaten Morowali Utara', 'Kolonodale', 'KND'],
            [ 26, 'Kabupaten Parigi Moutong', 'Parigi', 'PRG'],
            [ 26, 'Kabupaten Poso', 'Poso', 'PSO'],
            [ 26, 'Kabupaten Sigi', 'Sigi Biromaru', 'SGB'],
            [ 26, 'Kabupaten Tojo Una-Una', 'Ampana', 'APN'],
            [ 26, 'Kabupaten Toli-Toli', 'Toli Toli', 'TLI'],
            [ 26, 'Kota Palu', 'Palu', 'PAL'],
            [ 27, 'Kabupaten Bantaeng', 'Bantaeng', 'BAN'],
            [ 27, 'Kabupaten Barru', 'Barru', 'BAR'],
            [ 27, 'Kabupaten Bone', 'Watampone', 'WTP'],
            [ 27, 'Kabupaten Bulukumba', 'Bulukumba', 'BLK'],
            [ 27, 'Kabupaten Enrekang', 'Enrekang', 'ENR'],
            [ 27, 'Kabupaten Gowa', 'Sungguminasa', 'SGM'],
            [ 27, 'Kabupaten Jeneponto', 'Jeneponto', 'JNP'],
            [ 27, 'Kabupaten Selayar [lauan Selayar)', 'Benteng', 'BEN'],
            [ 27, 'Kabupaten Luwu', 'Palopo', 'PLP'],
            [ 27, 'Kabupaten Luwu Timur', 'Malili', 'MLL'],
            [ 27, 'Kabupaten Luwu Utara', 'Masamba', 'MSB'],
            [ 27, 'Kabupaten Maros', 'Maros', 'MRS'],
            [ 27, 'Kabupaten Pangkajene Kepulauan', 'Pangkajene', 'PKJ'],
            [ 27, 'Kabupaten Pinrang', 'Pinrang', 'PIN'],
            [ 27, 'Kabupaten Sidenreng Rappang [ap)', 'Sidenreng', 'SDR'],
            [ 27, 'Kabupaten Sinjai', 'Sinjai', 'SNJ'],
            [ 27, 'Kabupaten Soppeng', 'Watan Soppeng', 'WNS'],
            [ 27, 'Kabupaten Takalar', 'Takalar', 'TKA'],
            [ 27, 'Kabupaten Tana Toraja', 'Makale', 'MAK'],
            [ 27, 'Kabupaten Toraja Utara', 'Rantepao', 'RTP'],
            [ 27, 'Kabupaten Wajo', 'Sengkang', 'SKG'],
            [ 27, 'Kota Makassar', 'Makassar', 'MKS'],
            [ 27, 'Kota Palopo', 'Palopo', 'PLP'],
            [ 27, 'Kota Parepare', 'Pare Pare', 'PRE'],
            [ 28, 'Kabupaten Bombana', 'Rumbia', 'RMB'],
            [ 28, 'Kabupaten Buton', 'Pasar Wajo', 'PSW'],
            [ 28, 'Kabupaten Buton Selatan', 'Batauga', 'BAG'],
            [ 28, 'Kabupaten Buton Tengah', 'Labungkari', 'LBK'],
            [ 28, 'Kabupaten Buton Utara', 'Buranga', 'BNG'],
            [ 28, 'Kabupaten Kolaka', 'Kolaka', 'KKA'],
            [ 28, 'Kabupaten Kolaka Timur', 'Tirawuta', 'TRW'],
            [ 28, 'Kabupaten Kolaka Utara', 'Lasusua', 'LSS'],
            [ 28, 'Kabupaten Konawe', 'Unaaha', 'UNH'],
            [ 28, 'Kabupaten Konawe Kepulauan', 'Langara', 'LGR'],
            [ 28, 'Kabupaten Konawe Selatan', 'Andoolo', 'ADL'],
            [ 28, 'Kabupaten Konawe Utara', 'Wanggudu', 'WGD'],
            [ 28, 'Kabupaten Muna', 'Raha', 'RAH'],
            [ 28, 'Kabupaten Muna Barat', 'Sawerigadi', 'SWG'],
            [ 28, 'Kabupaten Wakatobi', 'Wangi Wangi', 'WGW'],
            [ 28, 'Kota Baubau', 'Bau-Bau', 'BAU'],
            [ 28, 'Kota Kendari', 'Kendari', 'KDI'],
            [ 29, 'Kabupaten Boalemo', 'Tilamuta', 'TMT'],
            [ 29, 'Kabupaten Bone Bolango', 'Suwawa', 'SWW'],
            [ 29, 'Kabupaten Gorontalo', 'Limboto', 'LBT'],
            [ 29, 'Kabupaten Gorontalo Utara', 'Kwandang', 'KWD'],
            [ 29, 'Kabupaten Pohuwato', 'Marisa', 'MAR'],
            [ 29, 'Kota Gorontalo', 'Gorontalo', 'GTO'],
            [ 30, 'Kabupaten Majene', 'Majene', 'MJN'],
            [ 30, 'Kabupaten Mamasa', 'Mamasa', 'MMS'],
            [ 30, 'Kabupaten Mamuju', 'Mamuju', 'MAM'],
            [ 30, 'Kabupaten Mamuju Tengah', 'Tobadak', 'TBD'],
            [ 30, 'Kabupaten Mamuju Utara', 'Pasangkayu', 'PKY'],
            [ 30, 'Kabupaten Polewali Mandar', 'Polewali', 'PLW'],
            [ 31, 'Kabupaten Buru', 'Namlea', 'NLA'],
            [ 31, 'Kabupaten Buru Selatan', 'Namrole', 'NMR'],
            [ 31, 'Kabupaten Kepulauan Aru', 'Dobo', 'DOB'],
            [ 31, 'Kabupaten Maluku Barat Daya', 'Tiakur', 'TKR'],
            [ 31, 'Kabupaten Maluku Tengah', 'Masohi', 'MSH'],
            [ 31, 'Kabupaten Maluku Tenggara', 'Tual', 'TUL'],
            [ 31, 'Kabupaten Maluku Tenggara Barat', 'Saumlaki', 'SML'],
            [ 31, 'Kabupaten Seram Bagian Barat', 'Dataran Hunipopu', 'DRH'],
            [ 31, 'Kabupaten Seram Bagian Timur', 'Dataran Hunimoa', 'DTH'],
            [ 31, 'Kota Ambon', 'Ambon', 'AMB'],
            [ 31, 'Kota Tual', 'Tual', 'TUL'],
            [ 32, 'Kabupaten Halmahera Barat', 'Jailolo', 'JLL'],
            [ 32, 'Kabupaten Halmahera Selatan', 'Labuha', 'LBA'],
            [ 32, 'Kabupaten Halmahera Tengah', 'Weda', 'WED'],
            [ 32, 'Kabupaten Halmahera Timur', 'Maba', 'MAB'],
            [ 32, 'Kabupaten Halmahera Utara', 'Tobelo', 'TOB'],
            [ 32, 'Kabupaten Kepulauan Sula', 'Sanana', 'SNN'],
            [ 32, 'Kabupaten Pulau Morotai', 'Daruba', 'DRB'],
            [ 32, 'Kabupaten Pulau Taliabu', 'Bobong', 'BOB'],
            [ 32, 'Kota Ternate', 'Ternate', 'TTE'],
            [ 32, 'Kota Tidore Kepulauan', 'Tidore', 'TDR'],
            [ 33, 'Kabupaten Asmat', 'Agats', 'AGT'],
            [ 33, 'Kabupaten Biak Numfor', 'Biak', 'BIK'],
            [ 33, 'Kabupaten Boven Digoel', 'Tanah Merah', 'TMR'],
            [ 33, 'Kabupaten Deiyai [yai)', 'Tigi', 'TIG'],
            [ 33, 'Kabupaten Dogiyai', 'Kigamani', 'KGM'],
            [ 33, 'Kabupaten Intan Jaya', 'Sugapa', 'SGP'],
            [ 33, 'Kabupaten Jayapura', 'Jayapura', 'JAP'],
            [ 33, 'Kabupaten Jayawijaya', 'Wamena', 'WAM'],
            [ 33, 'Kabupaten Keerom', 'Waris', 'WRS'],
            [ 33, 'Kabupaten Kepulauan Yapen [n Waropen)', 'Serui', 'SRU'],
            [ 33, 'Kabupaten Lanny Jaya', 'Tiom', 'TOM'],
            [ 33, 'Kabupaten Mamberamo Raya', 'Burmeso', 'BRM'],
            [ 33, 'Kabupaten Mamberamo Tengah', 'Kobakma', 'KBK'],
            [ 33, 'Kabupaten Mappi', 'Kepi', 'KEP'],
            [ 33, 'Kabupaten Merauke', 'Merauke', 'MRK'],
            [ 33, 'Kabupaten Mimika', 'Timika', 'TIM'],
            [ 33, 'Kabupaten Nabire', 'Nabire', 'NAB'],
            [ 33, 'Kabupaten Nduga', 'Kenyam', 'KYM'],
            [ 33, 'Kabupaten Paniai', 'Enarotali', 'ERT'],
            [ 33, 'Kabupaten Pegunungan Bintang', 'Oksibil', 'OSB'],
            [ 33, 'Kabupaten Puncak', 'Ilaga', 'ILG'],
            [ 33, 'Kabupaten Puncak Jaya', 'Mulia', 'MUL'],
            [ 33, 'Kabupaten Sarmi', 'Sarmi', 'SMI'],
            [ 33, 'Kabupaten Supiori', 'Sorendiweri', 'SRW'],
            [ 33, 'Kabupaten Tolikara', 'Karubaga', 'KBG'],
            [ 33, 'Kabupaten Waropen', 'Botawa', 'BTW'],
            [ 33, 'Kabupaten Yahukimo', 'Sumohai', 'SMH'],
            [ 33, 'Kabupaten Yalimo', 'Elelim', 'ELL'],
            [ 33, 'Kota Jayapura', 'Jayapura', 'JAP'],
            [ 34, 'Kabupaten Fakfak', 'Fak Fak', 'FFK'],
            [ 34, 'Kabupaten Kaimana', 'Kaimana', 'KMN'],
            [ 34, 'Kabupaten Manokwari', 'Manokwari', 'MNK'],
            [ 34, 'Kabupaten Manokwari Selatan', 'Ransiki', 'RNK'],
            [ 34, 'Kabupaten Maybrat', 'Aifat', 'AFT'],
            [ 34, 'Kabupaten Pegunungan Arfak', 'Anggi', 'ANG'],
            [ 34, 'Kabupaten Raja Ampat', 'Waisai', 'WAS'],
            [ 34, 'Kabupaten Sorong', 'Aimas', 'AMS'],
            [ 34, 'Kabupaten Sorong Selatan', 'Teminabuan', 'TMB'],
            [ 34, 'Kabupaten Tambrauw', 'Fef', 'FEF'],
            [ 34, 'Kabupaten Teluk Bintuni', 'Bintuni', 'BTI'],
            [ 34, 'Kabupaten Teluk Wondama', 'Rasiei', 'RAS'],
            [ 34, 'Kota Sorong', 'Sorong', 'SON'],
        ];

        foreach($cities as $city) {
            City::factory()->create([
                'province_id' => $city[0],
                'name' => $city[1]
            ]);
        }
    }
}
