@extends('account/layouts/contentNavbarLayout')

@section('title', 'Modifier un Avis')

@section('vendor-style')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection

@section('content')
    <div class="row animate__animated animate__fadeIn">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0" style="color: #532200;">
                        <i class="bx bx-edit me-2" style="color: #e1a140;"></i> Modifier un Avis
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-4 p-4" style="background-color: rgba(239, 207, 160, 0.1); border-radius: 8px;">
                        <h6 style="color: #532200;">
                            <i class="bx bx-hotel me-2" style="color: #e1a140;"></i>
                            {{ $review->room->hotel->name ?? 'N/A' }}
                        </h6>
                        <p style="color: #532200;">
                            <i class="bx bx-bed me-2" style="color: #e1a140;"></i>
                            Chambre {{ $review->room->room_number ?? 'N/A' }}
                        </p>
                        <p style="color: #532200;">
                            <i class="bx bx-calendar me-2" style="color: #e1a140;"></i>
                            {{ optional($review->reservation)->check_in->format('d M Y') ?? 'N/A' }}
                        </p>
                    </div>

                    <form action="{{ route('account.reviews.update', $review) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="rating" class="form-label" style="color: #532200;">Note</label>
                            <select class="form-select" id="rating" name="rating" required
                                style="border-color: #efcfa0;">
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ $i == $review->rating ? 'selected' : '' }}>
                                        {{ $i }} -
                                        {{ $i == 1 ? 'Médiocre' : ($i == 2 ? 'Passable' : ($i == 3 ? 'Bien' : ($i == 4 ? 'Très bien' : 'Excellent'))) }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="comment" class="form-label" style="color: #532200;">Votre Avis</label>
                            <textarea class="form-control" id="comment" name="comment" rows="5" required
                                style="border-color: #efcfa0; min-height: 150px;">{{ old('comment', $review->comment) }}</textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('account.reviews.index') }}" class="btn"
                                style="background-color: rgba(239, 207, 160, 0.1); color: #532200;">
                                <i class="bx bx-arrow-back me-1"></i> Annuler
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-save me-1"></i> Mettre à Jour
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
<style>
  .card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
  }

  .card-header {
      background-color: white;
      border-bottom: 1px solid rgba(239, 207, 160, 0.3);
      padding: 1.25rem 1.5rem;
  }

  .form-control,
  .form-select {
      border-radius: 8px !important;
      border-color: #efcfa0;
  }

  .form-control:focus,
  .form-select:focus {
      border-color: #e1a140;
      box-shadow: 0 0 0 0.25rem rgba(225, 161, 64, 0.25);
  }

  .btn-primary {
      background-color: #e1a140;
      border-color: #e1a140;
      transition: all 0.3s ease;
  }

  .btn-primary:hover {
      background-color: #914110;
      border-color: #914110;
      transform: translateY(-2px);
  }
</style>
@endsection
