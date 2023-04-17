<html>

<body>
    <?php foreach ($mahasiswa as $u) ?>
    <form action="<?= base_url('index.php/mahasiswa/update'); ?>" method="post">
        <table border="1%">

            <tr>
                <th colspan="3">
                    Edit Data Mahasiswa 
                </th>
            </tr>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td><input readonly type="text" name="nim" id="nim" value="<?php echo $u->nim ?>">
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" value="<?php echo $u->nama ?>">
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td>
                    <select name="jurusan" id="jurusan">
                        <option value="Ilmu Komputer">Ilmu Komputer</option>
                        <option value="Teknologi Informasi">Teknologi Informasi</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Teknik Rekayasa Elektro">Teknik Rekayasa Elektro</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><input type="text" name="alamat" id="alamat" value="<?php echo $u->alamat ?>">
            </tr>
            <tr>
                <td colspan="3"><input type="submit" name="submit" id="submit" value="submit"></td>
            </tr>
        </table>
    </form>
    <?php
    $this->load->Library('form_validation');
        echo validation_errors(); ?>
</body>

</html>