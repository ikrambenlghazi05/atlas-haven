<style>
/* Moroccan About Section Enhancement */
:root {
    --gold-primary: #D4AF37;
    --gold-secondary: #B8860B;
    --burgundy: #8B0000;
    --emerald: #dbb777;
    --terracotta: #E2725B;
    --deep-blue: #1E3A8A;
    --warm-white:rgb(243, 241, 235);
    --sand:rgb(248, 246, 242);
    --light-sand: #FAF0E6;
}

/* Import Moroccan Fonts */
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap');

/* About Section Background Enhancement */
#about {
    background: linear-gradient(135deg, 
        var(--light-sand) 0%, 
        var(--warm-white) 50%, 
        var(--sand) 100%) !important;
    position: relative;
    overflow: hidden;
}

#about::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M50 15L65 35H35L50 15ZM50 85L35 65H65L50 85ZM15 50L35 35V65L15 50ZM85 50L65 65V35L85 50Z' fill='%23D4AF37' fill-opacity='0.03'/%3E%3C/svg%3E");
    pointer-events: none;
}

/* Section Title Enhancement */
.section-subtitle {
    color: var(--gold-primary) !important;
    font-weight: 600 !important;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 14px;
    position: relative;
    padding-bottom: 10px;
}

.section-subtitle::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 50px;
    height: 2px;
    background: linear-gradient(90deg, var(--gold-primary), var(--emerald));
}

.section-title {
    font-family: 'Playfair Display', serif !important;
    color: var(--burgundy) !important;
    font-weight: 700 !important;
    font-size: 2.5rem;
    position: relative;
    margin-bottom: 3rem !important;
}

.section-title::after {
    content: '◆';
    position: absolute;
    bottom: -20px;
    left: 50%;
    transform: translateX(-50%);
    color: var(--gold-primary);
    font-size: 16px;
}

/* Image Container Enhancement */
.position-relative img {
    transition: all 0.3s ease !important;
    filter: brightness(1.1) contrast(1.1);
}

.position-relative:hover img {
    transform: scale(1.02);
    filter: brightness(1.2) contrast(1.2);
}

/* Decorative Border Enhancement */
.position-absolute[style*="border: 5px solid"] {
    border: 5px solid var(--gold-primary) !important;
    background: linear-gradient(45deg, 
        rgba(212, 175, 55, 0.1), 
        rgba(80, 200, 120, 0.1)) !important;
    backdrop-filter: blur(5px);
}

/* Rating Card Enhancement */
.position-absolute.bg-white {
    background: linear-gradient(145deg, 
        rgba(255, 255, 255, 0.95), 
        rgba(255, 248, 220, 0.95)) !important;
    backdrop-filter: blur(10px) !important;
    border: 1px solid rgba(212, 175, 55, 0.2) !important;
    transition: all 0.3s ease;
}

.position-absolute.bg-white:hover {
    transform: translateY(-5px) !important;
    box-shadow: 0 15px 30px rgba(0,0,0,0.15) !important;
}

/* Story Section Enhancement */
h3[style*="color: var(--puce)"] {
    font-family: 'Playfair Display', serif !important;
    color: var(--burgundy) !important;
    font-weight: 700 !important;
    position: relative;
    padding-bottom: 15px;
}

h3[style*="color: var(--puce)"]::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 60px;
    height: 3px;
    background: linear-gradient(90deg, var(--gold-primary), var(--emerald));
    border-radius: 2px;
}

.lead {
    color: var(--terracotta) !important;
    font-weight: 500 !important;
    font-size: 1.1rem !important;
}

/* Achievement Cards Enhancement */
.d-flex.p-3.bg-white {
    background: linear-gradient(145deg, 
        rgba(255, 255, 255, 0.9), 
        rgba(255, 248, 220, 0.9)) !important;
    border-left: 4px solid var(--gold-primary) !important;
    transition: all 0.3s ease !important;
    position: relative;
    overflow: hidden;
}

.d-flex.p-3.bg-white::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, 
        rgba(212, 175, 55, 0.05), 
        rgba(80, 200, 120, 0.05));
    opacity: 0;
    transition: opacity 0.3s ease;
}

.d-flex.p-3.bg-white:hover::before {
    opacity: 1;
}

