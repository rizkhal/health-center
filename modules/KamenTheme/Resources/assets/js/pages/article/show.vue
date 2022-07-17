<script>
import KamenTheme from "Kamen/layouts/kamen.vue";

export default {
  layout: KamenTheme,
  props: {
    article: Object,
  },
  mounted() {
    /**
     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    var disqus_config = function () {
      this.page.url = window.location.pathname; // Replace PAGE_URL with your page's canonical URL variable
      this.page.identifier = this.article.slug; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };

    (function () {
      // DON'T EDIT BELOW THIS LINE
      var d = document,
        s = d.createElement("script");
      s.src = "https://portal-berita-1.disqus.com/embed.js";
      s.setAttribute("data-timestamp", +new Date());
      (d.head || d.body).appendChild(s);
    })();
  },
};
</script>
<template>
  <kamen-wrapper>
    <template #main>
      <div>
        <div class="flex flex-col space-y-8">
          <kamen-post-card :item="article" size="lg" />
          <div v-html="article.content"></div>
          <div id="disqus_thread"></div>
        </div>
      </div>
    </template>
    <template #rightbar>
      <div>
        <!-- <PageHeading title="Related News" right-text="See All" /> -->

        <div class="flex flex-col space-y-4">
          <!-- <SubscribeNewsLatter class="mb-4" /> -->

          <!-- <CardPost
            v-for="(item, index) in Array.from({ length: 4 })"
            :key="index"
            size="sm"
          /> -->
        </div>
      </div>
    </template>
  </kamen-wrapper>
</template>
