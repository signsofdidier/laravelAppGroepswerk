<div>
    <div class="p-6"><h2 class="text-2xl font-bold mb-4">Mijn bestellingen</h2>
        @if ($orders->isEmpty())
            <p>Je hebt nog geen bestellingen.</p>
        @else
            <table class="w-full border-collapse table-auto">
                <thead class="bg-gray-100 dark:bg-zinc-700 text-left">
                <tr>
                    <th class="p-2">Datum</th>
                    <th class="p-2">Plan</th>
                    <th class="p-2">Bedrag</th>
                    <th class="p-2">Transactie ID</th>
                    <th class="p-2">Status</th>
                </tr>
                </thead>
                <tbody> @foreach ($orders as $order)
                    <tr class="border-b">
                        <td class="p-2">{{ $order->created_at->format('Y-m-d H:i') }}</td>
                        <td class="p-2">{{ $order->plan->name ?? '—' }}</td>
                        <td class="p-2">€{{ number_format($order->amount, 2) }}</td>
                        <td class="p-2">{{ $order->stripe_transaction_id }}</td>
                        <td class="p-2">{{ ucfirst($order->status) }}</td>
                    </tr>
                @endforeach </tbody>
            </table>
        @endif </div>
</div>
