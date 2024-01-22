<script>
"use strict";

import {Head, Link} from '@inertiajs/vue3';

export default {
    // Название компонента
    name: 'MessageBoardLayout',

    components: {
        Head,
        Link,
    },


    data() {
        return {}
    },
}

</script>

<template>
    <Head>
        <title>Laravel SPA</title>
        <link rel="shortcut icon" href="laravel_icon.ico" type="image/x-icon">
    </Head>

    <div class="min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 py-12 px-60">
        <Link
            :href="route('index')"
            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        >Главная
        </Link>
        <br>

        <slot/>
    </div>

</template>

<style scoped>

</style>