.d-flex.p-3.bg-white:hover {
    transform: translateY(-3px) !important;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
    border-left-color: var(--emerald) !important;
}

/* Icon Background Enhancement */
.rounded-circle[style*="background-color: rgba(225, 161, 64, 0.1)"] {
    background: linear-gradient(135deg, 
        rgba(212, 175, 55, 0.15), 
        rgba(80, 200, 120, 0.15)) !important;
    border: 1px solid rgba(212, 175, 55, 0.2);
    transition: all 0.3s ease;
}

.d-flex.p-3.bg-white:hover .rounded-circle {
    transform: scale(1.1);
    background: linear-gradient(135deg, 
        rgba(212, 175, 55, 0.25), 
        rgba(80, 200, 120, 0.25)) !important;
}

/* Titles in Cards Enhancement */
h5[style*="color: var(--puce)"] {
    color: var(--burgundy) !important;
    font-weight: 600 !important;
    font-family: 'Poppins', sans-serif !important;
}

/* Statistics Cards Enhancement */
.col-md-3 .py-4.px-3.bg-white {
    background: linear-gradient(145deg, 
        rgba(255, 255, 255, 0.95), 
        rgba(255, 248, 220, 0.95)) !important;
    border: 1px solid rgba(212, 175, 55, 0.2) !important;
    transition: all 0.3s ease !important;
    position: relative;
    overflow: hidden;
}

.col-md-3 .py-4.px-3.bg-white::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, 
        var(--gold-primary), 
        var(--emerald), 
        var(--terracotta));
}

.col-md-3 .py-4.px-3.bg-white:hover {
    transform: translateY(-10px) !important;
    box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
}

.col-md-3 .py-4.px-3.bg-white:hover i {
    transform: scale(1.2);
    color: var(--emerald) !important;
}

/* Statistics Numbers Enhancement */
h2[style*="color: var(--puce)"] {
    color: var(--burgundy) !important;
    font-family: 'Playfair Display', serif !important;
    font-weight: 700 !important;
    font-size: 2.5rem !important;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
}

/* Icons Enhancement */
i[style*="color: var(--gold)"] {
    color: var(--gold-primary) !important;
    filter: drop-shadow(2px 2px 4px rgba(0,0,0,0.1));
    transition: all 0.3s ease;
}

/* Responsive Enhancements */
@media (max-width: 768px) {
    .section-title {
        font-size: 2rem !important;
    }
    
    .section-title::after {
        bottom: -15px;
    }
    
    h3[style*="color: var(--puce)"]::after {
        left: 50%;
        transform: translateX(-50%);
    }
    
    .col-md-3 .py-4.px-3.bg-white:hover {
        transform: translateY(-5px) !important;
    }
}

/* Floating Decorative Elements */
#about .container {
    position: relative;
}

#about .container::before {
    content: '';
    position: absolute;
    top: 20%;
    right: -30px;
    width: 60px;
    height: 60px;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 10L40 25H20L30 10ZM30 50L20 35H40L30 50Z' fill='%23D4AF37' opacity='0.1'/%3E%3C/svg%3E");
    animation: float 18s ease-in-out infinite;
    pointer-events: none;
}

