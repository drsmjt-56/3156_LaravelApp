<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>E-Certificate</title>
</head>

<body style="font-family: Arial, Helvetica, sans-serif; background:#f3f4f6; padding:40px;">

    <div style="max-width:600px;margin:auto;background:white;padding:40px;border-radius:12px;">

        <h2 style="color:#0f766e;">
            🎉 E-Certificate Kehadiran
        </h2>

        <p>
            Halo <strong>{{ $transaction->customer_name }}</strong>,
        </p>

        <p>
            Terima kasih telah berpartisipasi dalam event:
        </p>

        <h3 style="color:#111827;">
            {{ $transaction->event->title }}
        </h3>

        <p>
            Sebagai bentuk apresiasi atas partisipasi Anda, kami telah melampirkan
            <strong>E-Certificate Kehadiran</strong> dalam format PDF pada email ini.
        </p>

        <p>
            Semoga ilmu dan pengalaman yang diperoleh dari acara ini dapat bermanfaat
            bagi pengembangan diri Anda.
        </p>

        <hr style="margin:30px 0;">

        <p>
            <strong>Nama Peserta :</strong><br>
            {{ $transaction->customer_name }}
        </p>

        <p>
            <strong>Event :</strong><br>
            {{ $transaction->event->title }}
        </p>

        <p>
            <strong>Tanggal Event :</strong><br>
            {{ \Carbon\Carbon::parse($transaction->event->date)->format('d F Y') }}
        </p>

        <p>
            <strong>Certificate ID :</strong><br>
            {{ $transaction->order_id }}
        </p>

        <hr style="margin:30px 0;">

        <p>
            Terima kasih telah menjadi bagian dari <strong>Amikom Event Hub</strong>.
            Kami berharap dapat bertemu kembali pada event berikutnya.
        </p>

        <br>

        <p>
            Salam hangat,
        </p>

        <p>
            <strong>Admin Amikom Event Hub</strong>
        </p>

    </div>

</body>

</html>