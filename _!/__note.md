SIPAPAP MACO (Sistem Informasi Pendaftaran Penjadwalan Praktikan Mahasiswa dan Co-Ass)
RS Jiwa Provinsi Jawa Barat, Jl. Kolonel Maturi KM.7, Desa Jambudipa, Kec. Cisarua, Kab. Bandung Barat, 40551
===================================================================================================================

# DAFTAR PERBAIKAN

- 🔃 Pembuatan File Word Invoice
- 🔃 membuat rincian praktik pembimbing
- 🔃 Inputan Tambahan Daftar Praktikan Ijazah(Khusus Profesi), Hasil Swab
- 🔃 Perubahan Nomor Surat Invoice Praktikan menjadi . . . /DK.01.03/DIKLIT.RS/2022
- 🔃 Upload Setifikat Akreditasi
- Generate SP CI Sesuai dengan format
- Semua Berkas di TTD Basah
- Akun Institusi Pendidikan (IP) tidak Bisa mengubah Pembimbing tapi bisa melihat
- Bridgeng Data Pembayaran Praktik ke Aplikasi SIMRS
- Tarif Praktik Khusus Kedokteran Nanti disesuaikan dengan Format Excel
- Panduan untuk Institusi Pendidikan nanti akan berubah sesuai dengan Pengembangan dari Aplikasi
- Penambahan Upload Surat Penugasan Preceptor/Clinical Insturtur di menu “Daftar Pembimbing dan Ruangan”

# KET :

✅ = Selesai, 🔃 = Progress

# AKUN ADMIN :

username : admin
password : 1243

# LINK :

Link Dalam (Local) : http://192.168.7.89/SM/
Link Luar (Public) : http://103.147.222.122:84/SM/

Note :
Perbaikan yang sudah selesai akan dihilangkan diudate selanjutnya.

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
git commit -a -m "Perbaikan Tambah Data Praktikan"
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
