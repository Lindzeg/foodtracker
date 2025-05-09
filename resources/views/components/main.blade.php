@props([ 'amount', 'entries', 'products', 'units'])

<main>
    <section class="progress-container">

        <svg width="722" height="272" viewBox="0 0 722 272" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20.5 252C20.5 252 76.8375 20.7252 357.838 20.7252C647.338 20.7252 702 243 702 243" stroke="white" stroke-width="40" stroke-linecap="round"/>
            <path d="M19.002 253.545C19.002 253.545 75.2282 21.9486 351.72 23.172" stroke="#D9D9D9" stroke-width="28" stroke-linecap="round"/>
            </svg>

            <div class="text-container">
                <p id="total">Total kcal for today</p>

                @php $total = 0; @endphp

                @foreach (session('entries', []) as $entry)
                    @php
                        $subtotal = $entry['amount'] * $entry['kcal'];
                        $total += $subtotal;
                    @endphp

                @endforeach
                <p>{{ $total }}</p>
            </div>
    </section>

    <section class="table-container">
        <table>
            <thead>
              <tr>
                <th>Product</th>
                <th>Total amount</th>
                <th>Total kcal</th>
                <th>Unit</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($entries as $entry)

                <!--insert foreach loop for entries-->
                    <tr>
                        <!--insert keys -->
                        <td>{{ $entry['product_name'] ??  'no products' }}</td>
                        <td>{{ $entry['amount'] . ' ' . $entry['unit_label'] ?? 'no amount' }}</td>
                        <td>{{ $entry['total_kcal'] ?? 'no kcal' }}</td>
                        <td>{{ $entry['unit_label'] ?? 'no unit' }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </section>
</main>
