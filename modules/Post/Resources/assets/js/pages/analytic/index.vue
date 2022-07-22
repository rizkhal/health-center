<script setup>
const props = defineProps({
  analytics: Object,
});
</script>
<template>
  <table class="table-auto">
    <thead>
      <tr>
        <th>#</th>
        <th>Date</th>
        <th>Visitors</th>
        <th>Page Title</th>
        <th>Page Views</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(analytic, index) in analytics" :key="index">
        <td>{{ ++index }}</td>
        <td>{{ analytic.date }}</td>
        <td>{{ analytic.visitors }}</td>
        <td>{{ analytic.pageTitle }}</td>
        <td>{{ analytic.pageViews }}</td>
      </tr>
    </tbody>
  </table>
</template>