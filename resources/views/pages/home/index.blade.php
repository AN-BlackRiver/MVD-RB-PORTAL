@extends('layouts.base-layout')


@section('content')
    <div class="container mx-auto px-4 mt-20 bg-white dark:bg-gray-900 pb-4 rounded-md min-h-screen">
        <div class="border-b border-b-gray-200 dark:border-b-gray-600 flex justify-between items-center py-4 mb-4">
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-semibold text-black/80 dark:text-white mr-4">Новости</h1>
                <a href="{{ route('news.create') }}">
                <button type="button"
                        class="text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Создать
                </button>
                </a>
            </div>
            <div class="flex justify-between items-center">
                <input
                    type="text"
                    name="q"
                    class="mr-4 block w-full px-3 py-2 dark:bg-gray-800 border dark:text-white border-gray-300 dark:border-blue-700 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                    placeholder="Поиск"
                />
                <button type="button"
                        class="text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Найти
                </button>
            </div>
        </div>
        <div class="flex flex-col space-y-4">
            <!-- Post 1 -->
            <div
                class="bg-gray-100/50 dark:bg-gray-800 border-2 border-transparent hover:border-blue-700 transition-colors duration-300 rounded-lg shadow-md overflow-hidden">

                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-2">Post Title 1</h2>
                    <p class="text-gray-600 dark:text-blue-300">This is a short description of the post. It provides a
                        brief overview of the content.</p>
                </div>
            </div>

            <div
                class="bg-gray-100/50 dark:bg-gray-800 border-2 border-transparent hover:border-blue-700 transition-colors duration-300 rounded-lg shadow-md overflow-hidden">

                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-2">Post Title 2</h2>
                    <p class="text-gray-600 dark:text-blue-300">This is a short description of the post. It provides a
                        brief overview of the content.</p>
                </div>
            </div>

            <div
                class="bg-gray-100/50 dark:bg-gray-800 border-2 border-transparent hover:border-blue-700 transition-colors duration-300 rounded-lg shadow-md overflow-hidden">

                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-2">Post Title 3</h2>
                    <p class="text-gray-600 dark:text-blue-300">This is a short description of the post. It provides a
                        brief overview of the content.</p>
                </div>
            </div>

            <div
                class="bg-gray-100/50 dark:bg-gray-800 border-2 border-transparent hover:border-blue-700 transition-colors duration-300 rounded-lg shadow-md overflow-hidden">

                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-2">Post Title 4</h2>
                    <p class="text-gray-600 dark:text-blue-300">This is a short description of the post. It provides a
                        brief overview of the content.</p>
                </div>
            </div>

            <div
                class="bg-gray-100/50 dark:bg-gray-800 border-2 border-transparent hover:border-blue-700 transition-colors duration-300 rounded-lg shadow-md overflow-hidden">

                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-2">Post Title 1</h2>
                    <p class="text-gray-600 dark:text-blue-300">This is a short description of the post. It provides a
                        brief overview of the content.</p>
                </div>
            </div>

            <!-- Add more posts as needed -->
        </div>
    </div>
@endsection