#about .container::after {
    content: '';
    position: absolute;
    bottom: 15%;
    left: -30px;
    width: 50px;
    height: 50px;
    background: url("data:image/svg+xml,%3Csvg width='50' height='50' viewBox='0 0 50 50' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='25' cy='25' r='20' fill='none' stroke='%2350C878' stroke-width='2' opacity='0.15'/%3E%3C/svg%3E");
    animation: float 22s ease-in-out infinite reverse;
    pointer-events: none;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    25% { transform: translateY(-10px) rotate(90deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
    75% { transform: translateY(-10px) rotate(270deg); }
}
</style>

<section id="about" class="py-5" style="background-color: var(--light-sand);">
    <div class="container py-5">
        <div class="text-center mb-5">
            
            <h2 class="section-title" data-aos="fade-up" data-aos-delay="100">À Propos d'Atlas Haven</h2>
        </div>

        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                        alt="À propos de nous" class="img-fluid rounded-3 shadow-lg"
                        style="z-index: 1; position: relative;">
                    <div class="position-absolute"
                        style="width: 200px; height: 200px; border: 5px solid var(--gold); border-radius: 10px; bottom: -25px; left: -25px; z-index: 0;">
                    </div>
                    <div class="position-absolute bg-white shadow-lg p-3 rounded-3"
                        style="bottom: 30px; right: -20px; z-index: 2;">
                        <div class="d-flex align-items-center">
                            <div class="me-3 text-primary">
                                <i class="fas fa-star fa-2x" style="color: var(--gold);"></i>
                            </div>
                            <div>
                                <h5 class="mb-0" style="color: var(--puce);">Classement 5 Étoiles</h5>
                                <p class="mb-0">Luxe à son meilleur</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mt-5 mt-lg-0 ps-lg-5" data-aos="fade-left" data-aos-duration="1000">
                <h3 class="mb-4" style="color: var(--puce); font-weight: 700;">Notre Histoire</h3>
                <p class="lead mb-4" style="color: var(--burnt-orange); font-weight: 500;">Fondé en 2010, Atlas Haven
                    est passé d'une petite collection de riads à un leader du luxe hôtelier au Maroc.</p>
                <p>Nous sélectionnons uniquement les propriétés les plus exclusives pour garantir un séjour
                    extraordinaire. Notre équipe passionnée travaille sans relâche pour maintenir les standards les plus
                    élevés à travers notre portefeuille de destinations d'exception.</p>

                <div class="row mt-4 gx-4 gy-3">
                    <div class="col-md-6">
                        <div class="d-flex p-3 bg-white rounded-3 shadow-sm h-100 align-items-center"
                            style="border-left: 4px solid var(--gold);">
                            <div class="me-3">
                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 60px; height: 60px; background-color: rgba(225, 161, 64, 0.1);">
                                    <i class="fas fa-award fa-2x" style="color: var(--gold);"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-1" style="color: var(--puce); font-weight: 600;">Prix d'Excellence</h5>
                                <p class="mb-0">Reconnu internationalement</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex p-3 bg-white rounded-3 shadow-sm h-100 align-items-center"
                            style="border-left: 4px solid var(--gold);">
                            <div class="me-3">
                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 60px; height: 60px; background-color: rgba(225, 161, 64, 0.1);">
                                    <i class="fas fa-globe fa-2x" style="color: var(--gold);"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-1" style="color: var(--puce); font-weight: 600;">Présence Nationale</h5>
                                <p class="mb-0">20+ établissements au Maroc</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row mt-5 pt-4">
            <div class="col-md-3 col-6 text-center mb-4 mb-md-0" data-aos="fade-up">
                <div class="py-4 px-3 bg-white rounded-3 shadow-sm h-100">
                    <i class="fas fa-hotel fa-3x mb-3" style="color: var(--gold);"></i>
                    <h2 class="fw-bold mb-1" style="color: var(--puce);">20+</h2>
                    <p class="mb-0">Établissements Premium</p>
                </div>
            </div>
            <div class="col-md-3 col-6 text-center mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                <div class="py-4 px-3 bg-white rounded-3 shadow-sm h-100">
                    <i class="fas fa-map-marker-alt fa-3x mb-3" style="color: var(--gold);"></i>
                    <h2 class="fw-bold mb-1" style="color: var(--puce);">12</h2>
                    <p class="mb-0">Villes Impériales</p>
                </div>
            </div>
            <div class="col-md-3 col-6 text-center mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="200">
                <div class="py-4 px-3 bg-white rounded-3 shadow-sm h-100">
                    <i class="fas fa-users fa-3x mb-3" style="color: var(--gold);"></i>
                    <h2 class="fw-bold mb-1" style="color: var(--puce);">500K+</h2>
                    <p class="mb-0">Clients Satisfaits</p>
                </div>
            </div>
            <div class="col-md-3 col-6 text-center mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="300">
                <div class="py-4 px-3 bg-white rounded-3 shadow-sm h-100">
                    <i class="fas fa-trophy fa-3x mb-3" style="color: var(--gold);"></i>
                    <h2 class="fw-bold mb-1" style="color: var(--puce);">15</h2>
                    <p class="mb-0">Récompenses</p>
                </div>
            </div>
        </div>
    </div>
</section>