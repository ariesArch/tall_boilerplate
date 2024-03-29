@props(['wireModel','blog_categories'])
<div class="flex flex-col items-center" x-data="{ open: @entangle('blog_category_filter').live }">
    <div class="w-full  flex flex-col items-center">
        <div class="w-full px-4">
            <div x-data="selectConfigs()" class="flex flex-col items-center relative">
                <div class="w-full">
                    <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                        <input x-on:change="filterUpdated(filter)" x-model="filter.name" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @mousedown="open()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" class="p-1 px-2 appearance-none outline-none w-full text-gray-800">
                        <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200">
                            <button @click="toggle()" class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline x-show="!isOpen()" points="18 15 12 20 6 15"></polyline>
                                    <polyline x-show="isOpen()" points="18 15 12 9 6 15"></polyline>
                                </svg>

                            </button>
                        </div>
                    </div>
                </div>
                <div x-show="isOpen()" class="absolute shadow bg-white top-20 z-40 w-full lef-0 rounded max-h-40 overflow-y-auto svelte-5uyqqj">
                    <div class="flex flex-col w-full">
                        <template x-for="(option, index) in filteredOptions()" :key="index">
                            <div @click.stop.prevent="onOptionClick(index)" :class="classOption(option.id, index)" :aria-selected="focusedOptionIndex === index">
                                <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                                    <div class="w-6 flex flex-col items-center">
                                        <!-- <div class="flex relative w-5 h-5 bg-orange-500 justify-center items-center m-1 mr-2 w-4 h-4 mt-1 rounded-full ">
                                            <img class="rounded-full" alt="A" x-bind:src="option.picture.thumbnail"> 
                                        </div> -->
                                    </div>
                                    <div class="w-full items-center flex">
                                        <div class="mx-2 -mt-1"><span x-text="option.name"></span>
                                            <div class="text-xs truncate w-full normal-case font-normal -mt-1 text-gray-500" x-text="option.name"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    function selectConfigs() {
        return {
            filter: '',
            show: false,
            selected: null,
            focusedOptionIndex: null,
            options: @json($blog_categories),
            // options: json_encode($blog_categories),
            close() {
                console.log("Closing")
                this.show = false;
                this.filter = this.selectedName();
                this.focusedOptionIndex = this.selected ? this.focusedOptionIndex : null;
            },
            open() {
                // console.log("open")
                this.show = true;
                this.filter = '';
            },
            toggle() {
                console.log("Toggle")
                if (this.show) {
                    this.close();
                } else {
                    this.open()
                }
            },
            isOpen() {
                return this.show === true
            },
            selectedName() {
                return this.selected ? this.selected : this.filter;
            },
            classOption(id, index) {
                const isSelected = this.selected ? true : false;
                const isFocused = (index == this.focusedOptionIndex);
                return {
                    'cursor-pointer w-full border-gray-100 border-b hover:bg-blue-50': true,
                    'bg-blue-100': isSelected,
                    'bg-blue-50': isFocused
                };
            },
            // fetchOptions() {
            //     fetch('https://randomuser.me/api/?results=5')
            //         .then(response => response.json())
            //         .then(data => this.options = data);
            // },
            filteredOptions() {
                return this.options ?
                    this.options.filter(option => {
                        return (option.name.toLowerCase().indexOf(this.filter) > -1)
                    }) : {}
            },
            onOptionClick(index) {
                this.focusedOptionIndex = index;
                this.selectOption();
            },
            selectOption() {
                if (!this.isOpen()) {
                    return;
                }
                this.focusedOptionIndex = this.focusedOptionIndex ?? 0;
                const selected = this.filteredOptions()[this.focusedOptionIndex]
                if (this.selected && this.selected.id == selected?.id) {
                    this.filter = '';
                    this.selected = null;
                } else {
                    this.selected = selected;
                    this.filter = this.selectedName();
                }
                // this.close();
            },
            focusPrevOption() {
                if (!this.isOpen()) {
                    return;
                }
                const optionsNum = Object.keys(this.filteredOptions()).length - 1;
                if (this.focusedOptionIndex > 0 && this.focusedOptionIndex <= optionsNum) {
                    this.focusedOptionIndex--;
                } else if (this.focusedOptionIndex == 0) {
                    this.focusedOptionIndex = optionsNum;
                }
            },
            focusNextOption() {
                const optionsNum = Object.keys(this.filteredOptions()).length - 1;
                if (!this.isOpen()) {
                    alert("NotOpen?")
                    this.open();
                }
                if (this.focusedOptionIndex == null || this.focusedOptionIndex == optionsNum) {
                    this.focusedOptionIndex = 0;
                } else if (this.focusedOptionIndex >= 0 && this.focusedOptionIndex < optionsNum) {
                    this.focusedOptionIndex++;
                }
            },
            filterUpdated(filter) {
                this.filter = filter; // Update the local filter object
            },
        }

    }
</script>
@endpush
@push('styles')
<link href="{{ asset('css/select.css') }}" rel="stylesheet">
@endpush