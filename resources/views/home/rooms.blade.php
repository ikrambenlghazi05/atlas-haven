<!-- Custom CSS for Luxury Design -->
<style>
:root {
    --luxury-gold: #DBB777;
    --luxury-gold-light: #E8C896;
    --luxury-gold-dark: #C5A355;
    --luxury-dark: #1a1a1a;
    --luxury-gray: #f8f9fa;
    --luxury-white: #ffffff;
    --luxury-shadow: 0 10px 30px rgba(219, 183, 119, 0.1);
    --luxury-shadow-hover: 0 20px 40px rgba(219, 183, 119, 0.2);
}

.luxury-rooms-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    position: relative;
    overflow: hidden;
}

.luxury-rooms-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><defs><pattern id="moroccan" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M20,0 Q30,10 20,20 Q10,10 20,0 M0,20 Q10,30 20,20 Q10,10 0,20 M20,40 Q30,30 20,20 Q10,30 20,40 M40,20 Q30,30 20,20 Q30,10 40,20" fill="none" stroke="%23DBB777" stroke-width="0.5" opacity="0.1"/><circle cx="20" cy="20" r="2" fill="%23DBB777" opacity="0.05"/></pattern></defs><rect width="200" height="200" fill="url(%23moroccan)"/></svg>');
    pointer-events: none;
}

.section-title {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    font-size: 3.5rem;
    color: var(--luxury-dark);
    margin-bottom: 1rem;
    position: relative;
    animation: slideInUp 0.8s ease-out;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 3px;
    background: linear-gradient(90deg, var(--luxury-gold), var(--luxury-gold-light));
    border-radius: 2px;
}

.section-title::before {
    content: '✦';
    position: absolute;
    left: -30px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--luxury-gold);
    font-size: 1.5rem;
    animation: sparkle 2s ease-in-out infinite;
}

@keyframes sparkle {
    0%, 100% { opacity: 0.5; transform: translateY(-50%) scale(1); }
    50% { opacity: 1; transform: translateY(-50%) scale(1.2); }
}

.section-lead {
    font-size: 1.25rem;
    color: #6c757d;
    font-weight: 300;
    letter-spacing: 0.5px;
    animation: slideInUp 0.8s ease-out 0.2s both;
}

.luxury-room-card {
    background: var(--luxury-white);
    border: none;
    border-radius: 20px;
    box-shadow: var(--luxury-shadow);
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    overflow: hidden;
    position: relative;
    animation: fadeInUp 0.6s ease-out;
}

.luxury-room-card:hover {
    transform: translateY(-15px);
    box-shadow: var(--luxury-shadow-hover);
}

.luxury-room-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--luxury-gold), var(--luxury-gold-light));
    transform: scaleX(0);
    transition: transform 0.4s ease;
}

.luxury-room-card::after {
    content: '';
    position: absolute;
    top: 15px;
    right: 15px;
    width: 30px;
    height: 30px;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23DBB777" opacity="0.2"><path d="M12,2L15.09,8.26L22,9L17,14L18.18,21L12,17.77L5.82,21L7,14L2,9L8.91,8.26L12,2Z"/></svg>') no-repeat center;
    background-size: contain;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.luxury-room-card:hover::before {
    transform: scaleX(1);
}

.luxury-room-card:hover::after {
    opacity: 1;
}

.luxury-room-img {
    height: 250px;
    object-fit: cover;
    transition: transform 0.4s ease;
    position: relative;
}

.luxury-room-card:hover .luxury-room-img {
    transform: scale(1.05);
}

.img-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(219, 183, 119, 0.1) 0%, rgba(0,0,0,0.1) 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.luxury-room-card:hover .img-overlay {
    opacity: 1;
}

.card-body {
    padding: 2rem;
    position: relative;
}

.luxury-room-title {
    font-family: 'Playfair Display', serif;
    font-weight: 600;
    font-size: 1.5rem;
    color: var(--luxury-dark);
    margin-bottom: 0.5rem;
}

.luxury-location {
    color: #6c757d;
    font-size: 0.95rem;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
}

.luxury-location i {
    color: var(--luxury-gold);
    margin-right: 0.5rem;
}

.moroccan-accent {
    color: var(--luxury-gold);
    margin-left: 0.5rem;
    font-size: 0.8rem;
    animation: sparkle 3s ease-in-out infinite;
}

.price-rating-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
    padding: 1rem;
    background: linear-gradient(135deg, rgba(219, 183, 119, 0.05) 0%, rgba(248, 249, 250, 0.8) 100%);
    border-radius: 12px;
    border: 1px solid rgba(219, 183, 119, 0.1);
}

