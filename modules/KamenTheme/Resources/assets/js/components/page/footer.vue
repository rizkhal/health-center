<script setup>
import { MEDIA_SOCIAL } from "../../utils/enum";

const props = defineProps({
  socials: Object,
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

const shortcuts = [
  {
    menu: "Beranda",
    url: route("post.home"),
  },
  {
    menu: "Artikel",
    url: route("post.article"),
  },
  {
    menu: "Fasilitas",
    url: route("post.facility"),
  },
  {
    menu: "Kepuasan Masyrakat",
    url: route("post.home"),
  },
  {
    menu: "Pelayanan",
    url: route("post.home"),
  },
  {
    menu: "Informasi",
    url: route("post.home"),
  },
];
</script>
<template>
  <div class="bg-gradient-to-r from-pink-500 to-pink-600 text-white">
    <div
      class="mx-auto mt-10 flex max-w-7xl flex-col divide-y divide-pink-700/50 py-10 px-4 text-center lg:px-0"
    >
      <div class="grid grid-cols-12 gap-4 py-10">
        <div
          class="col-span-12 row-end-3 mt-8 text-left md:col-span-4 md:row-end-1 md:mt-0"
        >
          <h1 class="mb-2 text-4xl font-bold">Tentang Kami</h1>
          <p class="leading-6">
            PKM Pantingaloang merupakan puskesmas yang berlokasi di Kecamatan
            Ujung Tanah Kota Makasssar, Kami berkomitmen untuk membuat indonesia
            menjadi lebih sehat dengan menyediakan pelayanan terbaik untuk
            setiap passien
          </p>
        </div>
        <div class="col-span-12 ml-12 md:col-span-8">
          <div class="grid grid-cols-3 gap-4 text-left">
            <ul class="col-span-full md:col-span-1">
              <h1 class="pb-4 font-bold">Alamat</h1>
              <li class="mt-6">
                <a href="#" class="transition-all hover:text-gray-200"
                  >Jl. Barukang VI No. 15, Patingalloang</a
                >
              </li>
              <li class="mt-6">
                <a href="#" class="transition-all hover:text-gray-200"
                  >Kec. Ujung Tanah</a
                >
              </li>
              <li class="mt-6">
                <a href="#" class="transition-all hover:text-gray-200"
                  >Kota. Makassar</a
                >
              </li>
            </ul>
            <ul class="col-span-full my-4 md:col-span-1 md:my-0">
              <h1 class="pb-4 font-bold">Pintasan</h1>
              <li class="mt-6" v-for="(s, index) in shortcuts" :key="index">
                <a :href="s.url" class="transition-all hover:text-gray-200">
                  {{ s.menu }}
                </a>
              </li>
            </ul>
            <ul class="col-span-full my-4 md:col-span-1 md:my-0">
              <h1 class="pb-4 font-bold">Media Sosial</h1>
              <li class="mt-6" v-for="(social, index) in socials" :key="index">
                <div class="flex flex-row items-center space-x-2">
                  <span
                    v-html="icons(social)"
                    class="h-6 w-6 text-white"
                  ></span>

                  <a href="#" class="transition-all hover:text-gray-200">
                    {{ social.name }}
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="grid grid-cols-12 gap-4 py-10">
        <div class="col-span-12 place-self-center md:col-span-4">
          Copyrigth &copy; {{ new Date().getFullYear() }} Kamen Theme - Lamaau
        </div>
      </div>
    </div>
  </div>
</template>
