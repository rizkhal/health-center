<script setup>
const props = defineProps({
  analytics: Object,
});
</script>
<template>
  <div class="overflow-x-auto relative">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead
        class="
          text-xs text-gray-700
          uppercase
          bg-gray-50
          dark:bg-gray-700 dark:text-gray-400
        "
      >
        <tr>
          <th>#</th>
          <th>Tanggal</th>
          <th>Pengunjung</th>
          <th>Halaman</th>
          <th>Dilihat</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="(analytic, index) in analytics"
          :key="index"
          class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
        >
          <td>{{ ++index }}</td>
          <td>{{ $helper.shortTimestamp(analytic.date) }}</td>
          <td>{{ analytic.visitors }}</td>
          <td>{{ analytic.pageTitle }}</td>
          <td>{{ analytic.pageViews }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
