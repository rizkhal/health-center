<template>
  <div>
    <div class="mx-auto grid px-6">
      <div class="mb-8 grid gap-6 md:grid-cols-2 xl:grid-cols-2">
        <div class="flex items-center rounded-lg bg-white p-4 shadow">
          <div class="mr-4 rounded-full bg-blue-100 p-3 text-blue-500">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
              />
            </svg>
          </div>
          <div>
            <p class="mb-2 text-sm font-medium text-gray-600">Jumlah Artikel</p>
            <p class="text-lg font-semibold text-gray-700">
              {{ articles_count }}
            </p>
          </div>
        </div>
        <div class="flex items-center rounded-lg bg-white p-4 shadow">
          <div class="mr-4 rounded-full bg-green-100 p-3 text-green-500">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
              />
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
              />
            </svg>
          </div>
          <div>
            <p class="mb-2 text-sm font-medium text-gray-600">Jumlah Pembaca</p>
            <p class="text-lg font-semibold text-gray-700">
              {{ all_read_articles_couunt }}
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="grid w-full grid-cols-1 gap-4 xl:grid-cols-2 2xl:grid-cols-3">
      <div
        class="dark:border-cool-gray-600 rounded-lg border bg-white p-4 shadow sm:p-6 xl:p-8 2xl:col-span-2"
      >
      </div>
      <div class="rounded-lg border bg-white p-6 shadow">
        <div class="mb-4 flex items-center justify-between">
          <div>
            <h3 class="mb-2 text-xl font-bold text-gray-900">
              Pembelian Terbaru
            </h3>
            <span class="text-base font-normal text-gray-500"
              >Daftar pembelian barang terbaru</span
            >
          </div>
          <div class="flex-shrink-0">
            <v-app-link
              href="/logistics/purchase"
              class="rounded-lg p-2 text-sm font-medium text-purple-600 hover:bg-gray-100"
              >Lihat Semua</v-app-link
            >
          </div>
        </div>
        <div class="mt-8 flex flex-col">
          <div class="overflow-x-auto rounded-lg">
            <div class="inline-block min-w-full align-middle">
              <div class="overflow-hidden shadow sm:rounded-lg">
                <table class="min-w-full">
                  <thead>
                    <tr>
                      <th
                        scope="col"
                        class="p-4 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                      >
                        Kode
                      </th>
                      <th
                        scope="col"
                        class="p-4 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                      >
                        Jumlah
                      </th>
                      <th
                        scope="col"
                        class="p-4 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                      >
                        Biaya
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="border-t transition hover:bg-gray-100">
                      
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
  </div>
</template>
<script setup>
defineProps({
  articles_count: Number,
  all_read_articles_couunt: [String, Number],
});
</script>
