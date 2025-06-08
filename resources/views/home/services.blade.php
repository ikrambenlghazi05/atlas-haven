<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services Premium - Hôtel de Luxe</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color:#dbb777;
            --secondary-color: #d4b483;
            --accent-color: #a17e4e;
            --light-color: #f8f5f0;
            --dark-color: #2c2416;
            --transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f3ef;
            color: #333;
            line-height: 1.6;
        }
        
        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--primary-color);
            border-radius: 2px;
        }
        
        .lead {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 3rem;
            color: #666;
        }
        
        /* Section Services */
        #services {
            padding: 100px 0;
            background: linear-gradient(135deg, #ffffff 0%, #f9f7f3 100%);
            position: relative;
            overflow: hidden;
        }
        
        #services::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 10px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color), var(--accent-color));
        }
        
        .service-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        
        .service-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            transition: var(--transition);
            position: relative;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeUp 0.8s forwards;
        }
        
        .service-card:nth-child(1) { animation-delay: 0.1s; }
        .service-card:nth-child(2) { animation-delay: 0.2s; }
        .service-card:nth-child(3) { animation-delay: 0.3s; }
        .service-card:nth-child(4) { animation-delay: 0.4s; }
        .service-card:nth-child(5) { animation-delay: 0.5s; }
        .service-card:nth-child(6) { animation-delay: 0.6s; }
        
        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .service-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 15px 40px rgba(232, 151, 12, 0.2);
        }
        
        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            transform: scaleX(0);
            transform-origin: left;
            transition: var(--transition);
        }
        
        .service-card:hover::before {
            transform: scaleX(1);
        }
        
        .icon-box {
            width: 100px;
            height: 100px;
            margin: 40px auto 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--light-color) 0%, #f0e6d8 100%);
            border-radius: 50%;
            position: relative;
            transition: var(--transition);
        }
        
        .service-card:hover .icon-box {
            transform: scale(1.1);
            background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%);
        }
        
        .icon-box i {
            font-size: 2.5rem;
            color: var(--primary-color);
            transition: var(--transition);
        }
        
        .service-card:hover .icon-box i {
            color: white;
            transform: scale(1.1);
        }
        
        .card-body {
            padding: 0 30px 40px;
            text-align: center;
        }
        
        .service-card h4 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: var(--dark-color);
            position: relative;
            padding-bottom: 15px;
        }
        
        .service-card h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 2px;
            background: var(--secondary-color);
            transition: var(--transition);
        }
        
        .service-card:hover h4::after {
            width: 80px;
            background: var(--primary-color);
        }
        
        .service-card p {
            color: #666;
            font-size: 1rem;
            margin-bottom: 25px;
        }
        
        .learn-more {
            display: inline-block;
            padding: 8px 25px;
            background: transparent;
            border: 2px solid var(--secondary-color);
            color: var(--primary-color);
            border-radius: 30px;
            font-weight: 500;
            text-decoration: none;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .learn-more::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0%;
            height: 100%;
            background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
            transition: var(--transition);
            z-index: -1;
        }
        
        .learn-more:hover {
            color: white;
        }
        
        .learn-more:hover::before {
            width: 100%;
        }
        
        /* Animation des éléments au défilement */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        .floating {
            animation: float 4s ease-in-out infinite;
            
             display: flex;
             align-items: center;
             justify-content: center;
             text-align: center;
              height: 100px;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .section-title {
                font-size: 2.3rem;
            }
            
            .lead {
                font-size: 1.1rem;
            }
        }
        
        @media (max-width: 768px) {
            #services {
                padding: 70px 0;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .service-grid {
                gap: 20px;
            }
        }
    </style>
</head>
<body>
    <section id="services" class="py-5">
        <div class="container py-5">
            <h2 class="text-center section-title floating">Nos Services Exclusifs</h2>
            <p class="text-center lead mb-5">Nous allons bien au-delà du simple hébergement pour vous offrir une expérience exceptionnelle</p>
            
            <div class="service-grid">
                <!-- Service 1 -->
                <div class="service-card">
                    <div class="card-body">
                        <div class="icon-box">
                            <i class="fas fa-concierge-bell fa-2x"></i>
                        </div>
                        <h4>Conciergerie 24/7</h4>
                        <p>Notre équipe de conciergerie dédiée est disponible à toute heure pour répondre à vos demandes, des réservations de restaurant à l'organisation d'événements spéciaux.</p>
                        <a href="#" class="learn-more">Découvrir</a>
                    </div>
                </div>
                
                <!-- Service 2 -->
                <div class="service-card">
                    <div class="card-body">
                        <div class="icon-box">
                            <i class="fas fa-spa fa-2x"></i>
                        </div>
                        <h4>Spa & Bien-être</h4>
                        <p>Détendez-vous et régénérez-vous avec nos services spa haut de gamme, comprenant des soins premium dispensés par des thérapeutes experts.</p>
                        <a href="#" class="learn-more">Découvrir</a>
                    </div>
                </div>
                
                <!-- Service 3 -->
                <div class="service-card">
                    <div class="card-body">
                        <div class="icon-box">
                            <i class="fas fa-utensils fa-2x"></i>
                        </div>
                        <h4>Restaurant Gastronomique</h4>
                        <p>Découvrez l'excellence culinaire dans nos restaurants primés, alliant saveurs internationales et spécialités locales marocaines.</p>
                        <a href="#" class="learn-more">Découvrir</a>
                    </div>
                </div>
                
                <!-- Service 4 - Nouveau -->
                <div class="service-card">
                    <div class="card-body">
                        <div class="icon-box">
                            <i class="fas fa-car fa-2x"></i>
                        </div>
                        <h4>Transport Privé</h4>
                        <p>Voyagez avec élégance grâce à notre service de transport privé. Voitures de luxe avec chauffeur pour tous vos déplacements en ville ou transferts aéroport.</p>
                        <a href="#" class="learn-more">Découvrir</a>
                    </div>
                </div>
                
                <!-- Service 5 - Nouveau -->
                <div class="service-card">
                    <div class="card-body">
                        <div class="icon-box">
                            <i class="fas fa-map-marked-alt fa-2x"></i>
                        </div>
                        <h4>Excursions Guidées</h4>
                        <p>Explorez les trésors de la région avec nos excursions exclusives accompagnées de guides locaux experts. Découvrez des lieux cachés et des expériences authentiques.</p>
                        <a href="#" class="learn-more">Découvrir</a>
                    </div>
                </div>
                
                <!-- Service 6 - Nouveau -->
                <div class="service-card">
                    <div class="card-body">
                        <div class="icon-box">
                            <i class="fas fa-dumbbell fa-2x"></i>
                        </div>
                        <h4>Salle de Sport Équipée</h4>
                        <p>Maintenez votre routine sportive dans notre centre de fitness moderne, ouvert 24h/24 et équipé des dernières technologies, avec coach personnel sur demande.</p>
                        <a href="#" class="learn-more">Découvrir</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Animation au défilement
        document.addEventListener('DOMContentLoaded', function() {
            const serviceCards = document.querySelectorAll('.service-card');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animationPlayState = 'running';
                    }
                });
            }, { threshold: 0.1 });
            
            serviceCards.forEach(card => {
                observer.observe(card);
            });
            
            // Effet de parallaxe léger
            window.addEventListener('scroll', function() {
                const scrolled = window.scrollY;
                const title = document.querySelector('.section-title');
                title.style.transform = `translateY(${scrolled * 0.1}px)`;
            });
        });
    </script>
</body>
</html>