@extends('layouts/contentNavbarLayout')

@section('title', 'Tableau de bord - Analytics')

@section('vendor-style')
    @vite('resources/assets/vendor/libs/apex-charts/apex-charts.scss')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection

@section('vendor-script')
    @vite('resources/assets/vendor/libs/apex-charts/apexcharts.js')
@endsection

@section('content')
    <div class="row">
        <!-- Cartes de résumé -->
        <div class="col-lg-3 col-md-6 col-6 mb-4">
            <div class="card h-100 summary-card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                        <div class="avatar flex-shrink-0">
                            <i class="bx bx-building-house"></i>
                        </div>
                    </div>
                    <p class="mb-1">Hôtels</p>
                    <h4 class="card-title mb-3">{{ $hotelCount }}</h4>
                    <small class="text-success fw-medium"><i class='bx bx-up-arrow-alt'></i> Tous les hôtels</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6 mb-4">
            <div class="card h-100 summary-card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                        <div class="avatar flex-shrink-0">
                            <i class="bx bx-bed"></i>
                        </div>
                    </div>
                    <p class="mb-1">Chambres</p>
                    <h4 class="card-title mb-3">{{ $roomCount }}</h4>
                    <small class="text-success fw-medium"><i class='bx bx-up-arrow-alt'></i> Toutes les chambres</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6 mb-4">
            <div class="card h-100 summary-card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                        <div class="avatar flex-shrink-0">
                            <i class="bx bx-user"></i>
                        </div>
                    </div>
                    <p class="mb-1">Utilisateurs</p>
                    <h4 class="card-title mb-3">{{ $userCount }}</h4>
                    <small class="text-success fw-medium"><i class='bx bx-up-arrow-alt'></i> Tous les utilisateurs</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6 mb-4">
            <div class="card h-100 summary-card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                        <div class="avatar flex-shrink-0">
                            <i class="bx bx-calendar"></i>
                        </div>
                    </div>
                    <p class="mb-1">Réservations</p>
                    <h4 class="card-title mb-3">{{ $reservationCount }}</h4>
                    <small class="text-success fw-medium"><i class='bx bx-up-arrow-alt'></i> Toutes les réservations</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Aperçu des revenus -->
        <div class="col-xxl-8 mb-4">
            <div class="card">
                <div class="row row-bordered g-0">
                    <div class="col-lg-8">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="card-title mb-0">
                                <h5 class="m-0 me-2">Revenus mensuels</h5>
                                <small class="text-muted">Total :
                                    MAD {{ number_format(array_sum($monthlyRevenue), 2) }}</small>
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="totalRevenue" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded bx-lg text-muted"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalRevenue">
                                    <a class="dropdown-item" href="javascript:void(0);">Exporter les données</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Actualiser</a>
                                </div>
                            </div>
                        </div>
                        <div id="totalRevenueChart" class="px-3"></div>
                    </div>
                    <div class="col-lg-4 d-flex align-items-center">
                        <div class="card-body px-xl-9">
                            <div class="current-month-card text-center mb-4">
                                <h5>Revenu du mois en cours</h5>
                                <h3 class="mb-2">MAD {{ number_format($currentMonthRevenue, 2) }}</h3>
                                <span class="badge bg-{{ $revenueChange >= 0 ? 'label-success' : 'label-danger' }}">
                                    <i class='bx bx-{{ $revenueChange >= 0 ? 'up-arrow-alt' : 'down-arrow-alt' }}'></i>
                                    {{ number_format(abs($revenueChange), 2) }}%
                                </span>
                                <p class="mt-2 mb-0">par rapport au mois dernier</p>
                            </div>

                            <div class="occupancy-card text-center">
                                <h5>Taux d'occupation</h5>
                                <div id="occupancyChart"></div>
                                <h3 class="my-2">{{ number_format($occupancyRate, 2) }}%</h3>
                                <p class="mb-0">de chambres occupées aujourd'hui</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Aperçu des revenus -->

        <!-- Revenus par type de chambre -->
        <div class="col-xxl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Revenus par type de chambre</h5>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="roomTypeRevenue" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded bx-lg text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="roomTypeRevenue">
                            <a class="dropdown-item" href="javascript:void(0);">Voir les détails</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="revenueByRoomTypeChart"></div>
                </div>
            </div>
        </div>
        <!--/ Revenus par type de chambre -->
    </div>

    <div class="row">
        <!-- Réservations récentes -->
        <div class="col-md-6 col-lg-8 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Réservations récentes</h5>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="recentReservations" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded bx-lg text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="recentReservations">
                            <a class="dropdown-item" href="{{ route('admin.reservations.index') }}">Voir tout</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4">
                    <ul class="p-0 m-0">
                        @foreach ($recentReservations as $reservation)
                            <li class="d-flex align-items-center mb-4 reservation-item">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-primary">
                                        <i class='bx bx-calendar-check'></i>
                                    </span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">{{ $reservation->user->full_name }}</h6>
                                        <small class="text-muted">
                                            {{ $reservation->room->hotel->name }} -
                                            {{ $reservation->room->roomType->name }}
                                        </small>
                                    </div>
                                    <div class="user-progress text-end">
                                        <h6 class="mb-0 text-gold">MAD {{ number_format($reservation->total_price, 2) }}
                                        </h6>
                                        <small class="text-muted">
                                            {{ $reservation->check_in->format('d M') }} -
                                            {{ $reservation->check_out->format('d M') }}
                                        </small>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Réservations récentes -->

        <!-- Avis récents -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Avis récents</h5>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="recentReviews" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded bx-lg text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="recentReviews">
                            <a class="dropdown-item" href="{{ route('admin.reviews.index') }}">Voir tout</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4">
                    <ul class="p-0 m-0">
                        @foreach ($recentReviews as $review)
                            <li class="d-flex align-items-center mb-4 review-item">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-warning">
                                        <i class='bx bx-star'></i>
                                    </span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">{{ $review->user->full_name }}</h6>
                                        <small class="text-muted">{{ $review->room->hotel->name }}</small>
                                    </div>
                                    <div class="user-progress">
                                        <div class="d-flex align-items-center gap-1">
                                            <h6 class="mb-0">{{ $review->rating }}</h6>
                                            <i class='bx bxs-star text-warning'></i>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Avis récents -->
    </div>
