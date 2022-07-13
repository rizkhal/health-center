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
    />
    <div
      class="pt-2"
      :class="{
        'md:px-3 md:pt-6': lg,
        'md:pt-3': sm,
      }"
    >
      <div
        class="
          mt-4
          flex flex-col
          justify-between
          space-y-4
          md:mt-0 md:flex-row md:space-y-0
        "
      >
        <div>
          <span
            class="
              rounded-xl
              bg-pink-200
              px-3
              py-1
              font-bold
              uppercase
              text-pink-500
            "
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
            <button class="flex flex-row items-center text-xl font-bold">
              <v-icon
                name="EyeIcon"
                type="outline"
                class="mr-2 h-8 w-8 text-gray-500"
              />
              1.5m
            </button>
          </li>
          <li>
            <button class="flex flex-row items-center text-xl font-bold">
              <v-icon
                name="ChatAlt2Icon"
                type="outline"
                class="mr-2 h-8 w-8 text-gray-500"
              />
              35k
            </button>
          </li>
          <li :class="{ 'inline lg:hidden': sm }">
            <button class="flex flex-row items-center text-xl font-bold">
              <v-icon
                name="ShareIcon"
                type="outline"
                class="mr-2 h-8 w-8 text-gray-500"
              />
              35k
            </button>
          </li>
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
          class="
            font-semibold
            leading-relaxed
            transition-all
            hover:text-pink-500
          "
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
      class="
        mt-4
        flex flex-col
        items-center
        justify-center
        space-y-4
        px-3
        pb-3
        md:mt-0 md:flex-row md:justify-between md:space-y-0 md:pb-6
      "
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
        <button
          class="
            flex
            items-center
            rounded-2xl
            bg-pink-500/30
            px-5
            py-3
            font-medium
            text-pink-500
            focus:ring-2 focus:ring-pink-500 focus:ring-offset-2
          "
        >
          <v-icon
            name="ShareIcon"
            type="outline"
            class="mr-2 h-8 w-8 text-pink-500"
          />
          <span>Share on Media</span>
        </button>
      </div>
    </div>
  </div>
</template>
