<script setup>
import { onMounted } from "vue";
import { MEDIA_SOCIAL } from "../../utils/enum";

defineEmits(["toggle"]);

const props = defineProps({
  mediaSocials: Object,
});

const icons = ({ type }) => {
  switch (type) {
    case MEDIA_SOCIAL.FACEBOOK.value:
      return MEDIA_SOCIAL.FACEBOOK.icon;
    case MEDIA_SOCIAL.TWITTER.value:
      return MEDIA_SOCIAL.TWITTER.icon;
    case MEDIA_SOCIAL.WHATSAPP.value:
      return MEDIA_SOCIAL.WHATSAPP.icon;
    case MEDIA_SOCIAL.EMAIL.value:
      return MEDIA_SOCIAL.EMAIL.icon;
    case MEDIA_SOCIAL.INSTAGRAM.value:
      return MEDIA_SOCIAL.INSTAGRAM.icon;
  }
};
</script>
<template>
  <div class="bg-pink-600">
    <div class="py-3 px-3 sm:px-6 lg:px-8">
      <div class="flex flex-wrap items-center justify-between">
        <div class="flex w-0 flex-1 items-center space-x-4">
          <a
            :href="account.url"
            target="blank"
            class="flex items-center"
            v-for="(account, index) in mediaSocials"
            :key="index"
          >
            <span
              v-html="icons(account)"
              class="h-3 w-3 text-white md:h-6 md:w-6"
            ></span>
            <p class="ml-2 hidden truncate font-medium text-white lg:block">
              <span> {{ account.name }} </span>
            </p>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>
