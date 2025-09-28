<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #333; }
        .header { text-align: center; margin-bottom: 20px; }
        .company-details { text-align: center; margin-bottom: 20px; }
        .invoice-title { font-size: 20px; font-weight: bold; margin-top: 10px; }
        .info-section { margin-bottom: 20px; }
        .info-block { display: inline-block; width: 48%; vertical-align: top; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #000; }
        th, td { padding: 8px; text-align: left; }
        .right { text-align: right; }
        .totals { margin-top: 20px; width: 100%; }
        .totals td { padding: 5px; }
        .footer { margin-top: 50px; text-align: right; }
        
        /* Style untuk foto profil bulat */
        .profile-image-container {
            display: inline-block;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid #333;
            margin-bottom: 10px;
        }
        .profile-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
        .no-image {
            width: 100%;
            height: 100%;
            background: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            color: #666;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="company-details">
            @foreach ($dataAdmin as $admin)
                <!-- Container untuk foto profil bulat -->
                <div class="profile-image-container">
                    @if(isset($admin->image_base64))
                        <img src="{{ $admin->image_base64 }}" 
                             alt="Admin Photo" 
                             class="profile-image">
                    @else
                        <div class="no-image">
                            No Photo
                        </div>
                    @endif
                </div>
                
                <br>
                <strong>{{ $admin->name }}</strong>
                <br>{{ $admin->addres }}<br>
                {{ $admin->phone }} | {{ $admin->email }}
            @endforeach
        </div>
        <div class="invoice-title">INVOICE</div>
    </div>

    <!-- Info Customer & Invoice -->
    <div class="info-section">
        <div class="info-block">
            <strong>Kepada:</strong><br>
            {{ $transaction->order->user->name ?? 'Nama Customer' }}<br>
            {{ $transaction->order->user->addres ?? 'Alamat Customer' }}<br>
            {{ $transaction->order->user->phone ?? '-' }}
        </div>
        <div class="info-block">
            <strong>Invoice:</strong>#00{{ $cts->order_id +1 }}NAZARCH<br>
            <strong>Tanggal:</strong> {{ $order->created_at->format('d/m/Y') }}<br>
            <strong>Status:</strong> {{ ucfirst($order->status ?? 'Pending') }}
        </div>
    </div>

    <!-- Tabel Detail Pesanan -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Panjang (m)</th>
                <th>Lebar (m)</th>
                <th>Luas (m²)</th>
                <th>Harga / m²</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>{{ $order->category->nama_categori }}</td>
                <td>{{ $order->width }}</td>
                <td>{{ $order->length }}</td>
                <td>{{ $order->total_area }}</td>
                <td class="right">Rp {{ number_format($order->category->base_price, 0, ',', '.') }}</td>
                <td class="right">Rp {{ number_format($order->price, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Ringkasan Total -->
    <table class="totals">
        <tr>
            <td class="right"><strong>Total Pembayaran:</strong></td>
            <td class="right"><strong>Rp {{ number_format($order->price, 0, ',', '.') }}</strong></td>
        </tr>
    </table>

    <!-- Footer / Tanda Tangan -->
    <div class="footer">
        Hormat Kami,<br><br><br>
        @foreach ($dataAdmin as $admin)
            <strong>({{$admin->name}})</strong>
        @endforeach
    </div>
</body>
</html>