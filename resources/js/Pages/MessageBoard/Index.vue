<script setup>
import {Head, Link} from '@inertiajs/vue3';

defineProps({
    props_int: {
        type: Number,
    },
    messages: {
        type: Array,
    },
});

</script>

<template>
    <Head>
        <title>Laravel SPA - Главная</title>
        <link rel="shortcut icon" href="laravel_icon.ico" type="image/x-icon">
    </Head>

    <div class="min-h-screen bg-dots-darker py-12 px-60">
        <Link
            :href="route('index')"
            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        >Главная
        </Link>
        <br>
<!--        <Link-->
<!--            :href="route('message-board.show', [props_int])"-->
<!--            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"-->
<!--        >Объявление-->
<!--        </Link>-->
        <Link
            :href="route('message-board.create', [props_int])"
            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Создание объявления
        </Link>
        <Link
            :href="route('message-board.edit', ['props_int'])"
            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Редактирование объявления
        </Link>

        <div class="w-auto mx-auto text-center">
            <br>
            <br>
            Доска объявлений - Главная
            <br>
            <br>
<!--            props_int: {{ props_int }}-->
            <template v-for="message in messages" :key="message.id">
                Заголовок: {{ message.title }}
                <br>
                Содержание: {{ message.content }}
                <br>
                Слаг: {{ message.slug }}
                <br>
                <Link
                    :href="route('message-board.show', [message.slug])"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Смотреть
                </Link>
                <br>
                <br>
            </template>
        </div>
    </div>

</template>

<style scoped>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

</style>