.luxury-price {
    font-weight: 700;
    font-size: 1.25rem;
    color: var(--luxury-gold-dark);
    font-family: 'Playfair Display', serif;
}

.luxury-stars {
    display: flex;
    gap: 2px;
}

.luxury-stars i {
    color: var(--luxury-gold);
    font-size: 0.9rem;
    transition: transform 0.2s ease;
}

.luxury-stars i:hover {
    transform: scale(1.2);
}

.luxury-amenities {
    margin-bottom: 1.5rem;
}

.luxury-amenity-badge {
    background: linear-gradient(135deg, var(--luxury-gold) 0%, var(--luxury-gold-light) 100%);
    color: white;
    border: none;
    border-radius: 20px;
    padding: 0.5rem 1rem;
    margin: 0.25rem;
    font-size: 0.85rem;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.luxury-amenity-badge:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(219, 183, 119, 0.3);
}

.luxury-amenity-badge i {
    margin-right: 0.5rem;
}

.luxury-description {
    color: #6c757d;
    line-height: 1.6;
    font-size: 0.95rem;
}

.luxury-btn {
    background: linear-gradient(135deg, var(--luxury-gold) 0%, var(--luxury-gold-dark) 100%);
    border: none;
    color: white;
    padding: 0.75rem 2rem;
    border-radius: 25px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.luxury-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.luxury-btn:hover::before {
    left: 100%;
}

.luxury-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(219, 183, 119, 0.4);
}

.no-rooms-message {
    background: linear-gradient(135deg, rgba(219, 183, 119, 0.05) 0%, rgba(248, 249, 250, 0.8) 100%);
    border: 2px dashed var(--luxury-gold);
    border-radius: 15px;
    padding: 3rem;
    text-align: center;
    color: var(--luxury-gold-dark);
    font-size: 1.1rem;
}

/* Animations */
@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Staggered animation for cards */
.col-md-4:nth-child(1) .luxury-room-card { animation-delay: 0.1s; }
.col-md-4:nth-child(2) .luxury-room-card { animation-delay: 0.2s; }
.col-md-4:nth-child(3) .luxury-room-card { animation-delay: 0.3s; }

/* Responsive Design */
@media (max-width: 768px) {
    .section-title {
        font-size: 2.5rem;
    }
    
    .card-body {
        padding: 1.5rem;
    }
    
    .luxury-room-img {
        height: 200px;
    }
}

/* Loading animation for images */
.luxury-room-img {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: loading 1.5s infinite;
}

@keyframes loading {
    0% { background-position: 200% 0; }
    100% { background-position: -200% 0; }
}
</style>

