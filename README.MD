# Koperasi Karyawan

# Setup
- Buat field baru di table `tb_anggota`.
```sql
ALTER TABLE `tb_anggota` ADD `token` TEXT NULL;
ALTER TABLE `tb_kegiatan_simpanan` ADD `bukti_transfer` TEXT NULL;
```
- Optional, edit `secret_key` di file `application/config/custom.php`, bebas diisi apa aja.
