<!-- Custom CSS for Luxury Hotels Design -->
<style>
:root {
    --luxury-gold: #DBB777;
    --luxury-gold-light: #E8C896;
    --luxury-gold-dark: #C5A355;
    --luxury-dark: #1a1a1a;
    --luxury-gray: #f8f9fa;
    --luxury-white: #ffffff;
    --luxury-cream: #faf8f5;
    --luxury-shadow: 0 10px 30px rgba(219, 183, 119, 0.1);
    --luxury-shadow-hover: 0 20px 40px rgba(219, 183, 119, 0.2);
}

.luxury-hotels-section {
    background: linear-gradient(135deg, var(--luxury-cream) 0%, #f5f2ed 100%);
    position: relative;
    overflow: hidden;
}

.luxury-hotels-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><defs><pattern id="moroccan-hotels" width="50" height="50" patternUnits="userSpaceOnUse"><path d="M25,0 Q35,10 25,25 Q15,15 25,0 M0,25 Q10,35 25,25 Q15,15 0,25 M25,50 Q35,40 25,25 Q15,35 25,50 M50,25 Q40,35 25,25 Q35,15 50,25" fill="none" stroke="%23DBB777" stroke-width="0.3" opacity="0.08"/><circle cx="25" cy="25" r="1.5" fill="%23DBB777" opacity="0.04"/><path d="M12.5,12.5 L37.5,12.5 L37.5,37.5 L12.5,37.5 Z" fill="none" stroke="%23DBB777" stroke-width="0.2" opacity="0.06"/></pattern></defs><rect width="200" height="200" fill="url(%23moroccan-hotels)"/></svg>');
    pointer-events: none;
}

.hotels-section-title {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    font-size: 3.5rem;
    color: var(--luxury-dark);
    margin-bottom: 1rem;
    position: relative;
    animation: slideInUp 0.8s ease-out;
}

.hotels-section-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 3px;
    background: linear-gradient(90deg, var(--luxury-gold), var(--luxury-gold-light));
    border-radius: 2px;
}

.hotels-section-title::before {
    content: '🕌';
    position: absolute;
    left: -50px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 2rem;
    animation: sway 3s ease-in-out infinite;
}

@keyframes sway {
    0%, 100% { transform: translateY(-50%) rotate(-5deg); }
    50% { transform: translateY(-50%) rotate(5deg); }
}

.hotels-section-lead {
    font-size: 1.25rem;
    color: #6c757d;
    font-weight: 300;
    letter-spacing: 0.5px;
    animation: slideInUp 0.8s ease-out 0.2s both;
}

.luxury-hotel-card {
    background: var(--luxury-white);
    border: none;
    border-radius: 25px;
    box-shadow: var(--luxury-shadow);
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    overflow: hidden;
    position: relative;
    animation: fadeInUp 0.6s ease-out;
    border: 2px solid transparent;
}

.luxury-hotel-card:hover {
    transform: translateY(-20px) scale(1.02);
    box-shadow: var(--luxury-shadow-hover);
    border-color: rgba(219, 183, 119, 0.3);
}

.luxury-hotel-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: linear-gradient(90deg, var(--luxury-gold), var(--luxury-gold-light), var(--luxury-gold));
    transform: scaleX(0);
    transition: transform 0.5s ease;
    z-index: 1;
}

.luxury-hotel-card::after {
    content: '';
    position: absolute;
    top: 20px;
    right: 20px;
    width: 35px;
    height: 35px;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23DBB777" opacity="0.15"><path d="M12,2L13.09,8.26L22,9L17,14L18.18,21L12,17.77L5.82,21L7,14L2,9L8.91,8.26L12,2Z"/></svg>') no-repeat center;
    background-size: contain;
    opacity: 0;
    transition: all 0.4s ease;
    z-index: 2;
}

.luxury-hotel-card:hover::before {
    transform: scaleX(1);
}

.luxury-hotel-card:hover::after {
    opacity: 1;
    transform: rotate(360deg);
}

.luxury-hotel-img {
    height: 280px;
    object-fit: cover;
    transition: transform 0.5s ease;
    position: relative;
}

.luxury-hotel-card:hover .luxury-hotel-img {
    transform: scale(1.08);
}

.hotel-img-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(219, 183, 119, 0.15) 0%, rgba(0,0,0,0.1) 100%);
    opacity: 0;
    transition: opacity 0.4s ease;
}

.luxury-hotel-card:hover .hotel-img-overlay {
    opacity: 1;
}

.hotel-card-body {
    padding: 2.5rem;
    position: relative;
}

.luxury-hotel-title {
    font-family: 'Playfair Display', serif;
    font-weight: 600;
    font-size: 1.6rem;
    color: var(--luxury-dark);
    margin-bottom: 0.8rem;
    position: relative;
}

.luxury-hotel-title::after {
    content: '✦';
    position: absolute;
    right: -25px;
    top: 0;
    color: var(--luxury-gold);
    font-size: 0.8rem;
    opacity: 0;
    transition: all 0.3s ease;
}

.luxury-hotel-card:hover .luxury-hotel-title::after {
    opacity: 1;
    right: -20px;
}

.luxury-hotel-location {
    color: #6c757d;
    font-size: 1rem;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    font-weight: 500;
}

.luxury-hotel-location i {
    color: var(--luxury-gold);
    margin-right: 0.8rem;
    font-size: 1.1rem;
}

.moroccan-hotel-accent {
    color: var(--luxury-gold);
    margin-left: 0.8rem;
    font-size: 0.9rem;
    animation: sparkle 4s ease-in-out infinite;
}

