
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Portfolio Naufal</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <?php include "header.php"; ?>

  <main>
    <!-- HERO -->
    <section id="home" class="hero">
      <div class="container hero-inner">
        <div class="hero-text">
          <h1 class="headline">Halo, Saya <span class="accent">Naufal</span></h1>
          <p class="lead">Mahasiswa TI • Web Developer • Pengembang IoT</p>
          <p class="cta">
            <a href="#projects" class="btn">Lihat Proyek</a>
            <a href="#contact" class="btn btn-outline">Kontak Saya</a>
          </p>
        </div>
        <div class="hero-card">
          <img src="assets/img/profile.jpg" alt="profile" class="profile" />
          <ul class="stats">
            <li><strong>10+</strong><span>Proyek</span></li>
            <li><strong>5+</strong><span>Tool</span></li>
            <li><strong>1</strong><span>Kompetisi</span></li>
          </ul>
        </div>
      </div>
    </section>

    <!-- PROJECTS -->
    <section id="projects" class="projects">
      <div class="container">
        <h2 class="section-title">Proyek</h2>
        <div class="grid projects-grid">
          <article class="card project-card">
            <img src="assets/img/project1.jpg" alt="Project 1">
            <div class="card-body">
              <h3>Aplikasi Kasir RFID</h3>
              <p>Sistem kasir dengan integrasi RFID & barcode.</p>
              <a class="link" href="#">Lihat detail</a>
            </div>
          </article>

          <article class="card project-card">
            <img src="assets/img/project1.jpg" alt="Project 2">
            <div class="card-body">
              <h3>IoT Pembunuh Nyamuk</h3>
              <p>Solusi AIoT untuk mengurangi gangguan nyamuk.</p>
              <a class="link" href="#">Lihat detail</a>
            </div>
          </article>

          <article class="card project-card">
            <img src="assets/img/project1.jpg" alt="Project 3">
            <div class="card-body">
              <h3>Marketplace SampahLink</h3>
              <p>Marketplace daur ulang dengan tracking GPS.</p>
              <a class="link" href="#">Lihat detail</a>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- CONTACT -->
    <section id="contact" class="contact">
      <div class="container contact-inner">
        <div class="contact-left">
          <h2 class="section-title">Kontak Saya</h2>
          <p>Isi form di samping untuk kirim pesan — akan tersimpan di database.</p>
          <div class="contact-info">
            <p><strong>Email:</strong> email@example.com</p>
            <p><strong>Lokasi:</strong> Nganjuk, Indonesia</p>
          </div>
        </div>

        <div class="contact-right">
          <form id="contactForm" method="POST" action="save_message_ajax.php">
            <div class="form-row">
              <input type="text" name="name" id="name" placeholder="Nama" required>
              <input type="email" name="email" id="email" placeholder="Email" required>
            </div>
            <textarea name="message" id="message" rows="6" placeholder="Pesan kamu..." required></textarea>
            <div class="form-actions">
              <button type="submit" class="btn">Kirim Pesan</button>
            </div>
            <div id="formAlert" class="form-alert" aria-live="polite"></div>
          </form>
        </div>
      </div>
    </section>

  </main>

  <?php include "footer.php"; ?>

  <script src="script.js"></script>
</body>
</html>
