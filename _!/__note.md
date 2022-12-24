SIPAPAP MACO (Sistem Informasi Pendaftaran Penjadwalan Praktikan Mahasiswa dan Co-Ass)
RS Jiwa Provinsi Jawa Barat, Jl. Kolonel Maturi KM.7, Desa Jambudipa, Kec. Cisarua, Kab. Bandung Barat, 40551
===================================================================================================================

# LAPORAN UPDATE UPDATE WAG

## _*MAYOR*_

-

## _*MINOR*_

- 🔃 Pembuatan File Word Invoice
- membuat rincian praktik pembimbing
  SP CI Belum Ada Format yang Baku
- Pembimbing dan Runagan masih ada yang Double
- Semua Berkas di TTD Basah
- Akun Institusi Pendidikan (IP) tidak Bisa mengubah Pembimbing tapi bias melihat
- Keputusan Direktur untuk Kuota ada 1 Orang 2 Pasien (Keperawatan)
- Penempatan Data Praktikan Mess berdasarkan Jenis Kelamin Berada diluar Aplikasi
- Kalai Sesuai BOR akan sangat fleksibel
- Perubahan Nomor Surat Invoice Praktikan menjadi …/DK/01/03/DIKLIT.RS/2022
- Verifikasi tolak dan terimanya terbridgind dengan aplikasi SIMRS
- Untuk Nilai Kedokteran Nilai Dulu Baru Invoice, namun bisa diakali sesuai dengan yang lainnya
- Tarif Praktik Khusus Kedokteran Nanti disesuaikan dengan Format Excel
- Panduan untuk Institusi Pendidikan nanti akan berubah sesuai dengan Pengembangan dari Aplikasi
- Penambahan Upload Surat Penugasan Preceptor/Clinical Insturtur di menu “Daftar Pembimbing dan Ruangan”
- Pengembangan Inputan Tambahan Daftar Praktik

1. Sertifikasi Akredtasi Sekolah/Update
2. Ijazah S1/D4 Khusus Co ass, Nurse, Apoteker
3. Hasil Swab

====================================================================================================================

# KET :

_*MAYOR*_ = Modul yang _*FITUR/ERROR*_ nya pempengaruhi Alur Utama (PRIORITAS)
_*MINOR*_ = Modul yang _*FITUR/ERROR*_ nya bisa dikondisikan
✅ = Selesai, 🔃 = Progress

====================================================================================================================

# NOTE :

Link Dalam (Local) : http://10.132.0.75/SM/
Link Luar (Public) : http://103.147.222.122:88/SM/

Modul yang sudah selesai akan dihilangkan diudate selanjutnya,
Untuk Lebih lengkap cek _*TIMELINE*_ Perubahan Aplikasi dilink ini : https://bit.ly/SMDevTL

====================================================================================================================

# PERTANYAAN

====================================================================================================================

# GIT CODE

git commit --amend
<KET: ubah commit sebelumnya, bila sudah CTRL + X lalu CTRL + C lalau ketik :wq
untuk ubah keterangan Commit atau :qa! untuk keluar>

git commit -m "Nama Commit"
<KET: commit bila sudah eksekusi git add .>

git commit -a -m "Nama Commit"
<KET: commit semua file yang dirubah>

git log namabranch
<KET: commit histori, tekan q untuk keluar>

git clone https://github.com/fajarrachmath/SM.git

git status

git pull
git add .
git commit -a -m "Berhasil Seleksi Email yang Sudah Ada di Register"
git push

====================================================================================================================

# PHP CODE

urlencode(base64_encode())
base64_decode(urldecode())

====================================================================================================================

# TRUNCATE DATABASE (EMPTY)

TRUNCATE tb_bayar;
TRUNCATE tb_mess_pilih;
TRUNCATE tb_nilai_kep;
TRUNCATE tb_nilai_upload;
TRUNCATE tb_pembimbing_pilih;
TRUNCATE tb_pkd_narsum;
TRUNCATE tb_praktik;
TRUNCATE tb_praktikan;
TRUNCATE tb_praktik_tgl;
TRUNCATE tb_tarif_pilih;
TRUNCATE tb_tempat_pilih;

====================================================================================================================

# DELETE FILE

rm ./path/to/the/file/file_1.txt SM/file/bayar
SM/file/inv
SM/file/nilai
SM/file/praktik

====================================================================================================================
