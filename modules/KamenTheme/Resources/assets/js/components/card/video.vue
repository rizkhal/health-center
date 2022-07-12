<template>
  <div class="flex flex-wrap justify-center">
    <div class="card-zoom h-[15em] w-full">
      <div class="absolute z-10 h-full w-full rounded-xl bg-black/30" />
      <div class="card-zoom-image" id="bg"></div>
      <div
        class="card-zoom-content absolute z-10 scale-90 rounded-full bg-black/30"
      >
        <v-icon
          name="PlayIcon"
          class="h-16 w-16 cursor-pointer text-[3em] text-gray-100"
        />
      </div>
    </div>
  </div>
</template>
<style lang="css">
#bg {
  background-image: url("../../../../assets/images/video1.jpg");
}
</style>
