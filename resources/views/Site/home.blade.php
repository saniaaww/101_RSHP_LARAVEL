<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>RSHP UNAIR</title>
</head>
<body>


{{-- Navigasi di atas --}}
@include('site.navigation')

{{-- Konten utama --}}
<table width="100%" cellpadding="10">
  <tr>
    <td width="50%" valign="center" align="center">
      <a href="pendaftaran.html" style="display:inline-block; background-color:#fdd835; color:black; padding:10px 20px; text-decoration:none; font-weight:bold;">
        <s>PENDAFTARAN ONLINE</s>
      </a>
      <p style="font-family:Arial; font-size:14px; margin-top:10px;">
        Rumah Sakit Hewan Pendidikan Universitas Airlangga berinovasi untuk selalu meningkatkan kualitas pelayanan, maka dari itu Rumah Sakit Hewan Pendidikan Universitas Airlangga mempunyai fitur pendaftaran online yang mempermudah untuk mendaftarkan hewan kesayangan anda.
      </p>
      <a href="https://rshp.unair.ac.id/dokter-jaga/" style="display:inline-block; background-color:#29b6f6; color:white; padding:10px 20px; text-decoration:none; font-weight:bold;">
        INFORMASI JADWAL DOKTER JAGA
      </a>
    </td>

    <td width="50%" align="center">
      <iframe width="100%" height="315" src="https://www.youtube.com/embed/rCfvZPECZvE" 
        title="Video YouTube RSHP" frameborder="0" allowfullscreen></iframe>
    </td>
  </tr>
</table>

<h2 style="text-align:center; font-family:Arial Black;">BERITA TERKINI</h2>

<h3 style="font-family: 'Exo 2', sans-serif; font-size: 20px; color: #6c7985ff;">
  RSHP Latest News
</h3>

<div style="display: flex; overflow-x: auto; gap: 20px; padding: 10px;">
  <a href="https://rshp.unair.ac.id/open-recruit-staf-rshp-unair/" target="_blank" style="flex: 0 0 auto; width: 300px; text-decoration: none; color: black;">
    <div>
      <img src="image/oprec.png" alt="Berita 1" width="300" height="180" style="object-fit: cover;">
      <h3 align="center">Open Recruit Staf RSHP UNAIR</h3>
      <p align="center">1 June 2025</p>
    </div>
  </a>

  <a href="https://rshp.unair.ac.id/ampicillin-dan-amoxycilin-resisten-terhadap-penyakit-sistem-respirasi-di-rshp/" target="_blank" style="flex: 0 0 auto; width: 300px; text-decoration: none; color: black;">
    <div>
      <img src="image/kucing.png" alt="Berita 2" width="300" height="180" style="object-fit: cover;">
      <h3 align="center">Ampicilin dan Amoxycilin, Resisten Terhadap Penyakit Sistem Respirasi di RSHP</h3>
      <p align="center">23 November 2023</p>
    </div>
  </a>

  <a href="https://rshp.unair.ac.id/rshp-goes-to-banyuwangi/" target="_blank" style="flex: 0 0 auto; width: 300px; text-decoration: none; color: black;">
    <div>
      <img src="image/banyuwangi.png" alt="Berita 3" width="300" height="180" style="object-fit: cover;">
      <h3 align="center">RSHP Goes to Banyuwangi</h3>
      <p align="center">5 Agustus 2024</p>
    </div>
  </a>

  <a href="https://rshp.unair.ac.id/program-kerja-sama-rumah-sakit-hewan-pendidikan-dengan-smk-negeri-tutur/" target="_blank" style="flex: 0 0 auto; width: 300px; text-decoration: none; color: black;">
    <div>
      <img src="image/proker_rs.png" alt="Berita 4" width="300" height="180" style="object-fit: cover;">
      <h3 align="center">Program Kerja Sama Rumah Sakit Hewan Pendidikan dengan SMK Negeri Tutur</h3>
      <p align="center">30 September 2023</p>
    </div>
  </a>
</div>

<h2 style="text-align:center; font-family:Arial Black;">LOKASI RSHP TERKINI</h2>
<div style="text-align:center;">
  <iframe 
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.059327259456!2d112.7856454749948!3d-7.270285373027735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbd40a9784f5%3A0xe756f6ae03eab99!2sRumah%20Sakit%20Hewan%20Pendidikan%20Universitas%20Airlangga!5e0!3m2!1sid!2sid!4v1692345678901!5m2!1sid!2sid" 
    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
  </iframe>
</div>

{{-- Footer di bawah --}}
@include('site.footer')
