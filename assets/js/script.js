document.addEventListener('DOMContentLoaded', function() {
    const formPesanan = document.getElementById('formPesanan');
    const loadingDiv = document.createElement('div');
    loadingDiv.className = 'loading';
    loadingDiv.innerHTML = `
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <p class="mt-2">Mengirim pesanan...</p>
    `;

    if (formPesanan) {
        formPesanan.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (validateForm()) {
                showLoading();
                setTimeout(() => {
                    formPesanan.submit();
                }, 1000);
            }
        });
    }

    function validateForm() {
        const nama = document.getElementById('nama').value.trim();
        const telepon = document.getElementById('telepon').value.trim();
        const alamat = document.getElementById('alamat').value.trim();
        const jenisLayanan = document.getElementById('jenis_layanan').value;
        const berat = document.getElementById('berat').value;
        const jadwalJemput = document.getElementById('jadwal_jemput').value;

        let isValid = true;
        let errorMessage = '';

        if (nama.length < 3) {
            errorMessage += 'Nama harus minimal 3 karakter.\n';
            isValid = false;
        }

        const phoneRegex = /^(\+62|62|0)8[1-9][0-9]{6,9}$/;
        if (!phoneRegex.test(telepon)) {
            errorMessage += 'Nomor telepon tidak valid.\n';
            isValid = false;
        }

        if (alamat.length < 10) {
            errorMessage += 'Alamat harus minimal 10 karakter.\n';
            isValid = false;
        }

        if (!jenisLayanan) {
            errorMessage += 'Pilih jenis layanan.\n';
            isValid = false;
        }

        if (berat < 1) {
            errorMessage += 'Berat minimal 1 kg.\n';
            isValid = false;
        }

        if (!jadwalJemput) {
            errorMessage += 'Pilih jadwal penjemputan.\n';
            isValid = false;
        }

        const selectedDate = new Date(jadwalJemput);
        const now = new Date();
        if (selectedDate <= now) {
            errorMessage += 'Jadwal penjemputan harus di masa depan.\n';
            isValid = false;
        }

        if (!isValid) {
            alert('Mohon perbaiki kesalahan berikut:\n' + errorMessage);
        }

        return isValid;
    }

    function showLoading() {
        const submitBtn = formPesanan.querySelector('button[type="submit"]');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Mengirim...';
        
        formPesanan.appendChild(loadingDiv);
        loadingDiv.style.display = 'block';
    }

    const teleponInput = document.getElementById('telepon');
    if (teleponInput) {
        teleponInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            
            if (value.startsWith('0')) {
                value = value.substring(1);
            }
            
            if (value.startsWith('62')) {
                value = value.substring(2);
            }
            
            if (value.length > 0 && !value.startsWith('8')) {
                value = '8' + value;
            }
            
            if (value.length > 0) {
                value = '0' + value;
            }
            
            e.target.value = value;
        });
    }

    const beratInput = document.getElementById('berat');
    if (beratInput) {
        beratInput.addEventListener('input', function(e) {
            let value = parseFloat(e.target.value);
            if (value < 0) {
                e.target.value = 0;
            }
        });
    }

    const jadwalInput = document.getElementById('jadwal_jemput');
    if (jadwalInput) {
        const now = new Date();
        const tomorrow = new Date(now);
        tomorrow.setDate(tomorrow.getDate() + 1);
        tomorrow.setHours(8, 0, 0, 0);
        
        jadwalInput.min = tomorrow.toISOString().slice(0, 16);
    }

    const jenisLayananSelect = document.getElementById('jenis_layanan');
    if (jenisLayananSelect) {
        jenisLayananSelect.addEventListener('change', function() {
            const berat = document.getElementById('berat');
            const hargaDisplay = document.getElementById('harga-display');
            
            if (hargaDisplay) {
                const harga = calculateHarga(this.value, berat.value);
                hargaDisplay.textContent = `Rp ${harga.toLocaleString('id-ID')}`;
            }
        });
    }

    function calculateHarga(jenisLayanan, berat) {
        const hargaPerKg = {
            'cuci_kering': 8000,
            'cuci_setrika': 12000,
            'setrika_saja': 6000,
            'dry_clean': 15000,
            'premium': 20000
        };
        
        return hargaPerKg[jenisLayanan] * berat || 0;
    }

    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            setTimeout(() => {
                alert.remove();
            }, 300);
        }, 5000);
    });

    const cards = document.querySelectorAll('.card, .service-card');
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
            }
        });
    }, observerOptions);

    cards.forEach(card => {
        observer.observe(card);
    });

    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }
    });

    const smoothScrollLinks = document.querySelectorAll('a[href^="#"]');
    smoothScrollLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                const offsetTop = targetElement.offsetTop - 80;
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });
}); 