.luxury-hotel-stars {
    margin-bottom: 1.5rem;
    padding: 1rem;
    background: linear-gradient(135deg, rgba(219, 183, 119, 0.08) 0%, rgba(248, 249, 250, 0.6) 100%);
    border-radius: 15px;
    border: 1px solid rgba(219, 183, 119, 0.15);
    display: flex;
    justify-content: center;
    gap: 5px;
}

.luxury-hotel-stars i {
    color: var(--luxury-gold);
    font-size: 1.2rem;
    transition: all 0.3s ease;
    filter: drop-shadow(0 2px 4px rgba(219, 183, 119, 0.3));
}

.luxury-hotel-stars i:hover {
    transform: scale(1.3);
    filter: drop-shadow(0 4px 8px rgba(219, 183, 119, 0.5));
}

.luxury-hotel-description {
    color: #6c757d;
    line-height: 1.7;
    font-size: 1rem;
    position: relative;
}

.luxury-hotel-description::before {
    content: '"';
    position: absolute;
    left: -15px;
    top: -10px;
    font-size: 3rem;
    color: var(--luxury-gold);
    opacity: 0.3;
    font-family: 'Playfair Display', serif;
}

.no-hotels-message {
    background: linear-gradient(135deg, rgba(219, 183, 119, 0.08) 0%, rgba(248, 249, 250, 0.9) 100%);
    border: 2px dashed var(--luxury-gold);
    border-radius: 20px;
    padding: 4rem;
    text-align: center;
    color: var(--luxury-gold-dark);
    font-size: 1.2rem;
    position: relative;
}

.no-hotels-message::before {
    content: '🏨';
    display: block;
    font-size: 4rem;
    margin-bottom: 1rem;
    animation: bounce 2s ease-in-out infinite;
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

/* Animations */
@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes sparkle {
    0%, 100% { opacity: 0.6; transform: scale(1); }
    50% { opacity: 1; transform: scale(1.3); }
}

/* Staggered animation for hotel cards */
.col-md-4:nth-child(1) .luxury-hotel-card { animation-delay: 0.1s; }
.col-md-4:nth-child(2) .luxury-hotel-card { animation-delay: 0.3s; }
.col-md-4:nth-child(3) .luxury-hotel-card { animation-delay: 0.5s; }

/* Responsive Design */
@media (max-width: 768px) {
    .hotels-section-title {
        font-size: 2.8rem;
    }
    
    .hotels-section-title::before {
        left: -35px;
        font-size: 1.5rem;
    }
    
    .hotel-card-body {
        padding: 2rem;
    }
    
    .luxury-hotel-img {
        height: 220px;
    }
}

/* Premium hover effects */
.luxury-hotel-card {
    position: relative;
}

.luxury-hotel-card::before {
    background: linear-gradient(45deg, var(--luxury-gold), var(--luxury-gold-light), var(--luxury-gold-dark), var(--luxury-gold));
    background-size: 300% 300%;
    animation: gradientShift 3s ease infinite;
}

@keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}
</style>

<!-- Hotels Section -->
<section id="hotels" class="py-5 luxury-hotels-section">
    <div class="container py-5">
        <h2 class="text-center hotels-section-title">Nos Établissements Phares</h2>
        <p class="text-center hotels-section-lead mb-5">Découvrez notre sélection exclusive de propriétés premium au cœur du Maroc</p>
        
        <div class="row g-4">
            <?php
        // Get featured hotels from the database
        $hotels = App\Models\Hotel::with('images')->take(3)->get();

        foreach ($hotels as $hotel) {
            // Get the featured image or the first image if no featured image
            $image = $hotel->featuredImage() ?: ($hotel->images->first() ?: null);
            $imagePath = $image ? 'storage/'.$image->image_path : 'https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80';

            // Generate 5 stars in gold
            $starsHtml = '';
            for ($i = 1; $i <= 5; $i++) {
                $starsHtml .= '<i class="fas fa-star"></i>';
            }
        ?>
            <div class="col-md-4">
                <div class="card luxury-hotel-card h-100">
                    <div class="position-relative overflow-hidden">
                        <img src="<?php echo $imagePath; ?>" class="card-img-top luxury-hotel-img" alt="<?php echo htmlspecialchars($hotel->name); ?>">
                        <div class="hotel-img-overlay"></div>
                    </div>
                    
                    <div class="card-body hotel-card-body">
                        <h5 class="luxury-hotel-title"><?php echo htmlspecialchars($hotel->name); ?></h5>
                        
                        <p class="luxury-hotel-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <?php echo htmlspecialchars($hotel->city) . ', ' . htmlspecialchars($hotel->country); ?>
                            <span class="moroccan-hotel-accent">✦</span>
                        </p>
                        
                        <div class="luxury-hotel-stars">
                            <?php echo $starsHtml; ?>
                        </div>
                        
                        <p class="luxury-hotel-description"><?php echo htmlspecialchars($hotel->description); ?></p>
                    </div>
                </div>
            </div>
            <?php
        }

        // Show placeholder if no hotels found
        if ($hotels->isEmpty()) {
        ?>
            <div class="col-12">
                <div class="no-hotels-message">
                    <h4>Aucun établissement disponible pour le moment</h4>
                    <p>Nos hôtels de prestige seront bientôt disponibles. Découvrez l'hospitalité marocaine exceptionnelle.</p>
                </div>
            </div>
            <?php
        }
        ?>
        </div>
    </div>
</section>

<!-- Font Awesome and Google Fonts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">