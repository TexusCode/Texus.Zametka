



<div class="bg-blue w-full px-0 py-5">
    
    @if($addGroupState)
        <form wire:submit.prevent="save" class="mx-4">
            <div>
                <div class="flex rounded-lg shadow-sm">
                    <input wire:model.defer="title" type="text" id="hs-trailing-button-add-on" name="hs-trailing-button-add-on" class="py-3 px-4 block w-full border-gray-200 shadow-sm rounded-s-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                    <button type="submit" class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    Добавить
                    </button>
                </div>
            </div>
        </form>
    @else
        <a class="m-5 cursor-pointer bg-blue-500 border-2 border-white px-4 py-2 text-white rounded-xl font-bold hover:bg-blue-100 duration-300 hover:text-blue-500" wire:click="addGroup">
            Добавить группа заметки
        </a>
    @endif

    <div wire:sortable="updateOrder" wire:sortable-group="updateOrder" class="flex px-4 pb-8 items-start mt-5 grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">

        @foreach($groups as $group)
            <div wire:key="group-{{ $group->id }}" wire:sortable.item="{{ $group->id }}" class="rounded-xl bg-white flex-no-shrink w-full p-3 mr-3">
                <div wire:sortable.handle class="flex justify-between ">
                    <h3 class="text-xl font-bold">{{ $group->title }}</h3>

                    <a wire:click="deleteGroup({{ $group->id }})" class="fill-white cursor-pointer text-white bg-red-500 w-6 h-6 rounded-full text-center object-none object-center ">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                    </a>
                </div>

                <div class="text-sm mt-2">
                    <div wire:sortable-group.item-group="{{ $group->id }}" @if($group->cards->isEmpty()) class="p-10" @endif>
                        @foreach($group->cards as $card)
                            <div wire:key="task-{{ $card->id }}" wire:sortable-group.item="{{ $card->id }}" class="bg-white p-2 rounded mt-1 border-b cursor-pointer hover:bg-gray-100 flex justify-between">
                                <span>{{ $card->title }}</span>

                                <a wire:click="deleteCard({{ $card->id }})" class="cursor-pointer inline-flex text-red-500">x</a>
                            </div>
                        @endforeach
                    </div>

                    @if($addCardState == $group->id)

                        <form wire:submit.prevent="save" class="">
                            <div>
                                <div class="flex rounded-lg shadow-sm">
                                    <input wire:model.defer="title" type="text" id="hs-trailing-button-add-on" name="hs-trailing-button-add-on" class="py-3 px-4 block w-full border-gray-200 shadow-sm rounded-s-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                    <button type="submit" class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                    Добавить
                                    </button>
                                </div>
                            </div>
                        </form>
                    @else
                        <div class="w-full text-center">

                            <a wire:click="addTask({{ $group->id }})" class="mt-3 cursor-pointer text-red-500 font-bold text-xl">
                                Добавить
                            </a>

                        </div>

                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>

