SIPAPAP MACO (Sistem Informasi Pendaftaran Penjadwalan Praktikan Mahasiswa dan Co-Ass)
RS Jiwa Provinsi Jawa Barat, Jl. Kolonel Maturi KM.7, Desa Jambudipa, Kec. Cisarua, Kab. Bandung Barat, 40551
===================================================================================================================

# LAPORAN UPDATE UPDATE WAG

## _*MAYOR*_

-

## _*MINOR*_

- 🔃 Pembuatan File Word Invoice
- membuat rincian praktik pembimbing

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
git commit -a -m "PHPMailer GMail update 30 Mei 2022"
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
