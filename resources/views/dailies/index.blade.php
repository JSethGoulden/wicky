<x-layout>
    <h1>Dailyscape</h1>

    <h2>Monthlies</h2>
    @if ($monthlies->isNotEmpty())
        <ul class="list-disc">
            @foreach ($monthlies as $monthly)
                <li> <x-activity>{{ $monthly }}</x-activity> </li>
            @endforeach
        </ul>
    @else
        <div>There are no monthlies to display.</div>
    @endif

    <h2>Weeklies</h2>
    @if ($weeklies->isNotEmpty())
        <ul class="list-disc">
            @foreach ($weeklies as $weekly)
                <li> <x-activity>{{ $weekly }}</x-activity> </li>
            @endforeach
        </ul>
    @else
        <div>There are no weeklies to display.</div>
    @endif

    <h2>Dailies</h2>
    @if ($dailies->isNotEmpty())
        <ul class="list-disc">
            @foreach ($dailies as $daily)
                <li> <x-activity>{{ $daily }}</x-activity> </li>
            @endforeach
        </ul>
    @else
        <div>There are no dailies to display.</div>
    @endif
</x-layout>
