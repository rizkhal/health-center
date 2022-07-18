<script>
import KamenTheme from "Kamen/layouts/kamen.vue";

export default {
  layout: KamenTheme,
};
</script>
<script setup>
const props = defineProps({
  hero: Object,
  vission: Object,
});
</script>
<template>
  <kamen-container>
    <div class="flex w-full items-center lg:w-1/2">
      <div class="mb-8 max-w-2xl">
        <h1
          class="
            text-lg
            font-bold
            leading-snug
            tracking-tight
            text-gray-800
            dark:text-white
            md:text-4xl
            lg:text-4xl lg:leading-tight
            xl:text-6xl xl:leading-tight
          "
        >
          {{ hero?.title }}
        </h1>
        <p
          class="
            md:text-md
            lg:text-md
            py-5
            text-sm
            leading-normal
            text-gray-500
            dark:text-gray-300
            xl:text-xl
          "
          v-html="hero?.summary"
        ></p>

        <div
          class="
            flex flex-col
            items-start
            space-y-3
            sm:flex-row sm:items-center sm:space-x-4 sm:space-y-0
          "
        >
          <v-app-link
            :href="$route('post.service')"
            target="_blank"
            rel="noopener"
            class="
              flex
              items-center
              rounded-md
              bg-pink-600
              px-2
              py-1
              text-xs
              lg:px-6 lg:py-3 lg:text-lg
              text-center
              lg:font-bold
              text-white
            "
          >
            Pelayanan
            <v-icon
              name="ArrowSmRightIcon"
              class="ml-2 w-3 h-3 lg:h-6 lg:w-6"
            />
          </v-app-link>
        </div>
      </div>
    </div>
    <div class="flex w-full items-center justify-center lg:w-1/2">
      <img
        lazy
        alt="Dokter Default"
        class="h-[617] w-[617]"
        src="../../images/doctor.svg"
      />
    </div>
  </kamen-container>

  <!-- <div
    class="
      p-8
      mt-4
      flex
      w-full
      mx-auto
      xl:px-0
      flex-col
      container
      text-center
      items-center
      justify-center
    "
  >
    <h2
      class="
        mt-3
        text-3xl
        max-w-2xl
        font-bold
        leading-snug
        tracking-tight
        text-gray-800
        dark:text-white
        lg:leading-tight lg:text-4xl
      "
    >
      Visi &#38; Misi
    </h2>
    <p
      class="
        py-4
        text-lg
        max-w-2xl
        lg:text-xl
        xl:text-xl
        leading-normal
        text-gray-500
        dark:text-gray-300
      "
    >
      Nextly is a free landing page &amp; marketing website template for
      startups and indie projects. Its built with Next.js &amp; TailwindCSS. And
      its completely open-source.
    </p>
  </div> -->

  <div
    class="
      container
      mx-auto
      mb-6
      flex flex-wrap
      p-8
      lg:flex-nowrap lg:gap-10
      xl:px-0
    "
  >
    <div class="flex w-full items-center justify-center lg:w-1/2">
      <img
        alt="Nurse 1"
        src="../../images/nurse1.svg"
        style="
          margin: 0;
          padding: 0;
          border: none;
          display: block;
          max-width: 80%;
        "
      />
    </div>
    <div class="flex w-full flex-wrap items-center lg:w-1/2">
      <div>
        <div class="mt-4 flex w-full flex-col">
          <h3
            class="
              mt-3
              max-w-2xl
              text-3xl
              font-bold
              leading-snug
              tracking-tight
              text-gray-800
              dark:text-white
              lg:text-4xl lg:leading-tight
            "
          >
            Visi
          </h3>
          <p
            class="
              max-w-2xl
              py-4
              text-lg
              leading-normal
              text-gray-500
              dark:text-gray-300
              lg:text-xl
              xl:text-xl
            "
            v-html="vission.vission"
          ></p>
        </div>
      </div>
    </div>
  </div>
  <div
    class="
      container
      mx-auto
      mb-6
      flex flex-wrap
      p-8
      lg:flex-nowrap lg:gap-10
      xl:px-0
    "
  >
    <div class="flex w-full items-center justify-center lg:order-1 lg:w-1/2">
      <div>
        <div
          style="
            margin: 0;
            max-width: 100%;
            overflow: hidden;
            position: relative;
            display: inline-block;
            box-sizing: border-box;
          "
        >
          <div style="box-sizing: border-box; display: block; max-width: 100%">
            <img
              style="
                margin: 0;
                padding: 0;
                border: none;
                display: block;
                max-width: 100%;
              "
              lazy
              alt=""
              src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNTIxIiBoZWlnaHQ9IjQ4MiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2ZXJzaW9uPSIxLjEiLz4="
            />
          </div>
          <img
            alt="Nurse 2"
            src="../../images/nurse2.svg"
            lazy
            style="
              width: 0px;
              height: 0px;
              inset: 0px;
              filter: none;
              padding: 0px;
              border: none;
              margin: auto;
              display: block;
              min-width: 100%;
              max-width: 100%;
              min-height: 100%;
              max-height: 100%;
              position: absolute;
              transform: scaleX(-1);
              box-sizing: border-box;
              background-size: cover;
              background-image: none;
              background-position: 0% 0%;
              -webkit-transform: scaleX(-1);
            "
          />
        </div>
      </div>
    </div>
    <div class="flex w-full flex-wrap items-center lg:w-1/2 lg:justify-end">
      <div>
        <div class="mt-4 flex w-full flex-col">
          <h3
            class="
              mt-3
              max-w-2xl
              text-3xl
              font-bold
              leading-snug
              tracking-tight
              text-gray-800
              dark:text-white
              lg:text-4xl lg:leading-tight
            "
          >
            Misi
          </h3>
          <p
            v-if="vission.mission"
            class="
              max-w-2xl
              py-4
              text-lg
              leading-normal
              text-gray-500
              dark:text-gray-300
              lg:text-xl
              xl:text-xl
            "
            v-html="vission.mission"
          ></p>
        </div>
        <div class="mt-5 w-full">
          <div
            class="mt-8 flex items-center space-x-3"
            v-for="(detail, index) in vission.details"
            :key="index"
          >
            <div
              class="
                mt-1
                flex
                h-10
                w-10
                flex-shrink-0
                items-center
                justify-center
                rounded-md
                bg-pink-500
              "
            >
              <v-icon :name="detail.icon" class="h-7 w-7 text-pink-50" />
            </div>
            <div>
              <h4 class="text-md font-medium text-gray-600 dark:text-gray-200">
                {{ detail.text }}
              </h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
