<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beri Ulasan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
        }

        .rating input {
            display: none;
        }

        .rating label {
            font-size: 35px;
            color: #ccc;
            cursor: pointer;
            transition: .2s;
        }

        .rating input:checked ~ label,
        .rating label:hover,
        .rating label:hover ~ label {
            color: #ffc107;
        }
    </style>
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="card shadow">

                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Beri Penilaian Event</h4>
                </div>

                <div class="card-body">

                    <h5>{{ $transaction->event->title }}</h5>

                    <p class="text-muted">
                        {{ \Carbon\Carbon::parse($transaction->event->date)->format('d M Y') }}
                    </p>

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('review.store',$transaction->id) }}" method="POST">

                        @csrf

                        <div class="mb-4 text-center">

                            <label class="form-label fw-bold">
                                Rating
                            </label>

                            <div class="rating">

                                @for($i=5;$i>=1;$i--)

                                    <input
                                        type="radio"
                                        id="star{{ $i }}"
                                        name="rating"
                                        value="{{ $i }}"
                                    >

                                    <label for="star{{ $i }}">
                                        ★
                                    </label>

                                @endfor

                            </div>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Testimoni
                            </label>

                            <textarea
                                name="review"
                                rows="5"
                                class="form-control"
                                placeholder="Bagaimana pengalaman Anda mengikuti event ini?"
                            >{{ old('review') }}</textarea>

                        </div>

                        <button class="btn btn-success w-100">
                            Kirim Review
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>