<script>
import http from "~/services/http";

// eslint-disable-next-line no-unused-vars
import tinymce from "tinymce";
import TinyMCE from "@tinymce/tinymce-vue";

import "tinymce/themes/silver";
import "tinymce/themes/silver";
import "tinymce/themes/mobile";
import "tinymce/icons/default";

import "tinymce/skins/ui/oxide/skin.min.css";
import "tinymce/skins/ui/oxide/content.min.css";
import "tinymce/skins/content/default/content.css";

import "tinymce/plugins/advlist";
import "tinymce/plugins/anchor";
import "tinymce/plugins/contextmenu";
import "tinymce/plugins/directionality";
import "tinymce/plugins/emoticons";
import "tinymce/plugins/fullpage";
import "tinymce/plugins/fullscreen";
import "tinymce/plugins/help";
import "tinymce/plugins/hr";
import "tinymce/plugins/image";
import "tinymce/plugins/imagetools";
import "tinymce/plugins/importcss";
import "tinymce/plugins/autolink";
import "tinymce/plugins/insertdatetime";
import "tinymce/plugins/legacyoutput";
import "tinymce/plugins/link";
import "tinymce/plugins/lists";
import "tinymce/plugins/media";
import "tinymce/plugins/nonbreaking";
import "tinymce/plugins/noneditable";
import "tinymce/plugins/pagebreak";
import "tinymce/plugins/paste";
import "tinymce/plugins/preview";
import "tinymce/plugins/autoresize";
import "tinymce/plugins/print";
import "tinymce/plugins/quickbars";
import "tinymce/plugins/save";
import "tinymce/plugins/searchreplace";
import "tinymce/plugins/spellchecker";
import "tinymce/plugins/tabfocus";
import "tinymce/plugins/table";
import "tinymce/plugins/template";
import "tinymce/plugins/textcolor";
import "tinymce/plugins/textpattern";
import "tinymce/plugins/autosave";
import "tinymce/plugins/toc";
import "tinymce/plugins/visualblocks";
import "tinymce/plugins/visualchars";
import "tinymce/plugins/wordcount";
import "tinymce/plugins/bbcode";
import "tinymce/plugins/charmap";
import "tinymce/plugins/code";
import "tinymce/plugins/codesample";
import "tinymce/plugins/colorpicker";
import "tinymce/plugins/emoticons/js/emojis";

export default {
  components: {
    editor: TinyMCE,
  },
  data() {
    return {
      init: {
        height: "100%",
        plugins: [
          "advlist autolink lists link image charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen",
          "insertdatetime media nonbreaking save table contextmenu directionality",
          "emoticons template paste textcolor colorpicker textpattern",
        ],
        toolbar:
          "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        menubar: true,
        convert_urls: true,
        document_base_url: process.env.MIX_APP_URL,
        images_upload_handler: (blobInfo, success, failure) => {
          const formData = new FormData();
          formData.append("file", blobInfo.blob());

          http
            .post(`v1/file/upload/lfm`, formData, {
              headers: {
                "Content-Type": "multipart/form-data",
              },
            })
            .then(({ data: { file } }) => {
              success(file);
            })
            .catch((e) => {
              failure(e);
            });
        },
        file_picker_callback: function (callback, value, meta) {
          var x =
            window.innerWidth ||
            document.documentElement.clientWidth ||
            document.getElementsByTagName("body")[0].clientWidth;

          var y =
            window.innerHeight ||
            document.documentElement.clientHeight ||
            document.getElementsByTagName("body")[0].clientHeight;

          var cmsURL =
            process.env.MIX_APP_URL + "/filemanager?editor=" + meta.fieldname;
          if (meta.filetype == "image") {
            cmsURL = cmsURL + "&type=Images";
          } else {
            cmsURL = cmsURL + "&type=Files";
          }

          tinyMCE.activeEditor.windowManager.openUrl({
            url: cmsURL,
            title: "Filemanager",
            width: x * 0.8,
            height: y * 0.8,
            resizable: "yes",
            close_previous: "no",
            onMessage: (api, message) => {
              callback(message.content);
            },
          });
        },
      },
    };
  },
  props: {
    value: {
      type: String,
      required: false,
    },
    label: {
      type: String,
      required: false,
      default: false,
    },
    required: {
      type: Boolean,
      default: false,
    },
    error: {
      type: String,
    },
  },
  computed: {
    newValue: {
      get() {
        return this.value;
      },
      set(value) {
        this.$emit("input", value);
      },
    },
  },
};
</script>
<template>
  <div class="h-full">
    <label v-if="label" class="form-label mb-1 text-sm capitalize">
      {{ label }} <span v-if="required" class="text-xs text-red-500">*</span>
    </label>

    <editor
      :init="init"
      :value="value"
      v-model="newValue"
      :initial-value="value"
    />

    <div v-if="error" class="form-error">{{ error }}</div>
  </div>
</template>