<!-- Rooms Section -->
<section id="rooms" class="py-5 luxury-rooms-section">
    <div class="container py-5">
        <h2 class="text-center section-title">Nos Chambres d'Exception</h2>
        <p class="text-center section-lead mb-5">Découvrez un confort et un luxe inégalés dans nos suites prestigieuses</p>
        
        <div class="row g-4">
          <?php
        // Get featured rooms from the database
        $rooms = App\Models\Room::with(['images', 'amenities', 'type'])->take(3)->get();

        foreach ($rooms as $room) {
            // Get the featured image or the first image if no featured image
            $image = $room->featured_image ? 'storage/'.$room->featured_image->image_path :
                'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80';

            // Generate stars based on average rating
            $rating = $room->averageRating();
            $starsHtml = '';

            for ($i = 1; $i <= 5; $i++) {
                $starsHtml .= '<i class="fas fa-star"></i>';
            }

            // Get room amenities (limited to 3)
            $amenitiesHtml = '';
            foreach ($room->amenities->take(3) as $amenity) {
                $icon = 'fas fa-concierge-bell'; // Default icon

                // Map common amenity names to icons
                $amenityIcons = [
                    'wifi' => 'fas fa-wifi',
                    'tv' => 'fas fa-tv',
                    'air conditioning' => 'fas fa-snowflake',
                    'kitchen' => 'fas fa-coffee',
                    'pool' => 'fas fa-swimming-pool',
                    'jacuzzi' => 'fas fa-hot-tub',
                    'butler' => 'fas fa-concierge-bell'
                ];

                // Check if we have a specific icon for this amenity
                foreach ($amenityIcons as $keyword => $specificIcon) {
                    if (stripos($amenity->name, $keyword) !== false) {
                        $icon = $specificIcon;
                        break;
                    }
                }

                $amenitiesHtml .= '<span class="badge luxury-amenity-badge"><i class="' . $icon . '"></i>' . htmlspecialchars($amenity->name) . '</span>';
            }

            // If no amenities found, show some defaults
            if (empty($amenitiesHtml)) {
                $amenitiesHtml = '
                    <span class="badge luxury-amenity-badge"><i class="fas fa-wifi"></i>WiFi</span>
                    <span class="badge luxury-amenity-badge"><i class="fas fa-tv"></i>TV</span>
                    <span class="badge luxury-amenity-badge"><i class="fas fa-snowflake"></i>Climatisation</span>
                ';
            }

            // Get hotel name and location
            $hotelName = $room->hotel ? htmlspecialchars($room->hotel->name) : '';
            $location = $room->hotel ?
                htmlspecialchars($room->hotel->city) . ', ' . htmlspecialchars($room->hotel->country) :
                'Plusieurs destinations';
        ?>
            <div class="col-md-4">
                <div class="card luxury-room-card h-100">
                    <div class="position-relative overflow-hidden">
                        <img src="<?php echo $image; ?>" class="card-img-top luxury-room-img" alt="<?php echo htmlspecialchars($room->type->name ?? 'Chambre'); ?>">
                        <div class="img-overlay"></div>
                    </div>
                    
                    <div class="card-body">
                        <h5 class="luxury-room-title"><?php echo htmlspecialchars($room->type->name ?? 'Chambre Standard'); ?></h5>
                        
                        <p class="luxury-location">
                            <i class="fas fa-map-marker-alt"></i><?php echo $location; ?>
                            <span class="moroccan-accent">✦</span>
                        </p>
                        
                        <div class="price-rating-container">
                            <span class="luxury-price"><?php echo number_format($room->price_per_night, 2); ?> MAD<small>/nuit</small></span>
                            <div class="luxury-stars">
                                <?php echo $starsHtml; ?>
                            </div>
                        </div>
                        
                        <div class="luxury-amenities">
                            <?php echo $amenitiesHtml; ?>
                        </div>
                        
                        <p class="luxury-description"><?php echo htmlspecialchars($room->description); ?></p>
                    </div>
                </div>
            </div>
            <?php
        }

        // Show placeholder if no rooms found
        if ($rooms->isEmpty()) {
        ?>
            <div class="col-12">
                <div class="no-rooms-message">
                    <i class="fas fa-bed mb-3" style="font-size: 3rem; color: var(--luxury-gold);"></i>
                    <h4>Aucune chambre disponible pour le moment</h4>
                    <p>Nos suites d'exception seront bientôt disponibles. Revenez nous voir prochainement.</p>
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