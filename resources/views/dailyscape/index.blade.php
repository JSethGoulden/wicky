<x-layout>
    <dix class="mx-auto w-1/2 grid grid-cols-1 md:grid-cols-2 gap-4 justify-center">
        <div>
            <x-activity-list :title="'Monthlies'" :description="'Next reset is TBD'">
                @forelse($monthlies as $monthly)
                    <x-activity-item :completed="$monthly->completed"> {{ $monthly->name }} </x-activity-item>
                @empty
                    There aren't any monthlies
                @endforelse
            </x-activity-list>

            <x-activity-list :title="'Weeklies'" :description="'Next reset is TBD'">
                @forelse($weeklies as $weekly)
                    <x-activity-item :completed="$weekly->completed"> {{ $weekly->name }} </x-activity-item>
                @empty
                    There aren't any weeklies
                @endforelse
            </x-activity-list>
        </div>
        <div>
            <x-activity-list :title="'Dailies'" :description="'Next reset is TBD'">
                @forelse($dailies as $daily)
                    <x-activity-item :completed="$daily->completed"> {{ $daily->name }} </x-activity-item>
                @empty
                    There aren't any dailies
                @endforelse
            </x-activity-list>
        </div>
    </dix>
</x-layout>
