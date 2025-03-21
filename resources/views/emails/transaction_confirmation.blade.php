<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #2563eb, #1e40af);
            color: white;
            text-align: center;
            padding: 30px 20px;
            font-size: 24px;
            font-weight: bold;
        }

        .content {
            padding: 20px;
        }

        .transaction-details {
            background: #f9fafb;
            padding: 20px;
            border-radius: 8px;
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

        .order-items {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .order-items th,
        .order-items td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        .order-items th {
            background-color: #f3f4f6;
            font-weight: bold;
            color: #374151;
        }

        .order-items td {
            color: #6b7280;
        }

        .order-items tfoot td {
            font-weight: bold;
            color: #374151;
        }

        .next-steps {
            background: #e0f2fe;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .next-steps ul {
            list-style-type: none;
            padding-left: 0;
        }

        .next-steps li {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .next-steps li::before {
            content: "✔️";
            margin-right: 10px;
            color: #2563eb;
        }

        .contact {
            text-align: center;
            padding: 20px;
            background: #f9fafb;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .contact a {
            color: #2563eb;
            text-decoration: none;
            display: inline-block;
            margin: 5px 0;
            padding: 10px 20px;
            border: 1px solid #2563eb;
            border-radius: 5px;
            transition: background 0.3s, color 0.3s;
        }

        .contact a:hover {
            background: #2563eb;
            color: white;
        }

        .footer {
            background: #f3f4f6;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #6b7280;
        }

        .cta-button {
            display: inline-block;
            margin: 20px 0;
            padding: 12px 24px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background 0.3s;
        }

        .cta-button:hover {
            background: #1e40af;
        }

        .status-completed {
            background: #d1fae5;
            color: #065f46;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
            padding: 5px 10px;
            border-radius: 5px;
        }

        /* Responsive Styles */
        @media (max-width: 480px) {
            .header {
                padding: 20px 10px;
                font-size: 20px;
            }

            .content {
                padding: 15px;
            }

            .transaction-details {
                padding: 15px;
            }

            .transaction-details div {
                flex-direction: column;
                align-items: flex-start;
            }

            .transaction-details span {
                margin-top: 5px;
            }

            .order-items th,
            .order-items td {
                padding: 8px;
                font-size: 14px;
            }

            .order-items th {
                display: none;
            }

            .order-items td {
                display: block;
                text-align: right;
            }

            .order-items td::before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
                color: #374151;
            }

            .order-items tfoot td {
                text-align: right;
            }

            .next-steps {
                padding: 15px;
            }

            .next-steps li {
                font-size: 14px;
            }

            .contact {
                padding: 15px;
            }

            .contact a {
                padding: 8px 16px;
                font-size: 14px;
            }

            .cta-button {
                padding: 10px 20px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">Konfirmasi Transaksi</div>
        <div class="content">
            <p style="text-align: center; font-size: 18px; font-weight: bold; color: #374151;">Terima Kasih Atas
                Transaksi Anda!</p>
            <p style="text-align: center; color: #6b7280;">Berikut adalah detail transaksi Anda:</p>
            <div class="transaction-details">
                <div><span>Kode Transaksi:</span> <span>{{ $transaction->transaction_code }}</span></div>
                <div><span>Nama:</span> <span>{{ $transaction->name }}</span></div>
                <div><span>Email:</span> <span>{{ $transaction->email }}</span></div>
                <div><span>Total Harga:</span> <span style="color: #2563eb;">Rp
                        {{ number_format($transaction->total_price, 0, ',', '.') }}</span></div>
                <div><span>Status:</span> <span
                        style="background: #fef3c7; padding: 5px 10px; border-radius: 5px;">{{ $transaction->status }}</span>
                </div>
            </div>

            <!-- Order Items -->
            <h3 style="font-size: 18px; font-weight: bold; color: #374151; margin-top: 20px;">Detail Produk</h3>
            <table class="order-items">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaction->products as $product)
                        @php
                            $originalPrice = $product->harga;
                            $discountedPrice = $originalPrice;

                            if ($product->promotions) {
                                if ($product->promotions->discount_type == 'percentage') {
                                    $discountedPrice =
                                        $originalPrice * (1 - $product->promotions->discount_value / 100);
                                } else {
                                    $discountedPrice = max(0, $originalPrice - $product->promotions->discount_value);
                                }
                            }

                            $subtotal = $discountedPrice * $product->pivot->quantity;
                        @endphp
                        <tr>
                            <td data-label="Produk">{{ $product->name }}</td>
                            <td data-label="Harga Satuan" class="text-right">
                                @if ($product->promotions)
                                    <span class="original-price" style="text-decoration: line-through; color: #6b7280; font-size: 0.9em;">
                                        Rp {{ number_format($originalPrice, 0, ',', '.') }}
                                    </span>
                                    <span class="discounted-price" style="color: #2563eb; font-weight: bold; display: block;">
                                        Rp {{ number_format($discountedPrice, 0, ',', '.') }}
                                    </span>
                                @else
                                    <span class="discounted-price" style="color: #2563eb; font-weight: bold;">
                                        Rp {{ number_format($originalPrice, 0, ',', '.') }}
                                    </span>
                                @endif
                            </td>
                            <td data-label="Jumlah" class="text-center">{{ $product->pivot->quantity }}</td>
                            <td data-label="Total" class="text-right">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="">
                    @if ($transaction->discount > 0)
                        <tr>
                            <td colspan="3" style="text-align: right; font-weight: bold;">Diskon:</td>
                            <td style="text-align: right; font-weight: bold;">
                                Rp {{ number_format($transaction->discount, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td colspan="3" style="text-align: right; font-weight: bold;">Total Harga:</td>
                        <td style="text-align: right; font-weight: bold;">
                            Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
                        </td>
                    </tr>
                </tfoot>
            </table>

            <!-- Call to Action -->
            <div style="text-align: center; margin-top: 20px;">
                <a href="https://achieved.my.id/cek-transaksi" class="cta-button">Lacak Pesanan</a>
            </div>

            <div class="next-steps">
                <p style="font-weight: bold; color: #2563eb;">Langkah Selanjutnya:</p>
                <ul>
                    <li>Kami akan memproses pesanan Anda segera.</li>
                    <li>Anda akan menerima email pembaruan status.</li>
                    <li>Perkiraan pengiriman dalam 2-3 hari kerja.</li>
                </ul>
            </div>
        </div>
        <div class="contact">
            <p style="color: #6b7280;">Jika Anda memiliki pertanyaan, silakan hubungi kami:</p>
            <a href="mailto:achieved.id@gmail.com">📧 achieved.id@gmail.com</a>
            <a href="tel:+6281234567890">📞 +62 812-3456-7890</a>
        </div>
        <div class="footer">&copy; 2025 Achieved.id. Semua hak dilindungi.</div>
    </div>
</body>

</html>
