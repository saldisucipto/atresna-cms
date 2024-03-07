<template>
    <div class="p-3 rounded-xl bg-white flex flex-col gap-4">
        <!-- Title Pages -->
        <title-pages :backto="'/dashboard/konfigurasi'">
            Konfigurasi Meta Site
        </title-pages>
        <!-- Endt Title Pages -->
    </div>
</template>

<script>
import Navigasi from "../../../Widgets/Navigasi.vue";
import DashboardLayout from "../../../Layouts/DashboardLayout.vue";
import TitlePages from "../../../Widgets/TitlePages.vue";
export default {
    components: {
        Navigasi,
        DashboardLayout,
        TitlePages,
    },
    layout: DashboardLayout,
};
</script>

<style></style>
