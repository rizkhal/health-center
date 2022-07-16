<script setup>
import { inject, onMounted } from "vue";
import { Inertia } from "@inertiajs/inertia";

const modal = inject("$modal");

const props = defineProps({
  options: Object,
  files: Object,
});

const create = () => {
  modal.open({
    title: "Buat Cadangan",
    component: require("./create.vue").default,
    options: props.options,
  });
};

const download = ({ path }) => {
  Inertia.post(route("dashboard.backup.download"), {
    backup_path: path,
  });
};

const destroy = ({ path }) => {
  Inertia.post(route("dashboard.backup.destroy"), {
    backup_path: path,
  });
};
</script>
<template>
  <div class="flex mb-8">
    <button class="btn btn-purple" @click.stop="create">Buat Cadangan</button>
  </div>

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
          <th scope="col" class="py-3 px-6">Lokasi</th>
          <th scope="col" class="py-3 px-6">Ukuran File</th>
          <th scope="col" class="py-3 px-6">Tanggal Dibuat</th>
          <th scope="col" class="py-3 px-6">Aksi</th>
        </tr>
      </thead>
      <tbody v-if="!files.length">
        <tr>
          <td colspan="4">
            <div class="flex flex-col items-center justify-center space-y-1 mt-4">
              <v-icon name="InboxIcon" type="outline" class="h-8 w-8" />
              <span>Kosong</span>
            </div>
          </td>
        </tr>
      </tbody>
      <tbody v-else>
        <tr
          class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
          v-for="(file, index) in files"
          :key="index"
        >
          <td class="py-4 px-6">{{ file.path }}</td>
          <td class="py-4 px-6">{{ file.size }}</td>
          <td class="py-4 px-6">{{ $helper.formatDate(file.date) }}</td>
          <td class="py-4 px-6">
            <div class="flex flex-row space-x-2">
              <a
                target="blank"
                :href="`/dashboard/backup/download/?path=${file.path}`"
              >
                <v-icon name="DownloadIcon" class="w-4 h-4" />
              </a>
              <button @click.stop="destroy(file)">
                <v-icon name="TrashIcon" class="w-4 h-4" />
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>