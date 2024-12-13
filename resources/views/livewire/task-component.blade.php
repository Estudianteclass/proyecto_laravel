


<div wire:poll="getTask"
    class='flex min-h-screen items-center justify-center from-cyan-200 via-blue-300 to-indigo-500 bg-gradient-to-br'>
    <div class="flex items-center justify-center min-h-[450px]">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <button class="bg-purple-800 text-white px-4 py-2 rounded-md hover:bg-purple-700 mt-6"
                    wire:click="openCreateModal">
                    Nuevo
                </button>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">Título</th>
                            <th scope="col" class="py-3 px-6">Descripción</th>
                            <th scope="col" class="py-3 px-6">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="py-4 px-6">{{ $task->title }}</td>
                                <td class="py-4 px-6">{{ $task->description }}</td>
                                <td class="py-4 px-6">
                                    <button wire:click="openCreateModal({{$task}})"class="bg-yellow-600 hover:bg-yellow-500 text-white px-4 py-2 rounded-md">
                                        Editar
                                    </button>
                                    <button class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-md">
                                        Compartir
                                    </button>
                                    <button wire:click="deleteModal({{$task}})"wire:confirm="Borrar?"class="bg-red-600 hover:bg-red-500 text-white px-4 py-2 rounded-md">
                                        Eliminar
                                    </button>



                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- component MODAL -->
    @if ($modal)
    <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
        <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
            <div class="w-full">
                <div class="m-8 my-20 max-w-[400px] mx-auto">
                    <div class="mb-8">
                        <h1 class="mb-4 text-3xl font-extrabold">Crear nueva tarea</h1>
                        <form>
                            <div class="space-y-4">
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                                    <input type="text" wire:model="title" name="title" id="title"
                                        autocomplete="title"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                <div>
                                    <label for="description"
                                        class="block text-sm font-medium text-gray-700">Descripción</label>
                                    <textarea type="text" wire:model="description" name="description" id="description" autocomplete="description"
                                        rows="3"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="space-y-4">
                        <button class="p-3 bg-black rounded-full text-white w-full font-semibold"
                        wire:click="createTask">
                            Crear tarea
                        </button>
                        <button class="p-3 bg-white border rounded-full w-full font-semibold"
                        wire:click="closeCreateModal">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif


</div>
