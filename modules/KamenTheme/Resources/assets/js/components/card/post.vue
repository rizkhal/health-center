<script setup>
import { computed, onMounted } from "vue";

const props = defineProps({
  size: {
    type: String,
    default: "lg", // lg and sm
  },
  item: Object,
});

const lg = computed(() => props.size == "lg");
const sm = computed(() => props.size == "sm");
</script>
<template>
  <div class="rounded-2xl bg-white p-3 shadow">
    <img
      :src="item.image.url"
      class="w-full rounded-2xl object-cover"
      :class="{ 'h-[30em]': lg, 'h-[13em]': sm }"
      :alt="item.image.url"
    />
    <div
      class="pt-2"
      :class="{
        'md:px-3 md:pt-6': lg,
        'md:pt-3': sm,
      }"
    >
      <div
        class="mt-4 flex flex-col justify-between space-y-4 md:mt-0 md:flex-row md:space-y-0"
      >
        <div>
          <span
            class="rounded-xl bg-pink-200 px-3 py-1 font-bold uppercase text-pink-500"
            :class="{ 'text-md': lg, 'text-xs': sm }"
          >
            {{ item.category.name }}
          </span>
        </div>

        <ul
          class="flex flex-row space-x-4"
          :class="{
            'md:space-x-8': lg,
            'md:space-x-2': sm,
          }"
        >
          <li>
            <span class="flex flex-row items-center text-xl font-bold">
              <v-icon
                name="EyeIcon"
                type="outline"
                class="mr-2 h-8 w-8 text-gray-500"
              />
              {{ $helper.readableNumber(item.views_count) }}
            </span>
          </li>
          <!-- <li>
            <span class="flex flex-row items-center text-xl font-bold">
              <v-icon
                name="ChatAlt2Icon"
                type="outline"
                class="mr-2 h-8 w-8 text-gray-500"
              />
            </span>
          </li> -->
          <!-- <li :class="{ 'inline lg:hidden': sm }">
            <button class="flex flex-row items-center text-xl font-bold">
              <v-icon
                name="ShareIcon"
                type="outline"
                class="mr-2 h-8 w-8 text-gray-500"
              />
              35k
            </button>
          </li> -->
        </ul>
      </div>
    </div>
    <div
      :class="{
        'flex flex-col space-y-4 px-3 pb-3 md:pb-6': lg,
      }"
    >
      <div :class="{ 'mt-8': lg, 'mt-3': sm }">
        <v-app-link
          :href="$route('post.show.article', { post: item.slug })"
          class="font-semibold leading-relaxed transition-all hover:text-pink-500"
          :class="{
            'text-xl md:text-2xl lg:text-3xl': lg,
            'text-lg': sm,
          }"
        >
          {{ item.title }}
        </v-app-link>
      </div>
    </div>
    <div
      v-if="lg"
      class="mt-4 flex flex-col items-center justify-center space-y-4 px-3 pb-3 md:mt-0 md:flex-row md:justify-between md:space-y-0 md:pb-6"
    >
      <div class="flex flex-row items-center space-x-3">
        <div class="flex-shrink-0">
          <img
            :src="item.author.profile_picture"
            class="h-14 w-14 rounded-full md:h-16 md:w-16"
          />
        </div>
        <div>
          <h1 class="text-xl font-semibold">{{ item.author.username }}</h1>
          <span class="text-gray-500">
            {{ $helper.shortTimestamp(item.created_at) }}
          </span>
        </div>
      </div>
      <div>
        <v-dropdown button-label="Bagikan" position="right">
          <template #button>
            <button
              class="flex items-center rounded-2xl bg-pink-500/30 px-5 py-3 font-medium text-pink-500 focus:ring-2 focus:ring-pink-500 focus:ring-offset-2"
            >
              <v-icon
                name="ShareIcon"
                type="outline"
                class="mr-2 h-8 w-8 text-pink-500"
              />
              <span>Bagikan</span>
            </button>
          </template>
          <template #content>
            <div class="flex flex-col space-y-4 p-4">
              <a
                target="blank"
                :href="`https://www.facebook.com/sharer/sharer.php?u=${$route(
                  'post.show.article',
                  { post: item.slug },
                )}`"
                class="flex flex-row items-center space-x-2"
              >
                <svg
                  role="img"
                  class="h-5 w-5"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"
                  />
                </svg>
                <span>Facebook</span>
              </a>
              <a
                target="blank"
                :href="`https://twitter.com/intent/tweet?url=${$route(
                  'post.show.article',
                  { post: item.slug },
                )}`"
                class="flex flex-row items-center space-x-2"
              >
                <svg
                  role="img"
                  class="h-5 w-5"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <title>Twitter</title>
                  <path
                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"
                  />
                </svg>
                <span>Twitter</span>
              </a>
              <a
                target="blank"
                :href="`https://wa.me/?text=${$route('post.show.article', {
                  post: item.slug,
                })}`"
                class="flex flex-row items-center space-x-2"
              >
                <svg
                  role="img"
                  class="h-5 w-5"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <title>WhatsApp</title>
                  <path
                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"
                  />
                </svg>
                <span>Whatsapp</span>
              </a>
            </div>
          </template>
        </v-dropdown>
      </div>
    </div>
  </div>
</template>
