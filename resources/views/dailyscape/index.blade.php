<x-layout>
    <div class="mx-auto w-1/2 grid grid-cols-1 md:grid-cols-2 gap-4 justify-center">
        <div>
            <activity-list :title="'Monthlies'" :description="'test'" :activities="{{ $monthlies }}">
            </activity-list>

            <activity-list :title="'Weeklies'" :description="'test'" :activities="{{ $weeklies }}">
            </activity-list>
        </div>
        <div>
            <activity-list :title="'Dailies'" :description="'test'" :activities="{{ $dailies }}">
            </activity-list>
        </div>
    </div>
</x-layout>
