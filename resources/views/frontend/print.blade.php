<!doctype html>
<html lang="en">
    <head>
        <title></title>
        <style>
            *{
                font-family: Arial, Helvetica, sans-serif
            }
        </style>
    </head>
<body>

    <!-- Info -->
    <!-- Title -->
    <h1>SHOPPING <span style="color:#dbb681">HOUSE</span></h1>
    <!-- End Title -->
    <table>
        <tr>
            <td>NAME</td>
            <td>:</td>
            <td>{{ strtoupper($user->name) }}</td>
        </tr>
        <tr>
            <td>PHONE</td>
            <td>:</td>
            <td>{{ $user->phone }}</td>
        </tr>
        <tr>
            <td>ADDRESS</td>
            <td>:</td>
            <td>{{ strtoupper($user->address) }}</td>
        </tr>
        @foreach($purchase as $_data)
        <tr>
            <td>DATE</td>
            <td>:</td>
            <td>{{ $_data->date }}</td>
        </tr>
        <tr>
            <td>PAYMENT METHOD</td>
            <td>:</td>
            <td>{{ strtoupper($_data->payment) }}</td>
        </tr>
        <tr>
            <td>TOTAL</td>
            <td>:</td>
            <td>Rp. {{ number_format($_data->total) }}</td>
        </tr>
        @endforeach
    </table>
    <!-- End Info -->
    <br>
    <hr>
    
    <!-- Table -->
    <table>
        <thead>
            <tr>
                <th style="width:70px; padding-bottom:5px; text-align:center">NO</th>
                <th style="width:200px; padding-bottom:5px;">ITEM NAME</th>
                <th style="width:70px; padding-bottom:5px; text-align:center">SIZE</th>
                <th style="width:100px; padding-bottom:5px; text-align:center">QTY</th>
                <th style="width:120px; padding-bottom:5px;">PRICE</th>
                <th style="width:120px; padding-bottom:5px;">TOTAL</th>
            </tr>
        </thead>
        <tbody>
        @foreach($purchasedetail as $data)
            <tr>
                <td style="text-align:center">{{ $loop->iteration }}</td>
                <td>{{ strtoupper($data->product->product_name) }}</td>
                <td style="text-align:center">{{ strtoupper($data->size) }}</td>
                <td style="text-align:center">{{ strtoupper($data->qty) }}</td>
                <td>Rp. {{ number_format($data->product->price) }}</td>
                <?php
                    $total  =   $data->product->price * $data->qty;
                ?>
                <td>Rp. {{ number_format($total) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- End Table -->
</div>

</body>
</html>