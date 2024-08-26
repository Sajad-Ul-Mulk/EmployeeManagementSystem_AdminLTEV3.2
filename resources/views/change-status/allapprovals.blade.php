<x-layout>
    <x-slot:heading>
        All Approvals
    </x-slot:heading>

{{--    @dd($approvals)--}}
    <x-approval-data-table :$approvals>
        <h2>All Approvals must be entertained</h2>
    </x-approval-data-table>
</x-layout>
