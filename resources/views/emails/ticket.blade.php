<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>E-Ticket - Amikom Event Hub</title>

    <style>
        body {
            font-family: Helvetica, Arial, sans-serif;
            background: #4f46e5;
            margin: 0;
            padding: 40px 20px;
            color: white;
        }

        .container {
            max-width: 470px;
            margin: auto;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;
            font-size: 30px;
            font-weight: bold;
        }

        .header p {
            margin-top: 10px;
            color: #dbeafe;
        }

        .ticket {
            background: white;
            color: #1e293b;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,.25);
        }

        .ticket-top {
            background: #eef2ff;
            padding: 30px;
            text-align: center;
            border-bottom: 2px dashed #c7d2fe;
        }

        .ticket-top small {
            color: #4f46e5;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .ticket-top h2 {
            margin-top: 10px;
            margin-bottom: 0;
            font-size: 25px;
        }

        .body {
            padding: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 12px 0;
            vertical-align: top;
        }

        .label {
            color: #94a3b8;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .value {
            font-weight: bold;
            font-size: 15px;
            color: #0f172a;
        }

        .status {
            color: #16a34a;
        }

        .qr-box {
            margin-top: 25px;
            background: #f8fafc;
            border-radius: 18px;
            padding: 25px;
            text-align: center;
        }

        .qr-box img {
            background: white;
            padding: 12px;
            border-radius: 10px;
        }

        .scan-title {
            font-weight: bold;
            margin-bottom: 10px;
            color: #334155;
        }

        .scan-desc {
            color: #64748b;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .order-id {
            margin-top: 15px;
            font-family: monospace;
            font-size: 15px;
            font-weight: bold;
            color: #0f172a;
        }

        .footer {
            padding: 25px;
            text-align: center;
            font-size: 12px;
            color: #64748b;
        }

        .footer p {
            margin: 6px 0;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>🎉 Pembayaran Berhasil!</h1>
        <p>E-Ticket Anda telah berhasil diterbitkan.</p>
    </div>

    <div class="ticket">

        <div class="ticket-top">
            <small>Official E-Ticket</small>

            <h2>
                {{ $transaction->event->title }}
            </h2>
        </div>

        <div class="body">

            <table>

                <tr>
                    <td width="50%">
                        <div class="label">Nama Peserta</div>

                        <div class="value">
                            {{ $transaction->customer_name }}
                        </div>
                    </td>

                    <td>
                        <div class="label">Status</div>

                        <div class="value status">
                            {{ ucfirst($transaction->status) }}
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="label">Tanggal Event</div>

                        <div class="value">
                            {{ \Carbon\Carbon::parse($transaction->event->date)->format('d M Y') }}
                        </div>
                    </td>

                    <td>
                        <div class="label">Waktu</div>

                        <div class="value">
                            {{ \Carbon\Carbon::parse($transaction->event->date)->format('H:i') }}
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="label">Lokasi</div>

                        <div class="value">
                            {{ $transaction->event->location }}
                        </div>
                    </td>

                    <td>
                        <div class="label">Order ID</div>

                        <div class="value">
                            {{ $transaction->order_id }}
                        </div>
                    </td>
                </tr>

            </table>

            <div class="qr-box">

                <div class="scan-title">
                    Scan QR Code
                </div>

                <div class="scan-desc">
                    Tunjukkan QR Code ini kepada panitia saat proses check-in.
                </div>

                <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data={{ urlencode($transaction->order_id) }}"
                    width="180">

                <div class="order-id">
                    {{ $transaction->order_id }}
                </div>

            </div>

        </div>

        <div class="footer">

            <p>
                Simpan E-Ticket ini hingga acara selesai.
            </p>

            <p>
                QR Code hanya berlaku untuk satu peserta.
            </p>

            <p>
                © {{ date('Y') }} Amikom Event Hub
            </p>

        </div>

    </div>

</div>

</body>

</html>