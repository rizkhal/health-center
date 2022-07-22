<script setup>
const props = defineProps({
  analytics: Object,
});
</script>
<template>
  <div class="relative overflow-x-auto">
    <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
      <thead
        class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"
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
          class="border-b bg-white dark:border-gray-700 dark:bg-gray-800"
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
