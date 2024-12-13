# [My Essential](https://my.l-essential.com)/[Home Essential](https://home.l-essential.com)

# Setup
- Buat field baru di table `tb_anggota`.
```sql
ALTER TABLE `tb_anggota` ADD `token` TEXT NULL;
ALTER TABLE `tb_simpanan_sukarela` ADD `bukti_transfer` TEXT NULL;
```
- Optional, edit `secret_key` di file `application/config/custom.php`, bebas diisi apa aja.