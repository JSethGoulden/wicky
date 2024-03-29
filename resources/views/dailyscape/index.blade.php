<x-layout>
    <div class="mx-auto w-1/2 grid grid-cols-1 md:grid-cols-2 gap-4 justify-center">
        <div>
            <activity-list :title="'Monthlies'" :activities="{{ $monthlies }}">
            </activity-list>

            <activity-list :title="'Weeklies'" :activities="{{ $weeklies }}">
            </activity-list>
        </div>
        <div>
            <flash-event-widget></flash-event-widget>
            <activity-list :title="'Dailies'" :activities="{{ $dailies }}">
            </activity-list>
        </div>
    </div>

</x-layout>
