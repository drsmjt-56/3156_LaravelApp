<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>E-Certificate</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 25px;
            padding: 45px;
            border: 12px solid #0f766e;
            text-align: center;
            color: #374151;
        }

        .title {
            font-size: 42px;
            font-weight: bold;
            color: #0f766e;
            letter-spacing: 3px;
            margin-bottom: 5px;
        }

        .subtitle {
            font-size: 20px;
            color: #6b7280;
            margin-bottom: 35px;
        }

        .text {
            font-size: 18px;
            margin: 8px 0;
        }

        .name {
            font-size: 34px;
            font-weight: bold;
            color: #111827;
            margin: 25px 0;
            text-transform: uppercase;
        }

        .event {
            font-size: 26px;
            color: #0f766e;
            font-weight: bold;
            margin: 20px 0;
        }

        .info {
            margin-top: 20px;
            font-size: 18px;
        }

        .certificate-id {
            margin-top: 15px;
            font-size: 14px;
            color: #6b7280;
        }

        .signature {
            margin-top: 70px;
        }

        .line {
            width: 220px;
            border-top: 1px solid #000;
            margin: auto;
            margin-bottom: 6px;
        }

        .footer {
            margin-top: 50px;
            font-size: 13px;
            color: #6b7280;
        }
    </style>
</head>

<body>

    <div class="title">
        CERTIFICATE
    </div>

    <div class="subtitle">
        OF PARTICIPATION
    </div>

    <p class="text">
        This certificate is proudly presented to
    </p>

    <div class="name">
        {{ $transaction->customer_name }}
    </div>

    <p class="text">
        In appreciation of your participation in
    </p>

    <div class="event">
        {{ $transaction->event->title }}
    </div>

    <div class="info">
        Held on
        <strong>
            {{ \Carbon\Carbon::parse($transaction->event->date)->format('d F Y') }}
        </strong>
    </div>

    <div class="info">
        Organized by
        <strong>Amikom Event Hub</strong>
    </div>

    <div class="certificate-id">
        Certificate ID :
        {{ $transaction->order_id }}
    </div>

    <div class="signature">
        <div class="line"></div>
        <strong>Admin Event Hub</strong>
    </div>

    <div class="footer">
        Thank you for your participation and contribution to the success of this event.
    </div>

</body>

</html>