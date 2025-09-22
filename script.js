// script.js
document.addEventListener('DOMContentLoaded', ()=>{

  // NAV TOGGLE (mobile)
  const navToggle = document.getElementById('navToggle');
  const mainNav = document.getElementById('mainNav');
  navToggle && navToggle.addEventListener('click', ()=> {
    mainNav.classList.toggle('open');
  });

  // Smooth scroll for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(a=>{
    a.addEventListener('click', (e)=>{
      const target = document.querySelector(a.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({behavior:'smooth', block:'start'});
      }
    });
  });

  // Contact form (AJAX)
  const form = document.getElementById('contactForm');
  if (form) {
    form.addEventListener('submit', async (e)=>{
      e.preventDefault();
      const btn = form.querySelector('button[type="submit"]');
      const alert = document.getElementById('formAlert');
      btn.disabled = true;
      btn.textContent = 'Mengirim...';
      alert.textContent = '';

      const formData = new FormData(form);

      try {
        const res = await fetch('save_message_ajax.php', {
          method: 'POST',
          body: formData
        });
        const json = await res.json();
        if (json.status === 'success') {
          alert.style.color = 'green';
          alert.textContent = json.message;
          form.reset();
        } else {
          alert.style.color = 'crimson';
          alert.textContent = json.message || 'Terjadi kesalahan';
        }
      } catch (err) {
        alert.style.color = 'crimson';
        alert.textContent = 'Gagal mengirim. Coba lagi.';
      } finally {
        btn.disabled = false;
        btn.textContent = 'Kirim Pesan';
      }
    });
  }

  // Simple reveal on scroll
  const reveal = () => {
    document.querySelectorAll('.card, .project-card, .hero-card').forEach(el=>{
      const rect = el.getBoundingClientRect();
      if (rect.top < window.innerHeight - 60) {
        el.style.opacity = 1;
        el.style.transform = 'translateY(0)';
      } else {
        el.style.opacity = '';
        el.style.transform = '';
      }
    });
  }
  window.addEventListener('scroll', reveal);
  reveal();
});