@endsection



@section('page-script')
    @vite('resources/assets/js/dashboards-analytics.js')
    <script>
        // Pass PHP data to JavaScript
        const monthlyRevenueData = @json($monthlyRevenue);
        const revenueByRoomTypeData = @json($revenueByRoomType);

        // Initialize charts when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            // Total Revenue Chart
            const totalRevenueChartEl = document.querySelector('#totalRevenueChart');
            if (totalRevenueChartEl) {
                const totalRevenueChart = new ApexCharts(totalRevenueChartEl, {
                    series: [{
                        name: 'Revenue',
                        data: monthlyRevenueData
                    }],
                    chart: {
                        height: 300,
                        type: 'area',
                        toolbar: {
                            show: false
                        },
                        animations: {
                            enabled: true,
                            easing: 'easeinout',
                            speed: 800,
                            animateGradually: {
                                enabled: true,
                                delay: 150
                            },
                            dynamicAnimation: {
                                enabled: true,
                                speed: 350
                            }
                        }
                    },
                    colors: ['#e1a140'],
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        width: 3,
                        curve: 'smooth',
                        lineCap: 'round'
                    },
                    grid: {
                        borderColor: 'rgba(239, 207, 160, 0.2)',
                        strokeDashArray: 5,
                        padding: {
                            top: 0,
                            right: 20,
                            bottom: 0,
                            left: 20
                        }
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shade: 'dark',
                            gradientToColors: ['#e1a140'],
                            shadeIntensity: 0.5,
                            type: 'vertical',
                            opacityFrom: 0.8,
                            opacityTo: 0.2,
                            stops: [0, 100]
                        }
                    },
                    xaxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct',
                            'Nov', 'Dec'
                        ],
                        axisBorder: {
                            show: false
                        },
                        axisTicks: {
                            show: false
                        },
                        labels: {
                            style: {
                                colors: '#532200',
                                fontSize: '12px',
                                fontFamily: 'Montserrat, sans-serif'
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            style: {
                                colors: '#532200',
                                fontSize: '12px',
                                fontFamily: 'Montserrat, sans-serif'
                            },
                            formatter: function(value) {
                                return 'MAD ' + value.toLocaleString();
                            }
                        }
                    },
                    tooltip: {
                        style: {
                            fontFamily: 'Montserrat, sans-serif'
                        },
                        y: {
                            formatter: function(val) {
                                return 'MAD ' + val.toLocaleString();
                            }
                        }
                    }
                });
                totalRevenueChart.render();
            }

            // Revenue by Room Type Chart
            const revenueByRoomTypeChartEl = document.querySelector('#revenueByRoomTypeChart');
            if (revenueByRoomTypeChartEl) {
                const revenueByRoomTypeChart = new ApexCharts(revenueByRoomTypeChartEl, {
                    series: revenueByRoomTypeData.map(item => item.revenue),
                    labels: revenueByRoomTypeData.map(item => item.name),
                    chart: {
                        type: 'donut',
                        height: 300,
                        animations: {
                            enabled: true,
                            easing: 'easeinout',
                            speed: 800
                        }
                    },
                    colors: ['#e1a140', '#914110', '#532200', '#efcfa0', '#c78d4a'],
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '65%',
                                labels: {
                                    show: true,
                                    name: {
                                        fontSize: '13px',
                                        fontFamily: 'Montserrat, sans-serif',
                                        color: '#532200'
                                    },
                                    value: {
                                        fontSize: '16px',
                                        fontFamily: 'Montserrat, sans-serif',
                                        fontWeight: 600,
                                        color: '#532200',
                                        formatter: function(val) {
                                            return 'MAD ' + parseInt(val).toLocaleString();
                                        }
                                    },
                                    total: {
                                        show: true,
                                        showAlways: true,
                                        label: 'Total Revenue',
                                        fontFamily: 'Montserrat, sans-serif',
                                        color: '#532200',
                                        formatter: function(w) {
                                            return 'MAD ' + w.globals.seriesTotals.reduce((a, b) => a + b,
                                                0).toLocaleString();
                                        }
                                    }
                                }
                            }
                        }
                    },
                    legend: {
                        position: 'bottom',
                        fontFamily: 'Montserrat, sans-serif',
                        labels: {
                            colors: '#532200'
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    tooltip: {
                        style: {
                            fontFamily: 'Montserrat, sans-serif'
                        }
                    }
                });
                revenueByRoomTypeChart.render();
            }

            // Add animation classes to cards
            document.querySelectorAll('.summary-card').forEach((card, index) => {
                card.classList.add('animate__animated', 'animate__fadeInUp');
                card.style.setProperty('--animate-duration', `${0.3 + (index * 0.1)}s`);
            });
        });
    </script>
    <style>
        :root {
            --gold-primary: #e1a140;
            --gold-light: #efcfa0;
            --gold-dark: #914110;
            --puce: #532200;
            --sand-dollar: #efcfa0;
            --burnt-orange: #914110;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f9f9f9;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            background-color: white;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(239, 207, 160, 0.3);
            padding: 1.25rem 1.5rem;
            border-radius: 12px 12px 0 0 !important;
        }

        .card-title {
            color: var(--puce);
            font-weight: 600;
            margin-bottom: 0;
        }

        .summary-card {
            position: relative;
            overflow: hidden;
        }

        .summary-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background-color: var(--gold-primary);
        }

        .summary-card .avatar {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background-color: rgba(225, 161, 64, 0.1);
            color: var(--gold-primary);
            font-size: 1.5rem;
        }

        .summary-card h4 {
            font-size: 1.75rem;
            color: var(--puce);
            font-weight: 700;
            margin-top: 0.5rem;
        }

        .summary-card p {
            color: var(--puce);
            font-weight: 500;
            opacity: 0.8;
        }

        .badge {
            font-weight: 500;
            padding: 0.35em 0.65em;
            border-radius: 8px;
        }

        .badge.bg-label-success {
            background-color: rgba(40, 199, 111, 0.1) !important;
            color: #28c76f !important;
        }

        .badge.bg-label-danger {
            background-color: rgba(234, 84, 85, 0.1) !important;
            color: #ea5455 !important;
        }

        .reservation-item,
        .review-item {
            transition: all 0.3s ease;
            padding: 0.75rem 1rem;
            border-radius: 10px;
        }

        .reservation-item:hover,
        .review-item:hover {
            background-color: rgba(239, 207, 160, 0.1);
            transform: translateX(5px);
        }

        .avatar-initial {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
        }

        .avatar-initial.bg-label-primary {
            background-color: rgba(225, 161, 64, 0.1) !important;
            color: var(--gold-primary) !important;
        }

        .avatar-initial.bg-label-warning {
            background-color: rgba(255, 159, 67, 0.1) !important;
            color: var(--gold-primary) !important;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 0.5rem;
        }

        .dropdown-item {
            border-radius: 6px;
            padding: 0.5rem 1rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .dropdown-item:hover {
            background-color: rgba(239, 207, 160, 0.2);
            color: var(--gold-dark);
        }

        .current-month-card {
            background: linear-gradient(135deg, rgba(225, 161, 64, 0.1) 0%, rgba(239, 207, 160, 0.1) 100%);
            border-radius: 12px;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .current-month-card::after {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 150px;
            height: 150px;
            background: radial-gradient(circle, rgba(225, 161, 64, 0.1) 0%, rgba(225, 161, 64, 0) 70%);
            border-radius: 50%;
        }

        .current-month-card h3 {
            font-size: 2rem;
            color: var(--gold-primary);
            font-weight: 700;
        }

        .occupancy-card {
            background: linear-gradient(135deg, rgba(83, 34, 0, 0.05) 0%, rgba(239, 207, 160, 0.05) 100%);
            border-radius: 12px;
            padding: 1.5rem;
        }

        .occupancy-card h3 {
            font-size: 2rem;
            color: var(--puce);
            font-weight: 700;
        }
    </style>
@endsection
