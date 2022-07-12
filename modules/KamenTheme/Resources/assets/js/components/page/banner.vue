<template>
  <div class="bg-pink-600">
    <div class="py-3 px-3 sm:px-6 lg:px-8">
      <div class="flex flex-wrap items-center justify-between">
        <ul class="flex w-0 flex-1 items-center space-x-4">
          <li class="flex items-center">
            <v-icon name="MailIcon" type="outline" class="h-6 w-6 text-white" />
            <p class="ml-2 truncate font-medium text-white">
              <span> support@mail.com </span>
            </p>
          </li>
          <li class="hidden items-center lg:flex">
            <v-icon name="MailIcon" type="outline" class="h-6 w-6 text-white" />
            <p class="ml-2 truncate font-medium text-white">
              <span> support@mail.com </span>
            </p>
          </li>
          <li class="hidden items-center lg:flex">
            <v-icon name="MailIcon" type="outline" class="h-6 w-6 text-white" />
            <p class="ml-2 truncate font-medium text-white">
              <span> support@mail.com </span>
            </p>
          </li>
        </ul>
        <!-- <div
          class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto"
        >
          <a
            href="#"
            class="
              flex
              items-center
              justify-center
              px-4
              py-2
              border border-transparent
              rounded-md
              shadow-sm
              text-sm
              font-medium
              text-pink-600
              bg-white
              hover:bg-pink-50
            "
          >
            Learn more
          </a>
        </div>
        <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
          <button
            type="button"
            @click.prevent="$emit('toggle')"
            class="
              -mr-1
              flex
              p-2
              rounded-md
              hover:bg-pink-500
              focus:outline-none focus:ring-2 focus:ring-white
              sm:-mr-2
            "
          >
            <span class="sr-only">Dismiss</span>
            <v-icon name="XIcon" type="solid" class="w-6 h-6 text-white" />
          </button>
        </div> -->
      </div>
    </div>
  </div>
</template>
<script>
export default {
  emits: ["toggle"],
};
</script>
