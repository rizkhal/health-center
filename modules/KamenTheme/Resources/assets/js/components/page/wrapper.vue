<template>
  <div class="bg-gray-100">
    <div
      class="mt-6 grid min-h-screen grid-cols-12 gap-0 px-2 lg:gap-4 lg:px-8"
    >
      <!-- left bar -->
      <div
        class="col-span-12 row-end-7 mt-6 lg:col-span-2 lg:row-end-1 lg:mt-0"
      >
        <slot name="leftbar">
          <kamen-leftbar />
        </slot>
      </div>

      <!-- center main -->
      <div class="col-span-12 lg:col-span-7">
        <div class="flex flex-col space-y-8">
          <slot name="main" />
        </div>
      </div>

      <!-- right bar -->
      <div class="col-span-12 mt-6 lg:col-span-3 lg:mt-0">
        <slot name="rightbar">
          <kamen-rightbar />
        </slot>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data: () => ({
    show: true,
  }),
};
</script>
