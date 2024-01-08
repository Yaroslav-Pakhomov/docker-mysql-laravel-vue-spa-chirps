<script>
import {Head, Link, useForm} from '@inertiajs/vue3';
import {router} from "@inertiajs/vue3";
import InputError from '@/Components/InputError.vue';

// Объект соответствий кириллицы и латиницы
const map = {
    'А': 'A',
    'Б': 'B',
    'В': 'V',
    'Г': 'G',
    'Д': 'D',
    'Е': 'E',
    'Ё': 'Yo',
    'Ж': 'Zh',
    'З': 'Z',
    'И': 'I',
    'Й': 'J',
    'К': 'K',
    'Л': 'L',
    'М': 'M',
    'Н': 'N',
    'О': 'O',
    'П': 'P',
    'Р': 'R',
    'С': 'S',
    'Т': 'T',
    'У': 'U',
    'Ф': 'F',
    'Х': 'H',
    'Ц': 'C',
    'Ч': 'Ch',
    'Ш': 'Sh',
    'Щ': 'Sh',
    'Ъ': '',
    'Ы': 'Y',
    'Ь': '',
    'Э': 'E',
    'Ю': 'Yu',
    'Я': 'Ya',
    'а': 'a',
    'б': 'b',
    'в': 'v',
    'г': 'g',
    'д': 'd',
    'е': 'e',
    'ё': 'yo',
    'ж': 'zh',
    'з': 'z',
    'и': 'i',
    'й': 'j',
    'к': 'k',
    'л': 'l',
    'м': 'm',
    'н': 'n',
    'о': 'o',
    'п': 'p',
    'р': 'r',
    'с': 's',
    'т': 't',
    'у': 'u',
    'ф': 'f',
    'х': 'h',
    'ц': 'c',
    'ч': 'ch',
    'ш': 'sh',
    'щ': 'sh',
    'ъ': '',
    'ы': 'y',
    'ь': '',
    'э': 'e',
    'ю': 'yu',
    'я': 'ya',
};

const form = useForm({
    message: '',
});

export default {

    // Название компонента
    name: 'CreateMessage',

    components: {
        Head,
        Link,
        InputError,
    },

    // Свойства от родительского компонента, от контроллера
    props: {
        // props_int: Number,
        errors: Object,
    },

    // Свойства компонента
    data() {
        return {
            title: '',
            slug: '',
            content: '',
            // errors: this.errors,
        };
    },

    // Методы компонента
    methods: {
        /**
         * Получение слага(ссылки) из названия статьи. Автоматическое создание slug при вводе name (замена кириллицы на латиницу)
         */
        setSlug() {

            let text = this.title;
            for (let k in map) {
                text = text.replace(RegExp(k, 'g'), map[k]);
            }
            text = text.replace(/[^- _a-zA-Z0-9]/g, '');
            text = text.replace(/\s+/g, '-');
            text = text.replace(/-+/g, '-');

            this.slug = text;
        },

        createSubmit() {
            // router.post('/message-board', {title: this.title, slug: this.slug, content: this.content});
            this.$inertia.post('/message-board', {title: this.title, slug: this.slug, content: this.content});
        },
    },
}

</script>

<template>
    <Head>
        <title>Laravel SPA - Создание</title>
        <link rel="shortcut icon" href="laravel_icon.ico" type="image/x-icon">
    </Head>

    <div class="min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 py-12 px-60">
        <Link
            :href="route('index')"
            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        >Главная
        </Link>
        <br>
        <Link
            :href="route('message-board.index')"
            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Объявления
        </Link>
        <div class="w-auto mx-auto text-center">
            <br>
            <br>
            Доска объявлений - Создание объявления
            <br>
            <br>
            <form @submit.prevent="createSubmit">
                <div class="col-span-full">
                    <label for="title" class="block text-sm text-justify font-medium leading-6 text-gray-900 mb-4">
                        Заголовок
                    </label>
                    <input type="text" v-model="title" id="title" name="title" @input.prevent="setSlug"
                           class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mb-1"
                           placeholder="">
                    <div class="mb-6" v-if="errors.title">{{ errors.title }}</div>
                </div>

                <div class="col-span-full">
                    <label for="slug" class="block text-sm text-justify font-medium leading-6 text-gray-900 mb-4">
                        Ссылка для статьи
                    </label>
                    <input type="text" v-model="slug" id="slug" name="slug"
                           class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mb-1"
                           placeholder="">
                    <div class="mb-6" v-if="errors.slug">{{ errors.slug }}</div>
                </div>
                <div class="col-span-full">
                    <label for="content" class="block text-sm text-justify font-medium leading-6 text-gray-900">
                        Содержание объявления
                    </label>
                    <div class="mt-2">
                        <textarea v-model="content" id="content" name="content" rows="3"
                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mb-1"/>
                    </div>
                    <div class="mb-2" v-if="errors.content">{{ errors.content }}</div>
                    <p class="mt-3 mb-6 text-sm text-justify leading-6 text-gray-600">Напишите несколько
                        предложений.</p>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <Link
                        :href="route('message-board.index')"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        Отмена
                    </Link>
                    <button type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                        Сохранить
                    </button>
                </div>
            </form>
        </div>
    </div>

</template>

<style scoped>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

</style>
