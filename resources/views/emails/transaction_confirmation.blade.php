<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background-color: #2563eb;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 20px;
            font-weight: bold;
        }
        .content {
            padding: 20px;
        }
        .transaction-details {
            background: #f9fafb;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .transaction-details div {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .transaction-details span {
            font-weight: bold;
        }
        .next-steps {
            background: #e0f2fe;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .contact {
            text-align: center;
            padding: 20px;
        }
        .contact a {
            color: #2563eb;
            text-decoration: none;
            display: block;
            margin: 5px 0;
        }
        .footer {
            background: #f3f4f6;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #6b7280;
        }
        /* Responsiveness */
        @media (max-width: 480px) {
            .transaction-details div {
                flex-direction: column;
                align-items: flex-start;
            }
            .transaction-details span {
                margin-top: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">Konfirmasi Transaksi</div>
        <div class="content">
            <p style="text-align: center; font-size: 18px; font-weight: bold; color: #374151;">Terima Kasih Atas Transaksi Anda!</p>
            <p style="text-align: center; color: #6b7280;">Berikut adalah detail transaksi Anda:</p>
            <div class="transaction-details">
                <div><span>Kode Transaksi:</span> <span>{{ $transaction->transaction_code }}</span></div>
                <div><span>Nama:</span> <span>{{ $transaction->name }}</span></div>
                <div><span>Email:</span> <span>{{ $transaction->email }}</span></div>
                <div><span>Total Harga:</span> <span style="color: #2563eb;">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</span></div>
                <div><span>Status:</span> <span style="background: #fef3c7; padding: 5px 10px; border-radius: 5px;">{{ $transaction->status }}</span></div>
            </div>
            <div class="next-steps">
                <p style="font-weight: bold; color: #2563eb;">Langkah Selanjutnya:</p>
                <ul style="color: #1e40af; padding-left: 20px;">
                    <li>Kami akan memproses pesanan Anda segera</li>
                    <li>Anda akan menerima email pembaruan status</li>
                    <li>Perkiraan pengiriman dalam 2-3 hari kerja</li>
                </ul>
            </div>
        </div>
        <div class="contact">
            <p style="color: #6b7280;">Jika Anda memiliki pertanyaan, silakan hubungi kami:</p>
            <a href="mailto:support@example.com">📧 support@example.com</a>
            <a href="tel:+6281234567890">📞 +62 812-3456-7890</a>
        </div>
        <div class="footer">&copy; 2025 Achieved.id. Semua hak dilindungi.</div>
    </div>
</body>
</html>
