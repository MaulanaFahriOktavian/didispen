@props([
    'columns' => [],
    'data' => [],
    'searchable' => true,
    'filterable' => false,
    'bulkActions' => false,
    'pagination' => null,
    'resource' => ''
])

<div class="bg-white rounded-[20px] border border-[#E5E7EB] shadow-sm overflow-hidden" x-data="{ 
    selected: [], 
    toggleAll() { 
        this.selected = this.selected.length === {{ count($data) }} ? [] : {{ Js::from($data->pluck('id')->toArray()) }} 
    },
    toggle(id) {
        if (this.selected.includes(id)) {
            this.selected = this.selected.filter(i => i !== id)
        } else {
            this.selected.push(id)
        }
    }
}">
    
    <div class="px-6 py-4 border-b border-[#E5E7EB] flex items-center justify-between gap-4">
        <div class="flex items-center gap-3 flex-1">
            @if($searchable)
                <div class="relative flex-1 max-w-md">
                    <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-[#6B7280]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <form method="GET" action="{{ request()->url() }}">
                        @foreach(request()->except('search', 'page') as $key => $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach
                        <input 
                            type="text" 
                            name="search"
                            value="{{ request('search', '') }}"
                            placeholder="Search..." 
                            class="w-full h-10 pl-10 pr-4 rounded-xl border border-[#E5E7EB] bg-[#F8FAFC] text-sm focus:outline-none focus:ring-2 focus:ring-[#5B3DF5]/10 focus:border-[#5B3DF5] transition-all"
                        >
                    </form>
                </div>
            @endif
        </div>
        
        @if($bulkActions)
            <div class="flex items-center gap-2" x-show="selected.length > 0" x-cloak>
                <span class="text-sm text-[#6B7280]" x-text="selected.length + ' selected'"></span>
                <form method="POST" action="{{ route("admin.{$resource}.bulk-destroy") }}">
                    @csrf
                    <template x-for="id in selected">
                        <input type="hidden" name="ids[]" :value="id">
                    </template>
                    <button type="submit" class="h-10 px-4 rounded-xl bg-[#EF4444] text-white text-sm font-semibold hover:bg-red-600 transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Delete
                    </button>
                </form>
            </div>
        @endif
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-[#F8FAFC] border-b border-[#E5E7EB]">
                <tr>
                    @if($bulkActions)
                        <th class="px-6 py-3.5 w-12">
                            <input 
                                type="checkbox" 
                                @click="toggleAll()" 
                                :checked="selected.length === {{ count($data) }}"
                                class="w-4 h-4 rounded border-[#E5E7EB] text-[#5B3DF5] focus:ring-[#5B3DF5]/20 cursor-pointer"
                            >
                        </th>
                    @endif
                    @foreach($columns as $column)
                        <th class="px-6 py-3.5 text-xs font-semibold text-[#6B7280] uppercase tracking-wider">
                            {{ $column['label'] }}
                        </th>
                    @endforeach
                    <th class="px-6 py-3.5 text-xs font-semibold text-[#6B7280] uppercase tracking-wider text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#E5E7EB]">
                @forelse($data as $row)
                    <tr class="hover:bg-[#F8FAFC] transition-colors group" :class="selected.includes({{ $row->id }}) ? 'bg-[#5B3DF5]/5' : ''">
                        @if($bulkActions)
                            <td class="px-6 py-4">
                                <input 
                                    type="checkbox" 
                                    @click="toggle({{ $row->id }})" 
                                    :checked="selected.includes({{ $row->id }})"
                                    class="w-4 h-4 rounded border-[#E5E7EB] text-[#5B3DF5] focus:ring-[#5B3DF5]/20 cursor-pointer"
                                >
                            </td>
                        @endif
                        @foreach($columns as $column)
                            <td class="px-6 py-4 text-[#111827]">
                                @if(isset($column['render']))
                                    {!! $column['render']($row) !!}
                                @else
                                    {{ $row->{$column['key']} ?? '-' }}
                                @endif
                            </td>
                        @endforeach
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button @click="$dispatch('open-edit', { id: {{ $row->id }} })" class="p-2 rounded-lg text-[#6B7280] hover:bg-[#5B3DF5]/10 hover:text-[#5B3DF5] transition-all" title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>
                                <form method="POST" action="{{ route("admin.{$resource}.destroy", $row->id) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="p-2 rounded-lg text-[#6B7280] hover:bg-[#EF4444]/10 hover:text-[#EF4444] transition-all" title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($columns) + ($bulkActions ? 2 : 1) }}" class="px-6 py-16 text-center">
                            <x-ui.empty-state 
                                icon="inbox" 
                                title="No Data Found" 
                                description="Start adding data to see it appear here." 
                            />
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($pagination)
        <div class="px-6 py-4 border-t border-[#E5E7EB] flex items-center justify-between">
            <p class="text-sm text-[#6B7280]">
                Showing <span class="font-semibold text-[#111827]">{{ $pagination->firstItem() }}</span> - <span class="font-semibold text-[#111827]">{{ $pagination->lastItem() }}</span> of <span class="font-semibold text-[#111827]">{{ $pagination->total() }}</span> data
            </p>
            {{ $pagination->links() }}
        </div>
    @endif
</div>