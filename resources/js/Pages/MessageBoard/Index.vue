<script>
import {Head, Link} from '@inertiajs/vue3';
import MessageBoardLayout from '@/Layouts/MessageBoardLayout.vue';


export default {
    // Название компонента
    name: 'IndexMessages',

    components: {
        Head,
        Link,
        MessageBoardLayout,
    },

    // Свойства от родительского компонента, от контроллера
    props: {
        messages: Array,
        title: String,
    },

    // Ссвойства
    data() {
        return {}
    },

    // Вычисляемые свойства
    computed: {}
}

</script>

<template>

    <MessageBoardLayout>
        <Link
            :href="route('message-board.create')"
            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Создание объявления
        </Link>

        <div class="w-auto mx-auto text-center">
            <!-- Флэш-сообщения начало -->
            <div
                v-if="$page.props.flash.message"
                class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                role="alert"
            >
                    <span class="font-medium">
                        {{ $page.props.flash.message }}
                    </span>
            </div>
            <!-- Флэш-сообщения конец -->
            <br>
            <br>
            Доска объявлений - Главная
            <br>
            <br>
            <template v-for="message in messages" :key="message.id">
                Заголовок: {{ message.title }}
                <br>
                Содержание: {{ message.content }}
                <br>
                Создано: {{ message.created_at }}
                <br>
                Обновлено: {{ message.updated_at }}
                <br>
                <Link
                    :href="route('message-board.show', [message.slug])"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    Смотреть
                </Link>
                <br>
                <br>
            </template>
        </div>
    </MessageBoardLayout>

</template>

<style scoped>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

</style>
