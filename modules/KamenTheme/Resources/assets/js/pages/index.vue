<script>
import KamenTheme from "Kamen/layouts/kamen.vue";

export default {
  layout: KamenTheme,
};
</script>
<script setup>
defineProps({
  hero: Object,
});
</script>
<template>
  <kamen-container>
    <div class="flex w-full items-center lg:w-1/2">
      <div class="mb-8 max-w-2xl">
        <h1
          class="text-4xl font-bold leading-snug tracking-tight text-gray-800 dark:text-white lg:text-4xl lg:leading-tight xl:text-6xl xl:leading-tight"
        >
          {{ hero?.title }}
        </h1>
        <p
          class="lg:text-md py-5 text-xl leading-normal text-gray-500 dark:text-gray-300 xl:text-xl"
          v-html="hero?.summary"
        ></p>

        <div
          class="flex flex-col items-start space-y-3 sm:flex-row sm:items-center sm:space-x-4 sm:space-y-0"
        >
          <a
            href="https://web3templates.com/templates/nextly-landing-page-template-for-startups"
            target="_blank"
            rel="noopener"
            class="flex items-center rounded-md bg-pink-600 px-6 py-3 text-center text-lg font-bold text-white"
          >
            Pelayanan
            <v-icon name="ArrowSmRightIcon" class="ml-2 h-6 w-6" />
          </a>
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
    class="container mx-auto mb-6 flex flex-wrap p-8 lg:flex-nowrap lg:gap-10 xl:px-0"
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
            class="mt-3 max-w-2xl text-3xl font-bold leading-snug tracking-tight text-gray-800 dark:text-white lg:text-4xl lg:leading-tight"
          >
            Visi
          </h3>
          <p
            class="max-w-2xl py-4 text-lg leading-normal text-gray-500 dark:text-gray-300 lg:text-xl xl:text-xl"
          >
            You can use this space to highlight your first benefit or a feature
            of your product. It can also contain an image or Illustration like
            in the example along with some bullet points.
          </p>
          <p
            class="max-w-2xl py-4 text-lg leading-normal text-gray-500 dark:text-gray-300 lg:text-xl xl:text-xl"
          >
            You can use this space to highlight your first benefit or a feature
            of your product. It can also contain an image or Illustration like
            in the example along with some bullet points.
          </p>
        </div>
      </div>
    </div>
  </div>
  <div
    class="container mx-auto mb-6 flex flex-wrap p-8 lg:flex-nowrap lg:gap-10 xl:px-0"
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
            class="mt-3 max-w-2xl text-3xl font-bold leading-snug tracking-tight text-gray-800 dark:text-white lg:text-4xl lg:leading-tight"
          >
            Misi
          </h3>
          <p
            class="max-w-2xl py-4 text-lg leading-normal text-gray-500 dark:text-gray-300 lg:text-xl xl:text-xl"
          >
            You can use this same layout with a flip image to highlight your
            rest of the benefits of your product. It can also contain an image
            or Illustration as above section along with some bullet points.
          </p>
        </div>
        <div class="mt-5 w-full">
          <div class="mt-8 flex items-start space-x-3">
            <div
              class="mt-1 flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-md bg-pink-500"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                class="h-7 w-7 text-pink-50"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"
                ></path>
              </svg>
            </div>
            <div>
              <h4 class="text-xl font-medium text-gray-800 dark:text-gray-200">
                Mobile Responsive Template
              </h4>
              <p class="mt-1 text-gray-500 dark:text-gray-400">
                Nextly is designed as a mobile first responsive template.
              </p>
            </div>
          </div>
          <div class="mt-8 flex items-start space-x-3">
            <div
              class="mt-1 flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-md bg-pink-500"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                class="h-7 w-7 text-pink-50"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
                ></path>
              </svg>
            </div>
            <div>
              <h4 class="text-xl font-medium text-gray-800 dark:text-gray-200">
                Powered by Next.js &amp; TailwindCSS
              </h4>
              <p class="mt-1 text-gray-500 dark:text-gray-400">
                This template is powered by latest technologies and tools.
              </p>
            </div>
          </div>
          <div class="mt-8 flex items-start space-x-3">
            <div
              class="mt-1 flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-md bg-pink-500"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                class="h-7 w-7 text-pink-50"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"
                ></path>
              </svg>
            </div>
            <div>
              <h4 class="text-xl font-medium text-gray-800 dark:text-gray-200">
                Dark &amp; Light Mode
              </h4>
              <p class="mt-1 text-gray-500 dark:text-gray-400">
                Nextly comes with a zero-config light &amp; dark mode.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
